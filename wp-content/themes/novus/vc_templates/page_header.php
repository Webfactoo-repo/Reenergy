<?php



		extract(shortcode_atts(array(

            'title' => '',

            'small_title' => '',

            'second_title' => '',

            'color_title' => '',

            'size_title' => '',

            'color_small_title' => '',

            'size_small_title' => '',

            'color_second_title' => '',

            'size_second_title' => ''

        ), $atts)); 



        $output = '<div class="wpb_content_element dynamic_page_header">';

            if($small_title != '')

                $output .= '<h6 style="color:'.$color_small_title.';font-size:'.$size_small_title.'px">'.do_shortcode($small_title).'</h6>';  

            $output .= '<h1 style="color:'.$color_title.';font-size:'.$size_title.'px">'.do_shortcode($title).'</h1>';     

            if($second_title)

                $output .= '<h2 style="color:'.$color_second_title.';font-size:'.$size_second_title.'px">'.do_shortcode($second_title).'</h6>';  

        $output .= '</div>';

        echo  $output;



?>