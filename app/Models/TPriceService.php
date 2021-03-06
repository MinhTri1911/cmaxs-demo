<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 06 Aug 2018 04:29:17 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class TPriceService
 * 
 * @property int $id
 * @property int $service_id
 * @property int $currency_id
 * @property float $price
 * @property float $charge_register
 * @property float $charge_create_data
 * @property bool $del_flag
 * @property string $created_by
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $updated_by
 *
 * @package App\Models
 */
class TPriceService extends Eloquent
{
    protected $table = 't_price_service';

    protected $casts = [
        'service_id' => 'int',
        'currency_id' => 'int',
        'price' => 'float',
        'charge_register' => 'float',
        'charge_create_data' => 'float',
        'del_flag' => 'bool'
    ];

    protected $fillable = [
        'service_id',
        'currency_id',
        'price',
        'charge_register',
        'charge_create_data',
        'del_flag',
        'created_by',
        'updated_by'
    ];
}
