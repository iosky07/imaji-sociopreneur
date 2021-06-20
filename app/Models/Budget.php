<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property integer $id
 * @property integer $type_budget_id
 * @property string $title
 * @property string $money
 * @property string $pic_internal
 * @property string $pic_external
 * @property string $note
 * @property string $file
 * @property string $created_at
 * @property string $updated_at
 * @property TypeBudget $typeBudget
 */
class Budget extends Model
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
    protected $fillable = ['type_budget_id', 'title', 'money', 'pic_internal', 'pic_external', 'note', 'file', 'created_at', 'updated_at'];

    public static function search($query)
    {
        return empty($query) ? static::query()
            : static::where('title', 'like', '%' . $query . '%')
                ->orWhere('money', 'like', '%' . $query . '%')
                ->orWhere('pic_internal', 'like', '%' . $query . '%')
                ->orWhere('pic_external', 'like', '%' . $query . '%')
                ->orWhere('created_at', 'like', '%' . $query . '%')
                ->orWhereHas('typeBudget', function ($q) use ($query) {
                    $q->where('title', 'like', '%' . $query . '%');
                });
    }

    /**
     * @return BelongsTo
     */
    public function typeBudget()
    {
        return $this->belongsTo('App\Models\TypeBudget');
    }
}
