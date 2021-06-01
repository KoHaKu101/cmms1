<?php

namespace App\Models\MachineAddTable;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SelectSubRepair extends Model
{
    use HasFactory;
    const CREATED_AT = 'CREATE_TIME';
    const UPDATED_AT = 'MODIFY_TIME';

    public $incrementing = false;
    public $timestamps = false;
    protected $primaryKey = "UNID";
    protected $keyType = 'BigInteger';
    public $table ='PMCS_CMMS_SELECT_SUB_REPAIR';

    protected $fillable = ['UNID'
,'REPAIR_MAINSELECT_UNID'
,'REPAIR_SUBSELECT_NAME'
,'REPAIR_SUBSELECT_INDEX'
,'REMARK'
,'STATUS'
,'STATUS_MACHINE'
,'CREATE_BY'
,'CREATE_TIME'
,'MODIFY_BY'
,'MODIFY_TIME'];
}
