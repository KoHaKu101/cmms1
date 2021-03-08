var chartDom1 = document.getElementById('price');
var myChart1 = echarts.init(chartDom1,);
var option;
var dataAxis = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
var data = [220, 182, 191, 234, 290, 330, 310, 123, 442, 321, 90, 149, 210, 122, 133, 334, 198, 123, 125, 220];
var data1 = [300, 182, 191, 234, 290, 330, 310, 123, 442, 321, 90, 149, 210, 122, 133, 334, 198, 123, 125, 220];
var yMax = 500;
var dataShadow = [];
for (var i = 0; i < data.length; i++) {	dataShadow.push(yMax);
}
option = {
  legend: {show: true,textStyle: {
    fontSize: 14
  },data: ['ค่าอะไหล่','ค่าจ้าง SubContaine']
  },
  title: {
      text: 'ค่าซ่อมประจำเดือน',
  },
  xAxis: {
      data: dataAxis,
      axisLabel: {
          inside: false,
          textStyle: {
              color: 'black'
          }
      },
      axisTick: {
          show: false
      },
      axisLine: {
          show: false
      },
      z: 10
  },
  yAxis: {
      axisLine: {
          show: false
      },
      axisTick: {
          show: false
      },
      axisLabel: {
          textStyle: {
              color: 'black'
          }
      }
  },
  series: [
      {
          name: 'ค่าอะไหล่',
          type: 'bar',

          itemStyle: {
              color: new echarts.graphic.LinearGradient(
                  0, 0, 0, 1,
                  [
                      {offset: 0, color: '#83bff6'},
                      {offset: 0.5, color: '#188df0'},
                      {offset: 1, color: '#188df0'}
                  ]
              )
          },
          emphasis: {
              itemStyle: {
                  color: new echarts.graphic.LinearGradient(
                      0, 0, 0, 1,
                      [
                          {offset: 0, color: '#2378f7'},
                          {offset: 0.7, color: '#2378f7'},
                          {offset: 1, color: '#83bff6'}
                      ]
                  )
              }
          },
          data: data
      },
      {
          name: 'ค่าจ้าง SubContaine',
          type: 'bar',

          itemStyle: {
              color: new echarts.graphic.LinearGradient(
                  0, 0, 0, 1,
                  [
                      {offset: 0, color: '#FF9595'},
                      {offset: 0.5, color: '#FF5656'},
                      {offset: 1, color: '#FF1616'}
                  ]
              )
          },
           emphasis: {
              itemStyle: {
                  color: new echarts.graphic.LinearGradient(
                      0, 0, 0, 1,
                      [
                          {offset: 0, color: '#FF1616'},
                          {offset: 0.7, color: '#FF5656'},
                          {offset: 1, color: '#FF9595'}
                      ]
                  )
              }
          },
          data : data1
      }
  ],
};
option && myChart1.setOption(option);
