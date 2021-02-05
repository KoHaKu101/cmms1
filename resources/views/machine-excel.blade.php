<table id="basic-datatables" class="display table table-striped table-hover">
  <thead class="thead-light">
    <tr>
      <th scope="col ">แก้ไข</th>
      <th scope="col">location</th>
      <th scope="col">name</th>
      <th scope="col">Code</th>
      <th scope="col">Asset Status</th>
      <th scope="col">Last Price Currency</th>

    </tr>
  </thead>
  <tbody>
    {{-- @php($i = 1) --}}
    @foreach ($data_set as $key => $row)
      <tr>
        <td>
          <a href="{{ url('machine/assets/edit/'.$row->UNID) }}">
            <i class="fas fa-edit fa-lg"></i>
          </a>
          <a href="{{ url('machine/assets/delete/'.$row->UNID) }}">
            <span class="fas fa-trash fa-lg ml-2">	</span>
          </a>
        </td>
        <td scope="row" style="white-space:nowrap">  {{ $row->MACHINE_LOCATION }}  </td>
        <td style="white-space:nowrap">              {{ $row->MACHINE_NAME }}  </td>
        <td style="white-space:nowrap">  						 {{ $row->MACHINE_CODE }}   </td>
        <td style="white-space:nowrap">  						 {{ $row->MACHINE_CHECK }}   </td>
        <td style="white-space:nowrap">  						 {{ $row->MACHINE_RVE_DATE }}     </td>
        </tr>
    @endforeach
  </tbody>
</table>
