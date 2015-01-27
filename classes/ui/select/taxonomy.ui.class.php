<?php

class TennisUITaxonomy extends TennisUISelect {

    public $taxonomy;

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
        $this->taxonomy = isset($args['taxonomy']) ? $args['taxonomy'] : 'category';
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
        $this->classes[] = 'tennis-ui-taxonomy';

        $terms = get_terms($this->taxonomy);
        $this->options[''] = __('-- Select --', tennis_get_domain());
        foreach ($terms as $term) {
            $this->options[$term->term_id] = $term->name;
        }

        return parent::get_control();
    }

}