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
								<a href="{{ route('machine') }}">
									<button class="btn btn-warning  btn-xs ">
										<span class="fas fa-arrow-left fa-lg">Back </span>
									</button>
								</a>
								<a href="{{ route('machine.form') }}"><button class="btn btn-primary  btn-xs">
									<span class="fas fa-file fa-lg">	New	</span>
								</button></a>
								<a href="{{ url('users/import/show') }}">
								<button class="btn btn-primary  btn-xs">
									<span class="fas fa-file-import fa-lg">	Import	</span>
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
											<h4 class="ml-3 mt-2 " style="color:white;" ><i class="fas fa-wrench fa-lg mr-1"></i> เครื่องจักร </h4>
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
														<th >ลำดับ</th>
														<th ></th>
                            <th scope="col">LINE</th>
                          	<th scope="col">Name</th>

                          	<th scope="col">Asset Status</th>
														<th scope="col">วันที่เริ่มใช้งาน</th>
														<th></th>
                        	</tr>
                      	</thead>

                      	<tbody >
                          {{-- @php($i = 1) --}}
													@foreach ($dataset as $key => $row)


                        		<tr class="mt-4">
															<td style="width:25px">
																<center>{{ $key+1 }}</center>
															</td>
																<td style="width:170px;">
																<a href="{{ url('machine/assets/edit/'.$row->UNID) }}">
																	<button type="button" class="btn btn-secondary btn-sm btn-block my-1" style="width:130px">
																		<span class="float-left">
																			<i class="fas fa-eye fa-lg  mx-1 mt-1"></i>{{ $row->MACHINE_CODE }}
																		</span>
																	</button>
																</a>
															</td>
															<td >  {{ $row->MACHINE_LINE }}  </td>
															<td >              {{ $row->MACHINE_NAME }}  </td>

															<td style="white-space:nowrap">  	{{ $row->MACHINE_CHECK == '2' ? 'เครื่องทำงาน' : 'หยุดทำงาน'}}		</td>
															<td style="white-space:nowrap">  						 {{ $row->MACHINE_RVE_DATE }}     </td>
															<td style="width:100px;">
																<a onclick="return confirm('ต้องการจำหน่ายเครื่อง {{ $row->MACHINE_CODE }} หรือมั้ย?')" href="{{ url('machine/assets/delete/'.$row->UNID) }}" >
																	<button type="button" class="btn   btn-block btn-danger btn-sm my-1" style="width:150px">
																		<i class="fab fa-btc fa-lg mx-1">	</i> จำหน่ายเครื่องจักร

																	</button>
																</a></td>
                        			</tr>
                        	@endforeach
                      	</tbody>
                    </table>
									</div>

										</div>
										{{ $dataset->links() }}

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
