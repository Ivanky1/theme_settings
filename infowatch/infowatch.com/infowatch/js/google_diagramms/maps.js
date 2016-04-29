(function ($) {
    Drupal.behaviors.googleMapsRegion = {
        attach: function(context, settings) {
            $('.map_countries a').on('click', function() {
                $('.map_countries a').removeClass('selected');
                $(this).addClass('selected');
                var year = {};
                switch ($(this).attr('href')) {
                    case '#year2014':
                        year.data = [
                            ['Country', 'Leakage'],
                            ['Japan',10],
                            ['New Zealand',10],
                            ['Korea',12],
                            ['Ireland',15],
                            ['Ukraine',15],
                            ['Germany',22],
                            ['Australia',23],
                            ['Canada',46],
                            ['United Kingdom',85],
                            ['Russia',167],
                            ['USA',906],
                        ];
                        year.option = {
                            width: 600,
                            height: 272,
                            colorAxis: {colors: ['#f9c7c7', '#ff0000']},
                        }; break;
                    case '#year2013':
                        year.data = [
                            ['Country', 'Leakage'],
                            ['France',4],
                            ['Ireland',9],
                            ['Ukraine',10],
                            ['China',15],
                            ['Australia',18],
                            ['New Zealand',30],
                            ['Canada',33],
                            ['Germany',48],
                            ['United Kingdom',80],
                            ['Russia',134],
                            ['USA',679],
                        ];
                        year.option = {
                            width: 600,
                            height: 272,
                            colorAxis: {colors: ['#f9c7c7', '#fd4848']},
                        }; break;
                    case '#year2012':
                        year.data = [
                            ['Country', 'Leakage'],
                            ['USA', 576],
                            ['United Kingdom', 97],
                            ['Canada', 32],
                            ['Australia', 19],
                            ['Russia', 75],
                            ['Ireland', 11],
                            ['Korea', 4],
                            ['China', 13],
                            ['India', 10],
                            ['China', 4],
                            ['Germany', 21],
                            ['New Zealand', 7],
                            ['Japan', 8],
                            ['Switzerland', 6],
                            ['Ukraine', 2],
                            ['Finland', 2],
                            ['France', 2],
                        ];
                        year.option = {
                            width: 600,
                            height: 272,
                            colorAxis: {colors: ['#f9c7c7', '#fc6464']},
                        }; break;
                    case '#year2011':
                        year.data = [
                            ['Country', 'Leakage'],
                            ['USA', 524],
                            ['United Kingdom', 127],
                            ['Canada', 31],
                            ['Australia', 18],
                            ['Russia', 17],
                            ['Ireland', 11],
                            ['Korea', 10],
                            ['China', 9],
                            ['India', 6],
                            ['Germany', 5],
                            ['New Zealand', 3],
                            ['Japan', 2],
                            ['Switzerland', 2],
                            ['Ukraine', 2],
                            ['Finland', 2],
                            ['France', 2],
                        ];

                        year.option = {
                            width: 600,
                            height: 272,
                            colorAxis: {colors: ['#f9c7c7', '#fc6464']},
                        }; break;
                    case '#year2010':
                        year.data = [
                            ['Country', 'Leakage'],
                            ['USA', 580],
                            ['United Kingdom', 97],
                            ['Canada', 32],
                            ['Australia', 5],
                            ['Russia', 75],
                            ['Ireland', 6],
                            ['Netherlands', 8],
                            ['China', 13],
                            ['India', 6],
                            ['China', 5],
                            ['Germany', 7],
                            ['New Zealand', 2],
                            ['Japan', 3],
                            ['Switzerland', 2],
                        ];
                        year.option = {
                            width: 600,
                            height: 272,
                            colorAxis: {colors: ['#f9c7c7', '#fc6464']},
                        }; break;
                    case '#year2009':
                        year.data = [
                            ['Country', 'Leakage'],
                            ['USA', 484],
                            ['United Kingdom', 128],
                            ['Canada', 20],
                            ['Australia', 11],
                            ['Russia', 35],
                            ['Ireland', 7],
                            ['Korea', 4],
                            ['China', 4],
                            ['India', 2],
                            ['China', 4],
                            ['Germany', 5],
                            ['New Zealand', 5],
                            ['Japan', 14],
                            ['Switzerland', 4],
                            ['France', 2],
                            ['Czech Republic', 3],
                            ['Spain', 2],
                            ['Netherlands', 2],
                            ['Sweden', 2],
                        ];

                        year.option = {
                            width: 600,
                            height: 272,
                            colorAxis: {colors: ['#f9c7c7', '#fb8181']},
                        }; break;
                    case '#year2008':
                        year.data = [
                            ['Country', 'Leakage'],
                            ['USA', 424],
                            ['United Kingdom', 54],
                            ['Canada', 10],
                            ['Germany', 7],
                            ['Russia', 6],
                            ['Ireland', 5],
                            ['Korea', 4],
                            ['Switzerland', 3],
                            ['China', 3],
                            ['India', 2],
                            ['Italy', 2],
                        ];

                        year.option = {
                            width: 600,
                            height: 272,
                            colorAxis: {colors: ['#f9c7c7', '#fb8181']},
                        }; break;
                }
                google.setOnLoadCallback(drawRegionsMap(year));
            })


            function drawRegionsMap(year) {
                var data = google.visualization.arrayToDataTable(year.data);
                var options = year.option;

                var chart = new google.visualization.GeoChart(document.getElementById('regions_div'));

                chart.draw(data, options);
            }

            $('.map_countries a:first').click();
        }
    };
})(jQuery);