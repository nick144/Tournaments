<?php

$tmp_tennisSettings = get_option(TENNIS_OPT_PREFIX . 'layout_settings');
$taxonomy_fields    = '';

$post = new TennisPosttype('Post', 'tournament', '', array(), array(), array(), array(), array(
    'styles' => array(
        TENNIS_OPT_PREFIX . 'bootstrap',
        TENNIS_OPT_PREFIX . 'ui',
        TENNIS_OPT_PREFIX . 'layout-manager'
    ),
    'scripts' => array(
        TENNIS_OPT_PREFIX . 'bootstrap',
        TENNIS_OPT_PREFIX . 'ui',
        TENNIS_OPT_PREFIX . 'layout-manager',
        TENNIS_OPT_PREFIX . 'metabox')));

/**
 * Add metaboxes "Layout & Sidebar Options" for POST
 */
$metaboxes['fields'] = array(
    array(
        'type' => 'text',
        'id' => TENNIS_OPT_PREFIX . 'from_date_tournament',
        'class' => 'datepicker',
        'name' => TENNIS_OPT_PREFIX . 'from_date_tournament',
        'default' => false,
        'label' => __('Tournament Date From', tennis_get_domain()),
        'is_append_label_before_control' => false,
        'help' => NULL,
        
    ),
    array(
        'type' => 'text',
        'id' => TENNIS_OPT_PREFIX . 'to_date_tournament',
        'class' => 'datepicker',
        'name' => TENNIS_OPT_PREFIX . 'to_date_tournament',
        'default' => false,
        'label' => __('Tournament Date To', tennis_get_domain()),
        'is_append_label_before_control' => false,
        'help' => NULL,
    ),

    array(
        'type' => 'text',
        'id' => TENNIS_OPT_PREFIX . 'organizer_name',
        'name' => TENNIS_OPT_PREFIX . 'organizer_name',
        'default' => false,
        'label' => __('Organizer Name', tennis_get_domain()),
        'is_append_label_before_control' => false,
        'help' => NULL,
    ),

    array(
        'type' => 'text',
        'id' => TENNIS_OPT_PREFIX . 'ground_name',
        'name' => TENNIS_OPT_PREFIX . 'ground_name',
        'default' => false,
        'label' => __('Ground Name', tennis_get_domain()),
        'is_append_label_before_control' => false,
        'help' => NULL,
    ),
    array(
        'type' => 'text',
        'id' => TENNIS_OPT_PREFIX . 'organizer_email',
        'name' => TENNIS_OPT_PREFIX . 'organizer_email',
        'default' => false,
        'label' => __('Organizer Email', tennis_get_domain()),
        'is_append_label_before_control' => false,
        'help' => NULL,
    ),
    array(
        'type' => 'text',
        'id' => TENNIS_OPT_PREFIX . 'contact_name',
        'name' => TENNIS_OPT_PREFIX . 'contact_name',
        'default' => false,
        'label' => __('Contact Name', tennis_get_domain()),
        'is_append_label_before_control' => false,
        'help' => NULL,
    ),
    array(
        'type' => 'text',
        'id' => TENNIS_OPT_PREFIX . 'contact_email',
        'name' => TENNIS_OPT_PREFIX . 'contact_email',
        'default' => false,
        'label' => __('Contact Email', tennis_get_domain()),
        'is_append_label_before_control' => false,
        'help' => NULL,
    ),
);

$post->add_meta_box(__('Tournaments Details', tennis_get_domain()), 'tennis-metabox-post-layout-manage', $metaboxes);




$post->add_taxonomy_fields($taxonomy_fields, 'category');
$post->add_taxonomy_fields($taxonomy_fields, 'post_tag');