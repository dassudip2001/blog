<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;
use PhpParser\Node\Expr\Cast\Array_;

class Blog extends Model
{
    use HasFactory, Sluggable;


    // public function getRouteKeyName()
    // {
    //     return 'slug';
    // }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'blogName'
            ]
        ];
    }

    public function categories()
    {
        return $this->belongsTo(Category::class, 'categoryId', 'id');
    }
}