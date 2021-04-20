<div class="row">
<div class="col-md-6 col-lg-4">
  <div class="form-group has-error">
    <label for="EMP_NAME">รหัสพนักงาน</label>
    <input type="text" wire:model="search" class="form-control" id="EMP_CODE" name="EMP_CODE" >
  </div>
</div>

<div class="col-md-6 col-lg-4">
  <div class="form-group has-error">
    <label for="EMP_CODE">ชื่อพนักงาน	</label>
    <input type="text"  class="form-control" id="EMP_NAME" name="EMP_NAME" value="{{ $emp == NULL ? "" : $emp->EMP_NAME }}" readonly>
  </div>
</div>
</div>
