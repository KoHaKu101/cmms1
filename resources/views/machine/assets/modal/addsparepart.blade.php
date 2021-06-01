<style>
  .modal-lg{
        max-width: 1000px;
  }
</style>
<div class="modal fade" id="modal-addsparepart" tabindex="-1" role="dialog" aria-labelledby="exampleModalLalavel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-content">

          <div class="modal-header bg-primary">
            <h5 class="modal-title">เพิ่มรายการ SparePart</h5>
            <button type="close" class="btn btn-warning btn-sm" data-dismiss="modal"><i class="fas fa-window-close fa-lg mr-1"></i>Close</button>
          </div>
          <div class="modal-body">
            <input type="hidden" id="MACHINE_UNID"  name="MACHINE_UNID" >

            <table class="table table-bordered table-head-bg-info table-bordered-bd-info" id="machine_list" name="machine_list">
                <thead>
                  <tr>
                    <th scope="col" width="250px">Name</th>
                    <th scope="col">Code</th>
                    <th scope="col">วาระการเปลี่ยน (เดือน)</th>
                    <th scope="col">วันที่เริ่ม</th>
                    <th scope="col">จำนวน</th>
                  </tr>
                </thead>
               <tbody class="data-machine">

               </tbody>
             </table>
        </div>
      </div>
    </div>
  </div>
</div>
