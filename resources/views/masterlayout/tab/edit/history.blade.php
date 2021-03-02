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
                <th style="width:70px">
                  NO.FIX
                </th>
                <th style="width:100px">
                  Docno
                </th>
                <th style="width:100px" >
                  Docdate
                </th>
                <th>
                  User Name
                </th>
                <th>
                  Time
                </th>
                <th>
                  Description
                </th>
              </tr>

            </thead>
            <tbody>
              @foreach ($repairresults as $key => $rowrepair)
                <tr>
                  <td> {{ $key+1 }} </td>
                  <td> {{ $rowrepair->DOCNO }} </td>
                  <td> {{ $rowrepair->DOCDATE }} </td>
                  <td> {{ $rowrepair->MODIFY_BY }} </td>
                  <td> {{ $rowrepair->CREATE_TIME }} </td>
                  <td> {{ $rowrepair->NOTE }} </td>
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
