(function($) {
    Drupal.behaviors.chat_script_webForm = {
        attach : function(context, settings) {
// Используемый язык
            iwc_i18n_language = 'ru';

            iwc_i18n_by_language = {
                ru: {
                    fields: {
                        name: 'Имя',
                        surname: 'Фамилия',
                        email: 'E-mail',
                        email_confirm: 'Повторите e-mail',
                        phone: 'Телефон',
                        country: 'Страна',
                        product: 'Продукт',
                        version: 'Версия продукта',
                        os: 'Операционная система',
                        severity: 'Серьёзность',
                        summary: 'Тема обращения',
                        description: 'Описание обращения',
                    },
                    options: {

                    },
                    messages: {
                        required_fields_not_filled: 'Пожалуйста, заполните обязательные поля',
                        wrong_field_format: 'Пожалуйста, проверьте значение в поле "%s"',
                        emails_mismatch: 'Проверочный e-mail введён неверно',
                        required_field: 'Обязательное поле',
                        choose_a_value: 'Выберите...',
                        start_chat: 'Начать чат',
                        agent_offline: 'Все операторы заняты',
                        submit: 'Продолжить',
                        version_is_required_for_product: 'Укажите версию Вашего продукта',
                    },
                },
            }
// Эта переменная ипользуется непосредственно для перевода
            var iwc_i18n = iwc_i18n_by_language[iwc_i18n_language];

// Предчатовая форма. Структура: {<поле>: {type: <тип поля>, required: <обязательно ли поле>, validator: <регулярка>}}
            var iwc_prechat_form = {
                name:         {type: 'input',     required: true,   value: $('input[name="user[firstName]"]').val()},
                surname:      {type: 'input',     required: true,   value: $('input[name="user[lastName]"]').val()},
                email:        {type: 'input',     required: true,   value: $('input[name="user[email]"]').val(),   validator: '@'},
                email_confirm:{type: 'input',     required: true,   value: $('input[name="user[email]"]').val()},
                phone:        {type: 'input',     required: false,  value: $('input[name="user[phone]"]').val()},
                product:      {type: 'select',    required: true},
                version:      {type: 'input',     required: false},
                severity:     {type: 'select',    required: true},
                summary:      {type: 'input',     required: true,  },
                description:  {type: 'textarea',  required: true, },
                submit: {type: 'submit', text: iwc_i18n.messages.submit},
            };
            //value: $('.types_select[style="display: block;"] option:selected').val()
            jQuery.each(iwc_prechat_form, function(field, item) {
                $('.webform-client-form').find(item.type+'[name="submitted['+ field + ']"]').val(item.value)
            });

            if (!$('.i18n-en').length) {
                $('#edit-submitted-country option').each(function() {
                    if ($(this).val() == 'RU') {
                        $('#edit-submitted-country option').eq(1).before($(this));
                    }
                });
            }

// Порядок полей в предчатовой форме
            var iwc_prechat_form_order =
                'name, surname, email, email_confirm, phone, country, product, version, severity, summary, description, submit'.split(', ');

// Создаёт в "#prechat_form" предчатовую форму



// Функция отправки предчатовой формы. Проверяет значения и инициализирует чат.
            function PrechatSubmit() {
                var $form = jQuery('.webform-client-form');

                if ($form.data('processed') === 'true') {
                    return;
                }

                var serialized_form = $form.serializeArray();
                var values = {};

                jQuery.each(serialized_form, function(_, value) {
                    var key = value.name.match(/submitted\[(.*)\]/);
                    if (key) {
                        values[key[1]] = jQuery.trim(value.value);
                    }
                });

                var fields_not_filled = false;

                function AddErrorOnField(field) {
                   // $form.find('[name="submitted['+ field + ']"]').addClass('iwc_error');
                }

                for (field in values) {
                    var value = values[field];
                    if (!value && iwc_prechat_form[field].required) {
                        fields_not_filled = true;
                        AddErrorOnField(field);
                    }
                };

                if (fields_not_filled) {
                   // alert(iwc_i18n.messages.required_fields_not_filled);
                    return;
                }



                if (values.email != values.email_confirm) {
                    AddErrorOnField('email_confirm');
                    //alert(iwc_i18n.messages.emails_mismatch);
                    return;
                }

               /* if (values.product != 'Нет' && values.version == '') {
                    AddErrorOnField('version');
                    alert(iwc_i18n.messages.version_is_required_for_product);
                    return;
                } */


                liveagent.addCustomDetail('E-mail', values.email).saveToTranscript('Mail__c');
                liveagent.addCustomDetail('Имя', values.name).saveToTranscript('Name__c');
                liveagent.addCustomDetail('Фамилия', values.surname).saveToTranscript('LastName__c');
                liveagent.addCustomDetail('Телефон', values.phone).saveToTranscript('Phone__c');
              //  liveagent.addCustomDetail('Номер обращения', values.case_no || '').saveToTranscript('CaseNumber__c');
                liveagent.addCustomDetail('Страна', values.country).saveToTranscript('Country__c');
                liveagent.addCustomDetail('Продукт', values.product).saveToTranscript('Product__c');
                liveagent.addCustomDetail('Версия', values.version).saveToTranscript('Version__c');
                liveagent.addCustomDetail('Серьёзность', values.severity).saveToTranscript('Severity__c');
                liveagent.addCustomDetail('Тема', values.summary).saveToTranscript('Subject__c');
                liveagent.addCustomDetail('Описание', values.description).saveToTranscript('Description__c');


                window.iw_liveagent_form_values = values;

                liveagent.findOrCreate('Contact')
                    .map('Email', 'E-mail', true, true, true)
                    .showOnCreate()
                    .saveToTranscript('ContactId');

                liveagent.setName(values.summary + ' -- ' + values.name + ' ' + values.surname);

                liveagent.init(
                    'https://d.la1c1.salesforceliveagent.com/chat',
                    '572D0000000L1pX',
                    '00DD0000000l8Yn'
                );

                $form.data('processed', 'true');
                $form.hide();
            }

            jQuery(function($) {
                window._laq = window._laq || [];
                window._laq.push(function() {
                    liveagent.showWhenOnline('573D0000000Gpki', document.getElementById('liveagent_button_online_573D0000000Gpki'));
                    liveagent.showWhenOffline('573D0000000Gpki', document.getElementById('liveagent_button_offline_573D0000000Gpki'));
                });

                $('#liveagent_button_online_573D0000000Gpki').attr('title', iwc_i18n.messages.start_chat);
                $('#liveagent_button_offline_573D0000000Gpki').attr('title', iwc_i18n.messages.agent_offline);

                $('.webform-client-form').submit(function() {
                    try {
                        PrechatSubmit();
                    } catch (error) {
                        console && console.log(error);
                    }

                    return false;
                });
                $('#liveagent_button_offline_573D0000000Gpki').click(function() {
                    $.colorbox.close();
                    return false;
                });
                $('#liveagent_button_online_573D0000000Gpki').click(function() {
                    $(this).hide();
                    //$.colorbox.close();
                    window.location = ($('.i18n-en').length) ?'/en/support/contact-us' :'/support/contact-us';
                    return false;
                });
                $('#off_line').click(function() {
                    var off_href = "?name=" + window.iw_liveagent_form_values.name
                        + "&surname=" + window.iw_liveagent_form_values.surname
                        + "&phone=" + window.iw_liveagent_form_values.phone
                        + "&email="  + window.iw_liveagent_form_values.email
                        + "&product="  + window.iw_liveagent_form_values.product
                        + "&version="  + window.iw_liveagent_form_values.version
                        + "&severity="  + window.iw_liveagent_form_values.severity
                        + "&summary="  + window.iw_liveagent_form_values.summary
                        + "&description="  + window.iw_liveagent_form_values.description;
                    window.location = (($('.i18n-en').length) ?'/en/support/request' :'/support/request') + off_href;
                    return false;
                });
            });

            function Sprintf(format, etc) {
                var arg = arguments;
                var i = 1;
                return format.replace(/%((%)|s)/g, function (m) { return m[2] || arg[i++] });
            }


            $('select[name="product"].iwc_required').on('change', function() {
                if ($(this).find('option:selected').val() == 'Нет') {
                    $(this).parents('tr').next().hide();
                } else {
                    if ($(this).parents('tr').next().is(':hidden')) {
                        $(this).parents('tr').next().show();
                    }
                }
            })

        }
    }
}) (jQuery);