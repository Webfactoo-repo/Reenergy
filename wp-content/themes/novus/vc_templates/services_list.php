<?php
		
		extract(shortcode_atts(array(
            'dynamic_title' => '',
            'icon' => ''
        ), $atts)); 

        $output = '<div class="wpb_content_element services_list" style="">';       
            $output .= '<dl class="dl-horizontal">';
                $output .= '<dt><i class="'.$icon.'"></i></dt>';
                $output .= '<dd>';
                    $output .= '<h3>'.$dynamic_title.'</h3>';
                    $output .= '<ul>';
                    	$output .= "\n\t\t\t\t".wpb_js_remove_wpautop($content);
                    $output .= '</ul>';
                $output .= '</dd>';
            $output .= '</dl>';
        $output .= '</div>';

        echo $output;

?>