<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Auth;
use App\Models\Post;
use App\Models\Category;

use RealRashid\SweetAlert\Facades\Alert;

class BlogController extends Controller
{

    public function __construct(){
        $this->middleware('auth')->except(['index','show']);
    }
    public function index(Request $request){
        if($request->search){
            $posts=Post::where('title','like','%'.$request->search.'%')
            ->orWhere('body','like','%'.$request->search.'%')
            ->latest()->paginate(4);
        }elseif($request->category){
            $posts=Category::where('name',$request->category)->firstOrFail()->posts()->paginate(3)->withQueryString();
        }
        
        else{
            $posts=Post::latest()->paginate(4);
        }
        $categories=Category::all();
     /*    $url = $request->url();
        dd($url); */
  

        return view('blog.blog',compact('posts','categories'));
    }

  

    public function create(){
        $category=Category::all();
        return view('blog.create',compact('category'));
    }
    public function store(Request $request){
        $blog=$request->validate([
            'title'=>'required',
            'category_id'=>'required',
             'image'=>'required|image|mimes:png,jpg',
            'body'=>'required'
        ]);

        $title=$request->input('title');
        if(Post::latest()->first() !== null){
            $postId=Post::latest()->first()->id +1;
        }else{
            $postId=1;
        }

        $slug=Str::slug($title,'-').'-'.$postId;
        $user_id=Auth::user()->id;
        $body=$request->input('body');
        $category_id=$request->input('category_id');

        //file upload
        $imagePath= 'storage/'. $request->file('image')->store('postImages','public');

        $post=new Post();
        $post->title=$title;
        $post->slug=$slug;
        $post->user_id=$user_id;
        $post->imagePath=$imagePath;
        $post->body=$body;
        $post->category_id=$category_id;

        $post->save();
        $value = $request->cookie('title');
        dd($value);

        Alert::success('Post Added!!','Post submitted successfully!!');
        return redirect()->back();

    }

    public function edit(Post $post){
        if(auth()->user()->id !== $post->user->id){
            abort(403);
        }
        return view('blog.edit',compact('post'));
    }
    public function update(Request $request, Post $post){
        if(auth()->user()->id !== $post->user->id){
            abort(403);
        }
        $blog=$request->validate([
            'title'=>'required',
             'image'=>'required|image|mimes:png,jpg',
            'body'=>'required'
        ]);

        $title=$request->input('title');
        $postId=$post->id;
        $slug=Str::slug($title,'-').'-'.$postId;
        $body=$request->input('body');

        //file upload
        $imagePath= 'storage/'. $request->file('image')->store('postImages','public');

      
        $post->title=$title;
        $post->slug=$slug;
        $post->imagePath=$imagePath;
        $post->body=$body;

        $post->save();


       return to_route('home.blog');
    }
    public function destroy(Post $post){
        $post->delete();
        return redirect()->back()->with('status','deleted successfull');
    }
    public function show($slug){
        $posts=Post::where('slug',$slug)->first();
        $category=$posts->category;
        $relatedPost=$category->posts()->where('id','!=',$posts->id)->latest()->take(3)->get();
        return view('blog.singleblog',compact('posts','relatedPost'));
    }
}
