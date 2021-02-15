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
							<div class="col-md-1 mt-2">
								<a href="{{ url('machine/assets/machinelist') }}">
									<button class="btn btn-primary  btn-sm ">
										<span class="fas fa-arrow-left ">Back </span>
									</button>
								</a>
							</div>
							<div class="col-md-11 mt-2 ">
								<form action="{{ url('machine/assets/update/'.$data_set->UNID) }}" method="POST" enctype="multipart/form-data">
									@csrf
									<button class="btn btn-success btn-sm" type="submit">
										<span class="fas fa-file-medical ">	update	</span>
									</button>
							</div>
						</div>
					</div>
				</div>
				<!--ส่วนกรอกข้อมูล-->
				<div class="py-12">
	        <div class="container mt-2">
						<div class="card">
							<div class="">
								<div class="form-inline bg-primary"><p style="color:white;font-size:17px" class="ml-4 mt-3">แก้ไขข้อมูล</p>
									<div class="btn-group ml-3" role="group" aria-label="Basic example">
									</div>
									<div class="form-group form-inline ">
									</div>
								</div>
							</div>
							<div class="card-body">
								<div class="row">
									<!-- ช่อง1-->
										<div class="col-md-6 col-lg-3">
											<div class="form-group mt-4">
												<img src="{{asset('/image/machnie')}}/{{$data_set->MACHINE_ICON}}" width="200" height="200px" class="mt-4">
													<input type="file" class="form-control mt-4" id="MACHINE_ICON" name="MACHINE_ICON" >
											</div>
										</div>
										<!-- ช่อง2-->
										<div class="col-md-6 col-lg-4">
											<div class="form-group has-error">
												<label for="MACHINE_CODE">รหัสเครื่องจักร</label>
													<input type="text" class="form-control" id="MACHINE_CODE" name="MACHINE_CODE"  value="{{ $data_set->MACHINE_CODE }}">
													<input type="hidden"  id="MACHINE_UNID" name="MACHINE_UNID"  value="{{ $data_set->MACHINE_UNID }}">
													@error ('MACHINE_CODE')
														<span class="text-danger"> {{ $message }}</span>
													@enderror
											</div>

											<div class="form-group">
												<label for="MACHINE_STARTDATE">วันที่เริ่มใช้งาน	</label>
												<input type="date" class="form-control" id="MACHINE_STARTDATE" name="MACHINE_STARTDATE" value="{{ $data_set->MACHINE_STARTDATE }}">
											</div>
											<div class="row ml-1 mt-2">
												<div class="form-group col-md-6 col-lg-6 has-error">
													<lebel>สถานะ</lebel>
													<select class="form-control form-control" id="MACHINE_CHECK" name="MACHINE_CHECK">

														<option value>-แสดงทั้งหมด-</option>
														<option value="1"{{ $data_set->MACHINE_CHECK == "1" ? 'selected' : '' }}>ทำงานปกติ</option>
														<option value="2"{{ $data_set->MACHINE_CHECK == "2" ? 'selected' : '' }}>ทำงาน</option>
														<option value="3"{{ $data_set->MACHINE_CHECK == "3" ? 'selected' : '' }}>รอผลิต</option>
														<option value="4"{{ $data_set->MACHINE_CHECK == "4" ? 'selected' : '' }}>แผนผลิต</option>
													</select>
												</div>
												<div class="form-group col-6 has-error">
													<lebel>ตำแหน่งเครื่อง</lebel>
													<select class="form-control form-control" id="MACHINE_LINE" name="MACHINE_LINE">
													<option value>--แสดงทั้งหมด--</option>
													<option value="L1"{{ $data_set->MACHINE_LINE == "L1" ? 'selected' : '' }}>Line 1</option>
													<option value="L2"{{ $data_set->MACHINE_LINE == "L2" ? 'selected' : '' }}>Line 2</option>
													<option value="L3"{{ $data_set->MACHINE_LINE == "L3" ? 'selected' : '' }}>Line 3</option>
													<option value="L4"{{ $data_set->MACHINE_LINE == "L4" ? 'selected' : '' }}>Line 4</option>
													<option value="L5"{{ $data_set->MACHINE_LINE == "L5" ? 'selected' : '' }}>Line 5</option>
													<option value="L6"{{ $data_set->MACHINE_LINE == "L6" ? 'selected' : '' }}>Line 6</option>
												</select>
						  				</div>
											</div>
											<div class="form-group has-error">
												<label for="MACHINE_TYPE">ชนิดเครื่องจักร</label>
												<select class="form-control form-control" id="MACHINE_TYPE" name="MACHINE_TYPE" value="{{ $data_set->MACHINE_TYPE }}">
													<option value>--แสดงทั้งหมด--</option>
													<?php
													for($i = 1; $i <(5); $i++)
														echo'<option value="'.$i.' "> '.$i.' </option>';
														?>
												</select>
											</div>
										</div>
										<!-- ช่อง3-->
										<div class="col-md-6 col-lg-4">
											<div class="form-group has-error">
												<label for="MACHINE_NAME">ชื่อเครื่องจักร</label>
												<input type="text" class="form-control" id="MACHINE_NAME" name="MACHINE_NAME"  value="{{ $data_set->MACHINE_NAME }}">
											</div>
											<div class="form-group has-error">
												<label for="MACHINE_RVE_DATE">วันที่ Maintenance 	</label>
												<input type="date" class="form-control" id="MACHINE_RVE_DATE" name="MACHINE_RVE_DATE"  value="{{ $data_set->MACHINE_RVE_DATE }}">
											</div>
											<div class="form-group has-error">
												<label for="PURCHASE_FORM">ซื้อจากบริษัท	</label>
												<input type="text" class="form-control" id="PURCHASE_FORM" name="PURCHASE_FORM"  value="{{ $data_set->PURCHASE_FORM }}">
											</div>

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
												<!-- ประวัติการแจ้งซ่อม -->
  											<div class="tab-pane" id="history">
    											<div class="row">
      											<div class="col-sm-12">
        											<div class="jumbotron">
          											<div class="col-md-8 col-lg-12">
																	<div class="table">
																	<table class="table table-sm"  >
																		<thead>
																			<tr>
																				<th class="bg-primary" colspan="6" >
																					<h3 align="center" style="color:white;" class="mt-2">ประวัติการแจ้งซ่อม</h3>
																				</th>
																			</tr>
																			<tr>
																				<th scope="col">
																					Line
																				</th>
																				<th scope="col">
																					Docno
																				</th>
																				<th scope="col">
																					Docdate
																				</th>
																				<th scope="col">
																					User Name
																				</th>
																				<th scope="col">
																					Time
																				</th>
																				<th scope="col">
																					Description
																				</th>
																			</tr>

																		</thead>
																		<tbody>
																			<tr>
																				<td>
																				</td>
																				<td>
																				</td>
																				<td>
																				</td>
																				<td>
																				</td>
																				<td>
																				</td>
																				<td>
																				</td>
																			</tr>
																		</tbody>
																	</table>
																</div>
																</div>
        											</div>
      											</div>
    											</div>
  											</div>
												<!-- แผนการปฎิบัติการ -->
  											<div class="tab-pane" id="plan" >
	    										<div class="row">
      											<div class="col-sm-12">
        											<div class="jumbotron">
																<div class="col-md-8 col-lg-12">
																	<div class="table">
																		<table class="table table-sm"  >
																			<thead>
																				<tr>
																					<th class="bg-primary" colspan="7" >
																					<h3 align="center" style="color:white;" class="mt-2">แผนการปฎิบัติการ</h3>
																					</th>
																				</tr>
																				<tr>
																					<th scope="col">
																						Line
																					</th>
																					<th scope="col">
																						Machine Code
																					</th>
																					<th scope="col">
																						Product Code
																					</th>
																					<th scope="col">
																						Product Name
																					</th>
																					<th scope="col">
																						Part Code
																					</th>
																					<th scope="col">
																						Part Name
																					</th>
																					<th scope="col">
																						Section Name
																					</th>
																				</tr>

																			</thead>
																			<tbody>
																				<tr>
																					<td>
																					</td>
																					<td>
																					</td>
																					<td>
																					</td>
																					<td>
																					</td>
																					<td>
																					</td>
																					<td>
																					</td>
																					<td>
																					</td>
																				</tr>
																			</tbody>
																		</table>
																	</div>
																</div>
        											</div>
      											</div>
    											</div>
  											</div>
												<!-- พนักงานประจำเครื่อง -->
												<div class="tab-pane" id="personal" >
													<div class="row">
														<div class="col-sm-12">
															<div class="jumbotron">
																<div class="col-md-8 col-lg-12">
																	<div class="table">
																		<table class="table table-sm"  >
																			<thead>
																				<tr>
																					<th class="bg-primary" colspan="8" >
																						<h3 align="center" style="color:white;" class="mt-2">พนักนักงานประจำเครื่อง</h3>
																					</th>
																				</tr>
																				<tr>
																					<th scope="col">
																						ลำดับ
																					</th>
																					<th scope="col">
																						รหัสพนักงาน
																					</th>
																					<th scope="col">
																					Product Code
																					</th>
																					<th scope="col">
																						ชื่อพนักงาน
																					</th>
																					<th scope="col">
																						นามสกุล
																					</th>
																					<th scope="col">
																						ประเทศ
																						</th>
																						<th scope="col">
																							กะพนักงาน
																						</th>
																						<th scope="col">
																							ประเภทพนักงาน
																						</th>
																					</tr>
																				</thead>
																				<tbody>
																			<tr>
																				<td>
																				</td>
																				<td>
																				</td>
																				<td>
																				</td>
																				<td>
																				</td>
																				<td>
																				</td>
																				<td>
																				</td>
																				<td>
																				</td>
																			</tr>
																			</tbody>
																		</table>
																	</div>
																</div>
															</div>
														</div>
													</div>
  											</div>
												<!-- ตรวจสอบระบบ -->
												@include('masterlayout.tab.systemcheck')
												<!-- อะไหล่ที่ต้องเปลี่ยน -->
												@include('masterlayout.tab.partchange')
												<!-- upload -->
												@include('masterlayout.tab.uploadmanue')
											
									</div>
								</div>
							</div>
					</div>
				</div>
				</div>
			</div>
		</form>
	</div>
</div>

@include('masterlayout.tab.modal.systemcheck.systemcheck')
@include('masterlayout.tab.modal.systemcheck.systemcheckedit')
@include('masterlayout.tab.modal.partchange.partchange')
@include('masterlayout.tab.modal.partchange.partchangeedit')
@include('masterlayout.tab.modal.uploadmanue')







@stop
{{-- ปิดส่วนเนื้อหาและส่วนท้า --}}

{{-- ส่วนjava --}}
@section('javascript')

@stop
{{-- ปิดส่วนjava --}}
