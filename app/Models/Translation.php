<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Translation extends Model
{
    use HasFactory;

    protected $casts = [
        'value' => 'array'
    ];
    protected $enabledLangs = ['en' => 'English', 'es' => 'Español'];
    protected $fillable = ['model_id', 'model_name', 'lang', 'value'];

    /**
     * Mutators
     */

    protected function lang(): Attribute
    {
        return Attribute::make(
            get: fn (mixed $value, array $attributes) => mb_convert_case($this->enabledLangs[$attributes['lang']] ?? 'Español', MB_CASE_TITLE, 'UTF-8'),
            set: fn (mixed $value, array $attributes) => strtolower(isset($this->enabledLangs[$attributes['lang']]) ? $this->enabledLangs[$attributes['lang']] : 'es')
        );
    }

    /**
     * Relationships
     */
}