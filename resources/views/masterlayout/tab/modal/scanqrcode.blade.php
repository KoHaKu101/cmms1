<style>
.modal-sm {
    max-width: 50% !important;
}
</style>
<!-- Modal upload -->
<div class="modal fade" id="Scan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLalavel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content ">
      <div class="modal-header">

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
  				<div class="row">
  					<div class="col-md-6 col-lg-12">
              <form id=search action="#">
  						<div class="form-group has-error">
  							<label for="MACHINE_CODE">แสกนQR Code/กรอกรหัสเครื่อง</label>
                <div class="form-group form-inline">
                  <div class="input-group col-md-6 col-lg-12 ml--4">
  								<input type="search" class="form-control form-control-sm" id="MACHINE_CODE" name="MACHINE_CODE">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="input-group-prepend">
                      <button type="button" class="btn btn-danger btn-sm">
                        <i class="fas fa-search"></i>
                      </button>
                    </div>
                  </div>
                </div>
  						</div>
            </form>
  					</div>
  				</div>

          <div class="row">
            {{-- @foreach ($dataset as $key => $dataitem) --}}
              <div class="col-md-6 col-lg-5">
                <div class="card card-post card-round">

                  <div class="card-body">

                      {{-- @foreach ($datasearch as $dataitem) --}}
                      {{-- {{ $dataitem->MACHINE_CODE }} --}}
  {{-- {{$dataitem->MACHINE_LINE}} --}}
                      {{-- @endforeach --}}
                      <h3>  <b>รหัสเครื่อง</b>  </h3>
                      <h4>  <b>Line</b> </h4>
                      <center class="bg-success">
                        <button type="button" class="btn btn-success" id="getRequest">เลือก</button>

                      <input type="hidden" value="">
                  </div>

                </div>
              </div>
            {{-- @endforeach --}}
          </div>
            </div>
		        <div class="modal-footer">
  	           <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	              <input type="submit" class="btn btn-primary" value="Save changes"></input>
            </div>

      </div>
    </div>
</div>
