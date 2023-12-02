<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\News;
use App\Models\Language;
use Livewire\Attributes\Url;

class NewsList extends Component
{
    
    use WithPagination;

    public $perPage = 24;

    #[Url()] 
    public $language = '';

    
    public function loadMore()
    {
        $this->perPage += 24;
    }
    
    public function changeLanguage($language)
    {
        $this->language = $language;
        $this->resetPage();
    }

    public function clearFilters()
    {
        $this->language = '';
        $this->resetPage();
    }

    public function render()
    {
        if ($this->language == '') {
            $this->language = app()->getLocale();
        }
        $news_list = News::with('source')
            ->when($this->language, function ($query) {
                $query->whereLanguage($this->language);
            })
            ->orderBy('published_at', 'desc')
            ->paginate($this->perPage); 
        
            return view(
            'livewire.news-list', 
            ['news_list' => $news_list]
        );
    }
}
