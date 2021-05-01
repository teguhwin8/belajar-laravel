<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public $timestamp = false;

    public function blogs()
    {
        return $this->morphedByMany('App\Blog', 'taggable');
    }

    public function courses()
    {
        return $this->morphedByMany('App\Blog', 'taggable');
    }
}
