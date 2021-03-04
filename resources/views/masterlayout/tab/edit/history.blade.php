<div class="tab-pane" id="history">
  <div class="row">
    <div class="col-sm-12">
      <div class="jumbotron">
        <div class="col-md-8 col-lg-12">
          <div class="table">
          <table class="table table-bordered"  >
            <thead>
              <tr>
                <th class="bg-primary" colspan="6" >
                  <h3 align="center" style="color:white;" class="mt-2">ประวัติการแจ้งซ่อม</h3>
                </th>
              </tr>
              <tr>
                <th style="width:60px">
                  NO.
                </th>
                <th style="width:130px">
                  Docno
                </th>
                <th style="width:100px" >
                  Docdate
                </th>
                <th style="width:100px">
                  User Name
                </th>
                <th style="width:100px">
                  เวลา
                </th>
                <th>
                  อาการเสีย
                </th style="width:100px">
              </tr>

            </thead>
            <tbody>
              @foreach ($machinerepair as $key => $rowrepair)
                <tr>
                  <td style="width:60px"> {{ $key+1 }} </td>
                  <td style="width:150px"> {{ $rowrepair->MACHINE_DOCNO }} </td>
                  <td style="width:100px"> {{ $rowrepair->MACHINE_DOCDATE }} </td>
                  <td style="width:100px"> {{ $rowrepair->EMP_NAME }} </td>
                  <td style="width:100px"> {{ $rowrepair->CREATE_TIME }} </td>
                  <td style="width:150px"> {{ $rowrepair->MACHINE_CAUSE }} </td>
                </tr>
              @endforeach

            </tbody>
          </table>
        </div>
        </div>
      </div>
    </div>
  </div>
</div>
