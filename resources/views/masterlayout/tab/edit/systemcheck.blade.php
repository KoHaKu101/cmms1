<meta name="_token" content="{{ csrf_token() }}" />
<div class="tab-pane" id="systemcheck-1" >
  <div class="row">
    <div class="col-sm-12">
      <div class="jumbotron">
        <div class="col-md-12 col-lg-12">
          <div class="card-header bg-warning">
            <div class="row">
              <div class="col-6 col-sm-5 col-md-7 col-lg-9">
                <h3 align="center" style="color:white;" class="mt-2">ตรวจสอบระบบ</h3>
              </div>
              <div class="col-6 col-sm-7 col-md-5 col-lg-3">

                  <button id="add" type="button" class="btn btn-primary btn-sm mt-2 mx-2"
                    data-toggle="modal" data-target="#PMMachine">
                    <span style="color:black;font-size:13px">เพิ่มระบบ</span>
                  </button>
                {{-- </div> --}}
                {{-- <div class="form-group"> --}}
                  <button id="remove" type="button" class="btn btn-danger btn-sm mt-2 ml-2"
                    data-toggle="modal" data-target="#PMMachineRemove">
                    <span style="color:black;font-size:13px">ลบระบบ</span>
                  </button>
                {{-- </div> --}}

              </div>
            </div>
          </div>
        </div>
          <div class="col-12 col-sm-12 col-md-12 col-lg-12">

            @livewire('showpmmachine',['MACHINE_CODE'=>$dataset->MACHINE_CODE,'RANK'=>$dataset->MACHINE_RANK_MONTH ])

        </div>
      </div>
    </div>
  </div>
</div>
