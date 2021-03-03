@extends('masterlayout.masterlayout')
@section('meta')
{{-- <meta name="csrf-token" content="{{ csrf_token() }}"> --}}
<meta name="_token" content="{{ csrf_token() }}">
@endsection
@section('tittle','homepage')
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
				<!--ส่วนปุ่มด้านบน-->
				<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
					<div class="container">
						<div class="row">
							<div class="col-md-1">
								<a href="{{ url('machine/repair/repairlist') }}">
									<button class="btn btn-warning  btn-xs ">
										<span class="fas fa-arrow-left fa-lg">Back </span>
									</button>
								</a>
							</div>
						</div>
					</div>
				</div>
				<!--ส่วนกรอกข้อมูล-->
				<div class="py-12">
	        <div class="container mt-2">
						<div class="card">
							<div class="card-header">
							<div class="row justify-content-md-center">
								<div class="col-md-6 col-lg-5 ">
									<h3 class="ml-5">กรอกรหัสเครื่อง / แสกนQR Code</h3>

									<input type="text" class="form-control" id="search" name="search" placeholder="กรอกรหัสเครื่อง / แสกนQR Code ที่นี้"></input>
									{{-- <button type="submit" class="btn btn-primary btn-sm">search</button> --}}
									
								</div>
							</div>
							</div>
							<div class="card-body">
								<div class="row">

									<div class="col-md-6 col-lg-3" id='data'>
									</div>
								</div>
							</div>
					</div>
				</div>
				</div>
			</div>

	</div>

	{{-- <table class="table table-bordered table-hover">
		<thead>
			<tr>
				<th>ID</th>
				<th>Product Name</th>
				<th>Description</th>
				<th>Price</th>
			</tr>
		</thead>
		<tbody >

		</tbody>
	</table> --}}


{{-- @include('masterlayout\tab\modal\scanqrcode') --}}





@stop
{{-- ปิดส่วนเนื้อหาและส่วนท้า --}}

{{-- ส่วนjava --}}
@section('javascript')
	<script type="text/javascript" src="{{ asset('/js/java.js') }}">

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
