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
								<a href="{{ url('machine/assets/edit/'.$dataset->UPLOAD_UNID_REF) }}">
									<button class="btn btn-primary  btn-sm ">
										<span class="fas fa-arrow-left ">Back </span>
									</button>
								</a>
							</div>
								<div class="col-md-4 mt-2">
								<form action="{{ url('machine/upload/update/'.$dataset->UNID) }}" method="POST" enctype="multipart/form-data">
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
								<div class="form-inline bg-primary"><p style="color:white;font-size:17px" class="ml-4 mt-3">แก้ไขคู่มือเครื่อง</p>
									<div class="btn-group ml-3" role="group" aria-label="Basic example">
									</div>
									<div class="form-group form-inline ">
									</div>
								</div>
							</div>
							<div class="card-body ml-4">
								<div class="row">
									<div class="col-md-6 col-lg-4">
										ชื่อ รายการเอก/คู่มือ
										<div class="col-md-6 col-lg-12 mt-4 ml--4">
											<input type="text" class="form-control"id="TOPIC_NAME" name="TOPIC_NAME" value="{{ $dataset->TOPIC_NAME }}">
											<input type="hidden" class="form-control"id="MACHINE_CODE" name="MACHINE_CODE" value="{{ $dataset->MACHINE_CODE }}">
											<input type="hidden" class="form-control"id="UNID" name="UNID" value="{{ $dataset->UNID }}">
										</div>
									</div>
									<div class="col-md-6 col-lg-4">
										ชื่อไฟล์
										<div class="col-md-6 col-lg-12 mt-4 ml--4">
											<label>{{ $dataset->FILE_NAME }}<label>
										</div>
									</div>
									<div class="col-md-6 col-lg-4">

										<div class="col-md-6 col-lg-12 mt-4 ml--4">
											<input type="file" class="form-control" id="FILE_UPLOAD" name="FILE_UPLOAD">
											<input type="hidden" id="FILE_UPDATE" name="FILE_UPDATE" value="{{ $dataset->FILE_UPLOAD }}">
											<input type="hidden" id="FILE_SIZE" name="FILE_SIZE" value="{{ $dataset->FILE_SIZE }}">
											<input type="hidden" id="FILE_NAME" name="FILE_NAME" value="{{ $dataset->FILE_NAME }}">
											<input type="hidden" id="FILE_EXTENSION" name="FILE_EXTENSION" value="{{ $dataset->FILE_EXTENSION }}">
											<input type="hidden" id="FILE_UPLOADDATETIME" name="FILE_UPLOADDATETIME" value="{{ $dataset->FILE_UPLOADDATETIME }}">
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
		</form>
	</div>
</div>







@stop
{{-- ปิดส่วนเนื้อหาและส่วนท้า --}}

{{-- ส่วนjava --}}
@section('javascript')

@stop
{{-- ปิดส่วนjava --}}
