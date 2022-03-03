<?php

namespace App;

use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;

class Directory extends Model
{
    use Searchable;
    protected $fillable = [
        'name', 'description', 'location', 'image', 'logo', 'phone', 'email'
    ];
    public function searchableAs()
    {
        return 'directories';
    }
}
