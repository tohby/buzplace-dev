<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //

    use Sluggable;
    use SluggableScopeHelpers;

    protected $fillable = ['user_id', 'image', 'title', 'content'];

    public function sluggable() {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function postImages() {
        return $this->hasMany('App\PostImages');
    }

    public function getUrlAttribute() {
        return route('post.view', $this->attributes['slug']);
    }
}
