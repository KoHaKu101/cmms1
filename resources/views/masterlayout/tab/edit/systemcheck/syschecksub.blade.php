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
      <form action="{{ url('/machine/syschecksub/store') }}"  method="POST" enctype="multipart/form-data">
        @csrf

      <div class="modal-body">
        <div class="card-body ml-2">
          <div class="row ">
            <div class="col-md-6 col-lg-12">
              รายการ
            </div>

            </div>
            <div class="row ">
              @foreach($machinesystemsub as $datasystemsub )
              <div class="form-check">
                <label class="form-check-label">
                  <input  type="hidden" name="SYSTEM_CODE[]" value="{{$dataname->SYSTEM_CODE}}">
                  <input  type="hidden" name="SYSTEMCHECK_UNID_REF[]" value="{{$dataname->UNID}}">
                  <input  type="hidden" name="SYSTEMSUB_NAME[]" value="{{ $datasystemsub->SYSTEMSUB_NAME }}">
                  <input class="form-check-input" type="checkbox" name="SYSTEMSUB_CODE[]" value="{{ $datasystemsub->SYSTEMSUB_CODE }}">
                  <span class="form-check-sign"  >{{ $datasystemsub->SYSTEMSUB_NAME }}</span>
                </label>
              </div>
            @endforeach
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
