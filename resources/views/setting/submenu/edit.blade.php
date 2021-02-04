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

	@include('masterlayout.sidebar.sidebarmaster0')

@stop
{{-- ปิดส่วนเมนู --}}

	{{-- ส่วนเนื้อหาและส่วนท้า --}}
@section('contentandfooter')

	  <div class="content">
      <div class="page-inner">
        <div class="page-header">
          <h4 class="page-title">Edit</h4>
        </div>
				<div class="py-12">
	        <div class="container">
						<div class="row">
                    <div class="col-md-8">
        							<div class="card">
        								<div class="card-header"> Edit </div>
                        <div class="card-body">

                          <form action="{{ url('setting/submenu/update/'.$data_set->UNID) }}" method="POST">
                            @csrf
                            <div class="form-group">
                          		<label for="SUBMENU_NAME">SUBMENU Thai</label>
                          		<input type="text"  class="form-control" id="SUBMENU_NAME" name="SUBMENU_NAME" placeholder="SUBMENU Thai" value="{{ $data_set->SUBMENU_NAME }}">
                              <input type="hidden" id="UNIDE" name="UNID"  value="{{ $data_set->UNID }}">
															<input type="hidden" id="SUBUNID_REF" name="SUBUNID_REF"  value="{{ $data_set->SUBUNID_REF}}">
                        		</div>
														<div class="form-group">
															<label for="SUBMENU_EN">SUBMENU English</label>
															<input type="text"  class="form-control" id="SUBMENU_EN" name="SUBMENU_EN" placeholder="SUBMENU English" value="{{ $data_set->SUBMENU_EN }}">
														</div>
														<div class="form-group">
															<label for="SUBMENU_INDEX">SUBMENU Index</label>
															<input type="number" min="1" class="form-control" id="SUBMENU_INDEX" name="SUBMENU_INDEX" placeholder="SUBMENU Index" value="{{ $data_set->SUBMENU_INDEX }}">
														</div>
														<div class="form-group">
															<label for="SUBMENU_STATUS">SUBMENU Status</label>
															<input type="text"  class="form-control" id="SUBMENU_STATUS" name="SUBMENU_STATUS" placeholder="SUBMENU Status" value="{{ $data_set->SUBMENU_STATUS }}">
														</div>
														<div class="form-group">
															<label for="SUBMENU_CLASS">SUBMENU Class</label>
															<input type="text"  class="form-control" id="SUBMENU_CLASS" name="SUBMENU_CLASS" placeholder="SUBMENU Class" value="{{ $data_set->SUBMENU_CLASS }}">
														</div>
														<div class="form-group">
															<label for="SUBMENU_LINK">SUBMENU Link</label>
															<input type="text"  class="form-control" id="SUBMENU_LINK" name="SUBMENU_LINK" placeholder="SUBMENU Link" value="{{ $data_set->SUBMENU_LINK }}">
														</div>
                      			<div class="form-group">
															<label for="SUBMENU_ICON">SUBMENU Icon</label>
															<input type="text" class="form-control" id="SUBMENU_ICON" name="SUBMENU_ICON"  placeholder="SUBMENU Icon" value="{{ $data_set->SUBMENU_ICON }}">
                        				@error ('SUBMENU_NAME')
                            			<span class="text-danger"> {{ $message }}</span>
                        				@enderror
														</div>




														<button tpye="submit" class="btn btn-success">Update</button>


              						</form>

												</div>
											</div>
										</div>
						</div>
					</div>
  			</div>
			</div>
		</div>





		{{-- ส่วนท้าย --}}
	  {{-- <footer class="footer">
	    <div class="container-fluid">
	      <nav class="pull-left">
	        <ul class="nav">
	          <li class="nav-item">
	            <a class="nav-link" href="https://www.themekita.com">
	              ThemeKita
	            </a>
	          </li>
	          <li class="nav-item">
	            <a class="nav-link" href="#">
	              Help
	            </a>
	          </li>
	          <li class="nav-item">
	            <a class="nav-link" href="#">
	              Licenses
	            </a>
	          </li>
	        </ul>
	      </nav>
	      <div class="copyright ml-auto">
	        2018, made with <i class="fa fa-heart heart text-danger"></i> by <a href="https://www.themekita.com">ThemeKita</a>
	      </div>
	    </div>
	  </footer> --}}
		{{-- ปิดส่วนท้าย --}}
@stop
{{-- ปิดส่วนเนื้อหาและส่วนท้า --}}

{{-- ส่วนjava --}}
@section('javascript')

@stop
{{-- ปิดส่วนjava --}}
