<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    protected $fillable = ['user_id', 'image', 'title', 'content'];

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
