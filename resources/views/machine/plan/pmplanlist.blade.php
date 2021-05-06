@extends('masterlayout.masterlayout')
@section('tittle','homepage')
@section('css')
<meta name="csrf-token" content="{{ csrf_token() }}">

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
							</div>
	          </div>
					</div>
					<div class="py-12">
	        	<div class="container mt-2">
							<div class="row">
								<div class="col-md-12">
									<div class="card ">
										<form action="{{ url('machine/pm/planlist/search') }}" method="post">
											@csrf
											<div class="card-header bg-primary  ">
												<div class="row">
													<div class="col-md-12 col-lg-7 form-inline">
														<h4 class="ml-1 mt-2 " style="color:white;" ><i class="fas fa-clipboard-list fa-lg mr-1">
														</i> ปี
													 </h4>
											<div class="form-group">
												<select class="form-control form-control-sm input-group filled text-info" id="PLAN_YEAR" name="PLAN_YEAR" required>
													@for ($i=2021; $i < date('Y')+3 ; $i++)
														<option value="{{ $i }}"{{ $i == date('Y') ? 'selected' : "" }} >{{$i}}</option>
													@endfor
												</select>
											</div>
														<div class="input-group mx-4">
															<input type="text" id="searchmachine_code" name="searchmachine_code" class="form-control form-control-sm" value="{{ $searchmachine_code != "" ? $searchmachine_code : "" }}">
															<div class="input-group-append">
																<button type="submit" class="btn btn-search pr-1 btn-xs	">
																	<i class="fa fa-search search-icon"></i>
																</button>
															</div>
														</div>
													</div>
													<div class="col-md-12 col-lg-5 my-2">
														@foreach ($machineline as $index => $dataline)
																<button class="btn btn-warning btn-xs mx-1" type="submit" id="MACHINE_LINE"name="MACHINE_LINE" data-line="{{$dataline->LINE_CODE}}" value="{{$dataline->LINE_CODE}}">
																	<span style="font-size:12px"> {{$dataline->LINE_NAME}}</span>
																</button>
														@endforeach

													</div>
												</div>
											</div>
										</form>
											<div id="result"class="card-body">
												<div class="table-responsive">
		                      <table class="display table table-striped table-hover">
		                      	<thead class="thead-light">
		                        	<tr>
		                            <th>Code</th>
		                          	<th>ชื่อเครื่อง</th>
		                          	<th>LINE</th>
																<th>รายการ PM</th>
																<th>Rank</th>
																<th>วันที่ ตรวจเช็ค</th>
		                        	</tr>
		                      	</thead>
		                      	<tbody>
															@foreach ($machinepmplan as $number => $dataset)
																<tr>
																	<td>{{ $dataset->MACHINE_CODE }}</td>
																	<td>{{ $dataset->MACHINE_NAME }}</td>
																	<td>{{ $dataset->MACHINE_LINE }}</td>
																	<td>{{ $dataset->PM_MASTER_NAME }}</td>
																	<td>{{ $dataset->PLAN_RANK }}</td>
																	<td>{{ $dataset->PLAN_DATE }}</td>
																</tr>

															@endforeach

			                      	</tbody>
															{{ $machinepmplan->links() }}
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
@stop
{{-- ปิดส่วนเนื้อหาและส่วนท้า --}}

{{-- ส่วนjava --}}
@section('javascript')
	{{-- <script src="{{ asset('js/ajax/ajax-csrf.js') }}"></script>

<script>
	$(document).on('click','#MACHINE_LINE',function(event){
		event.preventDefault();
		var machineline = $(this).data('line');
		var searchmachine_code = $('#searchmachine_code').val();
		$.ajax({
    	url: '/machine/pm/planlist/search',
    	type: "POST",
    	dataType: 'json',
    	data: {"_token" : "{{ csrf_token() }}",
						"MACHINE_LINE" : machineline,
						"searchmachine_code" : searchmachine_code},
			success: function(data) {
		            $('#machinepmplan').html(data.html);
		          }
		});
	});
</script> --}}
@stop
{{-- ปิดส่วนjava --}}
