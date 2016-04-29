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
                            ['Country', 'Утечки'],
                            ['Япония',10],
                            ['Новая Зеландия',10],
                            ['Корея',12],
                            ['Ирландия',15],
                            ['Украина',15],
                            ['Германия',22],
                            ['Австралия',23],
                            ['Канада',46],
                            ['Великобритания',85],
                            ['Россия',167],
                            ['США',906],
                        ];
                        year.option = {
                            width: 600,
                            height: 272,
                            colorAxis: {colors: ['#f9c7c7', '#ff0000']},
                        }; break;
                    case '#year2013':
                        year.data = [
                            ['Country', 'Утечки'],
                            ['Франция',4],
                            ['Ирландия',9],
                            ['Украина',10],
                            ['Китай',15],
                            ['Австралия',18],
                            ['Новая Зеландия',30],
                            ['Канада',33],
                            ['Германия',48],
                            ['Великобритания',80],
                            ['Россия',134],
                            ['США',679],
                        ];
                        year.option = {
                            width: 600,
                            height: 272,
                            colorAxis: {colors: ['#f9c7c7', '#fd4848']},
                        }; break;
                    case '#year2012':
                        year.data = [
                            ['Country', 'Утечки'],
                            ['США', 576],
                            ['Великобритания', 97],
                            ['Канада', 32],
                            ['Автралия', 19],
                            ['Россия', 75],
                            ['Ирландия', 11],
                            ['Корея', 4],
                            ['Китай', 13],
                            ['Индия', 10],
                            ['Китай', 4],
                            ['Германия', 21],
                            ['Новоя Зеландия', 7],
                            ['Япония', 8],
                            ['Швейцария', 6],
                            ['Украина', 2],
                            ['Финляндия', 2],
                            ['Франция', 2],
                        ];
                        year.option = {
                            width: 600,
                            height: 272,
                            colorAxis: {colors: ['#f9c7c7', '#fc6464']},
                        }; break;
                    case '#year2011':
                        year.data = [
                            ['Country', 'Утечки'],
                            ['США', 524],
                            ['Великобритания', 127],
                            ['Канада', 31],
                            ['Автралия', 18],
                            ['Россия', 17],
                            ['Ирландия', 11],
                            ['Корея', 10],
                            ['Китай', 9],
                            ['Индия', 6],
                            ['Китай', 5],
                            ['Германия', 5],
                            ['Новоя Зеландия', 3],
                            ['Япония', 2],
                            ['Швейцария', 2],
                            ['Украина', 2],
                            ['Финляндия', 2],
                            ['Франция', 2],
                        ];

                        year.option = {
                            width: 600,
                            height: 272,
                            colorAxis: {colors: ['#f9c7c7', '#fc6464']},
                        }; break;
                    case '#year2010':
                        year.data = [
                            ['Country', 'Утечки'],
                            ['США', 580],
                            ['Великобритания', 97],
                            ['Канада', 32],
                            ['Автралия', 5],
                            ['Россия', 75],
                            ['Ирландия', 6],
                            ['Нидерланды', 8],
                            ['Китай', 13],
                            ['Индия', 6],
                            ['Китай', 5],
                            ['Германия', 7],
                            ['Новоя Зеландия', 2],
                            ['Япония', 3],
                            ['Швейцария', 2],
                        ];
                        year.option = {
                            width: 600,
                            height: 272,
                            colorAxis: {colors: ['#f9c7c7', '#fc6464']},
                        }; break;
                    case '#year2009':
                        year.data = [
                            ['Country', 'Утечки'],
                            ['США', 484],
                            ['Великобритания', 128],
                            ['Канада', 20],
                            ['Автралия', 11],
                            ['Россия', 35],
                            ['Ирландия', 7],
                            ['Корея', 4],
                            ['Китай', 4],
                            ['Индия', 2],
                            ['Китай', 4],
                            ['Германия', 5],
                            ['Новоя Зеландия', 5],
                            ['Япония', 14],
                            ['Швейцария', 4],
                            ['Франция', 2],
                            ['Чехия', 3],
                            ['Испания', 2],
                            ['Нидерланды', 2],
                            ['Швеция', 2],
                        ];

                        year.option = {
                            width: 600,
                            height: 272,
                            colorAxis: {colors: ['#f9c7c7', '#fb8181']},
                        }; break;
                    case '#year2008':
                        year.data = [
                            ['Country', 'Утечки'],
                            ['США', 424],
                            ['Великобритания', 54],
                            ['Канада', 10],
                            ['Германия', 7],
                            ['Россия', 6],
                            ['Ирландия', 5],
                            ['Корея', 4],
                            ['Швейцария', 3],
                            ['Китай', 3],
                            ['Индия', 2],
                            ['Италия', 2],
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