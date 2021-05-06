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
          <div class="row ">
            <div class="col-md-6 col-lg-12">  การตรวจสอบเบื้องต้น  </div>
          </div>
            <div class="row">
              <div class="col-md-6 col-lg-4">
                <div class="form-group has-error">
                  <label for="MACHINE_DOCNO">เลขที่เอกสาร</label>
                  <input type="text" class="form-control" id="MACHINE_DOCNO" name="MACHINE_DOCNO" placeholder="เลขที่เอกสาร"  value="" readonly>
                </div>
              </div>
              <div class="col-md-6 col-lg-4">
                <div class="form-group has-error">
                  <label for="MACHINE_TIME">เวลาแจ้งซ่อม	</label>
                  <input type="text" class="form-control" id="MACHINE_TIME" name="MACHINE_TIME" value="" readonly>
                </div>
              </div>
              <div class="col-md-6 col-lg-4">
                <div class="form-group has-error">
                  <label for="MACHINE_DOCDATE">วันที่เอกสาร	</label>
                  <input type="text" class="form-control" id="MACHINE_DOCDATE" name="MACHINE_DOCDATE" value="" readonly >
                </div>
              </div>
            </div>
            <div class="row">
                <div class="col-md-8 col-lg-4">
                  <div class="form-group has-error">
                    <label for="MACHINE_CODE">รหัสเครื่อง</label>
                      <input type="text" class="form-control" id="MACHINE_CODE" name="MACHINE_CODE" value="" readonly >
                  </div>
                </div>
                <div class="col-md-8 col-lg-4">
                  <div class="form-group has-error">
                    <label for="MACHINE_LOCATION">Line</label>
                    <input type="text" class="form-control" id="MACHINE_LOCATION" name="MACHINE_LOCATION" value="" readonly>
                  </div>
                </div>
                <div class="col-md-8 col-lg-4">
                  <div class="form-group has-error">
                    <label for="MACHINE_NAME">ชื่อเครื่อง</label>
                    <input type="text" class="form-control" id="MACHINE_NAME" name="MACHINE_NAME"  value="" readonly>
                  </div>
                </div>
              </div>
            <div class="row">
              <div class="col-md-8 col-lg-6">
                <div class="form-group">
                  <label for="MACHINE_CAUSE">รายละเอียดอาการ</label>
                  <textarea class="form-control" id="MACHINE_CAUSE" name="MACHINE_CAUSE" rows="3"></textarea >
                </div>
              </div>
            </div>
            <hr>
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
              <div class="col-md-6 col-lg-12">  ดำเนินการซ่อมโดย  </div>
              <div class="col-md-6 col-lg-12">
                <div class="form-check">
								   <label class="form-check-label">
									   <input class="form-check-input" type="checkbox" value="">
									   <span class="form-check-sign">ช่างซ่อมภายนอก หรือ จ้างซ่อม</span>
								   </label>
						   </div>
             </div>
             <div class="col-md-6 col-lg-12">
               <div class="form-check">
                 <label class="form-check-label">
                   <input class="form-check-input" type="checkbox" value="">
                   <span class="form-check-sign">ช่างซ่อมภายในของบริษัท</span>
                 </label>
             </div>
            </div>
              <div class="col-md-6 col-lg-12" >
                <div class="form-check">
  					  	  <label class="form-radio-label">
  					  	  	<input class="form-radio-input" type="radio" name="1" value="" checked="">
  					  	  	<span class="form-radio-sign">ไม่เปลื่ยนอะไหล่</span>
  					  	  </label>
  					  	  <label class="form-radio-label ml-3">
  					  	  	<input class="form-radio-input" type="radio" name="1" value="">
  					  	  	<span class="form-radio-sign">เปลื่ยนอะไหล่</span>
  					  	  </label>
  					  	</div>
                <div class="form-check">
                  <label class="form-radio-label">
                    <input class="form-radio-input" type="radio" name="2" value="" checked="">
                    <span class="form-radio-sign">อะไหล่ภายใน</span>
                  </label>
                  <label class="form-radio-label ml-3">
                    <input class="form-radio-input" type="radio" name="2" value="">
                    <span class="form-radio-sign">อะไหล่ภายนอก</span>
                  </label>
                </div>
              </div>
              <div class="col-md-8 col-lg-3">
                  <label for="MACHINE_CAUSE">รายละเอียดอะไหล่ภายนอก</label>
              </div>
              <div class="col-md-8 col-lg-6">
                <textarea class="form-control" id="MACHINE_CAUSE" name="MACHINE_CAUSE" rows="3"></textarea >
              </div>
						</div>

            <div class="row mt-4">
              <div class="col-md-6 col-lg-4 has-error">
                <label>วันที่สั่งชื้อ</label>
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
                <label>รับเข้าวันที่</label>
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
            <div class="row mt-4">
                <div class="col-md-6 col-lg-12">  ดำเนินการซ่อม  </div>
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
                  <label>รวมระยะเวลาที่ใช้</label>
                <input type="text" class="form-control" id="PM_TEMPLATE_NAME" name="PM_TEMPLATE_NAME" value="0 วัน 0 ชั่วโมง 30 นาที" readonly>
              </div>
            </div>
            <div class="row mt-4">
              <div class="col-md-6 col-lg-4 has-error">
                <label>วันที่เสร็จ</label>
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
          <div class="row mt-4">
            <div class="col-md-8 col-lg-3">
                <label for="MACHINE_CAUSE">วิธีการแก้ไข</label>
            </div>
            <div class="col-md-8 col-lg-6">
              <textarea class="form-control" id="MACHINE_CAUSE" name="MACHINE_CAUSE" rows="3"></textarea >
            </div>
          </div>
          <div class="row mt-4">
            <div class="col-md-6 col-lg-2 has-error">
              <label>ช่างซ่อม 1</label>
            </div>
            <div class="col-md-6 col-lg-4 has-error">
              <input type="text" class="form-control" id="PM_TEMPLATE_NAME" name="PM_TEMPLATE_NAME">
            </div>
          </div>
          <div class="row mt-4">
            <div class="col-md-6 col-lg-2 has-error">
              <label>ช่างซ่อม 2</label>
            </div>
            <div class="col-md-6 col-lg-4 has-error">
              <input type="text" class="form-control" id="PM_TEMPLATE_NAME" name="PM_TEMPLATE_NAME">
            </div>
          </div>
          <div class="row mt-4">
            <div class="col-md-6 col-lg-2 has-error">
              <label>ช่างซ่อม 3</label>
            </div>
            <div class="col-md-6 col-lg-4 has-error">
              <input type="text" class="form-control" id="PM_TEMPLATE_NAME" name="PM_TEMPLATE_NAME">
            </div>
          </div>

          <div class="row mt-4">
            <div class="col-md-6 col-lg-2 has-error">
              <label>ผู้รายงาน</label>
            </div>
            <div class="col-md-6 col-lg-4 has-error">
              <input type="text" class="form-control" id="PM_TEMPLATE_NAME" name="PM_TEMPLATE_NAME">
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
