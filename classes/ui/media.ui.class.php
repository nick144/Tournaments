<?php

class TennisUIMedia extends TennisUI {

    /**
     * 
     *
     * @package Tennis
     * @subpackage Core
     * @author thethangtran <tranthethang@gmail.com>
     * @since 1.0.0
     *      
     */
    protected function get_control() {
        $this->classes[] = 'tennis-ui-media';
        $this->set_attribute('autocomplete', 'off');

        if (!empty($this->value)) {
            $this->value = do_shortcode($this->value);
        }

        $out = sprintf('<div class="tennis-ui-media-wrap %1$s">', empty($this->value) ? '' : 'has-image');
        $out.= sprintf('<input type="hidden" id="%s" name="%s" class="%s" value="%s" %s/>', $this->id, $this->name, implode(' ', $this->classes), $this->value, $this->unserialize_attributes());
        $out.= sprintf('<img src="%1$s" class="">', $this->value, empty($this->value) ? 'ui-hide' : '');
        $out.= sprintf('<a href="#" class="tennis-ui-media-upload %1$s"></a>', empty($this->value) ? '' : 'ui-hide');
        $out.= sprintf('<a href="#" class="tennis-ui-media-remove %1$s"></a>', empty($this->value) ? 'ui-hide' : '');
        $out.= '</div>';
        return $out;
    }

}