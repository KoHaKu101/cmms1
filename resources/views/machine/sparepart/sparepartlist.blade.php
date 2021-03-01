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
									<button class="btn btn-warning  btn-xs ">
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
									<div class="card-header bg-primary form-inline ">
											<h4 class="ml-3 mt-2 " style="color:white;" ><i class="fas fa-cogs fa-lg mr-1"></i> รายการสังซื้อ SparePart </h4>
												<div class="input-group ml-4">
													<input type="text" id="search_text"  name="search_text"onkeyup="myFunction()" class="form-control form-control-sm">
													<div class="input-group-prepend">
														<button type="submit" class="btn btn-search pr-1 btn-xs	">
															<i class="fa fa-search search-icon"></i>
														</button>
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

                            <th >รหัสอะไหล่</th>
                          	<th >ชื่ออะไหล่</th>
                          	<th >จำนวน</th>
                          	<th >หน่วย</th>
														<th >ราคา</th>
														<th ></th>
                        	</tr>
                      	</thead>
                      	<tbody >
                          {{-- @php($i = 1) --}}
													{{-- @foreach ($data_set as $key => $row) --}}
                        		<tr>
															<td style="width:200px">
																<a href="{{ url('machine/sparepart/edit/') }}" class="btn btn-secondary btn-sm btn-block my-1" style="width:200px;height:30px">
																	<span class="float-left">
																		<i class="fas fa-eye fa-lg mx-1"></i>RE6402-0023
																	</span>
																 </a>

															  </td>

															<td >      สายพาน          </td>
															<td >  				10		     </td>
															<td >  				สาย		    </td>
															<td >  				10,000 บาท	    </td>
															<td>
																<a href="{{ url('machine/sparepart/delete/') }}" class="btn btn-danger btn-sm btn-block my-1" style="width:60px;height:30px">
																	<span class="float-left">
																		<i class="fas fa-trash fa-lg ml-2" >	</i>
																	</span>
																 </a>
															 										</td>
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
