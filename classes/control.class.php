<?php

if (!class_exists('TennisControl')) {

    class TennisControl {

        /**
         * Get HTML code for control (ui element)
         *
         * @package Tennis
         * @subpackage Core
         * @author thethangtran <tranthethang@gmail.com>
         * @since 1.0.0
         * 
         * @param array $args
         * @return string
         */
        public static function get_html($args = array()) {
            $type = isset($args['type']) ? $args['type'] : 'text';
            $obj = new TennisUI();
            switch ($type) {
                case 'text':
                    $obj = new TennisUIText($args);
                    break;
                case 'url':
                    $obj = new TennisUIUrl($args);
                    break;
                case 'textarea':
                    $obj = new TennisUITextArea($args);
                    break;
                case 'checkbox':
                    $obj = new TennisUICheckbox($args);
                    break;
                case 'email':
                    $obj = new TennisUIEmail($args);
                    break;
                case 'number':
                    $obj = new TennisUINumber($args);
                    break;
                case 'select':
                    $obj = new TennisUISelect($args);
                    break;
                case 'radio':
                    $obj = new TennisUIRadio($args);
                    break;
                case 'radio-list':
                    $obj = new TennisUIRadioList($args);
                    break;
                case 'radio-truefalse':
                    $obj = new TennisUIRadioTrueFalse($args);
                    break;
                case 'select-number':
                    $obj = new TennisUISelectNumber($args);
                    break;
                case 'color':
                    $obj = new TennisUIColor($args);
                    break;
                case 'media':
                    $obj = new TennisUIMedia($args);
                    break;
                case 'taxonomy':
                    $obj = new TennisUITaxonomy($args);
                    break;
                case 'list-page':
                    $obj = new TennisUIListPage($args);
                    break;
                case 'rating':
                    $obj = new TennisUIRating($args);
                    break;
                case 'color-swatches':
                    $obj = new TennisUIRadioColorSwatches($args);
                    break;
                case 'color-swatches-single':
                    $obj = new TennisUIRadioColorSwatchesSingle($args);
                    break;
                case 'pattern':
                    $obj = new TennisUIRadioPattern($args);
                    break;
                case 'layout':
                    $obj = new TennisUILayout($args);
                    break;
                case 'group':
                    $obj = new TennisUIGroup($args);
                    break;
                case 'font':
                    $obj = new TennisUIFont($args);
                    break;
                case 'sidebar-manage':
                    $obj = new TennisUISidebarManager($args);
                    break;
                case 'custom':
                    $obj = new TennisUICustom($args);
                    break;
                default:
                    $obj = new TennisUIText($args);
                    break;
            }

            return $obj->get_html();
        }

        /**
         * Filter data before use
         *
         * @package Tennis
         * @subpackage Core
         * @author thethangtran <tranthethang@gmail.com>
         * @since 1.0.0
         * 
         * @param array $field current field infomation
         * @param mixer $data data of current field
         * @return mixer (string | int | array)
         */
        public static function filter_post_data($field = array(), $data = NULL) {
            $out = NULL;

            $type = $field['type'];

            switch ($type) {
                case 'checkbox':
                    $out = $data;
                    break;
                case 'textarea':
                    $out = htmlspecialchars_decode(stripslashes($data));
                    break;
                case 'url':
                    $out = stripslashes($data);
                    break;
                case 'number':
                    $out = (int) $data;
                    break;
                case 'rating':
                    $out = array();
                    if ($data) {
                        $ids = $data['id'];
                        $features = $data['feature'];
                        $scores = $data['score'];
                        for ($i = 0; $i < count($features); $i++) {
                            if ('' != $ids && '' != $features[$i] && '' != $scores[$i]) {
                                $out['id'][] = $ids[$i];
                                $out['feature'][] = $features[$i];
                                $out['score'][] = $scores[$i];
                            }
                        }
                    }
                    break;
                case 'list-page':
                case 'taxonomy':
                case 'select':
                    if (isset($field['attributes']['multiple'])) {
                        if (is_array($data)) {
                            $data = array_filter($data);
                        }
                        $out = (empty($data)) ? array() : $data;
                    } else {
                        $out = (empty($data)) ? '' : $data;
                    }
                    break;
                case 'select-number':
                    $out = (empty($data)) ? 0 : $data;
                    break;
                case 'media':
                    if (!empty($data)) {
                        $out = str_replace(home_url(), '[home_url]', $data);
                    }
                    break;
                case 'group':
                case 'custom':
                    $out = NULL;
                default:
                    $out = $data;
                    break;
            }
            return $out;
        }

    }

}
