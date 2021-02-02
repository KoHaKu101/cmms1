<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class Formfactory extends Model
{
    use HasFactory;
    const CREATED_AT = 'CREATE_TIME';
    const UPDATED_AT = 'MODIFY_TIME';

    public $incrementing = false;
    public $timestamps = false;
    protected $primaryKey = "UNID";
    protected $keyType = 'string';
    public $table ='formfactories';

    protected $fillable = [
      'UNID', 'NUMBER_M', 'PRODUCT_M', 'NAME_M', 'MODEL_M', 'SERIES_M', 'DATE_M',
      'POWER_M', 'WHIGHT_M', 'BUY_M', 'TYPE_M', 'IMG_M', 'QRCODE_M', 'CREATE_BY',
      'CREATE_TIME', 'MODIFY_BY', 'MODIFY_TIME'
    ];
}
