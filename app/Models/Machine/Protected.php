<?php

namespace App\Models\Machine;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Protected extends Model
{
    use HasFactory;
    protected $table = "PMCS_MACHINES";
    protected $table = "PMCS_MACHINE_TYPE";
    protected $table = "PMCS_CMMS_REPAIR_CHECKBOX";
}
