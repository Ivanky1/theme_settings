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
                            ['Title', 'Amount'],
                            ['PCs, Servers', 15.9],
                            ['Laptops, Smartphones', 0.6],
                            ['Removable media', 3.6],
                            ['Internet/Intranet', 35.1],
                            ['E-mail', 8.2],
                            ['Paper documents', 17.7],
                            ['Backup media', 1],
                            ['Undefined', 17.9],
                        ];
                        break;

                    case '#year2013':
                        year = [
                            ['Title', 'Amount'],
                            ['PCs, Servers', 17.2],
                            ['Laptops, Smartphones', 1.4],
                            ['Removable media', 4.9],
                            ['Internet/Intranet', 13.8],
                            ['E-mail', 10.8],
                            ['Paper documents', 21.8],
                            ['Backup media', 4.1],
                            ['Undefined', 25.6],
                            ['Other', 1],
                        ];
                        break;


                    case '#year2012':
                        year = [
                            ['Title', 'Amount'],
                            ['Undefined', 22.5], ['Paper documents', 22.3], ['PCs, Servers', 15],
                            ['Laptops, Smartphones', 9.6], ['Backup media', 8.6], ['Internet/Intranet', 6.7],
                            ['E-mail', 6.3], ['Removable media', 6], ['Other', 3],

                        ];
                        break;
                    case '#year2011':
                        year =[
                            ['Title', 'Amount'],
                            ['Undefined', 16.2], ['Paper documents', 20], ['PCs, Servers', 13.9],
                            ['Laptops, Smartphones', 9.6], ['Backup media', 8.5], ['Internet/Intranet', 13.6],
                            ['E-mail', 6.2], ['Removable media', 6.2], ['Other', 6.6],

                        ];
                        break;
                    case '#year2010':
                        year = [
                            ['Title', 'Amount'],
                            ['Undefined', 5], ['Paper documents', 20], ['PCs, Servers', 25],
                            ['Laptops, Smartphones', 12], ['Backup media', 2], ['Internet/Intranet', 16],
                            ['E-mail', 7], ['Removable media', 8], ['Other', 5],

                        ];
                        break;
                    case '#year2009':
                        year = [
                            ['Title', 'Amount'],
                            ['Undefined', 9.5], ['Paper documents', 19.9], ['PCs, Servers', 14.6],
                            ['Laptops, Smartphones', 13.3], ['Backup media', 7.3], ['Internet/Intranet', 18.2],
                            ['E-mail', 7.3], ['Removable media', 4.6], ['Other', 7.2],

                        ];
                        break;
                    case '#year2008':
                        year = [
                            ['Title', 'Amount'],
                            ['Undefined', 32.6], ['Paper documents', 5.3], ['PCs, Servers', 7.5],
                            ['Laptops, Smartphones', 19.4], ['Backup media', 3.2], ['Internet/Intranet', 21.1],
                            ['E-mail', 2.3], ['Removable media', 5.7], ['Other', 2.8],

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



