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
							<h2 class="text-white pb-2 fw-bold">ค่าซ่อมในแต่ล่ะ LINE</h2>
						</div>
						</div>
				</div>
			</div>

			<div class="row">
				<div class="col-md-12">
					<div class="card">
						<div class="card-header">
							<div class="card-title">ค่าซ่อมประจำเดือน Line 1</div>
						</div>
						<div class="card-body">
							<div class="chart-container">
								<canvas id="multipleLine1"></canvas>
							</div>
						</div>
					</div>
				</div>
		</div>
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <div class="card-title">ค่าซ่อมประจำเดือน Line 2</div>
          </div>
          <div class="card-body">
            <div class="chart-container">
              <canvas id="multipleLine2"></canvas>
            </div>
          </div>
        </div>
      </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <div class="card-title">ค่าซ่อมประจำเดือน Line 3</div>
        </div>
        <div class="card-body">
          <div class="chart-container">
            <canvas id="multipleLine3"></canvas>
          </div>
        </div>
      </div>
    </div>
</div>
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <div class="card-title">ค่าซ่อมประจำเดือน Line 4</div>
      </div>
      <div class="card-body">
        <div class="chart-container">
          <canvas id="multipleLine4"></canvas>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <div class="card-title">ค่าซ่อมประจำเดือน Line 5</div>
      </div>
      <div class="card-body">
        <div class="chart-container">
          <canvas id="multipleLine5"></canvas>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <div class="card-title">ค่าซ่อมประจำเดือน Line 6</div>
      </div>
      <div class="card-body">
        <div class="chart-container">
          <canvas id="multipleLine6"></canvas>
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
	var multipleLine1 = document.getElementById('multipleLine1').getContext('2d'),
  multipleLine2 = document.getElementById('multipleLine2').getContext('2d'),
  multipleLine3 = document.getElementById('multipleLine3').getContext('2d'),
  multipleLine4 = document.getElementById('multipleLine4').getContext('2d'),
  multipleLine5 = document.getElementById('multipleLine5').getContext('2d'),
  multipleLine6 = document.getElementById('multipleLine6').getContext('2d');

	var myMultipleLine1 = new Chart(multipleLine1, {
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
				text: 'ค่าซ่อมประจำเดือน'
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
  var myMultipleLine1 = new Chart(multipleLine2, {
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
				text: 'ค่าซ่อมประจำเดือน'
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
  var myMultipleLine1 = new Chart(multipleLine3, {
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
				text: 'ค่าซ่อมประจำเดือน'
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
  var myMultipleLine1 = new Chart(multipleLine4, {
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
				text: 'ค่าซ่อมประจำเดือน'
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
  var myMultipleLine1 = new Chart(multipleLine5, {
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
				text: 'ค่าซ่อมประจำเดือน'
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
  var myMultipleLine1 = new Chart(multipleLine6, {
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
				text: 'ค่าซ่อมประจำเดือน'
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


</script>
@stop
{{-- ปิดส่วนjava --}}
