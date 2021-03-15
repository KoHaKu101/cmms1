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
								<a href="{{ url()->previous() }}">
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
							<div class="card-header bg-primary">
								<div class="row">
								<div class="col-md-4">
								<h3 class="ml-4 mt-2" style="color:white">อะไหล่ เครื่อง {{ $dataset->MACHINE_CODE }}</h3>
								<input type="hidden" value="{{ $dataset->UNID }}">
								</div>
								<div class="col-md-8">
									<button  id="popup" type="button" class="btn btn-success btn-sm float-right mt-1"
									data-toggle="modal" data-target="#partcheckadd">
												<span class="fas fa-plus ">เพิ่มระบบ </span>
											</button>
								</div>
							</div>
						</div>
							<div class="card-body ml-2">
								<div class="row ">
									{{-- <input type="hidden"  id="MACHINE_UNID" name="MACHINE_UNID"  value="{{ $data_set->UNID }}"> --}}
									<div class="col-md-6 col-lg-1">


									</div>
									<div class="col-md-6 col-lg-2">
										รายการอะไหล่
									</div>
									<div class="col-md-6 col-lg-2">
										เปลี่ยนประจำเดือน
									</div>
									<div class="col-md-6 col-lg-2">
										วันที่เปลี่ยนล่าสุด
									</div>
									<div class="col-md-6 col-lg-2">
										วันที่เปลี่ยน
									</div>

									<div class="col-md-6 col-lg-3">
										รายการครบกำหนดเปลี่ยน
									</div>
									<div class="col-md-6 col-lg-3 ">
									</div>

								</div>

								<div class="row mt-4">

									{{-- <input type="hidden"  id="MACHINE_UNID" name="MACHINE_UNID"  value="{{ $data_set->UNID }}"> --}}
									<div class="col-md-6 col-lg-1 ">
										1

									</div>
									<div class="col-md-6 col-lg-2">
										สายพาน
									</div>
									<div class="col-md-6 col-lg-2">
										3 เดือน
									</div>
									<div class="col-md-6 col-lg-2">
										3 เดือน
									</div>
									<div class="col-md-6 col-lg-2 mt--2">
										<input type="date" class="form-control">
									</div>
									<div class="col-md-6 col-lg-2">
										ครบกำหนด 3 รายการ
									</div>


									{{-- <div class="col-md-6 col-lg-3">
										<div class="form-group form-inline float-right">
												<button  id="popup" type="button" class="btn btn-link mt--3 "
		                    data-toggle="modal" data-target="#syscheck">
												<span style="color: #2C94FC;"><i class="fas fa-eye fa-lg"></i>
												</span></button>
									</div>

								</div> --}}


								</div>

							</div>
				</div>
				</div>
			</div>

	</div>
</div>

@include('masterlayout\tab\edit\partcheck\partcheck')
@include('masterlayout\tab\edit\partcheck\partcheckadd')






@stop
{{-- ปิดส่วนเนื้อหาและส่วนท้า --}}

{{-- ส่วนjava --}}
@section('javascript')

@stop
{{-- ปิดส่วนjava --}}
