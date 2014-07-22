<?php
global $themeple_config;

get_header();

$themeple_config['current_sidebar'] = themeple_get_option('single_portfolio_sidebar_pos');
$title = get_the_title();

$metas = themeple_portfolio_custom_field(get_the_ID());
    $cats = wp_get_object_terms(get_the_ID(), 'portfolio_entries');

    $used_template = themeple_get_option_array('portfolio', 'portfolio_cats', $cats[0]->term_id, true);
    
    $title = get_the_title();
    
    $page_parents = page_parents();
    $subtitle = themeple_post_meta(get_the_ID(), 'desc');        
        ?>

   
    <!-- Page Head -->
    
    
    <!-- Page Head -->

    <!-- Page Head -->
    
    <?php if(themeple_post_meta($used_template['portfolio_page'], 'page_header_bool') == 'yes'): 
            $extra_class = '';
            $extra_style = '';
            if(themeple_post_meta($used_template['portfolio_page'], 'header_type') == 'image'){
                $extra_style .= 'background-image:url('.themeple_post_meta($used_template['portfolio_page'], 'background_image').');background-repeat: no-repeat;-webkit-background-size: cover;-moz-background-size: cover;-o-background-size: cover;background-size: cover; ';
                $extra_class .= ' background_image';
            }else if(themeple_post_meta($used_template['portfolio_page'], 'header_type') == 'color'){
                $extra_class .= ' colored_bg';
                $extra_style .= ' background:'.themeple_post_meta($used_template['portfolio_page'], 'color_pick').';';
            }

            if(themeple_post_meta($used_template['portfolio_page'], 'page_header_animated') == 'yes'){
                $extra_class .= ' animated_header';
            }
    ?>

    <?php  ?>
   <div class="header_page <?php echo $extra_class ?>" style="<?php echo $extra_style ?>">
             <div class="animated_part"></div>
             <div class="container">
                <div class="row-fluid">
                    <div class="span6">
                        <h3><?php echo $title ?></h3>
                    </div>
                    <div class="breadcrumbss">
                        
                        <ul class="page_parents pull-right">
                            <li><a href="<?php echo home_url() ?>">Home</a></li>
                            
                            <?php for($i = count($page_parents) - 1; $i >= 0; $i-- ){ ?>

                            <li><a href="<?php echo get_permalink($page_parents[$i]) ?>"><?php echo get_the_title($page_parents[$i]) ?> </a></li>

                            <?php }  ?>
                            <li class="active"><a href="<?php echo get_permalink() ?>"><?php echo $title ?></a></li>

                        </ul>
                    </div>
                </div>
            </div>
            
    </div> 
   
    
    <?php endif; ?>
     
    
   
    
    

<!-- Main Content -->
   
    <section id="content">
    	
        <?php $themeple_config['port_base_id'] = $used_template['portfolio_page']; if(have_posts()){ while (have_posts()) : the_post(); ?>
        
                <div class="row-fluid">
                    <div class="span12 portfolio_single" data-id="<?php echo get_the_ID() ?>">
                        <?php if( (isset($_COOKIE['portfolio_single']) && $_COOKIE['portfolio_single'] != 'wide') || ($used_template['portfolio_single_style'] != 'wide' && !isset($_COOKIE['portfolio_single']) ) ): ?>
                        <div class="container">
				        <?php endif; ?>
                        <?php if(isset($_COOKIE['portfolio_single'])){
                            
					           get_template_part('template_inc/loop', 'single_portfolio_'.$_COOKIE['portfolio_single']);
				        }else{
				    
                            if($used_template['portfolio_single_style'] == 'bottom')
                                get_template_part('template_inc/loop', 'single_portfolio_bottom');
                            else if($used_template['portfolio_single_style'] == 'left')
                                get_template_part('template_inc/loop', 'single_portfolio_left');
                            else if($used_template['portfolio_single_style'] == 'wide')
                                get_template_part('template_inc/loop', 'single_portfolio_wide');
                            else   
                                get_template_part('template_inc/loop', 'single_portfolio_right');
                         }
				?> 
                        <?php if( (isset($_COOKIE['portfolio_single']) && $_COOKIE['portfolio_single'] != 'wide') || ($used_template['portfolio_single_style'] != 'wide' && !isset($_COOKIE['portfolio_single']) ) ): ?>
                        </div>
                        <?php endif; ?>
                         <?php

                        $used = themeple_post_meta($used_template['portfolio_dynamic_page']);
                        if(isset($used['layout'])){
                            $genDynamic = new GenerateDynamicTemplate($used['layout']);

                            $themeple_config['current_view'] = 'page';
                            $genDynamic->createView(); 
                            ?>
                            <section id="portfolio-single-widget-area">
                                
                                    <?php
                                    $genDynamic->display();
                                    ?>
                                
                            </section>   
                        <?php } ?>

                    </div>
                </div>


                
        <?php endwhile; } ?>
            
       
    </section><!-- #content -->    
<?php get_footer() ?>