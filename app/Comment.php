<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
    protected $fillable = ['news_id', 'author', 'body', 'photo'];

    public function reply() {
        return $this->hasMany('App\CommentReply');
    }

    public function news() {
        return $this->belongsTo('App\News');
    }
}
