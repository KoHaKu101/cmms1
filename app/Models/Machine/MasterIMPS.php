<?php

namespace App\Models\Machine;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterIMPS extends Model
{
  use HasFactory;
  const CREATED_AT = 'CREATE_TIME';
  const UPDATED_AT = 'MODIFY_TIME';

  public $incrementing = false;
  public $timestamps = false;
  protected $primaryKey = "UNID";
  protected $keyType = 'string';
  public $table ='PMCS_CMMS_MASTER_IMPS';

  protected $fillable = ['UNID','PM_TEMPLATE_UNID_REF','MACHINE_CODE','PM_TEMPLATE_NAME'
  ,'CREATE_BY','CREATE_TIME','MODIFY_BY','MODIFY_TIME'
  ];
}
