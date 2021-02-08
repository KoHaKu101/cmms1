<?php

namespace App\Imports;

// use App\Machine\Machnie;
use Maatwebsite\Excel\Concerns\ToModel;
use App\Models\Machine\Machnie;
use Illuminate\Support\Facades\DB;

use Carbon\Carbon;
use Auth;
use Closure;

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
          // 'MACHINE_TYPE_STATUS'=> $row[5],
          // 'MACHINE_STARTDATE'=> $row[6],
          // 'MACHINE_RVE_DATE'=> $row[7],
          'MACHINE_ICON'=> $row[8],
          // 'MACHINE_PRICE'=> $row[9],
          'MACHINE_LINE'=> $row[10],
          'GROUP_NAME'=> $row[11],
          // 'MACHINE_MA_COST'=> $row[12],
          // 'MACHINE_TOTAL_FEED'=> $row[13],
          // 'MACHINE_TOTAL_STOP'=> $row[14],
          'MACHINE_SPEED_UNIT'=> $row[15],
          'MACHINE_LOCATION'=> $row[16],
          'MACHINE_GROUP'=> $row[17],
          'MACHINE_PARTNO'=> $row[18],
          'MACHINE_MODEL'=> $row[19],
          'MACHINE_SERIAL'=> $row[20],
          'MACHINE_FACTORY'=> $row[21],
          'COMPANY_PAY'=> $row[22],
          'COMPANY_SETUP'=> $row[23],
          'MACHINE_CAPACITY'=> $row[24],
          // 'MACHINE_SPEED'=> $row[25],
          // 'MACHINE_MTBF'=> $row[26],
          // 'MACHINE_MTTF'=> $row[27],
          // 'MACHINE_MTTR'=> $row[28],
          // 'MACHINE_EFFICIENCY'=> $row[29],
          'MACHINE_POWER'=> $row[30],
          'MACHINE_WEIGHT'=> $row[31],
          'MACHINE_TARGET'=> $row[32],
          // 'MACHINE_NOTE'=> $row[33],
          // 'MACHINE_STATUS'=> $row[34],
          // 'MACHINE_POSTED'=> $row[35],
          'PCDS_MACHINE_CODE'=> $row[36],
          'WAREHOUSE_CODE'=> $row[37],
          'GROUP_CODE'=> $row[38],
          'LOCATION_CODE'=> $row[39],
          'SECTION_CODE'=> $row[40],
          'SUPPLIER_CODE'=> $row[41],
          'SUPPLIER_NAME'=> $row[42],
          'PURCHASE_FORM'=> $row[43],
          'EMP_CODE'=> $row[43],
          // 'EMP_NAME'=> $row[44],
          // 'POS_REF_UNID'=> $row[45],
          'CREATE_BY' => Auth::user()->name,
          'CREATE_TIME'=> Carbon::now(),
          'UNID'         => $this->randUNID('PMCS_MACHINES'),
          // 'SHIFT_TYPE'=> $row[56],
          'ESP_MAC'=> $row[57],


        ]);
    }
}
