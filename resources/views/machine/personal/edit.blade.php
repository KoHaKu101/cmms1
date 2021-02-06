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

							<a href="{{ route('personal.list') }}">
								<button class="btn btn-primary  btn-sm ">
									<span class="fas fa-arrow-left ">Back </span>
								</button>
							</a>
						</div>
							<div class="col-md-11 mt-2 ">
								<form action="{{ url('machine/personal/update/'.$data_set->UNID) }}" method="POST" enctype="multipart/form-data">
								@csrf
									<button class="btn btn-primary btn-sm" type="submit">
										<span class="fas fa-file-medical ">	Save	</span>
									</button>
								</div>
							</div>
						</div>
					</div>
									<!--ส่วนปุ่มด้านบน-->
				<div class="py-12">
	        <div class="container mt-2">
							<div class="card">
								<div class="card-header">
									<div class="form-inline bg-primary"><p style="color:white;font-size:17px" class="ml-4 mt-3">ลงทะเบียน.</p>

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
														<option>ทำงาน</option>
														<option>รอผลิต</option>
														<option>หยุด/เสีย</option>
														<option>แผนผลิต</option>
													</select>
												</div>
												<div class="form-group col-6 has-error">
													<lebel>ตำแหน่งเครื่อง</lebel>
													<select class="form-control form-control" id="MACHINE_LOCATION" name="MACHINE_LOCATION" value="{{$data_set->MACHINE_LOCATION}}">
													<option>Line 1</option>
													<option>Line 2</option>
													<option>Line 3</option>
													<option>Line 4</option>
													<option>Line 5</option>
													<option>Line 6</option>
												</select>
						  				</div>
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
  										</ul>
  										<div class="tab-content clearfix">
  											<div class="tab-pane active" id="home">
    											<div class="row">
      											<div class="col-sm-12">
        											<div class="jumbotron">
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
																					<h5 align="center">ประวัติการแจ้งซ่อม</h5>
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
																						<h5 align="center">แผนการปฎิบัติการ</h5>
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




@stop
{{-- ปิดส่วนเนื้อหาและส่วนท้า --}}

{{-- ส่วนjava --}}
@section('javascript')

@stop
{{-- ปิดส่วนjava --}}
