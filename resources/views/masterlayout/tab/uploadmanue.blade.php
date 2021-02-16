<div class="tab-pane" id="uploadmanue" >
  <div class="row " >
    <div class="col-sm-12 ">
      <div class="jumbotron">
        <div class="col-md-8 col-lg-12">
          <div class="table">
            <table class="table table-sm"  >
              <thead>
                <tr>
                  <th class="bg-primary" colspan="7" >
                    <h3 align="center" style="color:white;" class="mt-2">คู่มือ</h3>
                  </th>
                  <th class="bg-primary" >
                    <button  id="popup" type="button" class="btn btn-warning float-right "
                      data-toggle="modal" data-target="#exampleModal4">
                      <i class="fas fa-cloud-upload-alt" style="color:black">Upload</i>
                    </button>
                  </th>
                </tr>



                <tr>
                  <th>
                  </th>
                  <th colspan="2">
                    ชื่อรายการคู่มือ
                  </th>
                  <th>
                    ชื่อไฟล์
                  </th>
                  <th>
                    ประเภทไฟล์(Type)
                  </th>
                  <th>
                    ขนาดไฟล์
                  </th>
                  <th>
                  </th>
                  <th>
                    วันที่อัปโหลด
                  </th>
                  </tr>
                </thead>
                <tbody>

                  {{-- @foreach ($data_up as $key => $data_up) --}}


                  {{-- @foreach ($data_set as $data_set) --}}
              <tr>
                <td>
                  1
                </td>
                <td colspan="2">
                  <h5>{{ $data_set->upload->TOPIC_NAME }}</h5>
                  {{-- <input type="text" value="{{ $data_up->TOPIC_NAME }}"> --}}
                  {{-- <h4>{{$data_upload->UPLOAD_UNID_REF}}</h4> --}}

                </td>
                <td>
                  <h5>{{ $data_set->upload->FILE_EXTENSION }}</h5>
                </td>

                <td style="text-align:center">
                  <button class="btn btn-icon btn-round btn-primary"><i class="fas fa-file-word"></i></button>
                </td>
                <td>
                  <div class="form-group form-inline">
                    <h5>{{ $data_set->upload->FILE_SIZE }}</h5>
                    <h5>MB</h5>
                  </div>
                </td>
                <td>
                  <a href="#"class="btn btn-primary btn-link"><i class="fas fa-eye fa-lg "></i></a>
                  <a href="#" download="{{ $data_set->upload->FILE_UPLOAD }}" class="btn btn-success btn-link"><i class="fas fa-download fa-lg"></i>	</a>
                  <button  id="popup" type="button" class="btn btn-warning btn-link "
                    data-toggle="modal" data-target="#exampleModal5">
                    <i class="fas fa-edit fa-lg "></i>
                  </button>

                  <a href="{{url('machine/upload/delete/'.$data_set->upload->UNID)}}" class="btn btn-danger btn-link"><i class="fas fa-trash fa-lg "></i>	</a>

                </td>

                <td>
                  <small>{{ $data_set->upload->FILE_UPLOADDATETIME }}</small>
                </td>
                {{-- @endforeach --}}
              </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
