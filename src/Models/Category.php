<?php

declare(strict_types=1);

/*
 * This file is part of Laravel Categories.
 *
 * (c) Konceiver <info@konceiver.dev>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Konceiver\Categories\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Illuminate\Support\Facades\Config;
use Kalnoy\Nestedset\NodeTrait;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Category extends Model
{
    use HasSlug;
    use NodeTrait;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function categories(): MorphTo
    {
        return $this->morphTo();
    }

    public function entries(string $class): MorphToMany
    {
        return $this->morphedByMany($class, 'model', 'model_has_categories');
    }

    public static function tree(): array
    {
        return static::get()->toTree()->toArray();
    }

    public static function findByName(string $name): self
    {
        return static::where('name', $name)->orWhere('slug', $name)->firstOrFail();
    }

    public static function findById(int $id): self
    {
        return static::findOrFail($id);
    }

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()->generateSlugsFrom('name')->saveSlugsTo('slug');
    }

    public function getTable(): string
    {
        return Config::get('categories.tables.categories');
    }
}
