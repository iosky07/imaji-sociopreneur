<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $phone
 * @property string $address
 * @property string $opens
 * @property string $full_address
 * @property string $email
 * @property string $facebook
 * @property string $twitter
 * @property string $instagram
 * @property string $whatsapp
 * @property int $number_village
 * @property int $number_garbage_bank
 * @property int $number_imaji_academy
 * @property int $number_cooperation
 * @property int $number_public_community
 * @property string $created_at
 * @property string $updated_at
 */
class Home extends Model
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
    protected $fillable = ['phone', 'address', 'opens', 'full_address', 'email', 'facebook', 'twitter', 'instagram', 'whatsapp', 'number_village', 'number_garbage_bank', 'number_imaji_academy', 'number_cooperation', 'number_public_community', 'created_at', 'updated_at'];

}
