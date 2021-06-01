@php
  if (isset($DATA_CHECKSHEET)) {
    $img_array = array();
    $img_unidarray = array();
    foreach ($DATA_CHECKSHEET as $index => $row_img) {
      $img_array[$row_img->MACHINE_UNID] = $row_img->FILE_NAME;
      $img_unidarray[$row_img->MACHINE_UNID] = $row_img->UNID;
    }
  }
@endphp
<div class="card-body">
  <div class="col-md-12">
    <div class="table-responsive">
      <table class="table table-bordered table-head-bg-info table-bordered-bd-info">
        <thead>
          <tr>
            <th  width="20px">#</th>
            <th  width="120px">Machine NO.</th>
            <th  width="300px">Machine Name</th>
            <th  width="50px">LINE</th>
            <th  width="90px">Upload</th>
            <th width="100px">View</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($DATA_MACHINE as $index => $row_machine)
          <tr>
            <td class="text-center">{{ $index+1 }}</td>
            <td>{{$row_machine->MACHINE_CODE}}</td>
            <td>{{$row_machine->MACHINE_NAME_V2}}</td>
            <td>{{$row_machine->MACHINE_LINE}}</td>
            <td><button type="button" class="btn btn-secondary btn-block btn-sm my-1 BTN_UPLOAD" onclick="uploadimg(this)"
              data-mccode="{{$row_machine->MACHINE_CODE}}"
              data-mcunid="{{ $row_machine->UNID }}"
              data-toggle="modal"id="{{ $row_machine->UNID }}" name="{{ $row_machine->UNID }}"
              >
              <i class="fas fas fa-image fa-lg mr-1"></i>
               Upload</button></td>
            <td>
              <button type="button" class="btn btn-primary btn-sm mx-1 my-1 view-img" onclick="viewimg(this)"
                data-img="{{ isset($img_array[$row_machine->UNID]) ? $img_array[$row_machine->UNID] : '' }}"
                data-mccode="{{ $row_machine->MACHINE_CODE }}"
                style="display:{{isset($img_array[$row_machine->UNID]) ? '' : 'none'}};">
                <i class="fas fa-eye fa-lg"></i> View
              </button>
              <button type="button" class="btn btn-danger btn-sm mx-1 my-1"
                onclick="deleteimg(this)"
                data-imgunid="{{ isset($img_unidarray[$row_machine->UNID]) ? $img_unidarray[$row_machine->UNID] : '' }}"
                data-mccode="{{ $row_machine->MACHINE_CODE }}"
                style="display:{{isset($img_array[$row_machine->UNID]) ? '' : 'none'}};">
                <i class="fas fa-trash fa-lg"></i> Delete
              </button></td>
          </tr>
          @endforeach


        </tbody>
      </table>
    </div>
    {{ $DATA_MACHINE->links() }}
  </div>
</div>
