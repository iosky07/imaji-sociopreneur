<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Auth;

/**
 * @property integer $id
 * @property integer $user_id
 * @property string $title
 * @property string $content
 * @property string $created_at
 * @property string $updated_at
 * @property User $user
 */
class Report extends Model
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
    protected $fillable = ['user_id', 'title', 'content', 'created_at', 'updated_at'];

    public static function search($query)
    {
        if (Auth::user()->role == 1) {
            return empty($query) ? static::query()
                : static::where('title', 'like', '%' . $query . '%')
                    ->orWhere('created_at', 'like', '%' . $query . '%')
                    ->orWhereHas('user', function ($q) use ($query) {
                        $q->where('name', 'like', '%' . $query . '%');
                    });

        } else {
            return empty($query) ? static::query()->whereUserId(Auth::id())
                : static::whereUserId(Auth::id())->where(function ($q) use ($query) {
                    $q->where('title', 'like', '%' . $query . '%')
                        ->orWhere('created_at', 'like', '%' . $query . '%')
                        ->orWhereHas('user', function ($q) use ($query) {
                            $q->where('name', 'like', '%' . $query . '%');
                        });
                });
        }
    }

    /**
     * @return BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
