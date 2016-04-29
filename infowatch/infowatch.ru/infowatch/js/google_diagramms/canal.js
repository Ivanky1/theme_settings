(function ($) {
    Drupal.behaviors.googleMapsCanal = {
        attach: function(context, settings) {
            $('.canal_google a').on('click', function() {
                $('.circle_google a').removeClass('selected');
                $('.canal_google a').removeClass('selected');
                $(this).addClass('selected');
                var year = '';
                switch ($(this).attr('href')) {
                    case '#type1':
                        year = [
                            ["Год", "Число утечек" ],
                            ['2009', 107],
                            ['2010', 199],
                            ['2011', 111],
                            ['2012', 140],
                            ['2013', 163],
                            ['2014', 203],
                            ['2015', 100],
                        ];
                        break;
                    case '#type2':
                        year =[
                            ["Год", "Число утечек" ],
                            ['2009', 146],
                            ['2010', 159],
                            ['2011', 153],
                            ['2012', 208],
                            ['2013', 250],
                            ['2014', 226],
                            ['2015', 185],
                        ];
                        break;
                    case '#type3':
                        year = [
                            ["Год", "Число утечек" ],
                            ['2009', 134],
                            ['2010', 127],
                            ['2011', 109],
                            ['2012', 63],
                            ['2013', 350],
                            ['2014', 448],
                            ['2015', 602],
                        ];
                        break;
                    case '#type4':
                        year = [
                            ["Год", "Число утечек" ],
                            ['2009', 98],
                            ['2010', 95],
                            ['2011', 77],
                            ['2012', 90],
                            ['2013', 51],
                            ['2014', 8],
                            ['2015', 4],
                        ];
                        break;
                    case '#type5':
                        year = [
                            ["Год", "Число утечек" ],
                            ['2009', 39],
                            ['2010', 56],
                            ['2011', 50],
                            ['2012', 58],
                            ['2013', 57],
                            ['2014', 46],
                            ['2015', 47],
                        ];break;
                    case '#type6':
                        year = [
                            ["Год", "Число утечек" ],
                            ['2009', 34],
                            ['2010', 64],
                            ['2011', 50],
                            ['2012', 56],
                            ['2013', 124],
                            ['2014', 104],
                            ['2015', 99],
                        ];break;
                    case '#type7':
                        year = [
                            ["Год", "Число утечек" ],
                            ['2008', 15],
                            ['2009', 53],
                            ['2010', 40],
                            ['2011', 53],
                            ['2012', 28],
                        ];break;
                    case '#type8':
                        year = [
                            ["Год", "Число утечек" ],
                            ['2009', 54],
                            ['2010', 16],
                            ['2011', 68],
                            ['2012', 80],
                            ['2013', 70],
                            ['2014', 13],
                            ['2015', 3],
                        ];

                        break;

                }
                drawBasic(year);
            })



            function drawBasic(year) {
                var data = google.visualization.arrayToDataTable(year);
                var options = {
                    legend: 'none',
                    width: 426,
                    height: 237,
                    bar: {groupWidth: '30%'},
                    vAxis: { gridlines: { count: 4 } },
                };

                var chart = new google.visualization.ColumnChart(document.getElementById('canal_leak_div'));
                chart.draw(data, options);
            }
        }
    };
})(jQuery);