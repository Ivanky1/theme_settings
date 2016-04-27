(function($) {
    $("#squeeze a > img").parent().each(function () {
        if (
            $(this).attr("href").toLowerCase().indexOf(".jpg")!=-1
                || $(this).attr("href").toLowerCase().indexOf(".jpeg")!=-1
                || $(this).attr("href").toLowerCase().indexOf(".gif")!=-1
                || $(this).attr("href").toLowerCase().indexOf(".png")!=-1
                || $(this).attr("href").toLowerCase().indexOf(".bmp")!=-1
            ) $(this).colorbox({
                    height:"auto"
            });
    });


})(jQuery);