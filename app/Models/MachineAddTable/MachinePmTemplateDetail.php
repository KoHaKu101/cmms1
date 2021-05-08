<?php

namespace App\Models\MachineAddTable;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MachinePmTemplateDetail extends Model
{

    use HasFactory;
    const CREATED_AT = 'CREATE_TIME';
    const UPDATED_AT = 'MODIFY_TIME';

    public $incrementing = false;
    public $timestamps = false;
    protected $primaryKey = "UNID";
    protected $keyType = 'BigInteger';
    public $table ='PMCS_CMMS_PM_TEMPLATE_DETAIL';

    protected $fillable = ['UNID','PM_TEMPLATELIST_UNID_REF','PM_DETAIL_NAME','PM_DETAIL_STD','PM_TYPE_INPUT','CREATE_BY','CREATE_TIME','MODIFY_BY','MODIFY_TIME'];
}
