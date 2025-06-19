<?php

namespace App\Http\Controllers\News;

use App\Models\News;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateNews extends Component
{
    use WithFileUploads;

    #[Validate('required|min:3|max:255')]
    public string $title = '';
    #[Validate('required|min:10|max:1000')]
    public string $description = '';
    #[Validate('required|image')]
    public $image;

    public function save()
    {

        $this->validate();

        News::create([
            'title' => $this->title,
            'description' => $this->description,
            'image' => $this->image->store('images', 'public'),
            'user_token' => session()->getId(),

        ]);

        // Reset the form fields
        $this->reset(['title', 'description', 'image']);

        $this->redirect(route('news.personal'), navigate: true);
    }
    public function render()
    {
        return view('news.create-news');
    }
}
