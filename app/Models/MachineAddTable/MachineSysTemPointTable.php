<?php

namespace App\Models\MachineAddTable;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MachineDetailPointTable extends Model
{

    use HasFactory;
    const CREATED_AT = 'CREATE_TIME';
    const UPDATED_AT = 'MODIFY_TIME';

    public $incrementing = false;
    public $timestamps = false;
    protected $primaryKey = "UNID";
    protected $keyType = 'string';
    public $table ='PMCS_CMMS_MACHINE_DETAILPOINTTABLE';

    protected $fillable = ['UNID','SYSTEMPOINTTABLE_UNID_REF','DETAILPOINTTABLE_ID','DETAILPOINTTABLE_NAME'
    ,'CREATE_BY','CREATE_TIME','MODIFY_BY','MODIFY_TIME'];
}
