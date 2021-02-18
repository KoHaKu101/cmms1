{{--
<style>
.modal-sm {
    max-width: 80% !important;
}
</style> --}}
<!-- Modal -->
<div class="modal fade" id="syscheckadd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLalavel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">เพิ่มรายการ</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="card-body ml-2">

          <div class="row ">
            <div class="col-md-6 col-lg-6">
              ระบบ
            </div>
            <div class="col-md-6 col-lg-6">
              <select class="form-control">
                <option value="">--ทั้งหมด--</option>
                <option value="1">มอเตอร์</option>
                <option value="2">ไฟฟ้า</option>
                <option value="3">ความเย็น</option>
              </select>
            </div>
          </div>

          <div class="row ">
            <div class="col-md-6 col-lg-6">
              รายการ
            </div>
            <div class="col-md-6 col-lg-6 ">
              <select class="form-control">
                <option value="">--ทั้งหมด--</option>
                <option value="1">มอเตอร์</option>
                <option value="2">ไฟฟ้า</option>
                <option value="3">ความเย็น</option>
              </select>
            </div>
          </div>
              <div class="row ">
            <div class="col-md-6 col-lg-6">
              ตรวจเช็คประจำเดือน
            </div>
            <div class="col-md-6 col-lg-6">
              <input type="text" class="form-control" placeholder="ใสจำนวนเดือน">
            </div>
          </div>
          </div>

        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
</div>
