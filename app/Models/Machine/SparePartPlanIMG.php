<?php

namespace App\Models\Machine;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SparePartPlanIMG extends Model
{
    use HasFactory;

    const CREATED_AT = 'CREATE_TIME';
    const UPDATED_AT = 'MODIFY_TIME';

    public $incrementing = false;
    public $timestamps = false;
    protected $primaryKey = "UNID";
    protected $keyType = 'BigInteger';
    public $table ='PMCS_CMMS_SPAREPART_PLAN_IMG';

    protected $fillable = ['UNID'
,'PLAN_SPAREPART_UNID'
,'FILE_NAME'
,'FILE_EXT'
,'FILE_PATH'
,'DOC_YEAR'
,'DOC_MONTH'
,'CREATE_BY'
,'CREATE_TIME'
,'MODIFY_BY'
,'MODIFY_TIME'];
}
