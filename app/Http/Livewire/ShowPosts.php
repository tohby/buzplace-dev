<?php

namespace App\Http\Livewire;

use App\Post;
use Livewire\Component;

class ShowPosts extends Component
{
    protected $listeners = ['postAdded' => '$refresh'];
    
    public function render()
    {
        return view('livewire.show-posts', [
            'posts' => Post::orderBy('created_at', 'desc')->get(),
        ]);
    }
}
