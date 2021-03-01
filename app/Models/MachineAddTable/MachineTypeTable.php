<?php

namespace App\Models\MachineAddTable;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MachineTypeTable extends Model
{

    use HasFactory;
    const CREATED_AT = 'CREATE_TIME';
    const UPDATED_AT = 'MODIFY_TIME';

    public $incrementing = false;
    public $timestamps = false;
    protected $primaryKey = "TYPE_CODE";
    protected $keyType = 'integer';
    public $table ='PMCS_MACHINE_TYPE';

    protected $fillable = ['TYPE_CODE','TYPE_NAME','TYPE_NOTE','TYPE_STATUS',
    'TYPE_ICON','CREATE_BY','CREATE_TIME','MODIFY_BY','MODIFY_TIME','UNID'];
}
