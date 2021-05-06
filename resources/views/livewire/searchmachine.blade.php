<div class="card ">
  <div class="card-header bg-primary  ">
    <div class="row ">
      <div class="col-md-3 col-lg-2">
        <h4 class="ml-3 mt-2 " style="color:white;" ><i class="fas fa-wrench fa-lg mr-1"></i> เครื่องจักร </h4>
      </div>
      <div class="col-md-3">
          <div class="input-group mt-1">
            <input wire:model="search" type="search" id="serach"  name="serach" class="form-control form-control-sm">
            <div class="input-group-prepend">
              <button type="button" class="btn btn-search pr-1 btn-xs	">
                <i class="fa fa-search search-icon"></i>
              </button>
            </div>
          </div>
      </div>
    </div>
  </div>
  <div id="result"class="card-body">
    <div class="table-responsive">
      <table class="display table table-striped table-hover">
        <thead class="thead-light">
          <tr>
            <th >ลำดับ</th>
            <th ></th>
            <th scope="col">LINE</th>
            <th scope="col">Name</th>


            <th scope="col">แผนการผลิต</th>
            <th scope="col">ประวัติการซ่อม</th>
            <th>แจ้งซ่อม</th>

          </tr>
        </thead>

        <tbody >
          @foreach ($machine as $key => $row)
            <tr class="mt-4">
              <td style="width:25px">
                <center>{{ $key+1 }}</center>
              </td>
                <td style="width:170px;">
                <a href="{{ url('machine/assets/edit/'.$row->UNID) }}">
                  <button type="button" class="btn btn-secondary btn-sm btn-block my-1" style="width:130px">
                    <span class="float-left">
                      <i class="fas fa-eye fa-lg  mx-1 mt-1"></i>{{ $row->MACHINE_CODE }}
                    </span>
                  </button>
                </a>
              </td>
              <td >  {{ $row->MACHINE_LINE }}  </td>
              <td style="width:400px;">              {{ $row->MACHINE_NAME }}  </td>
              <td style="width:100px;">
                <a href="{{ url('machine/assets/edit/'.$row->UNID) }}">
                  <button type="button" class="btn btn-secondary btn-sm btn-block my-1" style="width:80px">
                    <span class="float-left">
                      <i  style="font-size:17px"class="icon-printer mx-1 mt-1"></i>
                      Print
                    </span>
                  </button>
                </a>
              </td>
              <td style="width:120px;">
                  <button type="button" class="btn btn-secondary btn-sm btn-block my-1"
                  onclick="printhistory( '{{$row->UNID}}' )" id="button" style="width:120px">
                    <span class="float-left">

                      <i  style="font-size:17px"class="icon-printer mx-1 mt-1"></i>
                      Print ประวัติ
                    </span>
                  </button>
              </td>
              <td>
                <a href="{{ url('machine/repair/form/'.$row->MACHINE_CODE) }}">
                  <button type="button" class="btn btn-danger btn-sm btn-block my-1" style="width:130px">
                    <span class="float-left">
                      <i class="fas fa-wrench fa-lg mx-1 mt-1"></i>
                      แจ้งซ่อม: {{ $row->MACHINE_CODE }}
                    </span>
                  </button>
                </a>
              </td>
              </tr>
          @endforeach
          <tr>
            <td colspan="5" align="center">
                {{ $machine->links() }}
            </td>
          </tr>
          {{-- @include('machine/assets/machinesearch') --}}
        </tbody>
    </table>
    <input type="hidden" name="hidden_page" id="hidden_page" value="1" />
    <input type="hidden" name="hidden_column_name" id="hidden_column_name" value="id" />
    <input type="hidden" name="hidden_sort_type" id="hidden_sort_type" value="asc" />
  </div>

    </div>


</div>
