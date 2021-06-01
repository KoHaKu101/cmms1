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
	@php
	$MONTH = Session::get('MONTH');
	$YEAR =  Session::get('YEAR');

	$MONTH_NAME_TH = array(0 =>'ALL',1 => "มกราคม",2 => "กุมภาพันธ์",3 =>"มีนาคม",4 => "เมษายน",5 =>"พฤษภาคม",6 =>"มิถุนายน",
									 7 =>"กรกฎาคม",8 =>"สิงหาคม",9 =>"กันยายน",10 =>"ตุลาคม",11 => "พฤศจิกายน",12 =>"ธันวาคม");
	$MONTH = $MONTH != '' ? $MONTH : Carbon\Carbon::now()->isoformat('M') ;
	$YEAR = $YEAR != '' ? $YEAR : date('Y');
	@endphp

		<div class="content">
			<div class="panel-header bg-gradient">
				<div class="page-inner py-4 my-4">

						<div class="col-md-12">
								<div class="card">
									<div class="card-header bg-primary ">
										<form action='{{ url('machine/daily/list')}}' method="POST" id="FRM_CHECKSHEET" name="FRM_CHECKSHEET" enctype="multipart/form-data">
											@csrf
											<div class="row">
												<div class="col-md-8 form-inline">
													<h4 class="card-title text-white">Daily CheckSheet ปี :</h4>
													<select class="form-control form-control-sm input-group filled text-info mx-3" id="YEAR" name="YEAR">
														@for ($m=date('Y')-2; $m < date('Y')+2; $m++)
															<option value="{{$m}}" {{  $YEAR == $m ? 'selected' : '' }}>{{$m}}</option>
														@endfor
													</select>
													<h4 class="card-title text-white"> เดือน : </h4>
													<select class="form-control form-control-sm input-group filled text-info mx-3" id="MONTH" name="MONTH">
															@for ($i=1; $i < 13; $i++)
																<option value="{{$i}}" {{ $MONTH_NAME_TH[$MONTH] == $MONTH_NAME_TH[$i] ? 'selected' : '' }}>{{$MONTH_NAME_TH[$i]}}</option>
															@endfor
													</select>

												<h4 class="card-title text-white">Line</h4>
													<select class="form-control form-control-sm input-group filled text-info mx-3" id="MACHINE_LINE" name="MACHINE_LINE">
														<option value selected>ALL</option>
														@for ($l=1; $l < 7; $l++)
															<option value="L{{$l}}" {{ $MACHINE_LINE == 'L'.$l ? 'selected' : ''}}>L{{$l}}</option>
														@endfor
													</select>
												</div>
												<div class="col-md-4 my-3">
													<div class="card-title text-white">
														<div class="input-group">
															<input type="text" id="SEARCH_MACHINE" name="SEARCH_MACHINE" class="ml-3 col-9 form-control form-control-sm"
															 value="{{ $MACHINE_CODE }}" placeholder="ค้นหา Machine No">
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

									</div>
									@livewire('dailylist',['MACHINE_CODE'=>$MACHINE_CODE,'MACHINE_LINE'=>$MACHINE_LINE,'YEAR'=>$YEAR,'MONTH'=>$MONTH])


								</div>
							</div>
				</div>
			</div>
		</div>

		<style>
		.close {
    float: right;
    font-size: 1.5rem;
    font-weight: 700;
    line-height: 1;
    color: #fff;
    text-shadow: 0 1px 0 #fff;
    opacity: .5;
}
		</style>
		{{-- เพิ่ม Template --}}
		<div class="modal fade" id="UploadImg" tabindex="-1" role="dialog" aria-labelledby="exampleModalLalavel" aria-hidden="true">
		  <div class="modal-dialog modal-lg" role="document">
		    <div class="modal-content">
		      <div class="modal-header bg-primary">
		        <h5 class="modal-title" id="title_text">เพิ่มประเภทรายการ</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
					<div class="modal-body">
						<form action="{{ route('daily.upload')}}" method="post" enctype="multipart/form-data" id="FRM_UPLOAD_SHEET" name="FRM_UPLOAD_SHEET" >
			        @csrf
							<input type="hidden" id="MACHINE_UNID" 					name="MACHINE_UNID" 				value="">
							<input type="hidden" id="MACHINE_CODE" 					name="MACHINE_CODE" 				value="">
							<input type="hidden" id="CHECK_YEAR" 						name="CHECK_YEAR" 					value="">
							<input type="hidden" id="CHECK_MONTH" 					name="CHECK_MONTH" 					value="">
							<div class="row">
								<div class="col-md-12 col-lg-6">
									<div class="form-group">
										<div class="input-group">
												<input type="file" class="form-control form-control-sm" placeholder="" aria-label="" aria-describedby="basic-addon1"
												id="FILE_NAME" name="FILE_NAME" required>
											<div class="input-group-prepend">
												<button class="btn btn-primary btn-border btn-sm" type="submit"><i class="fa fa-fw fa-upload fa-lg"></i></button>
											</div>
										</div>
									</div>
								</div>
							</div>
			      </form>


						<div id="owl-demo2" class="owl-carousel owl-theme owl-img-responsive owl-loaded owl-drag">
					 		<div class="owl-stage-outer">
								<div class="owl-stage" style="transform: translate3d(0px, 0px, 0px); transition: all 0s ease 0s; width: 100%;height:400px">
									<div class="owl-item active" style="width: 100%;height:400px">
										<div class="item">
											<img class="img-fluid" id="preview-image-before-upload" src="{{ asset('assets/img/no_image1200_900.png') }}" style="width: 100%;height:400px">
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

		    </div>
		  </div>
		</div>
	{{-- view --}}
		<div class="modal fade" id="ViewImg" tabindex="-1" role="dialog" aria-labelledby="exampleModalLalavel" aria-hidden="true">
		  <div class="modal-dialog modal-lg" role="document">
		    <div class="modal-content">
		      <div class="modal-header bg-primary">
		        <h5 class="modal-title" id="title_view">เพิ่มประเภทรายการ</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
					<div class="modal-body">
						<div id="owl-demo2" class="owl-carousel owl-theme owl-img-responsive owl-loaded owl-drag">
					 		<div class="owl-stage-outer">
								<div class="owl-stage" style="transform: translate3d(0px, 0px, 0px); transition: all 0s ease 0s; width: 100%;height:400px">
									<div class="owl-item active" style="width: 100%;height:400px">
										<div class="item">
											<img class="img-fluid" id="view_img" src="{{ asset('assets/img/no_image1200_900.png') }}" style="width: 100%;height:400px">
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
	<script src="{{ asset('assets/js/ajax/ajax-csrf.js') }}">
	</script>

	<script src="{{ asset('assets/js/useinproject/checksheet.js') }}">
	</script>


@stop
{{-- ปิดส่วนjava --}}
