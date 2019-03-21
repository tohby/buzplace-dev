<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    //

    protected $fillable = ['user_id', 'name', 'price', 'description', 'image'];

    public function user(){
        return $this->belongsTo('App\User');
    }
}
