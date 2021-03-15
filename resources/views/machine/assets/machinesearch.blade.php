        @foreach ($dataset as $key => $row)
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
            <td >              {{ $row->MACHINE_NAME }}  </td>
            <td style="white-space:nowrap">  	{{ $row->MACHINE_CHECK == '1' ? 'หยุดทำงาน'
                                              : ($row->MACHINE_CHECK == '2' ? 'เครื่องทำงาน'
                                              : ($row->MACHINE_CHECK == '3' ? 'เครื่องกำลังซ่อม'
                                              :($row->MACHINE_CHECK == '4' ? 'เครื่องจำหน่าย' : 'สถานะไม่แน่ชัด' ))) }}		</td>
            <td style="white-space:nowrap">  						 {{ $row->MACHINE_RVE_DATE }}     </td>
            <td style="white-space:nowrap">  						 {{ $row->MACHINE_STATUS == '1' ? 'จำหน่าย' : "" }}     </td>
            <td style="width:100px;">

                <button type="button" class="btn btn-block btn-danger btn-sm my-1 " id="button" style="width:150px">
                  <i class="fab fa-btc fa-lg mx-1">	</i> จำหน่ายเครื่องจักร
                  <input type="hidden" id="UNID"value="{{ $row->UNID }}">
                  <input type="hidden" id="MACHINE_CODE"value="{{ $row->MACHINE_CODE }}">

                </button>
              </td>
            </tr>
        @endforeach
        <tr>
          <td colspan="5" align="center">
              {{ $dataset->links() }}
          </td>
        </tr>
