
google.setOnLoadCallback(drawChart);
google.setOnLoadCallback(drawBasic);
google.setOnLoadCallback(drawChartToo);
function drawChart() {
    var data = google.visualization.arrayToDataTable([
        ['Task', 'Amount given'],
        ['Внешние атаки', 32.2],
        ['Внутренний нарушитель', 65.1],
        ['', 0],
        ['Не определено', 2.7]

    ]);

    var options = {
        title: 'Распределение утечек по вектору воздействия',
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
        ["Год", "Число утечек", { role: "style" } ],
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
        title: 'Число зарегистрированных утечек',
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
        ['Title', 'Количество'],
        ['Банки и финансы', 16.3], ['Медицина', 23.4], ['Торговля, HoReCa', 8.4],
        ['Высокие технологии', 12.6], ['Промышленность и транспорт', 8.6], ['Госорганы и силовые структуры', 15.6],
        ['Образование', 3.9], ['Муниципальные учреждения', 15.6], ['Другое/не определено', 0.8],

    ]);

    var options = {
        title: 'Число утечек',
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