<?php

		

		extract(shortcode_atts(array(

            

            'testimon' => ''



    	), $atts));

		$output = ''; 

        

        $output = '<div class="wpb_content_element">';

        

        if(!isset($testimon))

        $testimon = 0;          

        $query_post = array('posts_per_page'=> 9999, 'post_type'=> 'testimonial', 'p' => $testimon );                          

          

        $loop = new WP_Query($query_post);

                     if($loop->have_posts()){



                        while($loop->have_posts()){

                            

                            $loop->the_post();  



                            $output .= '<div class="single_testimonial"><dl class="dl-horizontal"><dt><img src="'.themeple_image_by_id(get_post_thumbnail_id(), 'great_gallery', 'url').'" alt=""></dt><dd>';

                            $output .= '<h6>'.get_the_title().', </h6><span class="position"> '.themeple_post_meta(get_the_ID(), 'staff_position_').'</span>';

                            $output .= '<span class="dt">'.get_the_date().'</span>';

                            $output .= '<p>'.get_the_content().'</p>';

                            $output .= '</dd></dl></div>';

                       

                                    

                        }

                    }

        wp_reset_query();

        

        $output .= '</div>';



        echo $output;

?>