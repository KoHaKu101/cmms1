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
							<div class="col-md-1">
								<a href="{{ url('machine/syscheck/syschecklist') }}">
									<button class="btn btn-warning  btn-xs ">
										<span class="fas fa-arrow-left fa-lg ">Back </span>
									</button>
								</a>
							</div>
							<div class="col-md-1">
								<button  id="popup" type="button" class="btn btn-primary btn-xs "
								data-toggle="modal" data-target="#syscheckmain">
											<span class="fas fa-plus fa-lg ">เพิ่มระบบ </span>
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
								<h4 class="ml-3 mt-2" style="color:white;" >รายการตรวจเช็คเครื่องจักร {{ $data_set->MACHINE_CODE }}</h4>
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
										<button  id="popup" type="button" class="btn btn-secondary btn-block btn-sm my-1 mt--2"
										data-toggle="modal" data-target="#syscheck">
										<span class="float-left"><i class="fas fa-eye fa-lg mx-1"></i>3 รายการ
										</span></button>

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
												<button  id="popup" type="button" class="btn btn-primary btn-block btn-sm my-1 mt--2"
												data-toggle="modal" data-target="#syschecksub">
												<span class="float-left"><i class="fas fa-plus fa-lg mx-1"></i> เพิ่มรายการ
												</span></button>


								</div>


								</div>

							</div>
				</div>
				</div>
			</div>

	</div>
</div>
{{-- @include('masterlayout\tab\modal\systemcheck\systemcheck') --}}
@include('masterlayout.tab.edit.systemcheck.syscheck')
@include('masterlayout.tab.edit.systemcheck.syschecksub')
@include('masterlayout.tab.edit.systemcheck.syscheckmain')





@stop
{{-- ปิดส่วนเนื้อหาและส่วนท้า --}}

{{-- ส่วนjava --}}
@section('javascript')

@stop
{{-- ปิดส่วนjava --}}
