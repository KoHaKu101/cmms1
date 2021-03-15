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
							<div class="col-md-1 gx-4">
								<a href="{{ url('machine/assets/machinelist') }}">
									<button class="btn btn-warning  btn-xs ">
										<span class="fas fa-arrow-left fa-lg">Back </span>
									</button>
								</a>
							</div>
							<div class="col-md-2 gx-4">
								<form action="{{ url('machine/assets/update/'.$dataset->UNID) }}" method="POST" enctype="multipart/form-data">
									@csrf
									<button class="btn btn-primary btn-xs" type="submit">
										<span class="fas fa-save fa-lg">	save	</span>
									</button>
							</div>
						</div>
					</div>
				</div>
				<!--ส่วนกรอกข้อมูล-->
				<div class="py-12">
	        <div class="container mt-2">
						<div class="card">
								<div class="card-header bg-primary">
									<h4 class="ml-3 mt-2" style="color:white;" >ลงทะเบียนเครื่องจักร </h4>

								</div>
								<div class="card-body">
									<div class="row">
										<!-- ช่อง1-->
										<div class="col-md-6 col-lg-3">
											<div class="form-group mt-4">
												<img
												<?php
												$noimg = asset("assets/img/nobody.jpg");
												$hasimg = asset($dataset->MACHINE_ICON);
												echo ($dataset->MACHINE_ICON == "") ? 'src= '.$noimg.' ' : 'src= '.$hasimg.' ' ;
												?>
												 width="200" height="200px" class="mt-4">
												  <input type="hidden" id="MACHINE_UPDATE" name="MACHINE_UPDATE" value="{{$dataset->MACHINE_ICON}}">
													<input type="file" class="form-control mt-4" id="MACHINE_ICON" name="MACHINE_ICON"  >

											</div>
										</div>
										<!-- ช่อง2-->
										<div class="col-md-6 col-lg-4">
											<div class="form-group has-error">
												<label for="MACHINE_CODE">รหัสเครื่องจักร</label>
													<input type="text" class="form-control" id="MACHINE_CODE" name="MACHINE_CODE"  value="{{ $dataset->MACHINE_CODE }}">
													<input type="hidden"  id="MACHINE_UNID" name="MACHINE_UNID"  value="{{ $dataset->MACHINE_UNID }}">
											</div>

											<div class="form-group">
												<label for="MACHINE_STARTDATE">วันที่เริ่มใช้งาน	</label>
												<input type="date" class="form-control" id="MACHINE_STARTDATE" name="MACHINE_STARTDATE" value="{{ $dataset->MACHINE_STARTDATE }}">
											</div>
											<div class="row ml-1 mt-2">
												<div class="form-group col-md-6 col-lg-6 has-error">
													<lebel>สถานะ</lebel>
													<select class="form-control form-control" id="MACHINE_CHECK" name="MACHINE_CHECK" >
														<option value>-แสดงทั้งหมด-</option>
														@foreach ($machinestatus as $key => $srow)
															<option value="{{ $srow->STATUS_CODE}}"
																{{ $dataset->MACHINE_CHECK == $srow->STATUS_CODE ? 'selected' : ''}} > {{$srow->STATUS_NAME}} </option>

														@endforeach
													</select>

												</div>
												<div class="form-group col-6 has-error">
													<lebel>ตำแหน่งเครื่อง</lebel>
													<select class="form-control form-control" id="MACHINE_LINE" name="MACHINE_LINE">
													<option value>--แสดงทั้งหมด--</option>
													@foreach($machineline as $dataline)
													<option value="{{ $dataline->LINE_CODE}}"
														{{ $dataset->MACHINE_LINE == $dataline->LINE_CODE ? 'selected' : ''}} > {{$dataline->LINE_NAME}} </option>
													@endforeach
												</select>
						  				</div>
											</div>
											<div class="form-group has-error">
												<label for="MACHINE_TYPE">ชนิดเครื่องจักร</label>
												<select class="form-control form-control" id="MACHINE_TYPE" name="MACHINE_TYPE">
													<option value>--แสดงทั้งหมด--</option>
													@foreach($machinetype as $datatype)
														<option value="{{ $datatype->TYPE_CODE}}"
														{{ $dataset->MACHINE_TYPE == $datatype->TYPE_CODE ? 'selected' : ''}} > {{$datatype->TYPE_CODE}} </option>
															@endforeach
												</select>
											</div>
										</div>
										<!-- ช่อง3-->
										<div class="col-md-6 col-lg-4">
											<div class="form-group has-error">
												<label for="MACHINE_NAME">ชื่อเครื่องจักร</label>
												<input type="text" class="form-control" id="MACHINE_NAME" name="MACHINE_NAME"  value="{{ $dataset->MACHINE_NAME }}">
											</div>
											<div class="form-group has-error">
												<label for="MACHINE_RVE_DATE">วันที่ Maintenance 	</label>
												<input type="date" class="form-control" id="MACHINE_RVE_DATE" name="MACHINE_RVE_DATE"  value="{{ $dataset->MACHINE_RVE_DATE }}">
											</div>
											<div class="form-group has-error">
												<label for="PURCHASE_FORM">ซื้อจากบริษัท	</label>
												<input type="text" class="form-control" id="PURCHASE_FORM" name="PURCHASE_FORM"  value="{{ $dataset->PURCHASE_FORM }}">
											</div>

										</div>
									</div>
									<div class="row">
										<div class="col-md-12 mt-2">
											<div class="card-body">
												@include('masterlayout.tab.styletab')
												<ul class="nav nav-pills justify-content-center mt--4">
	  											<li>
	    											<a id="home-tab" data-toggle="tab" href="#home" class="active" >ข้อมูลทั่วไป</a>
	  											</li>
	  											<li>
	    											<a id="profile-tab" data-toggle="tab" href="#history" >ประวัติการแจ้งซ่อม</a>
	  											</li>
	  											<li>
	    											<a id="messages-tab" data-toggle="tab" href="#plan" >แผนการปฎิบัติการ</a>
								  				</li>
								  				<li>
	    											<a id="settings-tab" data-toggle="tab" href="#personal">พนักงานประจำเครื่อง</a>
	  											</li>
													<li>
	    											<a id="settings-tab" data-toggle="tab" href="#systemcheck">ตรวจสอบระบบ</a>
	  											</li>
													<li>
	    											<a id="settings-tab" data-toggle="tab" href="#partchange">เปลี่ยนอะไหล่</a>
	  											</li>
													<li>
	    											<a id="settings-tab" data-toggle="tab" href="#uploadmanue">Upload</a>
	  											</li>
	  										</ul>
	  										<div class="tab-content clearfix">
														<!-- ข้อมูลทั่วไป -->
	  												@include('masterlayout.tab.homeedit')
														</form>
														<!-- ประวัติการแจ้งซ่อม -->
														@include('masterlayout.tab.edit.history')

														@include('masterlayout.tab.edit.plan')

														@include('masterlayout.tab.edit.personal')
														<!-- ตรวจสอบระบบ -->
														@include('masterlayout.tab.edit.systemcheck')
														<!-- อะไหล่ที่ต้องเปลี่ยน -->
														@include('masterlayout.tab.edit.partchange')
														<!-- upload -->
														@include('masterlayout.tab.edit.uploadmanue')
												</div>
											</div>
										</div>
									</div>
									<div class="card-footer">
										<div class="row">
											<div class="col-md-6 col-lg-1">
												<small><b>สร้างโดย</b></small>
											</div>
											<div class="col-md-6 col-lg-1">
												<small>{{ $dataset->CREATE_BY }}</small>
											</div>
											<div class="col-md-6 col-lg-1">
												<small><b>วันที่สร้าง</b></small>
											</div>
											<div class="col-md-6 col-lg-3">
												<small>{{ $dataset->CREATE_TIME }}</small>
											</div>
											<div class="col-md-6 col-lg-1">
												<small><b>แก้ไขโดย</b></small>
											</div>
											<div class="col-md-6 col-lg-1">
												<small>{{ $dataset->MODIFY_BY }}</small>
											</div>
											<div class="col-md-6 col-lg-1">
												<small><b>วันที่แก้ไข</b></small>
											</div>
											<div class="col-md-6 col-lg-3">
												<small>{{ $dataset->MODIFY_TIME }}</small>
											</div>
										</div>
									</div>
								</div>
						</div>
					</div>
				</div>
			</div>
		</div>

@include('masterlayout.tab.edit.systemcheck.syscheckmain')

@include('masterlayout.tab.modal.partchange.partchange')
@include('masterlayout.tab.modal.partchange.partchangeedit')
@include('masterlayout.tab.modal.uploadmanue')
@include('masterlayout.tab.modal.edit.uploadmanueedit')

@stop
{{-- ปิดส่วนเนื้อหาและส่วนท้า --}}

{{-- ส่วนjava --}}
@section('javascript')
	<script>
	$('.load-ajax-modal').click(function(){

	    $.ajax({
	        type : 'GET',
	        url : $(this).data('path'),

	        success: function(result) {
	            $('#syschecksub div.modal-body').html(result);
	        }
	    });
	});
	</script>
@stop
{{-- ปิดส่วนjava --}}
