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
          <h4 class="page-title">MENU</h4>
        </div>
				<div class="py-12">

						<div class="row">
							<div class="col-md-8">
								<div class="card">
                	@if(session('success'))
                  	<div class="alert alert-warning alert-dismissible fade show" role="alert">
  											<strong>{{ session('success') }}</strong>
  											<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    										<span aria-hidden="true">&times;</span>
  											</button>
										</div>
									@endif

										<div class="card-header"><h3> Menu </h4></div>
											<div class="table-responsive">
                      <table class="display table table-striped table-hover ml-4" >
                      	<thead>
                        	<tr>

                          	<th scope="col">Menu Thai</th>
                          	<th scope="col">Menu English</th>
                          	<th scope="col">MENU Index</th>
														<th scope="col">MENU Status</th>
														<th scope="col">MENU Class</th>
														<th scope="col">MENU Link</th>
														<th scope="col">MENU Icon</th>
														<th scope="col">Action</th>

                        	</tr>
                      	</thead>

                      	<tbody>
                          {{-- @php($i = 1) --}}
                          @foreach ($data as $row)

                        		<tr>

                          		<td scope="row">  {{ $row->MENU_NAME }} </td>
                          		<td>  						{{ $row->MENU_EN }} </td>
															<td>  						{{ $row->MENU_INDEX }} </td>
															<td>  						{{ $row->MENU_STATUS }} </td>
															<td>  						{{ $row->MENU_CLASS }} </td>
															<td>  						{{ $row->MENU_LINK }} </td>
															<td>  						{{ $row->MENU_ICON }} </td>
															<td>
																<a href="{{ url('machine/setting/menu/edit/'.$row->UNID) }}" class="btn  btnmenu btn-link"><i class="fab fa-whmcs fa-2x"></i></a>
																<a href="{{ url('machine/setting/menu/delete/'.$row->UNID) }}" class="btn btnmenu btn-link"><i class="fas fa-trash fa-2x"></i></a>
																<a href="{{ url('machine/setting/submenu/home/'.$row->UNID) }}" class="btn btnmenu btn-link"><i class="fas fa-clipboard-list fa-2x"></i></a>
															</td>

                        			</tr>
                        	@endforeach

                      	</tbody>
                    </table>
										{{ $data->links() }}
									</div>

								</div>
              </div>
                    <div class="col-md-4">
        							<div class="card">
        								<div class="card-header"> Formmenu </div>
                        <div class="card-body">
                          <form action="{{ route('menu.store') }}" method="POST">
                            @csrf
                        		<div class="form-group">
                          		<label for="MENU_NAME">Menu Thai</label>
                          		<input type="text"  class="form-control" id="MENU_NAME" name="MENU_NAME" placeholder="Menu Thai">
                        		</div>
														<div class="form-group">
															<label for="MENU_EN">Menu English</label>
															<input type="text"  class="form-control" id="MENU_EN" name="MENU_EN" placeholder="Menu English">
														</div>
														<div class="form-group">
															<label for="MENU_INDEX">MENU Index</label>
															<input type="number" min="1" value="1" class="form-control" id="MENU_INDEX" name="MENU_INDEX" placeholder="MENU Index">
														</div>
														<div class="form-group">
															<label for="MENU_STATUS">MENU Status</label>
															<input type="text"  class="form-control" id="MENU_STATUS" name="MENU_STATUS" placeholder="MENU Status">
														</div>
														<div class="form-group">
															<label for="MENU_CLASS">MENU Class</label>
															<input type="text"  class="form-control" id="MENU_CLASS" name="MENU_CLASS" placeholder="MENU Class">
														</div>
														<div class="form-group">
															<label for="MENU_LINK">MENU Link</label>
															<input type="text"  class="form-control" id="MENU_LINK" name="MENU_LINK" placeholder="MENU Link">
														</div>
                      			<div class="form-group">
															<label for="MENU_ICON">MENU Icon</label>
															<input type="text" class="form-control" id="MENU_ICON" name="MENU_ICON"  placeholder="MENU Icon">
                        				@error ('MENU_NAME')
                            			<span class="text-danger"> {{ $message }}</span>
                        				@enderror
														</div>

														<button tpye="submit" class="btn btn-success">Submit</button>
              						</form>
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
