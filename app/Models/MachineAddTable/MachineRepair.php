<?php

namespace App\Models\MachineAddTable;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MachineRepair extends Model
{
    use HasFactory;
    const CREATED_AT = 'CREATE_TIME';
    const UPDATED_AT = 'MODIFY_TIME';

    public $incrementing = false;
    public $timestamps = false;
    protected $primaryKey = "UNID";
    protected $keyType = 'string';
    public $table ='PMCS_CMMS_REPAIR_CHECKBOX';

    protected $fillable = ['UNID','REPAIR_CODE','REPAIR_NAME','REPAIR_TYPE_CODE','REPAIR_NOTE','CREATE_BY','CREATE_TIME','MODIFY_BY','MODIFY_TIME'];
}
