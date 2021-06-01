@extends('masterlayout.masterlayout')
@section('meta')
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('tittle','แจ้งซ่อม')
@section('css')
		<link href="{{asset('assets/css/select2.min.css')}}" rel="stylesheet">
		<link href="{{ asset('assets/css/_wizard.scss') }}" >

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
	<style>
	.select2 select2-container select2-container--default select2-container--above select2-container--open{
		width: 200px
	}
	/* .btn-flame {
    background: #f5bdca!important;
    border-color: #ff0000!important;
} */
	</style>
	<div class="content">
<div class="page-inner">
	<div class="py-12">
			<div class="container">

				<div class="page-inner">

						<div class="card">
							<div class="col-md-12">
								<div class="card-header text-center bg-primary ">
									<h3 class="card-title text-white"><b>แจ้งซ่อม เครื่อง</b> {{$datamachine->MACHINE_CODE}}</h3>
								</div>
							</div>
								<div class="card-body">
									<div class="row">
										<div class="col-md-8 ml-auto mr-auto" id="tabactive">
											<ul class=" nav nav-pills nav-primary">
												<li class="step">
													<a class="nav-link active repair"  href="#repair"  aria-expanded="true" id="step1"><i class="fa fa-user mr-0"></i> แจ้งอาการ</a>
												</li>
												<li class="step">
													<a class="nav-link empname" href="#empname" id="step2"><i class="fa fa-file mr-2"></i> พนักงาน</a>
												</li>
												<li class="step">
													<a class="nav-link priority" href="#priority" id="step3"><i class="fa fa-file mr-2"></i> ความเร่งด่วน</a>
												</li>
												<li class="step">
													<a class="nav-link summary" href="#summary" id="step4"><i class="fa fa-map-signs mr-2"></i> สรุป</a>
												</li>
											</ul>
										</div>
									</div>
									<div class="tab-content my-4">
										<div class="tab-pane active " id="repair">

											<div class="row">
												@foreach ($dataset as $index => $row)
														<div class="col-sm-6 col-md-3">
															<a  onclick="selectrepair(this)"  data-unid="{{ $row->UNID }}" style="cursor:pointer">
															<div class="card card-stats card-primary card-round">
																<div class="card-body">
																	<div class="row">
																		<div class="col-5">
																			<div class="icon-big text-center">
																				<i class="flaticon-users"></i>
																			</div>
																		</div>
																		<div class="col-7 col-stats">
																			<div class="numbers">
																				<p class="card-category">{{$row->REPAIR_MAINSELECT_NAME}}</p>
																			</div>
																		</div>
																	</div>
																</div>
															</div>
														</a >
														</div>

												@endforeach

											</div>
										</div>
										<div class="tab-pane " id="empname">

											<div class="row">
												<div class="col-md-12 ">

													<div class="form-group text-center">
															<div class="col-md-12 has-error ml-auto mr-auto my-2">
																	@foreach ($data_emp as $key => $row)
																		<button type="button" class="btn btn-info mx-1 my-1" style="width:200px">
																			{{ 'รหัส '.$row->EMP_CODE.' : ชื่อ '.$row->EMP_NAME }}</button>
																	@endforeach
															</div>
													</div>
													<div class="card-action text-center">
														<button type="submit" class="btn btn-warning mx-1 my-1"><i class="fas fa-arrow-alt-circle-left mr-1"></i>Previous</button>
														<button type="submit" class="btn btn-primary mx-1 my-1">Next <i class="fas fa-arrow-alt-circle-right ml-1"></i></button>
													</div>
												</div>
											</div>
										</div>
										<div class="tab-pane " id="priority">
											<div class="col-md-6 ml-auto mr-auto">
												<div class="row">

													<div class="col-sm-6 col-md-6">
														<a  onclick="selectstep2(this)"   style="cursor:pointer">
														<div class="card card-stats card-primary card-round">
															<div class="card-body">
																<div class="row">
																	<div class="col-5">
																		<div class="icon-big text-center">
																			<i class="flaticon-users"></i>
																		</div>
																	</div>
																	<div class="col-7 col-stats">
																		<div class="numbers">
																			<p class="card-category" style="font-size:20px">ปกติ</p>
																		</div>
																	</div>
																</div>
															</div>
														</div>
													</a >
													</div>
													<div class="col-sm-6 col-md-6">
														<a  onclick="selectstep2(this)"   style="cursor:pointer">
														<div class="card card-stats card-danger card-round">
															<div class="card-body ">
																<div class="row">
																	<div class="col-5">
																		<div class="icon-big text-center">
																			<i class="fab fa-hotjar fa-lg" ></i>
																		</div>
																	</div>
																	<div class="col-7 col-stats">
																		<div class="numbers">
																			<p class="card-category" style="font-size:20px">ด่วน</p>
																		</div>
																	</div>
																</div>
															</div>
														</div>
													</a >
													</div>



												</div>
											</div>
											<div class="card-action text-center">
												<button type="submit" class="btn btn-warning mx-1 my-1"><i class="fas fa-arrow-alt-circle-left mr-1"></i>Previous</button>
												<button type="submit" class="btn btn-primary mx-1 my-1">Next <i class="fas fa-arrow-alt-circle-right ml-1"></i></button>
											</div>
										</div>
										<div class="tab-pane " id="summary">

											<form action="#" method="post" id="FRM_SENDREPORT" name="FRM_SENDREPORT">
												@csrf
												<div class="row">
													<div class="col-md-6 ml-auto mr-auto">

															<table class="table table-bordered table-bordered-bd-info">
																<tbody>
																	<tr>
																		<td width="80px" style="background:#aab7c1;color:black;"><h5> MC-NO </h5></td>
																		<td> MC-001 LINE : L1</td>
																	</tr>
																	<tr>
																		<td style="background:#aab7c1;color:black;"><h5>พนักงาน</h5>  </td>
																		<td> 630052 พิชิตชัย</td>
																	</tr>
																	<tr>
																		<td style="background:#aab7c1;color:black;"><h5>อาการ</h5>  </td>
																		<td> ปั้มน้ำไฮดรอลิกรั่ว</td>
																	</tr>
																	<tr>
																		<td style="background:#aab7c1;color:black;"><h5>ระดับ</h5>  </td>
																		<td> เร่งด่วน</td>
																	</tr>

																</tbody>
															</table>

													</div>
												</div>
												<div class="card-action text-center">
													<button type="submit" class="btn btn-warning mx-1 my-1"><i class="fas fa-arrow-alt-circle-left mr-1"></i>Previous</button>

													<button type="submit" class="btn btn-primary"><i class="fas fa-save mr-1"></i>Save</button>
												</div>
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
	<script src="{{ asset('assets/js/ajax/ajax-csrf.js') }}"></script>
	<script src="{{asset('assets/js/bootstrapwizard.js')}}"></script>
	<script src="{{asset('assets/js/jquery.validate.min.js')}}"></script>
 	<script src="{{asset('assets/js/select2.min.js')}}"></script>
	<script>
	$(".tabactive").each(function(){
		$(this).click(function(){
			id = $(this).attr('id');
			url = window.location.href;
			$(".nav-link").removeClass("active");
			$(this).addClass("active show");
			$('.tab-pane').removeClass("active");
			$("#"+id).addClass("active");

		});
	});

	function selectrepair(thisdata){
		var unid = $(thisdata).data('unid');
		alert(unid);

	}
	function selectstep2(thisdata){
		var priority = $(thisdata).data('priority');
    var emp_code = $('.select-empcode').val();
		alert(emp_code);
		$(".nav-link").removeClass("active");
		$(".address").addClass("active");
		$('.tab-pane').removeClass("active");
		$("#address").addClass("active");
	}
	$('.select-empcode').on('change',function(){
		var emp_code = $('.select-empcode').val();
		var url = "{{ route('repair.selectemp') }}";
		var data = { "_token": "{{ csrf_token() }}", EMP_CODE : emp_code };
		$.ajax({
				type:'POST',
				url: url,
				datatype: 'json',
				data: data,
				success:function(data){
					$('.result-empcode').val(data.res);
				}
			});

	});
	</script>


@stop
{{-- ปิดส่วนjava --}}
