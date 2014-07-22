<?php

	extract(shortcode_atts(array(
            'percent' => '',
            'type' => '',
            'text' => '',
            'icon' => '',
            'font_size' => '',
            'color' => ''
        ), $atts)); 
	$output = '<div class="wpb_content_element chart_skill animate_onoffset">';
        $base = themeple_get_option('base_color');
	 if(isset($_COOKIE['themeple_skin'])){

		include(THEMEPLE_BASE.'/template_inc/admin/register_skins.php');

		if(is_array($predefined[$_COOKIE['themeple_skin']]) && count($predefined[$_COOKIE['themeple_skin']]) > 0 ){
			$base = $predefined[$_COOKIE['themeple_skin']]['base_color'];
		}
	 }
        $output .= '<div class="chart" data-percent="'.$percent.'%" data-color="'.themeple_get_option('base_color').'" data-color2="'.themeple_get_option('second_color').'">';
        $ex_cl = '';
        if($color == 'base'){
            $color = themeple_get_option('base_color');
            $ex_cl = 'base';
        }
        if($type == 'icon'){
            $output .= '<i class="'.$icon.' '.$ex_cl.'" style="font-size:'.$font_size.';color:'.$color.';"></i>';
        }else
        if($type == 'text'){
            $output .= '<span class="text" style="font-size:'.$font_size.';color:'.$color.';">'.do_shortcode($text).'</span>';
        }

        $output .= '</div>';
       
        $output .= '<span class="new_color">'.$base.'</span>';
        
        
        $output .= '</div>';
        echo $output;

?>