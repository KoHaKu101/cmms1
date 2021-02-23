<div class="tab-pane" id="partchange" >
  <div class="row " >
    <div class="col-sm-12 ">
      <div class="jumbotron">
        <div class="col-md-8 col-lg-12">
          <div class="table">
            <table class="table table-sm"  >
              <thead>
                <tr>
                  <th class="bg-primary" colspan="8" >
                    <h3 align="center" style="color:white;" class="mt-2">อะไหล่ที่ต้องเปลี่ยน</h3>
                  </th>
                  <th class="bg-primary" >
                    <a href="{{ url('machine/partcheck/add/'.$dataset->UNID) }}">
                    <button  type="button" class="btn btn-warning float-right btn-sm"
                    ><span style="color:black;font-size:14px">เพิ่มรายการอะไหล่</span></button>
                  </a>
                  <input type="hidden" value="{{ $dataset->UNID }}">
                  </th>
                </tr>
                <tr>
                  <th>
                  </th>
                  <th colspan="2">
                    รายการอะไหล่

                  </th>

                  <th  colspan="2">
                    เปลี่ยนประจำเดือน

                  </th>
                  <th  colspan="2">
                    วันที่เปลี่ยนล่าสุด

                  </th>
                  <th >
                    วันที่เปลี่ยน

                  </th>
                  <th colspan="2">
                    รายการครบกำหนดเปลี่ยน

                  </th>

                  </tr>
                </thead>
                <tbody>
              <tr>
                <td>
                  1
                </td>

                <td colspan="2">
                   สายพาน
                </td>
                <td colspan="2">
                  3 เดือน
                </td>
                <td colspan="2">
                3เดือน
                </td>
                <td >
                <input type="date" class="form-control">
                </td>
                <td colspan="2">
                  ครบกำหนด 3 รายการ

                </td>

              </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
