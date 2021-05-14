<?php

namespace App\Models\Machine;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Uploadimg extends Model
{
  use HasFactory;
  const CREATED_AT = 'CREATE_TIME';
  const UPDATED_AT = 'MODIFY_TIME';

  public $incrementing = false;
  public $timestamps = false;
  protected $primaryKey = "UNID";
  protected $keyType = 'BigInteger';
  public $table ='PMCS_CMMS_UPLOAD_IMG';

  protected $fillable = ['UNID','UNID_REF','FILE_NAME','FILE_EXT','CREATE_BY','CREATE_TIME','MODIFY_BY','MODIFY_TIME'
  ];
}
