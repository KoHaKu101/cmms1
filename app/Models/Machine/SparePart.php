<?php

namespace App\Models\Machine;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SparePart extends Model
{
    use HasFactory;

    const CREATED_AT = 'CREATE_TIME';
    const UPDATED_AT = 'MODIFY_TIME';

    public $incrementing = false;
    public $timestamps = false;
    protected $primaryKey = "SPAREPART_CODE";
    protected $keyType = 'string';
    public $table ='PMCS_CMMS_SPAREPART';

    protected $fillable = ['SPAREPART_CODE'
,'UNID'
,'SPAREPART_NAME'
,'SPAREPART_MODEL'
,'SPAREPART_SUBMODEL'
,'SPAREPART_REMARK'
,'SPAREPART_SIZE'
,'LAST_STOCK'
,'LAST_PUSCHE_DATE'
,'LAST_ISSUE_DATE'
,'STOCK_MIN'
,'SUPPLIER_CODE'
,'STATUS'
,'SPAREPART_INDEX'
,'SPAREPART_COST'
,'CREATE_BY'
,'CREATE_TIME'
,'MODIFY_BY'
,'MODIFY_TIME'];
}
