<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    //
    protected $guarded = [];

    protected $fillable = ['from', 'to', 'text'];
    
    protected $appends = ['time', 'date'];

    public function getTime() {
        return $this->created_at->diffForHumans();
    }

    public function getTimeAttribute() {
        return $this->getTime();
    }

    protected function getDate() {
        return $this->created_at->format('M d Y, h:m');
    }

    public function getDateAttribute() {
        return $this->getDate();
    }
}
