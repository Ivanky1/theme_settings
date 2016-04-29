// Используемый язык
iwc_i18n_language = 'ru';

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
    ru: {
        fields: {
            name: 'Имя',
            surname: 'Фамилия',
            email: 'E-mail',
            email_confirm: 'Повторите e-mail',
            phone: 'Телефон',
            case_no: 'Номер обращения',
            country: 'Страна',
            product: 'Продукт',
            version: 'Версия продукта',
            os: 'Операционная система',
            severity: 'Серьёзность',
            summary: 'Тема запроса',
            description: 'Описание проблемы',
        },
        options: {
            country: [
                {"Россия": "Россия"},
                {"Абхазия": "Абхазия"},
                {"Австралия": "Австралия"},
                {"Австрия": "Австрия"},
                {"Азербайджан": "Азербайджан"},
                {"Албания": "Албания"},
                {"Американское Самоа": "Американское Самоа"},
                {"Ангилья": "Ангилья"},
                {"Ангола": "Ангола"},
                {"Андорра": "Андорра"},
                {"Антарктида": "Антарктида"},
                {"Антигуа и Барбуда": "Антигуа и Барбуда"},
                {"Аргентина": "Аргентина"},
                {"Армения": "Армения"},
                {"Аруба": "Аруба"},
                {"Афганистан": "Афганистан"},
                {"Багамы": "Багамы"},
                {"Бангладеш": "Бангладеш"},
                {"Барбадос": "Барбадос"},
                {"Бахрейн": "Бахрейн"},
                {"Беларусь": "Беларусь"},
                {"Белиз": "Белиз"},
                {"Бельгия": "Бельгия"},
                {"Бенин": "Бенин"},
                {"Бермуды": "Бермуды"},
                {"Болгария": "Болгария"},
                {"Боливия": "Боливия"},
                {"Бонайре": "Бонайре"},
                {"Босния и Герцеговина": "Босния и Герцеговина"},
                {"Ботсвана": "Ботсвана"},
                {"Бразилия": "Бразилия"},
                {"Британская территория в Индийском океане": "Британская территория в Индийском океане"},
                {"Бруней-Даруссалам": "Бруней-Даруссалам"},
                {"Буркина-Фасо": "Буркина-Фасо"},
                {"Бурунди": "Бурунди"},
                {"Бутан": "Бутан"},
                {"Вануату": "Вануату"},
                {"Ватикан": "Ватикан"},
                {"Великобритания": "Великобритания"},
                {"Венгрия": "Венгрия"},
                {"Венесуэла Боливарианская Республика": "Венесуэла Боливарианская Республика"},
                {"Виргинские острова, Британские": "Виргинские острова, Британские"},
                {"Виргинские острова, США": "Виргинские острова, США"},
                {"Вьетнам": "Вьетнам"},
                {"Габон": "Габон"},
                {"Гаити": "Гаити"},
                {"Гайана": "Гайана"},
                {"Гамбия": "Гамбия"},
                {"Гана": "Гана"},
                {"Гваделупа": "Гваделупа"},
                {"Гватемала": "Гватемала"},
                {"Гвинея": "Гвинея"},
                {"Гвинея-Бисау": "Гвинея-Бисау"},
                {"Германия": "Германия"},
                {"Гернси": "Гернси"},
                {"Гибралтар": "Гибралтар"},
                {"Гондурас": "Гондурас"},
                {"Гонконг": "Гонконг"},
                {"Гренада": "Гренада"},
                {"Гренландия": "Гренландия"},
                {"Греция": "Греция"},
                {"Грузия": "Грузия"},
                {"Гуам": "Гуам"},
                {"Дания": "Дания"},
                {"Джерси": "Джерси"},
                {"Джибути": "Джибути"},
                {"Доминика": "Доминика"},
                {"Доминиканская Республика": "Доминиканская Республика"},
                {"Египет": "Египет"},
                {"Замбия": "Замбия"},
                {"Западная Сахара": "Западная Сахара"},
                {"Зимбабве": "Зимбабве"},
                {"Израиль": "Израиль"},
                {"Индия": "Индия"},
                {"Индонезия": "Индонезия"},
                {"Иордания": "Иордания"},
                {"Ирак": "Ирак"},
                {"Иран": "Иран"},
                {"Ирландия": "Ирландия"},
                {"Исландия": "Исландия"},
                {"Испания": "Испания"},
                {"Италия": "Италия"},
                {"Йемен": "Йемен"},
                {"Кабо-Верде": "Кабо-Верде"},
                {"Казахстан": "Казахстан"},
                {"Камбоджа": "Камбоджа"},
                {"Камерун": "Камерун"},
                {"Канада": "Канада"},
                {"Катар": "Катар"},
                {"Кения": "Кения"},
                {"Кипр": "Кипр"},
                {"Киргизия": "Киргизия"},
                {"Кирибати": "Кирибати"},
                {"Китай": "Китай"},
                {"Кокосовые острова": "Кокосовые острова"},
                {"Колумбия": "Колумбия"},
                {"Коморы": "Коморы"},
                {"Конго": "Конго"},
                {"Конго, Демократическая Республика": "Конго, Демократическая Республика"},
                {"Коста-Рика": "Коста-Рика"},
                {"Кот д'Ивуар": "Кот д'Ивуар"},
                {"Куба": "Куба"},
                {"Кувейт": "Кувейт"},
                {"Кюрасао": "Кюрасао"},
                {"Лаос": "Лаос"},
                {"Латвия": "Латвия"},
                {"Лесото": "Лесото"},
                {"Либерия": "Либерия"},
                {"Ливан": "Ливан"},
                {"Ливийская Арабская Джамахирия": "Ливийская Арабская Джамахирия"},
                {"Литва": "Литва"},
                {"Лихтенштейн": "Лихтенштейн"},
                {"Люксембург": "Люксембург"},
                {"Маврикий": "Маврикий"},
                {"Мавритания": "Мавритания"},
                {"Мадагаскар": "Мадагаскар"},
                {"Майотта": "Майотта"},
                {"Макао": "Макао"},
                {"Малави": "Малави"},
                {"Малайзия": "Малайзия"},
                {"Мали": "Мали"},
                {"Мальдивы": "Мальдивы"},
                {"Мальта": "Мальта"},
                {"Марокко": "Марокко"},
                {"Мартиника": "Мартиника"},
                {"Маршалловы острова": "Маршалловы острова"},
                {"Мексика": "Мексика"},
                {"Микронезия": "Микронезия"},
                {"Мозамбик": "Мозамбик"},
                {"Молдова": "Молдова"},
                {"Монако": "Монако"},
                {"Монголия": "Монголия"},
                {"Монтсеррат": "Монтсеррат"},
                {"МТООСА": "МТООСА"},
                {"Мьянма": "Мьянма"},
                {"Намибия": "Намибия"},
                {"Науру": "Науру"},
                {"Непал": "Непал"},
                {"Нигер": "Нигер"},
                {"Нигерия": "Нигерия"},
                {"Нидерланды": "Нидерланды"},
                {"Никарагуа": "Никарагуа"},
                {"Ниуэ": "Ниуэ"},
                {"Новая Зеландия": "Новая Зеландия"},
                {"Новая Каледония": "Новая Каледония"},
                {"Норвегия": "Норвегия"},
                {"Объединенные арабские эмираты (ОАЭ)": "Объединенные арабские эмираты (ОАЭ)"},
                {"Оман": "Оман"},
                {"Острова Кайман": "Острова Кайман"},
                {"Острова Кука": "Острова Кука"},
                {"Острова Теркс и Кайкос": "Острова Теркс и Кайкос"},
                {"Остров Буве": "Остров Буве"},
                {"Остров Мэн": "Остров Мэн"},
                {"Остров Норфолк": "Остров Норфолк"},
                {"Остров Рождества": "Остров Рождества"},
                {"Остров Херд и острова Макдональд": "Остров Херд и острова Макдональд"},
                {"Пакистан": "Пакистан"},
                {"Палау": "Палау"},
                {"Палестина": "Палестина"},
                {"Панама": "Панама"},
                {"Папуа-Новая Гвинея": "Папуа-Новая Гвинея"},
                {"Парагвай": "Парагвай"},
                {"Перу": "Перу"},
                {"Питкерн": "Питкерн"},
                {"Польша": "Польша"},
                {"Португалия": "Португалия"},
                {"Приднестровская Молдавская Республика (ПМР)": "Приднестровская Молдавская Республика (ПМР)"},
                {"Пуэрто-Рико": "Пуэрто-Рико"},
                {"Республика Македония": "Республика Македония"},
                {"Реюньон": "Реюньон"},
                {"Руанда": "Руанда"},
                {"Румыния": "Румыния"},
                {"Самоа": "Самоа"},
                {"Сан-Марино": "Сан-Марино"},
                {"Сан-Томе и Принсипи": "Сан-Томе и Принсипи"},
                {"Саудовская Аравия": "Саудовская Аравия"},
                {"Свазиленд": "Свазиленд"},
                {"Северная Корея": "Северная Корея"},
                {"Северные Марианские острова": "Северные Марианские острова"},
                {"Сейшелы": "Сейшелы"},
                {"Сен-Бартельми": "Сен-Бартельми"},
                {"Сенегал": "Сенегал"},
                {"Сен-Мартен": "Сен-Мартен"},
                {"Сент-Винсент и Гренадины": "Сент-Винсент и Гренадины"},
                {"Сент-Китс и Невис": "Сент-Китс и Невис"},
                {"Сент-Люсия": "Сент-Люсия"},
                {"Сент-Пьер и Микелон": "Сент-Пьер и Микелон"},
                {"Сербия": "Сербия"},
                {"Сингапур": "Сингапур"},
                {"Синт-Мартен": "Синт-Мартен"},
                {"Сирийская Арабская Республика": "Сирийская Арабская Республика"},
                {"Словакия": "Словакия"},
                {"Словения": "Словения"},
                {"Соединенные Штаты Америки": "Соединенные Штаты Америки"},
                {"Соломоновы острова": "Соломоновы острова"},
                {"Сомали": "Сомали"},
                {"Судан": "Судан"},
                {"Суринам": "Суринам"},
                {"Сьерра-Леоне": "Сьерра-Леоне"},
                {"Таджикистан": "Таджикистан"},
                {"Таиланд": "Таиланд"},
                {"Тайвань": "Тайвань"},
                {"Танзания": "Танзания"},
                {"Тимор-Лесте": "Тимор-Лесте"},
                {"Того": "Того"},
                {"Токелау": "Токелау"},
                {"Тонга": "Тонга"},
                {"Тринидад и Тобаго": "Тринидад и Тобаго"},
                {"Тристан-да-Кунья": "Тристан-да-Кунья"},
                {"Тувалу": "Тувалу"},
                {"Тунис": "Тунис"},
                {"Туркменистан": "Туркменистан"},
                {"Турция": "Турция"},
                {"Уганда": "Уганда"},
                {"Узбекистан": "Узбекистан"},
                {"Украина": "Украина"},
                {"Уоллис и Футуна": "Уоллис и Футуна"},
                {"Уругвай": "Уругвай"},
                {"Фарерские острова": "Фарерские острова"},
                {"Фиджи": "Фиджи"},
                {"Филиппины": "Филиппины"},
                {"Финляндия": "Финляндия"},
                {"Фолклендские острова": "Фолклендские острова"},
                {"Франция": "Франция"},
                {"Французская Гвиана": "Французская Гвиана"},
                {"Французская Полинезия": "Французская Полинезия"},
                {"Французские Южные территории": "Французские Южные территории"},
                {"Хорватия": "Хорватия"},
                {"Центрально-Африканская Республика": "Центрально-Африканская Республика"},
                {"Чад": "Чад"},
                {"Черногория": "Черногория"},
                {"Чешская Республика": "Чешская Республика"},
                {"Чили": "Чили"},
                {"Швейцария": "Швейцария"},
                {"Швеция": "Швеция"},
                {"Шпицберген и Ян Майен": "Шпицберген и Ян Майен"},
                {"Шри-Ланка": "Шри-Ланка"},
                {"Эквадор": "Эквадор"},
                {"Экваториальная Гвинея": "Экваториальная Гвинея"},
                {"Эландские острова": "Эландские острова"},
                {"Эль-Сальвадор": "Эль-Сальвадор"},
                {"Эритрея": "Эритрея"},
                {"Эстония": "Эстония"},
                {"Эфиопия": "Эфиопия"},
                {"Южная Африка": "Южная Африка"},
                {"Южная Джорджия и Южные Сандвичевы острова": "Южная Джорджия и Южные Сандвичевы острова"},
                {"Южная Корея": "Южная Корея"},
                {"Южная Осетия": "Южная Осетия"},
                {"Южный Судан": "Южный Судан"},
                {"Ямайка": "Ямайка"},
                {"Япония": "Япония"},
            ],
            product: [
                {'': 'Выберите продукт...'},
                {'Нет': 'Пока не использую'},
                {"Traffic Monitor Enterprise": "Traffic Monitor Enterprise"},
                {"Kribrum": "Kribrum"},
                {"Appercut Custom Code Scanner": "Appercut Custom Code Scanner"},
                {"Traffic Monitor Enterprise Appliance": "Traffic Monitor Enterprise Appliance"},
                {"Traffic Monitor Standard": "Traffic Monitor Standard"},
                {"Traffic Monitor Standard Appliance": "Traffic Monitor Standard Appliance"},
                {"EndPoint Security": "EndPoint Security"},
                {"Targeted Attack Detector": "Targeted Attack Detector"},
                {"Targeted Attack Monitor": "Targeted Attack Monitor"},
                {"Taiga": "Taiga"},
            ],
            severity: [
                {'': 'Выберите серьёзность...'},
                {'Критическая': 'Очень серьёзная проблема, остановлен бизнес'},
                {'Высокая': 'Серьёзная проблема'},
                {'Средняя': 'Проблема средней важности'},
                {'Низкая': 'Незначительная проблема'},
            ],
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
    en: {
    }
}

// Эта переменная ипользуется непосредственно для перевода
var iwc_i18n = iwc_i18n_by_language[iwc_i18n_language];

// Предчатовая форма. Структура: {<поле>: {type: <тип поля>, required: <обязательно ли поле>, validator: <регулярка>}}
var iwc_prechat_form = {
    name:         {type: 'input',     required: true},
    surname:      {type: 'input',     required: true},
    email:        {type: 'input',     required: true,   validator: '@'},
    email_confirm:{type: 'input',     required: true},
    phone:        {type: 'input',     required: true},
    case_no:      {type: 'input',     required: false,  validator: '^[0-9]*$'},
    country:      {type: 'datalist',  required: true},
    product:      {type: 'select',    required: true},
    version:      {type: 'input',     required: false},
    severity:     {type: 'select',    required: true},
    summary:      {type: 'input',     required: true},
    description:  {type: 'textarea',  required: true},

    submit: {type: 'submit', text: iwc_i18n.messages.submit},
};

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
        'name, surname, email, email_confirm, phone, case_no, country, product, version, severity, summary, description, submit'.split(', ');

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
    liveagent.addCustomDetail('Номер обращения', values.case_no || '').saveToTranscript('CaseNumber__c');
    liveagent.addCustomDetail('Страна', values.country).saveToTranscript('Country__c');
    liveagent.addCustomDetail('Продукт', values.product).saveToTranscript('Product__c');
    liveagent.addCustomDetail('Версия', values.version).saveToTranscript('Version__c');
    liveagent.addCustomDetail('Серьёзность', values.severity).saveToTranscript('Severity__c');
    liveagent.addCustomDetail('Тема запроса', values.summary).saveToTranscript('Subject__c');
    liveagent.addCustomDetail('Описание проблемы', values.description).saveToTranscript('Description__c');

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

    liveagent.findOrCreate('Case')
        .map('CaseNumber', 'Номер обращения', true, true, false)
/*      .map('RecordType', 'sys_Case_RecordType', false, false, true)
        .map('Origin', 'sys_Case_Origin', false, false, true)
        .map('Subject', 'Тема запроса', false, false, true)
        .map('Description', 'Описание проблемы', false, false, true)*/
        .showOnCreate()
        .saveToTranscript('CaseId')
    ;

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

    $('#prechat_form').submit(function() {
        try {
            PrechatSubmit();
        } catch (error) {
            console && console.log(error);
        }

        return false;
    });
});

function Sprintf(format, etc) {
    var arg = arguments;
    var i = 1;
    return format.replace(/%((%)|s)/g, function (m) { return m[2] || arg[i++] });
}
