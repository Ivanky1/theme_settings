(function($) {
    Drupal.behaviors.LeadAjax = {
        attach:function (context, settings) {
            $('#managers_name').on('change', function(e) {
              //  if ($('#partners_name option:selected').val() == '' || $(this).find('option:selected').val() == '') {
                    var manager = $(this).find('option:selected').val();
                    if (  manager == '' ) {
                        manager = 'all';
                    }
                    $.ajax({
                        url: "/leads/all/ajax",
                        type: "POST",
                        data: 'manager='+manager,
                        success: function(msg) {
                            $("#partners_name").html(msg);
                        }
                    });
              //  }
            })
        }
    }
})(jQuery);

