<div class="accordion accordion-primary ">
  @foreach ($masterimps as $data => $datamasterimps)

  <div class="card">
    <div wire:click="$emit('show','{{$datamasterimps->PM_TEMPLATE_UNID_REF}}','{{$datamasterimps->MACHINE_CODE}}')" class="card-header bg-primary text-white" id="headingOne" data-toggle="collapse" data-target="#{{$datamasterimps->PM_TEMPLATE_UNID_REF}}" aria-expanded="false" aria-controls="collapseOne" role="button">

      <div class="span-title">
        <div class="fas fa-bookmark"> Type: {{$datamasterimps->PM_TEMPLATE_NAME}}</div>

      </div>
      <div class="span-mode"></div>
    </div>
    <div id="{{$datamasterimps->PM_TEMPLATE_UNID_REF}}" class="collapse" aria-labelledby="headingOne" wire:ignore.self>
      <div class="card-body">
        <div class="table">
          <table class="table table-sm">
              <thead>
                <tr>
                  <th scope="col" style="width:50px">ลำดับ</th>
                  <th scope="col">รายการ PM</th>
                  <th scope="col">ระยะเวลา</th>
                  <th scope="col">ตรวจเช็คล่าสุด</th>
                <th></th>
                  <th scope="col">ตรวจเช็คครั้งถัดไป</th>
                </tr>
              </thead>
              <tbody >

                  @foreach ($masterimpsgroup as $key => $dataimpsgroup)

                    <tr id="datadate">
                        <td><center>{{ $key+1 }}</center></td>
                        <td>{{ $dataimpsgroup->PM_TEMPLATELIST_NAME }}</td>
                        <td>{{ $dataimpsgroup->PM_TEMPLATELIST_DAY / 30 }} เดือน</td>
                        <td>
                          <input type="date" class="form-control" id="PM_LAST_DATE" value="{{$dataimpsgroup->PM_LAST_DATE}}" name="PM_LAST_DATE" rel="{{ $dataimpsgroup->UNID }}" >
                          </td>
                        <td><button type="button" id="savedate" class="btn btn-primary btn-link btn-sm btn-block my-1"><i class="fas fa-save fa-2x"></i></button></td>
                        <td >
                          <input type="text" id="PM_NEXT_DATE" name="PM_NEXT_DATE" class="form-control" value="{{ $dataimpsgroup->PM_NEXT_DATE }}" rel="{{ $dataimpsgroup->UNID }}" readonly>
                        {{-- onclick="savedate('{{ $dataimpsgroup->UNID }}')"  id="savedate"--}}
                        </td>
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
