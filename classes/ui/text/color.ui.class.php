<?php

class TennisUIColor extends TennisUIText {

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
        $this->classes[] = 'tennis-ui-color';
        $this->classes[] = 'form-control';
        $this->attributes['data-default-color'] = $this->default;
        return parent::get_control();
    }

}