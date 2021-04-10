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
								<button class="btn btn-warning  btn-xs ">
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

										<div class="card-header bg-primary col-md-6 col-lg-12">
											<h4 class="ml-3 mt-2" style="color:white;" >
											<i class="fas fa-cubes fa-lg mr-1"></i>ต้นแบบ SparePart
											<button class="btn btn-danger btn-sm float-right mx-1" type="button	">Delete</button>

											<button  id="popup" type="button" class="btn btn-warning float-right btn-sm "
												data-toggle="modal" data-target="#Newtemplate">
												<i class="fas fa-file" style="color:white;font-size:14px"> New</i>
											</button>
											{{-- <a href=" {{  url('machine/pm/template/add') }}">
											<button class="btn btn-warning btn-sm float-right" type="button	">New</button>
											</a> --}}
											</h4>
										 </div>
										 </div>
										{{-- <div class="card full-height"> --}}
												<div class="row">
													<div class="col-md-6 col-lg-4 ">
														<div class="card">
															<div class="card-header bg-primary">
															<h4 class="ml-3 mt-2" style="color:white;" ><i class="fas fa-cubes fa-lg mr-1"></i>	ต้นแบบ (Template)</h4>
															</div>
															<div class="card-body">
																		<div class="row my-2">
																			<ul class="nav nav-tab flex-column col-md-6 col-lg-12">
						            									<li class="nav-item active">
																								<input class="form-check-input ml-4" type="checkbox" id="MACHINE_NOTE[]" name="MACHINE_NOTE[]">
																								<a class="tab" href="#AUTODRILL" data-toggle="tab">
																									<button class="btn btn-primary btn-sm  mx-2 my-2" type="button">
																										AUTODRILL 1
																									</button>
																								</a>
																								<button class="btn btn-primary btn-link  float-right" type="button"
																								data-toggle="modal" data-target="#Edittemplate">
																									<i class="fas fa-edit fa-lg"></i>
																								</button>
																					</li>
																					<li class="nav-item active">
																						<input class="form-check-input ml-4" type="checkbox" id="MACHINE_NOTE[]" name="MACHINE_NOTE[]">

																						<a class="tab" href="#CNC" data-toggle="tab">
																							<button class="btn btn-primary btn-sm  mx-2 my-2" type="button">
																								CNC
																							</button>
																						</a>
																						<button class="btn btn-primary btn-link  float-right" type="button"
																							data-toggle="modal" data-target="#Edittemplate">
																							<i class="fas fa-edit fa-lg"></i>
																						</button>
																					</li>
																					<li class="nav-item active">
																						<input class="form-check-input ml-4" type="checkbox" id="MACHINE_NOTE[]" name="MACHINE_NOTE[]">
																						<a class="tab" href="#GRILLDING" data-toggle="tab">
																							<button class="btn btn-primary btn-sm mx-2 my-2" type="button">
																								GRILLDING
																							</button>
																						</a>
																						<button class="btn btn-primary btn-link  float-right" type="button"
																						data-toggle="modal" data-target="#Edittemplate">
																							<i class="fas fa-edit fa-lg"></i>
																						</button>
																					</li>

						        									</ul>

																		</div>
															</div>
														</div>
													</div>

													<div class="col-md-6 col-lg-8 ">
														<div class="card">
															<div class="card-header bg-primary">
																<h4 class="ml-3 mt-2" style="color:white;" ><i class="fas fa-cubes fa-lg mr-1"></i>รายการ SparePart</h4>
															</div>
															<div class="card-body">
																<div class="tab-content my-2">

		            										<div class="tab-pane" id="AUTODRILL">
																			<div class="col-md-12 ml-3">

																				<button class="btn btn-danger btn-sm float-right mx-1" type="button	">Delete</button>
																				<button class="btn btn-warning btn-sm float-right" type="button	"
																				data-toggle="modal" data-target="#Newpm">New</button>
																			</div>
		            											<div class="row">
		            												<div class="col-md-12">
		            											 		<div class="table">
																						<table class="table ">
																							<thead>
																								<tr>
																									<th scope="col">ลำดับ</th>
																									<th scope="col">รายการ SparePart</th>
																									<th scope="col">ระยะเวลา</th>
																									<th scope="col">ตรวจเช็คครั้งแรก</th>
																									<th scope="col">ราคา</th>
																									<th scope="col">จำนวน</th>

																								</tr>
																							</thead>
																							<tbody>
																								<tr id="edit">
																									<td> <input class="form-check-input mx-2" type="checkbox" id="MACHINE_NOTE[]" name="MACHINE_NOTE[]">1</td>
																									<td>สายพาน</td>
																									<td>3 เดือน</td>
																									<td>14/02/21</td>
																									<td>200 บาท</td>
																									<td>2 จำนวน</td>

																								</tr>
																								<tr>
																									<td><input class="form-check-input mx-2" type="checkbox" id="MACHINE_NOTE[]" name="MACHINE_NOTE[]">2</td>
																									<td>หลอดไฟ</td>
																									<td>3 เดือน</td>
																									<td>14/02/21</td>
																									<td>200 บาท</td>
																									<td>2 จำนวน</td>

																								</tr>
																								<tr>
																									<td><input class="form-check-input mx-2" type="checkbox" id="MACHINE_NOTE[]" name="MACHINE_NOTE[]">3</td>
																									<td>เซอโว</td>
																									<td>3 เดือน</td>
																									<td>14/02/21</td>
																									<td>300 บาท</td>
																									<td>2 จำนวน</td>

																								</tr>
																							</tbody>
																						</table>
																					</div>


		            												</div>

		            											</div>
		            										</div>
																		<div class="tab-pane" id="CNC">
																			<div class="col-md-12 ml-3">

																				<button class="btn btn-danger btn-sm float-right mx-1" type="button	">Delete</button>
																				<a href=" {{  url('machine/pm/template/add') }}">
																				<button class="btn btn-primary btn-sm float-right" type="button	">New</button>
																				</a>
																			</div>
																			<div class="row">
																				<div class="col-md-12">
		            											 		<div class="table">
																						<table class="table ">
																							<thead>
																								<tr>
																									<th scope="col">ลำดับ</th>
																									<th scope="col">รายการ SparePart</th>
																									<th scope="col">ระยะเวลา</th>
																									<th scope="col">ตรวจเช็คครั้งแรก</th>
																									<th scope="col">ราคา</th>
																									<th scope="col">จำนวน</th>

																								</tr>
																							</thead>
																							<tbody>
																								<tr id="edit">
																									<td> <input class="form-check-input mx-2" type="checkbox" id="MACHINE_NOTE[]" name="MACHINE_NOTE[]">1</td>
																									<td>สายพาน 1</td>
																									<td>3 เดือน</td>
																									<td>14/02/21</td>
																									<td>200 บาท</td>
																									<td>2 จำนวน</td>

																								</tr>
																								<tr>
																									<td><input class="form-check-input mx-2" type="checkbox" id="MACHINE_NOTE[]" name="MACHINE_NOTE[]">2</td>
																									<td>หลอดไฟ .</td>
																									<td>3 เดือน</td>
																									<td>14/02/21</td>
																									<td>200 บาท</td>
																									<td>2 จำนวน</td>

																								</tr>
																								<tr>
																									<td><input class="form-check-input mx-2" type="checkbox" id="MACHINE_NOTE[]" name="MACHINE_NOTE[]">3</td>
																									<td>เซอโว</td>
																									<td>3 เดือน</td>
																									<td>14/02/21</td>
																									<td>300 บาท</td>
																									<td>2 จำนวน</td>

																								</tr>
																							</tbody>
																						</table>
																					</div>


		            												</div>

																			</div>
																		</div>
																		<div class="tab-pane" id="GRILLDING">
																			<div class="col-md-12 ml-3">
																				<button class="btn btn-danger btn-sm float-right mx-1" type="button	">Delete</button>
																				<a href=" {{  url('machine/pm/template/add') }}">
																				<button class="btn btn-primary btn-sm float-right" type="button	">New</button>
																				</a>
																			</div>
																			<div class="row">
																				<div class="col-md-12">
																					<div class="table">
																						<table class="table ">
																							<thead>
																								<tr>
																									<th scope="col">ลำดับ</th>
																									<th scope="col">รายการ SparePart</th>
																									<th scope="col">ระยะเวลา</th>
																									<th scope="col">ตรวจเช็คครั้งแรก</th>
																									<th scope="col">ราคา</th>
																									<th scope="col">จำนวน</th>

																								</tr>
																							</thead>
																							<tbody>
																								<tr id="edit">
																									<td> <input class="form-check-input mx-2" type="checkbox" id="MACHINE_NOTE[]" name="MACHINE_NOTE[]">1</td>
																									<td>สายพาน 2</td>
																									<td>3 เดือน</td>
																									<td>14/02/21</td>
																									<td>200 บาท</td>
																									<td>2 จำนวน</td>

																								</tr>
																								<tr>
																									<td><input class="form-check-input mx-2" type="checkbox" id="MACHINE_NOTE[]" name="MACHINE_NOTE[]">2</td>
																									<td>หลอดไฟ 1</td>
																									<td>3 เดือน</td>
																									<td>14/02/21</td>
																									<td>200 บาท</td>
																									<td>2 จำนวน</td>

																								</tr>
																								<tr>
																									<td><input class="form-check-input mx-2" type="checkbox" id="MACHINE_NOTE[]" name="MACHINE_NOTE[]">3</td>
																									<td>เซอโว</td>
																									<td>3 เดือน</td>
																									<td>14/02/21</td>
																									<td>300 บาท</td>
																									<td>2 จำนวน</td>

																								</tr>
																							</tbody>
																						</table>
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



		<style>
		.modal-sm {
		    max-width: 30% !important;
		}
		.modal-md {
		    max-width: 50% !important;
		}
		</style>
		<!-- Modal -->
		<div class="modal fade" id="Newtemplate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLalavel" aria-hidden="true">
		  <div class="modal-dialog modal-sm" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">
		        <div class="card-body ml-2">
		          <div class="row ">
		            <div class="col-md-6 col-lg-12">
		              ชือ ต้นแบบ(template)
		            </div>
		          </div>

		          <div class="row mt-4">
		            <div class="col-md-6 col-lg-12 has-error">
		              <input type="text" class="form-control" placeholder="กรุณาใส่ชื่อต้นแบบ(template)">
		            </div>



		          </div>


		          </div>

		        </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		        <button type="submit" class="btn btn-primary">Save changes</button>
		      </div>
		    </div>
		  </div>
		</div>
		</div>
		<div class="modal fade" id="Edittemplate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLalavel" aria-hidden="true">
			<div class="modal-dialog modal-sm" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<div class="card-body ml-2">
							<div class="row ">
								<div class="col-md-6 col-lg-12">
									ชือ ต้นแบบ(template)
								</div>
							</div>

							<div class="row mt-4">
								<div class="col-md-6 col-lg-12 has-error">
									<input type="text" class="form-control" placeholder="กรุณาใส่ชื่อต้นแบบ(template)">
								</div>



							</div>


							</div>

						</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-primary">Save changes</button>
					</div>
				</div>
			</div>
		</div>
		</div>
		<div class="modal fade" id="Newpm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLalavel" aria-hidden="true">
			<div class="modal-dialog modal-md" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<div class="card-body ml-2">
							<div class="row ">
								<div class="col-md-6 col-lg-6">
									รายการ SparePart
								</div>
								<div class="col-md-6 col-lg-6 has-error">
									<select class="form-control">
										<option>
											สายพาน
										</option>
										<option>
											หลอดไฟ
										</option>
									</select>
								</div>
								<div class="col-md-6 col-lg-6">
									ระยะเวลา
								</div>
								<div class="col-md-6 col-lg-6 has-error my-2">
									<input type="text" class="form-control" placeholder="ใส่ระยะเวลา">
								</div>
								<div class="col-md-6 col-lg-6">
									แจ้งเตือน
								</div>
								<div class="col-md-6 col-lg-6 has-error">
									<input type="text" class="form-control" placeholder="ใส่ระยะเวลา">
								</div>
								<div class="col-md-6 col-lg-6">
									ตรวจเช็คครั้งแรก
								</div>
								<div class="col-md-6 col-lg-6 has-error my-2">
									<input type="date" class="form-control">
								</div>
								<div class="col-md-6 col-lg-6">
									ราคา
								</div>
								<div class="col-md-6 col-lg-6 has-error">
									<div class="input-group">
									<input type="text" class="form-control" placeholder="ราคา">
									<div class="input-group-append">
														<span class="input-group-text">บาท</span>
													</div>
										</div>
								</div>
								<div class="col-md-6 col-lg-6">
									จำนวน
								</div>
								<div class="col-md-6 col-lg-6 has-error my-2">
									<div class="input-group">
									<input type="text" class="form-control" placeholder="">
									<div class="input-group-append">
														<span class="input-group-text">จำนวน</span>
													</div>
										</div>
								</div>

							</div>


							</div>

						</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-primary">Save changes</button>
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
		$( "#edit" ).dblclick(function() {
			// var unid = ('#UNID').val();
			// console.log(unid);
  	window.location.href = "/machine/pm/template/add/";
		});
	</script>
	<script>
		function pmtemplate(){
			window.open('/machine/machinepmtemplate/','PmTemplate','width=1000,height=1000,resizable=yes,top=100,left=100,menubar=yes,toolbar=yes,scroll=yes');
		}
	</script>
	<script src="{{asset('/js/dashboard/bootstrap-toggle.min.js')}}">
	</script>
@stop
{{-- ปิดส่วนjava --}}
