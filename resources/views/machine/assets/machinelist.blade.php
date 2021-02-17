@extends('masterlayout.masterlayout')
@section('tittle','homepage')
@section('css')
 <link href="{{asset('assets\css\cubeportfolio.css')}}" rel="stylesheet" type="text/css">
 	  <link href="{{asset('assets\css\portfolio.min.css')}}" rel="stylesheet" type="text/css">
	 <link href="{{asset('assets\css\customize.css')}}" rel="stylesheet" type="text/css">

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
	<div class="content">
		<div class="page-inner">
			<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row ml-4">

					<div class="row">
						<div class="col-md-12 gx-4">
							<a href="{{ url('/machine/dashboard/dashboard') }}">
								<button class="btn btn-primary  btn-sm ">
									<span class="fas fa-arrow-left fa-lg">Back </span>
								</button>
							</a>
						</div>
					</div>

			</div>

	<div class="container-fluid ml-4">

				 <div class="main">

					 <!--portfolio -->
					 <div class="portfolio-content portfolio-1">
							 <!--portfolio Grid-->
							 <div id="js-grid-juicy-projects" class="cbp">
									 <!--portfolio 1-->
									 <div class="cbp-item movie">
											 <div class="cbp-item-wrap">
													 <div class="cbp-caption">
															 <div class="cbp-caption-defaultWrap">
																	 <img src="{{asset('assets/img/1653183730128902_c5_720x720.jpeg')}}" alt="img3"> </div>
															 <div class="cbp-caption-activeWrap">
																	 <div class="cbp-l-caption-alignCenter">
																			 <div class="cbp-l-caption-body">
																					 <div class="btn-group">
																							 <a href="projects/project1.html" class="cbp-singlePage btn" rel="nofollow" data-cbp-singlePage="projects">more info</a>
																							 <a href="https://www.youtube.com/watch?v=3wbvpOIIBQA" class="cbp-lightbox btn btn-sm btn-right" data-title="GoPro: HERO3+ Black Edition<br>by GoPro">view video</a>
																					 </div>
																			 </div>
																	 </div>
															 </div>
													 </div>
													 <div class="cbp-l-grid-projects-title uppercase text-center uppercase text-center">Project One</div>
													 <div class="cbp-l-grid-projects-desc uppercase text-center uppercase text-center">Animation / Movie</div>
											 </div>
									 </div>
									 <!--/portfolio 1-->
									 <!--portfolio 2-->
									 <div class="cbp-item movie">
											 <div class="cbp-item-wrap">
													 <div class="cbp-caption">
															 <div class="cbp-caption-defaultWrap">
																<img src="{{asset('assets/img/1653183730128902_c5_720x720.jpeg')}}" alt="img4"> </div>
															 <div class="cbp-caption-activeWrap">
																	 <div class="cbp-l-caption-alignCenter">
																			 <div class="cbp-l-caption-body">
																					 <div class="btn-group">
																							 <a href="projects/project2.html" class="cbp-singlePage btn btn-sm" rel="nofollow" data-cbp-singlePage="projects">more info</a>
																							 <a href="contents/images/portfolios/1400x900/01.jpg" class="cbp-lightbox btn btn-sm btn-right" data-title="Granite Stationery: Documents Perspective<br>by Aaron Covrett">view larger</a>
																					 </div>
																			 </div>
																	 </div>
															 </div>
													 </div>
													 <div class="cbp-l-grid-projects-title uppercase text-center uppercase text-center">Project Two</div>
													 <div class="cbp-l-grid-projects-desc uppercase text-center uppercase text-center">Animation / Movie</div>
											 </div>
									 </div>
									 <!--/portfolio 2-->
									 <!--portfolio 3-->
									 <div class="cbp-item graphic">
											 <div class="cbp-item-wrap">
													 <div class="cbp-caption">
															 <div class="cbp-caption-defaultWrap">
																	 <img src="{{asset('assets/img/1653183730128902_c5_720x720.jpeg')}}" alt="img5"> </div>
															 <div class="cbp-caption-activeWrap">
																	 <div class="cbp-l-caption-alignCenter">
																			 <div class="cbp-l-caption-body">
																					 <div class="btn-group">
																							 <a href="projects/project3.html" class="cbp-singlePage btn btn-sm" rel="nofollow" data-cbp-singlePage="projects">more info</a>
																							 <a href="http://vimeo.com/1084537" class="cbp-lightbox btn btn-sm btn-right" data-title="Big Buck Bunny<br>by Blender Foundation">view video</a>
																					 </div>
																			 </div>
																	 </div>
															 </div>
													 </div>
													 <div class="cbp-l-grid-projects-title uppercase text-center uppercase text-center">Project Three</div>
													 <div class="cbp-l-grid-projects-desc uppercase text-center uppercase text-center">Graphic</div>
											 </div>
									 </div>
									 <!--/portfolio 3-->
									 <!--portfolio 4-->
									 <div class="cbp-item identity">
											 <div class="cbp-item-wrap">
													 <div class="cbp-caption">
															 <div class="cbp-caption-defaultWrap">
																	<img src="{{asset('assets/img/1653183730128902_c5_720x720.jpeg')}}" alt="img6"> </div>
															 <div class="cbp-caption-activeWrap">
																	 <div class="cbp-l-caption-alignCenter">
																			 <div class="cbp-l-caption-body">
																					 <div class="btn-group">
																							 <a href="projects/project4.html" class="cbp-singlePage btn btn-sm" rel="nofollow" data-cbp-singlePage="projects">more info</a>
																							 <a href="contents/images/portfolios/1400x900/02.jpg" class="cbp-lightbox btn btn-sm btn-right" data-title="Granite Stationery: Resume Perspective<br>by Aaron Covrett">view larger</a>
																					 </div>
																			 </div>
																	 </div>
															 </div>
													 </div>
													 <div class="cbp-l-grid-projects-title uppercase text-center uppercase text-center">Project Four</div>
													 <div class="cbp-l-grid-projects-desc uppercase text-center uppercase text-center">Identity / Graphic</div>
											 </div>
									 </div>
									 <!--/portfolio 4-->
									 <!--portfolio 5-->
									 <div class="cbp-item web-design">
											 <div class="cbp-item-wrap">
													 <div class="cbp-caption">
															 <div class="cbp-caption-defaultWrap">
																	 <img src="{{asset('assets/img/1653183730128902_c5_720x720.jpeg')}}" alt="img7"> </div>
															 <div class="cbp-caption-activeWrap">
																	 <div class="cbp-l-caption-alignCenter">
																			 <div class="cbp-l-caption-body">
																					 <div class="btn-group">
																							 <a href="projects/project5.html" class="cbp-singlePage btn btn-sm" rel="nofollow" data-cbp-singlePage="projects">more info</a>
																							 <a href="https://www.youtube.com/watch?v=3wbvpOIIBQA" class="cbp-lightbox btn btn-sm btn-right" data-title="GoPro: HERO3+ Black Edition<br>by GoPro">view video</a>
																					 </div>
																			 </div>
																	 </div>
															 </div>
													 </div>
													 <div class="cbp-l-grid-projects-title uppercase text-center uppercase text-center">Project Five</div>
													 <div class="cbp-l-grid-projects-desc uppercase text-center uppercase text-center">Web Design / Graphic</div>
											 </div>
									 </div>
									 <!--/portfolio 5-->
									 <!--portfolio 6-->
									 <div class="cbp-item logos">
											 <div class="cbp-item-wrap">
													 <div class="cbp-caption">
															 <div class="cbp-caption-defaultWrap">
																	<img src="{{asset('assets/img/1653183730128902_c5_720x720.jpeg')}}" alt="img8"> </div>
															 <div class="cbp-caption-activeWrap">
																	 <div class="cbp-l-caption-alignCenter">
																			 <div class="cbp-l-caption-body">
																					 <div class="btn-group">
																							 <a href="projects/project6.html" class="cbp-singlePage btn btn-sm" rel="nofollow" data-cbp-singlePage="projects">more info</a>
																							 <a href="contents/images/portfolios/1400x900/03.jpg" class="cbp-lightbox btn btn-sm btn-right" data-title="Granite Stationery: Resume Close-Up<br>by Aaron Covrett">view larger</a>
																					 </div>
																			 </div>
																	 </div>
															 </div>
													 </div>
													 <div class="cbp-l-grid-projects-title uppercase text-center uppercase text-center">Project Six</div>
													 <div class="cbp-l-grid-projects-desc uppercase text-center uppercase text-center">Logos / Graphic</div>
											 </div>
									 </div>
									 <!--/portfolio 6-->
									 <!--portfolio 7-->
									 <div class="cbp-item logos">
											 <div class="cbp-item-wrap">
													 <div class="cbp-caption">
															 <div class="cbp-caption-defaultWrap">
																	<img src="{{asset('assets/img/1653183730128902_c5_720x720.jpeg')}}" alt="img9"> </div>
															 <div class="cbp-caption-activeWrap">
																	 <div class="cbp-l-caption-alignCenter">
																			 <div class="cbp-l-caption-body">
																					 <div class="btn-group">
																							 <a href="projects/project7.html" class="cbp-singlePage btn btn-sm" rel="nofollow" data-cbp-singlePage="projects">more info</a>
																							 <a href="http://vimeo.com/1084537" class="cbp-lightbox btn btn-sm btn-right" data-title="Big Buck Bunny<br>by Blender Foundation">view video</a>
																					 </div>
																			 </div>
																	 </div>
															 </div>
													 </div>
													 <div class="cbp-l-grid-projects-title uppercase text-center uppercase text-center">Project Seven</div>
													 <div class="cbp-l-grid-projects-desc uppercase text-center uppercase text-center">Logos / Graphic</div>
											 </div>
									 </div>
									 <!--/portfolio 7-->
									 <!--portfolio 8-->
									 <div class="cbp-item web-design">
											 <div class="cbp-item-wrap">
													 <div class="cbp-caption">
															 <div class="cbp-caption-defaultWrap">
																	 <img src="{{asset('assets/img/1653183730128902_c5_720x720.jpeg')}}" alt="img10"> </div>
															 <div class="cbp-caption-activeWrap">
																	 <div class="cbp-l-caption-alignCenter">
																			 <div class="cbp-l-caption-body">
																					 <div class="btn-group">
																							 <a href="projects/project8.html" class="cbp-singlePage btn btn-sm" rel="nofollow" data-cbp-singlePage="projects">more info</a>
																							 <a href="contents/images/portfolios/1400x900/01.jpg" class="cbp-lightbox btn btn-sm btn-right" data-title="Granite Stationery: Documents Perspective<br>by Aaron Covrett">view larger</a>
																					 </div>
																			 </div>
																	 </div>
															 </div>
													 </div>
													 <div class="cbp-l-grid-projects-title uppercase text-center uppercase text-center">Project Eight</div>
													 <div class="cbp-l-grid-projects-desc uppercase text-center uppercase text-center">Web Design / Graphic</div>
											 </div>
									 </div>
									 <!--/portfolio 8-->
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
