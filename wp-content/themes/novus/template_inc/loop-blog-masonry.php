<?php



global $themeple_config;



do_action('themeple_excecute_query_var_action','loop-index');

$categories = get_categories();

if(count($categories) > 0){

        echo '<!-- Portfolio Filter --><nav id="blog-filter" class="">';

            echo '<ul class="">';

                echo '<li class="active" data-category="cat-all">'.__('View All', 'themeple').'</li>';

                

            foreach($categories as $cat):

                

                    echo '<li class="" data-category="'.$cat->category_nicename.'">'.$cat->cat_name.'</li>';    

                

            endforeach;

            

            echo '</ul>';

            

        echo '</nav>';

    }

echo '<div class="blog_masonry">';

if (have_posts()) :



    $i = 0;



	while (have_posts()) : the_post();



        $grid_blog_columns = themeple_get_option('grid_blog_columns');





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

        $grid = array(array(632, 380), array(445, 170), array(445, 380), array(257, 380), array(351, 380), array(445, 170), array(257, 380), array(257, 380), array(257, 380), array(257, 380));

        $size_crop = array('seven_tw', 'five_tw_al', 'five_tw', 'one_fourth_al', 'one_third', 'five_tw_al', 'one_fouth', 'one_fouth', 'one_fouth', 'one_fouth');

        $captions = array('mega-landscape-left with_text', 'mega-landscape-left with_small_text', '', 'mega-portrait-top', '', 'mega-portrait-bottom', 'mega-portrait-top', '', 'mega-portrait-top', '' );



        $item_class = $grid[$i];



        $text_ = array('with_text', 'without_text');



        $text_class = $text_[rand(0,1)];



        $sort_classes = "cat-all ";

        $item_categories =get_the_category();

    

        if(is_object($item_categories) || is_array($item_categories))

        {

            foreach ($item_categories as $cat)

            {

                $sort_classes .= $cat->slug.' ';

            }

        }



        



        ?>



        



        <article id="post-<?php echo the_ID(); ?>" data-src="<?php echo themeple_image_by_id(get_post_thumbnail_id(), '', 'url') ?>" <?php echo post_class('blog-article mega-entry '.$text_class.' normal '.$sort_classes ); ?> data-width="<?php echo $item_class[0] ?>" data-height="<?php echo $item_class[1] ?>">                    



           

	     <?php if($post_format == 'standart'){

			$icon_class="pencil";

		    }elseif($post_format == 'audio'){

		    	$icon_class="music";

		    }elseif($post_format == 'soundcloud'){

		    	$icon_class="music";

		    }elseif($post_format == 'video'){

		    	$icon_class="play-3";

		    }elseif($post_format == 'quote'){

		    	$icon_class="quote-left";

		    }elseif($post_format == 'gallery'){

		    	$icon_class="image";

		    }elseif($post_format == 'image'){

                $icon_class="image";

            }else

                $icon_class="pencil";





	     ?>

		 

					<?php if(get_post_thumbnail_id()): ?>

                                        <?php if(!empty($captions[$i])): ?>

                                        <div class="mega-covercaption <?php echo $captions[$i] ?>">

                                            <h3><?php echo get_the_title() ?></h3>

                                            <ul class="info">

                                                  <li><?php _e('By', 'themeple') ?> <?php echo get_the_author() ?></li>

                                                  <li><?php echo $count ?> <?php _e('Comments', 'themeple') ?></li>

                                                  

                                            </ul>

                                            <?php if(strpos( $captions[$i], " ") !== FALSE): ?>

                                                <?php if(strpos($captions[$i], 'with_small_text') !== FALSE ){ ?>

                                                <p><?php echo themeple_text_limit(get_the_excerpt(), 10); ?></p>

                                                <?php }else{ ?>

                                                <p><?php echo get_the_excerpt() ?></p>



                                                <a href="<?php echo get_permalink() ?>" class="read_m"><?php _e('Read More', 'themeple') ?></a> 

                                                <?php } ?>

                                            <?php endif; ?>

                                        </div>

                                        <?php endif; ?>

                                        <ul class="bar_info">

                                                <li><i class="moon-calendar-4"></i><span><?php echo get_the_date() ?></span></li>

                                                <li><i class="moon-bubble"></i><span><?php echo $count ?></span></li>

                                                <li class="pull-right"><a href="<?php echo get_permalink() ?>"><i class="moon-forward"></i></a></li>



                                        </ul>

                                    

				    <?php  $i++; endif; ?>

                                

               

        </article>









                            



                    



                



        



        



        <?php



        if($wp_query->found_posts == $i)

            echo '</div>';



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