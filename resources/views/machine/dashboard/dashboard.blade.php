@extends('masterlayout.masterlayout')
@section('tittle','homepage')
@section('css')
<link rel="stylesheet" href="{{ asset('assets/icofont/icofont.min.css') }}">
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
			<div class="panel-header bg-primary-gradient">
				<div class="page-inner py-5">
					<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
						<div>
							<h2 class="text-white pb-2 fw-bold">Dashboard</h2>
						</div>
						</div>
				</div>
			</div>
			<div class="page-inner mt--5">
				<div class="row">
					<div class="col-sm-6 col-md-3">
						<div class="card card-stats card-primary card-round">
							<div class="card-body">
								<div class="row">
									<div class="col-5">
										<div class="icon-big text-center">
											<i class="fas fa-industry"></i>
										</div>
									</div>
									<div class="col-7 col-stats">
										<div class="numbers">
											<p class="card-category">เครื่องจักรทั้งหมด</p>
											<h4 class="card-title">1,294</h4>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-sm-6 col-md-3">
						<div class="card card-stats card-primary card-round">
							<div class="card-body">
								<div class="row">
									<div class="col-5">
										<div class="icon-big text-center">
											<i class="fas fa-user-check"></i>
										</div>
									</div>
									<div class="col-7 col-stats">
										<div class="numbers">
											<p class="card-category">เครื่องเปิดการใช้งาน</p>
											<h4 class="card-title">1,294</h4>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-sm-6 col-md-3">
						<div class="card card-stats card-primary card-round">
							<div class="card-body">
								<div class="row">
									<div class="col-5">
										<div class="icon-big text-center">
											<i class="fas fa-user-clock"></i>
										</div>
									</div>
									<div class="col-7 col-stats">
										<div class="numbers">
											<p class="card-category">เครื่องรอขึ้นงาน</p>
											<h4 class="card-title">1,294</h4>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-sm-6 col-md-3">
						<div class="card card-stats card-primary card-round">
							<div class="card-body">
								<div class="row">
									<div class="col-5">
										<div class="icon-big text-center">
											<i class="fas fa-toolbox fa-lg"></i>
										</div>
									</div>
									<div class="col-7 col-stats">
										<div class="numbers">
											<p class="card-category">เครื่องรอซ่อม</p>
											<h4 class="card-title">1,294</h4>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="page-inner mt--5">
				<div class="row">
					<div class="col-md-12">
					<div class="card full-height">
						<div class="card-body">
							<div class="card-title">เครื่องจักรในแต่ล่ะ LINE </div>

							<div class="d-flex flex-wrap justify-content-around pb-2 pt-4">
								<div class="px-2 pb-2 pb-md-0 text-center">
									<div id="circles-1"></div>
									<h6 class="fw-bold mt-3 mb-0">Line 1</h6>
								</div>
								<div class="px-2 pb-2 pb-md-0 text-center">
									<div id="circles-2"></div>
									<h6 class="fw-bold mt-3 mb-0">Line 2</h6>
								</div>
								<div class="px-2 pb-2 pb-md-0 text-center">
									<div id="circles-3"></div>
									<h6 class="fw-bold mt-3 mb-0">Line 3</h6>
								</div>
								<div class="px-2 pb-2 pb-md-0 text-center">
									<div id="circles-4"></div>
									<h6 class="fw-bold mt-3 mb-0">Line 4</h6>
								</div>
								<div class="px-2 pb-2 pb-md-0 text-center">
									<div id="circles-5"></div>
									<h6 class="fw-bold mt-3 mb-0">Line 5</h6>
								</div>
								<div class="px-2 pb-2 pb-md-0 text-center">
									<div id="circles-6"></div>
									<h6 class="fw-bold mt-3 mb-0">Line 6</h6>
								</div>

							</div>
						</div>
					</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-3">
						<div class="card">
							<div class="card-header">
								<div class="card-title ml-2">แจ้งซ่อมล่าสุด</div>
							</div>
							<div class="card-body pb-0">
								<div class="d-flex">
									<div class="avatar">
										<img src="/assets/img/logoproduct.svg" alt="..." class="avatar-img rounded-circle">
									</div>
									<div class="flex-1 pt-1 ml-2">
										<h6 class="fw-bold mt-2">เครื่องเปิดไม่ติด</h6>
										<div class="row">
											<p class="text-muted dropdown-item">08/02/2021 10:00</p>
										</div>
									</div>
									<div class="d-flex ml-auto align-items-center">
										<h3 class="text-success fw-bold">MC-001</h3>
									</div>
								</div>
								<div class="separator-dashed"></div>
								<div class="d-flex">
									<div class="avatar">
										<img src="/assets/img/logoproduct.svg" alt="..." class="avatar-img rounded-circle">
									</div>
									<div class="flex-1 pt-1 ml-2">
									<h6 class="fw-bold mt-2">น้ำcoolanรั่ว</h6>
									</div>
									<div class="d-flex ml-auto align-items-center">
										<h3 class="text-warning fw-bold">MC-002</h3>
									</div>
								</div>
								<div class="separator-dashed"></div>
								<div class="d-flex">
									<div class="avatar">
										<img src="/assets/img/logoproduct.svg" alt="..." class="avatar-img rounded-circle">
									</div>
									<div class="flex-1 pt-1 ml-2">
										<h6 class="fw-bold mt-2">มอเตอร์ไม่ทำงาน</h6>
									</div>
									<div class="d-flex ml-auto align-items-center">
										<h3 class="text-danger fw-bold">MC-003</h3>
									</div>
								</div>
							</div>
						</div>

					</div>
					<div class="col-md-4">
						<div class="card">
							<div class="card-header">
								<div class="card-title">แจ้งซ่อมแต่ล่ะ LINE</div>
							</div>
							<div class="card-body">
								<div class="chart-container">
									<canvas id="barChart"></canvas>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-5">
						<div class="card">
							<div class="card-header">
								<div class="card-title">ค่าซ่อมประจำเดือน</div>
							</div>
							<div class="card-body">
								<div class="chart-container">
									<canvas id="multipleBarChart"></canvas>
								</div>
							</div>
						</div>
					</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="card">
						<div class="card-header">
							<div class="card-title">ค่าซ่อมประจำเดือน</div>
						</div>
						<div class="card-body">
							<div class="chart-container">
								<canvas id="multipleLine"></canvas>
							</div>
						</div>
					</div>
				</div>
		</div>
		</div>
		<footer class="footer">
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
		</footer>

@stop
{{-- ปิดส่วนเนื้อหาและส่วนท้า --}}

{{-- ส่วนjava --}}
@section('javascript')
<script src="{{asset('/assets/js/plugin/chart.js/chart.min.js')}}"></script>
<script src="{{asset('/assets/js/plugin/chart-circle/circles.min.js')}}"></script>
<script>
	var multipleBarChart = document.getElementById('multipleBarChart').getContext('2d'),
			multipleLine = document.getElementById('multipleLine').getContext('2d'),
	 		barChart = document.getElementById('barChart').getContext('2d');

	var myBarChart = new Chart(barChart, {
		type: 'bar',
		data: {
			labels: ["Line 1", "Line 2", "Line 3", "Line 4", "Line 5", "Line 6"],
			datasets : [{
				label: "แจ้งซ่อมเครื่องจักรในแต่ล่ะ LINE",
				backgroundColor: 'rgb(23, 125, 255)',
				borderColor: 'rgb(23, 125, 255)',
				data: [3, 2, 9, 5, 4, 6,],
			}],
		},
		options: {
			responsive: true,
			maintainAspectRatio: false,
			scales: {
				yAxes: [{
					ticks: {
						beginAtZero:true
					}
				}]
			},
		}
	});
	var myMultipleBarChart = new Chart(multipleBarChart, {
		type: 'bar',
		data: {
			labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
			datasets : [{
				label: "ค่าอะไหล่",
				backgroundColor: '#59d05d',
				borderColor: '#59d05d',
				data: [95, 100, 112, 101, 144, 159, 178, 156, 188, 190, 210, 245],
			},{
				label: "ค่าจ้าง Subcontact",
				backgroundColor: '#fdaf4b',
				borderColor: '#fdaf4b',
				data: [145, 256, 244, 233, 210, 279, 287, 253, 287, 299, 312,356],

			}],
		},
		options: {
			responsive: true,
			maintainAspectRatio: false,
			legend: {
				position : 'bottom'
			},
			title: {
				display: true,
				text: 'ค่าใช้จ่ายในแต่ล่ะเดือน'
			},
			tooltips: {
				mode: 'index',
				intersect: false
			},
			responsive: true,
			scales: {
				xAxes: [{
					stacked: true,
				}],
				yAxes: [{
					stacked: true
				}]
			}
		}
	});
	var myMultipleLine = new Chart(multipleLine, {
		type: 'bar',
		data: {
			labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
			datasets : [{
				label: "ค่าอะไหล่",
				backgroundColor: '#59d05d',
				borderColor: '#59d05d',
				data: [95, 100, 112, 101, 144, 159, 178, 156, 188, 190, 210, 245],
			},{
				label: "ค่าจ้าง Subcontact",
				backgroundColor: '#fdaf4b',
				borderColor: '#fdaf4b',
				data: [145, 256, 244, 233, 210, 279, 287, 253, 287, 299, 312,356],

			}],
		},
		options: {
			responsive: true,
			maintainAspectRatio: false,
			legend: {
				position : 'bottom'
			},
			title: {
				display: true,
				text: 'ค่าใช้จ่ายในแต่ล่ะเดือน'
			},
			tooltips: {
				mode: 'index',
				intersect: false
			},
			responsive: true,
			scales: {
				xAxes: [{
					stacked: true,
				}],
				yAxes: [{
					stacked: true
				}]
			}
		}
	});

	Circles.create({
		id:'circles-1',
		radius:45,
		value:60,
		maxValue:100,
		width:7,
		text: 5,
		colors:['#f1f1f1', '#FF9E27'],
		duration:400,
		wrpClass:'circles-wrp',
		textClass:'circles-text',
		styleWrapper:true,
		styleText:true
	})
	Circles.create({
		id:'circles-2',
		radius:45,
		value:70,
		maxValue:100,
		width:7,
		text: 36,
		colors:['#f1f1f1', '#2BB930'],
		duration:400,
		wrpClass:'circles-wrp',
		textClass:'circles-text',
		styleWrapper:true,
		styleText:true
	})
	Circles.create({
		id:'circles-3',
		radius:45,
		value:40,
		maxValue:100,
		width:7,
		text: 12,
		colors:['#f1f1f1', '#F25961'],
		duration:400,
		wrpClass:'circles-wrp',
		textClass:'circles-text',
		styleWrapper:true,
		styleText:true
	})
	Circles.create({
		id:'circles-4',
		radius:45,
		value:20,
		maxValue:100,
		width:7,
		text: 20,
		colors:['#f1f1f1', '#5EE91D'],
		duration:400,
		wrpClass:'circles-wrp',
		textClass:'circles-text',
		styleWrapper:true,
		styleText:true
	})
	Circles.create({
		id:'circles-5',
		radius:45,
		value:40,
		maxValue:100,
		width:7,
		text: 40,
		colors:['#f1f1f1', '#F018F7'],
		duration:400,
		wrpClass:'circles-wrp',
		textClass:'circles-text',
		styleWrapper:true,
		styleText:true
	})
	Circles.create({
		id:'circles-6',
		radius:45,
		value:60,
		maxValue:100,
		width:7,
		text: 60,
		colors:['#f1f1f1', '#6C14FD'],
		duration:400,
		wrpClass:'circles-wrp',
		textClass:'circles-text',
		styleWrapper:true,
		styleText:true
	})
</script>
@stop
{{-- ปิดส่วนjava --}}
