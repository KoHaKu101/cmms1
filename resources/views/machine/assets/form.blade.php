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
								<form action="{{ route('machine.store') }}" method="POST" enctype="multipart/form-data">
									@csrf
									<button class="btn btn-success btn-sm" type="submit">
										<span class="fas fa-file-medical ">	Save	</span>
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
								<div class="form-inline bg-primary"><p style="color:white;font-size:17px" class="ml-4 mt-3">ลงทะเบียน</p>
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
												<img src="/assets/img/nobody.jpg" width="200" height="200px" class="mt-4">
													<input type="file" class="form-control mt-4" id="MACHINE_ICON" name="MACHINE_ICON" >
													@error ('MACHINE_ICON')
														<span class="text-danger"> {{ $message }}</span>
													@enderror
											</div>
										</div>
										<!-- ช่อง2-->
										<div class="col-md-6 col-lg-4">
											<div class="form-group has-error">
												<label for="MACHINE_CODE">รหัสเครื่องจักร</label>
													<input type="text" class="form-control" id="MACHINE_CODE" name="MACHINE_CODE" placeholder="รหัสเครื่องจักร" required autofocus>
													@error ('MACHINE_CODE')
														<span class="text-danger"> {{ $message }}</span>
													@enderror
											</div>
											<div class="form-group">
												<label for="MACHINE_MANU">การผลิต	</label>
												<input type="text" class="form-control" id="MACHINE_MANU" name="MACHINE_MANU" placeholder="การผลิต" required autofocus>
											</div>
											<div class="form-group has-error">
												<label for="MACHINE_RVE_DATE">วันที่เริ่มใช้งาน	</label>
												<input type="date" class="form-control" id="MACHINE_RVE_DATE" name="MACHINE_RVE_DATE" placeholder="วันที่เริ่มใช้งาน" required autofocus>
											</div>
											<div class="row ml-1 mt-2">
												<div class="form-group col-md-6 col-lg-6 has-error">
													<lebel>สถานะการใช้งาน</lebel>
													<select class="form-control form-control" id="MACHINE_CHECK" name="MACHINE_CHECK" >
														<option value="1">หยุด/เสีย</option>
														<option value="2">ทำงาน</option>
														<option value="3">รอผลิต</option>

														<option value="4">แผนผลิต</option>
													</select>
												</div>
												<div class="form-group col-6 has-error">
													<lebel>ตำแหน่งเครื่อง</lebel>
													<select class="form-control form-control" id="MACHINE_LINE" name="MACHINE_LINE">
													<option>L1</option>
													<option>L2</option>
													<option>L3</option>
													<option>L4</option>
													<option>L5</option>
													<option>L6</option>
												</select>
						  				</div>
											</div>
										</div>
										<!-- ช่อง3-->
										<div class="col-md-6 col-lg-4">
											<div class="form-group has-error">
												<label for="MACHINE_NAME">ชื่อเครื่องจักร</label>
												<input type="text" class="form-control" id="MACHINE_NAME" name="MACHINE_NAME" placeholder="ชื่อเครื่องจักร" required autofocus>
											</div>
											<div class="form-group">
												<label for="MACHINE_RVE_DATE">วันที่แก้ไขปรับปรุง	</label>
												<input type="date" class="form-control" id="MACHINE_RVE_DATE" name="MACHINE_RVE_DATE" placeholder="วันที่เริ่มใช้งาน" required autofocus>
											</div>
											<div class="form-group">
												<label for="PURCHASE_FORM">ซื้อจากบริษัท	</label>
												<input type="text" class="form-control" id="PURCHASE_FORM" name="PURCHASE_FORM" placeholder="ซื้อจากบริษัท" required autofocus>
											</div>
											<div class="form-group has-error">
												<label for="MACHINE_TYPE">ชนิดเครื่องจักร</label>
												<input type="text" class="form-control" id="MACHINE_TYPE" name="MACHINE_TYPE" placeholder="ชนิดเครื่องจักร" required autofocus>
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
																				<input type="text" class="form-control" id="MACHINE_PARTNO" name="MACHINE_PARTNO" placeholder="PartNo">
																		</div>
																		<div class="form-group">
																			<label for="MACHINE_PRICE">ราคา	</label>
																			<input type="text" class="form-control" id="MACHINE_PRICE" name="MACHINE_PRICE" placeholder="ราคา">
																		</div>
																		<div class="form-group">
																			<label for="MACHINE_POWER">Power</label>
																			<input type="text" class="form-control" id="MACHINE_POWER" name="MACHINE_POWER" placeholder="Power">
																		</div>
																	</div>
																	<div class="col-md-8 col-lg-3">
																		<div class="form-group">
																			<label for="MACHINE_MODEL">Model</label>
																			<input type="text" class="form-control" id="MACHINE_MODEL" name="MACHINE_MODEL" placeholder="Model">
																		</div>
																		<div class="form-group">
																			<label for="MACHINE_MA_COST">ค่าใช้จ่ายซ่อมบำรุง	</label>
																			<input type="text" class="form-control" id="MACHINE_MA_COST" name="MACHINE_MA_COST" placeholder="ค่าใช้จ่ายซ่อมบำรุง">
																		</div>
																		<div class="form-group">
																			<label for="MACHINE_WEIGHT">Weight	</label>
																			<input type="text" class="form-control" id="MACHINE_WEIGHT" name="MACHINE_WEIGHT" placeholder="Weight">
																		</div>
																	</div>
																	<div class="col-md-8 col-lg-3">
																		<div class="form-group">
																			<label for="MACHINE_SERIAL">Serial</label>
																			<input type="text" class="form-control" id="MACHINE_SERIAL" name="MACHINE_SERIAL" placeholder="Serial">
																		</div>
																		<div class="form-group">
																			<label for="MACHINE_SPEED_UNIT">ความเร็ว</label>
																			<input type="text" class="form-control" id="MACHINE_SPEED_UNIT" name="MACHINE_SPEED_UNIT" placeholder="ความเร็ว">
																		</div>
																		<div class="form-group">
																			<label for="MACHINE_TARGET">Target</label>
																			<input type="text" class="form-control" id="MACHINE_TARGET" name="MACHINE_TARGET" placeholder="Target">
																		</div>
																	</div>
																	<div class="col-md-8 col-lg-3">
																		<div class="form-group">
																			<label for="MACHINE_FACTORY">โรงงานผลิต</label>
																			<input type="text" class="form-control" id="MACHINE_FACTORY" name="MACHINE_FACTORY" placeholder="โรงงานผลิต">
																		</div>
																		<div class="form-group">
																			<label for="MACHINE_SPEED">ความเร็ว</label>
																			<input type="text" class="form-control" id="MACHINE_SPEED" name="MACHINE_SPEED" placeholder="ความเร็ว">
																		</div>
																		<div class="form-group">
																			<label for="MACHINE_MTBF">Priority</label>
																			<input type="text" class="form-control" id="MACHINE_MTBF" name="MACHINE_MTBF" placeholder="Priority">
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
																						data-toggle="modal" data-target="#exampleModal" >เพิ่มระบบที่ต้องตรวจเช็ค</button>
																					</th>
																				</tr>
																				<tr>
																					<th scope="col" colspan="2">
																					</th>
																					<th scope="col" colspan="2">
																						ระบบที่ต้องเช็ค
																					</th>
																					<th scope="col" colspan="1">
																						รายการที่ต้องตรวจเช็ค
																					</th>
																					<th scope="col" colspan="1">
																					</th>
																					</tr>
																				</thead>
																				<tbody>
																			<tr>
																				<td colspan="2">
																					1
																				</td>

																				<td colspan="2">
																					ระบบไฟฟ้า
																				</td>
																				<td>
																					3 รายการ
																				</td>
																				<td >
																					<button  id="popup" type="button" class="btn btn-primary float-right"
																					data-toggle="modal" data-target="#exampleModal1" >รายละเอียดที่ต้องตรวจเช็ค</button>
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
																					<th class="bg-primary" colspan="6" >
																						<h3 align="center" style="color:white;" class="mt-2">อะไหล่ที่ต้องเปลี่ยน</h3>
																					</th>
																					<th class="bg-primary" >
																						<button  id="popup" type="button" class="btn btn-info float-right"
																						data-toggle="modal" data-target="#exampleModal2" >เพิ่มอะไหล่ที่ต้องเปลี่ยน</button>
																					</th>
																				</tr>
																				<tr>
																					<th >

																					</th>
																					<th >
																						อะไหล่
																					</th>
																					<th  colspan="2">
																						รายการอะไหล่
																					</th>
																					<th  colspan="2">
																						เวลา วัน เดือน ปี ที่เปลี่ยน ล่าสุด
																					</th>
																					<th >

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
																					 3 รายการ
																				</td>
																				<td colspan="2">
																				10:20	 08/02/2020
																				</td>
																				<td>
																					<button  id="popup" type="button" class="btn btn-primary float-right"
																					data-toggle="modal" data-target="#exampleModal3" >รายละเอียดอะไหล่ที่ต้องเปลี่ยน</button>
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
				</div>
				</div>
			</div>
		</form>
	</div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLalavel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
				<div class="row">
					<div class="col-mb-6 col-lg-6">
						<select class="form-control form-control">
							<option>ระบบไฟฟ้า</option>
						</select>
					</div>
					<div class="col-mb-6 col-lg-6">
						<input type="text" class="form-control">
					</div>
      	</div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
</div>
<!-- Modalรายละเอียดที่ต้องตรวจเช็ค -->
<div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLalavel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content ">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
				<div class="table">
					<table>
						<thead>
							<tr>
								<th>

								</th>
								<th>
									<h4>รายการที่ต้องตรวจเช็ค</h4>
								</th>
								<th>
									<h4>ค่า STD </h4>
								</th>
								<th>
									<h4>ค่า ตรวจเช็คปัจจุบัน</h4>
								</th>
							</tr>
						</thead>

						<tbody>
							<tr>
								<td>
									<input class="form-check-input float-right" type="checkbox" value="" id="flexCheckDefault">
								</td>
								<td>
									<h4>สายไฟฟ้า</h4>
								</td>

								<td>
										<small><input class="form-control float-right" type="text" value="" id="flexCheckDefault"></small>
								</td>

								<td>
										<small><input class="form-control float-right" type="text" value="" id="flexCheckDefault"></small>
							</td>
							</tr>

							<tr>
								<td>
									<input class="form-check-input float-right" type="checkbox" value="" id="flexCheckDefault">
								</td>
								<td>
									<h4>แรงดันไฟ</h4>
								</td>
								<td>
										<small><input class="form-control float-right" type="text" value="" id="flexCheckDefault"></small>
								</td>

								<td>
										<small><input class="form-control float-right" type="text" value="" id="flexCheckDefault"></small>
							</td>
							</tr>
						</tbody>
					</table>
      	</div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
</div>

<!-- Modal เพิ่มอะไหล่ที่ต้องเปลี่ยน -->
<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLalavel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">เพิ่มระบบที่ต้องตรวจเช็ค</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
				<div class="row">
					<div class="col-mb-6 col-lg-6">
						<select class="form-control form-control">
							<option>มอเตอร์</option>
						</select>
					</div>
					<div class="col-mb-6 col-lg-6">
						<input type="text" class="form-control">
					</div>
    		</div>
      	<div class="modal-footer">
        	<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        	<button type="submit" class="btn btn-primary">Save changes</button>
      	</div>
    	</div>
  	</div>
	</div>
</div>


<!-- Modal รายละเอียดอะไหล่ที่ต้องเปลี่ยน -->
<style>
.modal-sm {
    max-width: 80% !important;
}
</style>

<div class="modal fade" id="exampleModal3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLalavel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content ">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">รายละเอียดอะไหล่ที่ต้องเปลี่ยน</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
				<div class="table">
					<table>
						<thead>
							<tr>
								<th>

								</th>
								<th>
									<h5>รายการอะไหล่ที่ต้องเปลี่ยน</h5>
								</th>
								<th>
									<h5>พนักงานที่ทำการเปลี่ยน </h5>
								</th>
								<th>
									<h5>เปลี่ยนทุกกี่เดือน/ปี</h5>
								</th>
								<th>
									<h5>เปลี่ยนวัน/เดือน/ปี</h5>
								</th>
								<th>
									<h5>เปลี่ยนวัน/เดือน/ปี ล่าสุด</h5>
								</th>
							</tr>
						</thead>

						<tbody>
							<tr>
								<td>
									<input class="form-check-input float-right" type="checkbox" value="" id="flexCheckDefault">
								</td>
								<td>
									<h5>มอเตอร์สว่าน</h4>
								</td>

								<td>
										<small><input class="form-control float-right" type="text" value="" id="flexCheckDefault"></small>
								</td>

								<td>
										<small><input class="form-control float-right" type="text" value="" id="flexCheckDefault"></small>
							</td>
							<td>
									<small><input class="form-control float-right" type="date" value="" id="flexCheckDefault"></small>
							</td>

							<td>
									<small><input class="form-control float-right" type="date" value="" id="flexCheckDefault"></small>
						</td>
							</tr>


						</tbody>
					</table>
      	</div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
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
