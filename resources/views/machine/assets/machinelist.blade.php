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
								<button class="btn btn-primary  btn-xs ">
									<span class="fas fa-arrow-left fa-lg">Back </span>
								</button>
								<a href="{{ route('machine.form') }}"><button class="btn btn-primary  btn-xs">
									<span class="fas fa-file-medical fa-lg">	New	</span>
								</button></a>
								<button class="btn btn-primary  btn-xs">
									<span class="fas fa-file-import fa-lg">	Import	</span>
								</button>
								<button class="btn btn-primary  btn-xs">
									<span class="fas fa-file-export fa-lg">	Export	</span>
								</button>
								<a href="{{ url('users/export/') }}">
								<button class="btn btn-primary  btn-xs">
									<span class="fas fa-print fa-lg">	Print	</span>
								</button>
							</a>
								<button class="btn btn-primary  btn-xs">
									<span class="fas fa-qrcode fa-lg">	Print Asset Tags	</span>
								</button>


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
                  	<div class="alert alert-warning alert-dismissible fade show" role="alert">
  											<strong>{{ session('success') }}</strong>
  											<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    										<span aria-hidden="true">&times;</span>
  											</button>
										</div>
									@endif
									<div class="card-header">
										<div class="form-inline bg-primary"><h4 class="ml-4"> Assets </h4>

											<div class="btn-group ml-3" role="group" aria-label="Basic example">
  											<button type="button" class="btn btn-info btn-sm"><i class="fas fa-sitemap"></i></button>
  											<button type="button" class="btn btn-info btn-sm"><i class="fas fa-list"></i></button>
											</div>

											<form action="{{ url('/search')}} " method="get">

												<div class="input-group">
	  											<input type="search" name="search" class="form-control" >
													<span class="input-group-perpend">
														<button type="submit" class="btn btn-primary">search</button>
													</span>
												</div>

											</form>
										</div>
									</div>
									<div class="card-body">
										<div class="table-responsive">
                      <table id="basic-datatables" class="display table table-striped table-hover">
                      	<thead class="thead-light">
                        	<tr>
														<th scope="col ">แก้ไข</th>
                            <th scope="col">location</th>
                          	<th scope="col">name</th>
                          	<th scope="col">Code</th>
                          	<th scope="col">Asset Status</th>
														<th scope="col">Last Price Currency</th>

                        	</tr>
                      	</thead>

                      	<tbody>
                          {{-- @php($i = 1) --}}
													@foreach ($data_set as $key => $row)

                        		<tr>

															<td>
																<a href="{{ url('machine/assets/edit/'.$row->UNID) }}">
																	<i class="fas fa-edit fa-lg"></i>
																</a>
																<a href="{{ url('machine/assets/delete/'.$row->UNID) }}">

																	<span class="fas fa-trash fa-lg ml-2">	</span>

																</a>
															</td>
															<td scope="row" style="white-space:nowrap" class="name">  {{ $row->MACHINE_LOCATION }}  </td>
															<td style="white-space:nowrap" class="born">              {{ $row->MACHINE_NAME }}  </td>
															<td style="white-space:nowrap">  						 {{ $row->MACHINE_CODE }}   </td>
															<td style="white-space:nowrap">  						 {{ $row->MACHINE_CHECK }}   </td>
															<td style="white-space:nowrap">  						 {{ $row->MACHINE_RVE_DATE }}     </td>
                        			</tr>
                        	@endforeach



                      	</tbody>
                    </table>
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
{{-- <script src="{{ asset('asset/js/scripts.min.js') }}"></script> --}}


@stop
{{-- ปิดส่วนjava --}}
