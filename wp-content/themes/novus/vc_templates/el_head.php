<?php
		
		extract(shortcode_atts(array(
            'dynamic_title' => '',
            'pagination_bool' => ''

        ), $atts));

        $output = '';
	    if(!empty($dynamic_title)){
            $extra_style = '';
            $extra_class = '';
            
            $output = '<div class="header '.$extra_class.'" style="'.$extra_style.'"><h3>'.$dynamic_title.'</h3>';
            
            if($pagination_bool == 'yes'):
                $output .= '<div class="pagination"><a href="#" class="prev"></a><a href="#" class="next"></a></div>';
            endif;
            $output .= '</div>';
        }
        echo $output; 


?>