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
				<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
          <div class="container">
						<div class="row">
							<div class="col-md-12 gx-4">
									<a href="{{ url('machine/pm/template/list/'.$datapmtemplate->UNID) }}">
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
									@endif
									<form action="{{ route('pmtemplate.storelist') }}" method="post" enctype="multipart/form-data">
						        @csrf
										<div class="card-header bg-primary">
											<h4 class="ml-3 mt-2" style="color:white;" > ประเภทรายการ {{ $datapmtemplate->PM_TEMPLATE_NAME }} : รายการ
											</h4>
										 </div>
										<div class="card-body">
										 	<div class="row">
											 	<div class="col-md-6 col-lg-3 has-error">
												 	<label> Inspection Item</label>
													<input type="hidden" class="form-control" name="PM_TEMPLATE_UNID_REF" value="{{ $datapmtemplate->UNID }}"  >
												 	<input type="text" class="form-control" name="PM_TEMPLATELIST_NAME" >
											 	</div>
												<div class="col-md-6 col-lg-2 has-error">
													<label> ระยะเวลา</label>
													<div class="input-group">
														<input type="text" class="form-control" name="PM_TEMPLATELIST_DAY" >
														<div class="input-group-append">
															<span class="input-group-text">เดือน</span>
														</div>
													</div>
												</div>
										 	</div>
											<div class="row">
												<div class="col-md-6 col-lg-9">
											</div>
											<div class="col-md-6 col-lg-1">
												<button class="btn btn-primary btn-sm" >
													<i class="fas fa-save" style="color:white;font-size:15px" name="save" value="save"> Save</i>
												</button>
											</div>
											<div class="col-md-6 col-lg-1">
												<button class="btn btn-primary btn-sm " name="save" value="new">
													<i class="fas fa-save" style="color:white;font-size:15px"> Save and New</i>
												</button>
											</div>
										</div>
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
