<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property integer $id
 * @property integer $size_logo_id
 * @property string $title
 * @property string $slug
 * @property string $thumbnail
 * @property string $created_at
 * @property string $updated_at
 * @property SizeLogo $sizeLogo
 */
class Partner extends Model
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
    protected $fillable = ['size_logo_id', 'title', 'slug', 'thumbnail', 'created_at', 'updated_at'];

    public static function search($query)
    {
        return empty($query) ? static::query()
            : static::where('title', 'like', '%' . $query . '%')
                ->orWhereHas('sizeLogo', function ($q) use ($query) {
                    $q->where('title', 'like', '%' . $query . '%');
                });
    }

    /**
     * @return BelongsTo
     */
    public function sizeLogo()
    {
        return $this->belongsTo('App\Models\SizeLogo');
    }
}
