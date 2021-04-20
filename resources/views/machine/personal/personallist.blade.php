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
								<a href="{{ url('/machine/dashboard/dashboard') }}">
									<button class="btn btn-warning  btn-xs ">
										<span class="fas fa-arrow-left fa-lg">Back </span>
									</button>
								</a>
								<a href="{{ route('personal.form') }}"><button class="btn btn-primary  btn-xs">
									<span class="fas fa-file fa-lg">	New	</span>
								</button></a>
								<a href="{{ url('users/export/') }}">
								<button class="btn btn-primary  btn-xs">
									<span class="fas fa-file-export fa-lg">	Export	</span>
								</button>
								</a>
								<a href="{{url('machine/pdf/machinepdf')}}">
								<button class="btn btn-primary  btn-xs">
									<span class="fas fa-print fa-lg">	Print	</span>
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
									<div class="card-header bg-primary form-inline ">
											<h4 class="ml-3 mt-2 " style="color:white;" ><i class="fas fa-cog fa-lg mr-1"></i> พนักงานซ่อมบำรุง </h4>
												<div class="input-group ml-4">
													<input type="text" id="search_text"  name="search_text"onkeyup="myFunction()" class="form-control form-control-sm">
													<div class="input-group-prepend">
														<button type="submit" class="btn btn-search pr-1 btn-xs	">
															<i class="fa fa-search search-icon"></i>
														</button>
													</div>
												</div>
									</div>

									{{-- content --}}
									<div class="container mt-4">
										<div class="row">
											@foreach ($dataset as $key => $dataitem)
												<div class="col-md-6 col-lg-4">
													<div class="card card-post card-round">
														<img class="card-img-top" src="/assets/img/blogpost.jpg" alt="Card image cap">
														<div class="card-body">
															<div class="separator-solid"></div>
																<h3 class="card-title">{{ $dataitem->EMP_NAME }}</h3>
																<h5 >รหัสพนักงาน {{ $dataitem->EMP_CODE }}</h5>
																<h5 >ตำแหน่งงาน </h5>
																<h5 >ประจำ {{ $dataitem->EMP_GROUP }} </h5>
																<a href="{{ url('machine/personal/edit/'.$dataitem->UNID) }}">
																	<span style="color: green;">
																		<i class="fas fa-edit fa-lg">แก้ไขข้อมูล</i>
																	</span>
																</a>
																<a href="{{ url('machine/personal/delete/'.$dataitem->UNID) }}" class="ml-3 float-right">
																	<span style="color: Tomato;">
																		<i class="fas fa-trash fa-lg ml-2">	Delete</i>
																	</span>
																</a>
																<input type="hidden" value="{{ $dataitem->UNID }}">
														</div>

													</div>
												</div>
											@endforeach
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
