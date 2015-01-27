jQuery(document).ready(function($) {
    toggles = jQuery('.ckb_is_use_custom_thumbnail_toggle');
    if (toggles.length > 0) {
        jQuery.each(toggles, function() {
            TennisMetabox.isUseCustomThumbnailToggle(null, jQuery(this));
        });
    }
});


var TennisMetabox = {
    isUseCustomThumbnailToggle: function(event, obj) {
        var obj_wrap = obj.parents('.tennis-metabox-wrap');
        if (obj_wrap) {
            var custom_thumbs = obj_wrap.parent().find('.tennis-metabox-wrap').not(obj_wrap);
            if (obj.is(':checked')) {
                custom_thumbs.show();
            } else {
                custom_thumbs.hide();
            }
        }
    }
};