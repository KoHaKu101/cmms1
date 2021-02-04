<?php

namespace App\Models\Settingmenu;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Menusubitem extends Model
{
    // use HasFactory;
      use SoftDeletes;
    const CREATED_AT = 'CREATE_TIME';
    const UPDATED_AT = 'MODIFY_TIME';

    public $incrementing = false;
    public $timestamps = false;
    protected $primaryKey = "UNID";
    protected $keyType = 'string';
    public $table ='PMCS_CMMS_MENUSUBITEM';

    protected $fillable = [
        'UNID', 'SUBUNID_REF', 'SUBMENU_NAME', 'SUBMENU_EN', 'SUBMENU_INDEX', 'SUBMENU_STATUS', 'SUBMENU_ICON', 'SUBMENU_CLASS', 'SUBMENU_LINK', 'CREATE_BY', 'CREATE_TIME', 'MODIFY_BY', 'MODIFY_TIME'
    ];
}
