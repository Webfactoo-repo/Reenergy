<?php
global $themeple_config;
do_action('themeple_excecute_query_var_action','loop-single_portfolio_right');
//$metas = themeple_portfolio_custom_field(get_the_ID());
$metas = themeple_post_meta(get_the_ID());
$output = '';
?>


<?php
global $themeple_config;
do_action('themeple_excecute_query_var_action','loop-single_portfolio_right');
//$metas = themeple_portfolio_custom_field(get_the_ID());
$metas = themeple_post_meta(get_the_ID());
$output = '';
?>


<div class="row-fluid single_content">
                     <div class="header">
                            <div class="navigations">
                                <?php if(is_object(get_previous_post())): ?>
                                    <a class="prev" href="<?php echo get_permalink(get_previous_post()->ID); ?>"><?php _e('Previous Post', 'themeple'); ?></a>
                                <?php endif; ?>
                                <?php if(is_object(get_next_post())): ?>
                                    <a class="next" href="<?php echo get_permalink(get_next_post()->ID); ?>"><?php _e('Next Post', 'themeple'); ?></a>
                                <?php endif; ?>
                            </div>    
                     </div>   
    <div class="row-fluid"   style="margin-top:80px;">
            <div class="span8 slider_full">
            <?php $slider = new themeple_slideshow(get_the_ID(), 'flexslider');
                       
                                      if($slider && $slider->slide_number > 0){
                          $slider->img_size = 'portfolio_side';
                                            $sliderHtml = $slider->render_slideshow();
                                            echo $sliderHtml;
                                      }
                       

             ?>
            </div>
            <div class="span4">
                <div class="row-fluid row-dynamic-el">
                    <div class="span12 about_project">
                        <h5><?php _e("About Project", 'themeple') ?></h5><p class="content"><?php echo get_the_content() ?></p>
                       
                    </div>
                </div>
                <div class="row-fluid row-dynamic-el">
                   <div class="span12 single_content"> 
                         <h5><?php _e('Project Details', 'themeple') ?></h5>
                                <div id="project_details">
                                    <?php   $op_metas = themeple_get_option('portfolio-meta');
                                    
                                        $nr_metas = count($op_metas); ?>

                                        <ul>    
                                            <?php for($i = 0; $i < $nr_metas; $i++): ?>
                                                <li class="details">
                                                   
                                                     <span class="title"><?php echo $op_metas[$i]['meta'] ?>  :</span>
                                              
                                                
                                                  
                                                      <?php if(isset($metas['meta_'.($i+1)])) { ?>
                                                     <span class="details_content"> <?php echo do_shortcode($metas['meta_'.($i+1)]) ?><?php } ?></span>
                                                </li>        
                                                    
                                                                       
                                             <?php endfor; ?>
                                        </ul>

                                </div>
                
                    </div>
            </div>
            
        </div>

</div>