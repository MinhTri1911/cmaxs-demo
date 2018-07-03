<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 02 Jul 2018 07:56:57 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class MNation
 * 
 * @property int $id
 * @property string $code
 * @property int $iso_number
 * @property string $iso_code
 * @property string $name_jp
 * @property string $name_en
 * @property string $currency_code
 * @property bool $del_flag
 * @property string $created_by
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $updated_by
 *
 * @package App\Models
 */
class MNation extends Eloquent
{
    protected $table = 'm_nation';
    public $incrementing = false;

    protected $casts = [
        'id' => 'int',
        'iso_number' => 'int',
        'del_flag' => 'bool'
    ];

    protected $fillable = [
        'code',
        'iso_number',
        'iso_code',
        'name_jp',
        'name_en',
        'currency_code',
        'del_flag',
        'created_by',
        'updated_by'
    ];
}