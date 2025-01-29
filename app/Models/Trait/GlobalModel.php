<?php
/**
 * Global Model Trait
 *
 * @package    App\Models
 * @license    https://opensource.org/licenses/MIT MIT License
 */

namespace App\Models\Trait;

use Illuminate\Support\Facades\Cache;

trait GlobalModel
{
    /**
     * Return Model by Cache
     *
     * @param int $id
     * @param array|string $columns
     * @return \Illuminate\Database\Eloquent\($id is (\Illuminate\Contracts\Support\Arrayable<array-key, mixed>|array<mixed>) ? \Illuminate\Database\Eloquent\Collection<int, TModel> : TModel|null)
     *
     * @static
     */
    public static function findWithCache(int $id, $columns = ['*'])
    {
        $cacheName = 'Model:' . static::class . ':' . $id . ':' . implode('_', $columns);

        return Cache::rememberForever($cacheName, function () use ($id, $columns) {
            return static::find($id, $columns);
        });
    }
}
