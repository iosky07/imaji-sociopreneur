<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $title_id
 * @property string $title_en
 * @property string $content_id
 * @property string $content_en
 * @property string $created_at
 * @property string $updated_at
 */
class Faq extends Model
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
    protected $fillable = ['title_id', 'title_en', 'content_id', 'content_en', 'created_at', 'updated_at'];

    public static function search($query)
    {
        return empty($query) ? static::query()
            : static::where('title_id', 'like', '%' . $query . '%')
                ->orWhere('title_en', 'like', '%' . $query . '%')
                ->orWhere('content_id', 'like', '%' . $query . '%')
                ->orWhere('content_en', 'like', '%' . $query . '%');
    }

}
