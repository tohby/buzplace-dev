<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Consultation extends Model
{
    //
    protected $fillable = [
        'user_id', 'phone', 'email', 'subject', 'message',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
