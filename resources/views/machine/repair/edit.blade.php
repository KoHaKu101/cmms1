@extends('masterlayout.masterlayout')
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
							<div class="col-md-1 mt-2">
								<a href="{{ url('machine/repair/repairlist') }}">
									<button class="btn btn-primary  btn-sm ">
										<span class="fas fa-arrow-left ">Back </span>
									</button>
								</a>
							</div>
							<div class="col-md-11 mt-2 ">
								<form action="" method="POST" enctype="multipart/form-data">
									@csrf
									<button class="btn btn-success btn-sm" type="submit">
										<span class="fas fa-file-medical ">	Save	</span>
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
								<div class="form-inline bg-primary"><p style="color:white;font-size:17px" class="ml-4 mt-3">แจ้งซ่อม</p>
									<div class="btn-group ml-3" role="group" aria-label="Basic example">
									</div>
									<div class="form-group form-inline ">
									</div>
								</div>
							</div>
							<div class="card-body">
								<div class="row">
										<!-- ช่อง2-->
										<div class="col-md-6 col-lg-4">
											<div class="form-group has-error disable">
												<label for="MACHINE_CODE">เลขที่เอกสาร</label>
													<input type="text" class=" form-control" id="MACHINE_CODE" name="MACHINE_CODE" value="10" disabled>
											</div>

											<div class="form-group has-error">
												<label for="MACHINE_RVE_DATE">รหัสพนักงาน	</label>
												<input type="text" class="form-control" id="MACHINE_STARTDATE" name="MACHINE_STARTDATE" placeholder="รหัสพนักงาน" required autofocus>
											</div>
										</div>
										<!-- ช่อง3-->
										<div class="col-md-6 col-lg-4">
											<div class="form-group">
												<label for="MACHINE_MANU">วันที่เอกสาร	</label>
												<input type="date" class=" form-control" id="MACHINE_MANU" name="MACHINE_MANU" placeholder="วันที่เอกสาร" required autofocus>
											</div>
											<div class="form-group has-error">
												<label for="MACHINE_TYPE">ชื่อพนักงาน</label>
												<input type="text" class="form-control" id="MACHINE_TYPE" name="MACHINE_TYPE" placeholder="ชื่อพนักงาน" required autofocus>
											</div>
										</div>

										<div class="col-md-6 col-lg-4">
											<div class="form-group has-error">
												<label for="MACHINE_RVE_DATE">เวลาแจ้งซ่อม	</label>
												<input type="text" class="form-control" id="MACHINE_STARTDATE" name="MACHINE_STARTDATE" placeholder="เวลาแจ้งซ่อม" disabled>
											</div>
											<div class="form-group has-error">
												<label for="MACHINE_RVE_DATE">แผนก	</label>
												<input type="text" class="form-control" id="MACHINE_STARTDATE" name="MACHINE_STARTDATE" placeholder="แผนก" required autofocus>
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
												ul li a {
    											text-decoration: none;
												}
												.nav-pills li a.active {
    											background: #3482ca;
    											border: none;
    											color: #FFF;
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
																	<div class="col-md-8 col-lg-3">
																		<div class="form-group">
																			<label for="MACHINE_PARTNO">รหัสเครื่อง</label>
																				<input type="text" class="form-control" id="MACHINE_PARTNO" name="MACHINE_PARTNO" placeholder="รหัสเครื่อง">
																		</div>
																	</div>
																	<div class="col-md-8 col-lg-4">
																		<div class="form-group">
																			<label for="MACHINE_MODEL">ชื่อเครื่อง</label>
																			<input type="text" class="form-control" id="MACHINE_MODEL" name="MACHINE_MODEL" placeholder="ชื่อเครื่อง">
																		</div>
																	</div>
																	<div class="col-md-8 col-lg-3">
																		<div class="form-group">
																			<label for="MACHINE_SERIAL">Line</label>
																			<input type="text" class="form-control" id="MACHINE_SERIAL" name="MACHINE_SERIAL" placeholder="Serial">
																		</div>

																	</div>

																		<div class="col-md-8 col-lg-5 ml-2">
																			<div class="form-group">
																			<label for="MACHINE_SERIAL">อาการเสีย</label>
																			<textarea class="form-control" id="comment" rows="5">
																			</textarea>
																		</div>
																		</div>

																		<div class="col-md-8 col-lg-2 ">
																			<div class="form-group">
																				<label for="MACHINE_SERIAL">Line</label>

																				<select class="form-control form-control" id="MACHINE_CHECK" name="MACHINE_CHECK" >
																					<option value="1">หยุดทำงาน</option>
																					<option value="2">ทำงานปกติ</option>

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

@stop
{{-- ปิดส่วนjava --}}
