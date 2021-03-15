<?php

namespace App\Models\Machine;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MachineSysTemCheck extends Model
{
  use HasFactory;
  const CREATED_AT = 'CREATE_TIME';
  const UPDATED_AT = 'MODIFY_TIME';

  public $incrementing = false;
  public $timestamps = false;
  protected $primaryKey = "UNID";
  protected $keyType = 'string';
  public $table ='PMCS_CMMS_MACHINE_SYSTEMCHECK';


  protected $fillable = ['UNID','MACHINE_UNID_REF','SYSTEM_CODE','SYSTEM_MONTH','SYSTEM_MONTHCHECK'
  ,'CREATE_BY','CREATE_TIME','MODIFY_BY','MODIFY_TIME'
  ];
}
