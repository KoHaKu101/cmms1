<?php

namespace App\Http\Controllers\Machine;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Middleware\VerifyCsrfToken;
use Carbon\Carbon;
use Auth;
//******************** model ***********************
use App\Models\MachineAddTable\SelectMainRepair;
use App\Models\MachineAddTable\SelectSubRepair;
use App\Models\Machine\Machine;
use App\Models\Machine\MachineEMP;
use App\Models\Machine\MachineRepair;
//************** Package form github ***************
use App\Exports\MachineExport;
use Maatwebsite\Excel\Facades\Excel;

class MachineRepairController extends Controller
{
  public function __construct(){
    $this->middleware('auth');
  }
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
  public function Index(){

    $dataset = MachineRepair::orderby('CLOSE_STATUS','DESC')->orderBy('MACHINE_DOCDATE','DESC')->paginate(10);
    //dd($data_set);
    return View('machine/repair/repairlist',compact('dataset'));
  }

  public function PrepareSearch(){

    return View('machine/repair/search');
  }

  public function Create($MACHINE_CODE){

      $dataset = SelectMainRepair::where('STATUS','=','9')->get();
      $data_emp = MachineEMP::select('EMP_CODE','EMP_NAME')->selectraw('dbo.decode_utf8(EMP_NAME) as EMP_NAME')->where('EMP_STATUS','=','0')->where('MACHINE_CODE','=',$MACHINE_CODE)->get();
      $datamachine = Machine::where('MACHINE_CODE','=',$MACHINE_CODE)->first();

    return View('machine/repair/formreq',compact('dataset','datamachine','data_emp'));
  }
  public function Store(Request $request){

    $validated = $request->validate([
      'EMP_CODE'            => 'required|integer|min:6|max:6',
      ],
      [
      'EMP_CODE.required'   => 'กรุณราใส่รหัสพนักงาน',
      'EMP_CODE.integer'    => 'กรุณราใส่รหัสพนักงานเป็นตัวเลขเท่านั้น',
      'EMP_CODE.min'        => 'รหัสต้องไม่ต่ำกว่า 6 ตัวอักษร',
      'EMP_CODE.max'        => 'รหัสต้องไม่มากกว่า 6 ตัวอักษร',
      ]);
    if ($request->MACHINE_NOTE or $request->MACHINE_CAUSE > 0 ) {

      if(!empty($request->MACHINE_NOTE)){
        // $arraymachinerepair = array($request->MACHINE_REPAIR);
        $MACHINE_NOTE = implode(" ",$request->MACHINE_NOTE);

      }elseif(empty($request->MACHINE_NOTE)) {
        $MACHINE_NOTE = NULL;
      }
      $request->CLOSE_STATUS = '9';
      MachineRepair::insert([
          'MACHINE_DOCNO'         => $request->MACHINE_DOCNO,
          'MACHINE_DOCDATE'       => $request->MACHINE_DOCDATE,
          'MACHINE_TIME'          => $request->MACHINE_TIME,
          'MACHINE_NUMBER'        => $request->MACHINE_NUMBER,
          'MACHINE_CODE'          => $request->MACHINE_CODE,
          'MACHINE_NAME'          => $request->MACHINE_NAME,
          'MACHINE_LOCATION'      => $request->MACHINE_LOCATION,
          'MACHINE_CAUSE'         => $request->MACHINE_CAUSE,
          'MACHINE_CAUSE_DT'      => $request->MACHINE_CAUSE_DT,
          'MACHINE_BY_REPAIR'     => $request->MACHINE_BY_REPAIR,
          'REPAIR_DOCDATE'        => $request->REPAIR_DOCDATE,
          'REPAIR_TIME'           => $request->REPAIR_TIME,
          'MACHINE_INSPECTION'    => $request->MACHINE_INSPECTION,
          'MACHINE_BECAUSE'       => $request->MACHINE_BECAUSE,
          'MACHINE_NOTE'          => $MACHINE_NOTE,
          'STATUS'                => $request->STATUS,
          'POSTED'                => $request->POSTED,
          'TODAY_DOC'             => $request->TODAY_DOC,
          'TODAY_YY'              => $request->TODAY_YY,
          'TODAY_MM'              => $request->TODAY_MM,
          'TODAY_MAX'             => $request->TODAY_MAX,
          'EMP_CODE'              => $request->EMP_CODE,
          'EMP_NAME'              => $request->EMP_NAME,
          'SECTION_CODE'          => $request->SECTION_CODE,
          'MACHINE_TYPE'          => $request->MACHINE_TYPE,
          'BU_JOB_NAME'           => $request->BU_JOB_NAME,
          'BU_TYPE'               => $request->BU_TYPE,
          'BU_DESCRIPTION'        => $request->BU_DESCRIPTION,
          'BU_DUEDATE'            => $request->BU_DUEDATE,
          'RP_CODE'               => $request->RP_CODE,
          'EG_DESC'               => $request->EG_DESC,
          'EG_TYYPE'              => $request->EG_TYYPE,
          'EX_DESC1'              => $request->EX_DESC1,
          'RECORD_STATUS'         => $request->RECORD_STATUS,
          'TIMESTAMP'             => $request->TIMESTAMP,
          'CLOSE_STATUS'          => $request->CLOSE_STATUS,
          'CM_STARTDATE'          => $request->CM_STARTDATE,
          'CM_ENDDATE'            => $request->CM_ENDDATE,
          'CLOSE_BY'              => $request->CLOSE_BY,
          'CLOSE_TIME'            => $request->CLOSE_TIME,
          'CREATE_BY'             => $request->EMP_NAME,
          'CREATE_TIME'           => Carbon::now(),
          'UNID'                  => $this->randUNID('PMCS_REPAIR_MACHINE'),
      ]);
      return redirect()->route('repair.list');
    }else {
      $validated = $request->validate([
        'MACHINE_NOTE'           => 'required|max:50',
        ],
        [
        'MACHINE_NOTE.required'  => 'ไม่มีข้อมูลอาการเสีย',
        ]);
    }
  }
  public function Edit($UNID) {
      $dataset = MachineRepair::where('UNID','=',$UNID)->first();
      $data = MachineRepair::select('MACHINE_NOTE','UNID')->where('UNID',$UNID)->first();
      $datanote = array( 'data' => explode(',',$data->MACHINE_NOTE),);
      $datarepair = MachineRepairTable::where('REPAIR_STATUS','=','9')->get();
      $datamachine = Machine::where('MACHINE_CODE','=',$dataset->MACHINE_CODE)->first();

    return view('machine/repair/edit',compact('data','datanote','dataset','datarepair','datamachine'));

  }
  public function Update(Request $request,$UNID){

      if(!empty($request->MACHINE_NOTE)){
        $MACHINE_NOTE = implode(",",$request->MACHINE_NOTE);

      }elseif(empty($request->MACHINE_NOTE)) {

        $MACHINE_NOTE = $request->MACHINE_NOTE;

      }
    $request->CLOSE_STATUS = '9';
    $data_set = MachineRepair::where('UNID','=',$UNID)->update([
          'MACHINE_DOCNO'         => $request->MACHINE_DOCNO,
          'MACHINE_DOCDATE'       => $request->MACHINE_DOCDATE,
          'MACHINE_TIME'          => $request->MACHINE_TIME,
          'MACHINE_NUMBER'        => $request->MACHINE_NUMBER,
          'MACHINE_CODE'          => $request->MACHINE_CODE,
          'MACHINE_NAME'          => $request->MACHINE_NAME,
          'MACHINE_LOCATION'      => $request->MACHINE_LOCATION,
          'MACHINE_CAUSE'         => $request->MACHINE_CAUSE,
          'MACHINE_CAUSE_DT'      => $request->MACHINE_CAUSE_DT,
          'MACHINE_BY_REPAIR'     => $request->MACHINE_BY_REPAIR,
          'REPAIR_DOCDATE'        => $request->REPAIR_DOCDATE,
          'REPAIR_TIME'           => $request->REPAIR_TIME,
          'MACHINE_INSPECTION'    => $request->MACHINE_INSPECTION,
          'MACHINE_BECAUSE'       => $request->MACHINE_BECAUSE,
          'MACHINE_NOTE'          => $MACHINE_NOTE,
          'STATUS'                => $request->STATUS,
          'POSTED'                => $request->POSTED,
          'TODAY_DOC'             => $request->TODAY_DOC,
          'TODAY_YY'              => $request->TODAY_YY,
          'TODAY_MM'              => $request->TODAY_MM,
          'TODAY_MAX'             => $request->TODAY_MAX,
          'EMP_CODE'              => $request->EMP_CODE,
          'EMP_NAME'              => $request->EMP_NAME,
          'SECTION_CODE'          => $request->SECTION_CODE,
          'MACHINE_TYPE'          => $request->MACHINE_TYPE,
          'BU_JOB_NAME'           => $request->BU_JOB_NAME,
          'BU_TYPE'               => $request->BU_TYPE,
          'BU_DESCRIPTION'        => $request->BU_DESCRIPTION,
          'BU_DUEDATE'            => $request->BU_DUEDATE,
          'RP_CODE'               => $request->RP_CODE,
          'EG_DESC'               => $request->EG_DESC,
          'EG_TYYPE'              => $request->EG_TYYPE,
          'EX_DESC1'              => $request->EX_DESC1,
          'RECORD_STATUS'         => $request->RECORD_STATUS,
          'TIMESTAMP'             => $request->TIMESTAMP,
          'CLOSE_STATUS'          => $request->CLOSE_STATUS,
          'CM_STARTDATE'          => $request->CM_STARTDATE,
          'CM_ENDDATE'            => $request->CM_ENDDATE,
          'CLOSE_BY'              => $request->CLOSE_BY,
          'CLOSE_TIME'            => $request->CLOSE_TIME,
          'MODIFY_BY'             => Auth::user()->name,
          'MODIFY_TIME'           => Carbon::now(),
      ]);
            return Redirect()->route('repair.edit',[$UNID])->with('success','อัพเดทรายการ สำเร็จ');
          }
  public function Delete($UNID){
            $CLOSE_STATUS = '1';
              $data_set = MachineRepair::where('UNID',$UNID)->update([
                      'CLOSE_STATUS'          => $CLOSE_STATUS,

                'MODIFY_BY'            => Auth::user()->name,
                'MODIFY_TIME'          => Carbon::now(),
                ]);
              return Redirect()->back()-> with('success','ปิดเอกสารเสำเร็จ ');
          }

  public function SearchEMPCode(Request $request){

    $EMP_CODE = $request->EMP_CODE;
      if($EMP_CODE == ''){
         $data_emp = MachineEMP::orderby('EMP_CODE')->where('EMP_STATUS','=','0')->limit(5)->get();
      }else{
        $EMP_CODE = $request->EMP_CODE['term'];
         $data_emp = MachineEMP::orderby('EMP_CODE')->where('EMP_STATUS','=','0')->where('EMP_CODE','like','%'.$EMP_CODE.'%')->paginate(5);
      }

      $response = array();
      foreach($data_emp as $row_emp){
         $response[] = array(
              "id"=>$row_emp->EMP_CODE,
              "text"=>$row_emp->EMP_CODE
         );
      }

      return response()->json($response);
  }

  public function SelectEmp(Request $request){
    $EMP_CODE = $request->EMP_CODE;
    dd($EMP_CODE);

  }
}
