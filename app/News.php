<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    //
    protected $fillable = [
        'headline', 'image', 'content',
    ];

    public function comment() {
        return $this->hasMany('App\Comment');
    }
}
