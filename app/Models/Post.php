<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table='posts';
    protected $fillable=['title','body','image'];

    //have post and it belong to one user

    public function user(){
       return $this->belongsTo(User::class);
    }

    //one post has one category 
    public function category(){
        return $this->belongsTo(Category::class);
    }
}
