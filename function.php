<?php


if ( !is_admin() ) {
    function sorttablepost_enqueue_scripts() { 
        wp_enqueue_script( 'sorttable', plugins_url( '/scripts/sorttable.js', __FILE__ ) );
    } 
    add_action('wp_enqueue_scripts', 'sorttablepost_enqueue_scripts'); 
    
    function sorttablepost_enqueue_styles() {
        $myStyleUrl = plugins_url('/css/sorttablepost.css', __FILE__);
        wp_register_style('sorttablepost', $myStyleUrl);
        wp_enqueue_style( 'sorttablepost');
    }
    add_action('wp_print_styles', 'sorttablepost_enqueue_styles');
}



add_action('wp_head','hook_script');
add_action( 'admin_head', 'hook_script' );

function hook_script()
{

    $output='<script>
          jQuery(function() {
            jQuery( ".datepicker" ).datepicker({
                dateFormat: "dd.mm.yy"
            });
            jQuery( "#ten_from_date_tournament" ).datepicker({
                dateFormat: "dd.mm.yy"
            });
            jQuery( "#ten_to_date_tournament" ).datepicker({
                dateFormat: "dd.mm.yy"
            });
          });
      </script>';

    echo $output;

}


function load_custom_wp_admin_style() {
        wp_enqueue_script('jquery');
        wp_enqueue_script('jquery-ui-tabs');
        wp_enqueue_script('jquery-ui-datepicker');
        wp_enqueue_style('plugin_name-admin-ui-css',
                'http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.21/themes/smoothness/jquery-ui.css',
                false,
                PLUGIN_VERSION,
                false);
}
add_action( 'admin_enqueue_scripts', 'load_custom_wp_admin_style' );



if (!function_exists('admin_register_assets')) {

    function admin_register_assets() {
        $dir = plugins_url().'/tournaments';

        #STYLESHEET
        wp_register_style(TENNIS_OPT_PREFIX . 'font-awesome', "{$dir}/assets/font-awesome/css/font-awesome.css");
        wp_register_style(TENNIS_OPT_PREFIX . 'bootstrap', "{$dir}/assets/bootstrap/bootstrap.css");
        wp_register_style(TENNIS_OPT_PREFIX . 'colorbox', "{$dir}/assets/colorbox/colorbox.css");
        wp_register_style(TENNIS_OPT_PREFIX . 'ui', "{$dir}/css/tennis.ui.css");    
        
        wp_register_style(TENNIS_OPT_PREFIX . 'widget', "{$dir}/css/tennis.widget.css ");
        wp_register_style(TENNIS_OPT_PREFIX . 'shortcodes', "{$dir}/css/tennis.shortcodes.css ");

        #SCRIPTS
        wp_register_script(TENNIS_OPT_PREFIX . 'bootstrap', "{$dir}/assets/bootstrap/bootstrap.js", array('jquery'), '3.0.3', TRUE);
        wp_register_script(TENNIS_OPT_PREFIX . 'colorbox', "{$dir}/assets/colorbox/colorbox.js", array('jquery'), NULL, TRUE);
        wp_register_script(TENNIS_OPT_PREFIX . 'ui', "{$dir}/js/tennis.ui.js", array('jquery'), NULL, TRUE);
        
        
        wp_register_script(TENNIS_OPT_PREFIX . 'widget', "{$dir}/js/tennis.widget.js", array('jquery'), NULL, TRUE);
        wp_register_script(TENNIS_OPT_PREFIX . 'metabox', "{$dir}/js/tennis.metabox.js", array('jquery'), NULL, TRUE);
    }

}

add_action('wp_enqueue_scripts', 'front_enqueue_scripts');

function front_enqueue_scripts() {
    if (!is_admin()) {
        global $wp_styles, $is_IE;
        $dir = plugins_url().'/tournaments';
        #STYLESHEETs                
        wp_enqueue_style('wp-mediaelement');
        wp_enqueue_style(TENNIS_OPT_PREFIX . 'font-awesome', "{$dir}/assets/font-awesome/css/font-awesome.css");
        wp_enqueue_style(TENNIS_OPT_PREFIX . 'bootstrap', $dir . '/css/bootstrap.css', array(), NULL);
        wp_enqueue_style(TENNIS_OPT_PREFIX . 'flexslider', $dir . '/css/flexslider.css', array(), NULL);
        wp_enqueue_style(TENNIS_OPT_PREFIX . 'superfish', $dir . '/css/superfish.css', array(), NULL);
        wp_enqueue_style(TENNIS_OPT_PREFIX . 'prettyPhoto', $dir . '/css/prettyPhoto.css', array(), NULL);
        wp_enqueue_style(TENNIS_OPT_PREFIX . 'magnific-popup', $dir . '/css/jquery.magnific-popup.css', array(), NULL);
        // wp_enqueue_style(TENNIS_OPT_PREFIX . 'fotorama', $dir . '/assets/fotorama/fotorama.css', array(), NULL);
        wp_enqueue_style(TENNIS_OPT_PREFIX . 'jquery-ui', $dir . '/css/jquery-ui.css', array(), NULL);
        wp_enqueue_style(TENNIS_OPT_PREFIX . 'style', get_stylesheet_uri(), array(), NULL);

        wp_enqueue_style('plugin_name-admin-ui-css',
                'http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.21/themes/smoothness/jquery-ui.css',
                false,
                PLUGIN_VERSION,
                false);
        if ($is_IE) {
            wp_register_style('tennis-ie', $dir . '/css/ie.css', array(), NULL);
            wp_enqueue_style('tennis-ie');
            $wp_styles->add_data('tennis-ie', 'conditional', 'lt IE 9');
        }
        wp_enqueue_style(TENNIS_OPT_PREFIX . 'responsive', $dir . '/css/responsive.css', array(TENNIS_OPT_PREFIX . 'style'), NULL);
        
        #SCRIPTS
        wp_enqueue_script('jquery');
        wp_enqueue_script('jquery-ui-tabs');
        wp_enqueue_script('jquery-ui-datepicker');
        
        if ($is_IE) {
            wp_enqueue_script(TENNIS_OPT_PREFIX . 'html5shiv', $dir . '/js/html5shiv.js', array(), NULL, TRUE);
            wp_enqueue_script(TENNIS_OPT_PREFIX . 'respond', $dir . '/js/respond.js', array('jquery'), NULL, TRUE);
            wp_enqueue_script(TENNIS_OPT_PREFIX . 'css3-mediaqueries', $dir . '/js/css3-mediaqueries.js', array(), NULL, TRUE);
            wp_enqueue_script(TENNIS_OPT_PREFIX . 'pie-ie678', $dir . '/js/PIE_IE678.js', array(), NULL, TRUE);
        }

        wp_enqueue_script('jquery-form');
        wp_enqueue_script('jquery-masonry');
        wp_enqueue_script('wp-mediaelement');        
        wp_enqueue_script(TENNIS_OPT_PREFIX . 'bootstrap', $dir . '/js/bootstrap.js', array('jquery'), NULL, TRUE);
        wp_enqueue_script(TENNIS_OPT_PREFIX . 'carouFredSel', $dir . '/js/jquery.carouFredSel.js', array('jquery'), NULL, TRUE);
        wp_enqueue_script(TENNIS_OPT_PREFIX . 'flexslider', $dir . '/js/jquery.flexslider.js', array('jquery'), NULL, TRUE);
        wp_enqueue_script(TENNIS_OPT_PREFIX . 'mousewheel', $dir . '/js/jquery.mousewheel.js', array('jquery'), NULL, TRUE);
        wp_enqueue_script(TENNIS_OPT_PREFIX . 'validate', $dir . '/js/jquery.validate.js', array('jquery'), NULL, TRUE);
        wp_enqueue_script(TENNIS_OPT_PREFIX . 'modernizr', $dir . '/js/modernizr-transitions.js', array('jquery'), NULL, TRUE);
        wp_enqueue_script(TENNIS_OPT_PREFIX . 'retina', $dir . '/js/retina.js', array('jquery'), NULL, TRUE);
        wp_enqueue_script(TENNIS_OPT_PREFIX . 'superfish', $dir . '/js/superfish.js', array('jquery'), NULL, TRUE);
        wp_enqueue_script(TENNIS_OPT_PREFIX . 'navgoco', $dir . '/js/jquery.navgoco.js', array('jquery'), NULL, TRUE);
        wp_enqueue_script(TENNIS_OPT_PREFIX . 'prettyPhoto', $dir . '/js/jquery.prettyPhoto.js', array('jquery'), NULL, TRUE);
        wp_enqueue_script(TENNIS_OPT_PREFIX . 'magnific-popup', $dir . '/js/jquery.magnific-popup.js', array('jquery'), NULL, TRUE);
        // wp_enqueue_script(TENNIS_OPT_PREFIX . 'fotorama', $dir . '/assets/fotorama/fotorama.js', array('jquery'), NULL, TRUE);
        wp_enqueue_script(TENNIS_OPT_PREFIX . 'flickr', $dir . '/js/jquery.flickr.js', array('jquery'), NULL, TRUE);
        wp_enqueue_script(TENNIS_OPT_PREFIX . 'custom', $dir . '/js/custom.js', array('jquery'), NULL, TRUE);

        if (is_singular()) {
            wp_enqueue_script('comment-reply');
        }

        if (is_page()) {
            wp_enqueue_script(TENNIS_OPT_PREFIX . 'maps-api', 'http://maps.google.com/maps/api/js?sensor=true', array('jquery'), NULL, TRUE);
            wp_enqueue_script(TENNIS_OPT_PREFIX . 'gmaps', $dir . '/js/gmaps.js', array('jquery', TENNIS_OPT_PREFIX . 'maps-api'), NULL, TRUE);
        }
    }
}

if (!function_exists('tennis_get_domain')) {

    function tennis_get_domain() {
        return constant('TENNIS_DOMAIN');
    }

}


if( isset($_POST['submit_post']) && !empty( $_POST['action'] ) &&  $_POST['action'] == "new_post") {


    if(!function_exists('wp_get_current_user')) {
        include_once(ABSPATH . "wp-includes/pluggable.php"); 
    }
    $term = array();
    $taxonomy = 'tournament-location';
    
    
    if (isset ($_POST['title'])) {
        $title =  $_POST['title'];
    }

    if (isset ($_POST['description'])) {
        $description = $_POST['description'];
    }
    

    // ADD THE FORM INPUT TO $new_post ARRAY
    $new_post = array(
        'post_title'    =>  $title,
        'post_content'  =>  $description,
        'post_status'   =>  'pending',           // Choose: publish, preview, future, draft, etc.
        'post_author'   =>  1,
        'post_type'     =>  'tournament'  //'post',page' or use a custom post type if you want to
    );

    //SAVE THE POST
    $post_id = wp_insert_post($new_post);

    if($post_id):

        if(isset($_POST['cat'])){

            $category = $_POST['cat'];

            
                $term[] = $value;

            wp_set_post_terms( $post_id, $term, $taxonomy );

        }


        if (isset($_POST['ten_from_date_tournament'])) {
            
            $from = $_POST['ten_from_date_tournament'];

            add_post_meta( $post_id, 'ten_from_date_tournament', $from);

        }


        if (isset($_POST['ten_location'])) {
            
            $from = $_POST['ten_location'];

            add_post_meta( $post_id, 'ten_location', $from);

        }

        if (isset($_POST['ten_to_date_tournament'])) {
            
            $to = $_POST['ten_to_date_tournament'];

            add_post_meta( $post_id, 'ten_to_date_tournament', $to);

        }

        if (isset($_POST['ten_organizer_name'])) {
            
            $organizer = $_POST['ten_organizer_name'];

            add_post_meta( $post_id, 'ten_organizer_name', $organizer);

        }

        if (isset($_POST['ten_ground_name'])) {
            
            $ground = $_POST['ten_ground_name'];

            add_post_meta( $post_id, 'ten_ground_name', $ground);

        }

        if (isset($_POST['ten_contact_number'])) {
            
            $ten_contact_number = $_POST['ten_contact_number'];

            add_post_meta( $post_id, 'ten_contact_number', $ten_contact_number);

        }


        if (isset($_POST['contact_name'])) {
            
            $contact_name = $_POST['contact_name'];

            add_post_meta( $post_id, 'ten_contact_name', $contact_name);

        }

        if (isset($_POST['contact_email'])) {
            
            $contact_email = $_POST['contact_email'];

            add_post_meta( $post_id, 'ten_contact_email', $contact_email);

        }


        $headers[] = 'From: tenniscricket<'.sanitize_email("admin@tenniscricket.in").'>';

        $message = 'Dear Site Admin,';
        $message .= 'A new tournament post submitted on your website <b>'. get_option( 'blogname' ).'</b><br /><br />';
        $message .= 'Post Title: '. sanitize_text_field($title) .'<br />';
        $message .= 'Post Content: '.sanitize_text_field($description).'<br />';
        $message .= 'Organizer: '.sanitize_text_field($organizer).'<br />';
        $message .= 'Organizer Email: '.sanitize_email($organizer_email).'<br />';
        $message .= 'Posted By: '.sanitize_email($contact_name).'<br />';
        $message .= 'Email: '.sanitize_email($contact_email).'<br />';
        $message .= 'post is waiting for your approval .<br /><br />';
        $message .= 'Thank you.<br /><br />';
        $message .= 'Kind regards<br />';
        $message .= 'tenniscricket.in'.get_option( 'blogname' ). '<br /><br />';
        
        $toID = get_option( 'admin_email' );

        add_filter( 'wp_mail_content_type', 'set_html_content_type' );
            if (!wp_mail( $toID, 'A New Tournament Post Submitted', $message, $headers )){
                remove_filter( 'wp_mail_content_type', 'set_html_content_type' );

                /*$pos = strpos($_POST['_wp_http_referer'], '?');

                if($pos === false){
                    $redirect = $_POST['_wp_http_referer']."?msg=success";
                    wp_redirect($redirect); exit;
                }else{
                    $redirect = $_POST['_wp_http_referer']."&msg=success";
                    wp_redirect($redirect); exit;
                }*/
                
            } else {
                remove_filter( 'wp_mail_content_type', 'set_html_content_type' );
                
                $redirect = $_POST['_wp_http_referer']."?msg=success";
                wp_redirect($redirect); exit;
            }

    endif;
    

    do_action('wp_insert_post', 'wp_insert_post');            

}

function set_html_content_type() {

    return 'text/html';
}





function tournament_filter($content) {
  
  $posts = $GLOBALS['post'];

  $post_id = $posts->ID;
  //$meta = get_post_meta( $posts->ID );

    if($posts->post_type == 'tournament'){

        $ten_organizer_email        = get_post_meta( $post_id, 'ten_organizer_email', true);
        $ten_from_date_tournament   = get_post_meta( $post_id, 'ten_from_date_tournament', true);
        $ten_to_date_tournament     = get_post_meta( $post_id, 'ten_to_date_tournament', true);
        $ten_ground_name            = get_post_meta( $post_id, 'ten_ground_name', true);
        $ten_organizer_name         = get_post_meta( $post_id, 'ten_organizer_name', true);
        $content                    = ''; 

        if (!empty($ten_from_date_tournament)) {

            $from = $ten_from_date_tournament;
            $content .= '<div class="terms-box clearfix">Tournament Start From :- <span>'.$from.'</span></div>';
        }


        if (!empty($ten_to_date_tournament)) {

            $to = $ten_to_date_tournament;
            $content .= '<div class="terms-box clearfix">Tournament End <span>'.$to.'</span></div>';
            
        }

        if (!empty($ten_organizer_name)) {

            $organizer = $ten_organizer_name;
            $content .= '<div class="terms-box clearfix">Organizer Name'.$organizer.'</div>';

        }

        if (!empty($ten_ground_name)) {

            $ground = $ten_ground_name;
            $content .= '<div class="terms-box clearfix">Ground Name'.$ground.'</div>';

        }

        

        if (!empty($ten_organizer_email)) {

            $organizer_email = $ten_organizer_email;
            $content .= '<div class="terms-box clearfix">Organizer Email'.$organizer_email.'</div>';
            

        }
    }
 
  // otherwise returns the database content
  return $content;
}

add_filter( 'the_content', 'tournament_filter' );