{{--
<style>
.modal-sm {
    max-width: 80% !important;
}
</style> --}}
<!-- Modal -->
<div class="modal fade" id="syscheckmain" tabindex="-1" role="dialog" aria-labelledby="exampleModalLalavel" aria-hidden="true">
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
          <label>ระบบ</label>

          <form action="{{url('/machine/syscheck/store')}}" method="POST" enctype="multipart/form-data" >
            @csrf
            <div class="row ">
              
              @foreach ($machinesystemtable as $datasystable )
                <div class="col-md-6 col-lg-3">
                  <div class="form-check">
                    <label  class="form-check-label">
                      <input type="hidden" id="MACHINE_UNID_REF[]" name="MACHINE_UNID_REF[]" for="SYSTEM_CODE[]" value="{{ $dataset->UNID }}">
                      <input  class="form-check-input" type="checkbox" id="SYSTEM_CODE[]" name="SYSTEM_CODE[]" value="{{ $datasystable->SYSTEM_CODE }}">
                      <span class="form-check-sign">{{ $datasystable->SYSTEM_NAME }}</span>
                    </label>
                  </div>
                </div>
              @endforeach
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
