<?php

class TennisUITextArea extends TennisUI {

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
        $this->classes[] = 'tennis-ui-textarea';
        $this->classes[] = 'form-control';
        $this->set_attribute('autocomplete', 'off');

        return sprintf('<textarea id="%s" name="%s" class="%s" %s>%s</textarea>', $this->id, $this->name, implode(' ', $this->classes), $this->unserialize_attributes(), $this->value);
    }

}