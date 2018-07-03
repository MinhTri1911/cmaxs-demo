<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 02 Jul 2018 07:56:57 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class TVolumeDiscount
 * 
 * @property int $id
 * @property int $service_id
 * @property int $cl_number
 * @property float $money_discount
 * @property bool $del_flag
 * @property string $created_by
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $updated_by
 *
 * @package App\Models
 */
class TVolumeDiscount extends Eloquent
{
    protected $table = 't_volume_discount';
    public $incrementing = false;

    protected $casts = [
        'id' => 'int',
        'service_id' => 'int',
        'cl_number' => 'int',
        'money_discount' => 'float',
        'del_flag' => 'bool'
    ];

    protected $fillable = [
        'service_id',
        'cl_number',
        'money_discount',
        'del_flag',
        'created_by',
        'updated_by'
    ];
}