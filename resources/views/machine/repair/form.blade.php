@extends('masterlayout.masterlayout')
@section('meta')
{{-- <meta name="csrf-token" content="{{ csrf_token() }}"> --}}
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('tittle','แจ้งซ่อม')
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
							<div class="col-md-1 ">
								<a href="{{ url('machine/repair/repairsearch') }}">
									<button class="btn btn-warning  btn-xs  ">
										<span class="fas fa-arrow-left fa-lg	"> back </span>
									</button>
								</a>
							</div>
							<div class="col-md-1 ml--3">
								<a href="{{ url('machine/repair/repairlist') }}">
									<button class="btn btn-warning  btn-xs ">
										<span class="fas fa-arrow-left fa-lg	"> กลับหน้าหลัก </span>
									</button>
								</a>
							</div>
							<div class="col-md-1 ml-5">
								<form action="{{url('machine/repair/store')}}" method="POST" enctype="multipart/form-data">
									@csrf
									<button class="btn btn-primary btn-xs" type="submit">
										<span class="fas fa-file-medical fa-lg	">	Save	</span>
									</button>
							</div>
						</div>
					</div>
				</div>
				<!--ส่วนกรอกข้อมูล-->
				<div class="py-12">
	        <div class="container mt-2">
						<div class="card">
							<div class="">
								<div class="form-inline bg-primary"><p style="color:white;font-size:17px" class="ml-4 mt-3">แจ้งซ่อมเครื่องจักร</p>
									<div class="btn-group ml-3" role="group" aria-label="Basic example">
									</div>
									<div class="form-group form-inline ">
									</div>
								</div>
							</div>
							<div class="card-body">
								<div class="row">
										<!-- ช่อง1-->
										<div class="col-md-6 col-lg-4">
											<div class="form-group has-error">
												<label for="MACHINE_DOCNO">เลขที่เอกสาร</label>
												<?php
												$number = date("ymdhis");
												echo'<input type="text" class="form-control" id="MACHINE_DOCNO" name="MACHINE_DOCNO" placeholder="เลขที่เอกสาร"  value=RE-'.$number.' readonly> ';
													?>
											</div>
											<div class="form-group has-error">
												<label for="EMP_NAME">ชื่อพนักงาน</label>
												<select class="form-control" id="EMP_NAME" name="EMP_NAME">
													<option>พนักงาน</option>
													@foreach ($dataemp as $key => $dataitem)

													<option value="{{ $dataitem->EMP_NAME }}">{{ $dataitem->EMP_NAME }}   {{ $dataitem->EMP_NAME_LAST }}</option>
													@endforeach
											</select>
											</div>
										</div>
										<!-- ช่อง2-->
										<div class="col-md-6 col-lg-4">
											<div class="form-group has-error">
												<label for="MACHINE_DOCDATE">วันที่เอกสาร	</label>
												<input type="text" class="form-control" id="MACHINE_DOCDATE" name="MACHINE_DOCDATE"
												<?php echo'value="'.date("Y-m-d").'"';?>readonly >
											</div>
											<div class="form-group has-error">
												<label for="EMP_CODE">รหัสพนักงาน	</label>
												<input type="text" class="form-control" id="EMP_CODE" name="EMP_CODE" readonly>
											</div>
										</div>
										{{ csrf_field() }}
										<!-- ช่อง3-->
										<div class="col-md-6 col-lg-4">
											<div class="form-group has-error">
												<label for="MACHINE_TIME">เวลาแจ้งซ่อม	</label>
												<?php echo '<input type="text" class="form-control" id="MACHINE_TIME" name="MACHINE_TIME" value='.date("H:i:s").' readonly>'; ?>
											</div>
											<div class="form-group has-error">
												<label for="MACHINE_CODE">รหัสเครื่อง</label>
													<input type="text" class="form-control" id="MACHINE_CODE" name="MACHINE_CODE" value="{{ $datamachine->MACHINE_CODE }}" readonly >
											</div>
										</div>
									</div>
									<div class="row">
											<div class="col-md-8 col-lg-4">
												<div class="form-group has-error">
													<label for="MACHINE_NAME">ชื่อเครื่อง</label>
													<input type="text" class="form-control" id="MACHINE_NAME" name="MACHINE_NAME"  value="{{ $datamachine->MACHINE_NAME }}" readonly>
												</div>
											</div>
											<div class="col-md-8 col-lg-4">
												<div class="form-group has-error">
													<label for="MACHINE_LOCATION">Line</label>
													<input type="text" class="form-control" id="MACHINE_LOCATION" name="MACHINE_LOCATION" value="{{ $datamachine->MACHINE_LINE }}" readonly>
												</div>
											</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12 mt-2">
										<div class="card-body">
											<style>
												.nav-pills {
    											border-bottom: 0px solid #ddd;
												}
												.nav-pills li a {
    											background: #1f4e79;
    											color: #fff;
    											display: block;
    											line-height: 2em;
    											padding: 7px 15px;
    											border-radius: 0;
    											font-size: 13px;
    											border: none;
    											margin: 30px 2px 0;
												}
											</style>
											<ul class="nav nav-pills justify-content-left mt--4">
  											<li>
    											<a id="home-tab" data-toggle="tab" href="#home" class="active" >รายละเอียดการแจ้งซ่อม</a>
  											</li>

  										</ul>
  										<div class="tab-content clearfix">
												<!-- ข้อมูลทั่วไป -->
  											<div class="tab-pane active" id="home">
    											<div class="row">
      											<div class="col-sm-12">
        											<div class="jumbotron">
																<div class="col-md-8 col-lg-12">
																	<div class="table">
																	<table class="table table-sm"  >
																		<thead>
																			<tr>
																				<th class="bg-primary" colspan="6" >
																					<h4 align="center" style="color:white;" class="mt-2">รายละเอียดการแจ้งซ่อม</h4>
																				</th>
																			</tr>
																		</thead>
																	</table>
																</div>
															</div>
																<div class="row">

																	<div class="col-md-8 col-lg-3 ml-2">
																		@foreach($dataset as $datarepair)
																		<div class="form-check">
																			<label  class="form-check-label">
																				<input class="form-check-input" type="checkbox" id="MACHINE_NOTE" name="MACHINE_NOTE[]" value="{{ $datarepair->REPAIR_NAME }}">
																				<span class="form-check-sign"></span>
																			</label>
																		</div>
																	@endforeach
																	</div>

																	<div class="col-md-8 col-lg-4 ml-2">
																		<div class="form-group">
    																	<label for="MACHINE_CAUSE">รายละเอียดอาการ</label>
    																	<textarea class="form-control" id="MACHINE_CAUSE" name="MACHINE_CAUSE" rows="4"></textarea>
  																	</div>
																	</div>

																		<div class="col-md-8 col-lg-3 ">
																			<div class="form-group">
																				<label for="MACHINE_TYPE">สถานะ</label>

																				<select class="form-control form-control" id="MACHINE_TYPE" name="MACHINE_TYPE" >
																					<option>--แสดงทั้งหมด--</option>
																					<option value="STOP">หยุดทำงาน</option>
																					<option value="RUN">ทำงานปกติ</option>

																				</select>
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
							</div>
					</div>
				</div>
				</div>
			</div>
		</form>
	</div>
</div>






@stop
{{-- ปิดส่วนเนื้อหาและส่วนท้า --}}

{{-- ส่วนjava --}}
@section('javascript')
	<script>
    $('#EMP_NAME').change(function() {
        var id = $(this).val();
        var url = '{{ route("get.repair", ":EMP_NAME") }}';
        urllink = url.replace(':EMP_NAME', id);

        $.ajax({
            url: urllink,
            type: 'get',
            dataType: 'json',
            success: function(response) {
                if (response != null) {
                    $('#EMP_CODE').val(response.EMP_CODE);
										// console.log($('.epm'));
									}
            }
						// console.log(success:);
        });console.log(urllink);
    });
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
