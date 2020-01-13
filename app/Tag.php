<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    // this query is to find a tag that have a many articles attached to it

    public function article() {
        
        return $this->belongsToMany(Article::class);
    }
}
