<?php

namespace App\Models\Machine;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MachinePMCheckDetail extends Model
{
  use HasFactory;
  const CREATED_AT = 'CREATE_TIME';
  const UPDATED_AT = 'MODIFY_TIME';

  public $incrementing = false;
  public $timestamps = false;
  protected $primaryKey = "UNID";
  protected $keyType = 'string';
  public $table ='PMCS_CMMS_MACHINE_PM_DEAIL';

  protected $fillable = ['UNID','MACHINEPM_UNID_REF','MACHINE_UNID_REF','MACHINEPM_CHECK','MACHINEPM_FIX','MACHINEPM_NOTE','MACHINE_CHECK_TIME'
  ,'MACHINEPM_FAIL_NOTE','MACHINEPM_FIX_NOTE','MACHINE_USER_CHECK','CREATE_BY','CREATE_TIME','MODIFY_BY','MODIFY_TIME'
  ];
}
