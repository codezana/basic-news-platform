<?php

namespace App\Http\Controllers\News;

use App\Models\News;
use Livewire\Component;

class NewsGrid extends Component
{
    public $search = '';
    public $limit = 8;

    protected $listeners = ['search-news' => 'updateSearch'];


    public function updateSearch($value)
    {
        $this->search = $value;
    }

    public function loadMore()
    {
        $this->limit += 8;
    }

    public function render()
    {
        $query = News::latest();

        if ($this->search) {
            $query->where(function ($q) {
                $q->where('title', 'like', '%' . $this->search . '%')
                    ->orWhere('description', 'like', '%' . $this->search . '%');
            });
        }

        $newsList = $query->take($this->limit)->get();

        return view('news.news-grid', [
            'newsList' => $newsList
        ]);
    }
}
