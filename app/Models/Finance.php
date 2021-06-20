<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Auth;

/**
 * @property integer $id
 * @property integer $user_id
 * @property integer $status_id
 * @property integer $type_submission_id
 * @property string $title
 * @property string $money
 * @property string $file
 * @property string $created_at
 * @property string $updated_at
 * @property Status $status
 * @property TypeSubmission $typeSubmission
 * @property User $user
 */
class Finance extends Model
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
    protected $fillable = ['user_id', 'status_id', 'type_finance_id', 'type_submission_id', 'title', 'money', 'file', 'created_at', 'updated_at'];

    public static function searchRab($query)
    {
        if (Auth::user()->role == 1) {
            return empty($query) ? static::query()->whereTypeFinanceId(1)
                : static::whereTypeFinanceId(1)->where(function ($q) use ($query) {
                    $q->where('title', 'like', '%' . $query . '%')
                        ->orWhere('money', 'like', '%' . $query . '%')
                        ->orWhere('created_at', 'like', '%' . $query . '%')
                        ->orWhereHas('status', function ($q) use ($query) {
                            $q->where('title', 'like', '%' . $query . '%');
                        })
                        ->orWhereHas('typeSubmission', function ($q) use ($query) {
                            $q->where('title', 'like', '%' . $query . '%');
                        })
                        ->orWhereHas('user', function ($q) use ($query) {
                            $q->where('name', 'like', '%' . $query . '%');
                        });
                });
        } else {
            return empty($query) ? static::query()->whereTypeFinanceId(1)->whereUserId(Auth::id())
                : static::whereTypeFinanceId(1)->whereUserId(Auth::id())->where(function ($q) use ($query) {
                    $q->where('title', 'like', '%' . $query . '%')
                        ->orWhere('money', 'like', '%' . $query . '%')
                        ->orWhere('created_at', 'like', '%' . $query . '%')
                        ->orWhereHas('status', function ($q) use ($query) {
                            $q->where('title', 'like', '%' . $query . '%');
                        })
                        ->orWhereHas('typeSubmission', function ($q) use ($query) {
                            $q->where('title', 'like', '%' . $query . '%');
                        })
                        ->orWhereHas('user', function ($q) use ($query) {
                            $q->where('name', 'like', '%' . $query . '%');
                        });
                });
        }
    }

    public static function searchSpj($query)
    {
        if (Auth::user()->role == 1) {
            return empty($query) ? static::query()->whereTypeFinanceId(2)
                : static::whereTypeFinanceId(2)->where(function ($q) use ($query) {
                    $q->where('title', 'like', '%' . $query . '%')
                        ->orWhere('money', 'like', '%' . $query . '%')
                        ->orWhere('created_at', 'like', '%' . $query . '%')
                        ->orWhereHas('status', function ($q) use ($query) {
                            $q->where('title', 'like', '%' . $query . '%');
                        })
                        ->orWhereHas('user', function ($q) use ($query) {
                            $q->where('name', 'like', '%' . $query . '%');
                        });
                });
        } else {
            return empty($query) ? static::query()->whereTypeFinanceId(2)->whereUserId(Auth::id())
                : static::whereTypeFinanceId(2)->whereUserId(Auth::id())->where(function ($q) use ($query) {
                    $q->where('title', 'like', '%' . $query . '%')
                        ->orWhere('money', 'like', '%' . $query . '%')
                        ->orWhere('created_at', 'like', '%' . $query . '%')
                        ->orWhereHas('status', function ($q) use ($query) {
                            $q->where('title', 'like', '%' . $query . '%');
                        })
//                        ->orWhereHas('typeSubmission', function ($q) use ($query) {
//                            $q->where('title', 'like', '%' . $query . '%');
//                        })
                        ->orWhereHas('user', function ($q) use ($query) {
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
    public function typeSubmission()
    {
        return $this->belongsTo('App\Models\TypeSubmission');
    }

    public function typeFinance()
    {
        return $this->belongsTo('App\Models\TypeFinance');
    }

    /**
     * @return BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

}
