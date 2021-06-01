
	var chartDom = document.getElementById('repair');
	var myChart = echarts.init(chartDom);
	var option;
	option = {
		legend: {show: true,textStyle: {
      fontSize: 14
    }},
		tooltip: {},
		dataset: {
			source: [
			['product', 'Line1', 'Line2', 'Line3','Line4', 'Line5', 'Line6'],
			['แจ้งซ่อมในแต่ล่ะ LINE', 43.3, 85.8, 93.7,43.3, 85.8, 93.7],
		]
	},
	xAxis: {type: 'category'},
	yAxis: {},
	// Declare several bar series, each will be mapped
	// to a column of dataset.source by default.
	series: [
		{type: 'bar',color: '#14BAFD',
		label: {position: "top",show: true,fontSize: 16,color: 'black'},},
		{type: 'bar',color: '#FF944F',
		label: {position: "top",show: true,fontSize: 16,color: 'black'},},
		{type: 'bar',color: '#BAFF4F',
		label: {position: "top",show: true,fontSize: 16,color: 'black'},},
		{type: 'bar',color: '#FF4F4F',
		label: {position: "top",show: true,fontSize: 16,color: 'black'},},
		{type: 'bar',color: '#FF4FCF',
		label: {position: "top",show: true,fontSize: 16,color: 'black'},},
		{type: 'bar',color: '#4F62FF',
		label: {position: "top",show: true,fontSize: 16,color: 'black'},}
	]
	};
	option && myChart.setOption(option);
