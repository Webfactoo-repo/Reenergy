<?php
		
		extract(shortcode_atts(array(
            'title' => '',
            'desc' => ''
        ), $atts)); 
        
       

		$output = '<div class="wpb_content_element block_skill">';
        
        if(!empty($title)){
         	$output .= '<div class="header"><h3>'.$title.'</h3></div>';      
        }

        if(!isset($desc)) $desc = '';
        	$output .= '<p>'.$desc.'</p>';

        $output .= "\n\t\t\t\t".wpb_js_remove_wpautop($content);

        $output .= '</div>';
        echo  $output;


?>