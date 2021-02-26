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
								<a href="{{ url('machine/manual/manuallist') }}">
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
								<div class="form-inline bg-primary"><p style="color:white;font-size:17px" class="ml-4 mt-3">คู่มือเครื่อง {{ $dataset->MACHINE_CODE }}</p>
									<div class="btn-group ml-3" role="group" aria-label="Basic example">
									</div>
									<div class="form-group form-inline ">
									</div>
								</div>
							</div>
							<div class="card-body ml-4">
								<div class="row">
									<div class="col-md-6 col-lg-1">
									{{-- <input type="hidden"  id="UNID" name="UNID"  value="{{ $data_set->UNID }}"> --}}

									</div>
									<div class="col-md-6 col-lg-2">
										รหัสเครื่อง

									</div>
									<div class="col-md-6 col-lg-3">
										ชื่อคู่มือ
									</div>
									<div class="col-md-6 col-lg-2">
										ชื่อไฟล์คู่มือ
									</div>
									<div class="col-md-6 col-lg-2">
										วันที่อัปโหลด
									</div>
									<div class="col-md-6 col-lg-2">
										Action
									</div>

								</div>
								<div class="row mt-4">
									@foreach ($dataupload as $key => $dataitem)


									<div class="col-md-6 col-lg-1">
										{{ $key=1,$key++ }}
									</div>
									<div class="col-md-6 col-lg-2">
										<h5>{{ $dataitem->MACHINE_CODE }}</h5>

									</div>
									<div class="col-md-6 col-lg-3">
										<h5>{{ $dataitem->FILE_NAME }}</h5>
									</div>
									<div class="col-md-6 col-lg-2">
										<h5>{{ $dataitem->FILE_UPLOAD }}</h5>
									</div>
									<div class="col-md-6 col-lg-2">
										<h5>{{ $dataitem->FILE_UPLOADDATETIME }}</h5>
									</div>
									<div class="col-md-6 col-lg-2">
										<a href="{{ url('machine/assets/uploadpdf/'.$dataitem->UNID) }}">
											<span style="color: #2C94FC;">
												<i class="fas fa-eye fa-lg"></i>
											</span>
										</a>
										<a href="{{url('machine/upload/download/'.$dataitem->UNID)}}"class="ml-2" ><span style="color: #2CFC78;"> <i class="fas fa-download fa-lg"></i></span> 	</a>
									</div>
									@endforeach
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
