<?php



	extract(shortcode_atts(array(

	  "type" => 'in_container',

	  'bg_image'=> '', 

	  'bg_position'=> '', 

	  'bg_repeat' => '', 

	  'parallax_bg' => '', 

	  'bg_color'=> '',

	  'overlay'=> '', 

	  'overlay_color'=> '',  

	  

	  'video_bg'=> '', 

	  'video_webm'=> '', 

	  'video_mp4'=> '', 

	  'link_id' => '',

	  "top_padding" => "0", 

	  "bottom_padding" => "0",

	  'text_color' => 'dark',  

	  'custom_text_color' => '',  

	  'transparency' => '',

	  'no_borders' => '',

	  'class' => ''), 

	$atts));

	

	wp_enqueue_style( 'js_composer_front' );

	wp_enqueue_script( 'wpb_composer_front_js' );

	

    $style = null;

	$etxra_class = null;

	$bg_im = '';

	if(!empty($bg_image)) {

			

		if(strpos($bg_image, "http://") !== false){

				
			if(!$parallax_bg){
				$style .= 'background-image: url('. $bg_image . '); ';

				$style .= 'background-position: '. $bg_position .'; ';
			}
			

			$bg_im = $bg_image;

		} else {

			$bg_image_src = wp_get_attachment_image_src($bg_image, 'full');

			
			if(!$parallax_bg){
				$style .= 'background-image: url('. $bg_image_src[0]. '); ';

				$style .= 'background-position: '. $bg_position .'; ';
			}
			

			$bg_im = $bg_image_src[0];

		}

		

		//for pattern bgs

		if(strtolower($bg_repeat) == 'repeat'){

			$style .= 'background-repeat: '. strtolower($bg_repeat) .'; ';

			$etxra_class = 'no-cover';

		} else {

			$style .= 'background-repeat: '. strtolower($bg_repeat) .'; ';

			$etxra_class = null;

		}

	}

	

	if(!empty($bg_color)) {

		$style .= 'background-color: '. $bg_color.'; ';

	}

	

	if(strtolower($parallax_bg) == 'true'){

		$parallax_class = 'parallax_section';

	} else {

		$parallax_class = '';

	}

	

	$style .= 'padding-top: '. $top_padding .'px !important; ';

	$style .= 'padding-bottom: '. $bottom_padding .'px !important; ';

	

	if($text_color == 'custom' && !empty($custom_text_color)) {

		$style .= 'color: '. $custom_text_color .'; ';

	}

	

	//main class

	if($type == 'in_container') {

		

		$main_class = "standard_section ";

		

	} else if($type == 'full_width_background'){

		

		$main_class = "section-style ";

		

	} else if($type == 'full_width_content'){

		

		$main_class = "full-width-content section-style ";

	}

	

	if($video_bg)

		$etxra_class .= ' video_section '; 

	 

	$video_markup = '';

	$overlay_markup = ''; 

	$parallax_markup = '';

	if($video_bg) {



		$video_markup = '<div class="video-wrap"><video id="video_background" preload="auto" autoplay="true" loop="loop" muted="muted" volume="0"> 

                                                                        <source src="'.$video_webm.'" type="video/webm"> 

                                                                        <source src="'.$video_mp4.'" type="video/mp4"> 

                                                      

                                                                        Video not supported </video></div>';

	

	} 



	if($overlay){

		$overlay_color = HexToRGB($overlay_color); 

		$overlay_markup = '<div class="bg-overlay" style="background:rgba('.$overlay_color['r'].', '.$overlay_color['g'].', '.$overlay_color['b'].', 0.7);"></div>';

	}
	$animate_onoffset = '';
	$animate_onoffset_c = '';
	if($parallax_bg){

		$parallax_markup = '<div class="parallax_bg"  style="background-image: url('.$bg_im.'); background-position: 50% 0px; background-attachment:fixed !important"></div>';
		$animate_onoffset_c = 'animate_onoffset';
	}else
		$animate_onoffset = 'animate_onoffset';

	if($type == 'in_container')

		echo '<div id="'.$link_id.'" class="container">'; 

	$transparency_markup = '';
	$transparency_class = '';
	if($transparency){
		$transparency_markup = '<span class="inner_shadow"></span><div class="transparency_bg"></div>';
		$transparency_class = 'transparency_section';
	}

	if($no_borders)
		$etxra_class .= ' no_borders ';


    echo'<div id="'.uniqid("fws_").' " class="wpb_row vc_row-fluid '.$transparency_class.' '.$animate_onoffset.' row-dynamic-el '. $main_class . $parallax_class . ' ' . $class . ' ' . $etxra_class.' " style="'.$style.'">';

	echo $transparency_markup;

    echo $parallax_markup;

	if($type != 'full_width_content')

		$cl_class = 'container';

	else

		$cl_class = 'col span_12';

	echo $video_markup;

	echo $overlay_markup;

    echo '<div class="'.$cl_class.' '.$animate_onoffset_c.' '.strtolower($text_color).'">';

    	

    	echo wpb_js_remove_wpautop($content);

    echo '</div>';

 echo '</div>';

 if($type == 'in_container')

 	echo '</div>';



?>