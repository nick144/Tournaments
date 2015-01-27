jQuery(document).ready(function() {
    if (jQuery('form#frm-tennis-theme-options').length > 0) {
        jQuery('form#frm-tennis-theme-options').ajaxForm({
            url: tennis_variable.AjaxUrl,
            dataType: 'json',
            clearForm: false,
            resetForm: false,
            type: 'post',
            beforeSerialize: function($form, options) {

            },
            beforeSubmit: function(formData, jqForm, options) {
                jQuery('#tennis-cpanel-wrapper').css('opacity', 0.3);
                jQuery('#tennis-loading-gif').show();
            },
            success: function(responseText, statusText, xhr, $form) {
                jQuery('#tennis-cpanel-wrapper').css('opacity', 1);
                jQuery('#tennis-loading-gif').hide();
            }
        });
    }

    jQuery('.rdo_seo_status.radio-item-selected').click();
    TennisThemeOptions.onChangeReCaptchaSkin('', jQuery('select.tennis_recaptcha_skin'));
});



var TennisThemeOptions = {
    onClickSubTab: function(event, obj) {
        event.preventDefault();

        if (obj.hasClass('dashicons-plus')) {
            obj.removeClass('dashicons-plus').addClass('dashicons-minus');
            obj.parent().next().slideDown();
        } else {
            obj.removeClass('dashicons-minus').addClass('dashicons-plus');
            obj.parent().next().slideUp();
        }
    },
    onChangeReCaptchaSkin: function(event, obj) {
        var wrap = obj.parents('.col-xs-9');
        var field = obj.parents('.tennis_sub_field_wrap');
        var skin = obj.find(":selected").val();
        if ('off' === skin) {
            wrap.find('.tennis_sub_field_wrap').not(field).hide();
            field.addClass('tennis_recaptcha_skin_off');
        } else {
            wrap.find('.tennis_sub_field_wrap').not(field).show();
            field.removeClass('tennis_recaptcha_skin_off');
        }

    },
    onClickSEOStatus: function(event, obj) {
        var wrap = obj.parents('.tennis-tab-body');
        var field = obj.parents('.tennis-opt-fields');

        if ('false' === obj.val()) {
            wrap.find('.tennis-opt-fields').not(field).hide();
        } else {
            wrap.find('.tennis-opt-fields').not(field).show();
        }
    },
    onChangeFontFamily: function(event, obj, preview) {
        var cbo_weight = obj.parents('.row').find('.tennis-font-weight');
        var cbo_size = obj.parents('.row').find('.tennis-font-size');
        var cbo_line_height = obj.parents('.row').find('.tennis-line-height');
        var cbo_text_transform = obj.parents('.row').find('.tennis-text-transform');
        var cssID = 'css-dynamic-' + obj.attr('id');
        var index = obj.find(":selected").val();
        var font = google_fonts.items[index];

        if ('off' !== index) {
            //REFREST FONT WEIGHT (variants)
            cbo_weight.html('');
            jQuery.each(font.variants, function(index, item) {
                tmp_val = item;
                if ('regular' === item) {
                    tmp_val = '400';
                } else if ('italic' === item) {
                    tmp_val = '400italic';
                }
                cbo_weight.append(jQuery("<option></option>").attr("value", tmp_val).text(item));
            });
            cbo_weight.find('option').first().attr('selected', 'selected');
            TennisThemeOptions.loadFont(cssID, font.family, cbo_weight.find(":selected").val());
            preview.css('font-family', "'" + font.family + "'").show()

            cbo_weight.css('opacity', 1);
            cbo_size.css('opacity', 1);
            cbo_line_height.css('opacity', 1);
            cbo_text_transform.css('opacity', 1);
        } else {
            preview.hide();
            cbo_weight.css('opacity', 0.3);
            cbo_size.css('opacity', 0.3);
            cbo_line_height.css('opacity', 0.3);
            cbo_text_transform.css('opacity', 0.3);
        }
    },
    onChangeFontWeight: function(event, obj, preview) {
        var fontWeight = obj.val();
        var fontFamily = obj.parents('.row').find('.tennis-font-family');
        var cssID = 'css-dynamic-' + fontFamily.attr('id');
        TennisThemeOptions.loadFont(cssID, fontFamily.find(":selected").text(), fontWeight);
        preview.css('font-weight', fontWeight);
        if (fontWeight.length > 3) {
            preview.css('font-style', 'italic');
        } else {
            preview.css('font-style', 'normal');
        }

    },
    onChangeFontSize: function(event, obj, preview) {
        var fontSize = obj.find(":selected").val();
        preview.css('font-size', fontSize + 'px');
    },
    onChangeLineHeight: function(event, obj, preview) {
        var lineHeight = obj.find(":selected").val();
        preview.css('line-height', lineHeight + 'px');
    },
    onChangeTextTransform: function(event, obj, preview) {
        var textTransform = obj.find(":selected").val();
        preview.css('text-transform', textTransform);
    },
    loadFont: function(cssID, fontFamily, fontSize) {
        //URL FONT
        var url = 'http://fonts.googleapis.com/css?family=';
        url += fontFamily.replace(' ', '+');
        url += ':' + fontSize;

        //LOAD FONT
        if (jQuery('#' + cssID).length > 0) {
            jQuery('#' + cssID).attr('href', url);
        } else {
            var style = jQuery("<link id='" + cssID + "' rel='stylesheet' href='" + url + "' type='text/css' media='all'>");
            jQuery('body').append(style);
        }

    },
    reset: function(event, ajax_nonce) {
        event.preventDefault();
        var answer = confirm(tennis_variable.i18n.theme_options.do_you_want_to_reset_all_setting_to_default);
        if (answer === true) {
            jQuery.ajax({
                type: 'POST',
                url: tennis_variable.AjaxUrl,
                dataType: 'json',
                data: {
                    action: "tennis_reset_theme_options",
                    ajax_nonce: ajax_nonce
                },
                beforeSend: function() {
                    jQuery('#tennis-cpanel-wrapper').css('opacity', 0.3);
                    jQuery('#tennis-loading-gif').show();
                },
                success: function(data) {
                    window.location.reload();
                },
                complete: function(data) {
                    jQuery('#tennis-cpanel-wrapper').css('opacity', 1);
                    jQuery('#tennis-loading-gif').hide();
                },
                error: function(errorThrown) {

                }
            });
        }
    }
};