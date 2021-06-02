<div class="card ">

  <div class="card-header bg-primary form-inline ">
        <div class="row ">
          <div class="col-md-5">
            <h4 class="ml-3 mt-2 " style="color:white;" ><i class="fas fa-toolbox fa-lg mr-1"></i> แจ้งซ่อม </h4>
          </div>
          <div class="col-md-7">
              <div class="input-group mt-1">
                <input wire:model="search" type="search" id="serach"  name="serach" class="form-control form-control-sm" placeholder="ค้นหา.........">
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
    <div class="table-responsive" id="dynamic_content">
      <table class="display table table-striped table-hover">
        <thead class="thead-light">
          <tr>
            <th scope="col">เลขที่เอกสาร </th>
            <th></th>
            <th scope="col">รหัสเครื่อง </th>
            <th scope="col">ชื่อเครื่องจักร</th>
            <th scope="col">Line</th>
            <th scope="col">วันที่เอกสาร</th>
            <th scope="col">สถานะเครื่องจักร</th>
            <th scope="col">สถานะซ่อมแซ่ม</th>
            <th scope="col" style="width:100px"></th>
          </tr>
        </thead>

        <tbody>
          @foreach ($dataset as $key => $row)

            <tr>
              <td style="width:200px">
                <a href="{{ route('repair.edit',[$row->UNID]) }}" class="btn btn-secondary btn-block btn-sm my-1 " style="width:180px;height:30px">
                  <span class="btn-label float-left">
                    <i class="fas fa-eye mx-1"></i>{{ $row->DOC_NO }}
                  </span>
                </a>
              </td>
              <td style="width:50px">
                <button type="button"class="btn btn-primary btn-block btn-sm my-1 " onclick="pdfrepair('{{ $row->UNID }}')"
                style="width:50px;height:30px">
                  <span class="">
                    <i  style="font-size:17px"class="icon-printer "></i>
                  </span>
                </button>
              </td>
              <td >  				{{ $row->MACHINE_CODE }}		     </td>
              <td >  				{{ $row->MACHINE_NAME }}		    </td>
              <td >  				{{ $row->MACHINE_LINE }}	    </td>
              <td >      		{{ $row->DOC_DATE }}          </td>
              <td >  				{{ $row->MACHINE_STATUS == '1' ? 'เครื่องหยุดทำงาน' : 'เครื่องทำงาน'}}	    </td>

                @if ($row->CLOSE_STATUS ===  '9')
                  <td style="width:120px">
                    <button type="button"class="btn btn-success btn-block btn-sm my-1 " style="width:120px;height:30px">
                      <span class="btn-label float-left">
                        <i class="fas  mx-1"></i>กำลังดำเนินการ
                      </span>
                    </button>
                  </td>
                  <td style="width:90px">
                    <button  id="popup" type="button" class="btn btn-danger btn-block btn-sm my-1" data-toggle="modal" data-target="#CloseRepair"
                    style="width:90px;height:30px">
  
                      <span class="btn-label">
                        <i class="fas fa-clipboard-check mx-1"></i>ปิดเอกสาร
                      </span>
                    </button>
                @elseif ($row->CLOSE_STATUS === '1')
                  <td style="width:100px">
                    <button type="button" class="btn btn-primary btn-block btn-sm my-1 " style="width:120px;height:30px">
                      <span class="btn-label float-left">
                        <i class="fas  mx-1"></i>เรียบร้อยแล้ว
                      </span>
                    </button>
                    </td>
                    <td style="width:90px">

                    </td>
                @else
                  <td style="width:100px">
                      <button type="button" class="btn btn-danger btn-block btn-sm my-1 " style="width:120px;height:30px">
                        <span class="btn-label float-left">
                          <i class="fas  mx-1"></i>สถานะไม่แน่ชัด
                        </span>
                      </button>
                      </td>
                      <td style="width:90px">

                      </td>
                @endif
              </tr>
            @endforeach
            <tr>
            </tr>
            <tr>
              <td colspan="7" align="center">
               {!! $dataset->links() !!}
              </td>
            </tr>
        </tbody>
    </table>

  </div>
    </div>
</div>
