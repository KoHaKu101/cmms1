<?php

namespace App\Imports;

// use App\Machine\Machnie;
use Maatwebsite\Excel\Concerns\ToModel;
use App\Models\Machine\Machnie;
use Illuminate\Support\Facades\DB;

class MachineImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */


    public function randUNID($table){
      $number = date("ymdhis", time());
      $length=7;
      do {
        for ($i=$length; $i--; $i>0) {
          $number .= mt_rand(0,9);
        }
      }
      while ( !empty(DB::table($table)
      ->where('UNID',$number)
      ->first(['UNID'])) );
      return $number;
    }

    public function model(array $row)
    {
        return new Machnie([
          'MACHINE_CODE' => $row[0],
          'MACHINE_NAME'=> $row[1],
          'MACHINE_CHECK'=> $row[2],
          'MACHINE_MANU'=> $row[3],
          'MACHINE_TYPE'=> $row[4],

          'MACHINE_LOCATION'=> $row[10],
          'MACHINE_MODEL'=> $row[19],
          'MACHINE_SERIAL'=> $row[20],
          'MACHINE_POWER'=> $row[30],
          'MACHINE_WEIGHT'=> $row[31],
          'PURCHASE_FORM'=> $row[43],
          'UNID'         => $this->randUNID('PMCS_MACHINES'),

        ]);
    }
}
