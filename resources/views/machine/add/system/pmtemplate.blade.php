@extends('masterlayout.masterlayout')
@section('tittle','homepage')
@section('css')
{{-- <link rel="stylesheet" href="{{asset('assets/css/bulma.min.css')}}"> --}}
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
				<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
          <div class="container">
						<div class="row">
							<div class="col-md-12 gx-4">
								<a href="{{ url('machine/pm/template/list/') }}">
								<button class="btn btn-warning  btn-xs ">
									<span class="fas fa-arrow-left fa-lg">Back </span>
								</button>
							</a>
							</div>
						</div>
          </div>
				</div>
				<div class="py-12">
	        <div class="container mt-2">
						<div class="row">
							<div class="col-md-12">
								<div class="card ">
                	@if(session('success'))
                  	<div class="alert alert-success alert-dismissible fade show" role="alert">
  											<strong>{{ session('success') }}</strong>
  											<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    										<span aria-hidden="true">&times;</span>
  											</button>
										</div>
									@endif
									<form action="{{ url('machine/pm/template/update/'.$datapmtemplatelist->UNID) }}" method="post" enctype="multipart/form-data">
										@csrf
										<div class="card-header bg-primary">

											<h4 class="ml-3 mt-2" style="color:white;" > {{$datapmtemplate->PM_TEMPLATE_NAME}} : {{$datapmtemplatelist->PM_TEMPLATELIST_NAME}}
												<button class="btn btn-warning btn-sm float-right mt--1">
													<i class="fas fa-save" style="color:white;font-size:15px"> Save</i>
												</button>
											</h4>
										 </div>
										<div class="card-body">
										 	<div class="row">
											 	<div class="col-md-6 col-lg-3 has-error">
												 	<label> รายการ PM</label>
													<input type="hidden" class="form-control" name="PM_TEMPLATELIST_CHECK" value="{{ $datapmtemplatelist->PM_TEMPLATELIST_CHECK }}">
												 	<input type="text" class="form-control" name="PM_TEMPLATELIST_NAME" value="{{ $datapmtemplatelist->PM_TEMPLATELIST_NAME }}">
											 	</div>
												<div class="col-md-6 col-lg-2 has-error">
													<label> ระยะเวลา</label>
													<div class="input-group">
														<input type="text" class="form-control" name="PM_TEMPLATELIST_DAY" value="{{ $datapmtemplatelist->PM_TEMPLATELIST_DAY }}">
														<div class="input-group-append">

															<span class="input-group-text">{{$datapmtemplatelist->PM_TEMPLATELIST_CHECK == '1' ? 'เดือน' : 'วัน' }}</span>
														</div>
													</div>
												</div>
												<div class="col-md-6 col-lg-2 has-error">
													<label> เปลี่ยนเดือน/วัน</label>
													<div class="selectgroup w-100">
															<label class="selectgroup-item">
																<input type="radio" name="PM_TEMPLATELIST_CHECK" value="1" class="selectgroup-input" {{ $datapmtemplatelist->PM_TEMPLATELIST_CHECK == '1' ? 'checked' : ""}}>
																<span class="selectgroup-button">เดือน</span>
															</label>
															<label class="selectgroup-item">
																<input type="radio" name="PM_TEMPLATELIST_CHECK" value="2" class="selectgroup-input" {{ $datapmtemplatelist->PM_TEMPLATELIST_CHECK == '2' ? 'checked' : ""}}>
																<span class="selectgroup-button">วัน</span>
															</label>
														</div>
												</div>
												<div class="col-md-6 col-lg-2 has-error">
													<label> แจ้งเตือนก่อนครบกำหนด</label>
													<div class="input-group">
														<input type="text" class="form-control" name="PM_TEMPLATELIST_NOTIFY" value="{{ $datapmtemplatelist->PM_TEMPLATELIST_NOTIFY }}">
														<div class="input-group-append">
															<span class="input-group-text">วัน</span>
														</div>
													</div>
												</div>
												<div class="col-md-6 col-lg-3 has-error">
													<label> ตรวจเช็คครั้งแรก</label>
													<input type="date" class="form-control" name="PM_TEMPLATELIST_LASTDUE" value="{{ $datapmtemplatelist->PM_TEMPLATELIST_LASTDUE }}">
												</div>
												<div class="col-md-6 col-lg-3 has-error">
													<label> ครบกำหนด</label>
													<input type="text" class="form-control" name="PM_TEMPLATELIST_DUE" value="{{ $datapmtemplatelist->PM_TEMPLATELIST_DUE }}" readonly>
												</div>
												<div class="col-md-6 col-lg-2 has-error">
													<label> สถานะ</label>
													<div class="selectgroup w-100">
															<label class="selectgroup-item">
																<input type="radio" name="PM_TEMPLATELIST_STATUS" value="1" class="selectgroup-input" {{ $datapmtemplatelist->PM_TEMPLATELIST_STATUS == '1' ? 'checked' : ""}}>
																<span class="selectgroup-button">เปิด</span>
															</label>
															<label class="selectgroup-item">
																<input type="radio" name="PM_TEMPLATELIST_STATUS" value="2" class="selectgroup-input" {{ $datapmtemplatelist->PM_TEMPLATELIST_STATUS == '2' ? 'checked' : ""}}>
																<span class="selectgroup-button">ปิด</span>
															</label>
														</div>
												</div>
										 	</div>
										</div>
									</form>
											</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-8">
									<div class="card">
											<div class="card-header bg-primary">
												<h4 class="ml-3 mt-2" style="color:white;" > จุดตรวจเช็ค</h4>
											</div>
												<div class="card-body mt--3">
													<div class="table-responsive mt--4">
														<table class="table table-bordered mt-4">
															<thead>
																<tr>
																	<th scope="col">ลำดับ</th>
																	<th scope="col">รายการ PM</th>
																	<th></th>
																</tr>
															</thead>
															<tbody>
															@foreach ($datapmtemplatedetail as $key => $dataitem)
																<tr>
																	<td>{{$key+1}}</td>
																	<td>{{$dataitem->PM_DETAIL_NAME}}</td>
																	<td style="width:40px">
																		<button type="button" class="btn btn-danger btn-block btn-sm my-1" onclick="deletedata('{{ $dataitem->UNID }}')" >
																			<i class="fas fa-trash fa-lg">	</i>
																		</button>

																	</td>
																</tr>
															@endforeach

															</tbody>
														</table>
												</div>
											</div>
										</div>
									</div>
									<div class="col-md-4">
									<div class="card">
										<div class="card-header bg-primary">
											<h4 class="ml-3 mt-2" style="color:white;" > เพิ่มจุดตรวจเช็ค </h4>
										 </div>
										<div class="card-body">
											<form action="{{ route('pmtemplatedetail.store') }}" method="POST">
												@csrf
												<div class="form-group has-error">
													<label for="SYSTEM_CODE">จุดตรวจเช็ค</label>
													<input type="hidden" name="PM_TEMPLATELIST_UNID_REF" value="{{ $datapmtemplatelist->UNID }}">
													<textarea class="form-control" id="PM_DETAIL_NAME" name="PM_DETAIL_NAME" rows="2"></textarea required autofocus>
												</div>
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


@stop
{{-- ปิดส่วนเนื้อหาและส่วนท้า --}}

{{-- ส่วนjava --}}
@section('javascript')
<script >
	function deletedata(pm){
		var unid = (pm);
		console.log(unid);
			Swal.fire({
				title: 'ต้องการลบจุดตรวจเช็คมั้ย?',
				text: "หากทำการลบจะไม่สามารถกู้คืนกลับมาได้!",
				icon: 'warning',
				showCancelButton: true,
				confirmButtonColor: '#3085d6',
				cancelButtonColor: '#d33',
				confirmButtonText: 'Yes!'
			}).then((result) => {
				if (result.isConfirmed) {
				window.location.href = "/machine/pm/template/deletepmdetail/"+unid;
				}

			})
	}
</script>

@stop
{{-- ปิดส่วนjava --}}
