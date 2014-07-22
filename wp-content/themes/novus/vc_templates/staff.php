<?php        
        extract(shortcode_atts(array(
            'staff' => ''

        ), $atts));
        $output = '';
        if(isset($staff)){
        $output .= '<div class="wpb_content_element">';
       
        $query_post = array( 'p' => $staff, 'posts_per_page'=>1, 'post_type'=> 'staff' );
        $additional_loop = new WP_Query($query_post);
        if($additional_loop->have_posts())
        {
            
            while ($additional_loop->have_posts())
            { 
                $additional_loop->the_post();
                
                
                $content = get_the_content();
                 
                 
                $featured = themeple_image_by_id(get_post_thumbnail_id(), array('width' => 1000, 'height' => 1000), 'url');
                $staff_position = themeple_post_meta(get_the_ID(), 'staff_position_');
                 $output .= '<div class="one-staff">';
                 
                            $output .= '<img src="'.$featured.'" alt="">';
                            $cl = '';
				
                            $output .= '<div class="content '.$cl.'"><h5>'.get_the_title().'</h5><span class="div"></span>';
                            $output .='<span class="position">'.$staff_position.'</span>';
               
				
                        
                            	$output .='<p>'.themeple_text_limit(get_the_content(), 9999).'</p>';
				
                
                              $output .= '<div class="social_widget">'; 
                                $output .= '<ul class="">';
                                if(themeple_post_meta(get_the_ID(), 'facebook_link') != '')
                                    $output .= '<li class="facebook"><a href="'.themeple_post_meta(get_the_ID(), 'facebook_link').'" title="Facebook"><i class="moon-facebook"></i></a></li>';
                                if(themeple_post_meta(get_the_ID(), 'twitter_link') != '')
                                    $output .= '<li class="twitter"><a href="'.themeple_post_meta(get_the_ID(), 'twitter_link').'" title="Facebook"><i class="moon-twitter"></i></a></li>';
                                if(themeple_post_meta(get_the_ID(), 'google_link') != '')
                                    $output .= '<li class="google_plus"><a href="'.themeple_post_meta(get_the_ID(), 'google_link').'" title="Facebook"><i class="moon-google_plus"></i></a></li>';
                                if(themeple_post_meta(get_the_ID(), 'pinterest_link') != '')
                                    $output .= '<li class="pinterest"><a href="'.themeple_post_meta(get_the_ID(), 'pinterest_link').'" title="Facebook"><i class="moon-pinterest"></i></a></li>';
                                if(themeple_post_meta(get_the_ID(), 'linkedin_link') != '')
                                    $output .= '<li class="linkedin"><a href="'.themeple_post_meta(get_the_ID(), 'linkedin_link').'" title="Facebook"><i class="moon-linkedin"></i></a></li>';
                                if(themeple_post_meta(get_the_ID(), 'mail_link') != '')
                                    $output .= '<li class="main"><a href="'.themeple_post_meta(get_the_ID(), 'mail_link').'" title="Facebook"><i class="moon-mail"></i></a></li>';
                                

                                $output .= '</ul>';
                            $output .= '</div>';
                        $output .= '</div>';
                 $output .= '</div>';
                
            }
            
        }
        
        $output .= '</div>';
        wp_reset_query();
        }
    
        echo $output;
?>