<?php

namespace App\Models\MachineAddTable;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MachineSysTemSubTable extends Model
{

    use HasFactory;
    const CREATED_AT = 'CREATE_TIME';
    const UPDATED_AT = 'MODIFY_TIME';

    public $incrementing = false;
    public $timestamps = false;
    protected $primaryKey = "SYSTEMSUB_CODE";
    protected $keyType = 'integer';
    public $table ='PMCS_CMMS_MACHINE_SYSTEMSUBTABLE';

    protected $fillable = ['SYSTEM_CODE','SYSTEMSUB_CODE','SYSTEMSUB_NAME','SYSTEMSUB_STATUS',
    'CREATE_BY','CREATE_TIME','MODIFY_BY','MODIFY_TIME','UNID'];
}
