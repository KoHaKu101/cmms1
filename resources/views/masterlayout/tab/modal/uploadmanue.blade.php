<!-- Modal upload -->
<div class="modal fade" id="exampleModal4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLalavel" aria-hidden="true">
  <div class="modal-dialog modal-md">
    <div class="modal-content ">
      <div class="modal-header">

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
				<form action="{{ route('machine.storeupload') }}" method="POST" enctype="multipart/form-data">
					@csrf
  				<div class="row">
  					<div class="col-md-12 col-lg-12">
  						<div class="form-group">
  							<label for="TOPIC_NAME">ชื่อรายการเอก/คู่มือ</label>
  								<input type="text" class="form-control form-control-sm" id="TOPIC_NAME" name="TOPIC_NAME" placeholder="ชื่อคู่มือ">
                  <input type="hidden" class="form-control" id="MACHINE_CODE" name="MACHINE_CODE"  value="{{ $dataset->MACHINE_CODE }}">
                  {{-- <input type="hidden"  id="UPLOAD_UNID_REF"    name="UPLOAD_UNID_REF"  value="{{ $dataset['UNID'] }}"> --}}
                    {{-- <input type="hidden"  id="UPLOAD_UNID_REF" name="UPLOAD_UNID_REF" value="{{ $dataset->UNID }}"> --}}
  						</div>
  					</div>
  				</div>

  			  <div class="row">
  			      <div class="col-md-12 col-lg-12">
  				       <div class="form-group">
  				 	        <label for="FILE_UPLOAD">Example file input</label>
                	  <input type="file" class="form-control-file" id="FILE_UPLOAD" name="FILE_UPLOAD" required >
  					     </div>
  				    </div>
  			  </div>
            </div>
		        <div class="modal-footer">
  	           <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	              <input type="submit" class="btn btn-primary" value="Save changes"></input>
            </div>
	      </form>
      </div>
</div>
</div>
