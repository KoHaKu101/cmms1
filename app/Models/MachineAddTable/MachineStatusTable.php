<?php

namespace App\Models\MachineaddTable;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MachineStatusTable extends Model
{
    use HasFactory;

    const CREATED_AT = 'CREATE_TIME';
    const UPDATED_AT = 'MODIFY_TIME';

    public $incrementing = false;
    public $timestamps = false;
    protected $primaryKey = "STATUS_CODE";
    protected $keyType = 'integer';
    public $table ='PMCS_CMMS_MACHINE_STATUS';
    protected $fillable = ['UNID','STATUS_CODE','STATUS_NAME','STATUS','CREATE_BY','CREATE_TIME','MODIFY_BY','MODIFY_TIME'];

}
