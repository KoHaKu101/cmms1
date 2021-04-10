<style>
.modal-md {
    max-width: 50% !important;
}
</style>
<div class="modal fade" id="Newpm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLalavel" aria-hidden="true">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
      <form action="{{ route('pmtemplate.storelist') }}" method="post" enctype="multipart/form-data">
        @csrf
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">รายการ PM</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="card-body ml-2">
              <div class="row ">
                <div class="col-md-6 col-lg-6">
                  ชือ รายการ PM
                </div>
                <div class="col-md-6 col-lg-6 has-error" id="sendunid" required autofocus>

                </div>
                <div class="col-md-6 col-lg-6">
                  ระยะเวลา
                </div>
                <div class="col-md-6 col-lg-6 has-error my-2">
                  <div class="selectgroup w-100">
											<label class="selectgroup-item">
												<input type="radio" name="PM_TEMPLATELIST_CHECK" value="1" class="selectgroup-input" checked="">
												<span class="selectgroup-button">เดือน</span>
											</label>
											<label class="selectgroup-item">
												<input type="radio" name="PM_TEMPLATELIST_CHECK" value="2" class="selectgroup-input">
												<span class="selectgroup-button">วัน</span>
											</label>
										</div>
                  <input type="text" class="form-control" name="PM_TEMPLATELIST_DAY"  placeholder="ใส่ระยะเวลา" required autofocus>
                </div>
                <div class="col-md-6 col-lg-6">
                  แจ้งเตือน
                </div>
                <div class="col-md-6 col-lg-6 has-error">
                  <input type="text" class="form-control" name="PM_TEMPLATELIST_NOTIFY" placeholder="ใส่ระยะเวลา" required autofocus>
                </div>
                <div class="col-md-6 col-lg-6">
                  ตรวจเช็คครั้งแรก
                </div>
                <div class="col-md-6 col-lg-6 has-error my-2">
                  <input type="date" class="form-control" name="PM_TEMPLATELIST_LASTDUE" required autofocus>
                </div>

              </div>


              </div>

            </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
          </div>
      </form>
    </div>
  </div>
</div>
</div>
