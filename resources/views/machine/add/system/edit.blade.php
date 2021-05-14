@extends('masterlayout.masterlayout')
@section('tittle','homepage')
@section('css')
{{-- <link rel="stylesheet" href="{{asset('assets/css/bulma.min.css')}}"> --}}
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
								<a href="{{url('machine/pm/template/list/'.$datapmtemplate->UNID)}}">
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
									<form action="{{ url('machine/pm/template/update/'.$datapmtemplatelist->UNID) }}" method="post" enctype="multipart/form-data">
										@csrf
										<div class="card-header bg-primary">

											<h4 class="ml-3 mt-2" style="color:white;" >ประเภทรายการ : {{$datapmtemplate->PM_TEMPLATE_NAME}}, รายการ PM : {{$datapmtemplatelist->PM_TEMPLATELIST_NAME}}
												<a href="{{ url('/machine/pm/template/add/'.$datapmtemplate->UNID) }}">
												<button type="button" class="btn btn-warning btn-sm float-right " name="save" >
													<i class="fas fa-save" style="color:white;font-size:15px"> New</i>
												</button>
												</a>
										</h4>

										 </div>
										<div class="card-body">
										 	<div class="row">
											 	<div class="col-md-6 col-lg-3 has-error">
												 	<label> Inspection Item</label>
													<input type="hidden" class="form-control" name="PM_TEMPLATELIST_CHECK" value="{{ $datapmtemplatelist->PM_TEMPLATELIST_CHECK }}">
												 	<input type="text" class="form-control" name="PM_TEMPLATELIST_NAME" value="{{ $datapmtemplatelist->PM_TEMPLATELIST_NAME }}">
											 	</div>
												<div class="col-md-6 col-lg-2 has-error">
													<label> ระยะเวลา</label>
													<div class="input-group">
														<input type="text" class="form-control" name="PM_TEMPLATELIST_DAY" value="{{ $datapmtemplatelist->PM_TEMPLATELIST_DAY / 30 }}">
														<div class="input-group-append">

															<span class="input-group-text">เดือน</span>
														</div>
													</div>
												</div>

												<div class="col-md-6 col-lg-2 has-error">
													<label> สถานะ</label>
													<div class="selectgroup w-100">
															<label class="selectgroup-item">
																<input type="radio" name="PM_TEMPLATELIST_STATUS" value="1" class="selectgroup-input" {{ $datapmtemplatelist->PM_TEMPLATELIST_STATUS == '1' ? 'checked' : ""}}>
																<span class="selectgroup-button">เปิด</span>
															</label>
															<label class="selectgroup-item">
																<input type="radio" name="PM_TEMPLATELIST_STATUS" value="2" class="selectgroup-input" {{ $datapmtemplatelist->PM_TEMPLATELIST_STATUS == '2' ? 'checked' : ""}}>
																<span class="selectgroup-button">ปิด</span>
															</label>
														</div>
												</div>
										 	</div>
											<div class="row">
												<div class="col-md-6 col-lg-10">
											</div>
											<div class="col-md-6 col-lg-1">
												<button class="btn btn-primary btn-sm" >
													<i class="fas fa-save" style="color:white;font-size:15px" name="save" value="save"> Save</i>
												</button>
											</div>

										</div>
										</div>
									</form>
											</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-8">
									<div class="card">
											<div class="card-header bg-primary">
												<input type="hidden" name="PM_TEMPLATELIST_UNID_REF" id="PM_TEMPLATELIST_UNID_REF" value="{{ $datapmtemplatelist->UNID }}">
												<h4 class="ml-3 mt-2" style="color:white;" > Inspection Check</h4>
											</div>
												<div class="card-body mt--3">
													<style>
													.table-responsive {
    												display: table;
														}
													</style>
													<div class="table-responsive mt--4">
														<table class="table table-hover table-bordered mt-4">
															<thead>
																<tr>
																	<th >ลำดับ</th>
																	<th >รายละเอียด</th>
																	<th>ค่า STD</th>
																	<th>Unit</th>
																	<th>ข้อมูล</th>
																	<th colspan="2"></th>
																</tr>
															</thead>
															<tbody>
															@foreach ($datapmtemplatedetail as $key => $dataitem)
																<tr>
																	
																	<th scope="row">{{$key+1}}</th>
																	<td>{{$dataitem->PM_DETAIL_NAME}}</td>
																	<td>{{$dataitem->PM_DETAIL_STD}}</td>
																	<td>{{$dataitem->PM_DETAIL_UNIT}}</td>
																	<td>{{$dataitem->PM_TYPE}}</td>
																	<td >
																		<button type="button" class="btn btn-primary btn-block btn-sm my-1 edit"
																		onclick="editdetail('{{ $dataitem->UNID }}','{{ $dataitem->PM_DETAIL_NAME }}'
																		,'{{ $dataitem->PM_DETAIL_STD }}','{{ $dataitem->PM_TYPE_INPUT }}','{{ $dataitem->PM_DETAIL_UNIT }}'
																		,'{{ (double)$dataitem->PM_DETAIL_STD_MAX }}','{{ (double)$dataitem->PM_DETAIL_STD_MIN }}')">
																			<i class="fas fa-edit fa-lg">	</i>
																		</button>
																	</td>
																	<td >
																		<button type="button" class="btn btn-danger btn-block btn-sm my-1" onclick="deletedata('{{ $dataitem->UNID }}')" >
																			<i class="fas fa-trash fa-lg">	</i>
																		</button>

																	</td>
																</tr>
															@endforeach

															</tbody>
														</table>
												</div>
											</div>
										</div>
									</div>
									<div class="col-md-4">
									<div class="card">
										<div class="card-header bg-primary">
											<h4 class="ml-3 mt-2" style="color:white;" > เพิ่ม Inspection Check  </h4>
										 </div>
										<div class="card-body PM_CANCEL" id="PM_DETAIL_NAME">
											<form action="{{ route('pmtemplatedetail.store') }}" method="POST">
												@csrf
												<div class="form-group" >
													<div class="row has-error">
														<label for="SYSTEM_CODE">รายละเอียด</label>
														<input type="hidden" id="PM_TEMPLATELIST_UNID_REF" name="PM_TEMPLATELIST_UNID_REF" value="{{ $datapmtemplatelist->UNID }}">
														<textarea class="form-control " id="PM_DETAIL_NAME" name="PM_DETAIL_NAME" rows="2" required autofocus></textarea >
													</div>
														<div class="row">
															<div class="col-md-6 has-error">
																<label for="PM_DETAIL_STD">ค่า STD</label>
																	<input type="number" class="form-control" id="PM_DETAIL_STD" name="PM_DETAIL_STD" step="any" required>
															</div>
															<div class="col-md-6">
																<label for="PM_DETAIL_UNIT">หน่วย</label>
																<input type="text" class="form-control" id="PM_DETAIL_UNIT" name="PM_DETAIL_UNIT" >
															</div>
														</div>
														<div class="row">
															<div class="col-md-6">
																<label for="PM_DETAIL_STD_MAX">ค่า Max</label>
																<input type="number" class="form-control col-md-12" id="PM_DETAIL_STD_MAX" name="PM_DETAIL_STD_MAX" step="any" >
															</div>
															<div class="col-md-6">
																<label for="PM_DETAIL_STD_MIN">ค่า Min</label>
																<input type="number" class="form-control col-md-12" id="PM_DETAIL_STD_MIN" name="PM_DETAIL_STD_MIN" step="any" >
															</div>
														</div>

												<label for="smallSelect" class="my-1">ข้อมูล</label>
													<select class="form-control form-control-sm" id="PM_TYPE_INPUT" name="PM_TYPE_INPUT" onchange="changetype()"required>
														<option value="">กรุณาเลือกประเภทการกรอก</option>
														<option value="number">กรอกค่าตัวเลข</option>
														<option value="radio">เลือก ผ่าน ไม่ผ่าน</option>
													</select>

													<button type="submit" class="btn btn-primary mt-3">Save</button>
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


@stop
{{-- ปิดส่วนเนื้อหาและส่วนท้า --}}

{{-- ส่วนjava --}}
@section('javascript')
<script src="{{ asset('/js/addtable/systemedit.js') }}"></script>
<script>

	function editdetail(unid,text,std,type,unit,max,min){
		var unid = (unid) ;
		var text = (text) ;
		var std = (std);
		var type = (type);
		var unit = (unit) ;
		var max = (max);
		var min = (min);
		var number = (type == "number") ? "selected" : "";
		var radio = (type == "radio") ? "selected" : "";
		var readonly = (type == "radio") ? "readonly" : "";

		var url = '/machine/pm/template/storedetailupdate' ;
		var _html=	'<form action="'+url+'" method="POST" enctype="multipart/form-data">'+
								'@csrf'+
								'<div class="form-group" >'+
									'<div class="row has-error">'+
										'<label for="SYSTEM_CODE">รายละเอียด</label>'+
										'<input type="hidden" id="PMTEMPLATEDETAIL_UNID" name="PMTEMPLATEDETAIL_UNID" value="'+unid+'">'+
										'<textarea class="form-control" id="PM_DETAIL_NAME" name="PM_DETAIL_NAME" rows="2">'+text+'</textarea required autofocus>'+
									'</div>'+
										'<div class="row">'+
											'<div class="col-md-6 has-error">'+
												'<label for="SYSTEM_CODE">ค่า STD</label>'+
													'<input type="number" class="form-control" id="PM_DETAIL_STD" name="PM_DETAIL_STD" value="'+std+'" step="any" '+readonly+' required >'+
											'</div>'+
											'<div class="col-md-6">'+
												'<label for="SYSTEM_CODE">หน่วย</label>'+
												'<input type="text" class="form-control" id="PM_DETAIL_UNIT" name="PM_DETAIL_UNIT" value="'+unit+'" >'+
											'</div>'+
										'</div>'+
										'<div class="row">'+
											'<div class="col-md-6">'+
												'<label for="SYSTEM_CODE">ค่า Max</label>'+
												'<input type="number" class="form-control col-md-12" id="PM_DETAIL_STD_MAX" name="PM_DETAIL_STD_MAX" value="'+max+'" step="any">'+
											'</div>'+
										'<div class="col-md-6">'+
												'<label for="SYSTEM_CODE">ค่า Min</label>'+
												'<input type="number" class="form-control col-md-12" id="PM_DETAIL_STD_MIN" name="PM_DETAIL_STD_MIN" value="'+min+'" step="any">'+
											'</div>'+
										'</div>'+
								'<label for="smallSelect" class="my-1">ข้อมูล</label>'+
								'<select class="form-control form-control-sm" id="PM_TYPE_INPUT" name="PM_TYPE_INPUT" onchange="changetype()" required>'+
								'<option value="" >กรุณาเลือกประเภทการกรอก</option>'+
								'<option value="number" '+number+'>กรอกค่าตัวเลข</option>'+
								'<option value="radio" '+radio+'>เลือก ผ่าน ไม่ผ่าน</option>'+
								'</select>'+
								'<button type="submit" class="btn btn-primary mt-3" >Update</button>'+
								'<button type="button" onclick="exiteditdetail()" class="btn btn-danger float-right mt-3">Cancel</button>'+
								'</div>'+
							'</form>';
							$("#PM_DETAIL_NAME").html(_html);

						};
	function exiteditdetail(){
		var unid = $('#PM_TEMPLATELIST_UNID_REF').val() ;
		var url 	=  '/machine/pm/template/storedetail';
		var _html ='<form action="'+url+'" method="POST" enctype="multipart/form-data">'+
							'@csrf'+
							'<div class="form-group" >'+
								'<div class="row has-error">'+
									'<label for="SYSTEM_CODE">รายละเอียด</label>'+
									'<input type="hidden" id="PM_TEMPLATELIST_UNID_REF" name="PM_TEMPLATELIST_UNID_REF">'+
									'<textarea class="form-control" id="PM_DETAIL_NAME" name="PM_DETAIL_NAME" rows="2"></textarea required autofocus>'+
								'</div>'+
									'<div class="row">'+
										'<div class="col-md-6 has-error">'+
											'<label for="SYSTEM_CODE">ค่า STD</label>'+
												'<input type="number" class="form-control" id="PM_DETAIL_STD" name="PM_DETAIL_STD" step="any">'+
										'</div>'+
										'<div class="col-md-6">'+
											'<label for="SYSTEM_CODE">หน่วย</label>'+
											'<input type="text" class="form-control" id="PM_DETAIL_UNIT" name="PM_DETAIL_UNIT">'+
										'</div>'+
									'</div>'+
									'<div class="row">'+
										'<div class="col-md-6">'+
											'<label for="SYSTEM_CODE">ค่า Max</label>'+
											'<input type="number" class="form-control col-md-12" id="PM_DETAIL_STD_MAX" name="PM_DETAIL_STD_MAX" step="any">'+
										'</div>'+
									'<div class="col-md-6">'+
											'<label for="SYSTEM_CODE">ค่า Min</label>'+
											'<input type="number" class="form-control col-md-12" id="PM_DETAIL_STD_MIN" name="PM_DETAIL_STD_MIN" step="any">'+
										'</div>'+
									'</div>'+
							'<label for="smallSelect" class="my-1">ข้อมูล</label>'+
							'<select class="form-control form-control-sm" id="PM_TYPE_INPUT" name="PM_TYPE_INPUT" onchange="changetype()" required>'+
							'<option value="" >กรุณาเลือกประเภทการกรอก</option>'+
							'<option value="number">กรอกค่าตัวเลข</option>'+
							'<option value="radio">เลือก ผ่าน ไม่ผ่าน</option>'+
							'</select>'+
							'<button type="submit" class="btn btn-primary mt-3" >Save</button>'+
							'</div>'+
						'</form>';
						$(".PM_CANCEL").html(_html);
	};
	function changetype(){
			var select_type = $('#PM_TYPE_INPUT').val();
			if (select_type == "radio") {
				Swal.fire({
							title: 'หากทำการเลือก ผ่าน ไม่ผ่าน',
							text: " ค่า STD จะเป็น ผ่าน = 1",
							icon: 'warning',
							confirmButtonColor: '#3085d6',
							cancelButtonColor: '#d33',
							confirmButtonText: 'OK',
							timer: 2000
						});

				$('#PM_DETAIL_STD').val('1');
				$('#PM_DETAIL_STD').attr('readonly','true');
			}else {

				$('#PM_DETAIL_STD').prop('readonly', false);
			}
	}
</script>

@stop
{{-- ปิดส่วนjava --}}
