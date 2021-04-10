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
									<a href="{{ url('/machine/dashboard/dashboard') }}">
										<button class="btn btn-warning  btn-xs ">
											<span class="fas fa-arrow-left fa-lg">Back </span>
										</button>
									</a>
									<a href="{{ url('users/export/') }}">
									<button class="btn btn-primary  btn-xs">
										<span class="fas fa-file-export fa-lg">	Export	</span>
									</button>
									</a>
									<button class="btn btn-primary  btn-xs">
										<span class="fas fa-print fa-lg">	Print	</span>
									</button>
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
	  											<button type="button" class="close" data-dismiss="alert" aria-label="Close">	<span aria-hidden="true">&times;</span>	</button>
												</div>
										@endif
											<div class="card-header bg-primary form-inline ">
												<h4 class="ml-3 mt-2 " style="color:white;" ><i class="fas fa-wrench fa-lg mr-1"></i> รายการตรวจเช็คเครื่องจักร </h4>
												<div class="input-group ml-4">
													<input type="text" id="search_text"  name="search_text"onkeyup="myFunction()" class="form-control form-control-sm">
													<div class="input-group-prepend">
														<button type="submit" class="btn btn-search pr-1 btn-xs	">
															<i class="fa fa-search search-icon"></i>
														</button>
													</div>
												</div>
											</div>
											<div id="result"class="card-body">
												<div class="table-responsive">
		                      <table class="display table table-striped table-hover">
		                      	<thead class="thead-light">
		                        	<tr>
		                            <th >Code</th>
		                          	<th >ชื่อเครื่อง</th>
		                          	<th >LINE</th>
																<th >รายการ PM</th>
																<th >รายการตรวจเช็ค</th>
																<th style="width:160px" >สถานะ</th>
																<th>	</th>
		                        	</tr>
		                      	</thead>
		                      	<tbody>
			 											<?php
																foreach ($datamachine as $key => $dataset){
																	foreach ($datapmtemplatelist->where('PM_TEMPLATE_UNID_REF',$dataset->PM_TEMPLATE_UNID_REF) as $key => $rowdata){
						                        foreach ($machinecheckpm->where('PM_TEMPLATELIST_UNID_REF',$rowdata->UNID)->where('MACHINEPM_UNID_REF',$dataset->UNID)->sortBy('PM_TEMPLATELIST_DUE') as $key => $datamachinecheckpm) {
																			//เงือนไขของเวลาในการเช็ค
																			if($datamachinecheckpm->PM_TEMPLATELIST_LASTDUE !== NULL) {
						                              $to = ($rowdata->PM_TEMPLATELIST_CHECK == '1')? \Carbon\Carbon::parse($datamachinecheckpm->PM_TEMPLATELIST_LASTDUE)->addmonth($rowdata->PM_TEMPLATELIST_DAY)->toDateString()
						                                                                          	: \Carbon\Carbon::parse($datamachinecheckpm->PM_TEMPLATELIST_LASTDUE)->addday($rowdata->PM_TEMPLATELIST_DAY)->toDateString();
						                          }elseif($datamachinecheckpm->PM_TEMPLATELIST_LASTDUE === NULL){
						                            $to = \Carbon\Carbon::parse($rowdata->PM_TEMPLATELIST_DUE)->toDateString();
						                          }
						                          $now = \Carbon\Carbon::now()->toDateString();
						                          $from = \Carbon\Carbon::parse($now);
						                          $notify = \Carbon\Carbon::now()->addDay($rowdata->PM_TEMPLATELIST_NOTIFY)->toDateString();
						                          $diff_in_days = $from->diffInDays($to , false);
						                          $diff_in_daysdisplaye = $from->diffInDays($to);
																			//สิ้นสุด
																				//เงื่อนไข หากยังไม่ถึงเวลาเช็คจะไม่แสดง
																				if ($to <= $notify ) {
																					echo '<tr>';
																					echo '<td width="13%">'.$dataset->MACHINE_CODE.'</td>';
																					echo '<td >'.$dataset->MACHINE_NAME.'</td>';
																					echo '<td >  '.$dataset->MACHINE_LINE.'   </td>';
																					echo '<td > '.$rowdata->PM_TEMPLATELIST_NAME.'   </td>';
																					echo '<td> '.$datapmtemplatedetail->where('PM_TEMPLATELIST_UNID_REF',$rowdata->UNID)->count().' </td>';
																				}
																				//สิ้นสุด
																				//เงื่อนไขในการแสดงเวลา
																				if ($to <= $notify ) {
																		 			if ($diff_in_days == "0") {
																			 			echo ' <td>	<button class="btn-danger btn-sm btn-block my-1 mx-2" style="width:160px">	<span style="font-size:13px;">ครบกำหนด</span></button> </td>';
																			 			echo '<td>	<a href='.url("/machine/system/check/".$dataset->UNID."/".$rowdata->UNID).'>	<button class="btn btn-primary btn-sm my-2">ทำการตรวจเช็ค</button>	</a>	</td>';
																		 			}elseif ($diff_in_days <= "-1") {
																			 			echo '<td> <button class="btn-danger btn-sm btn-block my-1 mx-2" style="width:160px">	<span style="font-size:13px;width:50px">เกิดกำหนดการ '.$diff_in_daysdisplaye.' วัน </span> </button> </td>';
																			 			echo '<td>	<a href='.url("/machine/system/check/".$dataset->UNID."/".$rowdata->UNID).'>	<button class="btn btn-primary btn-sm my-2">ทำการตรวจเช็ค</button>	</a>	</td>';
																		 			}else {
																			 			echo '<td> <button class="btn-warning btn-sm btn-block my-1 mx-2" style="width:160px">	<span style="font-size:12px;">ครับกำหนดใน '.$diff_in_daysdisplaye.' วัน </span> </button> </td>';
							                         			echo '<td>	<a href='.url("/machine/system/check/".$dataset->UNID."/".$rowdata->UNID).'>	<button class="btn btn-primary btn-sm my-2">ทำการตรวจเช็ค</button>	</a>	</td>';
																		 			}
																 				}
															 				}
															 					//สิ้นสุด
																 			echo "</tr>";
																 	}
															 	}
						                        ?>
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
@stop
{{-- ปิดส่วนเนื้อหาและส่วนท้า --}}

{{-- ส่วนjava --}}
@section('javascript')

@stop
{{-- ปิดส่วนjava --}}
