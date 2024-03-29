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
							<div class="col-md-1 ">
								<a href="{{ url('machine/machinestatustable/list') }}">
									<button class="btn btn-warning  btn-xs ">
										<span class="fas fa-arrow-left fa-lg">Back </span>
									</button>
								</a>
							</div>
							<div class="col-md-1 ">
								<form action="{{ url('machine/machinestatustable/update/'.$dataset->UNID) }}" method="POST" enctype="multipart/form-data">
									@csrf
									<button class="btn btn-primary btn-xs" type="submit">
										<span class="fas fa-save fa-lg">	Save	</span>
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
								<h4 class="ml-3 mt-2" style="color:white;" >แก้ไขระบบรายการแจ้ง </h4>
							</div>
							<div class="card-body">
								<div class="row">
										<!-- ช่อง1-->
										<div class="col-md-6 col-lg-4">
											<div class="form-group has-error">
												<label for="STATUS_CODE">STATUS CODE*</label>
												<input type="text" class="form-control" id="STATUS_CODE" name="STATUS_CODE" value="{{$dataset->STATUS_CODE}}">
											</div>
										</div>
										<!-- ช่อง2-->
										<div class="col-md-6 col-lg-4">
											<div class="form-group has-error">
												<label for="STATUS_NAME">รายการสถานะ*	</label>
												<input type="text" class="form-control" id="STATUS_NAME" name="STATUS_NAME" value="{{$dataset->STATUS_NAME}}">
											</div>
										</div>
										<div class="form-check has-error">
											<label for="STATUS">สถานการเปิดใช้งาน</label><br>
											<label class="form-radio-label">
												<input class="form-radio-input" type="radio" name="STATUS" {{ $dataset->STATUS == "9" ? 'checked' : '' }} value="9" >
												<span class="form-radio-sign">เปิด</span>
											</label>
											<label class="form-radio-label ml-3">
												<input class="form-radio-input" type="radio" name="STATUS" {{ $dataset->STATUS == "1" ? 'checked' : '' }} value="1">
												<span class="form-radio-sign">ปิด</span>
											</label>
										</div>
										<!-- ช่อง3-->
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
