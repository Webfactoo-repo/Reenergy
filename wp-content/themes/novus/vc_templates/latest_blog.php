<?php 
        
        extract(shortcode_atts(array(
            'dynamic_title' => '',
            'dynamic_from_where' => '',
            "dynamic_cat" => ''

        ), $atts));
        $posts_per_page = 9999;
     
        

        $output = '<div class="latest_blog wpb_content_element">';
        $output .= '<div class="header">';
            $output .= '<h3>'.$dynamic_title.'</h3>';
            $output .= '<div class="pagination"><a href="#" class="prev"></a><a href="#" class="next"></a></div>';
        $output .=  '</div>';
       if($dynamic_from_where == 'all_cat'){
            $query_post = array('posts_per_page'=> -1, 'post_type'=> 'post'  );                          
        }else{
           $query_post = array('posts_per_page'=> -1, 'post_type'=> 'post', 'cat' => $dynamic_cat ); 
        }
            $size_span_class = '';
            
            $output .= '<div class="row">';
          $output .= '<ul class="carousel carousel_blog">';
                
                                            
                        $loop = new WP_Query($query_post);
                                     $i = 0;
                                     if($loop->have_posts()){
                                        while($loop->have_posts()){
                                            $loop->the_post();
                          $i++;
                                            $post_id = get_the_ID();      
                                                $post_format = get_post_format($post_id);

                                                if(strlen($post_format) == 0)
                                                    $post_format = 'standart';

                                                if($post_format == 'standart'){
            $icon_class="pencil";
            }elseif($post_format == 'audio'){
                $icon_class="music";
            }elseif($post_format == 'soundcloud'){
                $icon_class="music";
            }elseif($post_format == 'video'){
                $icon_class="play";
            }elseif($post_format == 'quote'){
                $icon_class="quote-left";
            }elseif($post_format == 'gallery'){
                $icon_class="images";
            }     

            $count = 0;

                                $comment_entries = get_comments(array( 'type'=> 'comment', 'post_id' => get_the_ID() ));

                                if(count($comment_entries) > 0){

                                    foreach($comment_entries as $comment){

                                        if($comment->comment_approved)

                                            $count++;

                                    }

                                }           $active = '';
                              if($i == 1)
                                $active = 'active'; 
                                                $output .= '<li class="blog-article '.$size_span_class.' '.$active.'">';

                                                $output .= ' <div class="row-fluid"><div class="span12"><div class="media">';


                                                 
                                                $output .= '<div class="he-wrap tpl2">';
                                                
                                                if($post_format == 'audio'){
                                                    
                                                    $output .= do_shortcode('[soundcloud]'.get_the_excerpt().'[/soundcloud]');




                                                }elseif($post_format == 'gallery'){

                                                      



                                                    $slider = new themeple_slideshow(get_the_ID(), 'flexslider');

                   

                                                    if($slider && $slider->slide_number > 0){

                                                        $slider->img_size = 'port4';
                                                        $sliderHtml = $slider->render_slideshow();
                                                        

                                                        $output .= $sliderHtml;

                                                    }





                                                }elseif($post_format == 'video'){



                                                   

                                                    $video = ""; if(themeple_backend_is_file( get_the_excerpt(), 'html5video'))

                                                    {

                                                        $video = themeple_html5_video_embed(get_the_excerpt());

                                                    }

                                                    else if(strpos(get_the_excerpt(),'<iframe') !== false)

                                                    {

                                                        $video = get_the_excerpt();

                                                    }

                                                    else

                                                    {

                                                        global $wp_embed;

                                                        $video = $wp_embed->run_shortcode("[embed]".trim(get_the_excerpt())."[/embed]");

                                                    }

                                                    

                                                    if(strpos($video, '<a') === 0)

                                                    {

                                                        $video = '<iframe src="'.get_the_excerpt().'"></iframe>';

                                                    } 

                                                    $output .= $video;

                                                    





                                                    } elseif(get_post_thumbnail_id()){

                                                

                                                        
                                                                $output .= '<img src="'.themeple_image_by_id(get_post_thumbnail_id(), 'port4', 'url').'" alt="">';
                                                                
                                                        
                                                    }
                                                    
                                                                    $output .= '<div class="overlay he-view">';
                                                                    $output .= '   <div class="bg a0" data-animate="fadeIn">';
                                                                    $output .= '        <div class="center-bar v1">';
                                                                    $output .= '            <a href="'.get_permalink().'" class="link a0" data-animate="zoomIn"><i class="moon-'.$icon_class.'"></i></a></a>';
                                                               
                                                               
                                                                    $output .= '        </div>';
                                                                    $output .= '    </div>';
                                                                    $output .= '</div>';
                                                        $output .= '</div>';   
                                                    
                                          
                               
                                
                                $output .= '</div></div></div>';

                                $output .= '<dl class="dl-horizontal">';
                                $output .= '    <dd>';
                                $output .= '        <h3><a href="'.get_permalink().'">'.get_the_title().'</a></h3>';
                                $output .= '        <ul class="info">';
                                                  
                                $output .= '            <li>'.$count.' '.__('Comments', 'themeple').'</li>';
                                $output .= '            <li>'.get_the_date().'</li>';
                                    
                                $output .= '        </ul>';
                                $output .= '    </dd>';
    
                                $output .= '</dl>';                                 
                                
                                $output .= '<div class="blog_content">'.themeple_text_limit(get_the_excerpt(), 28).'</div>';
                                                                       
                                $output .= '</li>';
                                           
                                            
                                        };
                                    };
                                    wp_reset_postdata();
                
                    $output .= '</ul>';       
            $output .= '</div>';

        $output .= '</div>';


        echo $output;
?>