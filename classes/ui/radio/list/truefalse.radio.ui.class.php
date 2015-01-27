<?php

class TennisUIRadioTrueFalse extends TennisUIRadioList {

    public $true, $false;

    /**
     * 
     *
     * @package Tennis
     * @subpackage Core
     * @author thethangtran <tranthethang@gmail.com>
     * @since 1.0.0
     *      
     */
    public function __construct($args = array()) {
        parent::__construct($args);
        $this->options = array(
            array(
                'value' => 'true',
                'label' => isset($args['true']) ? $args['true'] : __('True', tennis_get_domain()),
            ),
            array(
                'value' => 'false',
                'label' => isset($args['false']) ? $args['false'] : __('False', tennis_get_domain())
            )
        );

        $this->control_begin = $this->control_begin . '<div class="row clearfix">';
        $this->control_end = '</div>' . $this->control_end;

        $this->option_args['wrap_begin'] = '<div class="col-xs-4 col-sm-4 col-md-2">';
        $this->option_args['wrap_end'] = '</div>';
        $this->option_args['label_begin'] = '';
        $this->option_args['label_end'] = '';
        $this->option_args['control_begin'] = '';
        $this->option_args['control_end'] = '';
    }

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
        $this->classes[] = 'tennis-ui-radio-true-false';
        return parent::get_control();
    }

}