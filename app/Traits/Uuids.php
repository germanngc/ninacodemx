<?php

namespace App\Traits;

use Illuminate\Support\Str;

trait Uuids
{
	/**
	 * Boot function from Laravel.
	 */
	protected static function boot()
	{
		parent::boot();
		static::creating(function ($model) {
			if (empty($model->{$model->getKeyName()})) {
				$model->{$model->getKeyName()} = Str::uuid()->toString();
			}
		});
	}

	/**
	 * Get Incrementing
	 * 
	 * @return false
	 */
	public function getIncrementing(): bool
	{
		return false;
	}

	/**
	 * Get Key Type
	 * 
	 * @return string
	 */
	public function getKeyType(): string
	{
		return 'string';
	}
}