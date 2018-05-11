<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //  for mass assignement
    protected $fillable = [
        'user_id', 
        'category_id', 
        'photo_id', 
        'title',
        'content'
    ];


    // one post has one Author(user) 
    // one Author(user) have many posts
    public function user(){
    	return $this->belongsTo("App\User");
    }

    // one post has one photo
    public function photo() {
        return $this->belongsTo('App\Photo');
    }



    // a post has one category
     public function category() {
        return $this->belongsTo('App\Category');
    }



}
