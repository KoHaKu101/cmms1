<?php

namespace App\Models\Machine;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MachineSparePart extends Model
{
    use HasFactory;

    const CREATED_AT = 'CREATE_TIME';
    const UPDATED_AT = 'MODIFY_TIME';

    public $incrementing = false;
    public $timestamps = false;
    protected $primaryKey = "MACHINE_UNID,SPAREPART_UNID";
    protected $keyType = 'BigInteger';
    public $table ='PMCS_CMMS_MACHINE_SPAREPART';

    protected $fillable = ['UNID'
,'MACHINE_UNID'
,'MACHINE_CODE'
,'SPAREPART_UNID'
,'SPAREPART_NAME'
,'SPAREPART_CODE'
,'STATUS'
,'REMARK'
,'SPAREPART_QTY'
,'PERIOD'
,'LAST_CHANGE'
,'NEXT_PLAN_DATE'
,'COST_STD'
,'CREATE_BY'
,'CREATE_TIME'
,'MODIFY_BY'
,'MODIFY_TIME'];
}
