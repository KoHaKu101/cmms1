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
      <div class="card">
        <div class="card-header ml-3">
            <a href="{{ route('machine.form') }}"><button class="btn btn-primary btn-xs">
              <span class="fas fa-file fa-lg">	New	</span>
            </button></a>
        </div>
        <div class="card-body">
          <div class="portfolio-content portfolio-1">
              <!--portfolio Grid-->
              <div id="js-grid-juicy-projects" class="cbp">
                <div class="cbp-item movie" style="width:250px">
                    <div class="cbp-item-wrap">
                        <div class="cbp-caption">
                            <div class="cbp-caption-defaultWrap">
                              <a href="{{url('machine/assets/machinelist')}}">
                                <img src="{{asset('assets/img/bg-404.jpeg')}}" alt="img3">
                              </a> </div>
                            <div class="cbp-caption-activeWrap">
                                <div class="cbp-l-caption-alignCenter">
                                    <div class="cbp-l-caption-body">
                                        <div class="btn-group">
                                            <a href="{{url('machine/assets/machinelist/')}}" class=" btn" rel="nofollow" data-cbp-singlePage="projects">ทะเบียนเครื่องจักร</a>

                                            <a href="{{url('machine/syscheck/syschecklist')}}" class=" btn btn-sm btn-right" data-title="GoPro: HERO3+ Black Edition<br>by GoPro">กำหนดตรวจสอบ</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="cbp-l-grid-projects-title uppercase text-center uppercase text-center">เครื่องจักรทั้งหมด</div>
                                                  <div class="cbp-l-grid-projects-desc uppercase text-center uppercase text-center"></div>
                    </div>
                </div>
                @foreach ($dataset as $key => $dataitem)


                  <!--portfolio 1-->
                  <div class="cbp-item movie">
                      <div class="cbp-item-wrap">
                          <div class="cbp-caption">
                              <div class="cbp-caption-defaultWrap">
                                <a href="{{url('machine/assets/machinelist/'.$dataitem->LINE_CODE)}}">
                                  <img src="{{asset('assets/img/bg-404.jpeg')}}" alt="img3">
                                </a>
                                </div>
                              <div class="cbp-caption-activeWrap">
                                  <div class="cbp-l-caption-alignCenter">
                                      <div class="cbp-l-caption-body">
                                          <div class="btn-group">
                                              <a href="{{url('machine/assets/machinelist/'.$dataitem->LINE_CODE)}}" class=" btn" rel="nofollow" data-cbp-singlePage="projects">ทะเบียนเครื่องจักร</a>
                                              <input type="hidden" value="{{ $dataitem->LINE_CODE }}">
                                              <a href="{{url('machine/syscheck/syschecklist:/'.$dataitem->LINE_CODE)}}" class=" btn btn-sm btn-right" >กำหนดตรวจสอบ</a>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                          <div class="cbp-l-grid-projects-title uppercase text-center uppercase text-center">เครื่องจักร {{ $dataitem->LINE_NAME }}</div>
                                                    <div class="cbp-l-grid-projects-desc uppercase text-center uppercase text-center"></div>
                      </div>
                  </div>
                  @endforeach
                  <!--/portfolio 1-->

              </div>
              <!-- /portfolio Grid-->

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
