@extends('masterlayout.masterlayout')
@section('tittle','homepage')
@section('css')
<link rel="stylesheet" href="{{asset('js/check/style.css')}}">

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
				<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
          <div class="container">
						<div class="row">
							<div class="col-md-12 gx-4">
								<a href="{{ url('machine/assets/edit/'.$machine->UNID) }}">
								<button class="btn btn-warning  btn-xs ">
									<span class="fas fa-arrow-left fa-lg">Back </span>
								</button>
							</a>
							</div>
						</div>
          </div>
				</div>
				<div class="py-12">
	        <div class="container mt-2">
						<div class="row">
							<div class="col-md-12">
								<div class="card ">
                	@if(session('success'))
                  	<div class="alert alert-success alert-dismissible fade show" role="alert">
  											<strong>{{ session('success') }}</strong>
  											<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    										<span aria-hidden="true">&times;</span></button>
										</div>
									@endif
								</div>
							</div>
						</div>
							<div class="row">
								<div class="col-md-12">
									<div class="card">
											<div class="card-header bg-primary">
												<div class="card-title" style="color:white">{{$machinepm->PM_TEMPLATELIST_NAME}}</div>
											</div>
											<form action="{{ url('/machine/syscheck/update') }}" method="POST" enctype="multipart/form-data">
											@csrf
                          <div class="card-header">
														<div class="row">
															<div class="col-md-6 col-lg-3">
																<h4 class="ml-3 mt-2">MC : {{$machine->MACHINE_CODE}}</h4>
															</div>
															<div class="col-md-6 col-lg-8">
																<h4 class="ml-3 mt-2">ชื่อเครื่อวจักร : {{$machine->MACHINE_NAME}}</h4>
															</div>
															<div class="col-md-6 col-lg-12">
																<h4 class="ml-3 mt-2">ประเภท เครื่องจักร : {{$machine->MACHINE_TYPE}}</h4>
															</div>
															<div class="col-md-6 col-lg-3">
																<div class="form-group form-inline input-group">
																	<h4 class="ml-2 mt-2">ระยะเวลาตรวจเช็ค : {{ $machinepm->PM_TEMPLATELIST_DAY }}
																	 <span>{{$machinepm->PM_TEMPLATELIST_CHECK == '1' ? 'เดือน' : 'วัน' }}</span> </h4>
																</div>
															</div>
															<div class="col-md-6 col-lg-7 mt--2">
																<div class="form-group form-inline">
																	<h4 class="ml-2 mt-2">วันที่ตรวจเช็คล่าสุด :
																		<input type="date" class="form-control" name="date" value="{{ $machinepmcheckdetailfirst->MACHINEPM_CHECK_TIME }}" readonly>
																	</h4>
																</div>
															</div>
															<div class="col-md-6 col-lg-5 ">
																<div class="form-group form-inline ml-2 mt--3">
																	<h4>ชื่อผู้ทำการตรวจเช็ค </h4>
																	<input type="text" class="form-control ml-2" name="MACHINE_USER_CHECK" value="{{ $machinepmcheckdetailfirst->MACHINE_USER_CHECK }}" readonly>
																</div>
															</div>
														</div>
    											</div>
                          <div class="card-body mt--3">
														<style>
															.selectgroup-button-icon {
    														padding-left: .5rem;
    														padding-right: .5rem;
    														font-size: 2rem;
																width: 60px;
																height: 50px;
																}
															.selectgroup-pills .selectgroup-button {
    															border-radius: 60px!important;
																}
															.card .separator-solid, .card-light .separator-solid {
    															border-top: 1px solid #999a9a;
    														margin: 15px 0;
														}
														</style>
																@foreach ($machinepmcheckdetail as $number => $datamachinepmcheckdetail)
																	<div class="row my-3">
																		<div class="col-md-6 col-lg-1"> {{ $number+1 }}	</div>
																		<div class="col-md-6 col-lg-11">{{$machinepmdetail->PM_DETAIL_NAME}}</div>
																	</div>
																	<div class="row my-3">
																		<div class="col-md-6 col-lg-3 mt-2" >
																			<div class="selectgroup selectgroup-success selectgroup-pills float-right" >
																				<label class="selectgroup-item" >
																					<input type="radio" name="MACHINEPM_CHECK[{{ $number+0 }}]" value="PASS" class="selectgroup-input"  {{ $datamachinepmcheckdetail->MACHINEPM_CHECK == "PASS" ? "checked" : ""}} readonly="readonly">
																					<span class="selectgroup-button selectgroup-button-icon"><i class="fa fa-check"></i></span>
																				 </label>
																			</div>
																		</div>
																		<div class="col-md-6 col-lg-1 mt-2">
																			<div class="selectgroup selectgroup-danger selectgroup-pills">
																				<label class="selectgroup-item">
																					<input type="radio" name="MACHINEPM_CHECK[{{ $number+0 }}]" value="NOTPASS" class="selectgroup-input" {{ $datamachinepmcheckdetail->MACHINEPM_CHECK == "NOTPASS" ? "checked" : ""}} readonly="readonly">
																					<span class="selectgroup-button selectgroup-button-icon"><i class="fa fa-times"></i></span>
																				</label>
																			</div>
																		</div>
																		{{-- รายการซ่อมสำเร็จแล้ว --}}
																	@if($datamachinepmcheckdetail->MACHINEPM_CHECK == 'PASS' and $datamachinepmcheckdetail->MACHINEPM_FIX == 'FIX' )
																		<div class="col-md-6 col-lg-3 has-error">
																			<div class="form-group">
																				<input type="hidden" class="form-control ml-2" name="UNID_MACHINEPMCHECKDETAIL[{{$number+0}}]" value="{{ $datamachinepmcheckdetail->UNID }}">
																				<textarea class="form-control" id="MACHINEPM_FAIL_NOTE[{{$number+0}}]" name="MACHINEPM_FAIL_NOTE[{{$number+0}}]" rows="2">{{ $datamachinepmcheckdetail->MACHINEPM_FAIL_NOTE }}</textarea >
																			</div>
																		</div>
																				<div class="col-md-6 col-lg-1 mt-2">
																					<div class="selectgroup selectgroup-warning selectgroup-pills my-1">
																						<label class="selectgroup-item">
																							<input type="checkbox" name="MACHINEPM_FIX[{{$number+0}}]" value="FIX" class="selectgroup-input form-check-input" {{ $datamachinepmcheckdetail->MACHINEPM_FIX == "FIX" ? "checked" : ""}}>
																							<span class="selectgroup-button selectgroup-button-icon"><i class="fa fa-wrench"></i></span>
																						</label>
																					</div>
																				</div>
																				<div class="col-md-6 col-lg-3 has-error">
																					<div class="form-group">
																						<textarea class="form-control" id="MACHINEPM_FIX_NOTE[{{$number+0}}]" name="MACHINEPM_FIX_NOTE[{{$number+0}}]" rows="2">{{ $datamachinepmcheckdetail->MACHINEPM_FIX_NOTE }}</textarea >
																					</div>
																				</div>
																			</div>
																			<div class="separator-solid my-1"></div>
																	{{-- รายการที่ผ่าน --}}
																	@elseif ($datamachinepmcheckdetail->MACHINEPM_CHECK !== "NOTPASS")
																		</div>
																			<div class="separator-solid my-1"></div>
																	{{-- รายการที่ไม่ผ่านจะต้องรอซ่อม --}}
																	@elseif($datamachinepmcheckdetail->MACHINEPM_CHECK == 'NOTPASS')
																		<div class="col-md-6 col-lg-3 has-error">
																			<div class="form-group">
																				<input type="hidden" class="form-control ml-2" name="UNID_MACHINEPMCHECKDETAIL[{{$number+0}}]" value="{{ $datamachinepmcheckdetail->UNID }}">
																				<textarea class="form-control" id="MACHINEPM_FAIL_NOTE[{{$number+0}}]" name="MACHINEPM_FAIL_NOTE[{{$number+0}}]" rows="2">{{ $datamachinepmcheckdetail->MACHINEPM_FAIL_NOTE }}</textarea >
																				</div>
																		</div>
																				<div class="col-md-6 col-lg-1 mt-2">
																					<div class="selectgroup selectgroup-warning selectgroup-pills my-1">
																						<label class="selectgroup-item">
																							<input type="checkbox" name="MACHINEPM_FIX[{{$number+0}}]" value="FIX" class="selectgroup-input form-check-input">
																							<span class="selectgroup-button selectgroup-button-icon"><i class="fa fa-wrench"></i></span>
																						</label>
																					</div>
																				</div>
																				<div class="col-md-6 col-lg-3 has-error">
																					<div class="form-group">
																						<textarea class="form-control" id="MACHINEPM_FIX_NOTE[{{$number+0}}]" name="MACHINEPM_FIX_NOTE[{{$number+0}}]" rows="2"></textarea >
																					</div>
																				</div>
																			</div>
																			<div class="separator-solid my-1"></div>
																	@endif
																@endforeach
																<div class="col-md-6 col-lg-6">
																	<div class="form-group">
																		<label>NOTE</label>
																		<textarea class="form-control" id="MACHINEPM_NOTE" name="MACHINEPM_NOTE" rows="2">{{ $machinepmcheckdetailfirst->MACHINEPM_NOTE }}</textarea >
																	</div>
																</div>
																<div class="separator-solid my-1"></div>
																<div class="row mt-4">
																	<div class="col-md-6 col-lg-6">
																		<button type="submit" class="btn btn-primary float-right"><i class="fas fa-file fa-lg"> SAVE </i></button>
																	</div>
																	<div class="col-md-6 col-lg-1">
																		<button type="button" onclick="cancelback( '{{ $machine->UNID }}' )" class="btn btn-primary btn-link"><i class="fas fa-back fa-lg"> CANCLE </i></button>
																	</div>
														</div>
													</form>
												</div>
											</div>
										</div>
									</div>
              </div>
						</div>
					</div>
			</div>
		</div>


@stop
{{-- ปิดส่วนเนื้อหาและส่วนท้า --}}

{{-- ส่วนjava --}}
@section('javascript')
	<script src="{{ asset('/js/back/machinepmback.js') }}">


	</script>

@stop
{{-- ปิดส่วนjava --}}