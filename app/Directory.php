<?php

namespace App;

use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;

class Directory extends Model
{
    //
    use Searchable;
    protected $fillable = [
        'name', 'description', 'location',
    ];
    public function searchableAs()
    {
        return 'directories';
    }
}
