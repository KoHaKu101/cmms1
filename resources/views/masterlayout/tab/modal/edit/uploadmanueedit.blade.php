<!-- Modal upload -->
<div class="modal fade" id="exampleModal5" tabindex="-1" role="dialog" aria-labelledby="exampleModalLalavel" aria-hidden="true">
  <div class="modal-dialog modal-md">
    <div class="modal-content ">
      <div class="modal-header">

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
				<form action="{{ url('machine/upload/update/'.$dataset->UNID) }}" method="POST" enctype="multipart/form-data">
					@csrf
				<div class="row">
					<div class="col-md-12 col-lg-12">
						<div class="form-group">
							<label for="TOPIC_NAME">ชื่อคู่มือ</label>

                <input type="text" class="form-control form-control-sm" id="TOPIC_NAME" name="TOPIC_NAME" value="{{ $dataset->TOPIC_NAME }}">
                  <input type="hidden" class="form-control" id="MACHINE_CODE" name="MACHINE_CODE"  value="{{ $dataset->MACHINE_CODE }}">
                  <input type="hidden"  id="UNID"    name="UNID"  value="{{ $dataset->UNID }}">


						</div>
					</div>
				</div>
			<div class="row">
				<div class="col-md-12 col-lg-12">
					<div class="form-group">
						<label for="FILE_UPLOAD">Upload file</label>
						<input type="file" class="form-control-file" id="FILE_UPLOAD" name="FILE_UPLOAD" >

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
