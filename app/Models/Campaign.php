<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $type_campaign_id
 * @property string $title_id
 * @property string $title_en
 * @property string $slug
 * @property string $thumbnail
 * @property string $created_at
 * @property string $updated_at
 * @property TypeCampaign $typeCampaign
 */
class Campaign extends Model
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
    protected $fillable = ['type_campaign_id', 'title_id', 'title_en', 'slug', 'thumbnail', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function typeCampaign()
    {
        return $this->belongsTo('App\Models\TypeCampaign');
    }

    public static function search($query)
    {
        return empty($query) ? static::query()
            : static::where('title_id', 'like', '%' . $query . '%')
                ->orWhere('title_en', 'like', '%' . $query . '%')
                ->orWhere('created_at', 'like', '%' . $query . '%')
                ->orWhereHas('typeCampaign', function ($q) use ($query) {
                    $q->where('title', 'like', '%' . $query . '%');
                });
    }
}
