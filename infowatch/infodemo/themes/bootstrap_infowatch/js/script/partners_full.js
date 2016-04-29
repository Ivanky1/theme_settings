(function ($) {
    Drupal.behaviors.PartnersFull = {
        attach:function (context, settings) {

            if ($('#edit-tid option:selected').val() == 38) {
                $('#edit-country-rus-wrapper').show()
                $('#edit-okrugs-rus-wrapper').show()
            } else {
                $('#edit-country-rus-wrapper').hide()
                $('#edit-okrugs-rus-wrapper').hide()
            }


            $('#edit-country-rus, #edit-okrugs-rus').on('change', function(e) {
                    if (e.target.id == 'edit-country-rus') {
                        $('#edit-okrugs-rus option').first().attr('selected', 'selected')
                    } else {
                        $('#edit-country-rus option').first().attr('selected', 'selected')
                    }
                    $("#edit-submit-partners").click();
            })

            $('#edit-tid').on('change', function() {
                if ($(this).find('option:selected').val() != 38) {
                    $("#edit-country-rus option").removeAttr('selected');
                    $("#edit-okrugs-rus option").removeAttr('selected');
                }
                $("#edit-submit-partners").click();

            })

            var selectCountry = $('#edit-country-rus option:selected').index();
            var selectOkrug = $('#edit-okrugs-rus option:selected').index();
            var selectTid = $('#edit-tid option:selected').index();

            $("#edit-title").on('focus', function() {
                $("#edit-tid option").removeAttr('selected');
                $("#edit-country-rus option").removeAttr('selected');
                $("#edit-okrugs-rus option").removeAttr('selected');
            })

            $("#edit-title").on('blur', function() {
                if ($(this).val() == '') {
                    if (selectCountry != 0)
                        $("#edit-country-rus option").eq(selectCountry).attr("selected","selected");
                    if (selectOkrug != 0)
                        $("#edit-okrugs-rus option").eq(selectOkrug).attr("selected","selected");
                    if (selectTid != 0)
                        $("#edit-tid option").eq(selectTid).attr("selected","selected");
                } else {
                    $("#edit-tid option").removeAttr('selected');
                    $("#edit-okrugs-rus option").removeAttr('selected');
                    $("#edit-country-rus option").removeAttr('selected');
                }
            })

            $('#edit-reset').on('click', function(e) {
                e.preventDefault();
                window.location = '/partners';
            })


        }
    };
})(jQuery);

