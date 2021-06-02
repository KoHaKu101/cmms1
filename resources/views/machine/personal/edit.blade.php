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
								<a href="{{ url('machine/personal/personallist') }}">
									<button class="btn btn-warning  btn-xs ">
										<span class="fas fa-arrow-left fa-lg">Back </span>
									</button>
								</a>
							</div>
							<div class="col-md-11 ">
								<form action="{{ url('machine/personal/update/'.$dataset->UNID) }}" method="POST" enctype="multipart/form-data">
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
								<h4 class="ml-3 mt-2" style="color:white;" >แก้ไขข้อมูลพนักงาน </h4>
							</div>
							<div class="card-body">
								<div class="row">
									<!-- ช่อง1-->
									@php
									$EMP_ICON = $dataset->EMP_ICON != '' ? 'image/emp/'.$dataset->EMP_ICON : "/assets/img/nobody.jpg";
									@endphp
										<div class="col-md-6 col-lg-3">
											<div class="form-group mt-4">
												<img src="{{asset($EMP_ICON)}}" width="200" height="200px" class="mt-4">
													<input type="file" class="form-control mt-4" id="EMP_ICON" name="EMP_ICON" >

											</div>
										</div>
										<!-- ช่อง2-->
										<div class="col-md-6 col-lg-4">
											<div class="form-group has-error">
												<label for="EMP_CODE">รหัสพนักงาน</label>
													<input type="text" class="form-control" id="EMP_CODE" name="EMP_CODE" value="{{ $dataset->EMP_CODE }}">
														<input type="hidden" id="UNID" name="UNID" value="{{ $dataset->UNID }}">

											</div>
											<div class="row ml-1 mt-2">
												<div class="form-group col-md-12 has-error">
													<lebel>ประจำ LINE</lebel>
													<select class="form-control form-control" id="EMP_GROUP" name="EMP_GROUP">
													<option value>--แสดงทั้งหมด--</option>
													@foreach($datalineselect as $dataline)

													<option value="{{ $dataline->LINE_NAME}}"
														{{ $dataset->EMP_GROUP == $dataline->LINE_NAME ? 'selected' : ''}} > {{$dataline->LINE_NAME}} </option>
													@endforeach
												</select>
						  				</div>
											</div>
										</div>
										<!-- ช่อง3-->
										<div class="col-md-6 col-lg-4">
											<div class="form-group has-error">
												<label for="EMP_NAME">ชื่อพนักงาน</label>
												<input type="text" class="form-control" id="EMP_NAME" name="EMP_NAME" value="{{ $dataset->EMP_NAME }}">
											</div>
											<div class="form-group col-md-12 has-error">
												<lebel>ตำแหน่งงาน</lebel>
												<select class="form-control form-control" id="" name="">
												<option value>--แสดงทั้งหมด--</option>
												<option value>หัวหน้างาน</option>
												<option value>พนักงานประจำ</option>
												<option value>พนักงานรายวัน</option>
												</select>
											</div>
										</div>
									</div>
								</form>
								</div>
								<div class="card-footer">
									<div class="row">
										<div class="col-md-6 col-lg-1">
											<small><b>สร้างโดย</b></small>
										</div>
										<div class="col-md-6 col-lg-2">
											<small>{{ $dataset->CREATE_BY }}</small>
										</div>
										<div class="col-md-6 col-lg-1">
											<small><b>วันที่สร้าง</b></small>
										</div>
										<div class="col-md-6 col-lg-2">
											<small>{{ $dataset->CREATE_TIME }}</small>
										</div>
										<div class="col-md-6 col-lg-1">
											<small><b>แก้ไขโดย</b></small>
										</div>
										<div class="col-md-6 col-lg-1">
											<small>{{ $dataset->MODIFY_BY }}</small>
										</div>
										<div class="col-md-6 col-lg-1">
											<small><b>วันที่แก้ไข</b></small>
										</div>
										<div class="col-md-6 col-lg-2">
											<small>{{ $dataset->MODIFY_TIME }}</small>
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

@stop
{{-- ปิดส่วนjava --}}
