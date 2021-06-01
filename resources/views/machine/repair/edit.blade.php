@extends('masterlayout.masterlayout')
@section('tittle','แจ้งซ่อม')
@section('meta')
	<link rel="stylesheet" href="{{asset('assets/css/bootstrap-select.min.css')}}">
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
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
							<div class="col-md-1 ">
								<form action="{{ url('machine/repair/update/'.$dataset->UNID) }}" method="POST" enctype="multipart/form-data">
									@csrf
									<button class="btn btn-primary btn-xs" type="submit">
										<span class="fas fa-save fa-lg">	save	</span>
									</button>
							</div>

							<div class="col-md-10 ">

									<button class="btn btn-secondary btn-xs float-right" type="button" id="button">
										<span class="fas fa-print fa-lg">	print	</span>
									</button>

							</div>
						</div>
					</div>
				</div>
				<!--ส่วนกรอกข้อมูล-->
				<div class="py-12">
	        <div class="container mt-2">
						<div class="card">
							<div class="card-header bg-primary">
								<h4 class="ml-3 mt-2" style="color:white;" >แจ้งซ่อมเครื่องจักร {{ $dataset->EMP_CODE }}</h4>
							</div>

							<div class="card-body">
								<div class="row">
									<div class="col-md-6 col-lg-4">
										<div class="form-group has-error">
											<label for="MACHINE_DOCNO">เลขที่เอกสาร</label>
											<input type="text" class="form-control" id="MACHINE_DOCNO" name="MACHINE_DOCNO"value={{ $dataset->MACHINE_DOCNO }} readonly>
										</div>
									</div>
									<div class="col-md-6 col-lg-4">
										<div class="form-group has-error">
											<label for="MACHINE_TIME">เวลาแจ้งซ่อม	</label>
											<input type="text" class="form-control" id="MACHINE_TIME" name="MACHINE_TIME" value={{ $dataset->MACHINE_TIME }} readonly>
										</div>
									</div>
									<div class="col-md-6 col-lg-4">
										<div class="form-group has-error">
											<label for="MACHINE_DOCDATE">วันที่เอกสาร	</label>
											<input type="text" class="form-control" id="MACHINE_DOCDATE" name="MACHINE_DOCDATE" value="{{ $dataset->MACHINE_DOCDATE }}"readonly >
										</div>
									</div>
								</div>
								<div class="row">
								<div class="col-md-6 col-lg-4">
								  <div class="form-group has-error">
								    <label for="EMP_NAME">รหัสพนักงาน</label>
										<select name="EMP_CODE" id="EMP_CODE" class="form-control" data-live-search="true" title="Select Category">
										</select>
								  </div>
								</div>

								<div class="col-md-6 col-lg-4">
								  <div class="form-group has-error">
								    <label for="EMP_NAME">ชื่อพนักงาน	</label>
								    <input type="text"  class="form-control" id="EMP_NAME" name="EMP_NAME"
								    value="" readonly>
								  </div>
								</div>
								</div>
								<div class="row">
										<div class="col-md-8 col-lg-4">
											<div class="form-group has-error">
												<label for="MACHINE_CODE">รหัสเครื่อง</label>
													<input type="text" class="form-control" id="MACHINE_CODE" name="MACHINE_CODE" value="{{ $dataset->MACHINE_CODE }}" readonly >
											</div>
										</div>
										<div class="col-md-8 col-lg-4">
											<div class="form-group has-error">
												<label for="MACHINE_LOCATION">Line</label>
												<input type="text" class="form-control" id="MACHINE_LOCATION" name="MACHINE_LOCATION" value="{{ $dataset->MACHINE_LOCATION }}" readonly>
											</div>
										</div>
										<div class="col-md-8 col-lg-4">
											<div class="form-group has-error">
												<label for="MACHINE_NAME">ชื่อเครื่อง</label>
												<input type="text" class="form-control" id="MACHINE_NAME" name="MACHINE_NAME"  value="{{ $dataset->MACHINE_NAME }}" readonly>
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

																		@foreach($datarepair as $dataitem)
																		<div class="form-check">
																			<label  class="form-check-label">
																				<input class="form-check-input" type="checkbox" id="MACHINE_NOTE[]" name="MACHINE_NOTE[]"

																				value="{{ $dataitem->REPAIR_NAME }}" @if (in_array($dataitem->REPAIR_NAME,$datanote['data'])) checked @else "" @endif>
																				<span class="form-check-sign">{{ $dataitem->REPAIR_NAME }}</span>
																			</label>
																		</div>
																	@endforeach

																	</div>

																	<div class="col-md-8 col-lg-3 ml-2">
																		<div class="form-group">
    																	<label for="MACHINE_CAUSE">Example textarea</label>
    																	<textarea class="form-control" id="MACHINE_CAUSE" name="MACHINE_CAUSE" rows="4">{{ $dataset->MACHINE_CAUSE }}
																			 </textarea>
  																	</div>
																	</div>

																		<div class="col-md-8 col-lg-3 ">
																			<div class="form-group">
																				<label for="MACHINE_SERIAL">สถานะ</label>
																				<select class="form-control form-control" id="MACHINE_TYPE" name="MACHINE_TYPE" >
																					<option >--แสดงทั้งหมด--</option>
																					<option value="STOP"{{$dataset->MACHINE_TYPE == 'STOP' ? 'selected' : ''}}>หยุดทำงาน</option>
																					<option value="RUN"{{$dataset->MACHINE_TYPE == 'RUN' ? 'selected' : ''}}>ทำงานปกติ</option>

																				</select>
																			</div>
																		</div>

																		<input type="hidden" id="UNID" value="{{ $dataset->UNID }}">
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




{{-- @include('masterlayout\tab\modal\scanqrcode') --}}




@stop
{{-- ปิดส่วนเนื้อหาและส่วนท้า --}}

{{-- ส่วนjava --}}
@section('javascript')

	<script src="{{ asset('assets/js/bootstrap-select.min.js') }}">
	$(document).ready(function(){

  $('#EMP_CODE').selectpicker();
  load_data('EMP_NAME');
  function load_data(emp_code = '')
  {
		var url = '/machine/repair/form/searchempname';
		var data = {EMP_CODE:emp_code};
    $.ajax({
      url:url,
      method:"GET",
      data:data,
      dataType:"json",
      success:function(data)
      {
        var html = '';
        for(var count = 0; count < data.length; count++)
        {
          html += '<option value="'+data[count].id+'">'+data[count].name+'</option>';
        }
          $('#EMP_CODE').html(html);
          $('#EMP_CODE').selectpicker('refresh');
      }
    });
  }

  $(document).on('change', '#EMP_CODE', function(){
    var emp_code = $('#EMP_CODE').val();
    load_data('EMP_NAME', emp_code);
  });

});
	var button = document.getElementById('button');
	var unid = $('#UNID').val(); console.log(unid);
	button.addEventListener('click', function(){
		window.open('/machine/repair/pdf/'+unid,'Repairprint','width=1000,height=1000,resizable=yes,top=100,left=100,menubar=yes,toolbar=yes,scroll=yes');
	})
	</script>
@stop
{{-- ปิดส่วนjava --}}
