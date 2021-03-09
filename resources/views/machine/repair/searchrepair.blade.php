@foreach ($dataset as $key => $row)
  <tr>
    <td style="width:200px">
      <a href="{{ route('repair.edit',[$row->UNID]) }}" class="btn btn-secondary btn-block btn-sm my-1 " style="width:180px;height:30px">
        <span class="btn-label float-left">
          <i class="fas fa-eye mx-1"></i>{{ $row->MACHINE_DOCNO }}
        </span>
      </a>
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
          <button type="button" class="btn btn-danger btn-block btn-sm my-1 " id='button' style="width:90px;height:30px">
            <span class="btn-label">
              <i class="fas fa-clipboard-check mx-1"></i>ปิดเอกสาร
              <input type="hidden" id="UNID"value="{{ $row->UNID }}">
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
