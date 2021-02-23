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
				{{-- button header --}}
				<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
          <div class="container">
						<div class="row">
							<div class="col-md-12 gx-4">
								<a href="{{ route('dashboard') }}">
									<button class="btn btn-primary  btn-xs ">
										<span class="fas fa-arrow-left fa-lg">Back </span>
									</button>
								</a>
								<a href="{{ route('sparepart.form') }}"><button class="btn btn-primary  btn-xs">
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
				{{-- End button header --}}
				{{-- content --}}
				<div class="py-12">
	        <div class="container mt-2">
						<div class="row">
							<div class="col-md-12">
								{{-- Card --}}
								<div class="card ">
                	@if(session('success'))
                  	<div class="alert alert-success alert-dismissible fade show" role="alert">
  											<strong>{{ session('success') }}</strong>
  											<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    										<span aria-hidden="true">&times;</span>
  											</button>
										</div>
									@endif
									{{-- header --}}
									<div class="card-header">
										<div class="form-inline bg-primary ">
											<h4 class="ml-3 mt-2" style="color:white;" ><i class="fas fa-fas fa-cogs fa-lg mr-1"></i> รายการสังซื้อSparePart</h4>
											<div class="btn-group ml-3" role="group" aria-label="Basic example">
  											<button type="button" class="btn btn-info btn-sm"><i class="fas fa-sitemap"></i></button>
  											<button type="button" class="btn btn-info btn-sm"><i class="fas fa-list"></i></button>
											</div>
											<div class="form-group form-inline ">
												<div class="input-group ml-4">
													<input type="text" id="search_text"  name="search_text"onkeyup="myFunction()" class="form-control form-control-sm">
													<div class="input-group-prepend">
														<button type="submit" class="btn btn-search pr-1 btn-xs	">
	              							<i class="fa fa-search search-icon"></i>
	            							</button>
													</div>
												</div>
											</div>
										</div>
									</div>
									{{-- END header --}}
									{{-- body --}}
									<div id="result"class="card-body">
										{{-- table --}}
										<div class="table-responsive">
                      <table class="display table table-striped table-hover">
                      	<thead class="thead-light">
                        	<tr>
														<th scope="col" style="" width="10%"></th>
                            <th scope="col">รหัสอะไหล่</th>
                          	<th scope="col">ชื่ออะไหล่</th>
                          	<th scope="col">จำนวน</th>
                          	<th scope="col">หน่วย</th>
														<th scope="col">ราคา</th>
                        	</tr>
                      	</thead>
                      	<tbody >
                          {{-- @php($i = 1) --}}
													{{-- @foreach ($data_set as $key => $row) --}}
                        		<tr>
															<td style="white-space:nowrap">
																<a href="{{ url('machine/sparepart/edit/') }}">
																	<span style="color: #1C7BFD;">
																		<i class="fas fa-eye fa-lg"></i>
																	</span>
																 </a>
																<a href="{{ url('machine/sparepart/delete/') }}" class="ml-3">
																	<span style="color: Tomato;">
																		<i class="fas fa-trash fa-lg ml-2">	</i>
																	</span>
																 </a>
															  </td>
															<td scope="row" style="white-space:nowrap" class="name">  RE6402-0023  </td>
															<td style="white-space:nowrap" class="born">      สายพาน          </td>
															<td style="white-space:nowrap">  				10		     </td>
															<td style="white-space:nowrap">  				สาย		    </td>
															<td style="white-space:nowrap">  				10,000	    </td>
                        		</tr>
                        	{{-- @endforeach --}}
                      	</tbody>
                    	</table>
										</div>
										{{-- End table --}}
									</div>
									{{-- END body --}}

										{{-- {{ $data_set->links('pagination.default',['paginator' => $data_set,
					 				'link_limit' => $data_set->perPage()]) }} --}}
								</div>
								{{-- End Card --}}
								</div>
              </div>
						</div>
					</div>
				{{-- End content --}}
  			</div>
			</div>
		</div>

@stop
{{-- ปิดส่วนเนื้อหาและส่วนท้า --}}

{{-- ส่วนjava --}}
@section('javascript')

@stop
{{-- ปิดส่วนjava --}}
