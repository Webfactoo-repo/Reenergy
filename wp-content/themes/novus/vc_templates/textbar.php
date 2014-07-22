<?php
		
		extract(shortcode_atts(array(
            'title' => '',
            'small_title' => '',
            'style' => '',
            'icon' => '',
            'button1_bool' => '',
            'button1_title' => '',
            'button1_link' => '',
            'light_version' => ''

        ), $atts));
		$fullwidth_class = '';
        $btn_class = "all_";
        $extra_class = '';
            if(isset($light_version) && $light_version == 'yes')
                $extra_class .= 'light_version';
            if(isset($style))
                $extra_class .= ' '.$style;
        $output = '<div class="textbar-container wpb_content_element '.$extra_class.'">';
            
            $output .= '<div class="textbar">';
                $class = '';
                if($style == 'with_icon'){
                    $output .= '<div class="icon_wrapper"><i class="'.$icon.'"></i></div>';
                    $output .= '<div class="text_wrapper">';
                }
                $output .= '<h3>'.do_shortcode($title).'</h3>';
                $output .= '<h6>'.$small_title.'</h6>';
                if(isset($button1_bool) && $button1_bool == 'yes')
                    $output .= '<a href="'.$button1_link.'" class="btn-system b2">'.$button1_title.'</a>';
                if($style == 'with_icon'){
                    $output .= '</div>';
                }
            
        $output .= '</div>';
        if($style == 'with_shadow')
            $output .= '<span class="shadow"></span>';
        $output .= '</div>';
        echo $output;

?>