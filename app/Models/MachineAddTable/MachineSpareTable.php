<?php

namespace App\Models\MachineAddTable;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MachineSpareTable extends Model
{
    use HasFactory;

    const CREATED_AT = 'CREATE_TIME';
    const UPDATED_AT = 'MODIFY_TIME';

    public $incrementing = false;
    public $timestamps = false;
    protected $primaryKey = "SPAREPART_CODE";
    protected $keyType = 'TYPE_CODE';
    public $table ='PMCS_CMMS_SPARE_PART_TABLE';

    protected $fillable = ['UNID','SPAREPART_CODE','SPAREPART_NAME','SPAREPART_PRICE','SPAREPART_NOTE','SPAREPART_STATUS','CREATE_BY','CREATE_TIME','MODIFY_BY','MODIFY_TIME'];

}
