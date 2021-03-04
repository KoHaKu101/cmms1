@extends('masterlayout.masterlayout')
@section('tittle','แจ้งซ่อม')
@section('meta')
<meta name="_token" content="{{ csrf_token() }}">
@endsection
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
								<a href="{{ route('dashboard') }}">
								<button class="btn btn-warning  btn-xs ">
									<span class="fas fa-arrow-left fa-lg">Back </span>
								</button>
								</button></a>
								<a href="{{ route('repair.repairsearch') }}"><button class="btn btn-primary  btn-xs">
									<span class="fas fa-file fa-lg">	New	</span>
								</button></a>
								<a href="{{ url('users/export/') }}">
								<button class="btn btn-primary  btn-xs">
									<span class="fas fa-file-export fa-lg">	Export	</span>
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
											<h4 class="ml-3 mt-2 " style="color:white;" ><i class="fas fa-toolbox fa-lg mr-1"></i> แจ้งซ่อม </h4>
												<div class="input-group ml-4">
													<input type="text" id="serach"  name="serach" class="form-control form-control-sm">
													<div class="input-group-prepend">
														<button type="submit" class="btn btn-search pr-1 btn-xs	">
															<i class="fa fa-search search-icon"></i>
														</button>
													</div>
												</div>
									</div>
									<div id="result"class="card-body">
										<div class="table-responsive">
                      <table class="display table table-striped table-hover">
                      	<thead class="thead-light">
                        	<tr>
                            <th scope="col">เลขที่เอกสาร</th>
                          	<th scope="col">รหัสเครื่อง</th>
                          	<th scope="col">ชื่อเครื่องจักร</th>
														<th scope="col">Line</th>
														<th scope="col">วันที่เอกสาร</th>
														<th scope="col">สถานะ</th>
														<th scope="col" style=""></th>
                        	</tr>
                      	</thead>

                      	<tbody >
													@foreach ($dataset as $key => $row)
                        		<tr>
															<td style="width:200px">
																<a href="{{ route('repair.edit',[$row->UNID]) }}" class="btn btn-secondary btn-block btn-sm my-1 " style="width:180px;height:30px">
																	<span class="btn-label float-left">
																		<i class="fas fa-eye mx-1"></i>{{ $row->MACHINE_DOCNO }}
																	</span>
																</a>
															</td>
															<td >  				{{ $row->MACHINE_CODE }}		     </td>
															<td >  				{{ $row->MACHINE_NAME }}		    </td>
															<td >  				{{ $row->MACHINE_LOCATION }}	    </td>
															<td >      		{{ $row->MACHINE_TIME }}          </td>
															<td >  				{{ $row->MACHINE_TYPE == 'STOP' ? 'เครื่องหยุดทำงาน' : 'เครื่องทำงาน'}}	    </td>
															<td >
																<a href="{{ url('machine/assets/delete/'.$row->UNID) }}" class="ml-3">
																	<span style="color: Tomato;">
																		<i class="fas fa-trash fa-lg ml-2">	</i>
																	</span>
																</a>
															</td>
                        			</tr>
                        	@endforeach
                      	</tbody>
                    </table>
										<input type="hidden" name="hidden_page" id="hidden_page" value="1" />
										    <input type="hidden" name="hidden_column_name" id="hidden_column_name" value="id" />
										    <input type="hidden" name="hidden_sort_type" id="hidden_sort_type" value="asc" />
									</div>
										</div>
								</div>
								{!! $dataset->links() !!}
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
	<script type="text/javascript" src="{{ asset('/js/serach/serachrepair.js') }}">

	</script>
	<script type="text/javascript">
	$.ajaxSetup({
	headers: {
		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	}
	});
	</script>


@stop
{{-- ปิดส่วนjava --}}
