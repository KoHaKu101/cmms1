<?php

namespace App\Models\Machine;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pmplanresult extends Model
{
  use HasFactory;
  const CREATED_AT = 'CREATE_TIME';
  const UPDATED_AT = 'MODIFY_TIME';

  public $incrementing = false;
  public $timestamps = false;
  protected $primaryKey = "UNID";
  protected $keyType = 'string';
  public $table ='PMCS_CMMS_PM_RESULT';

  protected $fillable = ['UNID','PM_PLAN_UNID' ,'PLAN_DATE','MACHINE_PLAN_UNID','MACHINE_CODE','MACHINE_LINE','MACHINE_NAME'
  ,'PM_MASTER_UNID','PM_MASTER_NAME','PM_MASTER_DETAIL_NAME' ,'PM_MASTER_DETAIL_UNID','PM_MASTER_DETAIL_INPUT','PM_MASTER_DETAIL_RESULT'
  ,'PM_MASTER_STATUS' ,'PM_MASTERPLPAN_REMARK','PM_USER_CHECK','PM_MASTER_DETAIL_VALUE_STD','PM_MASTER_DETAIL_TYPE_INPUT',
'PM_MASTER_DETAIL_VALUE_STD_MIN','PM_MASTER_DETAIL_VALUE_STD_MAX','PM_MASTER_DETAIL_INDEX','PM_MASTER_DETAIL_TYPE_INPUT'
,'PM_MASTER_LIST_UNID','PM_MASTER_LIST_NAME','PM_MASTER_LIST_INDEX','PM_STATUS_STD_MAX','PM_STATUS_STD_MIN','CHECK_DATE'
,'CREATE_BY' ,'CREATE_TIME' ,'MODIFY_BY' ,'MODIFY_TIME'
  ];
}
