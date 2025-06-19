<?php

namespace App\Http\Controllers\News;

use App\Models\News;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Title;
use Livewire\Component;

class PersonalNews extends Component
{
    public $search = '';
    public $limit = 8;
    public $newsList = [];

    protected $listeners = ['search-news' => 'updateSearch'];

    #[Title('Basic News Platform - Personal News')]
    public function mount()
    {
        $this->loadNews();
    }

    public function updateSearch($value)
    {
        $this->search = $value;
        $this->loadNews();
    }

    public function loadMore()
    {
        $this->limit += 8;
        $this->loadNews();
    }

    public function deleteNow($newsId)
    {
        $news = News::where('id', $newsId)
            ->where('user_token', session()->getId())
            ->first();

        if ($news) {
            if ($news->image && Storage::disk('public')->exists($news->image)) {
                Storage::disk('public')->delete($news->image);
            }

            $news->delete();

            // Refresh the list manually
            $this->loadNews();
        }
    }

    public function loadNews()
    {
        $query = News::latest()
            ->where('user_token', session()->getId());

        if ($this->search) {
            $query->where(function ($q) {
                $q->where('title', 'like', '%' . $this->search . '%')
                    ->orWhere('description', 'like', '%' . $this->search . '%');
            });
        }

        $this->newsList = $query->take($this->limit)->get();
    }

    public function render()
    {
        return view('news.personal-news', [
            'newsList' => $this->newsList
        ]);
    }
}
