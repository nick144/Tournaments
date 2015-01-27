<?php

class TennisUILayout extends TennisUI {

    public $post_type, $taxonomy, $template_hierarchy;

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

        $this->post_type = isset($args['post_type']) ? $args['post_type'] : FALSE;
        $this->taxonomy = isset($args['taxonomy']) ? $args['taxonomy'] : FALSE;
        $this->template_hierarchy = isset($args['template_hierarchy']) ? $args['template_hierarchy'] : FALSE;
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
        $html = '';

        if ($this->template_hierarchy) {
            $this->value = is_array($this->value) ? $this->value : unserialize($this->value);
            $html = TennisLayout::get_form($this->template_hierarchy, $this->value, $this->name);
        } else {
            $html = __('Parameter template_hierarchy is missing.', tennis_get_domain());
        }

        return $html;
    }

}