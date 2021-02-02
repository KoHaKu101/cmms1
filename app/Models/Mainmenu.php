<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Mainmenu extends Model
{
    use HasFactory,SoftDeletes;
    const CREATED_AT = 'CREATE_TIME';
    const UPDATED_AT = 'MODIFY_TIME';

    public $incrementing = false;
    public $timestamps = false;
    protected $primaryKey = "UNID";
    protected $keyType = 'string';
    public $table ='PMCS_CMMS_MENU';

    protected $fillable = [
         'UNID', 'MENU_NAME', 'MENU_EN', 'MENU_INDEX', 'MENU_STATUS', 'MENU_ICON', 'MENU_CLASS', 'MENU_LINK', 'CREATE_BY', 'CREATE_TIME', 'MODIFY_BY', 'MODIFY_TIME'
    ];

    // public function user(){
    //   return $this->hasOne(User::class,'id','user_id');
    // }
}
