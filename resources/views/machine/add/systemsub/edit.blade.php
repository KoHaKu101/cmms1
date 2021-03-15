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
								<a href="{{ url('machine/machinesystemsubtable/list') }}">
									<button class="btn btn-warning  btn-xs ">
										<span class="fas fa-arrow-left fa-lg">Back </span>
									</button>
								</a>
							</div>
							<div class="col-md-1 mt-2 ">
								<form action="{{ url('machine/machinesystemsubtable/update/'.$dataset->UNID) }}" method="POST" enctype="multipart/form-data">
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
								<h4 class="ml-3 mt-2" style="color:white;" >แก้ไขรายละเอียดระบบเครื่องจักร </h4>
							</div>
							<div class="card-body">
								<div class="row">
										<!-- ช่อง1-->
									<div class="col-md-6 col-lg-3 mt-1">
										<div class="form-group has-error">
											<lebel for="SYSTEM_CODE">ในระบบ*</lebel>
											<select class="form-control my-1" id="SYSTEM_CODE" name="SYSTEM_CODE" required autofocus>
												<option value="">-แสดงทั้งหมด-</option>
												@foreach ($system as $key => $srow)
													<option value="{{ $srow->SYSTEM_CODE }}"{{ $dataset->SYSTEM_CODE == $srow->SYSTEM_CODE ? 'selected' : '' }}>{{$srow->SYSTEM_NAME}}</option>
												@endforeach
											</select>
										</div>
									</div>

									<div class="col-md-6 col-lg-2">
										<div class="form-group has-error">
											<label for="SYSTEMSUB_CODE">Code*</label>
											<input type="text" class="form-control" id="SYSTEMSUB_CODE" name="SYSTEMSUB_CODE" value="{{$dataset->SYSTEMSUB_CODE}}">
										</div>
										
									</div>
										<!-- ช่อง2-->
										<div class="col-md-6 col-lg-3">
											<div class="form-group has-error">
												<label for="SYSTEMSUB_NAME">รายการเครื่องจักร*	</label>
												<input type="text" class="form-control" id="SYSTEMSUB_NAME" name="SYSTEMSUB_NAME" value="{{$dataset->SYSTEMSUB_NAME}}">
											</div>
											
										</div>
										<div class="form-check has-error">
											<label for="SYSTEMSUB_STATUS">สถานการเปิดใช้งาน</label><br>
											<label class="form-radio-label">
												<input class="form-radio-input" type="radio" name="SYSTEMSUB_STATUS" {{ $dataset->SYSTEMSUB_STATUS == "9" ? 'checked' : '' }} value="9" >
												<span class="form-radio-sign">เปิด</span>
											</label>
											<label class="form-radio-label ml-3">
												<input class="form-radio-input" type="radio" name="SYSTEMSUB_STATUS" {{ $dataset->SYSTEMSUB_STATUS == "1" ? 'checked' : '' }} value="1">
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
