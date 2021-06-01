<div class="accordion accordion-primary"  id="accordionExample" >
  @foreach ($masterimps as $data => $datamasterimps)
    <div class="card">
      <div class="card-header bg-primary text-white" id="headingOne" >
        <div class="col-md-12" id="datadate">
          <div class="row">
            <div class="col-md-3 col-lg-3" id="clickshowpmlist" data-toggle="collapse" data-target="#{{$datamasterimps->PM_TEMPLATE_UNID_REF}}"
              aria-expanded="false" aria-controls="collapseOne" role="button" >
              <div class="fas fa-bookmark my-3" > Type: {{$datamasterimps->PM_TEMPLATE_NAME}}</div>
            </div>
            <div class="col-md-6 col-lg-4 form-inline" >
              ตรวจเช็คล่าสุด
                <input type="date" style="width:150px" class="form-control form-control-sm ml-1 changedate" data-dataunidpmlist="{{$datamasterimps->PM_TEMPLATE_UNID_REF}}"
                id="PM_LAST_DATE_{{$datamasterimps->PM_TEMPLATE_UNID_REF}}"  name="PM_LAST_DATE"
                 value="{{ $dataset->rank != NULL ? \Carbon\Carbon::parse($datamasterimps->PM_LAST_DATE)->toDateString() : '' }}">
                 <button type="button" class="btn btn-success btn-sm mx-1" id="savedate" ><i class="fas fa-save fa-lg" style="color:white"></i></button>

            </div>

            <div class="col-md-6 col-lg-3 form-inline" >
               ครั้งถัดไป
                <input type="text" class="form-control form-control-sm ml-1" id="PM_NEXT_DATE_{{$datamasterimps->PM_TEMPLATE_UNID_REF}}" name="PM_NEXT_DATE" style="width:150px"
                value="{{ $dataset->rank != NULL ? \Carbon\Carbon::parse($datamasterimps->PM_LAST_DATE)->addMonth($rank)->format('d/m/Y') : '' }}" readonly>
            </div>
            <div class="col-md-2 col-lg-2 mt-2 text-center" id="clickshowpmlist" data-toggle="collapse" data-target="#{{$datamasterimps->PM_TEMPLATE_UNID_REF}}" aria-expanded="false" aria-controls="collapseOne" role="button">
              <i class="fas fa-caret-down "></i>
              <input type="hidden" id="dataunidpmlist" name="dataunidpmlist" value="{{$datamasterimps->PM_TEMPLATE_UNID_REF}}">
            </div>
          </div>
        </div>
      </div>
      <div id="{{$datamasterimps->PM_TEMPLATE_UNID_REF}}" data-parent="#accordionExample" class="collapse {{$data+1 == 1 ? 'show' : ''}}" aria-labelledby="headingOne" wire:ignore.self>
        <div class="card-body">
          <div class="col-md-12 col-lg-12">
            <div class="row">
              <div class="table col-md-6 col-lg-6">
                <table class="table table table-sm table-bordered">
                  <thead>
                    <tr>
                      <th style="width:5px">ลำดับ</th>
                      <th colspan="2">รายการ PM</th>
                    </tr>
                  </thead>
                  @php
                    $pmlistcount =  1;
                  @endphp
                  <tbody class="{{$datamasterimps->PM_TEMPLATE_UNID_REF}}">
                    @foreach ($masterimpsgroup->where('PM_TEMPLATE_UNID_REF',$datamasterimps->PM_TEMPLATE_UNID_REF)->where('MACHINE_CODE',$MACHINE_CODE) as $key => $datamasterimpsgroup)
                      <tr>
                       <td><center>{{$pmlistcount++}}</center></td>
                       <td>{{$datamasterimpsgroup->PM_TEMPLATELIST_NAME}}</td>
                       <td style="width:40px">
                         <button type="button" class="btn btn-primary btn-block btn-sm my-1 detail" id="{{ $datamasterimpsgroup->PM_TEMPLATELIST_UNID_REF }}" >
                         รายละเอียด<i class="fas fa-caret-right mx-2"></i></button>
                       </td>
                     </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
              <div class="table col-md-6 col-lg-6" >


                @foreach ($masterimpsgroup->where('PM_TEMPLATE_UNID_REF',$datamasterimps->PM_TEMPLATE_UNID_REF)->where('MACHINE_CODE',$MACHINE_CODE) as $datamasterimpsgroupsub)
                <table class="table table-sm table-bordered pmlistdetail" id="{{ $datamasterimpsgroupsub->PM_TEMPLATELIST_UNID_REF}}-1">
                    <thead>
                      <tr>
                        <th colspan="2">รายละเอียด{{ $datamasterimpsgroupsub->PM_TEMPLATELIST_NAME }}</th>
                      </tr>
                    </thead>
                    <tbody >
                      @php
                        $pmlistdetailcount =1;
                      @endphp
                      @foreach ($pmlistdetail->where('PM_TEMPLATELIST_UNID_REF',$datamasterimpsgroupsub->PM_TEMPLATELIST_UNID_REF) as $key => $datapmlistdetail)
                        <tr>
                          <td style="width:25px" class="text-center">{{ $pmlistdetailcount++ }}</td>
                          <td style="width:330px">{{$datapmlistdetail->PM_DETAIL_NAME}}</td>
                          <td>{{ $datapmlistdetail->PM_DETAIL_STD }}</td>
                        </tr>
                      @endforeach
                    </tbody>

                </table>
                  @endforeach
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  @endforeach
</div>
