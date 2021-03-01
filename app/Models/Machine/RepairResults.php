<?php

namespace App\Models\Machine;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class RepairResults extends Model
{

    use HasFactory;
    const CREATED_AT = 'CREATE_TIME';
    const UPDATED_AT = 'MODIFY_TIME';

    public $incrementing = false;
    public $timestamps = false;
    protected $primaryKey = "UNID";
    protected $keyType = 'string';
    public $table ='PMCS_REPAIR_RESULTS';


    protected $fillable = ['DOCNO','DOCDATE','MACHINE_CODE','MACHINE_LINE','NOTE','STATUS','TIMESTAMP','CREATE_BY','CREATE_TIME',
    'MODIFY_BY','MODIFY_TIME','REF_UNID','UNID'
    ];

}
