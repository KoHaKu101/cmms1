<style>
.modal-sm {
    max-width: 30% !important;
}
.modal-ms {
    max-width: 50% !important;
}
</style>
{{-- ปิดเอกสาร --}}
<div class="modal fade" id="CloseRepair" tabindex="-1" role="dialog" aria-labelledby="exampleModalLalavel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">ปิดเอกสารการซ่อม MC-001</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ route('pmtemplate.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="modal-body">
          <div class="card-body ml-2">
            <div class="row ">
              <div class="col-md-6 col-lg-12">  การตรวจสอบเบื้องต้น  </div>
            </div>
						<hr>

            <div class="row mt-4">
              <div class="col-md-6 col-lg-4 has-error">
								<label>วันที่เริ่ม</label>
                <input type="date" class="form-control" id="PM_TEMPLATE_NAME" name="PM_TEMPLATE_NAME">
              </div>
							<div class="col-md-6 col-lg-4 has-error">
									<label>เวลา</label>
                <input type="time" class="form-control" id="PM_TEMPLATE_NAME" name="PM_TEMPLATE_NAME">
              </div>
							<div class="col-md-6 col-lg-4 has-error">
									<label>รวมระยะเวลาที่ใช้</label>
                <input type="text" class="form-control" id="PM_TEMPLATE_NAME" name="PM_TEMPLATE_NAME" value="0 วัน 0 ชั่วโมง 30 นาที" readonly>
              </div>
						</div>
						<div class="row mt-4">
							<div class="col-md-6 col-lg-4 has-error">
								<label>วันที่เริ่ม</label>

								<input type="date" class="form-control" id="PM_TEMPLATE_NAME" name="PM_TEMPLATE_NAME">
							</div>
							<div class="col-md-6 col-lg-4 has-error">
									<label>เวลา</label>
								<input type="time" class="form-control" id="PM_TEMPLATE_NAME" name="PM_TEMPLATE_NAME">
							</div>
							<div class="col-md-6 col-lg-4 has-error">
									<label>เวลาซ่อม (นาที)</label>
								<input type="text" class="form-control" id="PM_TEMPLATE_NAME" name="PM_TEMPLATE_NAME" value="30 นาที" readonly>
							</div>
						</div>
						<hr>
						<div class="row ">
              <div class="col-md-6 col-lg-12">  การดำเนินการแก้ไข  </div>
            </div>
						<hr>
						<div class="row">
						</div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save</button>
        </div>
      </form>
    </div>
  </div>
</div>
</div>
