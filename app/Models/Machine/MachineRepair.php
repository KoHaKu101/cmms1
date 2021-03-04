<?php

namespace App\Models\Machine;

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
    public $table ='PMCS_REPAIR_MACHINE';


    protected $fillable = ['MACHINE_DOCNO','MACHINE_DOCDATE','MACHINE_TIME','MACHINE_NUMBER','MACHINE_CODE','MACHINE_NAME',
    'MACHINE_LOCATION','MACHINE_CAUSE','MACHINE_CAUSE_DT','MACHINE_BY_REPAIR','REPAIR_DOCDATE','REPAIR_TIME','MACHINE_INSPECTION',
    'MACHINE_BECAUSE','MACHINE_NOTE','STATUS','POSTED','TODAY_DOC','TODAY_YY','TODAY_MM','TODAY_MAX','CREATE_BY','CREATE_TIME',
    'MODIFY_BY','MODIFY_TIME','UNID','EMP_CODE','EMP_NAME','SECTION_CODE','MACHINE_TYPE','BU_JOB_NAME','BU_TYPE','BU_DESCRIPTION',
    'BU_DUEDATE','RP_CODE','EG_DESC','EG_TYYPE','EX_DESC1','RECORD_STATUS','TIMESTAMP','CLOSE_STATUS','CM_STARTDATE','CM_ENDDATE',
    'CLOSE_BY','CLOSE_TIME'
    ];

}
