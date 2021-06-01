@extends('masterlayout.masterlayout')
@section('meta')
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('tittle','แจ้งซ่อม')
@section('css')
		<link href="{{asset('assets/css/select2.min.css')}}" rel="stylesheet" />

@endsection
{{-- ส่วนหัว --}}
@section('Logoandnavbar')

	@include('masterlayout.logomaster')
	@include('masterlayout.navbar.navbarmaster')

@stop
{{-- ปิดท้ายส่วนหัว --}}

{{-- ส่วนเมนู --}}
@section('sidebar')

	@include('masterlayout.sidebar.sidebarmaster0')

@stop
{{-- ปิดส่วนเมนู --}}

	{{-- ส่วนเนื้อหาและส่วนท้า --}}
@section('contentandfooter')
<style>
.select2-container--default .select2-selection--single {
    background-color: #fff;
    border: 1px solid #aaa;
    border-radius: 4px;
		padding: .3rem 1rem;
	 height: inherit!important;
	}
.select2-container--default .select2-selection--single .select2-selection__rendered {
    color: #444;
    line-height: 28px;

	}
</style>
		<div class="content">
			<div class="page-inner">
				<!--ส่วนปุ่มด้านบน-->
					<div class="container">
						<h4 class="page-title">แจ้งซ่อมอาการ</h4>

						<div class="row">
							<label> ระดับความเร่งด่วน </label>
							<button type="button" class="btn btn-primary"> ปกติ </button>
							<button type="button" class="btn btn-warning"> ด่วน </button>
							<button type="button" class="btn btn-danger"> ด่วนมาก </button>
						</div>
				</div>
				<!--ส่วนกรอกข้อมูล-->

			</div>
		</form>
	</div>






@stop
{{-- ปิดส่วนเนื้อหาและส่วนท้า --}}

{{-- ส่วนjava --}}
@section('javascript')
	<script src="{{ asset('assets\js\ajax\ajax-csrf.js') }}"></script>

 <script src="{{asset('assets/js/select2.min.js')}}"></script>
	<script>
	$(document).ready(function() {
    $('.select-main-repair').select2();
});
		$('#SELECT_MAIN_REPAIR').on('change',function(event){
			event.preventDefault();
			var mainselectunid = $('#SELECT_MAIN_REPAIR').val();
			var url = "{{ route('repair.comboselect') }}";
			var data = {"_token" : "{{ csrf_token() }}",
									"REPAIR_MAINSELECT_UNID" : mainselectunid } ;
				$.ajax({
					type:'POST',
					url: url,
					datatype: 'json',
					data: data,
					success:function(data){
							   $('#COMBO_SELECT').html(data.html);
								 $('.select-sub-repair').select2();
					}
				});
		})
	</script>

@stop
{{-- ปิดส่วนjava --}}
