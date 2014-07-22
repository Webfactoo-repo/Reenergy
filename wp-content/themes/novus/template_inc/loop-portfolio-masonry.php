<?php

global $themeple_config;

global $portfolio_p;

do_action('themeple_excecute_query_var_action', 'loop-portfolio-grid');

$count_portfolio = 0;

$nr_columns = 3;

if(!isset($portfolio_p) || empty($portfolio_p))

	$portfolio_p = get_the_ID();

if(have_posts()){

    $item_grid_class = '';

    

    if(isset($themeple_config['current_portfolio']['portfolio_columns'])){

        $nr_columns = $themeple_config['current_portfolio']['portfolio_columns'];

    }

    

    switch($nr_columns){

        case "1": $item_grid_class = 12; break;

        case "2": $item_grid_class = 6; break;

        case "3": $item_grid_class = 4; break;

        case "4": $item_grid_class = 3; break;

    }

    if($themeple_config['current_sidebar'] != 'fullsize')

            $item_grid_class = round( ($item_grid_class*3) / 4);

    

    if((isset($themeple_config['used_for_element']) && !$themeple_config['used_for_element']) || !isset($themeple_config['used_for_element'])){

    ?>

    

                    <div class="row filterable">

    

    <?php

    }

    $the_id = 0;

    $loop_counter = 0;





    if(isset($portfolio_p) && $portfolio_p != '')

        $used_template_p = themeple_get_option_array('portfolio', 'portfolio_page', $portfolio_p, true); 









    while (have_posts()) : the_post();	

	

		$loop_counter++;

    	$the_id 	= get_the_ID();

    	$metas = themeple_post_meta($the_id);

    	$sort_classes = "";

    	$item_categories = get_the_terms( $the_id, 'portfolio_entries' );

    

    	if(is_object($item_categories) || is_array($item_categories))

    	{

    		foreach ($item_categories as $cat)

    		{

    			$sort_classes .= $cat->slug.' ';

    		}

    	}



        $cats = wp_get_object_terms(get_the_ID(), 'portfolio_entries');

       if((isset($themeple_config['used_for_element']) && !$themeple_config['used_for_element']) || !isset($themeple_config['used_for_element'])){

            if(!isset($used_template_p))

                $used_template = themeple_get_option_array('portfolio', 'portfolio_cats', $cats[0]->term_id, true); 

            

            $portfolio_style = 'v1';

            

            if(isset($used_template_p)){

                

                $used_template = $used_template_p;

                $portfolio_style = $used_template['portfolio_style'];

                

            }

        }else{

            $portfolio_style = $themeple_config['dynamic_portfolio']['portfolio_style'];

        }

            

	

       ?>

      

       <!-- Portfolio Normal Mode -->

       <?php if($portfolio_style == 'v1'){ ?>

    <!-- item -->

	                    <div class="portfolio-item <?php echo $sort_classes ?> <?php echo $portfolio_style ?>" data-id="<?php echo get_the_ID() ?>">

                                        <div class="he-wrap tpl2">

                                        <?php if($item_grid_class == 3){ ?>

                                            <img src="<?php echo themeple_image_by_id(get_post_thumbnail_id(), '', 'url') ?>" alt="">

                                            <div class="shape4"></div>

                                        <?php } ?>

                                        <?php if($item_grid_class == 4){ ?>

                                            <img src="<?php echo themeple_image_by_id(get_post_thumbnail_id(), '', 'url') ?>" alt="">

                                            <div class="shape3"></div>

						 <?php } ?>

                                        <?php if($item_grid_class == 6){ ?>

                                            <img src="<?php echo themeple_image_by_id(get_post_thumbnail_id(), '', 'url') ?>" alt="">

                                            <div class="shape2"></div>

						<?php } ?>

                                        <?php if($item_grid_class == 12){ ?>

                                            <img src="<?php echo themeple_image_by_id(get_post_thumbnail_id(), '', 'url') ?>" alt="">

                                       	  <div class="shape"></div>	

						 <?php } ?>

                                       <div class="overlay he-view">

                                            <div class="bg a0" data-animate="fadeIn">

                                                <div class="center-bar v1">

                                                    <a href="<?php echo get_permalink() ?>" class="link a0" data-animate="zoomIn"></a></a>

                                                    <h4><?php echo get_the_title() ?></h4>

                                                    <span class="cat"><?php echo $sort_classes ?></span>

                                                </div>

                                            </div>

                                             

                                        </div>   

                                            

                                            

                                                

                                     </div>          

                                        

                                           

	                    </div>

            <?php }else if($portfolio_style == 'v2'){ ?>

              <div class="portfolio-item <?php echo $sort_classes ?> <?php echo $portfolio_style ?>" data-id="<?php echo get_the_ID() ?>">

                                        <div class="he-wrap tpl2">

                                        <?php if($item_grid_class == 3){ ?>

                                            <img src="<?php echo themeple_image_by_id(get_post_thumbnail_id(), '', 'url') ?>" alt="">

                                            <div class="shape4"></div>

                                        <?php } ?>

                                        <?php if($item_grid_class == 4){ ?>

                                            <img src="<?php echo themeple_image_by_id(get_post_thumbnail_id(), '', 'url') ?>" alt="">

                                            <div class="shape3"></div>

                         <?php } ?>

                                        <?php if($item_grid_class == 6){ ?>

                                            <img src="<?php echo themeple_image_by_id(get_post_thumbnail_id(), '', 'url') ?>" alt="">

                                            <div class="shape2"></div>

                        <?php } ?>

                                        <?php if($item_grid_class == 12){ ?>

                                            <img src="<?php echo themeple_image_by_id(get_post_thumbnail_id(), '', 'url') ?>" alt="">

                                          <div class="shape"></div> 

                         <?php } ?>

                                       <div class="overlay he-view">

                                            <div class="bg a0" data-animate="fadeIn">

                                                <div class="center-bar v1">

                                                    

                                                    <h4><?php echo get_the_title() ?></h4>

                                                    <span class="cat"><?php echo $sort_classes ?></span>

                                                    <p><?php echo themeple_text_limit(get_the_excerpt(), 16) ?></p>

                                                    <a href="<?php echo get_permalink() ?>" class="link a0"><?php _e('Read More','themeple') ?></a>

                                                </div>

                                            </div>

                                             

                                        </div>   

                                            

                                            

                                                

                                     </div>          

                                        

                                           

                        </div>







            <?php }else if($portfolio_style == 'v3'){ ?>



                 <div class="portfolio-item <?php echo $sort_classes ?> <?php echo $portfolio_style ?>" data-id="<?php echo get_the_ID() ?>">

                                        <div class="he-wrap tpl2">

                                        <?php if($item_grid_class == 3){ ?>

                                            <img src="<?php echo themeple_image_by_id(get_post_thumbnail_id(), '', 'url') ?>" alt="">

                                            <div class="shape4"></div>

                                        <?php } ?>

                                        <?php if($item_grid_class == 4){ ?>

                                            <img src="<?php echo themeple_image_by_id(get_post_thumbnail_id(), '', 'url') ?>" alt="">

                                            <div class="shape3"></div>

                         <?php } ?>

                                        <?php if($item_grid_class == 6){ ?>

                                            <img src="<?php echo themeple_image_by_id(get_post_thumbnail_id(), '', 'url') ?>" alt="">

                                            <div class="shape2"></div>

                        <?php } ?>

                                        <?php if($item_grid_class == 12){ ?>

                                            <img src="<?php echo themeple_image_by_id(get_post_thumbnail_id(), '', 'url') ?>" alt="">

                                          <div class="shape"></div> 

                         <?php } ?>

                                       <div class="overlay he-view">

                                            <div class="bg a0" data-animate="fadeIn">

                                                <div class="center-bar v1">

                                                    <a href="<?php echo themeple_image_by_id(get_post_thumbnail_id(), array("width"=> 1200, "height" => 1200), "url") ?>" class="link a0 lightbox-gallery lightbox" data-animate="zoomIn"><i class="moon-search-3"></i></a></a>

                                                    <a href="<?php echo get_permalink() ?>" class="link a0" data-animate="zoomIn"><i class="moon-link-4"></i></a></a>

                                                </div>

                                            </div>

                                             

                                        </div>   

                                            

                                            

                                                

                                     </div>          

                                        

                                           

                        </div>



            <?php } ?>

        <!-- Portfolio Normal Mode End -->

       

        





      















<?php



    

    endwhile;

    

    if((isset($themeple_config['used_for_element']) && !$themeple_config['used_for_element']) || !isset($themeple_config['used_for_element'])){

            echo '</div>';

        }

}

if((isset($themeple_config['used_for_element']) && !$themeple_config['used_for_element']) || !isset($themeple_config['used_for_element'])){

?>

<div class="p_pagination">

    

    <?php themeple_pagination(); ?>

    <div class="pull-right">

        <div class="nav-previous"><?php next_posts_link( 'Next Page' ); ?></div>

        <div class="nav-next"><?php previous_posts_link( 'Previous Page' ); ?></div>

    </div>

</div>

<?php } ?>