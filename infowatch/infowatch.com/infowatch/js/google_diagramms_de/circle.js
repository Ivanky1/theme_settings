(function ($) {
    Drupal.behaviors.googleMapsCircle = {
        attach: function(context, settings) {
            $('.circle_google a').on('click', function() {
                var year = '';
                $('.circle_google a').removeClass('selected');
                $('.canal_google a').removeClass('selected');
                $(this).addClass('selected');
                switch ($(this).attr('href')) {
                    case '#year2014':
                        year = [
                            ['Title', 'Anzahl'],
                            ['PC, Servers', 15.9],
                            ['Laptops, Smartphones', 0.6],
                            ['Austauschbare Datenträger', 3.6],
                            ['Internet/Intranet', 35.1],
                            ['E-Mail', 8.2],
                            ['Papierdokumente', 17.7],
                            ['Sicherungsdatenträger', 1],
                            ['Unbestimmt', 17.9],
                        ];
                        break;

                    case '#year2013':
                        year = [
                            ['Title', 'Anzahl'],
                            ['PC, Servers', 17.2],
                            ['Laptops, Smartphones', 1.4],
                            ['Austauschbare Datenträger', 4.9],
                            ['Internet/Intranet', 13.8],
                            ['E-Mail', 10.8],
                            ['Papierdokumente', 21.8],
                            ['Sicherungsdatenträger', 4.1],
                            ['Unbestimmt', 25.6],
                            ['Andere', 1],
                        ];
                        break;


                    case '#year2012':
                        year = [
                            ['Title', 'Anzahl'],
                            ['Unbestimmt', 22.5], ['Papierdokumente', 22.3], ['PC, Servers', 15],
                            ['Laptops, Smartphones', 9.6], ['Sicherungsdatenträger', 8.6], ['Internet/Intranet', 6.7],
                            ['E-Mail', 6.3], ['Austauschbare Datenträger', 6], ['Andere', 3],

                        ];
                        break;
                    case '#year2011':
                        year =[
                            ['Title', 'Anzahl'],
                            ['Unbestimmt', 16.2], ['Papierdokumente', 20], ['PC, Servers', 13.9],
                            ['Laptops, Smartphones', 9.6], ['Sicherungsdatenträger', 8.5], ['Internet/Intranet', 13.6],
                            ['E-Mail', 6.2], ['Austauschbare Datenträger', 6.2], ['Andere', 6.6],

                        ];
                        break;
                    case '#year2010':
                        year = [
                            ['Title', 'Anzahl'],
                            ['Unbestimmt', 5], ['Papierdokumente', 20], ['PC, Servers', 25],
                            ['Laptops, Smartphones', 12], ['Sicherungsdatenträger', 2], ['Internet/Intranet', 16],
                            ['E-Mail', 7], ['Austauschbare Datenträger', 8], ['Andere', 5],

                        ];
                        break;
                    case '#year2009':
                        year = [
                            ['Title', 'Anzahl'],
                            ['Unbestimmt', 9.5], ['Papierdokumente', 19.9], ['PC, Servers', 14.6],
                            ['Laptops, Smartphones', 13.3], ['Sicherungsdatenträger', 7.3], ['Internet/Intranet', 18.2],
                            ['E-Mail', 7.3], ['Austauschbare Datenträger', 4.6], ['Andere', 7.2],

                        ];
                        break;
                    case '#year2008':
                        year = [
                            ['Title', 'Anzahl'],
                            ['Unbestimmt', 32.6], ['Papierdokumente', 5.3], ['PC, Servers', 7.5],
                            ['Laptops, Smartphones', 19.4], ['Sicherungsdatenträger', 3.2], ['Internet/Intranet', 21.1],
                            ['E-Mail', 2.3], ['Austauschbare Datenträger', 5.7], ['Andere', 2.8],

                        ];
                        break;

                    default: break;

                }
                drawChartToo(year);
            });

            $('.circle_google a:first').click();
            function drawChartToo(year) {
                var data = google.visualization.arrayToDataTable(year);
                var options = {
                    // pieSliceText: 'label',
                    width: 426,
                    chartArea: {width: 400},
                    height: 258,
                    pieHole: 0.5,
                    legend: {
                        alignment: "center"

                    },
                };

                var chart = new google.visualization.PieChart(document.getElementById('canal_leak_div'));
                chart.draw(data, options);
            }
        }
    };
})(jQuery);



