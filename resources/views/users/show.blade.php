@extends('layouts.default')
@section('title', $user->name)

@section('content')
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>ECharts</title>
    <!-- 引入 echarts.js -->
    <script src="../echarts.min.js"></script>
</head>
<body><script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <!-- 为ECharts准备一个具备大小（宽高）的Dom -->
    <div id="main" style="width: 900px;height:600px;"></div>
    <div id='app'></div>
    <script type="text/javascript">
    var myChart = echarts.init(document.getElementById('main'));
    // 显示标题，图例和空的坐标轴
    myChart.setOption({
        title: {
            text: '體溫數據'
        },
        tooltip: {
          trigger:'axis'
        },
        legend: {
            data:['體溫']
        },
        xAxis: {
            data: []
        },
        yAxis: {
            type : 'value',
            axisLabel : {
                formatter: '{value} °C'
            }
          },
        series: [{
            name: '體溫',
            type: 'line',
            data: []
        }]
    });

    // 异步加载数据
    $.get('/api/data.json').done(function (data) {
      console.log(data)
        // 填入数据
        myChart.setOption({
            xAxis: {
                data: data.map(e => {return e.categories})
            },
            series: [{
                // 根据名字对应到相应的系列
                name: '體溫',
                data: data.map(e => {return e.data})
            }]
        });
    });
    </script>
</body>
</html>
@stop
