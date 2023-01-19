<?php

namespace Modules\MenuItem\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\URL;

class MenuItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'alias',
        'icon',
        'association',
        'path',
        'order'
    ];

    public function getAssociationAttribute($value)
    {
        return json_decode($value);
    }

    public function getPathAttribute($value)
    {
        return URL::to($value);
    }
}
