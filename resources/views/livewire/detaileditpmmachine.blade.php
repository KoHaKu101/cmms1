<div class="accordion accordion-primary" id="accordionExample">
  @foreach ($masterimps as $data => $datamasterimps)
    <div class="card">
      <div wire:click="show('{{$datamasterimps->PM_TEMPLATE_UNID_REF}}')" class="card-header bg-primary text-white" id="headingOne" >
        <div class="form-inline" id="datadate">
          <div class="fas fa-bookmark " data-toggle="collapse" data-target="#{{$datamasterimps->PM_TEMPLATE_UNID_REF}}" aria-expanded="false" aria-controls="collapseOne" role="button"> Type: {{$datamasterimps->PM_TEMPLATE_NAME}}</div>
          <div class="ml-5 mx-2"> วันที่ล่าสุด</div>
          <input type="date" class="form-control form-control-sm ml-1 SAVEDATE" id="PM_LAST_DATE"  name="PM_LAST_DATE" value="{{ $date->PM_LAST_DATE != NULL ? $date->PM_LAST_DATE : '' }}" rel="{{ $datamasterimps->UNID }}">
          <div class="ml-5 mx-2"> วันที่ตรวจเช็คครั้งถัดไป</div>
          <input type="date" class="form-control form-control-sm ml-1" id="PM_NEXT_DATE" value="{{ $date->PM_NEXT_DATE != NULL ? $date->PM_NEXT_DATE : '' }}" name="PM_NEXT_DATE" rel="{{ $datamasterimps->UNID }}" readonly>
          <div class="ml-5 mx-2"><button type="button" class="btn btn-success btn-sm" >Save</button></div>
        </div>
        <div class="span-mode" data-toggle="collapse" data-target="#{{$datamasterimps->PM_TEMPLATE_UNID_REF}}" aria-expanded="false" aria-controls="collapseOne" role="button">
        </div>
      </div>
      <div id="{{$datamasterimps->PM_TEMPLATE_UNID_REF}}" data-parent="#accordionExample" class="collapse {{ $open == $datamasterimps->PM_TEMPLATE_UNID_REF ? 'show' : '' }}" aria-labelledby="headingOne" wire:ignore.self>
        <div class="card-body">
          <div class="table">
            <table class="table table-sm">
              <thead>
                <tr>
                  <th style="width:50px">ลำดับ</th>
                  <th>รายการ PM</th>
                  <th>ระยะเวลา</th>
                  <th>รายละเอียดการตรวจเช็ค</th>
                </tr>
              </thead>
              <tbody >
                @if ($open == '1')
                  @foreach ($masterimpsgroup as $key => $dataimpsgroup)
                    <tr id='datadate'>
                        <td><center>{{ $key+1 }}</center></td>
                        <td>{{ $dataimpsgroup->PM_TEMPLATELIST_NAME }}</td>
                        <td>{{ $dataimpsgroup->PM_TEMPLATELIST_DAY / 30 }} เดือน</td>
                        <td>
                          {{ $machinepmtemplatadetail->where('PM_TEMPLATELIST_UNID_REF',$dataimpsgroup->PM_TEMPLATELIST_UNID_REF)->count() }}
                        </td>

                    </tr>
                  @endforeach
                @endif
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
@endforeach
</div>
