<?php

namespace App;

use App\Traits\Shareable;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //

    use Shareable;
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

    protected $shareOptions = [
        'columns' => [
            'title' => 'title'
        ],
        'url' => 'url'
    ];

    public function getUrlAttribute() {
        return route('post.view', $this->attributes['slug']);
    }

    public function postImages() {
        return $this->hasMany('App\PostImages');
    }
}
