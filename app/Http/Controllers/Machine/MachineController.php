<?php

namespace App\Http\Controllers\Machine;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use Auth;
//******************** model ***********************
use App\Models\Machine\Machine;
use App\Models\Machine\Protected;
use App\Models\Machine\MachineUpload;
use App\Models\Machine\MachineLine;
use App\Models\Machine\MachineEMP;
use App\Models\Machine\MachineRepair;
use App\Models\Machine\MachineSysTemCheck;
use App\Models\MachineaddTable\MachineTypeTable;
use App\Models\MachineAddTable\MachineStatusTable;
use App\Models\MachineAddTable\MachineSysTemTable;

//************** Package form github ***************
use RealRashid\SweetAlert\Facades\Alert;
use App\Exports\MachineExport;
use Maatwebsite\Excel\Facades\Excel;





class MachineController extends Controller
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
    $dataset = MachineLine::all();
    return View('machine/assets/machinelist',compact(['dataset']),['dataset' => $dataset]);
  }
  public function Indexserach(Request $request){
    if($request->ajax())
    {
         $querydata = $request->get('query');
         $query = str_replace(" ", "%", $querydata);
   $dataset = DB::table('PMCS_MACHINES')
                 ->where('MACHINE_CODE', 'like', '%'.$query.'%')
                 ->orWhere('MACHINE_LINE', 'like', '%'.$query.'%')
                 ->orWhere('MACHINE_NAME', 'like', '%'.$query.'%')
                 ->paginate(10);
   return view('machine/assets/machinesearch', compact('dataset'))->render();
    }
  }

  public function All(){
    $dataset = Machine::paginate(10);
    return View('machine/assets/machinelist0',compact(['dataset']),['dataset' => $dataset]);
  }
  public function Allline($LINE_CODE) {
    $dataset = Machine::where('MACHINE_LINE','=',$LINE_CODE)->paginate(10);

    return view('machine/assets/machinelist0',compact(['dataset']),['dataset' => $dataset]);
  }
  public function Alltype($TYPE_CODE) {
    $dataset = Machine::where('MACHINE_TYPE','=',$TYPE_CODE)->paginate(10);

    return view('machine/assets/machinelist0',compact(['dataset']),['dataset' => $dataset]);
  }

  public function Create(){
    $machineline = MachineLine::where('LINE_STATUS','=','9')->get();
    $machinetype = MachineTypeTable::where('TYPE_STATUS','=','9')->get();
    $machinestatus = MachineStatusTable::where('STATUS','=','9')->get();
    return View('machine/assets/form',compact('machineline','machinetype','machinestatus'));
  }

  public function Store(Request $request){
    $validated = $request->validate([
      'MACHINE_CODE'           => 'required|unique:PMCS_MACHINES|max:50',
      ],
      [
      'MACHINE_CODE.required'  => 'กรุณราใส่รหัสเครื่องจักร',
      'MACHINE_CODE.unique'    => 'มีรหัสเครื่องแล้ว'
      ]);

      if ($request->hasFile('MACHINE_ICON')) {
        if ($request->file('MACHINE_ICON')->isValid()) {

         // $filenamemaster = uniqid()."_".basename($request->file('MACHINE_ICON')->getClientOriginalName());
        $MACHINE_ICON = $request->file('MACHINE_ICON');
        $name_gen = hexdec(uniqid());
        $img_ext = strtolower($MACHINE_ICON->getClientOriginalExtension());
        $img_name = $name_gen.'.'.$img_ext;
        $up_location = 'image/machine/';
        $last_img = $up_location.$img_name;
        $MACHINE_ICON->move($up_location,$img_name);;
        }
      } else {
        $last_img = "";
      }
      $MACHINE_CODE = strtoupper($request->MACHINE_CODE);
      $request->MACHINE_STATUS = '9';
      Machine::insert([
          'MACHINE_CODE'         => $MACHINE_CODE,
          'MACHINE_NAME'         => $request->MACHINE_NAME,
          'MACHINE_CHECK'        => $request->MACHINE_CHECK,
          'MACHINE_MANU'         => $request->MACHINE_MANU,
          'MACHINE_TYPE'         => $request->MACHINE_TYPE,
          'MACHINE_TYPE_STATUS'  => $request->MACHINE_TYPE_STATUS,
          'MACHINE_STARTDATE'    => $request->MACHINE_STARTDATE,
          'MACHINE_RVE_DATE'     => $request->MACHINE_RVE_DATE,
          'MACHINE_ICON'         => $last_img,
          'MACHINE_PRICE'        => $request->MACHINE_PRICE,
          'MACHINE_LINE'         => $request->MACHINE_LINE,
          'GROUP_NAME'           => $request->GROUP_NAME,
          'MACHINE_MA_COST'      => $request->MACHINE_MA_COST,
          'MACHINE_TOTAL_FEED'   => $request->MACHINE_TOTAL_FEED,
          'MACHINE_TOTAL_STOP'   => $request->MACHINE_TOTAL_STOP,
          'MACHINE_SPEED_UNIT'   => $request->MACHINE_SPEED_UNIT,
          'MACHINE_LOCATION'     => $request->MACHINE_LOCATION,
          'MACHINE_GROUP'        => $request->MACHINE_GROUP,
          'MACHINE_PARTNO'       => $request->MACHINE_PARTNO,
          'MACHINE_MODEL'        => $request->MACHINE_MODEL,
          'MACHINE_SERIAL'       => $request->MACHINE_SERIAL,
          'MACHINE_FACTORY'      => $request->MACHINE_FACTORY,
          'COMPANY_PAY'          => $request->COMPANY_PAY,
          'COMPANY_SETUP'        => $request->COMPANY_SETUP,
          'MACHINE_CAPACITY'     => $request->MACHINE_CAPACITY,
          'MACHINE_SPEED'        => $request->MACHINE_SPEED,
          'MACHINE_MTBF'         => $request->MACHINE_MTBF,
          'MACHINE_MTTF'         => $request->MACHINE_MTTF,
          'MACHINE_MTTR'         => $request->MACHINE_MTTR,
          'MACHINE_EFFICIENCY'   => $request->MACHINE_EFFICIENCY,
          'MACHINE_POWER'        => $request->MACHINE_POWER,
          'MACHINE_WEIGHT'       => $request->MACHINE_WEIGHT,
          'MACHINE_TARGET'       => $request->MACHINE_TARGET,
          'MACHINE_NOTE'         => $request->MACHINE_NOTE,
          'MACHINE_STATUS'       => $request->MACHINE_STATUS,
          'MACHINE_POSTED'       => $request->MACHINE_POSTED,
          'PCDS_MACHINE_CODE'    => $request->PCDS_MACHINE_CODE,
          'WAREHOUSE_CODE'       => $request->WAREHOUSE_CODE,
          'GROUP_CODE'           => $request->GROUP_CODE,
          'LOCATION_CODE'        => $request->LOCATION_CODE,
          'SECTION_CODE'         => $request->SECTION_CODE,
          'SUPPLIER_CODE'        => $request->SUPPLIER_CODE,
          'SUPPLIER_NAME'        => $request->SUPPLIER_NAME,
          'PURCHASE_FORM'        => $request->PURCHASE_FORM,
          'EMP_CODE'             => $request->EMP_CODE,
          'EMP_NAME'             => $request->EMP_NAME,
          'POS_REF_UNID'         => $request->POS_REF_UNID,
          'CREATE_BY'            => Auth::user()->name,
          'CREATE_TIME'          => Carbon::now(),
          // 'MODIFY_BY'            => Auth::user()->name,
          // 'MODIFY_TIME'          => Carbon::now(),
          'UNID'                 => $this->randUNID('PMCS_MACHINES'),
          'SHIFT_TYPE'           => $request->SHIFT_TYPE,
          'ESP_MAC'              => $request->ESP_MAC,
      ]);

      $data_set = Machine::paginate(12);

      return Redirect()->route('machine.list',compact(['data_set']))->with('success','ลงทะเบียน สำเร็จ');
  }

  public function Edit($UNID) {
    $m = 'PMCS_CMMS_MACHINE_SYSTEMTABLE';
    $s = 'PMCS_CMMS_MACHINE_SYSTEMCHECK';

    $dataset = Machine::where('UNID',$UNID)->first();
    $machinesystem = MachineSysTemCheck::select($s.'.SYSTEM_MONTHCHECK',$s.'.SYSTEM_MONTH',$m.'.SYSTEM_NAME',$s.'.SYSTEM_CODE',$s.'.UNID')
                                        ->leftJoin($m,$m.'.SYSTEM_CODE',$s.'.SYSTEM_CODE')
                                        ->where('MACHINE_UNID_REF',$UNID)
                                        ->get();
    $machineupload = MachineUpload::where('MACHINE_CODE',$dataset->MACHINE_CODE)->get();
    $machineupload1 = MachineUpload::where('MACHINE_CODE',$dataset->MACHINE_CODE)->get();
    $machineupload2 = MachineUpload::where('MACHINE_CODE',$dataset->MACHINE_CODE)->first();
    $machinetype = MachineTypeTable::where('TYPE_STATUS','=','9')->get();

    $machinestatus = MachineStatusTable::where('STATUS','=','9')->get();
    $machineemp = MachineEMP::where('MACHINE_CODE','=',$dataset->MACHINE_CODE)->get();
    $machineline = MachineLine::select('LINE_CODE','LINE_NAME','LINE_STATUS')
                                ->where('LINE_STATUS','=','9')
                                ->get();
    $machinerepair = MachineRepair::where('MACHINE_CODE','=',$dataset->MACHINE_CODE)
                                    ->where('STATUS','=','9')
                                    ->get();
    $machinesystemtable = MachineSysTemTable::select('SYSTEM_CODE','SYSTEM_NAME','SYSTEM_STATUS')
                                              ->where('SYSTEM_STATUS','=','9')
                                              ->get();
    return view('machine/assets/edit',compact('machinesystem','machinesystemtable','dataset','machineupload','machineupload1'
      ,'machineupload2','machinetype','machineline','machinestatus','machineemp','machinerepair'));
  }
  public function Editback($UPLOAD_UNID_REF) {
    $dataset = Machine::where('UNID','=',$UPLOAD_UNID_REF)->first();
    $machineupload = MachineUpload::where('MACHINE_CODE',$dataset->MACHINE_CODE)->get();
    $machineupload1 = MachineUpload::where('MACHINE_CODE',$dataset->MACHINE_CODE)->get();
    $machineupload2 = MachineUpload::where('MACHINE_CODE',$dataset->MACHINE_CODE)->first();
    $machinetype = MachineTypeTable::where('TYPE_STATUS','=','9')->get();
    $machineline = MachineLine::where('LINE_STATUS','=','9')->get();
    $machinestatus = MachineStatusTable::where('STATUS','=','9')->get();
    $machineemp = MachineEMP::where('MACHINE_CODE','=',$dataset->MACHINE_CODE)->get();
    return view('machine/assets/edit',compact('dataset','machineupload','machineupload1'
      ,'machineupload2','machinetype','machineline','machinestatus','machineemp'));
  }
  public function Update(Request $request,$UNID){
    $update = $request->MACHINE_UPDATE;
    if ($request->hasFile('MACHINE_ICON')) {
      if ($request->file('MACHINE_ICON')->isValid()) {
          $MACHINE_ICON = $request->file('MACHINE_ICON');
          $name_gen = hexdec(uniqid());
          $img_ext = strtolower($MACHINE_ICON->getClientOriginalExtension());
          $img_name = $name_gen.'.'.$img_ext;
          $up_location = 'image/machine/';
          $last_img = $up_location.$img_name;
          $MACHINE_ICON->move($up_location,$img_name);
      }
  } else {
      $last_img = $update;
      // dd($last_img);
  }
  $request->MACHINE_STATUS = $request->MACHINE_CHECK == "1" ? $request->MACHINE_STATUS = '1' : $request->MACHINE_STATUS = '9' ;
  $MACHINE_CODE = strtoupper($request->MACHINE_CODE);
    $data_set = Machine::where('UNID',$UNID)->update([
      'MACHINE_CODE'         => $MACHINE_CODE,
      'MACHINE_NAME'         => $request->MACHINE_NAME,
      'MACHINE_CHECK'        => $request->MACHINE_CHECK,
      'MACHINE_MANU'         => $request->MACHINE_MANU,
      'MACHINE_TYPE'         => $request->MACHINE_TYPE,
      'MACHINE_TYPE_STATUS'  => $request->MACHINE_TYPE_STATUS,
      'MACHINE_STARTDATE'    => $request->MACHINE_STARTDATE,
      'MACHINE_RVE_DATE'     => $request->MACHINE_RVE_DATE,
      'MACHINE_ICON'         => $last_img,
      'MACHINE_PRICE'        => $request->MACHINE_PRICE,
      'MACHINE_LINE'         => $request->MACHINE_LINE,
      'GROUP_NAME'           => $request->GROUP_NAME,
      'MACHINE_MA_COST'      => $request->MACHINE_MA_COST,
      'MACHINE_TOTAL_FEED'   => $request->MACHINE_TOTAL_FEED,
      'MACHINE_TOTAL_STOP'   => $request->MACHINE_TOTAL_STOP,
      'MACHINE_SPEED_UNIT'   => $request->MACHINE_SPEED_UNIT,
      'MACHINE_LOCATION'     => $request->MACHINE_LOCATION,
      'MACHINE_GROUP'        => $request->MACHINE_GROUP,
      'MACHINE_PARTNO'       => $request->MACHINE_PARTNO,
      'MACHINE_MODEL'        => $request->MACHINE_MODEL,
      'MACHINE_SERIAL'       => $request->MACHINE_SERIAL,
      'MACHINE_FACTORY'      => $request->MACHINE_FACTORY,
      'COMPANY_PAY'          => $request->COMPANY_PAY,
      'COMPANY_SETUP'        => $request->COMPANY_SETUP,
      'MACHINE_CAPACITY'     => $request->MACHINE_CAPACITY,
      'MACHINE_SPEED'        => $request->MACHINE_SPEED,
      'MACHINE_MTBF'         => $request->MACHINE_MTBF,
      'MACHINE_MTTF'         => $request->MACHINE_MTTF,
      'MACHINE_MTTR'         => $request->MACHINE_MTTR,
      'MACHINE_EFFICIENCY'   => $request->MACHINE_EFFICIENCY,
      'MACHINE_POWER'        => $request->MACHINE_POWER,
      'MACHINE_WEIGHT'       => $request->MACHINE_WEIGHT,
      'MACHINE_TARGET'       => $request->MACHINE_TARGET,
      'MACHINE_NOTE'         => $request->MACHINE_NOTE,
      'MACHINE_STATUS'       => $request->MACHINE_STATUS,
      'MACHINE_POSTED'       => $request->MACHINE_POSTED,
      'PCDS_MACHINE_CODE'    => $request->PCDS_MACHINE_CODE,
      'WAREHOUSE_CODE'       => $request->WAREHOUSE_CODE,
      'GROUP_CODE'           => $request->GROUP_CODE,
      'LOCATION_CODE'        => $request->LOCATION_CODE,
      'SECTION_CODE'         => $request->SECTION_CODE,
      'SUPPLIER_CODE'        => $request->SUPPLIER_CODE,
      'SUPPLIER_NAME'        => $request->SUPPLIER_NAME,
      'PURCHASE_FORM'        => $request->PURCHASE_FORM,
      'EMP_CODE'             => $request->EMP_CODE,
      'EMP_NAME'             => $request->EMP_NAME,
      'POS_REF_UNID'         => $request->POS_REF_UNID,
      // 'CREATE_BY'            => Auth::user()->name,
      // 'CREATE_TIME'          => Carbon::now(),
      'MODIFY_BY'            => Auth::user()->name,
      'MODIFY_TIME'          => Carbon::now(),

      'SHIFT_TYPE'           => $request->SHIFT_TYPE,
      'ESP_MAC'              => $request->ESP_MAC,
    ]);

    return Redirect()->back()->with('success','อัพเดทรายการสำเร็จ');
  }

  public function Delete($UNID){

    $MACHINE_CHECK = '4';
    $MACHINE_STATUS = '1';

      $data_set = Machine::where('UNID',$UNID)->update([
        'MACHINE_CHECK'        => $MACHINE_CHECK,
        'MACHINE_STATUS'       => $MACHINE_STATUS,
        'MODIFY_BY'            => Auth::user()->name,
        'MODIFY_TIME'          => Carbon::now(),
        ]);


      return Redirect()->back()-> with('success','จำหน่ายเครื่องสำเร็จ ');

  }




}
