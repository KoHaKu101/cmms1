<table>
  <thead>
    <tr>
      <th >location</th>
      <th >name</th>
      <th >Code</th>
      <th >machinecheck</th>
      <th >Last Price Currency</th>

    </tr>
  </thead>
  <tbody>

    @foreach ($data_set as $row)
      <tr>
        <td >  {{ $row->MACHINE_LINE }}  </td>
        <td >  {{ $row->MACHINE_NAME }}  </td>
        <td >  {{ $row->MACHINE_CODE }}   </td>
        <td >  {{ $row->MACHINE_CHECK }}   </td>
        <td >  {{ $row->MACHINE_RVE_DATE }}     </td>
        </tr>
    @endforeach
  </tbody>
</table>
