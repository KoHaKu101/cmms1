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
								<a href="{{ url()->previous() }}">
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
								</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="card">
											<div class="card-header bg-primary">
												<div class="card-title" style="color:white">{{$machinepm->PM_TEMPLATELIST_NAME}}</div>
											</div>
											<form action="{{ url('machine/system/check/store') }}" method="POST" enctype="multipart/form-data">
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
																	<h4 class="ml-2 mt-2">ระยะเวลาตรวจเช็ค : {{ $machinepm->PM_TEMPLATELIST_DAY / 30 }}
																	 <span>เดือน</span> </h4>

																</div>
															</div>
																<div class="col-md-6 col-lg-7 mt--2">
																	<div class="form-group form-inline has-error">
																		<h4 class="ml-2 mt-2">วันที่ตรวจเช็คปัจจุบัน :
																			<input type="date" class="form-control" name="MACHINE_CHECK_TIME" value="{{\Carbon\Carbon::now()->toDateString()}}">
																		</h4>
																	</div>
																</div>
																		<div class="col-md-6 col-lg-5 has-error ">
																			<div class="form-group form-inline ml-2 mt--3">
																				<h4>ชื่อผู้ทำการตรวจเช็ค </h4>
																				<input type="text" class="form-control ml-2" name="MACHINE_USER_CHECK" required>
																				<input type="hidden" class="form-control ml-2" name="UNID_PMLIST" value="{{ $machinepm->UNID }}">
																				<input type="hidden" class="form-control ml-2" name="UNID_MACHINE" value="{{ $machine->UNID }}">

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
														@foreach ($detail as $number => $datamachinepmdetail)
																<div class="row my-3">
																	<div class="col-md-6 col-lg-1"> {{ $number++ }}	</div>
																	<div class="col-md-6 col-lg-11">{{$datamachinepmdetail->PM_DETAIL_NAME}}</div>
																</div>
																	<div class="row my-3" >
																		<div class="col-md-6 col-lg-3 mt-2 has-error" id="findnumber">
																			<div class="selectgroup selectgroup-success selectgroup-pills float-right">
																				<label class="selectgroup-item">
																					<input type="hidden" id="number" value="{{ $number+0 }}" rel="{{ $number+0 }}">
																					<input type="radio" id="MACHINEPM_CHECK" name="MACHINEPM_CHECK[{{ $number+0 }}]" value="PASS" class="selectgroup-input Checkpass" required>
																					<span class="selectgroup-button selectgroup-button-icon"><i class="fa fa-check"></i></span>
																				</label>
																			</div>
																		</div>
																		<div id="formpass{{ $number+0 }}">
																		</div>


																		<div class="col-md-6 col-lg-1 mt-2 has-error" >
																			<div class="selectgroup selectgroup-danger selectgroup-pills">
																				<label class="selectgroup-item">
																					<input type="radio" id="MACHINEPM_CHECK[{{ $number+0 }}]" name="MACHINEPM_CHECK[{{ $number+0 }}]" value="NOTPASS" class="selectgroup-input Checknotpass">
																					<span class="selectgroup-button selectgroup-button-icon"><i class="fa fa-times"></i></span>
																				</label>
																			</div>
																		</div>

																	</div>
																	<div class="row my-3">
																		<div id="{{ $number+0 }}" data-parent="#accordionExample" class="collapse" aria-labelledby="headingOne">
																			<div class="input-group">
																				<input type="text" class="form-control">
																				<div class="input-group-append">
																						<select class="form-control form-control-sm">
																							<option>เลือกหน่วย</option>
																							<option>volt</option>
																							<option>amp</option>
																						</select>
																				</div>
																			</div>
																		</div>
																	</div>
																	<div class="separator-solid my-1"></div>
														@endforeach
														<div class="col-md-6 col-lg-6">
															<div class="form-group">
																<label>NOTE</label>
																<textarea class="form-control" id="MACHINEPM_NOTE" name="MACHINEPM_NOTE" rows="2"></textarea >
															</div>
														</div>
														<div class="separator-solid my-1"></div>
														<div class="row mt-4">
															<div class="col-md-6 col-lg-6">
																<button type="submit" class="btn btn-primary float-right"><i class="fas fa-save fa-lg"> SAVE </i></button>
															</div>
															<div class="col-md-6 col-lg-1">
																<button type="button" onclick="cancelback( '{{ $machine->UNID }}' )" class="btn btn-danger btn-link"><i class="fas fa-back fa-lg"> CANCLE </i></button>
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
<script>
$(document).on('click','.Checkpass',function(){
	var findnumber = $(this).closest('#findnumber');
	var	findlinknumber = findnumber.find('#number').attr('rel');
	var number   = findnumber.find('#number').val();
	var formpass ='<div class="col-lg-1 accordion mt-2">'+
								'<div class="card">'+
								'<div class="card-header" id="headingOne" data-toggle="collapse" data-target="#'+number+'" aria-expanded="false" aria-controls="collapseOne" role="button">'+
								'<button type="button" class="btn btn-primary btn-sm btn-icon btn-round">'+
								'<i class="fas fa-plus"></i>'+
								'</button>'+
								'</div>'+
								'</div>'+
								'</div>';
	$('#formpass'+number).html(formpass);
	// $('#MACHINEPM_CHECK').prop('checked');
});
$(document).on('click','.Checknotpass',function(event){
	// event.preventDefault();
 // alert('dd');
});

</script>

@stop
{{-- ปิดส่วนjava --}}
