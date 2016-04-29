(function($) {
    Drupal.behaviors.webinarClose = {
        attach : function(context, settings) {
          $('[name="listener_nid"]:checked').removeAttr('checked');
           $('.field_listener_nid_label').append('<input type="checkbox" id="listener_all" name="listener_all" />');
           $("#listener_all").on('click', function() {
                if ($(this).is(':checked')) {
                    $('[name="listener_nid"]').attr('checked', true);
                } else {
                    $('[name="listener_nid"]').removeAttr('checked');
                }
           })

           $('#lister_add, #lister_noo').on('click', function(e) {
               e.preventDefault();
               var listeners = [];
               var eventId = $(this).data('eventid');
               $('[name="listener_nid"]:checked').each(function() {
                   var listener = {}
                   listener.fio = $.trim($(this).parents('tr').find('>.views-field-title').text());
                   listener.email = $.trim($(this).parents('tr').find('>.views-field-field-email-listener').text());
                   listener.nid = $.trim($(this).val());
                   listener.listener_id = $.trim($(this).data('listenerid'));
                   listener.event_id = $.trim(eventId);
                   listener.title = $.trim($('h1.with-tabs').text().replace('Участники партнерского вебинара - ', ''));
                   listener.time = $.trim($(this).parents('tr').find('>.views-field-created span').data('webinartime'));
                   listeners.push(listener);
               })
               if (listeners) {
                   var url = (e.target.id == 'lister_add') ?'/webinar/add/partners' : '/webinar/noo/partners';
                   $.ajax ({
                       type: 'POST',
                       url: url,
                       data: 'webinar_partner='+JSON.stringify(listeners),
                       success: function(str) {
                           location.reload();
                       },
                       async: false
                   });
               }
           })
        }
    }
}) (jQuery);