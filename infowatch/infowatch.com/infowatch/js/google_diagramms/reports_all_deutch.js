google.setOnLoadCallback(drawChart);
google.setOnLoadCallback(drawBasic);
google.setOnLoadCallback(drawChartToo);
function drawChart() {
    var data = google.visualization.arrayToDataTable([
        ['Task', 'Amount given'],
        ['Äußerliche Angriffe', 32.2],
        ['Innere Täter', 65.1],
        ['', 0],
        ['Unbestimmt', 2.7]

    ]);

    var options = {
        pieHole: 0.5,
        pieSliceTextStyle: {
            color: 'black'
        },
        legend: { alignment: "center"},
        height: 400,
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
        ["Jahren", "Die Anzahl der registrierten", { role: "style" } ],
        ['2006', 157, '#057C32'],
        ['2007', 184, '#057C32'],
        ['2008', 260, '#057C32'],
        ['2009', 291, '#057C32'],
        ['2010', 359, '#057C32'],
        ['2011', 392, '#057C32'],
        ['2012', 420, '#057C32'],
        ['2013', 496, '#057C32'],
        ['2014', 654, '#057C32'],
        ['2015', 723, '#EE1C24'],
    ]);



    var options = {
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
        ['Title', 'Count'],
        ['Mitarbeiter', 57.3], ['Externe Angreifer', 32.2], ['Unbestimmt', 6.2],
        ['Auftragnehmer', 1.8], ['Leiter', 1.1], ['ehemalige Mitarbeiter', 1.0],
        ['Systemadministrator', 0.4],

    ]);

    var options = {
        // pieSliceText: 'label',
        width: 636,
        chartArea: {width: 636},
        height: 400,
        pieHole: 0.5,
        legend: {
            alignment: "center"
        }

    };

    var chart = new google.visualization.PieChart(document.getElementById('piechart'));
    chart.draw(data, options);
}