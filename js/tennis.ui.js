var tennis_uploader;

function tennis_pattern_change(event, obj) {
    var parent = obj.parents('.row');
    if (!obj.hasClass('active')) {
        parent.find('.radio-pattern-item.active').removeClass('active');
        obj.addClass('active');
    }
}

function tennis_color_swatches_change(event, obj) {
    var primary = obj.attr('data-primary');
    var secondary = obj.attr('data-secondary');

    jQuery('#primary_color').iris('color', primary);
    jQuery('#link_color').iris('color', primary);
    jQuery('#secondary_color').iris('color', secondary);
    jQuery('#link_color_hover').iris('color', secondary);
}


jQuery(function($) {
    /*MULTI-TEXT*/
    var tennisUIMultiText = jQuery(".tennis-ui-multi-text");
    if (tennisUIMultiText.length > 0) {
        tennisUIMultiText.sortable({
            handle: '.tennis-sortable-handle',
            placeholder: 'multi-text-placeholder',
            tolerance: 'pointer'
        });

        tennisUIMultiText.on("click", 'a', function(e) {
            e.preventDefault();

            var button = jQuery(e.currentTarget);
            var li = button.parent();
            var ul = li.parent();

            switch (button.attr("data-action")) {
                case "add":
                    clone = li.clone();
                    clone.find("input[type=text]").val("").end();
                    clone.find("input[type=hidden]").val(new TennisUtil().getRandomID('rating-index-')).end();
                    li.after(clone);
                    break;
                case "delete":
                    if (ul.find('li').length > 1) {
                        li.remove();
                    } else {
                        li.find("input[type=text]").val("").end();
                    }
                    break;
            }
        });
    }
});

jQuery(function($) {
    /*RATING*/
    var tennisUIRating = jQuery(".tennis-ui-rating");
    if (tennisUIRating.length > 0) {
        tennisUIRating.sortable({
            handle: '.rating-handle',
            placeholder: 'rating-placeholder',
            tolerance: 'pointer'

        });

        tennisUIRating.on("click", 'a', function(e) {
            e.preventDefault();

            var button = jQuery(e.currentTarget);
            var li = button.parent();
            var ul = li.parent();

            switch (button.attr("data-action")) {
                case "add":
                    clone = li.clone();
                    clone.find("input[type=text]").val("").end();
                    clone.find("input[type=hidden]").val(new TennisUtil().getRandomID('rating-index-')).end();

                    li.after(clone);

                    break;
                case "delete":
                    if (ul.find('li').length > 1) {
                        li.remove();
                    } else {
                        li.find("input[type=text]").val("").end();
                    }
                    break;
            }
        });
    }


    /*UPLOADER*/
    tennis_uploader_init();

    /**
     * COLOR PICKER     
     */
    var colours = jQuery('.tennis-ui-color');
    if (colours.length > 0) {
        colours.wpColorPicker({
            defaultColor: false,
            change: function(event, ui) {
            },
            clear: function() {
            },
            hide: true,
            palettes: true
        });
    }
});

function TennisUtil() {
    this.getRandomID = function getRandomID(prefix) {
        return prefix + Math.random().toString(36).substr(2);
    };
}

function tennis_uploader_init() {
    jQuery('.tennis-ui-media-upload').click(function(event) {
        event.preventDefault();
        button = jQuery(this);
        if (tennis_uploader) {
            tennis_uploader.open();
            return;
        }
        tennis_uploader = wp.media.frames.tennis_uploader = wp.media({
            title: tennis_variable.i18n.uploader.media_center,
            button: {
                text: tennis_variable.i18n.uploader.choose_image
            },
            multiple: false
        });
        tennis_uploader.on('select', function() {
            attachment = tennis_uploader.state().get('selection').first().toJSON();
            button.addClass('ui-hide');
            button.parent().find('.tennis-ui-media').val(attachment.url);
            button.parent().find('img').attr('src', attachment.url).removeClass('ui-hide');
            button.parent().find('.tennis-ui-media-remove').removeClass('ui-hide');
            button.parent().addClass('has-image');
        });
        tennis_uploader.open();
    });

    jQuery('.tennis-ui-media-remove').click(function(event) {
        event.preventDefault();
        button = jQuery(this);
        button.addClass('ui-hide');
        button.parent().find('.tennis-ui-media').val('');
        button.parent().find('img').attr('src', '').addClass('ui-hide');
        button.parent().removeClass('has-image');
        button.parent().find('.tennis-ui-media-upload').removeClass('ui-hide');
    });
}


var TennisUI = {
    select_colorSwatchesSingle: function(event, obj) {
        var primary = obj.attr('data-primary');
        if ('customize' !== primary) {
            jQuery('#tennis-group-custom_colors').hide();
            jQuery('#primary_color').iris('color', primary);
            jQuery('#link_color_hover').iris('color', primary);
            jQuery('#nav_link_hover_color').iris('color', primary);
        } else {
            jQuery('#tennis-group-custom_colors').show();
        }
    }
};

jQuery(document).ready(function() {
    jQuery('.color-swatches-item input:checked').parent().click();
});