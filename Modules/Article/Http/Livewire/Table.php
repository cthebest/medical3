<?php

namespace Modules\Article\Http\Livewire;

use Illuminate\Database\Query\Builder;
use Livewire\Component;
use Livewire\WithPagination;
use Modules\Article\Entities\Article;

class Table extends Component
{
    use WithPagination;

    public $query;
    public bool $isInMenuItem = false;

    public function render()
    {
        $articles = Article::with('user')->title($this->query)->paginate(10);
        return view('article::livewire.table', compact('articles'));
    }

    public function resourceAdded($resource)
    {
        $this->emit('resourceAdded', $resource);
    }

    public function deleteArticle($id)
    {
        abort_if_cannot('delete_articles');
        Article::findOrFail($id)->delete();
        $this->dispatchBrowserEvent('close-modal');
    }
}
