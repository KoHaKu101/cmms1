{{--
<style>
.modal-sm {
    max-width: 80% !important;
}
</style> --}}
<!-- Modal -->
<div class="modal fade" id="syschecksub" tabindex="-1" role="dialog" aria-labelledby="exampleModalLalavel" aria-hidden="true">
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
            <div class="col-md-6 col-lg-12">
              รายการ
            </div>

            </div>
            <div class="row ">
              @for($i =1; $i < 10 ; $i++)
              <div class="form-check">
                <label class="form-check-label">
                  <input class="form-check-input" type="checkbox" value="">
                  <span class="form-check-sign">{{ $i }}</span>
                </label>
              </div>
            @endfor
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
