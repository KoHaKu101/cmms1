<?php

namespace App\Models\Settingmenu;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class MailAlert extends Model
{
    use HasFactory;
    const CREATED_AT = 'CREATE_TIME';
    const UPDATED_AT = 'MODIFY_TIME';

    public $incrementing = false;
    public $timestamps = false;
    protected $primaryKey = "UNID";
    protected $keyType = 'BigInteger';
    public $table ='PMCS_CMMS_SETUP_MAIL_ALERT';

    protected $fillable = [
         'UNID', 'EMAILADDRESS1', 'EMAILADDRESS2', 'EMAILADDRESS3', 'EMAILADDRESS4', 'EMAILADDRESS5','CREATE_BY', 'CREATE_TIME', 'MODIFY_BY', 'MODIFY_TIME'
    ];

    // public function user(){
    //   return $this->hasOne(User::class,'id','user_id');
    // }
}
