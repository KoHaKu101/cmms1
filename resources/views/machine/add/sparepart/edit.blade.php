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
								<a href="{{ url('machine/machinespareparttable/list') }}">
									<button class="btn btn-warning  btn-xs ">
										<span class="fas fa-arrow-left fa-lg">Back </span>
									</button>
								</a>
							</div>
							<div class="col-md-1 mt-2 ">
								<form action="{{ url('machine/machinespareparttable/update/'.$dataset->UNID) }}" method="POST" enctype="multipart/form-data">
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
												<label for="SPAREPART_CODE">รหัสอะไหล่*</label>
												<input type="text" class="form-control" id="SPAREPART_CODE" name="SPAREPART_CODE" value="{{$dataset->SPAREPART_CODE}}">
											</div>
										</div>
										<!-- ช่อง2-->
										<div class="col-md-6 col-lg-4">
											<div class="form-group has-error">
												<label for="SPAREPART_NAME">ชื่อรายการอะไหล่*	</label>
												<input type="text" class="form-control" id="SPAREPART_NAME" name="SPAREPART_NAME" value="{{$dataset->SPAREPART_NAME}}">
											</div>
										</div>
										<div class="col-md-6 col-lg-4">
											<div class="form-group has-error">
												<label for="SPAREPART_PRICE">ราคา	</label>
												<input type="text" class="form-control" id="SPAREPART_PRICE" name="SPAREPART_PRICE" value="{{$dataset->SPAREPART_PRICE}}">
											</div>
										</div>
										<!-- ช่อง3-->
										<div class="col-md-8 col-lg-4 ml-2">
											<div class="form-group">
												<label for="SPAREPART_NOTE">รายละเอียดเพิ่มเติม</label>
												<textarea class="form-control" id="SPAREPART_NOTE" name="SPAREPART_NOTE" rows="4" value="{{ $dataset->SPAREPART_NOTE }}"></textarea>
											</div>
										</div>
										<div class="form-check has-error">
											<label for="SPAREPART_STATUS">สถานการเปิดใช้งาน</label><br>
											<label class="form-radio-label">
												<input class="form-radio-input" type="radio" name="SPAREPART_STATUS" {{ $dataset->SPAREPART_STATUS == "9" ? 'checked' : '' }} value="9" >
												<span class="form-radio-sign">เปิด</span>
											</label>
											<label class="form-radio-label ml-3">
												<input class="form-radio-input" type="radio" name="SPAREPART_STATUS" {{ $dataset->SPAREPART_STATUS == "1" ? 'checked' : '' }} value="1">
												<span class="form-radio-sign">ปิด</span>
											</label>
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
