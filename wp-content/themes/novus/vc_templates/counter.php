<?php

		 extract(shortcode_atts(array(
		 	'number' => 50, 
		 	'text' => 'Default', 
		 	'speed' => 2000, 
		 	'color'=>'', 
		 	'prepend' => '', 
		 	'postpend' => ''), 
		 $atts));
         $color_timer = '#555';
         $color_text = '#555';
         if($color == 'base'){
            $base_color = themeple_get_option('base_color');
         
            if(isset($_COOKIE['themeple_skin'])){

                include(THEMEPLE_BASE.'/template_inc/admin/register_skins.php');

                if(is_array($predefined[$_COOKIE['themeple_skin']]) && count($predefined[$_COOKIE['themeple_skin']]) > 0 ){
                    $base_color = $predefined[$_COOKIE['themeple_skin']]['base_color'];
                }
            }
            $color_timer = $base_color;
            $color_text = $base_color;
         }else{
            $color_timer = $color;
            $color_text = $color;
         }
         $output = '<div class="count_to animate_onoffset style_1"  >';
            $output .= '<span class="timer_span"><span style="color:'.$color_timer.'; '.$line_height.'">'.$prepend.'</span><span style="color:'.$color_timer.'; '.$line_height.'" class="timer" data-from="0" data-to="'.$number.'" data-speed="'.$speed.'"></span><span style="color:'.$color_timer.'; '.$line_height.'">'.$postpend.'</span></span>';
            $output .= '<span style="color:'.$color_text.'" class="text">'.$text.'</span>';
         $output .= '</div>';
         echo $output;

?>