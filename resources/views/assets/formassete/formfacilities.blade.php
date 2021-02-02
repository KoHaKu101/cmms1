@extends('masterlayout.masterlayout')
@section('tittle','homepage')
@section('css')
	<style>
		div.a {
			font-size: 50px;
		}
	</style>
@endsection
{{-- ส่วนหัว --}}
@section('Logoandnavbar')

	@include('masterlayout.logomaster')
	@include('masterlayout.navbar.navbarmaster')

@stop
{{-- ปิดท้ายส่วนหัว --}}

{{-- ส่วนเมนู --}}
@section('sidebar')

	@include('masterlayout.sidebar.sidebarmaster')

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
							<button class="btn btn-light btn-border btn-xs ">
								<span class="fas fa-arrow-left fa-lg">Back </span>
							</button>
							<a href="{{ route('Formfactory') }}"><button class="btn btn-light btn-border btn-xs">
								<span class="fas fa-file-medical fa-lg">	Save	</span>
							</button></a>
							<button class="btn btn-light btn-border btn-xs">
								<span class="fas fa-file-import fa-lg">	Save and Create Anoter	</span>
							</button>
							<button class="btn btn-light btn-border btn-xs">
								<span class="fas fa-print fa-lg">	Print	</span>
							</button>
						</div>
					</div>
				</div>
			</div>
			<div class="py-12">
			<div class="container mt-2">
				<div class="row	">
					<div class="col-md-12">
						<div class="card full-height">
							<div class="card-body">
								<div class="card-title">Overall statistics</div>


						</div>
						<div class="card-footer">
							<ul class="nav nav-tabs">


  <li class="nav-item">
    <a class="nav-link active a" aria-current="page" href="#">General</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#">Parts/BOM</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#">Metering/Events</a>
  </li>
  <li class="nav-item">
    <a class="nav-link " href="#" >Personnel</a>
  </li>
	<li class="nav-item">
    <a class="nav-link " href="#" >Files</a>
  </li>
	<li class="nav-item">
    <a class="nav-link " href="#" >Custom</a>
  </li>
	<li class="nav-item">
    <a class="nav-link " href="#" >Log</a>
  </li>
</ul>
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
