<?php

namespace App\Models\Machine;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MachineEMP extends Model
{
    use HasFactory;

    const CREATED_AT = 'CREATE_TIME';
    const UPDATED_AT = 'MODIFY_TIME';

    public $incrementing = false;
    public $timestamps = false;
    protected $primaryKey = "EMP_CODE";
    protected $keyType = 'integer';
    public $table ='PMCS_MACHINE_EMP';

    protected $fillable = ['EMP_CODE','EMP_NAME','EMP_ICON','EMP_GROUP','EMP_NOTE','EMP_STATUS','CREATE_BY','CREATE_TIME','MODIFY_BY','MODIFY_TIME','UNID'];
}
