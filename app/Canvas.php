<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Canvas extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'canvas_posts';

    protected $dates = [
        'published_at',
    ];

    public function getRouteKeyName(){
        return 'slug';
    }
}
