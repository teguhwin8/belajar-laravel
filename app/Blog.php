<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use Sluggable;

    protected $guarded = ['id'];

    protected $with = ['user'];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function comments()
    {
        return $this->hasMany('App\BlogComment')->orderBy('id', 'desc');
    }

    public function tags()
    {
        return $this->morphToMany('App\Tag', 'taggable');
    }
}
