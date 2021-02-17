<?php

namespace App\Models\Machine;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MachineType extends Model
{
    use HasFactory;
    protected $fillable = [
    'TYPE_CODE','TYPE_NAME','TYPE_NOTE','TYPE_STATUS','CREATE_BY','CREATE_TIME','MODIFY_BY','MODIFY_TIME','UNID'];
}
