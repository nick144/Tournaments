<?php

class TennisUIUrl extends TennisUI {

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
        $this->classes[] = 'tennis-ui-url';
        $this->classes[] = 'form-control';
        $this->set_attribute('autocomplete', 'off');
        return sprintf('<input type="url" id="%s" name="%s" class="%s" value="%s" %s/>', $this->id, $this->name, implode(' ', $this->classes), $this->value, $this->unserialize_attributes());
    }

}