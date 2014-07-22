<?php
        
        extract(shortcode_atts(array(
            'dynamic_title' => '',
            'style' => '',
            "posts_per_page" => '', 
            "dynamic_from_where" => '', 
            'dynamic_cat' => ''

        ), $atts));
        $output = '<div class="recent_news wpb_content_element">';
        if(!empty($dynamic_title)){
            $output .= '<div class="header"><h3>'.$dynamic_title.'</h3>';
            $output .= '</div>';
        }
        if($dynamic_from_where == 'all_cat'){
            $query_post = array('posts_per_page'=> $posts_per_page, 'post_type'=> 'post' );                          
        }else{
           $query_post = array('posts_per_page'=> $posts_per_page, 'post_type'=> 'post', 'cat' => $dynamic_cat ); 
        }
        

            $output .= '<div class="row-fluid">';
                $output .= '<div class="span12">';
                    	   
                        
                        $loop = new WP_Query($query_post);
                                    
                                     if($loop->have_posts()){
                                        while($loop->have_posts()){
                                            $loop->the_post();     
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
		    						$icon_class="play-circle";
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

                                }
                                           

                                               $output .= '<dl class="news-article blog-article style_'.$style.' dl-horizontal">';
                                                    $output .= '<dt>';

                                                    if($style == 'image')
                                                        $output .= '    <img src="'.themeple_image_by_id(get_post_thumbnail_id(), 'great_gallery', 'url').'" alt="">';
                                                    if($style == 'icon')
                                                        $output .= '<i class="moon-'.$icon_class.'"></i>';
                                                    
                                                    $output .= '</dt>';   
                                                    $output .= '<dd>';
                                                        
                                                        $output .= '<h3><a href="'.get_permalink().'">'.get_the_title().'</a></h3>';
                                                        $output .= '        <ul class="info">';
                                                  
                                                        $output .= '            <li>'.$count.' '.__('Comments', 'themeple').'</li>';
                                                        $output .= '            <li>'.get_the_date().'</li>';
                                                            
                                                        $output .= '        </ul>';
                                                        $output .= '<div class="blog-content">';        
                                                        $output .=              themeple_text_limit(get_the_excerpt(), 24);

                                                                   
                                                        $output .= '        </div>'; 
                                                        
                                               $output .= '</dl>'; 

                                            
                                           
                                            
                                        };
                                    };
                                    wp_reset_postdata();
                    $output .= '</div>';       
                
                
                


                
            $output .= '</div>';
        
        

        $output .= '</div>';


        echo $output;
        
?>