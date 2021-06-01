<?php

namespace App\Models\MachineAddTable;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MachinePmTemplateList extends Model
{

    use HasFactory;
    const CREATED_AT = 'CREATE_TIME';
    const UPDATED_AT = 'MODIFY_TIME';

    public $incrementing = false;
    public $timestamps = false;
    protected $primaryKey = "UNID";
    protected $keyType = 'BigInteger';
    public $table ='PMCS_CMMS_PM_TEMPLATE_LIST';

    protected $fillable = ['SYSTEM_CODE','PM_TEMPLATELIST_UNIDREF','PM_TEMPLATELIST_CHECK','PM_TEMPLATELIST_NAME','PM_TEMPLATELIST_DAY'
    ,'PM_TEMPLATELIST_LASTDUE','PM_TEMPLATELIST_DUE','PM_TEMPLATELIST_NOTIFY','PM_TEMPLATELIST_STATUS'
    ,'CREATE_BY','CREATE_TIME','MODIFY_BY','MODIFY_TIME','UNID','PM_TEMPLATELIST_INDEX','PM_TEMPLATELIST_POINT'];
}
