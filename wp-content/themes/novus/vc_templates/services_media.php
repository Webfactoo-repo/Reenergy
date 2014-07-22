<?php        
        
        extract(shortcode_atts(array(
            'title' => '',
            'type' => '',
            'photo' => '',
            'video' => '',
            'link' => ''  
        ), $atts));   
        $output = '<div class="wpb_content_element services_media">';

        
        if($type == 'img'){
            if(!empty($photo)) {
            
                if(strpos($photo, "http://") !== false){
                    $photo = $photo;
                } else {
                    $bg_image_src = wp_get_attachment_image_src($photo, 'port_2');
                    $photo = $bg_image_src[0];
                }
            }
            $output .= '<img src="'.$photo.'" alt="" />';
        }
	   
	    else
        if($type == 'video'){
            if(isset($video)){
                global $wp_embed;
                $output .= $wp_embed->run_shortcode('[embed]'.trim($video).'[/embed]');
            }
        }
        $output .= '<div class="overlay">';
            $output .= '<h4><a href="'.$link.'">'.$title.'</a></h4>';
            $output .= '<p>'.do_shortcode($content).'</p>';
        $output .= '</div>';
        $output .= '</div>';
        echo $output;
?>