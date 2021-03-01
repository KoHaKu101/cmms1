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
								<a href="{{ url('users/export/') }}">
								<button class="btn btn-primary  btn-xs">
									<span class="fas fa-file-export fa-lg">	Export	</span>
								</button>
								</a>
								<button class="btn btn-primary  btn-xs">
									<span class="fas fa-print fa-lg">	Print	</span>
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
                  	<div class="alert alert-success alert-dismissible fade show" role="alert">
  											<strong>{{ session('success') }}</strong>
  											<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    										<span aria-hidden="true">&times;</span>
  											</button>
										</div>
									@endif
									<div class="card-header bg-primary form-inline ">
											<h4 class="ml-3 mt-2 " style="color:white;" ><i class="fas fa-wrench fa-lg mr-1"></i> รายการตรวจเช็คเครื่องจักร </h4>
												<div class="input-group ml-4">
													<input type="text" id="search_text"  name="search_text"onkeyup="myFunction()" class="form-control form-control-sm">
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


                            <th scope="col">Code</th>
                          	<th scope="col">ชื่อเครื่อง</th>
                          	<th scope="col">LINE</th>
														<th scope="col">รายการอะไหล่</th>
														<th scope="col">เช็คประจำเดือน</th>
														<th scope="col">วันที่เช็คล่าสุด</th>

                        	</tr>
                      	</thead>

                      	<tbody >
                          {{-- @php($i = 1) --}}
													@foreach ($data_set as $key => $row)

                        		<tr>

															<td width="13%">
																<a href="{{ url('machine/partcheck/edit/'.$row->UNID) }}" class="btn btn-secondary btn-sm btn-block my-1 mx--3" style="height:30px">
																	<span class="float-left">
																		<i class="fas fa-eye fa-lg mx-1"></i>{{ $row->MACHINE_CODE }}
																	</span>
																</a>
															</td>

															<td style="white-space:nowrap" class="born">              {{ $row->MACHINE_NAME }}  </td>
															<td style="white-space:nowrap">  						 {{ $row->MACHINE_LINE }}     </td>
															<td style="white-space:nowrap">  						 {{ $row->MACHINE_LINE }}     </td>
															<td>  01/03/2021</td>
															<td> 01/03/2021 </td>
                        			</tr>
                        	@endforeach



                      	</tbody>
                    </table>



									</div>

										</div>
										{{ $data_set->links() }}

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
{{-- <script>
$(document).ready(function(){
	var table = $('datatable').DataTable({
			'processing' : true,
			'serverSide' : true,
			'ajax': "{{ route('machine.list') }}",
			'column':[
				{'data': 'MACHINE_LOCATION'},
				{'data': 'MACHINE_NAME'},
				{'data': 'MACHINE_CODE'}
			],
	});

  $("#myInput").keyup (function() {
		table.column($)
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script> --}}


@stop
{{-- ปิดส่วนjava --}}
