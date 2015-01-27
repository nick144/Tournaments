<?php

class TennisUIListPage extends TennisUISelect {

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
        $this->options = array();

        $pages = get_pages(array(
            'sort_order' => 'ASC',
            'sort_column' => 'post_title',
            'hierarchical' => 1,
            'exclude' => '',
            'include' => '',
            'meta_key' => '',
            'meta_value' => '',
            'authors' => '',
            'child_of' => 0,
            'parent' => -1,
            'exclude_tree' => '',
            'number' => '',
            'offset' => 0,
            'post_type' => 'page',
            'post_status' => 'publish'
        ));

        $this->options[0] = __('-- Select Page --', tennis_get_domain());

        foreach ($pages as $page) {
            $this->options[$page->ID] = $page->post_title;
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
    protected function get_control() {
        $this->classes[] = 'tennis-ui-list-page';                
        return parent::get_control();
    }

}