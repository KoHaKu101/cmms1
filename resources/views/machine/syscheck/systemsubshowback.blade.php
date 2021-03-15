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
								<a href="{{ url('machine/assets/edit/'.$databack->UNID) }}">
									<button class="btn btn-warning  btn-xs ">
										<span class="fas fa-arrow-left fa-lg ">Back </span>
									</button>
								</a>
							</div>
						</div>
					</div>
				</div>
				<!--ส่วนกรอกข้อมูล-->

				<div class="py-12">
	        <div class="container mt-2">
						<form action="{{ url('machine/syschecksub/update/'.$dataname->UNID) }}" method="POST" enctype="multipart/form-data">
							@csrf
						<div class="row">
						 		<div class="col-md-8">
										<div class="card">
											<div class="card-header bg-primary col-md-6 col-lg-12">
												<div class="row">
													<div class="col-md-6 col-lg-10">
														<h4 class="ml-3 mt-2" style="color:white;" >ระบบ : {{ $dataname->SYSTEM_CODE == $dataname->SYSTEM_CODE ? $dataname->SYSTEM_NAME : '' }}</h4>
													</div>
													<div class="col-md-2 col-lg-1">
														<button type="submit" class="btn btn-warning float-right btn-sm "><span style="color:white;font-size:14px">บันทึกค่า STD</span>
														</button>
													</div>
										 	</div>
											</div>
												<div class="card-body col-md-6 col-lg-12">
									          <div class="table">

									            <table class="table table-sm table-head-bg-primary  ">
									                <tbody>
									                  <tr>
									                    <td style="width:50px"></td>
									                    <td style="width:100px">รายการ</td>
																			<td style="width:200">ค่ามาตราฐาน(STD)</td>
																			<td>Action</td>
									                  </tr>
									                  @foreach ($dataset as $key => $datasub)
									              		<tr>
									                		<td style="width:25px;text-align:center">{{ $key+1 }}</td>
									                		<td style="width:100px">
																				{{ $datasub->SYSTEMSUB_NAME }}
									                		</td>
									                		<td style="width:200px">
																				<input type="hidden" name="DATAUNID[]" value="{{ $datasub->UNID }}">
									                  		<input type="text" class="form-control" name="SYSTEMSUB_STD[]"
																				value="{{ $datasub->SYSTEMSUB_STD }}" placeholder="ค่า STD" required autofocus>
									                		</td>

																			<td>
																				<a href="{{ url('machine/syschecksub/delete/'.$datasub->UNID) }}">
																					<button type="button"style="width:100px" class="btn btn-danger btn-xs  mx-2 my-1">
																						<span class="label"style="text-align:left;font-size:14px">ลบรายการ</span>
																					</button>
																				</a>
																			</td>
									              		</tr>
									              		@endforeach
									              	</tbody>
									            </table>


									          </div>
												</div>
										</div>
								</div>
								</form>
								<div class="col-md-4">
									<div class="card">
										<div class="card-header bg-primary">
											<h4 class="ml-3 mt-2" style="color:white;" > เพิ่มรายการตรวจสอบ : {{ $dataname->SYSTEM_CODE == $dataname->SYSTEM_CODE ? $dataname->SYSTEM_NAME : '' }} </h4>
										 </div>
										 <div class="card-body">
											 <form action="{{ url('/machine/syschecksub/store') }}"  method="POST" enctype="multipart/form-data">
												 @csrf
												 @foreach($machinesystemsub as $datasystemsub )
												 <div class="form-check">
													 <label class="form-check-label">
														 <input  type="hidden" name="SYSTEM_CODE[]" value="{{$dataname->SYSTEM_CODE}}">
														 <input  type="hidden" name="SYSTEMCHECK_UNID_REF[]" value="{{$dataname->UNID}}">
														 <input  type="hidden" name="SYSTEMSUB_NAME[]" value="{{ $datasystemsub->SYSTEMSUB_NAME }}">
														 <input class="form-check-input" type="checkbox" name="SYSTEMSUB_CODE[]" value="{{ $datasystemsub->SYSTEMSUB_CODE }}">
														 <span class="form-check-sign"  >{{ $datasystemsub->SYSTEMSUB_NAME }}</span>
													 </label>
												 </div>
												 @endforeach
												 <button tpye="submit" class="btn btn-primary">Save</button>

											 </form>
										 </div>
									</div>
								</div>
							</div>

						</div>
					</div>

				</div>
			</div>
		</div>
{{-- @include('masterlayout\tab\modal\systemcheck\systemcheck') --}}
{{-- @include('masterlayout.tab.edit.systemcheck.syscheck') --}}
{{-- @include('masterlayout.tab.edit.systemcheck.syschecksub') --}}
{{-- @include('masterlayout.tab.edit.systemcheck.syscheckmain') --}}





@stop
{{-- ปิดส่วนเนื้อหาและส่วนท้า --}}

{{-- ส่วนjava --}}
@section('javascript')

@stop
{{-- ปิดส่วนjava --}}
