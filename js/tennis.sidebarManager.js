var TennisSidebar = {
    add: function(event, obj, txt) {
        event.preventDefault();
        var new_sidebar = jQuery.trim(txt.val());
        if ('' === new_sidebar) {
            alert(tennis_variable.i18n.sidebar_manager.please_enter_sidebar_name);
        } else {
            jQuery.ajax({
                type: 'POST',
                url: tennis_variable.AjaxUrl,
                dataType: 'json',
                data: {
                    action: "tennis_add_sidebar",
                    ajax_nonce: jQuery('#tennis_add_sidebar_ajax_nonce').val(),
                    new_sidebar: new_sidebar
                },
                beforeSend: function() {
                    jQuery('#tennis-cpanel-wrapper').css('opacity', 0.3);
                    jQuery('#tennis-loading-gif').show();
                },
                success: function(data) {
                    if ('' !== data.html) {
                        wrap = obj.parents('.tennis-ui-sidebar-manager');
                        wrap.find('tbody').append(data.html);
                    } else {
                        alert(data.log);
                    }
                    
                    txt.val('');
                },
                complete: function(data) {
                    jQuery('#tennis-cpanel-wrapper').css('opacity', 1);
                    jQuery('#tennis-loading-gif').hide();
                },
                error: function(errorThrown) {

                }
            });
        }
    },
    rename: function(event, obj, sidebar_slug) {
        event.preventDefault();

        var sidebar_name = obj.parents('tr').find('span').first().text();
        var new_sidebar_name = jQuery.trim(prompt("Rename Sidebar:", sidebar_name));
        if (sidebar_name !== new_sidebar_name && '' !== new_sidebar_name) {
            jQuery.ajax({
                type: 'POST',
                url: tennis_variable.AjaxUrl,
                dataType: 'json',
                data: {
                    action: "tennis_rename_sidebar",
                    ajax_nonce: jQuery('#tennis_rename_sidebar_ajax_nonce').val(),
                    new_sidebar_name: new_sidebar_name,
                    sidebar_slug: sidebar_slug
                },
                beforeSend: function(XMLHttpRequest, settings) {
                    jQuery('#tennis-cpanel-wrapper').css('opacity', 0.3);
                    jQuery('#tennis-loading-gif').show();
                },
                success: function(data) {
                    obj.parents('tr').find('span').first().text(new_sidebar_name);
                },
                complete: function(XMLHttpRequest, textStatus) {
                    jQuery('#tennis-cpanel-wrapper').css('opacity', 1);
                    jQuery('#tennis-loading-gif').hide();
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                }
            });
        }
    },
    remove: function(event, obj, sidebar_slug) {
        event.preventDefault();
        var answer = confirm(tennis_variable.i18n.sidebar_manager.do_you_want_to_remove_this_sidebar);
        if (answer === true) {
            jQuery.ajax({
                type: 'POST',
                url: tennis_variable.AjaxUrl,
                dataType: 'json',
                data: {
                    action: "tennis_remove_sidebar",
                    ajax_nonce: jQuery('#tennis_remove_sidebar_ajax_nonce').val(),
                    sidebar_slug: sidebar_slug
                },
                beforeSend: function() {
                    jQuery('#tennis-cpanel-wrapper').css('opacity', 0.3);
                    jQuery('#tennis-loading-gif').show();
                },
                success: function(data) {
                    if ('' === data.log) {
                        obj.parents('tr').remove();
                    } else {
                        alert(data.log);
                    }
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