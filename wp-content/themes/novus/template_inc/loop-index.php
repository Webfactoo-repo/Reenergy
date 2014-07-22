<?php

global $themeple_config;

do_action('themeple_excecute_query_var_action','loop-index');

$avatar_bool = themeple_get_option('avatar_bool');
if(isset($_COOKIE['authimg']) && !empty($_COOKIE['authimg']) )
    $avatar_bool = $_COOKIE['authimg'];

if (have_posts()) :



	while (have_posts()) : the_post();



        $post_id    = get_the_ID();

        $title   	= get_the_title();

        $content 	= get_the_content();

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

        

        <article id="post-<?php echo the_ID(); ?>" <?php echo post_class('row-fluid blog-article v1 normal'); ?>>                    

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
            }


	     ?>
		 
					<?php if($post_format == 'audio' || $post_format == 'gallery' || $post_format == 'video' || get_post_thumbnail_id()): ?>
                                <div class="row-fluid">

                                    <div class="span12">

                                        <div class="media">
                                             <?php if(!is_single()): ?>
							                 <div class="he-wrap tpl2">
                                             <?php endif; ?>
                                            <?php if($post_format == 'audio'){ ?>

                                                


                                                <?php echo do_shortcode('[soundcloud]'.get_the_excerpt().'[/soundcloud]'); ?>





                                            <?php }elseif($post_format == 'gallery'){ ?>

                                                  

                                                

                                                  <?php $slider = new themeple_slideshow(get_the_ID(), 'flexslider');

               

                                                  if($slider && $slider->slide_number > 0){
                                                        $slider->img_size = 'blog';
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

                                           


                                                
                                                            <img src="<?php echo themeple_image_by_id(get_post_thumbnail_id(), 'blog', 'url') ?>" alt="">
                                                        
                                            <?php } ?>
                                                
                                                <?php if(!is_single()): ?>
                                                <div class="overlay he-view">   <div class="bg a0" data-animate="fadeIn">        <div class="center-bar v1">            <a href="<?php echo get_permalink() ?>" class="link a0" data-animate="zoomIn"><i class="moon-<?php echo $icon_class ?>"></i></a>        </div>    </div></div>
                                                
                                            
                                                </div>
                                                <?php endif; ?>        
                                        </div>
                                    </div>
                                </div>
				    <?php endif; ?>
                                <div class="row-fluid">
                                    <div class="span12">
                                        <div class="content post_format_<?php echo $post_format ?>" >
                                            <?php $ex_class = ''; if($avatar_bool == 'yes'): $ex_class = 'with_avatar' ?>
                                            <?php echo get_avatar(get_the_author_meta('ID')) ?>
                                            <?php endif; ?>
                                            <div class="top_c <?php echo $ex_class ?>">
                                                <h1><a href="<?php echo get_permalink() ?>"><?php echo get_the_title() ?></a></h1>
                                                
                                              
                                                    
    							                <?php $tags = get_the_tags(); ?>
                                                <?php $tag_out = ''; $num=count($tags); $i=0; if($tags) foreach($tags as $tag): if(++$i === $num){$tag_out .= $tag->name;} else {$tag_out .= $tag->name.', ';}  endforeach; ?>
    							   
                                
                                                
                                                    

                                            
                                                <ul class="info">
                                                  
                                                  <li><?php echo $count ?> <?php _e('Comments', 'themeple') ?> / </li> 
                                                  <li><?php echo get_the_date() ?> / </li> 
                                                  <li><?php _e('by', 'themeple') ?> <?php echo get_the_author() ?> / </li> 
                                                  <?php if(!empty($tag_out) ): ?>
                                                  <li><?php echo $tag_out ?> / </li>
                                                  <?php endif; ?>     
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

                                                                        echo get_the_excerpt();
                                                                    
                                                                    
                                                                    
                                                        } ?>
                                            </div>
                                            
                                            <?php if(is_single()): ?>
                                            <?php 

                                                $item_categories =get_the_category();
                                                
                                                $ctag = '';
                                                if(is_object($item_categories) || is_array($item_categories))
                                                {
                                                    foreach ($item_categories as $cat)
                                                    {
                                                        $ctag .= '<a href="" class="ctag">'.$cat->slug.'</a>';
                                                    }
                                                 }
                                                if(is_object($tags) || is_array($tags)){
                                                    
                                                    foreach ($tags as $tag)
                                                    {
                                                        $ctag .= '<a href="" class="ctag">'.$tag->name.'</a>';
                                                    }
                                                }
                                               


                                            ?>
                                            <div class="tags_social">
                                                <div class="pull-left">

                                                <?php 
                                                $meta_bool= themeple_get_option('meta_bool');
                                                    if($meta_bool == 'yes'){
                                                      echo $ctag ;
                                                     }?>

                                                </div>
                                                <div class="pull-right">
                                                <?php 
                                                     $sharing_bool = themeple_get_option('sharing_bool');

                                                     if ($sharing_bool == 'yes'){ ?>
                                                    <span class="share_title"><?php _e("Share This Story", 'themeple') ?></span>
                                                    <?php 
                                                       
                                                          $google_plus_shares = '<a href="https://plus.google.com/share?url='.get_permalink().'" target="_blank">'; 
                                                          $facebook_shares = '<a href="http://www.facebook.com/sharer.php?u='.get_permalink().'" target="_blank">';
                                                          $twitter_shares = '<a href="http://twitter.com/home?status='.get_the_title().' '.get_permalink().'" target="_blank">';
                                                          $linkedin_shares = '<a href="http://linkedin.com/shareArticle?mini=true&amp;url='.get_permalink().'&title='.get_the_title().'" target="_blank">';
                                                          $reddit_shares = '<a href="http://reddit.com/submit?url='.get_permalink().'&title='.get_the_title().'" target="_blank">';
                                                          $tumblr_shares = '<a href="http://www.tumblr.com/share/link?url='.get_permalink().'&name='.get_the_title().'&description='.get_the_content().'" target="_blank">';
                                                          $pinterest_shares ='<a href="http://pinterest.com/pin/create/button/?url='.get_permalink().'&description='.get_the_title().'&media='.wp_get_attachment_url(get_post_thumbnail_id()).'" target="_blank">';
                                                          $digg_shares ='<a href="http://www.digg.com/submit?url='.get_permalink().' " target="_blank">';
                                                          $mail_shares = '<a href="mailto:?subject='.get_the_title().'&body='.get_permalink().'">'; ?>


                                                <div class="social_widget">
                                                    <ul class="shares">
                                                        
                                                        <?php $social_icons = themeple_get_option('social_icons');
                                                              

                                                         ?>       
                                                        <?php $i = 0; if(!empty($social_icons))  foreach($social_icons as $icon): if(isset($icon['social']) && $icon['sharebutton'] == 'yes' ): $i++; ?>
                                                                
                                                            <?php    $link_shares = ${$icon['social'].'_shares'}; ?>

                                                             <li class="<?php echo $icon['social'] ?>"><?php echo $link_shares; ?><i class="moon-<?php echo $icon['social'] ?>"></i></a></li>

                                                        <?php endif; if($i == 10) break; endforeach; ?>

                                                    </ul>
                                                </div>    
                                                    <?php } ?>
                                                </div>
                                            </div>

                                            <?php endif; ?>                                          
                                            
                                        </div>
                                        
                                        <?php if(!is_single()): ?>
                                        <a href="<?php echo get_permalink() ?>" class="read_m"><?php _e('Read More', 'themeple') ?></a>
                                        <?php endif; ?>
                                    </div>
                                </div>
                </div>
        </article>




                            

                    

                

        

        

        <?php



    endwhile; ?>
    <?php if(!is_single()): ?>
    <div class="p_pagination">
    
        <?php themeple_pagination(); ?>
        <div class="pull-right">
            <div class="nav-previous"><?php next_posts_link( 'Next Page' ); ?></div>
            <div class="nav-next"><?php previous_posts_link( 'Previous Page' ); ?></div>
        </div>
    </div>
    <?php endif; ?>
<?php endif;

?>