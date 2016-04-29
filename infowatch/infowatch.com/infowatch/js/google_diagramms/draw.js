
google.setOnLoadCallback(drawChart);
google.setOnLoadCallback(drawBasic);
google.setOnLoadCallback(drawChartToo);
function drawChart() {
    var data = google.visualization.arrayToDataTable([
        ['Task', 'Amount given'],
        ['External attacks', 32.2],
        ['Insiders', 65.1],
        ['', 0],
        ['Undefined', 2.7]

    ]);

    var options = {
        title: 'Leak distribution by exposure to the vector',
        pieHole: 0.5,
        pieSliceTextStyle: {
            color: 'black'
        },
        legend: { alignment: "center"},
        height: 450,
        width: 636,
        chartArea: {width: 636}


      //  colors: ['#e0440e', '#e6693e', '#e0440e', '#f3b49f', '#f6c7b6']
    };
    var chart = new google.visualization.PieChart(document.getElementById('donut_single'));
    chart.draw(data, options);
}


function drawBasic() {

    var data = new google.visualization.DataTable();

    var data = google.visualization.arrayToDataTable([
        ["Year", "Number of leaks", { role: "style" } ],
        ['2006', 157, 'blue'],
        ['2007', 184, 'blue'],
        ['2008', 260, 'blue'],
        ['2009', 291, 'blue'],
        ['2010', 359, 'blue'],
        ['2011', 392, 'blue'],
        ['2012', 420, 'blue'],
        ['2013', 496, 'blue'],
        ['2014', 654, 'blue'],
        ['2015', 723, 'green'],
    ]);



    var options = {
        title: 'Number of reported leaks',
        legend: 'none',
        width: 636,
        height: 350,
        bar: {groupWidth: '55%'},
        vAxis: { gridlines: { count: 4 } },
        chartArea: {width: 550}
    };

    var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));
    chart.draw(data, options);
}

function drawChartToo() {
    var data = google.visualization.arrayToDataTable([
        ['Title', 'Amount'],
        ['Banking and Finance', 16.3], ['Medicine', 23.4], ['Commerce, HoReCa', 8.4],
        ['High tech', 12.6], ['Industry and Transport', 8.6], ['State bodies and law enforcement agencies', 15.6],
        ['Education', 3.9], ['Public office', 15.6], ['Other/Undefined', 0.8],

    ]);

    var options = {
        title: 'Number of leaks',
       // pieSliceText: 'label',
        width: 636,
        chartArea: {width: 636},
        height: 450,
        pieHole: 0.5,
        legend: {
            alignment: "center"
        },

    };

    var chart = new google.visualization.PieChart(document.getElementById('piechart'));
    chart.draw(data, options);
}