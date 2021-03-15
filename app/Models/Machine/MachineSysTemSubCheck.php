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
  public $table ='PMCS_CMMS_MACHINE_SYSTEMSUBCHECK';


  protected $fillable = ['UNID','SYSTEMCHECK_UNID_REF','SYSTEM_CODE','SYSTEMSUB_CODE','SYSTEMSUB_NAME'
  ,'SYSTEMSUB_STD','SYSTEMSUB_STORE','CREATE_BY','CREATE_TIME','MODIFY_BY','MODIFY_TIME'
  ];
}
