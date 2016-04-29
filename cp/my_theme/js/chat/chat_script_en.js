(function($) {
    Drupal.behaviors.chat_script_english = {
        attach : function(context, settings) {
// Используемый язык
            iwc_i18n_language = 'en';

            /* Средства перевода. Общая структура:
             * {
             *      <язык>: {
             *          fields: { // перевод названий полей
             *              <название поля>: <перевод поля>,
             *              ... для каждого поля ...
             *          },
             *          options: { // перевод названий опций
             *              <название поля>: [
             *                  {<значение опции (будет показано техподдержке)>: <заголовок опции>},
             *                  ... для каждой опции ...
             *              ],
             *              ... для каждого поля с опциями ...
             *          },
             *          messages: { // перевод общих сообщений пользователю
             *              {<идентификатор сообщения>: <перевод сообщения>}
             *          }
             *      },
             *      ... для каждого языка ...
             * }
             */
            iwc_i18n_by_language = {
                en: {
                    fields: {
                        name: 'First Name',
                        surname: 'Last Name',
                        email: 'E-mail',
                        email_confirm: 'Confirm E-mail',
                        phone: 'Phone',
                        country: 'Country',
                        product: 'Product',
                        version: 'Version of the product',
                        os: 'Operation system/environment where the issue occurs',
                        severity: 'Severity',
                        summary: 'Please enter the title of your request',
                        description: 'Please type a detailed description of your observation',
                    },
                    options: {
                        country: [
                            {"Russian Federation": "Russian Federation"},
                            {"Afghanistan": "Afghanistan"},
                            {"Albania": "Albania"},
                            {"Algeria": "Algeria"},
                            {"American Samoa": "American Samoa"},
                            {"Andorra": "Andorra"},
                            {"Angola": "Angola"},
                            {"Anguilla": "Anguilla"},
                            {"Antarctica": "Antarctica"},
                            {"Antigua and Barbuda": "Antigua and Barbuda"},
                            {"Argentina": "Argentina"},
                            {"Armenia": "Armenia"},
                            {"Aruba": "Aruba"},
                            {"Ascension Island": "Ascension Island"},
                            {"Australia": "Australia"},
                            {"Austria": "Austria"},
                            {"Azerbaijan": "Azerbaijan"},
                            {"Bahamas": "Bahamas"},
                            {"Bahrain": "Bahrain"},
                            {"Bangladesh": "Bangladesh"},
                            {"Barbados": "Barbados"},
                            {"Belgium": "Belgium"},
                            {"Belize": "Belize"},
                            {"Belorussia": "Belorussia"},
                            {"Benin": "Benin"},
                            {"Bermuda": "Bermuda"},
                            {"Bhutan": "Bhutan"},
                            {"Bolivia": "Bolivia"},
                            {"Bosnia and Herzegovina": "Bosnia and Herzegovina"},
                            {"Botswana": "Botswana"},
                            {"Bouvet Island": "Bouvet Island"},
                            {"Brazil": "Brazil"},
                            {"British Indian Territories": "British Indian Territories"},
                            {"Brunei Darussalam": "Brunei Darussalam"},
                            {"Bulgaria": "Bulgaria"},
                            {"Burkina Faso": "Burkina Faso"},
                            {"Burma": "Burma"},
                            {"Burundi": "Burundi"},
                            {"Cambodia": "Cambodia"},
                            {"Cameroon": "Cameroon"},
                            {"Canada": "Canada"},
                            {"Cape Verde": "Cape Verde"},
                            {"Cayman Islands": "Cayman Islands"},
                            {"Central African Republic": "Central African Republic"},
                            {"Chad": "Chad"},
                            {"Channel Islands, Guernsey": "Channel Islands, Guernsey"},
                            {"Chile": "Chile"},
                            {"China": "China"},
                            {"Christmas Island": "Christmas Island"},
                            {"Cocos Islands": "Cocos Islands"},
                            {"Colombia": "Colombia"},
                            {"Comoros": "Comoros"},
                            {"Congo": "Congo"},
                            {"Cook Islands": "Cook Islands"},
                            {"Costa Rica": "Costa Rica"},
                            {"Cote D'ivoire": "Cote D'ivoire"},
                            {"Croatia": "Croatia"},
                            {"Cuba": "Cuba"},
                            {"Cyprus": "Cyprus"},
                            {"Czech Republic": "Czech Republic"},
                            {"Denmark": "Denmark"},
                            {"Djibouti": "Djibouti"},
                            {"Dominica": "Dominica"},
                            {"Dominican Republic": "Dominican Republic"},
                            {"East Timor": "East Timor"},
                            {"Ecuador": "Ecuador"},
                            {"Egypt": "Egypt"},
                            {"El Salvador": "El Salvador"},
                            {"Equatorial Guinea": "Equatorial Guinea"},
                            {"Eritrea": "Eritrea"},
                            {"Estonia": "Estonia"},
                            {"Ethiopia": "Ethiopia"},
                            {"Falkland Islands (Malvinas)": "Falkland Islands (Malvinas)"},
                            {"Faroe Islands": "Faroe Islands"},
                            {"Fiji": "Fiji"},
                            {"Finland": "Finland"},
                            {"France": "France"},
                            {"France, Metropolitan": "France, Metropolitan"},
                            {"French Guiana": "French Guiana"},
                            {"French Polynesia": "French Polynesia"},
                            {"French South. Territories": "French South. Territories"},
                            {"Gabon": "Gabon"},
                            {"Gambia": "Gambia"},
                            {"Georgia": "Georgia"},
                            {"Germany": "Germany"},
                            {"Ghana": "Ghana"},
                            {"Gibraltar": "Gibraltar"},
                            {"Greece": "Greece"},
                            {"Greenland": "Greenland"},
                            {"Grenada": "Grenada"},
                            {"Guadeloupe": "Guadeloupe"},
                            {"Guam": "Guam"},
                            {"Guatemala": "Guatemala"},
                            {"Guinea": "Guinea"},
                            {"Guinea-Bissau": "Guinea-Bissau"},
                            {"Guyana": "Guyana"},
                            {"Haiti": "Haiti"},
                            {"Heard Island and McDonald islands": "Heard Island and McDonald islands"},
                            {"Honduras": "Honduras"},
                            {"Hong Kong": "Hong Kong"},
                            {"Hungary": "Hungary"},
                            {"Iceland": "Iceland"},
                            {"India": "India"},
                            {"Indonesia": "Indonesia"},
                            {"Iran": "Iran"},
                            {"Iraq": "Iraq"},
                            {"Ireland": "Ireland"},
                            {"Isle of Man": "Isle of Man"},
                            {"Israel": "Israel"},
                            {"Italy": "Italy"},
                            {"Jamaica": "Jamaica"},
                            {"Japan": "Japan"},
                            {"Jordan": "Jordan"},
                            {"Kazakhstan": "Kazakhstan"},
                            {"Kenya": "Kenya"},
                            {"Kiribati": "Kiribati"},
                            {"Korea": "Korea"},
                            {"Korea, dem. people's rep.": "Korea, dem. people's rep."},
                            {"Kuwait": "Kuwait"},
                            {"Kyrgyzstan": "Kyrgyzstan"},
                            {"Laos": "Laos"},
                            {"Latvia": "Latvia"},
                            {"Lebanon": "Lebanon"},
                            {"Lesotho": "Lesotho"},
                            {"Liberia": "Liberia"},
                            {"Libyan Arab Jamahiriya": "Libyan Arab Jamahiriya"},
                            {"Liechtenstein": "Liechtenstein"},
                            {"Lithuania": "Lithuania"},
                            {"Luxembourg": "Luxembourg"},
                            {"Macao": "Macao"},
                            {"Macedonia": "Macedonia"},
                            {"Madagascar": "Madagascar"},
                            {"Malawi": "Malawi"},
                            {"Malaysia": "Malaysia"},
                            {"Maldives": "Maldives"},
                            {"Mali": "Mali"},
                            {"Malta": "Malta"},
                            {"Marshall Islands": "Marshall Islands"},
                            {"Martinique": "Martinique"},
                            {"Mauritania": "Mauritania"},
                            {"Mauritius": "Mauritius"},
                            {"Mayotte": "Mayotte"},
                            {"Mexico": "Mexico"},
                            {"Micronesia": "Micronesia"},
                            {"Moldova": "Moldova"},
                            {"Monaco": "Monaco"},
                            {"Mongolia": "Mongolia"},
                            {"Montenegro": "Montenegro"},
                            {"Montserrat": "Montserrat"},
                            {"Morocco": "Morocco"},
                            {"Mozambique": "Mozambique"},
                            {"Namibia": "Namibia"},
                            {"Nauru": "Nauru"},
                            {"Nepal": "Nepal"},
                            {"Netherlands": "Netherlands"},
                            {"Netherlands Antilles": "Netherlands Antilles"},
                            {"New Caledonia": "New Caledonia"},
                            {"New Zealand": "New Zealand"},
                            {"Nicaragua": "Nicaragua"},
                            {"Niger": "Niger"},
                            {"Nigeria": "Nigeria"},
                            {"Niue": "Niue"},
                            {"Norfolk Island": "Norfolk Island"},
                            {"Northern Mariana Is.": "Northern Mariana Is."},
                            {"Norway": "Norway"},
                            {"Oman": "Oman"},
                            {"Pakistan": "Pakistan"},
                            {"Palau": "Palau"},
                            {"Palestinian territory": "Palestinian territory"},
                            {"Panama": "Panama"},
                            {"Papua New Guinea": "Papua New Guinea"},
                            {"Paraguay": "Paraguay"},
                            {"Peru": "Peru"},
                            {"Philippines": "Philippines"},
                            {"Pitcairn": "Pitcairn"},
                            {"Poland": "Poland"},
                            {"Portugal": "Portugal"},
                            {"Puerto Rico": "Puerto Rico"},
                            {"Qatar": "Qatar"},
                            {"Reunion": "Reunion"},
                            {"Romania": "Romania"},
                            {"Rwanda": "Rwanda"},
                            {"Saint Helena": "Saint Helena"},
                            {"Saint Kitts and Nevis": "Saint Kitts and Nevis"},
                            {"Saint Lucia": "Saint Lucia"},
                            {"Saint Pierre and Miquelon": "Saint Pierre and Miquelon"},
                            {"Saint Vincent and the Grenadines": "Saint Vincent and the Grenadines"},
                            {"Samoa": "Samoa"},
                            {"San Marino": "San Marino"},
                            {"Sao Tome and Principe": "Sao Tome and Principe"},
                            {"Saudi Arabia": "Saudi Arabia"},
                            {"Senegal": "Senegal"},
                            {"Serbia": "Serbia"},
                            {"Serbia and Montenegro": "Serbia and Montenegro"},
                            {"Seychelles": "Seychelles"},
                            {"Sierra Leone": "Sierra Leone"},
                            {"Singapore": "Singapore"},
                            {"Slovakia": "Slovakia"},
                            {"Slovenia": "Slovenia"},
                            {"Solomon Islands": "Solomon Islands"},
                            {"Somalia": "Somalia"},
                            {"South Africa": "South Africa"},
                            {"South Georgia": "South Georgia"},
                            {"Spain": "Spain"},
                            {"Sri Lanka": "Sri Lanka"},
                            {"Sudan": "Sudan"},
                            {"Suriname": "Suriname"},
                            {"Svalbard and Jan Mayen": "Svalbard and Jan Mayen"},
                            {"Swaziland": "Swaziland"},
                            {"Sweden": "Sweden"},
                            {"Switzerland": "Switzerland"},
                            {"Syrian Arab Republic": "Syrian Arab Republic"},
                            {"Taiwan": "Taiwan"},
                            {"Tajikistan": "Tajikistan"},
                            {"Tanzania": "Tanzania"},
                            {"Thailand": "Thailand"},
                            {"The Democratic Republic of Congo": "The Democratic Republic of Congo"},
                            {"Togo": "Togo"},
                            {"Tokelau": "Tokelau"},
                            {"Tonga": "Tonga"},
                            {"Trinidad and Tobago": "Trinidad and Tobago"},
                            {"Tunisia": "Tunisia"},
                            {"Turkey": "Turkey"},
                            {"Turkmenistan": "Turkmenistan"},
                            {"Turks and Caicos Islands": "Turks and Caicos Islands"},
                            {"Tuvalu": "Tuvalu"},
                            {"Uganda": "Uganda"},
                            {"Ukraine": "Ukraine"},
                            {"United Arab Emirates": "United Arab Emirates"},
                            {"United Kingdom": "United Kingdom"},
                            {"United States": "United States"},
                            {"United States Minor Is.": "United States Minor Is."},
                            {"Uruguay": "Uruguay"},
                            {"Uzbekistan": "Uzbekistan"},
                            {"Vanuatu": "Vanuatu"},
                            {"Vatican City State": "Vatican City State"},
                            {"Venezuela": "Venezuela"},
                            {"Vietnam": "Vietnam"},
                            {"Virgin Islands (British)": "Virgin Islands (British)"},
                            {"Virgin Islands (U.S.)": "Virgin Islands (U.S.)"},
                            {"Wallis And Futuna Islands": "Wallis And Futuna Islands"},
                            {"Western Sahara": "Western Sahara"},
                            {"Yemen": "Yemen"},
                            {"Yugoslavia": "Yugoslavia"},
                            {"Zambia": "Zambia"},
                            {"Zimbabwe": "Zimbabwe"},

                        ],
                        product: [
                            {'': 'Select Product...'},
                            {'No': "I don't know yet"},
                            {"Appercut Customer Code Scanner": "Appercut Customer Code Scanner"},
                            {"Attack Killer": "Attack Killer"},
                            {"EndPoint Security": "EndPoint Security"},
                            {"Kribrum": "Kribrum"},
                            {"Targeted Attack Detector": "Targeted Attack Detector"},
                            {"Targeted Attack Monitor": "Targeted Attack Monitor"},
                            {"Traffic Monitor Enterprise": "Traffic Monitor Enterprise"},
                            {"Traffic Monitor Enterprise Appliance": "Traffic Monitor Enterprise Appliance"},
                            {"Traffic Monitor Standard": "Traffic Monitor Standard"},
                            {"Traffic Monitor Standard Appliance": "Traffic Monitor Standard Appliance"},
                        ],
                        severity: [
                            {'': 'Select severity...'},
                            {'Critical': 'Business down / Maximum severity'},
                            {'High': 'Large issue (critical time sensitivity) / Moderate severity'},
                            {'Medium': 'Significant functional reduction / Normal severity'},
                            {'Low': 'Minor severity'},
                        ],
                    },
                    messages: {
                        required_fields_not_filled: 'Please fill out the required fields',
                        wrong_field_format: 'Please verify input data in the field "%s"',
                        emails_mismatch: 'Confirmation E-mail does not match',
                        required_field: 'Required field',
                        choose_a_value: 'Select...',
                        start_chat: 'Chat now',
                        agent_offline: 'All operators are busy now, please use other ways of contacting or try later',
                        submit: 'Submit',
                        version_is_required_for_product: 'Product version is required',
                    },
                }
            }

// Эта переменная ипользуется непосредственно для перевода
            var iwc_i18n = iwc_i18n_by_language[iwc_i18n_language];

// Предчатовая форма. Структура: {<поле>: {type: <тип поля>, required: <обязательно ли поле>, validator: <регулярка>}}
            var iwc_prechat_form = {
                name:         {type: 'input',     required: true,  value: $('input[name="user[firstName]"]').val()},
                surname:      {type: 'input',     required: true,  value: $('input[name="user[lastName]"]').val()},
                email:        {type: 'input',     required: true,  value: $('input[name="user[email]"]').val(),   validator: '@'},
                email_confirm:{type: 'input',     required: true,  value: $('input[name="user[email]"]').val()},
                phone:        {type: 'input',     required: false,  value: $('input[name="user[phone]"]').val()},
                country:      {type: 'datalist',  required: true },
                product:      {type: 'select',    required: true},
                version:      {type: 'input',     required: false},
                severity:     {type: 'select',    required: true},
                summary:      {type: 'input',     required: true,  },
                description:  {type: 'textarea',  required: true, },
                submit: {type: 'submit', text: iwc_i18n.messages.submit},
            };
            //value: $('.types_select[style="display: block;"] option:selected').val()

            if (!('options' in document.createElement('datalist'))) {
                // <datalist> не поддерживается браузером, меняем его на <select> и добавляем первую опцию "выберите значение"
                jQuery.each(iwc_prechat_form, function(field, item) {
                    if (item.type == 'datalist') {
                        item.type = 'select';
                        iwc_i18n.options[field].unshift({'': iwc_i18n.messages.choose_a_value});
                    }
                });
            }

// Порядок полей в предчатовой форме
            var iwc_prechat_form_order =
                'name, surname, email, email_confirm, phone, country, product, version, severity, summary, description, submit'.split(', ');

// Создаёт в "#prechat_form" предчатовую форму
            function GenerateForm() {
                function ElementByType(type) {
                    if (type == 'select' || type == 'textarea') {
                        return '<' + type + '/>';
                    }

                    return '<input/>';
                }

                jQuery('#iwc_chat_main').show();

                var $form = jQuery('#prechat_form');
                var $table = jQuery('<table/>');

                jQuery.each(iwc_prechat_form_order, function(_, field) {
                    var elem = iwc_prechat_form[field];
                    var $html = jQuery(ElementByType(elem.type));

                    if (elem.type != 'submit') {
                        $html.addClass('iwc_input');
                        $html.change(function() {
                            jQuery(this).closest('tr').removeClass('iwc_error');
                        });
                    }

                    $html.attr('type', elem.type);
                    $html.attr('name', field);

                    if (elem.type == 'submit') {
                        $html.val(elem.text);
                    }
                    if ('value' in elem) {
                        $html.val(elem.value)
                    }

                    if (elem.type == 'textarea') {
                        $html.attr('rows', '5');
                    }

                    if (elem.required) {
                        $html.addClass('iwc_required');
                    }

                    if (elem.type == 'datalist') {
                        $html.attr('list', 'iwc_list_' + field);
                    }

                    if (elem.type == 'select' || elem.type == 'datalist') {
                        var $options_container = (elem.type == 'select' ? $html : $('<datalist id="iwc_list_' + field + '"/>'));

                        jQuery.each(iwc_i18n.options[field], function(_, option) {
                            jQuery.each(option, function(value, label) {
                                $options_container.append(jQuery('<option>').val(value).html(label));
                            });
                        });

                        if (elem.type == 'datalist') {
                            $html = $('<div/>').html($html).append($options_container);
                        }
                    }

                    var label = iwc_i18n.fields[field];
                    var $row = jQuery('<tr/>');

                    if (label) {
                        var $label = jQuery('<label/>').attr('for', field).html(label);

                        if (elem.required) {
                            $label.append(jQuery('<span/>').addClass('required').attr('title', iwc_i18n.messages.required_field).html('*'));
                        }

                        $label.append(': ');

                        $row.append(jQuery('<td/>').html($label).addClass('iwc_label')).append(jQuery('<td/>').html($html));
                    } else {
                        $row.append(jQuery('<td/>').attr('colspan', 2).html($html));
                    }

                    $table.append($row);
                });

                $form.html($table);
            }

            jQuery(GenerateForm);
            //$('input[name="phone"]').mask("+7(999) 9999999999");

// Функция отправки предчатовой формы. Проверяет значения и инициализирует чат.
            function PrechatSubmit() {
                var $form = jQuery('#prechat_form');

                if ($form.data('processed') === 'true') {
                    return;
                }

                var serialized_form = $form.serializeArray();
                var values = {};

                jQuery.each(serialized_form, function(_, value) {
                    values[value.name] = jQuery.trim(value.value);
                });

                var fields_not_filled = false;

                function AddErrorOnField(field) {
                    $form.find('[name=' + field + ']').closest('tr').addClass('iwc_error');
                }

                for (field in values) {
                    var value = values[field];
                    if (!value && iwc_prechat_form[field].required) {
                        fields_not_filled = true;
                        AddErrorOnField(field);
                    }
                };

                if (fields_not_filled) {
                    alert(iwc_i18n.messages.required_fields_not_filled);
                    return;
                }

                for (field in values) {
                    var value = values[field];
                    if (iwc_prechat_form[field].validator) {
                        if (!new RegExp(iwc_prechat_form[field].validator).test(value)) {
                            AddErrorOnField(field);
                            alert(Sprintf(iwc_i18n.messages.wrong_field_format, iwc_i18n.fields[field]));
                            return;
                        }
                    }
                };

                if (values.email != values.email_confirm) {
                    AddErrorOnField('email_confirm');
                    alert(iwc_i18n.messages.emails_mismatch);
                    return;
                }

                if (values.product != 'Нет' && values.version == '') {
                    AddErrorOnField('version');
                    alert(iwc_i18n.messages.version_is_required_for_product);
                    return;
                }

                liveagent.addCustomDetail('E-mail', values.email).saveToTranscript('Mail__c');
                liveagent.addCustomDetail('Имя', values.name).saveToTranscript('Name__c');
                liveagent.addCustomDetail('Фамилия', values.surname).saveToTranscript('LastName__c');
                liveagent.addCustomDetail('Телефон', values.phone).saveToTranscript('Phone__c');
                //  liveagent.addCustomDetail('Номер обращения', values.case_no || '').saveToTranscript('CaseNumber__c');
                liveagent.addCustomDetail('Страна', values.country).saveToTranscript('Country__c');
                liveagent.addCustomDetail('Продукт', values.product).saveToTranscript('Product__c');
                liveagent.addCustomDetail('Версия', values.version).saveToTranscript('Version__c');
                liveagent.addCustomDetail('Серьёзность', values.severity).saveToTranscript('Severity__c');
                liveagent.addCustomDetail('Тема запроса', values.summary).saveToTranscript('Subject__c');
                liveagent.addCustomDetail('Описание проблемы', values.description).saveToTranscript('Description__c');

                window.iw_liveagent_form_values = values;

                /*  liveagent.addCustomDetail('sys_Case_RecordType', 'Support case', false);
                 liveagent.addCustomDetail('sys_Case_Origin', 'Поддержка: чат', false);*/

                /*liveagent.findOrCreate(Object EntityName).map(String FieldName, String DetailName, Boolean doFind, Boolean isExactMatch, Boolean doCreate)*/

                liveagent.findOrCreate('Contact')
                    .map('Email', 'E-mail', true, true, true)
                    /*      .map('FirstName', 'Имя', false, false, true)
                     .map('LastName', 'Фамилия', false, false, true)
                     .map('Phone', 'Телефон', false, false, true)*/
                    .showOnCreate()
                    .saveToTranscript('ContactId')
                ;

                //   liveagent.findOrCreate('Case')
                //     .map('CaseNumber', 'Номер обращения', true, true, false)
                /*      .map('RecordType', 'sys_Case_RecordType', false, false, true)
                 .map('Origin', 'sys_Case_Origin', false, false, true)
                 .map('Subject', 'Тема запроса', false, false, true)
                 .map('Description', 'Описание проблемы', false, false, true)*/
                //  .showOnCreate()
                //    .saveToTranscript('CaseId')
                //  ;

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
                    liveagent.showWhenOnline('573D0000000Gpkn', document.getElementById('liveagent_button_online_573D0000000Gpkn'));
                    liveagent.showWhenOffline('573D0000000Gpkn', document.getElementById('liveagent_button_offline_573D0000000Gpkn'));
                });

                $('#liveagent_button_online_573D0000000Gpkn').attr('title', iwc_i18n.messages.start_chat);
                $('#liveagent_button_offline_573D0000000Gpkn').attr('title', iwc_i18n.messages.agent_offline);

                $('#prechat_form').submit(function() {
                    try {
                        PrechatSubmit();
                    } catch (error) {
                        console && console.log(error);
                    }

                    return false;
                });
                $('#liveagent_button_offline_573D0000000Gpkn').click(function() {
                    $.colorbox.close();
                    return false;
                });
                $('#liveagent_button_online_573D0000000Gpkn').click(function() {
                    $.colorbox.close();
                    return false;
                });
                $('#off_line').click(function() {
                    var off_href = "?fio=" + window.iw_liveagent_form_values.name + "%20" + window.iw_liveagent_form_values.surname + "&email="  + window.iw_liveagent_form_values.email + "&product="  + window.iw_liveagent_form_values.product + "&description="  + window.iw_liveagent_form_values.description;
                    document.location.href = 'http://www.infowatch.ru/support/request' + off_href;
                    return false;
                });
            });

            function Sprintf(format, etc) {
                var arg = arguments;
                var i = 1;
                return format.replace(/%((%)|s)/g, function (m) { return m[2] || arg[i++] });
            }

            $('select[name="product"].iwc_required').on('change', function() {
                if ($(this).find('option:selected').val() == 'No') {
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

