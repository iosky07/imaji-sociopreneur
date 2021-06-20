<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $name
 * @property string $position
 * @property string $content_id
 * @property string $content_en
 * @property string $thumbnail
 * @property string $created_at
 * @property string $updated_at
 */
class Testimonial extends Model
{
    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['name', 'position', 'content_id', 'content_en', 'thumbnail', 'created_at', 'updated_at'];
    public static function search($query)
    {
        return empty($query) ? static::query()
            : static::where('title', 'like', '%' . $query . '%')
                ->orWhere('position', 'like', '%' . $query . '%')
                ->orWhere('content_id', 'like', '%' . $query . '%')
                ->orWhere('content_en', 'like', '%' . $query . '%');
    }
}
