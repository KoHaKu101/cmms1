@extends('masterlayout.masterlayout')
@section('tittle','homepage')
@section('css')
<link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
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
						<div class="col-md-12 gx-4">
							<a href="{{ route('factoryhome') }}">
								<button class="btn btn-light btn-border btn-sm ">
									<span class="fas fa-arrow-left ">Back </span>
								</button>
							</a>
							<a href="{{ route('Formfactory') }}">
								<button class="btn btn-light btn-border btn-sm">
									<span class="fas fa-file-medical ">	New	</span>
								</button>
							</a>
							<a href="{{ route('Formfactory') }}">
								<button class="btn btn-light btn-border btn-sm">
									<span class="fas fa-file-import ">	Import	</span>
								</button>
							</a>
							<a href="{{ route('Formfactory') }}">
								<button class="btn btn-light btn-border btn-sm">
									<span class="fas fa-file-export ">	Export	</span>
								</button>
							</a>
							<a href="{{ route('Formfactory') }}">
								<button class="btn btn-light btn-border btn-sm">
									<span class="fas fa-print ">	Print	</span>
								</button>
							</a>
							<a href="{{ route('Formfactory') }}">
								<button class="btn btn-light btn-border btn-sm">
									<span class="fas fa-qrcode ">	Print Asset Tags	</span>
								</button>
							</a>
							<a href="{{ route('Formfactory') }}">
								<button class="btn btn-light btn-border btn-sm">
									<span class="fas fa-trash ">	Delete</span>
								</button>
							</a>
						</div>
					</div>
				</div>
				<!--ส่วนปุ่มด้านบน-->
				<div class="py-12">
	        <div class="container mt-2">
						<div class="card">
							<div class="card-body">
								<div class="row">
									<!-- ช่อง1-->
									<div class="col-md-6 col-lg-4">
										<div class="form-group">
											<img src="/assets/img/jm_denis.jpg" width="200" height="200px" >
												<input type="file" class="mt-2">
										</div>
									</div>
									<!-- ช่อง1-->

									<!-- ช่อง2-->
									<div class="col-md-6 col-lg-4">
										<div class="form-group">
											<label for="email2">รหัสเครื่องจักร</label>
												<input type="email" class="form-control" id="MACHINE_CODE" name="MACHINE_CODE" placeholder="รหัสเครื่องจักร">
										</div>
										<div class="form-group">
											<label for="password">ตำแหน่งเครื่องจักร</label>
											<input type="password" class="form-control" id="MACHINE_LINE" name="MACHINE_LINE" placeholder="ตำแหน่งเครื่องจักร">
										</div>
											<!-- ส่วนของสถานะ และตำแหน่ง-->
										<div class="row ml-1">
											<div class="form-group col-md-6 col-lg-6">
												<lebel>สถานะการใช้งาน</lebel>
												<select class="form-control form-control" id="defaultSelect">
													<option>ทำงาน</option>
													<option>ไม่ได้ทำงาน</option>
												</select>
											</div>
											<div class="form-group col-6">
												<lebel>ตำแหน่งเครื่อง</lebel>
												<select class="form-control form-control" id="defaultSelect">
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
											<label for="email2">ชื่อเครื่องจักร</label>
											<input type="email" class="form-control" id="MACHINE_NAME" name="MACHINE_NAME" placeholder="ชื่อเครื่องจักร">
										</div>
										<div class="form-group">
											<label for="password">วันที่เริ่มใช้งาน	</label>
											<input type="password" class="form-control" id="MACHINE_STARTDATE" name="MACHINE_STARTDATE" placeholder="วันที่เริ่มใช้งาน">
										</div>
										<div class="form-group">
											<label for="password">ซื้อจากบริษัท	</label>
											<input type="password" class="form-control" id="MACHINE_STARTDATE" name="MACHINE_STARTDATE" placeholder="ซื้อจากบริษัท">
										</div>
										<div class="form-group">
											<label for="email2">ชนิดเครื่องจักร</label>
											<input type="email" class="form-control" id="MACHINE_NAME" name="MACHINE_NAME" placeholder="กำลังการผลิต">
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
        										<div class="jumbotron bg-primary">
															<div class="row">
																<div class="col-md-8 col-lg-3">
																	<div class="form-group">
																		<label for="email2">PartNo</label>
																		<input type="email" class="form-control" id="MACHINE_NAME" name="MACHINE_NAME" placeholder="กำลังการผลิต">
																	</div>
																	<div class="form-group">
																		<label for="password">ราคา	</label>
																		<input type="password" class="form-control" id="MACHINE_STARTDATE" name="MACHINE_STARTDATE" placeholder="Password">
																	</div>
																	<div class="form-group">
																		<label for="email2">Power</label>
																		<input type="email" class="form-control" id="MACHINE_NAME" name="MACHINE_NAME" placeholder="กำลังการผลิต">
																	</div>
																</div>
																<div class="col-md-8 col-lg-3">
																	<div class="form-group">
																		<label for="email2">Model</label>
																		<input type="email" class="form-control" id="MACHINE_NAME" name="MACHINE_NAME" placeholder="กำลังการผลิต">
																	</div>
																	<div class="form-group">
																		<label for="password">ค่าใช้จ่ายซ่อมบำรุง	</label>
																		<input type="password" class="form-control" id="MACHINE_STARTDATE" name="MACHINE_STARTDATE" placeholder="Password">
																	</div>
																	<div class="form-group">
																		<label for="password">Weight	</label>
																		<input type="password" class="form-control" id="MACHINE_STARTDATE" name="MACHINE_STARTDATE" placeholder="Password">
																	</div>
																</div>
																<div class="col-md-8 col-lg-3">
																	<div class="form-group">
																		<label for="email2">Serial</label>
																		<input type="email" class="form-control" id="MACHINE_NAME" name="MACHINE_NAME" placeholder="กำลังการผลิต">
																	</div>
																	<div class="form-group">
																		<label for="email2">ความเร็ว</label>
																		<input type="email" class="form-control" id="MACHINE_NAME" name="MACHINE_NAME" placeholder="กำลังการผลิต">
																	</div>
																	<div class="form-group">
																		<label for="email2">Target</label>
																		<input type="email" class="form-control" id="MACHINE_NAME" name="MACHINE_NAME" placeholder="กำลังการผลิต">
																	</div>
																</div>
																<div class="col-md-8 col-lg-3">
																	<div class="form-group">
																		<label for="email2">โรงงานผลิต</label>
																		<input type="email" class="form-control" id="MACHINE_NAME" name="MACHINE_NAME" placeholder="กำลังการผลิต">
																	</div>
																	<div class="form-group">
																		<label for="email2">ความเร็ว</label>
																		<input type="email" class="form-control" id="MACHINE_NAME" name="MACHINE_NAME" placeholder="กำลังการผลิต">
																	</div>
																	<div class="form-group">
																		<label for="email2">Priority</label>
																		<input type="email" class="form-control" id="MACHINE_NAME" name="MACHINE_NAME" placeholder="กำลังการผลิต">
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
			</div>
		</div>



@stop
{{-- ปิดส่วนเนื้อหาและส่วนท้า --}}

{{-- ส่วนjava --}}
@section('javascript')
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
@stop
{{-- ปิดส่วนjava --}}
