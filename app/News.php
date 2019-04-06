<?php

namespace App;

use App\Traits\Shareable;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    //

    use Sluggable;
    use SluggableScopeHelpers;
    use Shareable;

    protected $fillable = [
        'headline', 'image', 'content',
    ];

    public function sluggable(){
        return [
            'slug' => [
                'source' => 'headline'
            ]
        ];
    }

    public function comment() {
        return $this->hasMany('App\Comment');
    }

    protected $shareOptions = [
        'columns' => [
            'title' => 'headline'
        ],
        'url' => null
    ];
}
