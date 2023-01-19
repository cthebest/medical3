<?php

namespace Modules\Article\Http\Livewire;

use Livewire\Component;
use Modules\Article\Entities\Article;

class IndexArticles extends Component
{
    public function render()
    {
        $articles = Article::latest()->take(3)->get();
        return view('article::livewire.index-articles', compact('articles'));
    }
}
