<?php

namespace Modules\Article\Http\Livewire;

use Livewire\Component;
use Modules\Article\Entities\Article;

class Articles extends Component
{
    public function render()
    {
        $articles = Article::paginate(20);
        return view('article::livewire.articles', compact('articles'));
    }
}
