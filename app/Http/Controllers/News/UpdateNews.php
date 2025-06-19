<?php

namespace App\Http\Controllers\News;

use App\Models\News;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class UpdateNews extends Component
{

    use WithFileUploads;

    public News $news;

    #[Validate('required|min:3|max:255')]
    public string $title = '';
    #[Validate('required|min:10|max:1000')]
    public string $description = '';
    #[Validate('nullable|image|mimes:jpg,jpeg,png')]
    public $image;
    public $currentImage;

    public function mount(News $news)
    {
        $this->news = $news;

        $this->title = $news->title;
        $this->description = $news->description;
        $this->currentImage = $news->image;
    }

    public function update()
    {
        $this->validate();

        if ($this->image) {
            // Delete the old image
            if ($this->news->image && Storage::disk('public')->exists($this->news->image)) {
                Storage::disk('public')->delete($this->news->image);
            }

            // Store the new image
            $this->news->image = $this->image->store('images', 'public');
        }

        // Update title & description (and image if changed)
        $this->news->update([
            'title' => $this->title,
            'description' => $this->description,
            'image' => $this->news->image,
        ]);

        $this->redirect(route('news.personal'), navigate: true);
    }

    #[Title('Basic News Platform - Update News')]
    public function render()
    {
        return view('news.update-news');
    }
}
