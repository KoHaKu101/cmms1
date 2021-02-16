<?php

namespace App\Models\Machine;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Upload extends Model
{
    use HasFactory;
    const CREATED_AT = 'CREATE_TIME';
    const UPDATED_AT = 'MODIFY_TIME';

    public $incrementing = false;
    public $timestamps = false;
    protected $primaryKey = "UNID";
    protected $keyType = 'string';
    public $table ='UPLOAD';

    protected $fillable = [
    'UNID','UPLOAD_UNID_REF' ,'MACHINE_CODE', 'TOPIC_NAME', 'FILE_UPLOAD', 'FILE_SIZE', 'FILE_NAME', 'FILE_EXTENSION', 'FILE_UPLOADDATETIME', 'CREATE_BY', 'CREATE_TIME', 'MODIFY_BY', 'MODIFY_TIME'];
}
