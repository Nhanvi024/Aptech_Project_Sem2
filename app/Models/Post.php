<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use App\Models\Admin;
use Illuminate\Pagination\LengthAwarePaginator;
use League\Flysystem\Visibility;

class Post extends Model
{
    use HasFactory;
    use Sluggable;
    protected $fillable = [
        'author',
        'category',
        'title',
        'slug',
        'content',
        //'content2',
        'post_featured_image',
        'content_image',
        'tags',
        'meta_keywords',
        'meta_description',
        'visibility'
    ];

    public function sluggable():array{
        return[
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    protected $casts = [
        'content' => 'array',
        'visibility' => 'boolean',
        'tags' => 'string',
        'content_image'=>'array',

    ];

    public function author(){
        return $this -> belongsTo(Admin::class,'author');
    }

    public function category(){
        return $this -> belongsTo(Category::class);
    }
}
