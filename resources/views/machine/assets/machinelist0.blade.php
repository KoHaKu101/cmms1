@extends('masterlayout.masterlayout')
@section('tittle','Machine')
@section('meta')
<meta name="csrf-token" content="{{ csrf_token() }}">

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
													<input type="text" id="serach"  name="serach" class="form-control form-control-sm">
													<div class="input-group-prepend">
														<button type="button" class="btn btn-search pr-1 btn-xs	">
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

													@include('machine/assets/machinesearch')
                      	</tbody>
                    </table>
										<input type="hidden" name="hidden_page" id="hidden_page" value="1" />
										<input type="hidden" name="hidden_column_name" id="hidden_column_name" value="id" />
										<input type="hidden" name="hidden_sort_type" id="hidden_sort_type" value="asc" />
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
	<script type="text/javascript" src="{{ asset('/js/serach/serachmachine.js') }}">

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
