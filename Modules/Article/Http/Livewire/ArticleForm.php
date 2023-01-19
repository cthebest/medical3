<?php

namespace Modules\Article\Http\Livewire;

use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Modules\Article\Entities\Article;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

class ArticleForm extends Component
{
    use WithFileUploads;
    public Article $article;
    public $image;

    public function mount(Article $article)
    {
        $this->article = $article;
    }

    public function rules()
    {
        return [
            'article.title' => 'required|max:255|unique:articles,title,' . $this->article->id,
            'article.image' => 'nullable',
            'article.alias' => 'nullable',
            'article.body' => 'nullable'
        ];
    }

    public function render()
    {
        return view('article::livewire.article-form');
    }

    public function store()
    {
        $this->validate();

        $this->article->alias = Str::slug($this->article->title);
        $this->article->user_id =  auth()->user()->id;
        $this->saveImage();
        $this->article->save();

        flash('Artículo registrado o actualizado correctamente')->success();

        return redirect()->route('articles.edit', $this->article);
    }

    private function saveImage()
    {
        // Check if there is a new image in the object's "image" property
        if ($this->image) {
            // Delete any existing image associated with the object
            $this->deleteImage();
            $path = $this->image->storeAs('/public/article', $this->image->hashName());
            // Assign the newly saved image's path to the "image" property of a related "service" object
            $this->article->image = $path;
        }
    }


    private function deleteImage()
    {
        if ($this->article->image) {
            Storage::delete($this->article->image);
        }
    }
}
