<?php
if (!class_exists('WPS_Tournament_Framewrok')) {

class WPS_Tournament_Framewrok
{
    function __construct()
    {
	add_action('init', array($this, 'wps_tournament_register'));
	add_action('init', array($this, 'wps_tournament_taxonomy'));	
	add_shortcode('show_tournaments', array($this, 'show_tournaments'));
	add_shortcode('tournaments_list', array($this, 'show_tournament_list'));
	/*
	add_action( 'wp_footer', array($this,'my_action_javascript'));	
	add_shortcode('self_ajax', array($this, 'self_ajax'));*/
    }

    function wps_tournament_register()
    {
	$labels = array(
		'name' => _x("Tournament", "post type general name"),
		'singular_name' => _x("Tournament", "post type singular name"),
		'menu_name' => 'Tournaments',
		'add_new' => _x("New Tournament", "tournament item"),
		'add_new_item' => __("Add New Tournament"),
		'edit_item' => __("Edit Tournament"),
		'new_item' => __("New Tournament"),
		'view_item' => __("View Tournament"),
		'search_items' => __("Search Tournaments"),
		'not_found' =>  __("No Tournament Found"),
		'not_found_in_trash' => __("No Tournament Found in Trash"),
		'parent_item_colon' => ''
	);
	
	register_post_type('tournament' , array(
		'labels' => $labels,
		'public' => true,
		'has_archive' => false,
		'menu_icon' => plugin_dir_path( __FILE__ ) . '/images/posttype/trophy.png',
		'rewrite' => array( 'slug' => 'tournament' ),
		'supports' => array('title', 'thumbnail','editor')
	) );
	flush_rewrite_rules();
    }

    function wps_tournament_taxonomy() 
    {
	$singular = 'Tournament Location';
	$plural = 'Tournament Locations';
	$labels = array(
		'name' => _x( $plural, "taxonomy general name"),
		'singular_name' => _x( $singular, "taxonomy singular name"),
		'search_items' =>  __("Search $singular"),
		'all_items' => __("All $singular"),
		'parent_item' => __("Parent $singular"),
		'parent_item_colon' => __("Parent $singular:"),
		'edit_item' => __("Edit $singular"),
		'update_item' => __("Update $singular"),
		'add_new_item' => __("Add New $singular"),
		'new_item_name' => __("New $singular Name"),
	);
    
	register_taxonomy( 'tournament-location', 'tournament', array(
		'public' => true,
		'show_ui' => true,
		'show_in_nav_menus' => true,
		'hierarchical' => true,
		'query_var' => true,
		'rewrite' =>  array( 'slug' => 'tournament-location' ),
		'labels' => $labels
	) );
    }



    function show_tournaments() 
	{	
		
		if(isset($_GET['msg']) && $_GET['msg'] == 'success'){

			?>

			<div class="success-msg" style="width:100%; clear:both;">

				<h2>Thanks For Submitting Tournaments<br />We will contact you soon.</h2>

			</div>

			<?php

		}else{

			$this->tournaments_form();
		
		}
	}
	


	function tournaments_form(){

			?>
			<div id="contact-box">
			    <h4>New Tournaments</h4>
			    <form id="tournament-form" class="clearfix" action="" method="post" autocomplete="off">
			        <div class="row clearfix">
			            <div class="col-md-6">
			                <p class="input-block">
			                    <label for="title" class="required">Title (<span>required</span>)</label>
			                    <input type="text" placeholder="" class="" id="title" name="title" data-bvalidator="required" />
			                </p>
							
							
							<p class="input-block">
			                    <label class="required">Location (<span>required</span>)</label>
			                    <?php wp_dropdown_categories( 'tab_index=10&taxonomy=tournament-location&hide_empty=0' ); ?>
			                </p>
							
							
							<p class="input-block">
			                    <label for="ten_from_date_tournament" class="required">From Date of Tournament (<span>required</span>)</label>
			                    <input type="text" placeholder="" class="datepicker" id="ten_from_date_tournament" name="ten_from_date_tournament" data-bvalidator="date[dd.mm.yyyy],required" />
			                </p>


			                <p class="input-block">
			                    <label for="ten_to_date_tournament" class="required">To Date of Tournament  (<span>required</span>)</label>
			                    <input type="text" placeholder="" class="datepicker" id="ten_to_date_tournament" name="ten_to_date_tournament" data-bvalidator="date[dd.mm.yyyy],required" />
			                </p>
							
							
							
							
							<p class="input-block">
			                    <label for="ten_ground_name" class="required">Ground Name (<span>required</span>)</label>
			                    <input type="text" placeholder="" class="" id="ten_ground_name" name="ten_ground_name" data-bvalidator="required" />
			                </p>


							
			            </div>
						
			            <div class="col-md-6">
						
							
							<p class="input-block">
			                    <label for="ten_organizer_name" class="required">Organizer Name (<span>required</span>)</label>
			                    <input type="text" placeholder="" class="" id="ten_organizer_name" name="ten_organizer_name" data-bvalidator="required" />
			                </p>

			                <p class="input-block">
			                    <label for="ten_organizer_email" class="required">Organizer Email (<span>required</span>)</label>
			                    <input type="text" placeholder="" class="" id="ten_organizer_email" name="ten_organizer_email" data-bvalidator="email,required" />
			                </p>
							
			                
			                <p class="input-block">
			                    <label for="contact_name" class="required">Name</label>
			                    <input type="text" placeholder="" class="" id="contact_name" name="contact_name" data-bvalidator="required" />
			                </p>
							
							<p class="input-block">
			                    <label for="contact_email" class="required">Email (<span>required</span>)</label>
			                    <input type="text" placeholder="" class="" id="contact_email" name="contact_email" data-bvalidator="email,required" />
			                </p>

			                <p class="textarea-block">
			                    <label for="description">Tournament Description and Notes</label>
			                    <textarea placeholder="" class="" id="description" name="description" data-bvalidator="required"></textarea>
			                </p>
							
			                
			            </div>
			        </div>
			        
			        <div class="clear"></div>
			        <p class="contact-button">
			            <input type="hidden" name="action" value="new_post" />
						<?php wp_nonce_field( 'new-post' ); ?>
			            <input type="submit" name="submit_post" id="submit" class="btn" value="Submit Post">
			        </p>
			    </form>
			</div>
			
			<?php echo do_shortcode('[binitform formid="tournament-form"]'); ?>

		<?php
	}

    
    function show_tournament_list($atts){


    	extract( shortcode_atts( array(
		  	'post_type' 		=> 'tournament',
			'posts_per_page' 	=> 10,
			'post_parent' 		=> 1,
			'category_name' 	=> '',
			'offset' 			=>  0
		), $atts ) );

    	$args = array(
  			'post_type' 		=> $post_type,
  			'posts_per_page' 	=> $posts_per_page,
		);

    	query_posts( $args );

    }
	
	
}

}
?>