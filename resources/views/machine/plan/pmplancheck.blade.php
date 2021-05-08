@extends('masterlayout.masterlayout')
@section('tittle','homepage')
@section('css')
<meta name="csrf-token" content="{{ csrf_token() }}">
<style>
.selectgroup-input-success:checked+.selectgroup-button-success {
	border-color: #ffffff;
	z-index: 1;
	color: #ffffff;
	background: rgb(1 214 47 / 83%);
	}
.selectgroup-input-worng:checked+.selectgroup-button-worng {
	border-color: #ffffff;
	z-index: 1;
	color: #ffffff;
	background: tomato;
	}
</style>
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
							</div>
	          </div>
					</div>
					<div class="py-12">
	        	<div class="container mt-2">
							<div class="row">
								<div class="col-md-12">
									<div class="card ">
										<form action="{{ route('pm.planlistsave')}}" method="post" id="FRM_PLANCHECK" name="FRM_PLANCHECK">
											@csrf
											<input type='text' class="form-control" id="PM_PLAN_UNID" name="PM_PLAN_UNID" value="">
											<input type='text' class="form-control" id="MACHINE_PLAN_UNID" name="MACHINE_PLAN_UNID" value="">
											<input type='text' class="form-control" id="PM_MASTER_UNID" name="PM_MASTER_UNID" value="">
											<div class="card-header bg-primary text-white">
												<div class="form-group">
													<h4 class="my-1">Preventive Machine</h4>
												</div>
											</div>
											<div class="card-body">
												<div class="row">
													<div class="col-md-2">
														<label>รหัสเครื่องจักร</label>
														<input type="text" class="form-control form-control-sm my-1" id="MACHINE_CODE" name="MACHINE_CODE" value="MC-001" readonly>
													</div>
													{{-- <div class="col-md-3">
														<label>ชื่อเครื่องจักร</label>
														<input type="text" class="form-control form-control-sm my-1" id="MACHINE_NAME" name="MACHINE_NAME" value="เครื่องขัดผิวโลหะแบบเขย่า" readonly>
													</div> --}}

													<div class="col-md-3">
														<label>ประเภทเครื่องจักร</label>
														<input type="text" class="form-control form-control-sm my-1" id="PM_MASTER_NAME" name="PM_MASTER_NAME" value="MILLING KEY" readonly>
													</div>

												{{-- </div>
												<div class="row my-2"> --}}
													<div class="col-md-2">
														<label>วันที่ตามแผน</label>
														<input type="text" class="form-control form-control-sm my-1" id="PLAN_DATE" name="PLAN_DATE" value="07/08/2021" readonly>
													</div>
													<div class="col-md-2">
														<label>วันที่ทำการตรวจเช็ค</label>
														<input type="date" class="form-control form-control-sm my-1" id="PLAN_DATE" name="PLAN_DATE" value='{{ date('Y-m-d') }}'>

													</div>
												</div>
											</div>
											@foreach ($PM_PLAN as $key => $dataset)
												<div class="card-header bg-danger text-white">
													<h4 class="my-1">รายการตรวจเช็ค {{ $dataset->PM_MASTER_NAME }}</h4>
												</div>
											@endforeach


											<div class="row">
												<div class="col-md-12">
													<div class="card">
														<div class="card-body">
															@php
															$item_index = 0;
															@endphp
															@foreach ($PM_LIST as $key => $dataitem)
																@php
														 			$item_index++ ;
																@endphp
												<div class="card-title fw-mediumbold bg-primary text-white">{{ $item_index }}. {{$dataitem->PM_TEMPLATELIST_NAME}}</div>
												<div class="card-list">
													@php
														$subitem_index = 1;
													@endphp
													@foreach ($PM_DETAIL->where('PM_TEMPLATELIST_UNID_REF',$dataitem->PM_TEMPLATELIST_UNID_REF) as $number => $datasubitem)
													<div class="item-list">
														<div class="info-user ml-3">
															<div class="username ">{{ $item_index.'.'.$subitem_index++ }} {{$datasubitem->PM_DETAIL_NAME}}</div>
														</div>
														<ul class="nav nav-pills nav-secondary nav-pills-no-bd nav-sm" id="pills-tab" role="tablist">
															<li class="nav-item">
																<input type="text" readonly class="form-control-sm form-control-plaintext bg-info text-white text-center"
																 id="" style="width:100px;" value="{{$datasubitem->PM_DETAIL_STD}}">

																{{-- <a href="#" class="nav-link text-center "id="pills-today" style="width:100px;" >{{$datasubitem->PM_DETAIL_STD}}</a> --}}
															</li>
															<li class="nav-item">
																@if ($datasubitem->PM_TYPE_INPUT == 'number')
																	<input class="form-control form-control-sm" type="{{$datasubitem->PM_TYPE_INPUT}}"id="INPUT_{{$datasubitem->UNID}}" name="INPUT_{{$datasubitem->UNID}}"  style="width:100px;" required>
																@elseif ($datasubitem->PM_TYPE_INPUT == 'radio')
																	<label class="selectgroup-item">
																		<input type="{{$datasubitem->PM_TYPE_INPUT}}" id="INPUT_{{$datasubitem->UNID}}" name="INPUT_{{$datasubitem->UNID}}" value="true" class="selectgroup-input selectgroup-input-success" required>
																		<span class="selectgroup-button selectgroup-button-success selectgroup-button-icon mx-2"><i class="fa fa-check"></i></span>
																	</label>
																	<label class="selectgroup-item">
																		<input type="{{$datasubitem->PM_TYPE_INPUT}}" id="INPUT_{{$datasubitem->UNID}}" name="INPUT_{{$datasubitem->UNID}}" value="false" class="selectgroup-input selectgroup-input-worng" >
																		<span class="selectgroup-button selectgroup-button-worng selectgroup-button-icon "><i class="fa fa-times"></i></span>
																	</label>
																@else
																	<input class="form-control form-control-sm" type="text" id="INPUT_{{$datasubitem->UNID}} " name="INPUT_{{$datasubitem->UNID}}" style="width:100px;" required>
																@endif


															</li>
															<li class="nav-item ">
																<i class="fas fa-question-circle fa-2x"></i>
														</li>
													</ul>
													</div>
													<div class="separator-dashed"></div>
													{{-- <hr> --}}
													@endforeach
												</div>
											@endforeach

										</div>
										<div class="card-action">
											<a href="{{ route('pm.planlist') }}" class="btn btn-warning">Back</a>
											<button class="btn btn-success" type="submit">Save</button>
										</div>
									</div>
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

@stop
{{-- ปิดส่วนเนื้อหาและส่วนท้า --}}

{{-- ส่วนjava --}}
@section('javascript')
	<script src="{{ asset('js/ajax/ajax-csrf.js') }}"></script>


@stop
{{-- ปิดส่วนjava --}}
