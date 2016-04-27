(function($) {
    Drupal.behaviors.clock_bissumit = {
        attach : function(context, settings) {
            function timeToEvent(eventDate) {
                $('.time_bisa').data('time', $('.time_bisa').data('time')+1000)
                var now = new Date($('.time_bisa').data('time'));
                var output = '';
                var daystoED = Math.floor(Math.round(eventDate-now)/86400000);
                var daystoOstatok = (eventDate-now)/86400000;
                daystoED = (daystoED < 1) ? ""+daystoED : daystoED;
                daystoOstatok = 0+daystoOstatok.toFixed(2).substr(daystoOstatok.toFixed(1).indexOf('.'));
                var hourstoED = Math.floor(daystoOstatok*24);
                hourstoED = (hourstoED < 10) ? "0"+hourstoED : hourstoED;
                var minutestoED = 60 - now.getMinutes() - 1;
                minutestoED = (minutestoED < 10) ? "0"+minutestoED : minutestoED;
                var secondstoED = 60 - now.getSeconds() - 1;
                secondstoED = (secondstoED < 10) ? "0"+secondstoED : secondstoED;

                output = '<span class="days">'+daystoED+'</span>'+'<span class="hour">'+hourstoED+'</span>';
                return output;
            }
            var now = new Date($('.time_bisa').data('time'));
            var eventDate = new Date("18 Sept 2015 9:00");
    /*
           if(now < eventDate){
                setInterval(function(){
                    $('#clock').html(timeToEvent(eventDate));
                },1000);
           }
     */
            $('#clock').html(timeToEvent(eventDate));
        }

    }
}) (jQuery);