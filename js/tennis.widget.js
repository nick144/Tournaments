jQuery(document).ready(function($) {
    if (jQuery('#widget-list').length > 0) {
        var draggable = jQuery('.widget');
        if (draggable.length > 0) {
            jQuery.each(draggable, function() {
                var caption = jQuery(this).find(".widget-title h4:contains('Tennis')");
                if (1 === caption.length) {
                    caption.parent().addClass('widget-made-by-tennis');
                }
            });
        }
    }
});

jQuery(document).ajaxSuccess(function(e, xhr, settings) {
    jQuery.each(settings.data.split('&'), function(index, item) {
        var temp = item.split('=');
        if ('action' === temp[0]) {
            if ('save-widget' === temp[1]) {
                tennis_uploader_init();
            }
        }
    });
});