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
                            ['Country', 'Datenpannen'],
                            ['Japan',10],
                            ['Neuseeland',10],
                            ['Korea',12],
                            ['Irland',15],
                            ['Ukraine',15],
                            ['Deutschland',22],
                            ['Australien',23],
                            ['Kanada',46],
                            ['Vereinigtes Königreich',85],
                            ['Russland',167],
                            ['Vereinigte Staaten',906],
                        ];
                        year.option = {
                            width: 600,
                            height: 272,
                            colorAxis: {colors: ['#f9c7c7', '#ff0000']},
                        }; break;
                    case '#year2013':
                        year.data = [
                            ['Country', 'Datenpannen'],
                            ['Frankreich',4],
                            ['Irland',9],
                            ['Ukraine',10],
                            ['China',15],
                            ['Australien',18],
                            ['Neuseeland',30],
                            ['Kanada',33],
                            ['Deutschland',48],
                            ['Vereinigtes Königreich',80],
                            ['Russland',134],
                            ['Vereinigte Staaten',679],
                        ];
                        year.option = {
                            width: 600,
                            height: 272,
                            colorAxis: {colors: ['#f9c7c7', '#fd4848']},
                        }; break;
                    case '#year2012':
                        year.data = [
                            ['Country', 'Datenpannen'],
                            ['Vereinigte Staaten', 576],
                            ['Vereinigtes Königreich', 97],
                            ['Kanada', 32],
                            ['Australien', 19],
                            ['Russland', 75],
                            ['Irland', 11],
                            ['Korea', 4],
                            ['China', 13],
                            ['Indien', 10],
                            ['China', 4],
                            ['Deutschland', 21],
                            ['Neuseeland', 7],
                            ['Japan', 8],
                            ['Schweiz', 6],
                            ['Ukraine', 2],
                            ['Finnland', 2],
                            ['Frankreich', 2],
                        ];
                        year.option = {
                            width: 600,
                            height: 272,
                            colorAxis: {colors: ['#f9c7c7', '#fc6464']},
                        }; break;
                    case '#year2011':
                        year.data = [
                            ['Country', 'Datenpannen'],
                            ['Vereinigte Staaten', 524],
                            ['Vereinigtes Königreich', 127],
                            ['Kanada', 31],
                            ['Australien', 18],
                            ['Russland', 17],
                            ['Irland', 11],
                            ['Korea', 10],
                            ['China', 9],
                            ['Indien', 6],
                            ['China', 5],
                            ['Deutschland', 5],
                            ['Neuseeland', 3],
                            ['Japan', 2],
                            ['Schweiz', 2],
                            ['Ukraine', 2],
                            ['Finnland', 2],
                            ['Frankreich', 2],
                        ];

                        year.option = {
                            width: 600,
                            height: 272,
                            colorAxis: {colors: ['#f9c7c7', '#fc6464']},
                        }; break;
                    case '#year2010':
                        year.data = [
                            ['Country', 'Datenpannen'],
                            ['Vereinigte Staaten', 580],
                            ['Vereinigtes Königreich', 97],
                            ['Kanada', 32],
                            ['Australien', 5],
                            ['Russland', 75],
                            ['Irland', 6],
                            ['Niederlande', 8],
                            ['China', 13],
                            ['Indien', 6],
                            ['China', 5],
                            ['Deutschland', 7],
                            ['Neuseeland', 2],
                            ['Japan', 3],
                            ['Schweiz', 2],
                        ];
                        year.option = {
                            width: 600,
                            height: 272,
                            colorAxis: {colors: ['#f9c7c7', '#fc6464']},
                        }; break;
                    case '#year2009':
                        year.data = [
                            ['Country', 'Datenpannen'],
                            ['Vereinigte Staaten', 484],
                            ['Vereinigtes Königreich', 128],
                            ['Kanada', 20],
                            ['Australien', 11],
                            ['Russland', 35],
                            ['Irland', 7],
                            ['Korea', 4],
                            ['China', 4],
                            ['Indien', 2],
                            ['China', 4],
                            ['Deutschland', 5],
                            ['Neuseeland', 5],
                            ['Japan', 14],
                            ['Schweiz', 4],
                            ['Frankreich', 2],
                            ['Tschechien', 3],
                            ['Spanien', 2],
                            ['Niederlande', 2],
                            ['Schweden', 2],
                        ];

                        year.option = {
                            width: 600,
                            height: 272,
                            colorAxis: {colors: ['#f9c7c7', '#fb8181']},
                        }; break;
                    case '#year2008':
                        year.data = [
                            ['Country', 'Datenpannen'],
                            ['Vereinigte Staaten', 424],
                            ['Vereinigtes Königreich', 54],
                            ['Kanada', 10],
                            ['Deutschland', 7],
                            ['Russland', 6],
                            ['Irland', 5],
                            ['Korea', 4],
                            ['Schweiz', 3],
                            ['China', 3],
                            ['Indien', 2],
                            ['Italien', 2],
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