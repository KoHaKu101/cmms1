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
							<div class="">
								<div class="form-inline bg-primary"><p style="color:white;font-size:17px" class="ml-4 mt-3">รายการตรวจเช็คเครื่อง</p>
									<div class="btn-group ml-3" role="group" aria-label="Basic example">
									</div>
									<div class="form-group form-inline ">
									</div>
								</div>
							</div>
							<div class="card-body ml-4">
								<div class="row">
									<div class="col-md-6 col-lg-1">
									{{-- <input type="hidden"  id="MACHINE_UNID" name="MACHINE_UNID"  value="{{ $data_set->UNID }}"> --}}

									</div>
									<div class="col-md-6 col-lg-2">
										รายการตรวจเช็ค

									</div>
									<div class="col-md-6 col-lg-1">
										STD
									</div>
									<div class="col-md-6 col-lg-1">
										ค่า
									</div>
									<div class="col-md-6 col-lg-2">
										เช็คประจำเดือน
									</div>
									<div class="col-md-6 col-lg-2">
										วันที่เช็คล่าสุด
									</div>
									<div class="col-md-6 col-lg-2">
										วันที่เช็ค
									</div>
									<div class="col-md-6 col-lg-1">

									</div>

								</div>
								<div class="row mt-4">
									{{-- @foreach ($data_set as $key => $data_set) --}}


									<div class="col-md-6 col-lg-1">
										1
									</div>
									<div class="col-md-6 col-lg-2">
										สายไฟ
										{{-- <h5>{{ $data_set->MACHINE_CODE }}</h5> --}}

									</div>
									<div class="col-md-6 col-lg-1">
										1
										{{-- <h5>{{ $data_set->FILE_NAME }}</h5> --}}
									</div>
									<div class="col-md-6 col-lg-1">
										1
										{{-- <h5>{{ $data_set->FILE_UPLOAD }}</h5> --}}
									</div>
									<div class="col-md-6 col-lg-2">
											<h5>{{ $data_set->CREATE_TIME }}</h5>
									</div>
									<div class="col-md-6 col-lg-2">

										<h5>{{ $data_set->CREATE_TIME }}</h5>
									</div>
									<div class="col-md-6 col-lg-2">
										<input type="text" class="form-control" >

									</div>
									<div class="col-md-6 col-lg-1">
										<a href="">
											<span style="color: #2C94FC;">
												<i class="fas fa-eye fa-lg"></i>
											</span>
										</a>
										<a href="#"class="ml-2" ><span style="color: #2CFC78;"> <i class="fas fa-download fa-lg"></i></span> 	</a>
									</div>
									{{-- @endforeach --}}
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
