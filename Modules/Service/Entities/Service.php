<?php

namespace Modules\Service\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Storage;
use Modules\Article\Entities\Article;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'alias',
        'description',
        'image',
        'association'
    ];

    protected $appends = ['article_url'];

    protected static function newFactory()
    {
        return \Modules\Service\Database\factories\ServiceFactory::new();
    }

    public function getArticleUrlAttribute()
    {
        if ($this->association) {
            $resource_id = $this->association->resource_id;
            $article = Article::where('id', $resource_id)->first();

            return $article?->url;
        }

        return '';
    }

    public function getAssociationAttribute($value)
    {
        return json_decode($value);
    }
}
