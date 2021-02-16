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
				<form action="{{ url('machine/upload/update/'.$data_set->upload->UNID) }}" method="POST" enctype="multipart/form-data">
					@csrf
				<div class="row">
					<div class="col-md-12 col-lg-12">
						<div class="form-group">
							<label for="TOPIC_NAME">ชื่อคู่มือ</label>a
								<input type="text" class="form-control form-control-sm" id="TOPIC_NAME" name="TOPIC_NAME" value="{{ $data_set->upload->TOPIC_NAME }}">
                	<input type="hidden" class="form-control" id="MACHINE_CODE" name="MACHINE_CODE"  value="{{ $data_set->upload->MACHINE_CODE }}">
                  <input type="hidden"  id="UNID"    name="UNID"  value="{{ $data_set->upload->UNID }}">
                  <input type="hidden"  id="UPLOAD_UNID_REF"    name="UPLOAD_UNID_REF"  value="{{ $data_set->upload->UPLOAD_UNID_REF }}">
						</div>
					</div>
				</div>
			<div class="row">
				<div class="col-md-12 col-lg-12">
					<div class="form-group">
						<label for="FILE_UPLOAD">Example file input</label>
						<input type="file" class="form-control-file" id="FILE_UPLOAD" name="FILE_UPLOAD" value="{{ $data_set->upload->FILE_UPLOAD }}" >

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
