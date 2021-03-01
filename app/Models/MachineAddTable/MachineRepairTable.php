<?php

namespace App\Models\MachineAddTable;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MachineRepairTable extends Model
{
    use HasFactory;
    const CREATED_AT = 'CREATE_TIME';
    const UPDATED_AT = 'MODIFY_TIME';

    public $incrementing = false;
    public $timestamps = false;
    protected $primaryKey = "REPAIR_CODE";
    protected $keyType = 'integer';
    public $table ='PMCS_CMMS_REPAIR_CHECKBOX';

    protected $fillable = ['UNID','REPAIR_CODE','REPAIR_NAME','REPAIR_TYPE_CODE','REPAIR_NOTE','REPAIR_STATUS','CREATE_BY','CREATE_TIME','MODIFY_BY','MODIFY_TIME'];
}
