jQuery(document).ready(function() {

    jQuery("a.tennis-tab-link").click(function(event) {
        event.preventDefault();

        if (!jQuery(this).hasClass('active')) {
            jQuery('.tennis-tab.tab_active').removeClass('tab_active').addClass('tab_deactive');
            jQuery(jQuery(this).attr('href')).removeClass('tab_deactive').addClass('tab_active');
            jQuery('a.tennis-tab-link.active').removeClass('active');
            jQuery(this).addClass('active');
        }
    });
});
