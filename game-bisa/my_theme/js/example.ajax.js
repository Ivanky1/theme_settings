(function($) {
    // Сохраняем функции, которые описаны в файле misc/ajax.js.
    // beforeSend подготавливает AJAX запрос перед его отправкой.
    // success вызывается после успешного выполнения AJAX.
    // error вызывается после неудачного выполения AJAX.
    var beforeSend = Drupal.ajax.prototype.beforeSend;
    var success = Drupal.ajax.prototype.success;
    var error = Drupal.ajax.prototype.error;

    /**
     * Prepare the Ajax request before it is sent.
     */
    Drupal.ajax.prototype.beforeSend = function(xmlhttprequest, options) {
        // Вызываем код, который описан в Drupal.ajax.prototype.beforeSend в файле misc/ajax.js,
        // что бы не нарушить работу AJAX.
        beforeSend.call(this, xmlhttprequest, options);

        if (this.progress.type == "example_progress" && $(this.element).attr("type") == "submit") {
            // Сохраняем оригинальное название кнопки, это необходимо для того, что бы после завершения работы AJAX,
            // изменять название кнопки назад.
            this.progress.submitValue = $(this.element).attr("value");

            // Присваиваем новое название кнопки.
            $(this.element).attr("value", Drupal.t("Loading..."));
        }
    };

    /**
     * Handler for the form redirection completion.
     */
    Drupal.ajax.prototype.success = function(xmlhttprequest, options) {
        success.call(this, xmlhttprequest, options);

        // Востанавливаем значение кнопки на оригинальное.
        if (this.progress.submitValue) {
            $(this.element).attr("value", this.progress.submitValue);
        }
    };

    /**
     * Handler for the form redirection error.
     */
    Drupal.ajax.prototype.error = function (response, uri) {
        error.call(this, xmlhttprequest, options);

        if (this.progress.submitValue) {
            $(this.element).attr("value", this.progress.submitValue);
        }
    };




})(jQuery);