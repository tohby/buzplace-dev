<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    //
    protected $guarded = [];

    protected $fillable = ['from', 'to', 'text'];

    protected $appends = ['time'];

    public function getTime() {
        return $this->created_at->diffForHumans();
    }

    public function getTimeAttribute() {
        return $this->getTime();
    }
}
