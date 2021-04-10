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
              {{ $dataset->links() }}
          </td>
        </tr>
