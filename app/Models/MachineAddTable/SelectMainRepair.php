<?php

namespace App\Models\MachineAddTable;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SelectMainRepair extends Model
{
    use HasFactory;
    const CREATED_AT = 'CREATE_TIME';
    const UPDATED_AT = 'MODIFY_TIME';

    public $incrementing = false;
    public $timestamps = false;
    protected $primaryKey = "UNID";
    protected $keyType = 'BigInteger';
    public $table ='PMCS_CMMS_SELECT_MAIN_REPAIR';

    protected $fillable = [ 'UNID'
,'REPAIR_MAINSELECT_NAME'
,'REPAIR_MAINSELECT_INDEX'
,'REMARK'
,'STATUS'
,'CREATE_BY'
,'CREATE_TIME'
,'MODIFY_BY'
,'MODIFY_TIME' ];
}
