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
    <td >      		{{ $row->MACHINE_TIME }}          </td>
    <td >  				{{ $row->MACHINE_TYPE == 'STOP' ? 'เครื่องหยุดทำงาน' : 'เครื่องทำงาน'}}	    </td>
    <td >
      <a href="{{ url('machine/assets/delete/'.$row->UNID) }}" class="ml-3">
        <span style="color: Tomato;">
          <i class="fas fa-trash fa-lg ml-2">	</i>
        </span>
      </a>
    </td>
    </tr>
  @endforeach
        <tr>
        </tr>
        <tr>
          <td colspan="7" align="center">
           {!! $dataset->links() !!}
          </td>
        </tr>
