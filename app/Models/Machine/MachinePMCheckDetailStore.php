<?php

namespace App\Models\Machine;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MachineSysTemSubCheck extends Model
{
  use HasFactory;
  const CREATED_AT = 'CREATE_TIME';
  const UPDATED_AT = 'MODIFY_TIME';

  public $incrementing = false;
  public $timestamps = false;
  protected $primaryKey = "UNID";
  protected $keyType = 'string';
  public $table ='PMCS_CMMS_MACHINE_PM_DEAILSTORE';

  protected $fillable = ['UNID','MACHINEPM_STORE_UNID_REF','PM_DETAIL_NAME_STORE','MACHINEPM_CHECK_STORE','MACHINEPM_NOTE_STORE'
  ,'MACHINEPM_FAIL_NOTE_STORE','MACHINEPM_FIX_NOTE_STORE','MACHINE_USER_CHECK_STORE'
  ,'CREATE_BY','CREATE_TIME','MODIFY_BY','MODIFY_TIME'
  ];
}
