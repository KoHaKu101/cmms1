<?php

namespace App\Models\Machine;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Machnie extends Model
{

    use HasFactory;
    const CREATED_AT = 'CREATE_TIME';
    const UPDATED_AT = 'MODIFY_TIME';

    public $incrementing = false;
    public $timestamps = false;
    protected $primaryKey = "MACHINE_CODE";
    protected $keyType = 'string';
    public $table ='PMCS_MACHINES';

    protected $fillable = [
      'MACHINE_CODE', 'MACHINE_NAME', 'MACHINE_CHECK', 'MACHINE_MANU', 'MACHINE_TYPE',
      'MACHINE_TYPE_STATUS', 'MACHINE_STARTDATE', 'MACHINE_RVE_DATE', 'MACHINE_ICON',
      'MACHINE_PRICE', 'MACHINE_LINE', 'GROUP_NAME', 'MACHINE_MA_COST', 'MACHINE_TOTAL_FEED',
      'MACHINE_TOTAL_STOP', 'MACHINE_SPEED_UNIT', 'MACHINE_LOCATION', 'MACHINE_GROUP', 'MACHINE_PARTNO',
      'MACHINE_MODEL', 'MACHINE_SERIAL', 'MACHINE_FACTORY', 'COMPANY_PAY', 'COMPANY_SETUP',
      'MACHINE_CAPACITY', 'MACHINE_SPEED', 'MACHINE_MTBF', 'MACHINE_MTTF', 'MACHINE_MTTR',
      'MACHINE_EFFICIENCY', 'MACHINE_POWER', 'MACHINE_WEIGHT', 'MACHINE_TARGET', 'MACHINE_NOTE',
      'MACHINE_STATUS', 'MACHINE_POSTED', 'PCDS_MACHINE_CODE', 'WAREHOUSE_CODE', 'GROUP_CODE',
      'LOCATION_CODE', 'SECTION_CODE', 'SUPPLIER_CODE', 'SUPPLIER_NAME', 'PURCHASE_FORM',
       'EMP_CODE', 'EMP_NAME', 'POS_REF_UNID', 'POS_X', 'POS_Y', 'POS_W', 'POS_H', 'CREATE_BY',
       'CREATE_TIME', 'MODIFY_BY', 'MODIFY_TIME', 'UNID', 'SHIFT_TYPE', 'ESP_MAC'
    ];
}
