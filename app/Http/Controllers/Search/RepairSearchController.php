<?php

namespace App\Http\Controllers\Search;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Exports\MachineExport;

use App\Models\Machine\Machine;
use Response;



class RepairSearchController extends Controller
{

  public function __construct(){
    $this->middleware('auth');
  }

  public function search(Request $request)
{
  if($request->ajax())
     {
      $output = '';
      $query = $request->get('query');
      if($query != '')
      {
       $data = DB::table('PMCS_MACHINES')
         ->where('MACHINE_CODE', 'like', '%'.$query.'%')
         ->orWhere('MACHINE_NAME', 'like', '%'.$query.'%')
         ->get();

      }
      else
      {
       $data = DB::table('PMCS_MACHINES')
         ->get();
      }
      $total_row = $data->count();
      if($total_row > 0)
      {
       foreach($data as $row)
       {
        $output .= '
        <tr>
         <td>'.$row->MACHINE_CODE.'</td>
         <td>'.$row->MACHINE_NAME.'</td>
        </tr>
        ';
       }
      }
      else
      {
       $output = '
       <tr>
        <td align="center" colspan="5">No Data Found</td>
       </tr>
       ';
      }
      $data = array(
       'table_data'  => $output,
       'total_data'  => $total_row
      );

      echo json_encode($data);
     }
    }

}
