<!-- Modal -->

{{-- เพิ่มอะไหล่ --}}
<div class="modal fade" id="modal-machinesparepart" tabindex="-1" role="dialog" aria-labelledby="exampleModalLalavel" aria-hidden="true">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
      <div class="modal-content">
        <form action="{{ route('MachineSparPart.Update') }}" method="POST" id="FRM_MACHINESPAREPART_UPDATE" name="FRM_MACHINESPAREPART_UPDATE">
          @csrf
        <input type="hidden" id="MACHINESPAREPART_UNID" name="MACHINESPAREPART_UNID">
        <div class="modal-header bg-primary">
          <h5 class="modal-title" id="tital_name">ข้อมูล Sparepart</h5>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="SPAREPART_CODE">วันที่เปลี่ยนล่าสุด</label>
                <input type="date" class="form-control" id="PLAN_DATE" name="PLAN_DATE"  >
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="SPAREPART_CODE">รอบ(เดือน)</label>
                <input type="number" class="form-control" id="PERIOD" name="PERIOD" max=12 min=0 >
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="SPAREPART_CODE">จำนวน</label>
                <input type="number" class="form-control" id="SPAREPART_QTY" name="SPAREPART_QTY" min=0>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label for="comment">Remark</label>
                <textarea class="form-control" id="REMARK" name="REMARK" rows="2"></textarea>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <label for="comment" class="mr-2">Status</label>
              <!-- Rounded switch -->
              <label class="switch">
                <input type="checkbox" id="STATUS" name="STATUS" value="9" checked>
                <span class="slider round"></span>
              </label>
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
