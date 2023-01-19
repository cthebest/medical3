<?php

namespace Modules\MenuItem\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Module extends Model
{
    use HasFactory;

    protected $fillable = [];

    protected static function newFactory()
    {
        return \Modules\MenuItem\Database\factories\ModuleFactory::new();
    }

    public function getParamsAttribute($value)
    {
        return json_decode($value);
    }
}
