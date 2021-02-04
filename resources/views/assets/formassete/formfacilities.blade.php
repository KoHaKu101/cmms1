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

	@include('masterlayout.sidebar.sidebarmaster')

@stop
{{-- ปิดส่วนเมนู --}}

	{{-- ส่วนเนื้อหาและส่วนท้า --}}
@section('contentandfooter')

		<div class="content">
			<div class="page-inner">
				<!--ส่วนปุ่มด้านบน-->

				<div class="container">

					<div class="row">
						<div class="col-md-1 mt-2">

							<a href="{{ route('factoryhome') }}">
								<button class="btn btn-primary  btn-sm ">
									<span class="fas fa-arrow-left ">Back </span>
								</button>
							</a>
						</div>
							<div class="col-md-11 mt-2 ">
								<form action="{{ route('form.store') }}" method="POST" enctype="multipart/form-data">
								@csrf
									<button class="btn btn-primary btn-sm" type="submit">
										<span class="fas fa-file-medical ">	Save	</span>
									</button>
								</div>
										</div>
									</div>
									<!--ส่วนปุ่มด้านบน-->
									<div class="py-12">
	        					<div class="container mt-2">
											<div class="card ">
												<div class="card-body">
								<div class="row">
									<!-- ช่อง1-->
									<div class="col-md-6 col-lg-4">
										<div class="form-group">
											<img src="/assets/img/jm_denis.jpg" width="200" height="200px" >
												<input type="file" class="form-control mt-2" id="MACHINE_ICON" name="MACHINE_ICON">
												@error ('MACHINE_ICON')
													<span class="text-danger"> {{ $message }}</span>
												@enderror
										</div>
									</div>
									<!-- ช่อง1-->

									<!-- ช่อง2-->
									<div class="col-md-6 col-lg-4">

										<div class="form-group has-success">
											<label for="MACHINE_CODE">รหัสเครื่องจักร</label>
												<input type="text" class="form-control" id="MACHINE_CODE" name="MACHINE_CODE" placeholder="รหัสเครื่องจักร">
												@error ('MACHINE_CODE')
													<span class="text-danger"> {{ $message }}</span>
												@enderror
										</div>
										<div class="form-group">
											<label for="MACHINE_MANU">การผลิต	</label>
											<input type="text" class="form-control" id="MACHINE_MANU" name="MACHINE_MANU" placeholder="วันที่เริ่มใช้งาน">
										</div>
										<div class="form-group">
											<label for="MACHINE_RVE_DATE">วันที่เริ่มใช้งาน	</label>
											<input type="date" class="form-control" id="MACHINE_RVE_DATE" name="MACHINE_RVE_DATE" placeholder="วันที่เริ่มใช้งาน">
										</div>
											<!-- ส่วนของสถานะ และตำแหน่ง-->
										<div class="row ml-1">
											<div class="form-group col-md-6 col-lg-6">
												<lebel>สถานะการใช้งาน</lebel>
												<select class="form-control form-control" id="MACHINE_CHECK" name="MACHINE_CHECK">
													<option>ทำงาน</option>
													<option>รอผลิต</option>
													<option>หยุด/เสีย</option>
													<option>แผนผลิต</option>
												</select>
											</div>
											<div class="form-group col-6">
												<lebel>ตำแหน่งเครื่อง</lebel>
												<select class="form-control form-control" id="MACHINE_LOCATION" name="MACHINE_LOCATION">
													<option>Line 1</option>
													<option>Line 2</option>
													<option>Line 3</option>
													<option>Line 4</option>
													<option>Line 5</option>
													<option>Line 6</option>
												</select>
						  				</div>
										</div>
											<!-- ส่วนของสถานะ และตำแหน่ง-->
									</div>
									<!-- ช่อง2-->

									<!-- ช่อง3-->
									<div class="col-md-6 col-lg-4">
										<div class="form-group">
											<label for="MACHINE_NAME">ชื่อเครื่องจักร</label>
											<input type="text" class="form-control" id="MACHINE_NAME" name="MACHINE_NAME" placeholder="ชื่อเครื่องจักร">
										</div>
										<div class="form-group">
											<label for="MACHINE_RVE_DATE">วันที่แก้ไขปรับปรุง	</label>
											<input type="date" class="form-control" id="MACHINE_RVE_DATE" name="MACHINE_RVE_DATE" placeholder="วันที่เริ่มใช้งาน">
										</div>
										<div class="form-group">
											<label for="PURCHASE_FORM">ซื้อจากบริษัท	</label>
											<input type="text" class="form-control" id="PURCHASE_FORM" name="PURCHASE_FORM" placeholder="ซื้อจากบริษัท">
										</div>
										<div class="form-group">
											<label for="MACHINE_TYPE">ชนิดเครื่องจักร</label>
											<input type="text" class="form-control" id="MACHINE_TYPE" name="MACHINE_TYPE" placeholder="กำลังการผลิต">
										</div>
									</div>
									<!-- ช่อง3-->
								</div>
							</div>
												<div class="row">
								<div class="col-md-12 mt--4">
									<div class="card-body">
										<style>
											.nav-pills {
    										border-bottom: 1px solid #ddd;
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
    											<a id="profile-tab" data-toggle="tab" href="#profile" >Profile</a>
  											</li>
  											<li>
    											<a id="messages-tab" data-toggle="tab" href="#messages" >Messages</a>
							  				</li>
							  				<li>
    											<a id="settings-tab" data-toggle="tab" href="#settings">Settings</a>
  											</li>
  											</ul>
  									<div class="tab-content clearfix">
  										<div class="tab-pane active" id="home">
    										<div class="row">
      										<div class="col-sm-12">
        										<div class="jumbotron ">
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
  										<div class="tab-pane" id="profile">
    										<div class="row">
      										<div class="col-sm-12">
        										<div class="jumbotron bg-success">
          										<div class="col-md-8 col-lg-4">
															</div>
        										</div>
      										</div>
    										</div>
  										</div>
  										<div class="tab-pane" id="messages" >
    										<div class="row">
      										<div class="col-sm-12">
        										<div class="jumbotron bg-info">
          										<h1>Message</h1>
          										<p>This is home message.</p>
        										</div>
      										</div>
    										</div>
  										</div>
  										<div class="tab-pane" id="settings" >
    										<div class="row">
      										<div class="col-sm-12">
        										<div class="jumbotron bg-warning">
          										<h1>Settings</h1>
          										<p>This is settings.</p>
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




@stop
{{-- ปิดส่วนเนื้อหาและส่วนท้า --}}

{{-- ส่วนjava --}}
@section('javascript')

@stop
{{-- ปิดส่วนjava --}}
