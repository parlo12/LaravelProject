<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function user(){
        // the query below is really doing select * from user wehre post_id = id of the current post 

        return $this->belongsTo(User::class);
    }
}
