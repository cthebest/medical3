<?php

namespace Modules\Article\Entities;

use App\Models\User;
use App\Services\UrlGenerator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'alias',
        'body',
        'image'
    ];

    protected static function newFactory()
    {
        return \Modules\Article\Database\factories\ArticleFactory::new();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeTitle($query, $search)
    {
        if ($search) {
            return $query->where('title', 'LIKE', "%$search%");
        }
        return $query;
    }

    public function getUrlAttribute()
    {
        $urlGenerator = new UrlGenerator;
        return $urlGenerator->generate(1, $this);
    }
}
