<?php

namespace App\Models\Machine;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MachineLine extends Model
{
    use HasFactory;
    const CREATED_AT = 'CREATE_TIME';
    const UPDATED_AT = 'MODIFY_TIME';

    public $incrementing = false;
    public $timestamps = false;
    protected $primaryKey = "LINE_CODE";
    protected $keyType = 'string';
    public $table ='PDCS_SYSTEM_LINE';

    protected $fillable = [
    'WAREHOUSE_CODE','LINE_CODE','LINE_NAME','LINE_NOTE','LINE_ICON','LINE_STATUS','CREATE_BY','CREATE_TIME','MODIFY_BY','MODIFY_TIME'
    ,'UNID','LINE_TYPE','LINE_ORDER'];
}
