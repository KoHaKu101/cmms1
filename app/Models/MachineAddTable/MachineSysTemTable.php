<?php

namespace App\Models\MachineAddTable;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MachineSysTemTable extends Model
{

    use HasFactory;
    const CREATED_AT = 'CREATE_TIME';
    const UPDATED_AT = 'MODIFY_TIME';

    public $incrementing = false;
    public $timestamps = false;
    protected $primaryKey = "SYSTEM_CODE";
    protected $keyType = 'integer';
    public $table ='PMCS_CMMS_MACHINE_SYSTEMTABLE';

    protected $fillable = ['SYSTEM_CODE','SYSTEM_NAME','SYSTEM_NOTE','SYSTEM_STATUS',
    'SYSTEM_ICON','CREATE_BY','CREATE_TIME','MODIFY_BY','MODIFY_TIME','UNID'];
}
