<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

trait Sluggable
{
    /**
     * The "booting" method of the model.
     *
     * @return void
     */
    protected static function bootSluggable()
    {
        static::creating(
            function ($model) {
                $model->slug = self::makeSlug($model);
            }
        );
    }

    public static function makeSlug(Model $model, int $count = 0): string
    {
        if ($count > 0) {
            $slug = Str::slug($model->name.'-'.$count);
        } else {
            $slug = Str::slug($model->name);
        }

        if ($model::where('slug', $slug)->exists()) {
            $count++;
            $slug = self::makeSlug($model, $count);
        }

        return $slug;
    }
}
