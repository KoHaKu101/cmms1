{{-- <!-- Modal upload -->
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
          @foreach ($dataupload1 as $key => $value)


				<div class="row">
					<div class="col-md-12 col-lg-12">
						<div class="form-group">
							<label for="TOPIC_NAME">ชื่อคู่มือ</label>

                <input type="text" class="form-control form-control-sm" id="TOPIC_NAME" name="TOPIC_NAME" value="{{ $value->TOPIC_NAME }}">
                  <input type="hidden" class="form-control" id="MACHINE_CODE" name="MACHINE_CODE"  value="{{ $dataset->MACHINE_CODE }}">
                  <input type="hidden"  id="UNID"    name="UNID"  value="{{ $dataset->UNID }}">
                  <input type="hidden"  id="UNID"    name="UNID"  value="{{ $value->UNID }}">


						</div>
					</div>
				</div>
			<div class="row">
				<div class="col-md-12 col-lg-12">
					<div class="form-group">
						<label for="FILE_UPLOAD">Upload file</label>
						<input type="file" class="form-control-file" id="FILE_UPLOAD" name="FILE_UPLOAD" value="{{ $value->FILE_UPLOAD }}">

            <input type="hidden" id="FILE_UPDATE" name="FILE_UPDATE" value="{{ $dataset->FILE_UPLOAD }}" >
            <input type="hidden" id="FILE_SIZE" name="FILE_SIZE" value="{{ $dataset->FILE_SIZE }}" >
            <input type="hidden" id="FILE_EXTENSION" name="FILE_EXTENSION" value="{{ $dataset->FILE_EXTENSION }}" >
            <input type="hidden" id="FILE_NAMEFILE_NAME" name="FILE_NAME" value="{{ $dataset->FILE_NAME }}" >
            <input type="hidden" id="FILE_UPLOADDATETIME" name="FILE_UPLOADDATETIME" value="{{ $dataset->FILE_UPLOADDATETIME }}" >
            @endforeach


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
</div> --}}
