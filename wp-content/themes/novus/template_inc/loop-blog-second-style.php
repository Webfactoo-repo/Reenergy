<?php

global $themeple_config;

do_action('themeple_excecute_query_var_action','loop-index');

$avatar_bool = themeple_get_option('avatar_bool');
if(isset($_COOKIE['authimg']) && !empty($_COOKIE['authimg']) )
    $avatar_bool = $_COOKIE['authimg'];

if (have_posts()) :



    while (have_posts()) : the_post();



        $post_id    = get_the_ID();

        $title      = get_the_title();

        $content    = get_the_content();

        $content    = str_replace(']]>', ']]&gt;', apply_filters('the_content', $content ));

                

        $post_format = get_post_format($post_id);

        if(strlen($post_format) == 0)

            $post_format = 'standart';

        $count = 0;

        $comment_entries = get_comments(array( 'type'=> 'comment', 'post_id' => $post->ID ));

        if(count($comment_entries) > 0){

            foreach($comment_entries as $comment){

                if($comment->comment_approved)

                    $count++;

            }

        }

        ?>

        

        <article id="post-<?php echo the_ID(); ?>" <?php echo post_class('row-fluid blog-article v2 normal'); ?>>                    

            <div class="span12">
	     <?php if($post_format == 'standart'){
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
		    	$icon_class="image";
		    }elseif($post_format == 'image'){
                $icon_class="images";
            }else
                $icon_class="pencil";


	     ?>
		 
					<?php if($post_format == 'audio' || $post_format == 'gallery' || $post_format == 'video' || get_post_thumbnail_id()): ?>
                               
                                    <div class="span6">

                                        <div class="media">
							                 <?php if(!is_single()): ?>
                                             <div class="he-wrap tpl2">
                                             <?php endif; ?>
                                            <?php if($post_format == 'audio'){ ?>

                                                


                                                <?php echo do_shortcode('[soundcloud]'.get_the_excerpt().'[/soundcloud]'); ?>





                                            <?php }elseif($post_format == 'gallery'){ ?>

                                                  



                                                  <?php $slider = new themeple_slideshow(get_the_ID(), 'flexslider');

               

                                                  if($slider && $slider->slide_number > 0){
                                                        $slider->img_size = 'port1_list';
                                                        $sliderHtml = $slider->render_slideshow();

                                                        echo $sliderHtml;

                                                  }?>





                                            <?php }elseif($post_format == 'video'){ ?>



                                               

                                                <?php $video = ""; if(themeple_backend_is_file( get_the_excerpt(), 'html5video'))

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

                                                echo $video;

                                                ?>
						  
							
							

					         
							
                                            <?php } elseif(get_post_thumbnail_id()){ ?>

                                           


                                                
                                                <img src="<?php echo themeple_image_by_id(get_post_thumbnail_id(), 'port1_list', 'url') ?>" alt="">
                                                
                                            <?php } ?>
                                            <?php if(!is_single()): ?>
                                                <div class="overlay he-view">   <div class="bg a0" data-animate="fadeIn">        <div class="center-bar v1">            <a href="<?php echo get_permalink() ?>" class="link a0" data-animate="zoomIn"><i class="moon-<?php echo $icon_class ?>"></i></a>        </div>    </div></div>
                                                
                                            
                                                </div>
                                                <?php endif; ?> 
                                        </div>
                                    </div>
                                
				    <?php endif; ?>
                                
                                    <div class="span6">
                                        <div class="content post_format_<?php echo $post_format ?>" >
                                            <?php $ex_class = ''; if($avatar_bool == 'yes'): $ex_class = 'with_avatar' ?>
                                            <?php echo get_avatar(get_the_author_meta('ID')) ?>
                                            <?php endif; ?>
                                            <div class="top_c <?php echo $ex_class ?>">
                                                <h1><a href="<?php echo get_permalink() ?>"><?php echo get_the_title() ?></a></h1>
                                                
                                              
                                                    
                                                <?php $tags = get_the_tags(); ?>
                                                <?php $tag_out = ''; if($tags) foreach($tags as $tag): $tag_out .= $tag->name.', ';  endforeach; ?>
                                   
                                
                                                
                                                    

                                            
                                                <ul class="info">
                                                  
                                                  <li><?php echo $count ?> <?php _e('Comments', 'themeple') ?></li>
                                                  <li><?php echo get_the_date() ?></li>
                                                  
                                                  <li><a href="<?php echo get_permalink() ?>"><?php _e('Leave a comment', 'themeple') ?></a></li> 
                                                </ul>
                                            </div>
                               
                            
                                            <div class="blog-content">        
                                                        <?php if(is_single()){ ?>

                                                                    <?php the_content() ?>

                                                        <?php }else{

                                                                    if($post_format == 'video' || $post_format == 'audio')

                                                                        echo themeple_content(50);

                                                                    else

                                                                        echo themeple_text_limit(get_the_excerpt(), 40);
                                                                    
                                                                    
                                                                    
                                                        } ?>
                                            </div> 
                                            <a href="<?php echo get_permalink() ?>" class="read_m"><?php _e('Read More', 'themeple') ?></a>                                        
                                            
                                        </div>
                                        
                                   
                                </div>
                </div>
        </article>




                            

                    

                

        

        

        <?php



    endwhile; ?>

    <div class="p_pagination">
    
        <?php themeple_pagination(); ?>
        <div class="pull-right">
            <div class="nav-previous"><?php next_posts_link( 'Next Page' ); ?></div>
            <div class="nav-next"><?php previous_posts_link( 'Previous Page' ); ?></div>
        </div>
    </div>

<?php endif;

?>