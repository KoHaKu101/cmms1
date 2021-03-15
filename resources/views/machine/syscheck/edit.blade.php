@extends('masterlayout.masterlayout')
@section('tittle','homepage')
@section('css')

@endsection
{{-- ส่วนหัว --}}
@section('Logoandnavbar')

	@include('masterlayout.logomaster')
	@include('masterlayout.navbar.navbarmaster')

@stop
{{-- ปิดท้ายส่วนหัว --}}

{{-- ส่วนเมนู --}}
@section('sidebar')

	@include('masterlayout.sidebar.sidebarmaster0')

@stop
{{-- ปิดส่วนเมนู --}}

	{{-- ส่วนเนื้อหาและส่วนท้า --}}
@section('contentandfooter')

		<div class="content">
			<div class="page-inner">
				<!--ส่วนปุ่มด้านบน-->
				<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
					<div class="container">
						<div class="row">
							<div class="col-md-1">
								<a href="{{ url('machine/syscheck/syschecklist') }}">
									<button class="btn btn-warning  btn-xs ">
										<span class="fas fa-arrow-left fa-lg ">Back </span>
									</button>
								</a>
							</div>
						</div>
					</div>
				</div>
				<!--ส่วนกรอกข้อมูล-->
				<form action="{{ url('machine/syscheck/update/'.$dataset->UNID) }}" method="POST" enctype="multipart/form-data">
					@csrf
				<div class="py-12">
	        <div class="container mt-2">
						<div class="card">
							<div class="card-header bg-primary">
								<div class="row">
									<div class="col-md-6 col-lg-8">
										<h4 class="ml-3 mt-2" style="color:white;" >รายการตรวจเช็คเครื่องจักร {{ $dataset->MACHINE_CODE }}</h4>
									</div>
									<div class="col-md-2 col-lg-2">
										<button type="submit" class="btn btn-warning float-right btn-sm"><span style="color:white;font-size:14px">Save</span>
										</button>
									</div>
									<div class="col-md-2 col-lg-2">
										<button  id="popup" type="button" class="btn btn-warning float-right btn-sm"
											data-toggle="modal" data-target="#syscheckmain"><span style="color:white;font-size:14px">เพิ่มระบบที่ต้องตรวจเช็ค</span>
										</button>
									</div>

							 </div>
							</div>
							<div class="card-body ml-2">
								<div class="col-md-8 col-lg-12">
				          <div class="table">

				            <table class="table table-sm table-head-bg-primary  ">
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
				                    {{-- {{ var_dump($datasystem) }} --}}
				              <tr>
				                <td style="width:25px;text-align:center">{{ $key+1 }}</td>
				                <td style="width:80px">
				                  {{ $datasystem->SYSTEM_CODE == $datasystem->SYSTEM_CODE ? $datasystem->SYSTEM_NAME : '' }}
				                </td>
				                <td style="width:80px">
				                  <div class="form-inline ">
				                    <button  id="popup" type="button" style="width:100px" class="btn btn-primary  btn-sm  btn-block mt--1"
				                    data-toggle="modal" data-target="#syscheck">
				                    <span style="text-align:left;font-size:12px">
				                    <i style="font-size:15px" class="icon-printer mx-1 ">	</i>
														 {{ \App\Models\Machine\MachineSysTemSubCheck::select('SYSTEMCHECK_UNID_REF')->where('SYSTEMCHECK_UNID_REF',$datasystem->UNID)->count() }} รายการ </span>	</button>
				                  </div>
				                  <input type="hidden" name="DATAUNID[]" value="{{ $datasystem->UNID }}">
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
				                    <td style="width:132px">
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
				                      echo '<td style="width:115px"><input type="text" class="form-control"
				                      value="'.Carbon\Carbon::parse($datasystem->SYSTEM_MONTHCHECK)->addmonth($datasystem->SYSTEM_MONTH)->Format('d/m/Y').'"
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
																 <a href="{{ url('/machine/syschecksub/show/'.$datasystem->UNID) }}">
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

	</div>
</div>

@include('masterlayout.tab.edit.systemcheck.syscheckmain')





@stop
{{-- ปิดส่วนเนื้อหาและส่วนท้า --}}

{{-- ส่วนjava --}}
@section('javascript')

@stop
{{-- ปิดส่วนjava --}}
