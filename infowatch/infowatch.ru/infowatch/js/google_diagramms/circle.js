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
                            ['Title', 'Количество'],
                            ['Пк, сервера', 15.9],
                            ['Ноутбуки, смартфоны', 0.6],
                            ['Съемные носители', 3.6],
                            ['Интернет/интранет', 35.1],
                            ['Электронная почта', 8.2],
                            ['Бумажные документы', 17.7],
                            ['Носители резервных копий', 1],
                            ['Не определено', 17.9],
                        ];
                        break;

                    case '#year2013':
                        year = [
                            ['Title', 'Количество'],
                            ['Пк, сервера', 17.2],
                            ['Ноутбуки, смартфоны', 1.4],
                            ['Съемные носители', 4.9],
                            ['Интернет/интранет', 13.8],
                            ['Электронная почта', 10.8],
                            ['Бумажные документы', 21.8],
                            ['Носители резервных копий', 4.1],
                            ['Не определено', 25.6],
                            ['Другие', 1],
                        ];
                        break;


                    case '#year2012':
                        year = [
                            ['Title', 'Количество'],
                            ['Не определено', 22.5], ['Бумажные документы', 22.3], ['Пк, сервера', 15],
                            ['Ноутбуки, смартфоны', 9.6], ['Носители резервных копий', 8.6], ['Интернет/интранет', 6.7],
                            ['Электронная почта', 6.3], ['Съемные носители', 6], ['Другие', 3],

                        ];
                        break;
                    case '#year2011':
                        year =[
                            ['Title', 'Количество'],
                            ['Не определено', 16.2], ['Бумажные документы', 20], ['Пк, сервера', 13.9],
                            ['Ноутбуки, смартфоны', 9.6], ['Носители резервных копий', 8.5], ['Интернет/интранет', 13.6],
                            ['Электронная почта', 6.2], ['Съемные носители', 6.2], ['Другие', 6.6],

                        ];
                        break;
                    case '#year2010':
                        year = [
                            ['Title', 'Количество'],
                            ['Не определено', 5], ['Бумажные документы', 20], ['Пк, сервера', 25],
                            ['Ноутбуки, смартфоны', 12], ['Носители резервных копий', 2], ['Интернет/интранет', 16],
                            ['Электронная почта', 7], ['Съемные носители', 8], ['Другие', 5],

                        ];
                        break;
                    case '#year2009':
                        year = [
                            ['Title', 'Количество'],
                            ['Не определено', 9.5], ['Бумажные документы', 19.9], ['Пк, сервера', 14.6],
                            ['Ноутбуки, смартфоны', 13.3], ['Носители резервных копий', 7.3], ['Интернет/интранет', 18.2],
                            ['Электронная почта', 7.3], ['Съемные носители', 4.6], ['Другие', 7.2],

                        ];
                        break;
                    case '#year2008':
                        year = [
                            ['Title', 'Количество'],
                            ['Не определено', 32.6], ['Бумажные документы', 5.3], ['Пк, сервера', 7.5],
                            ['Ноутбуки, смартфоны', 19.4], ['Носители резервных копий', 3.2], ['Интернет/интранет', 21.1],
                            ['Электронная почта', 2.3], ['Съемные носители', 5.7], ['Другие', 2.8],

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



