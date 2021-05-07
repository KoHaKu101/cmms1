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
										<form action="{{ url('machine/pm/planlist') }}" method="post" id="FRM_PLANLIST" name="FRM_PLANLSIT"	>
											{{-- @method('post') --}}
											@csrf
											<div class="card-header bg-primary  ">
												<div class="row">
													<div class="col-md-12 col-lg-12 form-inline">
														<h4 class="ml-1 mt-2 " style="color:white;" ><i class="fas fa-clipboard-list fa-lg mr-1">
														</i> ปี
													 </h4>
													 <div class="form-group">
														 <select class="form-control form-control-sm input-group filled text-info" id="PLAN_YEAR" name="PLAN_YEAR" required>
															 @for ($i=2021; $i < date('Y')+3 ; $i++)
															<option value="{{ $i }}"{{ $PLAN_YEAR == $i ? 'selected' : "" }} >{{$i}}</option>
														@endfor
													</select>
												</div>
												<div class="form-group">
													<div class="selectgroup w-100 ">
														<label class="selectgroup-item colorinput mr-1">
															<input type="radio" id="MACHINE_LINE" name="MACHINE_LINE" value="" class="selectgroup-input" {{ isset($MACHINE_LINE) ? '' : "checked" }} >
															<span class="selectgroup-button selectgroup-button-icon bg-white {{ $MACHINE_LINE != ""  ? '' : "bg-warning" }} text-info" >All</span>
														</label>
														@foreach ($machineline as $index => $dataline)
															<label class="selectgroup-item mr-1">
																<input type="radio" id="MACHINE_LINE" name="MACHINE_LINE" value="{{$dataline->LINE_CODE}}"  class="selectgroup-input" {{ $MACHINE_LINE == $dataline->LINE_CODE ? 'checked' : "" }}>
																<span class="selectgroup-button  bg-white {{ $MACHINE_LINE == $dataline->LINE_CODE ? 'bg-warning' : "" }} text-info" >{{$dataline->LINE_CODE}}</span>
															</label>
														@endforeach
													</div>
												</div>
											<div class="input-group mx-4">
															<input type="text" id="MACHINE_CODE" name="MACHINE_CODE" class="form-control form-control-sm" value="{{ isset($MACHINE_CODE) ? $MACHINE_CODE : "" }}">
															<div class="input-group-append">
																<button type="submit" class="btn btn-search pr-1 btn-xs	">
																	<i class="fa fa-search search-icon"></i>
																</button>
															</div>
														</div>
													</div>


												</div>
											</div>
										</form>
												@livewire('pmlist',['MACHINE_CODE'=>$MACHINE_CODE,'MACHINE_LINE'=>$MACHINE_LINE,'PLAN_YEAR'=>$PLAN_YEAR])
												{{-- <div class="row">
													@foreach ($machinepmplan as $number => $dataset)
														<div class="col-sm-6 col-md-3">
																	<div class="card card-stats card-round">
																		<div class="card-body ">
																			<div class="row align-items-center">
																				<div class="col-icon">
																					<div class="icon-big text-center {{$dataset->classtext}} bubble-shadow-small" >
																						<i class="flaticon-stopwatch"></i>
																					</div>
																				</div>
																				<div class="col col-stats ml-3 ml-sm-0">
																					<div class="numbers">
																						<p class="card-title">{{$dataset->MACHINE_CODE}} </p>
																						<h4 class="card-category">{{ $dataset->PLAN_DATE }}</h4>
																					</div>
																				</div>
																			</div>
																		</div>
																	</div>
																</div>
													@endforeach
													{{ $machinepmplan->links() }}
													</div> --}}
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
	<script src="{{ asset('js/ajax/ajax-csrf.js') }}"></script>

<script>
	$( document ).ready(function() {

	$(".selectgroup-button").click(function(){
					$('.bg-white').removeClass('bg-warning');
					$(this).addClass("bg-warning");
				});
	 $("input[type='radio']").click(function(e){
		 event.preventDefault();
		 $("button[type='submit']").trigger("click");
		 // $("#FRM_PLANLSIT").submit(); // Submit the form
 });
});
</script>
@stop
{{-- ปิดส่วนjava --}}
