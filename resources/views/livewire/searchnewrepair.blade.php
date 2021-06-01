<div class="card">
  <div class="card-header">
  <div class="row justify-content-md-center">
    <div class="col-md-6 col-lg-5 ">
      <h3 >กรอกรหัสเครื่อง / แสกนQR Code</h3>

      <input type="text" class="form-control" id="search" wire:model="search" name="search" placeholder="กรอกรหัสเครื่อง / แสกนQR Code ที่นี้" autofocus>

    </div>
  </div>
  </div>
  <div class="card-body">
    <div class="row">
      @if ($machine != NULL)
        @foreach ($machine as $key => $dataset)
        <div class="col-md-6 col-lg-3 ml-auto mr-auto">
        <div class="card card-post card-round">
        <div class="card-header bg-primary text-white">
        <center><h4 class="mt-1"><b> {{$dataset->MACHINE_CODE}} </b></h4></center>
        </div>
        <div class="card-body">
        <span>Machine Name : {{$dataset->MACHINE_NAME}}</span><br/>
        <span class="mt-3"> Line : {{$dataset->MACHINE_LINE}}</span><br/>
        <a href="{{ url('machine/repair/form/'.$dataset->MACHINE_CODE)}}" class="btn btn-success btn-sm btn-block my-1">
        <span style="font-size:13px">
         <i class="fas fa-hand-pointer fa-lg mx-2"></i>แจ้งอาการเสีย
          </span>
        </a>
        </div>
        </div>
        </div>
        @endforeach
      @else
        <tr><td> Loading ........... </td></tr>
      @endif
    </div>
  </div>
</div>
