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


	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<div class="card-title">Form Elements</div>
				</div>
				<div class="card-body">
					<div class="row">
						<div class="col-md-6 col-lg-4">
							<div class="form-group">

								<img src="/assets/img/jm_denis.jpg" width="200" height="200px" >
								<div class="card-action">
									<button class="btn btn-success">Submit</button>
									<button class="btn btn-danger">Cancel</button>
								</div>
							</div>
						</div>
						<div class="col-md-6 col-lg-4">

							<div class="form-group">
								<label for="email2">รหัสเครื่องจักร</label>
								<input type="email" class="form-control" id="MACHINE_CODE" name="MACHINE_CODE" placeholder="รหัสเครื่องจักร">

							</div>
							<div class="form-group">
								<label for="password">ตำแหน่งเครื่องจักร</label>
								<input type="password" class="form-control" id="MACHINE_LINE" name="MACHINE_LINE" >
							</div>


							<div class="form-check">
								<label class="form-check-label">
									<input class="form-check-input" type="checkbox" value="">
									<span class="form-check-sign">Agree with terms and conditions</span>
								</label>
							</div>
						</div>
						<div class="col-md-6 col-lg-4">

							<div class="form-group">
								<label for="email2">ชื่อเครื่องจักร</label>
								<input type="email" class="form-control" id="MACHINE_NAME" name="MACHINE_NAME" placeholder="ชื่อเครื่องจักร">

							</div>
							<div class="form-group">
								<label for="password">วันที่เริ่มใช้งาน	</label>
								<input type="password" class="form-control" id="MACHINE_STARTDATE" name="MACHINE_STARTDATE" placeholder="Password">
							</div>


							<div class="form-check">
								<label class="form-check-label">
									<input class="form-check-input" type="checkbox" value="">
									<span class="form-check-sign">Agree with terms and conditions</span>
								</label>
							</div>
						</div>

					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<div class="card">

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
								<ul class="nav nav-pills justify-content-center">
  <li>
    <a class="active" id="home-tab" data-toggle="tab" href="#home" >ข้อมูลทั่วไป</a>
  </li>
  <li>
    <a  							id="profile-tab" data-toggle="tab" href="#profile" >Profile</a>
  </li>
  <li>
    <a  							id="messages-tab" data-toggle="tab" href="#messages" >Messages</a>
  </li>
  <li >
    <a  							id="settings-tab" data-toggle="tab" href="#settings">Settings</a>
  </li>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content clearfix">
		<!-- ข้อมูลทั่วไป -->

  <div class="tab-pane active" id="home">
    <div class="row">
      <div class="col-sm-12">
        <div class="jumbotron bg-primary">
          <h1>Home</h1>
          <p>This is home tab.</p>
        </div>
      </div>
    </div>
  </div>
	<!-- ข้อมูลทั่วไป -->

  <div class="tab-pane" id="profile">
    <div class="row">
      <div class="col-sm-12">
        <div class="jumbotron bg-success">
          <h1>Profile</h1>
          <p>This is profile tab.</p>
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



@stop
{{-- ปิดส่วนเนื้อหาและส่วนท้า --}}

{{-- ส่วนjava --}}
@section('javascript')
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
@stop
{{-- ปิดส่วนjava --}}
