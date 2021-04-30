@extends('masterlayout.masterlayout')
@section('tittle','homepage')
@section('css')
{{-- <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"> --}}
<meta name="csrf-token" content="{{ csrf_token() }}">
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
<style>
	.hide { display: none; }
</style>
		<div class="content">
			<div class="page-inner">
				<!--ส่วนปุ่มด้านบน-->
				<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
					<div class="container">
						<div class="row">
							<div class="form-group gx-4">
								<a href="{{ url('machine/assets/machinelist') }}">
									<button class="btn btn-warning  btn-xs ">
										<span class="fas fa-arrow-left fa-lg">Back </span>
									</button>
								</a>
							</div>
							<div class="form-group gx-4">
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
													<input type="text" class="form-control " id="MACHINE_CODE" name="MACHINE_CODE" value="{{ $dataset->MACHINE_CODE }}">
													<input type="hidden"  id="MACHINE_UNID" name="MACHINE_UNID"  value="{{ $dataset->MACHINE_UNID }}">

													{{-- <input type="hidden"  wire:model="dataset"  value="{{ $dataset->MACHINE_CODE }}"> --}}
											</div>

											<div class="form-group">
												<label for="MACHINE_STARTDATE">วันที่เริ่มใช้งาน	</label>
												<input type="date" class="form-control" id="MACHINE_STARTDATE" name="MACHINE_STARTDATE" value="{{ $dataset->MACHINE_STARTDATE }}">
											</div>
											<div class="form-group" >
												<label for="PM_LAST_DATE">ตรวจเช็คระบบ ล่าสุด	</label>
												<input type="date" class="form-control changedateedit" id="PM_LAST_DATE" name="PM_LAST_DATE" value="{{ $machinepmtime == NULL ? "" : $machinepmtime->PM_LAST_DATE }}" rel="{{ $machinepmtime == NULL ? "" : $machinepmtime->UNID }}">
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
												<div class="form-group col-md-6 col-lg-6 has-error">
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
											<div class="form-group has-error mt-1">
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
										<div class="col-md-12 col-lg-4">
											<div class="form-group has-error">
												<label for="MACHINE_NAME">ชื่อเครื่องจักร</label>
												<input type="text" class="form-control" id="MACHINE_NAME" name="MACHINE_NAME"  value="{{ $dataset->MACHINE_NAME }}">
											</div>
											<div class="form-group has-error">
												<label for="MACHINE_RVE_DATE">วันที่ ซ่อมแซม 	</label>
												<input type="date" class="form-control" id="" name=""  value="{{ $dataset->MACHINE_RVE_DATE }}">
											</div>
											<div class="form-group has-error">
												<label for="MACHINE_RVE_DATE">วันที่ เปลี่ยนอะไหล่ 	</label>
												<input type="date" class="form-control" id="" name=""  value="">
											</div>
											<div class="form-group has-error">
												<label for="PURCHASE_FORM">ซื้อจากบริษัท	</label>
												<input type="text" class="form-control" id="PURCHASE_FORM" name="PURCHASE_FORM"  value="{{ $dataset->PURCHASE_FORM }}">
											</div>
											<div class="form-group has-error">
												<label for="PURCHASE_FORM">Machine Rank	</label>
												<select class="form-control" id="MACHINE_RANK_MONTH" name="MACHINE_RANK_MONTH" required>
													<option value>กรุณาเลือก Rank</option>
													@foreach ($machinerank as $key => $datamachinerank)
														<option value="{{$datamachinerank->MACHINE_RANK_MONTH}}" {{ $dataset->MACHINE_RANK_MONTH == $datamachinerank->MACHINE_RANK_MONTH ? 'selected' : ''}} >{{$datamachinerank->MACHINE_RANK_CODE}}</option>
													@endforeach

												</select>
											</div>

										</div>
									</div>
									<div class="row">
										<div class="col-md-12 mt-2">
											<div class="card-body" id="tabLink">
												@include('masterlayout.tab.styletab')
												<ul class="nav nav-pills justify-content-center mt--4" >
	  											<li>
	    											<a id="home" data-toggle="tab" href="#home" class="tabselect active" >ข้อมูลทั่วไป</a>
	  											</li>
	  											<li>
	    											<a id="history" data-toggle="tab" href="#history" class="tabselect"  >ประวัติการแจ้งซ่อม</a>
	  											</li>
	  											<li>
	    											<a id="plan" data-toggle="tab" href="#plan"  class="tabselect" >แผนการปฎิบัติการ</a>
								  				</li>
								  				<li>
	    											<a id="personal" data-toggle="tab" href="#personal" class="tabselect" >พนักงานประจำเครื่อง</a>
	  											</li>
													<li>
	    											<a id="systemcheck" data-toggle="tab" href="#systemcheck" class="tabselect" >ตรวจสอบระบบ</a>
	  											</li>
													{{-- <li>
	    											<a id="settings-tab" data-toggle="tab" href="#partchange">เปลี่ยนอะไหล่</a>
	  											</li> --}}
													<li>
	    											<a id="uploadmanue" data-toggle="tab" href="#uploadmanue" class="tabselect" >Upload</a>
	  											</li>
	  										</ul>
	  										<div class="tab-content clearfix">
														<!-- ข้อมูลทั่วไป -->
	  												@include('masterlayout.tab.edit.homeedit')
														</form>
														<!-- ประวัติการแจ้งซ่อม -->
														@include('masterlayout.tab.edit.history')

														@include('masterlayout.tab.edit.plan')

														@include('masterlayout.tab.edit.personal')
														<!-- ตรวจสอบระบบ -->
														@include('masterlayout.tab.edit.systemcheck')
														<!-- อะไหล่ที่ต้องเปลี่ยน -->
														{{-- @include('masterlayout.tab.edit.partchange') --}}
														<!-- upload -->
														@include('masterlayout.tab.edit.uploadmanue')
												</div>
											</div>
										</div>
									</div>
									<div class="card-footer">
										<div class="row">
												<small><b>สร้างโดย : </b></small>&nbsp;
												<small> {{ $dataset->CREATE_BY }}</small>&emsp;
												<small><b>วันที่สร้าง : </b></small>&nbsp;
												<small> {{ $dataset->CREATE_TIME }}</small>&emsp;
												<small><b>แก้ไขโดย : </b></small>&nbsp;
												<small> {{ $dataset->MODIFY_BY }}</small>&emsp;
												<small><b>วันที่แก้ไข : </b></small>&nbsp;
												<small> {{ $dataset->MODIFY_TIME }}</small>&emsp;

										</div>
									</div>
								</div>
						</div>
					</div>
				</div>
			</div>
		</div>

{{-- @include('masterlayout.tab.edit.systemcheck.syscheckmain') --}}

{{-- @include('masterlayout.tab.modal.partchange.partchange') --}}
@include('masterlayout.tab.modal.partchange.partchangeedit')
@include('masterlayout.tab.modal.uploadmanue')
@include('masterlayout.tab.modal.edit.uploadmanueedit')
@include('masterlayout.tab.modal.pmmachine')


@stop
{{-- ปิดส่วนเนื้อหาและส่วนท้า --}}

{{-- ส่วนjava --}}
@section('javascript')

	<script src="{{ asset('js/machine/editmachine.js') }}"></script>
	 <script src="{{ asset('js/ajax/ajax-csrf.js') }}"></script>
@stop
{{-- ปิดส่วนjava --}}
