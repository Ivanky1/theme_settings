(function ($) {
    Drupal.behaviors.googleYearDiagr = {
        attach: function(context, settings) {
            google.setOnLoadCallback(drawBasic);
            function drawBasic() {

                var data = google.visualization.arrayToDataTable([
                    ["Jahr", "Die Anzahl der Datenpannen", { role: "style" } ],
                    ['2007', 333, '#057C32'],
                    ['2008', 530, '#057C32'],
                    ['2009', 747, '#057C32'],
                    ['2010', 794, '#057C32'],
                    ['2011', 801, '#057C32'],
                    ['2012', 934, '#057C32'],
                    ['2013', 1143, '#057C32'],
                    ['2014', 1395, '#EE1C24'],

                ]);



                var options = {
                    legend: 'none',
                    width: 608,
                    height: 350,
                    bar: {groupWidth: '35%'},
                    vAxis: { gridlines: { count: 4 }, },
                    //chartArea: {width: 600}
                };

                var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));
                chart.draw(data, options);
            }
        }
    };
})(jQuery);


