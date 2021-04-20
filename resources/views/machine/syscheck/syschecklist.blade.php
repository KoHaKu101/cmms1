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
	  											<button type="button" class="close" data-dismiss="alert" aria-label="Close">	<span aria-hidden="true">&times;</span>	</button>
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
		                            <th >Code</th>
		                          	<th >ชื่อเครื่อง</th>
		                          	<th >LINE</th>
																<th >รายการ PM</th>

																<th >สถานะ</th>
																<th>	</th>
		                        	</tr>
		                      	</thead>
		                      	<tbody>
															@foreach ($machine as $key => $dataset)
																@foreach ($pmlist->where('MACHINE_CODE',$dataset->MACHINE_CODE)->where('PM_NEXT_DATE','<=',\Carbon\Carbon::now()->addDay($alert->AUTOMAIL)) as $datasubitem)
																<tr>
																	<td>{{ $dataset->MACHINE_CODE }}</td>
																	<td>{{ $dataset->MACHINE_NAME}}</td>
																	<td>{{ $dataset->MACHINE_LINE}}</td>
																	<td>{{ $datasubitem->PM_TEMPLATELIST_NAME}}</td>
																	<td> {{ \Carbon\Carbon::now()->diffInDays(\Carbon\Carbon::parse($datasubitem->PM_NEXT_DATE),false) > '0' ? 'อีก'.\Carbon\Carbon::now()->diffInDays(\Carbon\Carbon::parse($datasubitem->PM_NEXT_DATE)).'วันถึงกำหนดการ'
																					:'ถึงกำหนดการแล้ว'.\Carbon\Carbon::now()->diffInDays(\Carbon\Carbon::parse($datasubitem->PM_NEXT_DATE)).'วัน' }}</td>
																	<td><a href="{{ url('machine/system/check/'.$dataset->UNID.'/'.$datasubitem->UNID) }}" type="button" class="btn btn-primary btn-block btn-sm my-1">ตรวจสอบระบบ</a></td>
																</tr>
															@endforeach

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
@stop
{{-- ปิดส่วนเนื้อหาและส่วนท้า --}}

{{-- ส่วนjava --}}
@section('javascript')

@stop
{{-- ปิดส่วนjava --}}
