@extends('masterlayout.masterlayout')
@section('tittle','homepage')
@section('css')
	<link href={{ asset('/assets/fullcalendar/main.css') }} rel='stylesheet' />

{{-- <link rel="stylesheet" href="{{ asset('assets/icofont/icofont.min.css') }}"> --}}
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
			<div class="panel-header bg-gradient">
				<div class="page-inner py-4 my-4">
					<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
						<div class="col-md-8 ml-auto mr-auto">
							<div class="form-group form-inline">
								<label>แผน PM ล่วงหน้า</label>
								<select class="form-control mx-2">
									<option> โปรดระบุระยะเวลา </option>

									@while ($year <= $planyear)
										<option> {{\Carbon\Carbon::now()->addYears($year++)->format('Y')}} </option>
									@endwhile
								</select>
								<button type="button" class="btn btn-primary btn-sm " id="reportpm" name="reportpm"><i class="icon-printer" style="font-size:16px"> Report </i></button>
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
<script>
	$(document).on('click','#reportpm',function(){
		alert('1');
		window.open('/machine/pdf/plan/planpm','PdfPlanPm','width=1000,height=1000,resizable=yes,top=100,left=100,menubar=yes,toolbar=yes,scroll=yes');
	});
</script>

@stop
{{-- ปิดส่วนjava --}}
