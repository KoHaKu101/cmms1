<?php

namespace App\Models\Machine;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterIMPSGroup extends Model
{
  use HasFactory;
  const CREATED_AT = 'CREATE_TIME';
  const UPDATED_AT = 'MODIFY_TIME';

  public $incrementing = false;
  public $timestamps = false;
  protected $primaryKey = "UNID";
  protected $keyType = 'string';
  public $table ='PMCS_CMMS_MASTER_IMPS_GP';

  protected $fillable = ['UNID','PM_NEXT_DATE','PM_LAST_DATE','MACHINE_CODE','PM_TEMPLATE_UNID_REF','PM_TEMPLATELIST_NAME','PM_TEMPLATELIST_DAY','PM_TEMPLATELIST_IMPS'
  ,'PM_TEMPLATELIST_LASTDUE_STORE','CREATE_BY','CREATE_TIME','MODIFY_BY','MODIFY_TIME'
  ];
}
