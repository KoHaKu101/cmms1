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

							<a href="{{ route('machine.list') }}">
								<button class="btn btn-primary  btn-sm ">
									<span class="fas fa-arrow-left ">Back </span>
								</button>
							</a>
						</div>
							<div class="col-md-11 mt-2 ">
								<form action="{{ url('machine/assets/update/'.$data_set->UNID) }}" method="POST" enctype="multipart/form-data">
								@csrf
									<button class="btn btn-success btn-sm" type="submit">
										<span class="fas fa-file-medical ">	Update	</span>
									</button>
								</div>
							</div>
						</div>
					</div>
									<!--ส่วนปุ่มด้านบน-->
				<div class="py-12">
	        <div class="container mt-2">
							<div class="card">
								<div class="">
									<div class="form-inline bg-primary"><p style="color:white;font-size:17px" class="ml-4 mt-3">รายละเอียดเครื่องจักร</p>

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
												<img src="/assets/img/jm_denis.jpg" width="200" height="200px" class="mt-4">
													<input type="file" class="form-control mt-4" id="MACHINE_ICON" name="MACHINE_ICON">
													@error ('MACHINE_ICON')
														<span class="text-danger"> {{ $message }}</span>
													@enderror
											</div>
										</div>
										<!-- ช่อง2-->
										<div class="col-md-6 col-lg-4">
											<div class="form-group has-error">
												<label for="MACHINE_CODE">รหัสเครื่องจักร</label>
													<input type="text" class="form-control" id="MACHINE_CODE" name="MACHINE_CODE" value="{{$data_set->MACHINE_CODE}}">
													@error ('MACHINE_CODE')
														<span class="text-danger"> {{ $message }}</span>
													@enderror
											</div>
											<div class="form-group">
												<label for="MACHINE_MANU">การผลิต	</label>
												<input type="text" class="form-control" id="MACHINE_MANU" name="MACHINE_MANU" value="{{$data_set->MACHINE_MANU}}">
											</div>
											<div class="form-group has-error">
												<label for="MACHINE_RVE_DATE">วันที่เริ่มใช้งาน	</label>
												<input type="date" class="form-control" id="MACHINE_RVE_DATE" name="MACHINE_RVE_DATE" value="{{$data_set->MACHINE_RVE_DATE}}">
											</div>
											<div class="row ml-1 mt-2">
												<div class="form-group col-md-6 col-lg-6 has-error">
													<lebel>สถานะการใช้งาน</lebel>
													<select class="form-control form-control" id="MACHINE_CHECK" name="MACHINE_CHECK" value="{{$data_set->MACHINE_CHECK}}">
														<option value="1">หยุด/เสีย</option>
														<option value="2">ทำงาน</option>
														<option value="3">รอผลิต</option>
														<option value="4">แผนผลิต</option>
													</select>
												</div>
												<?php
												$options= array('Line 1','Line 2','Line 3','Line 4','Line 5','Line 6')

												<div class="form-group col-6 has-error">
													<lebel>ตำแหน่งเครื่อง</lebel>
													<select class="form-control form-control" id="MACHINE_LINE" name="MACHINE_LINE" >
													<option value="L1">Line 1</option>
													<option value="L2">Line 2</option>
													<option value="L3">Line 3</option>
													<option value="L4">Line 4</option>
													<option value="L5">Line 5</option>
													<option value="L6">Line 6</option>
												</select>
						  				</div>
											?>
											</div>
										</div>
										<!-- ช่อง3-->
										<div class="col-md-6 col-lg-4">
											<div class="form-group has-error">
												<label for="MACHINE_NAME">ชื่อเครื่องจักร</label>
												<input type="text" class="form-control" id="MACHINE_NAME" name="MACHINE_NAME" value="{{$data_set->MACHINE_NAME}}">
											</div>
											<div class="form-group">
												<label for="MACHINE_RVE_DATE">วันที่แก้ไขปรับปรุง	</label>
												<input type="date" class="form-control" id="MACHINE_RVE_DATE" name="MACHINE_RVE_DATE" value="{{$data_set->MACHINE_RVE_DATE}}">
											</div>
											<div class="form-group">
												<label for="PURCHASE_FORM">ซื้อจากบริษัท	</label>
												<input type="text" class="form-control" id="PURCHASE_FORM" name="PURCHASE_FORM" value="{{$data_set->PURCHASE_FORM}}">
											</div>
											<div class="form-group has-error">
												<label for="MACHINE_TYPE">ชนิดเครื่องจักร</label>
												<input type="text" class="form-control" id="MACHINE_TYPE" name="MACHINE_TYPE" value="{{$data_set->MACHINE_TYPE}}">
											</div>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12 mt-2">
										<div class="card-body">
											<style>
												.nav-pills {
    											border-bottom: 0px solid #ddd;
												}
												.nav-pills li a {
    											background: #1f4e79;
    											color: #fff;
    											display: block;
    											line-height: 2em;
    											padding: 7px 15px;
    											border-radius: 0;
    											font-size: 13px;
    											border: none;
    											margin: 30px 2px 0;
												}
												ul li a {
    											text-decoration: none;
												}
												.nav-pills li a.active {
    											background: #3482ca;
    											border: none;
    											color: #FFF;
												}
											</style>
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
    											<a id="settings-tab" data-toggle="tab" href="#systemcheck">ระบบที่ต้องเช็ค</a>
  											</li>
												<li>
    											<a id="settings-tab" data-toggle="tab" href="#partchange">อะไหล่ที่ต้องเปลี่ยน</a>
  											</li>
  										</ul>

  										<div class="tab-content clearfix">
												<!-- ข้อมูลทั่วไป -->
  											<div class="tab-pane active" id="home">
    											<div class="row">
      											<div class="col-sm-12">
        											<div class="jumbotron">
																<div class="col-md-8 col-lg-12">
																	<div class="table">
																	<table class="table table-sm"  >
																		<thead>
																			<tr>
																				<th class="bg-primary" colspan="6" >
																					<h3 align="center" style="color:white;" class="mt-2">ข้อมูลทั่วไป</h3>
																				</th>
																			</tr>
																		</thead>
																	</table>
																</div>
															</div>
																<div class="row">
																	<div class="col-md-8 col-lg-3">
																		<div class="form-group">
																			<label for="MACHINE_PARTNO">PartNo</label>
																				<input type="text" class="form-control" id="MACHINE_PARTNO" name="MACHINE_PARTNO" value="{{$data_set->MACHINE_PARTNO}}">
																		</div>
																		<div class="form-group">
																			<label for="MACHINE_PRICE">ราคา	</label>
																			<input type="text" class="form-control" id="MACHINE_PRICE" name="MACHINE_PRICE" value="{{$data_set->MACHINE_PRICE}}">
																		</div>
																		<div class="form-group">
																			<label for="MACHINE_POWER">Power</label>
																			<input type="text" class="form-control" id="MACHINE_POWER" name="MACHINE_POWER" value="{{$data_set->MACHINE_POWER}}">
																		</div>
																	</div>
																	<div class="col-md-8 col-lg-3">
																		<div class="form-group">
																			<label for="MACHINE_MODEL">Model</label>
																			<input type="text" class="form-control" id="MACHINE_MODEL" name="MACHINE_MODEL" value="{{$data_set->MACHINE_MODEL}}">
																		</div>
																		<div class="form-group">
																			<label for="MACHINE_MA_COST">ค่าใช้จ่ายซ่อมบำรุง	</label>
																			<input type="text" class="form-control" id="MACHINE_MA_COST" name="MACHINE_MA_COST" value="{{$data_set->MACHINE_MA_COST}}">
																		</div>
																		<div class="form-group">
																			<label for="MACHINE_WEIGHT">Weight	</label>
																			<input type="text" class="form-control" id="MACHINE_WEIGHT" name="MACHINE_WEIGHT" value="{{$data_set->MACHINE_WEIGHT}}">
																		</div>
																	</div>
																	<div class="col-md-8 col-lg-3">
																		<div class="form-group">
																			<label for="MACHINE_SERIAL">Serial</label>
																			<input type="text" class="form-control" id="MACHINE_SERIAL" name="MACHINE_SERIAL" value="{{$data_set->MACHINE_SERIAL}}">
																		</div>
																		<div class="form-group">
																			<label for="MACHINE_SPEED_UNIT">ความเร็ว</label>
																			<input type="text" class="form-control" id="MACHINE_SPEED_UNIT" name="MACHINE_SPEED_UNIT" value="{{$data_set->MACHINE_SPEED_UNIT}}">
																		</div>
																		<div class="form-group">
																			<label for="MACHINE_TARGET">Target</label>
																			<input type="text" class="form-control" id="MACHINE_TARGET" name="MACHINE_TARGET" value="{{$data_set->MACHINE_TARGET}}">
																		</div>
																	</div>
																	<div class="col-md-8 col-lg-3">
																		<div class="form-group">
																			<label for="MACHINE_FACTORY">โรงงานผลิต</label>
																			<input type="text" class="form-control" id="MACHINE_FACTORY" name="MACHINE_FACTORY" value="{{$data_set->MACHINE_FACTORY}}">
																		</div>
																		<div class="form-group">
																			<label for="MACHINE_SPEED">ความเร็ว</label>
																			<input type="text" class="form-control" id="MACHINE_SPEED" name="MACHINE_SPEED" value="{{$data_set->MACHINE_SPEED}}">
																		</div>
																		<div class="form-group">
																			<label for="MACHINE_MTBF">Priority</label>
																			<input type="text" class="form-control" id="MACHINE_MTBF" name="MACHINE_MTBF" value="{{$data_set->MACHINE_MTBF}}">
																		</div>
																	</div>
																</div>
        											</div>
      											</div>
    											</div>
  											</div>
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
																				<th class="bg-primary" height="10"colspan="6" >
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
  											</div>ห
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
																					<th class="bg-primary" height="10"colspan="7" >
																						<h3 align="center" style="color:white;" class="mt-2">แผนการปฎิบัติการ</h3>ห
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
																					<th class="bg-primary" height="10"colspan="7" >
																						<h5 align="center">พนักนักงานประจำเครื่อง</h5>
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
																					<th scope="col" colspan="2">
																						ชื่อพนักงาน
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
																					<td colspan="2">
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
												<!-- ระบบที่ต้องเช็ค -->
												<div class="tab-pane" id="systemcheck" >
													<div class="row">
														<div class="col-sm-12">
															<div class="jumbotron">
																<div class="col-md-8 col-lg-12">
																	<div class="table">
																		<table class="table table-sm"  >
																			<thead>
																				<tr>
																					<th class="bg-primary" colspan="5" >
																						<h3 align="center" style="color:white;" class="mt-2">ระบบที่ต้องเช็ค</h3>

																					</th>
																					<th class="bg-primary" >
																						<button  id="popup" type="button" class="btn btn-info float-right"
																						data-toggle="modal" data-target="#exampleModal" onclick="productview(this.)">เพิ่มระบบ</button>
																					</th>
																				</tr>
																				<tr>
																					<th scope="col">
																					</th>
																					<th scope="col" colspan="2">
																						รายการตรวจเช็ค
																					</th>
																					<th scope="col">
																						สถานนะเช็ค
																					</th>
																					<th scope="col">
																						สถานะแปลกปลอม
																					</th>
																					<th scope="col">
																						Action
																					</th>
																					</tr>
																				</thead>
																				<tbody>
																			<tr>
																				<td>
																					1
																				</td>

																				<td colspan="2">
																					ระบบไฟฟ้า
																				</td>
																				<td>
																					<button type="button" class="btn btn-icon btn-round btn-success btn-sm">
																								<i class="fa fa-check"></i>
																							</button>
																				</td>

																				<td>
																				</td>

																				<td>
																					<button type="button" class="btn btn-primary">กรอกข้อมูล</button>
																				</td>

																			</tr>
																			<tr>
																				<td>
																					1
																				</td>

																				<td colspan="2">
																					ระบบไฟฟ้า
																				</td>
																				<td >
																					<button type="button" class="btn btn-icon btn-round btn-warning btn-sm">
																						<i class="fa fa-exclamation-circle"></i>
																					</button>
																				</td>

																				<td>
																					2 warning
																				</td>

																				<td>
																					<button type="button" class="btn btn-primary" data-toggle="modal"
																					data-target="#myModal">กรอกข้อมูล</button>

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
												<!-- อะไหล่ที่ต้องเปลี่ยน -->
												<div class="tab-pane" id="partchange" >
													<div class="row " >
														<div class="col-sm-12 ">
															<div class="jumbotron">
																<div class="col-md-8 col-lg-12">
																	<div class="table">
																		<table class="table table-sm"  >
																			<thead>
																				<tr>
																					<th class="bg-primary" colspan="9" >
																						<h3 align="center" style="color:white;" class="mt-2">อะไหล่ที่ต้องเปลี่ยน</h3>
																					</th>
																					<th class="bg-primary" >
																						<button type="button" class="btn btn-info float-right">เพิ่มระบบ</button>
																					</th>
																				</tr>
																				<tr>
																					<th scope="col">
																					</th>
																					<th scope="col">
																						รายการ
																					</th>
																					<th scope="col" colspan="2">
																						เปลี่ยนประจำ เดือน/ปี
																					</th>
																					<th scope="col" colspan="2">
																						ชื่อพนักงานที่ทำการเปลี่ยน
																					</th>
																					<th scope="col" colspan="2">
																						เวลา วัน เดือน ปี ที่เปลี่ยน
																					</th>
																					<th scope="col" colspan="2">
																						เวลา วัน เดือน ปี ที่เปลี่ยน ล่าสุด
																					</th>
																					</tr>
																				</thead>
																				<tbody>
																			<tr>
																				<td>
																					1
																				</td>
																				<td>
																					มอเตอร์
																				</td>
																				<td colspan="2">
																					08/02/2021
																				</td>
																				<td colspan="2">
																					<select class="form-control form-control">
																					<option>นาย ก</option>
																					<option>นาย ข</option>
																					<option>นาย ค</option>
																				</select>
																				</td>
																				<td colspan="2">
																					08/02/2021 10:20
																				</td>
																				<td>
																					08/02/2020 10:20
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

									</div>
								</div>
								<div class="card-footer">
									<div class="row">
										<div class="col-md-8 col-lg-12">
											<div class="table">
												<table >
													<tbody>
														<tr>
															{{-- ผู้สร้าง --}}
															<td>จัดทำโดย
															</td>
															<td>{{ $data_set->CREATE_BY }}
															</td>
															<td>เวลาที่สร้าง
															</td>
															<td>{{ $data_set->CREATE_TIME }}
															</td>
															{{-- ผู้แก้ไข --}}
															<td>แก้ไขโดย
															</td>
															<td>{{ $data_set->MODIFY_BY }}
															</td>
															<td>เวลาที่แก้ไข
															</td>
															<td>{{ $data_set->MODIFY_TIME }}
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

					</div>
				</div>
				</div>
			</div>
		</form>
	</div>
</div>


<!-- Modalกรอกข้อมูล -->
<div class="modal fade" id="myModal">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
      	<h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
          	<span aria-hidden="true">&times;</span>
        	</button>
      </div>
      <div class="modal-body">
				<div class="table">
					<table class="table table-sm"  >
						<thead>
							<tr>
								<th scope="col">
								</th>
								<th scope="col">
									รายการ
								</th>
								<th scope="col" colspan="2">
									STD
								</th>
								<th scope="col" colspan="2">
									กรอกข้อมูล
								</th>
								</tr>
						</thead>
							<tbody>
								<tr>
									<td>
										1
									</td>
									<td>
										แรงดันไฟ
									</td>
									<td >
										40V
									</td>
									<td colspan="2">
										<div class="form-group has-error has-feedback">
									<input type="text" id="errorInput" placeholder="กรอกข้อมูล" class="form-control">
								</div>
								</td>
							</tr>
							</tbody>
					</table>
				</div>
      	<div class="modal-footer">
        	<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        	<button type="button" class="btn btn-primary">Save changes</button>
      	</div>
    	</div>
  </div>
</div>
</div>

@stop
{{-- ปิดส่วนเนื้อหาและส่วนท้า --}}

{{-- ส่วนjava --}}
@section('javascript')

@stop
{{-- ปิดส่วนjava --}}
