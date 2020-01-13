<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    //turn off automatic protection from saving data to data based 
    //without going through special permissions, such as whether you are an admin or a subscriber  
    protected $guarded = [];

    public function path(){

        return route('articles.show', $this);
    }

    public function user(){
        //

        return $this->belongsTo(User::class);
    }

     // an article has many tags
    // a tag has many articles as well
    // we need a many to many relationships system 

    public function tags(){
        
        return $this->belongsToMany(Tag::class)->withTimestamps();
    }
}
