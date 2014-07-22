<?php
	
	extract(shortcode_atts(array(
           
            'style' => ''

        ), $atts));
	if(!isset($style))
            $style = 'solid_border';
        $output = '<div class="divider__ '.$style.'"></div>';

    echo $output;

?>