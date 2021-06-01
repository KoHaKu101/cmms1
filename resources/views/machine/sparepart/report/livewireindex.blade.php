<div class="col-md-12 table-responsive">
	<table class="table  table-bordered table-head-bg-info table-bordered-bd-info table-striped table-hover">
		<thead>
			<tr>
				<th scope="col">#</th>
				<th scope="col">Plan Date</th>
				<th scope="col">LINE</th>
				<th scope="col">Machine</th>
				<th scope="col">SparPartName</th>
				<th scope="col">Plan</th>
				<th scope="col">Actual</th>
				<th scope="col">Unit</th>
				<th scope="col">Plan Cost</th>
				<th scope="col">Actual Cost</th>
				<th scope="col">Complete Date</th>
				<th scope="col">Action</th>


			</tr>
		</thead>
		<tbody>
			@foreach ($DATA_SPAREPLAN as $index => $row)
				<tr>
					<td>{{ $index+1 }}</td>
					<td>{{ date("d-m-Y", strtotime($row->PLAN_DATE))}}</td>
					<td>{{ $row->MACHINE_LINE}}</td>
					<td>{{ $row->MACHINE_CODE}}</td>
					<td>{{ $row->SPAREPART_NAME}}</td>

					<td class="text-center">{{ $row->PLAN_QTY}} </td>
					<td class="text-center">{{ $row->ACT_QTY}} </td>
					<td>{{ $row->UNIT}}</td>
					<td class="text-right">{{ number_format($row->TOTAL_COST,0)}} </td>
					<td class="text-right">{{ number_format($row->COST_ACT,0)}} </td>
					<td>{{ $row->STATUS == 'COMPLETE' ? date("d-m-Y", strtotime($row->COMPLETE_DATE)) : ''}}</td>
					<td>
						<button type="button" class="btn btn-primary btn-sm mx-1 my-1 "
						data-planunid="{{ $row->UNID }}"
						data-machine_code = "{{$row->MACHINE_CODE}}"
						data-planusercheck = "{{$row->USER_CHECK}}"
						data-btn_status="VIEW"
						onclick="viewform(this)">
							<i class="fas fa-eye fa-lg mr-1"></i>View</button>
					@if ($row->classtext == 'TRUE')
						@if ($row->STATUS == 'COMPLETE')
							<button type="button" class="btn btn-danger btn-sm mx-1 my-1"
							data-planunid="{{ $row->UNID }}"
							data-machine_code = "{{$row->MACHINE_CODE}}"
							data-planusercheck = "{{$row->USER_CHECK}}"
							data-btn_status="VOID"
							onclick="voidform(this)">
								<i class="fas fa-retweet fa-lg mr-1"></i>Void</button>
						@else
							<button type="button" class="btn btn-secondary btn-sm mx-1 my-1"
							data-planunid="{{ $row->UNID }}"
							data-machine_code = "{{$row->MACHINE_CODE}}"
							data-planusercheck = "{{$row->USER_CHECK}}"
							data-btn_status="CHANGE"
							onclick="checkplansparepart(this)">
								<i class="fas fa-edit fa-lg mr-1"></i>Change</button>
						@endif

					@endif
					</td>

				</tr>
			@endforeach
		</tbody>
	</table>
	{{ $DATA_SPAREPLAN->links() }}
</div>
