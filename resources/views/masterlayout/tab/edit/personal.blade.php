<div class="tab-pane" id="personal" >
  <div class="row">
    <div class="col-sm-12">
      <div class="jumbotron">
        <div class="col-md-8 col-lg-12">
          <div class="table">
            <table class="table table-sm"  >
              <thead>
                <tr>
                  <th class="bg-primary" colspan="8" >
                    <h3 align="center" style="color:white;" class="mt-2">พนักนักงานประจำเครื่อง</h3>
                  </th>
                </tr>
                <tr>
                  <th scope="col">
                    ลำดับ
                  </th>
                  <th scope="col">
                    รหัสพนักงาน
                  </th>

                  <th scope="col">
                    ชื่อพนักงาน
                  </th>
                  <th scope="col">
                    นามสกุล
                  </th>
                  <th scope="col">
                    ประเทศ
                    </th>
                    <th scope="col">
                      กะพนักงาน
                    </th>
                    <th scope="col">
                      ประเภทพนักงาน
                    </th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($machineemp as $key => $rowmachineemp)
              <tr>

                <td> {{ $key+1 }} </td>
                <td> {{ $rowmachineemp->EMP_CODE }}</td>
                <td> {{ $rowmachineemp->EMP_NAME }}</td>
                <td>{{ $rowmachineemp->EMP_NAME_LAST }}</td>
                <td>{{ $rowmachineemp->COUNTRY_CODE }}</td>
                <td>{{ $rowmachineemp->EMP_KA }}</td>
                <td> {{ $rowmachineemp->EMP_TYPE = '2' ? 'พนักงานรอง' : 'พนักงานหลัก' }}</td>

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
