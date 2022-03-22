<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Post;
use App\PostImages;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class CreateHubPosts extends Component
{
    use WithFileUploads;
    public $photos = [];
    public $description;

    public function updatedPhoto()
    {
        $this->validate([
            'photos.*' => 'image|nullable|mimes:jpeg,png',
            'description'  => 'required_without:photos',
        ]);
    }
    public function save()
    {
        $this->validate([
            'photos.*' => 'image|nullable|mimes:jpeg,png',
            'description'  => 'required_without:photos',
        ]);
        // save function
        $title = $this->description ? Str::words($this->description, 15, ' >>>') :  time();
        $post = Post::create([
            'user_id' => Auth::user()->id,
            'title' => $title,
            'content' => $this->description,
            'slug' => Str::of($title)->slug('-'),
        ]);
        foreach ($this->photos as $photo) {
            $fileNameWithExt = $photo->getClientOriginalName();
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $extension = $photo->getClientOriginalExtension();
            $fileNameToStore = $fileName . '_' . time() . '.' . $extension;
            $photo->storeAs('public/hub_images', $fileNameToStore);
            PostImages::create([
                'post_id' => $post->id,
                'image' => $fileNameToStore,
            ]);
        }

        $this->reset(['photos', 'description']);
        $this->emit('postAdded');
    }

    public function removeMe($index) {
        array_splice($this->photos, $index, 1);
    }

    public function render()
    {
        return view('livewire.create-hub-posts');
    }
}
