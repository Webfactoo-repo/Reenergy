<?php
	
		extract(shortcode_atts(array(
            'title' => ''
        ), $atts)); 

        $output = '<li>'.$title.'</li>';

        echo $output;

?>