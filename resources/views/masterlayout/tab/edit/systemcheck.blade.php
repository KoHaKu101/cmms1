<meta name="_token" content="{{ csrf_token() }}" />
<div class="tab-pane" id="systemcheck" >
  <div class="row">
    <div class="col-sm-12">
      <div class="jumbotron">

          <div class="col-md-8 col-lg-12">
            <div class="card-header bg-warning" style="height:43px">
              <div class="mt--1 form-inline">
                <div class="col-md-8 col-lg-10">
                  <h3 align="center" style="color:white;">ตรวจสอบระบบ</h3>
                </div>
                <div class="col-md-8 col-lg-1">
                  <button id="remove" type="button" class="btn btn-danger btn-sm mx-1"
                    data-toggle="modal" data-target="#PMMachineRemove">
                    <span style="color:black;font-size:13px">ลบระบบ</span>
                  </button>

                </div>
                <div class="col-md-8 col-lg-1">
                  <button id="add" type="button" class="btn btn-primary btn-sm"
                    data-toggle="modal" data-target="#PMMachine">
                    <span style="color:black;font-size:13px">เพิ่มระบบ</span>
                  </button>
                </div>


            </div>
          </div>
        </div>

          <div class="col-md-8 col-lg-12">
													<div class="accordion accordion-primary ">
                            @foreach ($masterimps as $data => $datamasterimps)

														<div class="card">
															<div class="card-header bg-primary text-white" id="headingOne" data-toggle="collapse" data-target="#{{$datamasterimps->PM_TEMPLATE_NAME}}" aria-expanded="false" aria-controls="collapseOne" role="button">

                                <div class="span-title">
                                  <div class="fas fa-bookmark"> Type: {{$datamasterimps->PM_TEMPLATE_NAME}}</div>

																</div>
																<div class="span-mode "></div>
															</div>
															<div id="{{$datamasterimps->PM_TEMPLATE_NAME}}" class="collapse" aria-labelledby="headingOne">
																<div class="card-body">
                                  <div class="table">
                                    <table class="table table-sm">
                                        <thead>
                                          <tr>
                                            <th scope="col" style="width:50px">ลำดับ</th>
                                            <th scope="col">รายการ PM</th>
                                            <th scope="col">Inspection Point</th>
                                            <th scope="col">ระยะเวลา</th>
                                            <th scope="col">ตรวจเช็คล่าสุด</th>
                                          <th></th>
                                            <th scope="col">ตรวจเช็คครั้งถัดไป</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                          @foreach ($masterimpsgroup->where('PM_TEMPLATE_UNID_REF',$datamasterimps->PM_TEMPLATE_UNID_REF) as $key => $dataimpsgroup)

                                            <tr>
                                              <form action="" method="post" enctype="multipart/form-data">
                                                <td><center>{{ $key+1 }}</center></td>
                                                <td>{{ $dataimpsgroup->PM_TEMPLATELIST_NAME }}</td>
                                                <td>{{ $dataimpsgroup->PM_TEMPLATELIST_POINT }}</td>
                                                <td>{{ $dataimpsgroup->PM_TEMPLATELIST_DAY / 30 }} เดือน</td>
                                                <td>
                                                  <input type="date" class="form-control" id="" name="" value="{{$dataimpsgroup->PM_LAST_DATE}}">
                                                  </td>
                                                <td><button type="button" class="btn btn-primary btn-link btn-sm btn-block my-1"><i class="fas fa-save fa-2x"></i></button></td>
                                                <td>
                                                  {{ $dataimpsgroup->PM_NEXT_DATE }}
                                                </td>
                                              </form>
                                            </tr>
                                          @endforeach
                                        </tbody>
                                    </table>
                                  </div>

																</div>
															</div>
														</div>
                          @endforeach
												</div>
        </div>
      </div>
    </div>
  </div>
</div>
