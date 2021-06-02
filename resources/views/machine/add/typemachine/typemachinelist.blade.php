@extends('masterlayout.masterlayout')
@section('tittle','homepage')
@section('css')
	<link href="{{asset('assets\css\cubeportfolio.css')}}" rel="stylesheet" type="text/css">
  	  <link href="{{asset('assets\css\portfolio.min.css')}}" rel="stylesheet" type="text/css">
 	 <link href="{{asset('assets\css\customize.css')}}" rel="stylesheet" type="text/css">@endsection
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
				<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
          <div class="container">
						<div class="row">
							<div class="col-md-12 gx-4">
								<a href="{{ url('/machine/dashboard/dashboard') }}">
									<button class="btn btn-warning  btn-xs ">
										<span class="fas fa-arrow-left fa-lg">Back </span>
									</button>
								</a>
								<a href="{{ route('machinetypetable.form') }}"><button class="btn btn-primary  btn-xs">
									<span class="fas fa-file fa-lg">	New	</span>
								</button></a>
								<a href="{{ url('users/export/') }}">
								<button class="btn btn-primary  btn-xs">
									<span class="fas fa-file-export fa-lg">	Export	</span>
								</button>
								</a>
								<button class="btn btn-primary  btn-xs">
									<span class="fas fa-print fa-lg">	Print	</span>
								</button>
							</div>
						</div>
          </div>
				</div>
				<div class="py-12">
	        <div class="container mt-2">
						<div class="row">
							<div class="col-md-12">
								<div class="card ">
                	@if(session('success'))
                  	<div class="alert alert-success alert-dismissible fade show" role="alert">
  											<strong>{{ session('success') }}</strong>
  											<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    										<span aria-hidden="true">&times;</span>
  											</button>
										</div>
									@endif
									<div class="card-header bg-primary form-inline ">
											<h4 class="ml-3 mt-2 " style="color:white;" ><i class="fas fa-industry fa-lg mr-1"></i> ประเภทเครื่องจักร </h4>
												<div class="input-group ml-4">
													<input type="text" id="search_text"  name="search_text"onkeyup="myFunction()" class="form-control form-control-sm">
													<div class="input-group-prepend">
														<button type="submit" class="btn btn-search pr-1 btn-xs	">
															<i class="fa fa-search search-icon"></i>
														</button>
													</div>
												</div>
									</div>

									<div id="result"class="card-body">
										<div class="container-fluid ml-4">

													 <div class="main">

														 <!--portfolio -->
														 <div class="portfolio-content portfolio-1">
																 <!--portfolio Grid-->
																 <div id="js-grid-juicy-projects" class="cbp">
																	 @foreach ($dataset as $key => $dataitem)

																		 @php
																		 	$TYPE_ICON = $dataitem->TYPE_ICON != '' ? 'image/machinetype/'.$dataitem->TYPE_ICON : '/assets/img/no_image1200_900.png'
																		 @endphp
									                 <div class="cbp-item movie">
									                     <div class="cbp-item-wrap">
									                         <div class="cbp-caption">
									                             <div class="cbp-caption-defaultWrap">
									                               <a href="{{url('machine/machinetypetable/edit/'.$dataitem->UNID)}}">
									                                 <img src="{{asset($TYPE_ICON)}}" alt="img3">

									                               </a> </div>
																								 <style>
																								 .cbp-item .btn {
    																					 					width: 100%;
																											}
																								 </style>
									                             <div class="cbp-caption-activeWrap">
									                                 <div class="cbp-l-caption-alignCenter">
									                                     <div class="cbp-l-caption-body">
																														 <a href="{{url('machine/machinetypetable/edit/'.$dataitem->UNID)}}" class=" btn" rel="nofollow" data-cbp-singlePage="projects">รายละเอียด</a>


									                                     </div>
									                                 </div>
									                             </div>
									                         </div>
									                         <div class="cbp-l-grid-projects-title uppercase text-center uppercase text-center">ประเภทเครื่อง : {{$dataitem->TYPE_NAME}}</div>
																					 <div class="cbp-l-grid-projects-desc uppercase text-left uppercase text-left ml-3">สถานะ : {{ $dataitem->TYPE_STATUS == "9" ? 'เปิด' : 'ปิด' }}</div>
									                         <div class="cbp-l-grid-projects-desc uppercase text-center uppercase text-center bg-danger ">
																					 <a href="{{ url('machine/machinetypetable/delete/'.$dataitem->UNID) }}" class="btn btn-danger btn-lg mt--2"><span class="fas fa-trash ">Delete</span></a>
																					 </div>
																			 </div>
									                 </div>
																	 @endforeach

																		 <!--/portfolio 1-->

																 </div>
																 <!-- /portfolio Grid-->
																 <!--portfolio loadMore-->
																 <div id="js-loadMore-juicy-projects" class="cbp-l-loadMore-button">
																		 <a href="loadMorePortfolio.html" class="cbp-l-loadMore-link hvr-underline-from-center text-uppercase" rel="nofollow">
																				 <span class="cbp-l-loadMore-defaultText">load more</span>
																				 <span class="cbp-l-loadMore-loadingText">loading...</span>
																				 <span class="cbp-l-loadMore-noMoreLoading">not load more</span>
																		 </a>
																 </div>
																 <!-- /portfolio loadMore-->
														 </div>
														 <!-- /portfolio -->
													 </div>
												 </div>

										</div>
										{{ $dataset->links() }}

								</div>

								</div>
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
	<script src="{{ asset('assets/js/porfolio/jquery.cubeportfolio.js') }}"></script>
	<script src="{{ asset('assets/js/porfolio/portfolio-1.js') }}"></script>
	<script src="{{ asset('assets/js/porfolio/retina.min.js') }}"></script>
@stop
{{-- ปิดส่วนjava --}}
