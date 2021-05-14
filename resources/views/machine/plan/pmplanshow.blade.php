@extends('masterlayout.masterlayout')
@section('tittle','homepage')
@section('css')

<link rel="stylesheet" href="{{ asset('css/_magnific-popup.scss')}}">
<meta name="csrf-token" content="{{ csrf_token() }}">
<style>
.selectgroup-input-check:checked+.selectgroup-button-check {
	border-color: #ffffff;
	z-index: 1;
	color: #ffffff;
	background: rgb(1 214 47 / 83%);
	}
.selectgroup-input-times:checked+.selectgroup-button-times {
	border-color: #ffffff;
	z-index: 1;
	color: #ffffff;
	background: tomato;
	}
	.deleteimg {
	  color: #fff;
	  position: absolute;
		padding: 10px;
	  top: 0px;
	  left: 0px;

	}
	.mfp-container {
	  color: #fff;
	  position: absolute;
	  top: 10px;
	  left: 10px;

	}
	.mfp-content {
		text-align: center;
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
							<a href="{{ route('pm.planlist') }}" class="btn btn-warning btn-sm my-2"><i class="fas fa-arrow-left"></i></a>
							<div class="row">
								<div class="col-md-12">
									<div class="card ">

										@php
										$resultinput = array();
										$result = array();
										foreach ($PMPLANRESULT as $key => $value){
											 $resultinput[$value->PM_MASTER_DETAIL_UNID] = $value->PM_MASTER_DETAIL_INPUT;
											 $result[$value->PM_MASTER_DETAIL_UNID] = $value->PM_MASTER_DETAIL_RESULT;
										}
										@endphp
										<form action="{{ route('pm.planlistsave')}}" method="post" id="FRM_PLANCHECK" name="FRM_PLANCHECK">
											@csrf
											<input type='hidden' class="form-control" id="PM_PLAN_UNID" name="PM_PLAN_UNID" value="{{$PM_PLANSHOW->UNID}}">
											<input type='hidden' class="form-control" id="MACHINE_PLAN_UNID" name="MACHINE_PLAN_UNID" value="{{$PM_PLANSHOW->MACHINE_UNID}}">
											<input type='hidden' class="form-control" id="PM_MASTER_UNID" name="PM_MASTER_UNID" value="{{$PM_PLANSHOW->PM_MASTER_UNID}}">
											<div class="card-header bg-primary text-white">
												<div class="form-group">
													<h4 class="my-1">Preventive Machine</h4>
												</div>
											</div>
											<div class="card-body">
												<div class="row">
													<div class="col-md-2">
														<label>รหัสเครื่องจักร</label>
														<input type="text" class="form-control form-control-sm my-1" id="MACHINE_CODE" name="MACHINE_CODE" value="{{$PM_PLANSHOW->MACHINE_CODE}}" readonly>
													</div>
													<div class="col-md-3">
														<label>ประเภทเครื่องจักร</label>
														<input type="text" class="form-control form-control-sm my-1" id="PM_MASTER_NAME" name="PM_MASTER_NAME" value="{{$PM_PLANSHOW->PM_MASTER_NAME}}" readonly>
													</div>
													<div class="col-md-2">
														<label>วันที่ตามแผน</label>
														<input type="text" class="form-control form-control-sm my-1" id="PLAN_DATE" name="PLAN_DATE" value="{{$PM_PLANSHOW->PLAN_DATE}}" readonly>
													</div>
													<div class="col-md-2">
														<label>วันที่ทำการตรวจเช็ค</label>

															<input type="text" class="form-control form-control-sm my-1" id="CHECK_DATE" name="CHECK_DATE"
															value='{{$PMPLANRESULT_FIRST->CHECK_DATE}}' readonly>

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

													<div class="row">

															<div class="col-12 col-sm-12 col-md-12 col-lg-5 my-1 ">
																<div class="info-user">
																	<div class="username ">{{ $item_index.'.'.$subitem_index++ }} {{$datasubitem->PM_DETAIL_NAME}}</div>
																</div>
															</div>
															<div class="col-10 col-sm-12 col-md-12 col-lg-6 my-1 mx-3">
																<div class="row">
																	<ul class="nav nav-pills nav-secondary nav-pills-no-bd nav-sm" id="pills-tab" role="tablist">
																		<div class="col-4 col-sm-2 col-md-2 col-lg-2">
																		<li class="nav-item">
																			<label>มาตรฐาน</label>
																			<input type="text" readonly class="form-control-sm form-control-plaintext bg-success text-white text-center my-1"
																			 id="PM_MASTER_DETAIL_VALUE_STD" name="PM_MASTER_DETAIL_VALUE_STD" style="width:60px;" value="{{$datasubitem->PM_DETAIL_STD}} ">
																		</li>
																		</div>
																		<div class="col-4 col-sm-2 col-md-2 col-lg-2">
																		<li class="nav-item">
																			<label>MAX</label>
																			<input type="text" readonly class="form-control-sm form-control-plaintext bg-danger text-white text-center my-1"
																			id="PM_MASTER_DETAIL_VALUE_STD_MAX" name="PM_MASTER_DETAIL_VALUE_STD_MAX" style="width:60px;" value="{{(double)$datasubitem->PM_DETAIL_STD_MAX}}">
																		</li>
																	</div>
																	<div class="col-4 col-sm-2 col-md-2 col-lg-2">
																		<li class="nav-item">
																			<label>MIN</label>
																			<input type="text" readonly class="form-control-sm form-control-plaintext bg-warning text-white text-center my-1"
																			 id="PM_MASTER_DETAIL_VALUE_STD_MIN" name="PM_MASTER_DETAIL_VALUE_STD_MIN" style="width:60px;" value="{{(double)$datasubitem->PM_DETAIL_STD_MIN}}">
																		</li>
																	</div>
																	<div class="col-8 col-sm-4 col-md-3 col-lg-4">
																		<li class="nav-item">

																			<label>ผลตรวจ</label>
																			@if ($datasubitem->PM_TYPE_INPUT == 'number')
																				<input class="form-control-sm my-1 form-control-plaintext bg-secondary text-white" placeholder="input" type="text" id="INPUT_[{{$datasubitem->UNID}}]"
																				name="INPUT_[{{$datasubitem->UNID}}]"
																				value="{{ $resultinput[$datasubitem->UNID] }}"
																				style="width:100px;" readonly step="any">
																			@elseif ($datasubitem->PM_TYPE_INPUT == 'radio')
																				@if ($resultinput[$datasubitem->UNID] == 1)
																				<div>
																					<label class="selectgroup-item">
																						<input type="{{$datasubitem->PM_TYPE_INPUT}}" id="INPUT_[{{$datasubitem->UNID}}]" name="INPUT_[{{$datasubitem->UNID}}]" value="1" class="selectgroup-input selectgroup-input-check" checked disabled>
																						<span class="selectgroup-button selectgroup-button-check selectgroup-button-icon my-1 mx-2"><i class="fa fa-check"></i></span>
																					</label>
																					<label class="selectgroup-item">
																						<input type="{{$datasubitem->PM_TYPE_INPUT}}" class="selectgroup-input selectgroup-input-times" disabled>
																						<span class="selectgroup-button selectgroup-button-times selectgroup-button-icon my-1 "><i class="fa fa-times"></i></span>
																					</label>
																				</div>
																				@elseif ($resultinput[$datasubitem->UNID] == 0)
																					<div>
																					<label class="selectgroup-item">
																						<input type="{{$datasubitem->PM_TYPE_INPUT}}" id="INPUT_[{{$datasubitem->UNID}}]" name="INPUT_[{{$datasubitem->UNID}}]" value="1" class="selectgroup-input selectgroup-input-check"  disabled >
																						<span class="selectgroup-button selectgroup-button-check selectgroup-button-icon my-1 mx-2"><i class="fa fa-check"></i></span>
																					</label>
																						<label class="selectgroup-item">
																							<input type="{{$datasubitem->PM_TYPE_INPUT}}" id="INPUT_[{{$datasubitem->UNID}}]" name="INPUT_[{{$datasubitem->UNID}}]" value="0" class="selectgroup-input selectgroup-input-times" checked disabled>
																							<span class="selectgroup-button selectgroup-button-times selectgroup-button-icon my-1 "><i class="fa fa-times"></i></span>
																						</label>
																						</div>
																					@else
																						<div>
																						<label class="selectgroup-item">
																							<input type="{{$datasubitem->PM_TYPE_INPUT}}" id="INPUT_[{{$datasubitem->UNID}}]" name="INPUT_[{{$datasubitem->UNID}}]" value="1" class="selectgroup-input selectgroup-input-check"  >
																							<span class="selectgroup-button selectgroup-button-check selectgroup-button-icon my-1 mx-2"><i class="fa fa-check"></i></span>
																						</label>
																						<label class="selectgroup-item">
																							<input type="{{$datasubitem->PM_TYPE_INPUT}}" id="INPUT_[{{$datasubitem->UNID}}]" name="INPUT_[{{$datasubitem->UNID}}]" value="0" class="selectgroup-input selectgroup-input-times" >
																							<span class="selectgroup-button selectgroup-button-times selectgroup-button-icon my-1 "><i class="fa fa-times"></i></span>
																						</label>
																						</div>
																				@endif

																			@else
																				<input class="form-control form-control-sm my-1" type="text" id="INPUT_[{{$datasubitem->UNID}}] "
																				name="INPUT_[{{$datasubitem->UNID}}]"
																				value="{{ $resultinput[$datasubitem->UNID] }}"
																				style="width:100px;" readonly>
																			@endif
																		</li>
																	</div>
																	<div class="col-4 col-sm-2 col-md-2 col-lg-2">
																		<li class="nav-item ">
																			<label>ประเมิน</label>

																				<button type="button" class="btn btn-icon btn-round {{$result[$datasubitem->UNID] == 'PASS' ?'btn-success' : 'btn-danger'}} btn-sm my-1 mx-2" disabled>
																					<i class="{{$result[$datasubitem->UNID] == 'PASS' ?'fa fa-check' : 'fa fa-times'}}"></i>
																				</button>

																		</div>
																	</li>
																	</ul>
																</div>
															</div>
													</div>
													<div class="separator-dashed"></div>
													@endforeach
												</div>
											@endforeach

										</div>

										<div class="row">
											<div class="col-md-12">
												<div class="form-group">
											<label for="comment">ข้อเสนอแนะ</label>
											<textarea class="form-control" id="PM_MASTERPLPAN_REMARK" name="PM_MASTERPLPAN_REMARK" rows="3">
											</textarea>
										</div>
											</div>
										</div>
										<div class="card-action">
											<div class="row form-inline">
												<div class="form-group col-md-6">
													<label for="inlineinput" class="col-md-3 col-form-label">ผู้ทำการตรวจเช็ค</label>
													<div class="col-md-9 p-0">
														<input type="text" class="form-control input-full" id="PM_USER_CHECK" name="PM_USER_CHECK"
														 placeholder="กรุณาใส่ชื่อ" value="{{$PMPLANRESULT_FIRST->PM_USER_CHECK}}"
														 style="width:100px;" readonly >
													</div>
												</div>

												<div class="col-md-6">
													<button class="btn btn-success float-right" type="submit">Save</button>
													<a href="{{ route('pm.planlist') }}" class="btn btn-warning float-right mx-1">Back</a>
												</div>

											</div>
										</div>
									</div>
												</div>
											</div>
									</form>
									<div class="row">
										<div class="col col-lg-12">
											<form action="{{ route('pm.planlistupload') }}" id="FRM_UPLOAD" name="FRM_UPLOAD" method="POST" enctype="multipart/form-data">
												@method('POST')
												@csrf
											<div class="col col-lg-12 form-inline">
												<div class="form-group mx-1">
												<label for="exampleFormControlFile1">แนบรูปภาพปฏิบัติงาน</label>
												<input type="file" class="form-control-file" id="FILE_NAME" name="FILE_NAME"required>
												<input type="hidden" id="IMG_PLAN_UNID"name="IMG_PLAN_UNID"value="{{$PM_PLANSHOW->UNID}}" >

											</div>
										</div>
										<div class="col col-lg-12">
											<button class="btn btn-primary btn-block" id="BTN_UPLOAD" name="BTN_UPLOAD"
											 type="submit" @if (Session::has('autofocus')) autofocus @endif >Upload</button>
										</div>
									</form>
										</div>
									</div>

									<div class="row row-projects">
					<div class="col col-lg">

						<div class="card">
							<div class="card-body">
								<div class="row image-gallery">
									@if (isset($PLAN_UPLOAD_IMG))

										@foreach ($PLAN_UPLOAD_IMG as $INDEXIMG => $IMG)
											<a href="{{asset('../../image/planresult/'.$IMG->UNID_REF.'/'.$IMG->FILE_NAME.'')}}"
												class="col-6 col-md-2 my-1 mx--4 hv-100" id="{{$IMG->UNID}}" data-imgunid="{{$IMG->UNID}}">
													<img src="{{asset('../../image/planresult/'.$IMG->UNID_REF.'/'.$IMG->FILE_NAME.'')}}"
													 style="width: 290px;height: 100;left: 0px; top: 0px;" class="img-fluid">
											</a>

  									@endforeach
							    @endif





								</div>
							</div>
					</div>
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
	<script src="{{ asset('js/ajax/ajax-csrf.js') }}"></script>
	<script src="{{ asset('js/jquery.ui.touch-punch.min.js') }}"></script>
	<script src="{{ asset('js/bootstrap-toggle.min.js') }}"></script>
	<script src="{{ asset('js/jquery.magnific-popup.min.js') }}"></script>
<script>
		// This will create a single gallery from all elements that have class "gallery-item"
	$(".image-gallery a").click(function(e) {
  	var file = $(this).attr("href");
		var imgunid = $(this).data("imgunid");
  		$.magnificPopup.open({
	    items: {
      	src: $('<img src="' + file + '"/><button type="button" class="deleteimg btn btn-danger" ><i class="fas fa-trash"></i></button>'),
      	type: 'inline'
    	},
    	closeBtnInside: false,
  		});
  		e.preventDefault();
			$(".deleteimg").on('click',function(e){
				e.preventDefault();
				Swal.fire({
  				title: 'ต้องการลบรูปใช่มั้ย?',
  				showDenyButton: true,
  				confirmButtonText: `Delete`,
  				denyButtonText: `Cancel`,
				}).then((result) => {
  			if (result.isConfirmed) {

					$.ajax({
  					type: "POST",
  					url: '{{route('pm.deleteimg')}}',
						dataType: 'JSON',
  					data: {"_token": "{{ csrf_token() }}",
									  'imgunid' : imgunid},
  					success: function(data){
							if (data.result = 'true') {
								var imgunid = data.imgunid;
								$("#"+imgunid).remove();
							}

						}
					});
  			}
		})
		});

	});
	$
	</script>


@stop
{{-- ปิดส่วนjava --}}
