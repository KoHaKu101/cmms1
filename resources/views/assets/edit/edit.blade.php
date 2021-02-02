@extends('masterlayout.masterlayout')
@section('tittle','homepage')
{{-- ส่วนหัว --}}
@section('Logoandnavbar')

	@include('masterlayout.logomaster')
	@include('masterlayout.navbar.navbarmaster')

@stop
{{-- ปิดท้ายส่วนหัว --}}

{{-- ส่วนเมนู --}}
@section('sidebar')

	@include('masterlayout.sidebar.sidebarmaster')

@stop
{{-- ปิดส่วนเมนู --}}

	{{-- ส่วนเนื้อหาและส่วนท้า --}}
@section('contentandfooter')


		<div class="content">
			<div class="panel-header bg-primary-gradient">
				<div class="page-inner py-5">
					<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
						<div>
							<h2 class="text-white pb-2 fw-bold">ลงทะเบียนเครื่องจักร</h2>
						</div>
					</div>
				</div>
			</div>
			<div class="page-inner mt--5">
				<div class="row mt--2">
					<div class="col-md-12">
						<div class="card full-height">
							<div class="card-body">
								<div class="card-title">Overall statistics</div>

                <form action="{{ url('/factory/update/'.$data_Form->UNID) }}" method="POST">
                  @csrf
              <div class="container-fluid col-12 ">
                <div class="row mt-3">
                    <div class="col-md-3">
                      <h3>Machine  No</h3>
                    <input type="text" class="form-control" id="NUMBER_M" name="NUMBER_M" value="{{ $data_Form->NUMBER_M }}" >
                    @error ('NUMBER_M')
                      <span class="text-danger"> {{ $message }}</span>
                    @enderror
                    </div>

                    <div class="col-md-5">
                      <h3>	Manufacturing</h3>
                      <input type="text" class="form-control" id="PRODUCT_M" name="PRODUCT_M" value="{{ $data_Form->PRODUCT_M }}" >
                      <input type="hidden" id="UNID" name="UNID" value="{{ $data_Form->UNID }}" >

                        </div>
                    <div class="col-md-3">
                      <h3>Machine  Name</h3>
                    <input type="text" class="form-control" id="NAME_M" name="NAME_M" value="{{ $data_Form->NAME_M }}" >
                    </div>
                </div>
                <div class="row mt-3">
                  <div class="col-md-3">
                    <h3>Model</h3>
                  <input type="text" class="form-control" id="MODEL_M" name="MODEL_M" value="{{ $data_Form->MODEL_M }}" >
                  </div>
                  <div class="col-md-3">
                    <h3>Series  No.</h3>
                  <input type="text" class="form-control" id="SERIES_M" name="SERIES_M" value="{{ $data_Form->SERIES_M }}" >
                  </div>
                  <div class="col-md-3">
                    <h3>Pqm - in Date	</h3>
                  <input type="date" class="form-control" id="DATE_M" name="DATE_M" value="{{ $data_Form->DATE_M }}" >
                  </div>
                  <div class="col-md-3">
                    <h3>	Power ( kva. )	</h3>
                  <input type="text" class="form-control" id="POWER_M" name="POWER_M" value="{{ $data_Form->POWER_M }}" >
                  </div>

                </div>
              <div class="row mt-3">
                <div class="col-md-2">
                    <h3>	Weight	</h3>
                  <div class="input-group mb-3">
                    <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)" id="WHIGHT_M" name="WHIGHT_M" value="{{ $data_Form->WHIGHT_M }}">
                    <div class="input-group-append">
                      <span class="input-group-text">Ton</span>
                    </div>
                  </div>
                </div>
                <div class="col-md-5">
                  <h3>	Purchase From	</h3>
                <input type="text" class="form-control"  id="BUY_M" name="BUY_M" value="{{ $data_Form->BUY_M }}" >
                </div>
                <div class="col-md-4">
                  <h3>	Machine Type	</h3>
                <input type="text" class="form-control"  id="TYPE_M" name="TYPE_M" value="{{ $data_Form->TYPE_M }}" >
                </div>
              </div>
              <div class="row mt-1">
                <div class="col-md-3">
                <h3>รูปภาพ</h3>
                <input type="file" accept="image/*" class="form-control" id="IMG_M" name="IMG_M" value="{{ $data_Form->IMG_M }}" >
                </div>

                <div class="col-md-3">
                <h3>รูปQRCODE</h3>
                <input type="file" accept="image/*" class="form-control" id="QRCODE_M" name="QRCODE_M" value="{{ $data_Form->QRCODE_M }}" >
                </div>

              </div>

              <div class="row">
              <div class="col-md-10">
              </div>
              <div class="col-md-1">
              <input type="submit" class="btn btn-success" value="แก้ไขรายการ">
            </div>
              </div>

						 </div>
             </form>
						</div>
					</div>
        </div>





				</div>


			</div>
		</div>


@stop
{{-- ปิดส่วนเนื้อหาและส่วนท้า --}}

{{-- ส่วนjava --}}
@section('javascript')

@stop
{{-- ปิดส่วนjava --}}
