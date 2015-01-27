<?php
if (!class_exists('WPS_Tournament_Framewrok')) {

class WPS_Tournament_Framewrok
{
    function __construct()
    {
	add_action('init', array($this, 'wps_tournament_register'));
	add_action('init', array($this, 'wps_tournament_taxonomy'));	
	add_shortcode('show_tournaments', array($this, 'show_tournaments'));/*
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
	?>

		<div id="contact-box">
		    <h4>New Tournaments</h4>
		    <form id="contact-form" class="clearfix" action="" method="post" autocomplete="off" novalidate="novalidate" _lpchecked="1">
		        <div class="row clearfix">
		            <div class="col-md-6">
		                <p class="input-block">
		                    <label for="title" class="required">Title (<span>required</span>)</label>
		                    <input type="text" placeholder="" class="" id="title" name="title" />
		                </p>
						
						
						<p class="input-block">
		                    <label class="required">Location (<span>required</span>)</label>
		                    <?php wp_dropdown_categories( 'tab_index=10&taxonomy=tournament-location&hide_empty=0' ); ?>
		                </p>
						
						
						<p class="input-block">
		                    <label for="ten_from_date_tournament" class="required">From Date of Tournament (<span>required</span>)</label>
		                    <input type="text" placeholder="" class="" id="ten_from_date_tournament" name="ten_from_date_tournament" />
		                </p>
						
						<p class="input-block">
		                    <label for="ten_organizer_name" class="required">Organizer Name (<span>required</span>)</label>
		                    <input type="text" placeholder="" class="" id="ten_organizer_name" name="ten_organizer_name" />
		                </p>
						
						
						<p class="input-block">
		                    <label for="ten_ground_name" class="required">Ground Name (<span>required</span>)</label>
		                    <input type="text" placeholder="" class="" id="ten_ground_name" name="ten_ground_name" />
		                </p>
						
						<p class="input-block">
		                    <label for="ten_organizer_email" class="required">Organizer Email (<span>required</span>)</label>
		                    <input type="text" placeholder="" class="" id="ten_organizer_email" name="ten_organizer_email" />
		                </p>
						
						
		            </div>
					
		            <div class="col-md-6">
					
						<p class="input-block">
		                    <label for="title" class="required">Title (<span>required</span>)</label>
		                    <input type="text" placeholder="" class="" id="title" name="title" />
		                </p>
						
						<p class="input-block">
		                    <label for="title" class="required">Title (<span>required</span>)</label>
		                    <input type="text" placeholder="" class="" id="title" name="title" />
		                </p>
		                
		                <p class="input-block">
		                    <label for="contact_name" class="required">Name</label>
		                    <input type="text" placeholder="" class="" id="contact_name" name="contact_name">
		                </p>
						
						<p class="input-block">
		                    <label for="contact_email" class="required">Email (<span>required</span>)</label>
		                    <input type="text" placeholder="" class="" id="contact_email" name="contact_email">
		                </p>
						
		                <p class="textarea-block">
		                    <label for="description">Tournament Description and Notes</label>
		                    <textarea placeholder="" class="" id="description" name="description"></textarea>
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
			
	<?php
	}
	

    /*function my_action_javascript()
    {
    ?>
		<script type="text/javascript" >
		$( document ).ready(function() {
			console.log( "ready!" );
			$('#add-tournament').click(function() {
			    var data = {
				    't_action': 'add-tournament',
				    't_name': 'TDATA'
			    };
			    $.post('<?php echo home_url(); ?>/api', data, function(response) {
				    if(response.result == 'success') {
				    	$('#ajax-response').html('Action : ' + response.data.action + '<br>' + 'Tournament : ' + response.data.tournament_name);
				    } else {

				    }
			    });    
			});
		});			
		</script>
    <?php
    }

    function my_ajax() {
		$data = array('result'=>'success','message'=>'Ajax is called','data'=>array('ever1' =>$_POST['whatever'],'action1'=>$_POST['action']));
		wp_send_json_success($data);
    }

    function self_ajax() {
    	$action = '';
		if(isset($_POST['t_action'])) {
			$action = $_POST['t_action'];
		}
		switch ($action) {
			case 'add-tournament':
				$t_action = $_POST['t_action'];
				$t_name = $_POST['t_name'];
				$data = array(	'result'=>'success',
								'message'=>'Tournament added successfully.',
								'data'=>array('action'=>$t_action,'tournament_name'=>$t_name));
				break;
			
			default:
				$data = array(	'result'=>'error',
								'message'=>'Invalid action performed',
								'data'=>array());
				break;
		}
		wp_send_json($data);
    }*/
	
	
}

}
?>