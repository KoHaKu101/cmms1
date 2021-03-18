<meta name="_token" content="{{ csrf_token() }}" />
<div class="tab-pane" id="systemcheck" >
  <div class="row">
    <div class="col-sm-12">
      <div class="jumbotron">
        <div class="col-md-8 col-lg-12">
          <div class="table">
            <form action="{{ url('machine/syscheck/update/'.$dataset->UNID) }}" method="POST" enctype="multipart/form-data">
              @csrf
            <table class="table table-sm table-head-bg-primary  ">
              <thead>
                <tr>
                  <th class="bg-primary" colspan="6" >
                    <h3 align="center" style="color:white;" class="mt-2">ตรวจสอบระบบ</h3>
                  </th>
                  <th class="bg-primary" >
                    <button type="submit" class="btn btn-warning float-right btn-sm"><span style="color:black;font-size:14px">Save</span></button>
                  </th>

                  <th class="bg-primary" >
                    <button  id="popup" type="button" class="btn btn-warning float-right btn-sm"
                    data-toggle="modal" data-target="#syscheckmain"><span style="color:black;font-size:14px">เพิ่มระบบที่ต้องตรวจเช็ค</span></button>
                  </th>
                </tr>

                </thead>
                <tbody>
                  <tr>
                    <td style="width:50px"></td>
                    <td>ระบบ</td>
                    <td>รายการ</td>
                    <td>ระยะเวลา</td>
                    <td>ครบกำหนด</td>
                    <td>เช็คครั้งล่าสุด</td>
                    <td>สถานะ</td>
                    <td></td>
                  </tr>
                  @foreach ($machinesystem as $key => $datasystem)
                    {{ var_dump($datasystem) }}
              <tr>
                <td style="width:25px;text-align:center">{{ $key+1 }}</td>
                <td style="width:80px">
                  {{ $datasystem->SYSTEM_CODE == $datasystem->SYSTEM_CODE ? $datasystem->SYSTEM_NAME : '' }}
                </td>
                <td style="width:80px">
                  <div class="form-inline ">
                    <button  id="btn" type="button" style="width:100px" class="btn btn-primary  btn-sm  btn-block mt--1">
                    <span style="text-align:left;font-size:12px">
                      <i style="font-size:15px" class="icon-printer mx-1 ">	</i>
                       {{ \App\Models\Machine\MachineSysTemSubCheck::select('SYSTEMCHECK_UNID_REF')
                       ->where('SYSTEMCHECK_UNID_REF',$datasystem->UNID)->count() }} รายการ </span>	</button>
                  </div>
                  <input type="hidden" name="DATAUNID[]" id="UNID" value="{{ $datasystem->UNID }}">
                </td>

                  @if($datasystem->SYSTEM_MONTH === NULL)
                    <td style="width:150px">
                      <div class="input-group mb-3 mt-2">
                        <select class="form-control form-control" id="SYSTEM_MONTH" name="SYSTEM_MONTH[]" required autofocus>
                          <option value="">0</option>
	                           @for ($i=1; $i < 13; $i++)
                               <option value= '{{$i}}' >{{$i}}</option>
                             @endfor
                        </select>
                        <div class="input-group-append">
                          <span class="input-group-text" id="basic-addon2"> เดือน</span>
                        </div>
                      </div>
                    </td>
                    <td style="width:115px"><input type="text" class="form-control" value="" readonly></td>
                    <td style="width:165px"><input style="width:165px" type="date" class="form-control"
                    name="SYSTEM_MONTHCHECK[]"value="" required autofocus>
                    </td>'
                    <td style="width:150px" >
                        <a href="{{ url('machine/syscheck/delete/'.$datasystem->UNID) }}">
                          <button type="button" style="width:150px" class="btn btn-danger btn-sm btn-block mx-2 ">
                            <span style="text-align:left;font-size:14px">ลบรายการ</span>
                          </button>
                        </a>
                    </td>
                  @elseif($datasystem->SYSTEM_MONTH !== NULL)
                    <td style="width:240px">
                      <div class="input-group mb-3 mt-2">
                        <select class="form-control form-control" id="SYSTEM_MONTH[]" name="SYSTEM_MONTH[]" required autofocus>
                              @for ($i=1; $i < 13; $i++)
                                 <option value="{{$i}}"{{ $datasystem->SYSTEM_MONTH == $i ? 'selected' : ''}}>{{$i}}</option>

                               @endfor
                        </select>
                        <div class="input-group-append">
                          <span class="input-group-text" id="basic-addon2"> เดือน</span>
                        </div>
                      </div>
                    </td>

                      <?php
                      echo '<td style="width:160px"><input style="width:160px" type="date" class="form-control" name="SYSTEM_SYSTEM_MONTHSTORE[]"
                      value="'.Carbon\Carbon::parse($datasystem->SYSTEM_MONTHCHECK)->addmonth($datasystem->SYSTEM_MONTH)->toDateString().'"
                      readonly></td>';
                      echo '<td style="width:165px">
                      <input style="width:165px" type="date" class="form-control" name="SYSTEM_MONTHCHECK[]"
                      value="'.Carbon\Carbon::parse($datasystem->SYSTEM_MONTHCHECK)->toDateString().'" required autofocus>
                      </td>';
                     ?>
                     <td style="width:100px">
                       <div class="form-check" style="width:120px">
                         <label  class="form-check-label">
                           <input class="form-check-input" type="checkbox"
                            <?php echo (Carbon\Carbon::now() >= Carbon\Carbon::parse($datasystem->SYSTEM_MONTHCHECK)
                                                                    ->addmonth($datasystem->SYSTEM_MONTH)
                                                                    ) ? ""  : "checked" ; ?> onclick="return false;">
                           <span class="form-check-sign">ตรวจเช็คแล้ว</span>
                         </label>
                       </div>
                     </td>
                     <td style="width:150px" >
                       <div class="form-inline ">
                         <a href="{{ url('/machine/syschecksub/showback/'.$datasystem->UNID) }}">
                          <button  type="button" style="width:150px" class="btn btn-success btn-sm btn-block mx-2 load-ajax-modal">
                          <span style="text-align:left;font-size:14px">รายการตรวจสอบ</span></button>
                         </a>
                       </div>
                     </td>
                  @endif
              </tr>
              @endforeach
              </tbody>
            </table>
           </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
