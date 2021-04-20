<meta name="_token" content="{{ csrf_token() }}" />
<div class="tab-pane" id="systemcheck" >
  <div class="row">
    <div class="col-sm-12">
      <div class="jumbotron">

          <div class="col-md-8 col-lg-12">
            <div class="card-header bg-warning" style="height:43px">
              <div class="mt--1 form-inline">
                <div class="col-md-8 col-lg-10">
                  <h3 align="center" style="color:white;">ตรวจสอบระบบ</h3>
                </div>

                <div class="col-md-8 col-lg-1">
                  <button id="remove" type="button" class="btn btn-danger btn-sm mx-1"
                    data-toggle="modal" data-target="#PMMachineRemove">
                    <span style="color:black;font-size:13px">ลบระบบ</span>
                  </button>

                </div>
                <div class="col-md-8 col-lg-1">
                  <button id="add" type="button" class="btn btn-primary btn-sm"
                    data-toggle="modal" data-target="#PMMachine"> 
                    <span style="color:black;font-size:13px">เพิ่มระบบ</span>
                  </button>
                </div>


                {{-- $emit('show',{{$datamasterimps->PM_TEMPLATE_UNID_REF}},{{$dataset->MACHINE_CODE}}) --}}
            </div>
          </div>
        </div>

          <div class="col-md-8 col-lg-12">

            @livewire('showpmmachine',['MACHINE_CODE'=>$dataset->MACHINE_CODE])

        </div>
      </div>
    </div>
  </div>
</div>
