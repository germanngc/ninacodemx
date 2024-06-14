<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Symfony\Component\CssSelector\Node\AttributeNode;

//use Illuminate\Database\Eloquent\Attributes;


class Article extends Model
{
    use HasFactory, SoftDeletes;

    public static $headers = ['id' => 'Id', 'title' => 'Title', 'slug' => 'Slug', 'excerpt' => 'Excerpt', 'content' => 'Content', 'image' => 'Image', 'user_id' => 'User', 'created_at' => 'Created at', 'updated_at' => 'Updated at', 'deleted_at' => 'Deleted_at'];


    protected $fillable = [

        'title',
        'slug',
        'excerpt',
        'content',
        'image',
        'user_id',
            
    ];

    protected $dates = ['deleted_at'];


    protected function image(): Attribute
    {
        return Attribute::make(
            get: fn (mixed $value, array $attributes) => $value ? json_decode($value, true) : null,
            set: fn (mixed $value) => json_encode($value)
        );
    }

    protected function selectValue(): Attribute
    {
        return Attribute::make(
            get: fn (mixed $value, array $attributes) => ucfirst(($attributes['title'] ?? ''))
        );
    }
}