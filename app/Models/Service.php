<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Cookie;

class Service extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name', 'description', 'slug', 'image', 'order'];

    /**
     * Mutators
     */

    protected function name(): Attribute
    {
        return Attribute::make(
            get: fn (mixed $value, array $attributes) => $this->getTranslation($attributes['id'])['value']['name'] ?? $attributes['name']
        );
    }

    protected function description(): Attribute
    {
        return Attribute::make(
            get: fn (mixed $value, array $attributes) => $this->getTranslation($attributes['id'])['value']['description'] ?? $attributes['description']
        );
    }

    protected function slug(): Attribute
    {
        return Attribute::make(
            get: fn (mixed $value, array $attributes) => $this->getTranslation($attributes['id'])['value']['slug'] ?? $attributes['slug']
        );
    }

    /**
     * Relationships
     */

    /**
     * Translation
     */

    public function getTranslation($model_id)
    {
        $classPath = explode('\\', self::class);
        $translation = Translation::where('model_name', end($classPath))
            ->where('model_id', $model_id)
            ->where('lang', Cookie::get('lang') ?? 'es');
        $translation2 = $translation->first();
        \Log::info('translation: ' . print_r($translation2->toArray() ?? [], true));
        return $translation->first() ? $translation->first()->toArray() : [];
    }

}