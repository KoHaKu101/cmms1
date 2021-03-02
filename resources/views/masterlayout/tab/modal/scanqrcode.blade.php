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

  						<div class="form-group has-error">
  							<label for="MACHINE_CODE">แสกนQR Code/กรอกรหัสเครื่อง</label>
                {{-- <form  action="javascript:search();"> --}}
                <div class="form-group form-inline">
                  <div class="input-group col-md-6 col-lg-12 ml--4">

  								   <input type="text" name="search" id="search" class="form-control" placeholder="Search Customer Data" />
                              <div class="input-group-prepend">
                                <button type="submit" class="btn btn-danger btn-sm">
                                  <i class="fas fa-search"></i>
                                </button>
                              </div>

                  </div>
                </div>
                {{-- </form> --}}
  						</div>

  					</div>
  				</div>
          <div class="row">
              <div class="col-md-6 col-lg-5">
                <div class="card card-post card-round">

                  <div class="card-body">

                    <div class="table-responsive">
                      <h3 align="center">Total Data : <span id="total_records"></span></h3>
                      <table class="table table-striped table-bordered">
                        <thead>
                          <tr>
                            <th>Customer Name</th>
                            <th>Address</th>
                            <th>City</th>
                            <th>Postal Code</th>
                            <th>Country</th>
                          </tr>
                        </thead>
                        <tbody>
                          
                        </tbody>
                      </table>
                    </div>
                </div>

                </div>
              </div>

          </div>
            </div>
		        <div class="modal-footer">
  	           <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>

      </div>
    </div>
</div>
