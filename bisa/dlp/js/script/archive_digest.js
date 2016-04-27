(function($) {
    Drupal.behaviors.ArchiveDigest = {
        attach:function (context, settings) {
            var timeStart = '';
            var timeFinish = '';
            var dates = [];
            $('.views-widget-filter-created').hide();
            var DateStrReturn = function(dt) {
                d = (dt.getDate() < 10) ?'0'+dt.getDate() : dt.getDate();
                m = dt.getMonth() + 1;
                m = (m < 10) ?'0'+ m  : m;
                return dt.getFullYear() +'-'+ m +'-'+ d;
            }

            var news_time_full = $('.news_time_full').val().split(',');
            news_time_full.forEach(function(item) {
                timeStart = parseInt(item);
                if (timeStart > timeFinish) {
                    timeFinish = timeStart + (10*60*60*24);
                    var dF = new Date(timeStart*1000);
                    var strOne = DateStrReturn(dF);

                    var dS = new Date(timeFinish*1000);
                    var strSec = DateStrReturn(dS);

                    dates.unshift(strOne+'='+strSec);

                }
            })

            var selectDate = '<div class="views-exposed-widget">' +
                             '<label for="edit-created">Дата</label>' +
                             '<select class="date_archive">';
            var selectedOption ='';
            selectDate += '<option value="">Выберите</option>';
                for(var i=0; i<dates.length; i++ ) {
                selectedOption ='';
                var dtValue = dates[i].replace(/(.*)-(.*)-(.*)=(.*)-(.*)-(.*)/,"$3.$2.$1-$6.$5.$4");
                if (dates[i].indexOf($('#edit-created-min').val()) != -1 && $('#edit-created-min').val() != '') {
                    selectedOption = 'selected="selected"';
                }
                selectDate += '<option '+selectedOption+' value="'+dates[i]+'">' +dtValue+ '</option>';
            }

            selectDate += '</select></div>';

            $('.views-submit-button').before(selectDate);



            $('.date_archive').on('change', function() {
                if ($(this).find('option:selected').val() != '') {
                    var dateFull = $(this).find('option:selected').val();
                    var dt = dateFull.match(/(.*)=(.*)/);
                    $('#edit-created-min').val(dt[1]);
                    $('#edit-created-max').val(dt[2]);
                } else {
                    $('#edit-created-min').val('');
                    $('#edit-created-max').val('');
                }
            })

        }
    }

})(jQuery);