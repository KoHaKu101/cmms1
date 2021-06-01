<?php

namespace App\Models\Machine;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MachineCheckSheet extends Model
{
  use HasFactory;
  const CREATED_AT = 'CREATE_TIME';
  const UPDATED_AT = 'MODIFY_TIME';

  public $incrementing = false;
  public $timestamps = false;
  protected $primaryKey = "UNID";
  protected $keyType = 'BigInteger';
  public $table ='PMCS_CMMS_MACHINE_CHECKSHEET';

  protected $fillable = ['UNID','MACHINE_UNID','MACHINE_CODE','FILE_NAME','FILE_EXT','CHECK_YEAR','CHECK_MONTH'
  ,'CREATE_BY','CREATE_TIME','MODIFY_BY','MODIFY_TIME'
  ];
}
