<?php

class bValidator
{
	function __construct()
	{
		add_action( 'wp_enqueue_scripts', array($this,'bvalidator_enqueue_scripts'));	
		add_shortcode('binitform', array($this,'bvalidator_init_form'));
		
	}
	
	function bvalidator_enqueue_scripts() 
	{
		wp_enqueue_style( 'bvalidator-css', plugins_url( '../css/bvalidator.css' , __FILE__ ) );
		wp_enqueue_script( 'bvalidator-js', plugins_url( '../js/jquery.bvalidator.js' , __FILE__ ));	
	}

	function bvalidator_init_form($atts)
	{
		extract( shortcode_atts( array(
		  'formid' => '',
		), $atts ) );

		$bvalidator_init = '';
		if($formid)		
		{
			$bvalidator_init .= '<script type="text/javascript">';
			$bvalidator_init .= 'jQuery(document).ready(function () {';
			$bvalidator_init .= '	var option = { offset:     {x:-200, y:-6} };';
			$bvalidator_init .= "	jQuery('#" . $formid . "').bValidator(option);";
			$bvalidator_init .= '});';
			$bvalidator_init .= '</script>';
		}
		return $bvalidator_init;
	}

	
}
new bValidator;
?>