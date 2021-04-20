<div class="card ">

  <div class="card-header bg-primary form-inline ">
      <h4 class="ml-3 mt-2 " style="color:white;" ><i class="fas fa-toolbox fa-lg mr-1"></i> แจ้งซ่อม </h4>
        <div class="input-group ml-4">
          <input type="text" name="serach" wire:model="search" id="serach" class="form-control form-control-sm" placeholder="ค้นหา........." />

          <div class="input-group-prepend">
            <button type="submit" class="btn btn-search pr-1 btn-xs	">
              <i class="fa fa-search search-icon"></i>
            </button>
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

        <tbody >
          @foreach ($dataset as $key => $row)
            <tr>
              <td style="width:200px">
                <a href="{{ route('repair.edit',[$row->UNID]) }}" class="btn btn-secondary btn-block btn-sm my-1 " style="width:180px;height:30px">
                  <span class="btn-label float-left">
                    <i class="fas fa-eye mx-1"></i>{{ $row->MACHINE_DOCNO }}
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
              <td >  				{{ $row->MACHINE_LOCATION }}	    </td>
              <td >      		{{ $row->MACHINE_DOCDATE }}          </td>
              <td >  				{{ $row->MACHINE_TYPE == 'STOP' ? 'เครื่องหยุดทำงาน' : 'เครื่องทำงาน'}}	    </td>

                @if ($row->CLOSE_STATUS ===  '9')
                  <td style="width:120px">
                    <button type="button"class="btn btn-success btn-block btn-sm my-1 " style="width:120px;height:30px">
                      <span class="btn-label float-left">
                        <i class="fas  mx-1"></i>กำลังดำเนินการ
                      </span>
                    </button>
                  </td>
                  <td style="width:90px">
                    <button type="button" class="btn btn-danger btn-block btn-sm my-1 " id='button' onclick="closework( '{{ $row->UNID }}' )"
                      style="width:90px;height:30px">
                      <span class="btn-label">
                        <i class="fas fa-clipboard-check mx-1"></i>ปิดเอกสาร
                        {{-- <input type="hidden" id="UNID"value="{{ $row->UNID }}"> --}}
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
