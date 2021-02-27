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
											<h4 class="ml-3 mt-2" style="color:white;" ><i class="fas fa-toolbox fa-lg mr-1"></i> เพิ่มสถานะเครื่องจักร </h4>
											<div class="btn-group ml-3" role="group" aria-label="Basic example">
											</div>

										</div>
									</div>
									<div id="result"class="card-body">
										<div class="table-responsive mt--4">
											<table class="table table-bordered table-head-bg-info table-bordered-bd-info mt-4">
										<thead>
											<tr>
												<th scope="col">CODE</th>
												<th scope="col">สถานะ</th>
												<th scope="col">เปิด/ปิด</th>
												<th scope="col"></th>
											</tr>
										</thead>
										<tbody>
											@foreach ($dataset as $key => $dataitem)

											<tr>
												<td>{{$dataitem->STATUS_CODE}}</td>
												<td style="width:200px">	<a href="{{ url('machine/machinestatus/edit/'.$dataitem->UNID) }}">
																													<button class="btn btn-primary btn-block btn-sm my-1 mx--2 ">
																							<span class="btn-label float-left">
																								<i class="fa fa-eye mx-1 "></i>
																								{{ $dataitem->STATUS_NAME }}
																							</span>

																						</button>

																												</a></td>
												<td>{{ $dataitem->STATUS == "9" ? 'เปิด' : 'ปิด' }}</td>
												<td><a href="{{ url('machine/machinestatus/delete/'.$dataitem->UNID) }}">
													<button type="button" class="btn btn-danger btn-block btn-sm my-1" style="width:40px">

														<i class="fas fa-trash fa-lg">	</i>

													</button>
												</a></td>
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
											<h4 class="ml-3 mt-2" style="color:white;" ><i class="fas fa-toolbox fa-lg mr-1"></i> เพิ่มสถานะเครื่องจักร </h4>
										 </div>
										<div class="card-body">
											<form action="{{ route('machinestatus.store') }}" method="POST">
												@csrf
												<div class="form-group has-error">
													<label for="STATUS_CODE">CODE</label>
													<input type="text"  class="form-control" id="STATUS_CODE" name="STATUS_CODE" placeholder="CODE" required autofocus>
													@error ('STATUS_CODE')



														<span class="text-danger"> {{ $message }}</span>
													@enderror
												</div>
												<div class="form-group has-error">
													<label for="STATUS_NAME">สถานะ</label>
													<input type="text"  class="form-control" id="STATUS_NAME" name="STATUS_NAME" placeholder="สถานะ" required autofocus>
													@error ('STATUS_NAME')
														<span class="text-danger"> {{ $message }}</span>
													@enderror
												</div>
												<div class="form-check has-error">
													<label for="STATUS">เปิด/ปิด</label><br>


																									<label class="form-radio-label">
																										<input class="form-radio-input" type="radio" name="STATUS" value="9" checked="">
																										<span class="form-radio-sign">เปิด</span>
																									</label>
																									<label class="form-radio-label ml-3">
																									<input class="form-radio-input" type="radio" name="STATUS" value="1">
																									<span class="form-radio-sign">ปิด</span>
																								</label>

												</div>



												<button tpye="submit" class="btn btn-primary">Save</button>
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