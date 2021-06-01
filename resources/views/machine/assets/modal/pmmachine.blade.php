<style>
.modal-sm {
    max-width: 80% !important;
}
</style>
<!-- PM insert -->
<div class="modal fade" id="PMMachine" tabindex="-1" role="dialog" aria-labelledby="exampleModalLalavel" aria-hidden="true">
  <div class="modal-dialog modal-md">
    <div class="modal-content ">
      <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">รายการตรวจเช็ค</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
				<form action="{{url('/machine/system/check/storelist')}}" method="POST" enctype="multipart/form-data" >
					@csrf
          <input type="hidden" id="MACHINE_CODE" name="MACHINE_CODE" value="{{ $dataset->MACHINE_CODE }}" >

            @livewire('addpm',['machinecode' => $dataset->MACHINE_CODE ])
            </div>
		        <div class="modal-footer">
  	           <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
	              <input type="submit" class="btn btn-primary" value="บันทึก"></input>
            </div>
	      </form>
      </div>
</div>
</div>
{{-- *************************************************************** --}}

<style>
.modal-sm {
    max-width: 80% !important;
}
</style>
<!-- Modal upload -->
<div class="modal fade" id="PMMachineRemove" tabindex="-1" role="dialog" aria-labelledby="exampleModalLalavel" aria-hidden="true">
  <div class="modal-dialog modal-md">
    <div class="modal-content ">
      <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">ลบรายการตรวจเช็ค</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
				<form action="{{url('/machine/system/remove')}}" method="post" enctype="multipart/form-data" >
					@csrf
          {{-- <input type="text" id="MACHINE_UNID" name="MACHINE_UNID" value="{{ $dataset->UNID }}" > --}}
          @livewire('removepm',['machinecode' => $dataset->MACHINE_CODE ])

            </div>
		        <div class="modal-footer">
  	           <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
	              <input type="button" class="btn btn-danger delete-confirm" value="ลบ"></input>
            </div>
	      </form>
      </div>
</div>
</div>
