<?php

if (!class_exists('TennisMetabox')) {

    class TennisMetabox {

        private $options = array();
        private $settings = array();
        private $id;
        private $fields = array();

        /**
         * 
         *
         * @package Tennis
         * @subpackage Core
         * @author thethangtran <tranthethang@gmail.com>
         * @since 1.0.0
         *      
         */
        function __construct($options, $id, $settings) {
            $this->options = $options;
            $this->id = $id;
            $this->settings = $settings;
            if (isset($options['fields'])) {
                $this->fields = $options['fields'];
            }
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
        function init() {
            $out = '';
            for ($i = 0; $i < count($this->fields); $i++) {
                $field = $this->fields[$i];

                $field['value'] = isset($this->settings[$field['id']]) ? $this->settings[$field['id']] : $field['default'];

                $wrap_classes = array('tennis-metabox-wrap', 'clearfix', 'row');
                $wrap_classes[] = (0 == $i % 2) ? 'even' : 'odd';

                if ($i == count($this->fields) - 1) {
                    $wrap_classes[] = 'tennis-metabox-wrap-last';
                }


                if (!isset($field['label']) || empty($field['label']) || (isset($field['is_append_label_before_control']) && false == $field['is_append_label_before_control'])) {
                    $field['wrap_begin'] = sprintf('<div class="%1$s"><div class="col-md-12 clearfix">', implode(' ', $wrap_classes));
                    $field['wrap_end'] = '</div></div>';
                } else {
                    $field['wrap_begin'] = sprintf('<div class="%1$s">', implode(' ', $wrap_classes));
                    $field['wrap_end'] = '</div>';

                    $field['label_begin'] = '<div class="col-sm-3">';
                    $field['label_end'] = '</div>';

                    $field['control_begin'] = '<div class="col-sm-9">';
                    $field['control_end'] = '</div>';

                    $field['help_begin'] = '<div class="col-sm-9 col-sm-offset-3">';
                    $field['help_end'] = '</div>';
                }


                $out.= TennisControl::get_html($field);
            }
            return $out;
        }

    }

}