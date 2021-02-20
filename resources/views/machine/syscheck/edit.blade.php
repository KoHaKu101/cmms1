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
							<div class="col-md-12 mt-2">
								<a href="{{ url('machine/syscheck/syschecklist') }}">
									<button class="btn btn-primary  btn-sm ">
										<span class="fas fa-arrow-left ">Back </span>
									</button>
								</a>

							</div>
						</div>
					</div>
				</div>
				<!--ส่วนกรอกข้อมูล-->
				<div class="py-12">
	        <div class="container mt-2">
						<div class="card">
							<div class="card-Header bg-primary">
								{{-- <div class="form-inline  col-md-12"> --}}
								<h3 class="ml-4 mt-2" style="color:white">ลงทะเบียนเครื่องจักร</h3>
								<p style="color:white;font-size:17px" class="ml-4 mt-3">

										<a href="{{ url('machine/syscheck/syschecklist') }}">
											<button class="btn btn-info  btn-sm float-right ">
												<span class="fas fa-arrow-left ">Back </span>
											</button>
										</a>

									</p>

								{{-- </div> --}}
							</div>
							<div class="card-body ml-2">
								<div class="row ">
									{{-- <input type="hidden"  id="MACHINE_UNID" name="MACHINE_UNID"  value="{{ $data_set->UNID }}"> --}}
									<div class="col-md-6 col-lg-2">
										ระบบ

									</div>
									<div class="col-md-6 col-lg-2">
										รายการระบบ
									</div>
									<div class="col-md-6 col-lg-2">
										เช็คประจำเดือน
									</div>
									<div class="col-md-6 col-lg-2">
										วันที่เช็คล่าสุด
									</div>

									<div class="col-md-6 col-lg-3">
										รายการครบกำหนดตรวจเช็ค
									</div>
									<div class="col-md-6 col-lg-1 ">
									</div>

								</div>

								<div class="row mt-4">

									{{-- <input type="hidden"  id="MACHINE_UNID" name="MACHINE_UNID"  value="{{ $data_set->UNID }}"> --}}
									<div class="col-md-6 col-lg-2 ">
										ระบบมอเตอร์

									</div>
									<div class="col-md-6 col-lg-2">
										3 รายการ
									</div>
									<div class="col-md-6 col-lg-2">
										3 เดือน
									</div>
									<div class="col-md-6 col-lg-2">
										18/02/2021
									</div>
									<div class="col-md-6 col-lg-2">
										ครบกำหนด 3 รายการ
									</div>


									<div class="col-md-6 col-lg-2">
										<div class="form-group form-inline">
												<button  id="popup" type="button" class="btn btn-link mt--3"
		                    data-toggle="modal" data-target="#syscheck">
												<span style="color: #2C94FC;"><i class="fas fa-eye fa-lg"></i>
												</span></button>
												<button  id="popup" type="button" class="btn btn-link mt--3"
												data-toggle="modal" data-target="#syscheckadd">
												<span style="color: #1CFD48;font-size:18px"><i class="fas fa-plus fa-lg"></i>
												</span></button>
									</div>

								</div>


								</div>

							</div>
				</div>
				</div>
			</div>

	</div>
</div>

@include('masterlayout\tab\modalsyscheck\syscheck')
@include('masterlayout\tab\modalsyscheck\syscheckadd')





@stop
{{-- ปิดส่วนเนื้อหาและส่วนท้า --}}

{{-- ส่วนjava --}}
@section('javascript')

@stop
{{-- ปิดส่วนjava --}}
