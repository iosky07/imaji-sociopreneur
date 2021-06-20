<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Auth;

/**
 * @property integer $id
 * @property integer $user_id
 * @property integer $status_id
 * @property integer $type_content_id
 * @property string $title_id
 * @property string $title_en
 * @property string $slug_id
 * @property string $slug_en
 * @property string $content_id
 * @property string $content_en
 * @property string $thumbnail
 * @property int $view
 * @property string $date_event
 * @property string $note
 * @property string $created_at
 * @property string $updated_at
 * @property Status $status
 * @property TypeContent $typeContent
 * @property User $user
 * @property ContentTag[] $contentTags
 */
class Content extends Model
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
    protected $fillable = ['user_id', 'status_id', 'type_content_id', 'title_id', 'title_en', 'slug_id', 'slug_en', 'content_id', 'content_en', 'thumbnail', 'view', 'date_event', 'note', 'created_at', 'updated_at'];

    public static function search($query)
    {
        if (Auth::user()->role == 1) {
            return empty($query) ? static::query()
                : static::where('title_id', 'like', '%' . $query . '%')
                    ->orWhere('title_en', 'like', '%' . $query . '%')
                    ->orWhere('content_id', 'like', '%' . $query . '%')
                    ->orWhere('content_en', 'like', '%' . $query . '%')
                    ->orWhere('created_at', 'like', '%' . $query . '%')
                    ->orWhereHas('status', function ($q) use ($query) {
                        $q->where('title', 'like', '%' . $query . '%');
                    })->orWhereHas('typeContent', function ($q) use ($query) {
                        $q->where('title', 'like', '%' . $query . '%');
                    })->orWhereHas('user', function ($q) use ($query) {
                        $q->where('name', 'like', '%' . $query . '%');
                    });
        } else {
            return empty($query) ? static::query()->whereUserId(Auth::id())
                : static::whereUserId(Auth::id())->where(function ($q) use ($query) {
                    $q->where('title_id', 'like', '%' . $query . '%')
                        ->orWhere('title_en', 'like', '%' . $query . '%')
                        ->orWhere('content_id', 'like', '%' . $query . '%')
                        ->orWhere('content_en', 'like', '%' . $query . '%')
                        ->orWhere('created_at', 'like', '%' . $query . '%')
                        ->orWhereHas('status', function ($q) use ($query) {
                            $q->where('title', 'like', '%' . $query . '%');
                        })->orWhereHas('typeContent', function ($q) use ($query) {
                            $q->where('title', 'like', '%' . $query . '%');
                        })->orWhereHas('user', function ($q) use ($query) {
                            $q->where('name', 'like', '%' . $query . '%');
                        });
                });
        }
    }

    /**
     * @return BelongsTo
     */
    public function status()
    {
        return $this->belongsTo('App\Models\Status');
    }

    /**
     * @return BelongsTo
     */
    public function typeContent()
    {
        return $this->belongsTo('App\Models\TypeContent');
    }

    /**
     * @return BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    /**
     * @return HasMany
     */
    public function contentTags()
    {
        return $this->hasMany('App\Models\ContentTag');
    }

}
