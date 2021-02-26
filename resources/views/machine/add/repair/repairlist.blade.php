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
								<a href="{{ route('dashboard') }}">
								<button class="btn btn-primary  btn-xs ">
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
							<div class="col-md-8">
								<div class="card ">
                	@if(session('success'))
                  	<div class="alert alert-success alert-dismissible fade show" role="alert">
  											<strong>{{ session('success') }}</strong>
  											<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    										<span aria-hidden="true">&times;</span>
  											</button>
										</div>
									@endif
									<div class="">
										<div class="form-inline bg-primary ">
											<h4 class="ml-3 mt-2" style="color:white;" ><i class="fas fa-toolbox fa-lg mr-1"></i> เพิ่มรายละเอียดการแจ้งซ่อม </h4>
											<div class="btn-group ml-3" role="group" aria-label="Basic example">
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
									<div id="result"class="card-body">
										<div class="table-responsive">
                      <table class="display table table-striped table-hover">
                      	<thead class="thead-light">
                        	<tr>
														<th style=""></th>
                            <th scope="col"></th>
                          	<th scope="col">รายการชนิดแจ้งซ่อม</th>
                          	<th scope="col">วันที่เพิ่ม</th>
                          	<th scope="col"></th>
                        	</tr>
                      	</thead>

                      	<tbody >
                          {{-- @php($i = 1) --}}
													@foreach ($dataset as $key => $dataitem)
                        		<tr>
															<td scope="row" style="width:25px"> {{$dataitem->REPAIR_CODE}}  </td>
															<td style="width:100px">
																<a href="{{ url('machine/table/edit/'.$dataitem->UNID) }}">
																	<button type="button" class="btn btn-secondary btn-sm my-1 mx-2" style="height:30px;width:100px">
																		{{-- <span style="color: yellow;"> --}}
																			<i class="fas fa-eye fa-lg float-left"></i>
																		{{-- </span> --}}
																	</button>
																</a>
															</td>
															<td style="width:200px">{{$dataitem->REPAIR_NAME}}</td>
															<td style="width:200px">{{$dataitem->CREATE_TIME}}</td>
															<td style="white-space:nowrap">
																<a href="{{ url('machine/table/delete/'.$dataitem->UNID) }}">
																	<button type="button" class="btn btn-danger btn-sm my-1" style="width:40px">

																		<i class="fas fa-trash fa-lg">	</i>

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
								<div class="col-md-4">
									<div class="card">
										<div class="card-header bg-primary">
											<h4 class="ml-3 mt-2" style="color:white;" ><i class="fas fa-toolbox fa-lg mr-1"></i> เพิ่มรายการ </h4>
										 </div>
										<div class="card-body">
											<form action="{{ route('tablerepair.store') }}" method="POST">
												@csrf
												<div class="form-group has-error">
													<label for="REPAIR_CODE">ลำดับรายการ</label>
													<input type="text"  class="form-control" id="REPAIR_CODE" name="REPAIR_CODE" placeholder="ลำดับรายการ" required autofocus>
													@error ('REPAIR_CODE')
														<span class="text-danger"> {{ $message }}</span>
													@enderror
												</div>
												<div class="form-group has-error">
													<label for="REPAIR_NAME">ประเภทอาการ</label>
													<input type="text"  class="form-control" id="REPAIR_NAME" name="REPAIR_NAME" placeholder="ประเภทอาการ" required autofocus>
													@error ('REPAIR_NAME')
														<span class="text-danger"> {{ $message }}</span>
													@enderror
												</div>
												<div class="form-group">
													<label for="REPAIR_NOTE">รายละเอียดเพิ่มเติม</label>
													<textarea class="form-control" id="REPAIR_NOTE" name="REPAIR_NOTE" rows="4" placeholder="สามารถกรอกรายละเอียดเพิ่มเติมได้"></textarea>
												</div>


												<button tpye="submit" class="btn btn-success">Submit</button>
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
