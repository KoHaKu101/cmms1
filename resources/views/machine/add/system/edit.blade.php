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
								<a href="{{ url('machine/machinesystemtable/list') }}">
									<button class="btn btn-warning  btn-xs ">
										<span class="fas fa-arrow-left fa-lg">Back </span>
									</button>
								</a>
							</div>
							<div class="col-md-1 mt-2 ">
								<form action="{{ url('machine/machinesystemtable/update/'.$dataset->UNID) }}" method="POST" enctype="multipart/form-data">
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
								<h4 class="ml-3 mt-2" style="color:white;" >ระบบ {{ $dataset->MACHINE_TYPE }} </h4>
							</div>
							<div class="card-body">
								<div class="row">
										<!-- ช่อง1-->
										<div class="col-md-6 col-lg-2">
											<div class="form-group has-error">
												<label for="SYSTEM_CODE">code*</label>
												<input type="text" class="form-control" id="SYSTEM_CODE" name="SYSTEM_CODE" value="{{$dataset->SYSTEM_CODE}}">
											</div>
										</div>
										<!-- ช่อง2-->
										<div class="col-md-6 col-lg-4">
											<div class="form-group has-error">
												<label for="SYSTEM_NAME">ระบบ*	</label>
												<input type="text" class="form-control" id="MACHINE_TYPE" name="MACHINE_TYPE" value="{{$dataset->MACHINE_TYPE}}">
											</div>
										</div>
										<div class="col-md-6 col-lg-2">
											<div class="form-group has-error">
												<label for="SYSTEM_NAME">ระยะเวลา*	</label>
												<div class="input-group ">
													<input type="text" class="form-control" id="SYSTEM_MONTH" name="SYSTEM_MONTH" value="{{$dataset->SYSTEM_MONTH}}">
													<div class="input-group-append">
														<span class="input-group-text">เดือน</span>
													</div>
												</div>
											</div>
										</div>
										<div class="col-md-6 col-lg-2">
											<div class="form-check has-error">
												<label for="SYSTEM_STATUS">สถานการเปิดใช้งาน</label><br>
												<label class="form-radio-label">
													<input class="form-radio-input" type="radio" name="SYSTEM_STATUS" {{ $dataset->SYSTEM_STATUS == "9" ? 'checked' : '' }} value="9" >
													<span class="form-radio-sign">เปิด</span>
												</label>
												<label class="form-radio-label ml-3">
													<input class="form-radio-input" type="radio" name="SYSTEM_STATUS" {{ $dataset->SYSTEM_STATUS == "1" ? 'checked' : '' }} value="1">
													<span class="form-radio-sign">ปิด</span>
												</label>
											</div>
										</div>
								</div>

							</div>
						</div>
						</form>
							<div class="row">
								<div class="col-md-6 col-lg-8 ">
									<div class="card">
										<div class="card-header bg-primary">
											<h4 class="ml-3 mt-2" style="color:white;" >จุดตรวจเช็ค</h4>
										</div>
										<div class="row">
											<div id="result"class="card-body mt--3">
												<div class="table-responsive mt--4">
													<table class="table table-bordered mt-4">
														<thead>
															<tr>
																<th>ลำดับ</th>
																<th>รายการ</th>
																<th> รายละเอียด </th>
																<th>Action</th>
															</tr>
														</thead>
														<tbody>
															@foreach ($datapoint as $key => $dataitem)
															<tr>
																<td style="width:50px">{{$dataitem->SYSTEMPOINT_TABLE_ID}}</td>
																<td style="width:300px"> {{ $dataitem->SYSTEMPOINT_TABLE_NAME }}</td>
																<td style="width:200px">
																	<a href="{{ url('machine/machinesystemtable/edit/'.$dataitem->UNID) }}">
																		<button class="btn btn-primary btn-block btn-sm my-1 mx--2 ">
																			<span class="btn-label float-left">
																				<i class="fa fa-eye mx-1 "></i>
																				รายการ
																			</span>
																		</button>
																	</a>
																</td>

																<td><a href="{{ url('machine/machinesystempointtable/delete/'.$dataitem->UNID) }}">
																	<button type="button" class="btn btn-danger btn-block btn-sm my-1" style="width:40px">
																		<i class="fas fa-trash fa-lg">	</i>
																	</button>
																</a></td>
															</tr>
															@endforeach

														</tbody>
													</table>
												</div>
											</div>
										</div>
								</div>
							</div>
						<div class="col-md-6 col-lg-4">
							<div class="card">
								<div class="card-header bg-primary">
									<h4 class="ml-3 mt-2" style="color:white;" >เพิ่มจุดที่ต้องเช็ค</h4>
								</div>
								<div class="card-body">
									<form action="{{ route('machinesystempointtable.store') }}" method="POST">
										@csrf
									<!-- ช่อง1-->
										<div class="form-group has-error">
											<label for="SYSTEMPOINT_TABLE_NAME">ลำดับ*</label>
											<input type="text" class="form-control" id="SYSTEMPOINT_TABLE_ID" name="SYSTEMPOINT_TABLE_ID" >
										</div>
									<!-- ช่อง2-->
										<div class="form-group has-error">
											<label for="SYSTEMPOINT_TABLE_NAME">รายการ*	</label>
											<input type="text" class="form-control" id="SYSTEMPOINT_TABLE_NAME" name="SYSTEMPOINT_TABLE_NAME" >
											<input type="hidden" name="SYSTEMTABLE_UNID_REF" value="{{ $dataset->UNID }}">
										</div>
										<button type="submit" class="btn btn-primary ml-2 mt-4">
											Save
										</button>
									</form>
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
