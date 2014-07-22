<?php

get_header();

?>

<!-- Page Head -->
  <?php if(themeple_post_meta(themeple_get_option('blogpage'), 'page_header_bool') == 'yes'): 
            $extra_class = '';
            $extra_style = '';
            if(themeple_post_meta(themeple_get_option('blogpage'), 'header_type') == 'image'){
                $extra_style .= 'background-image:url('.themeple_post_meta(themeple_get_option('blogpage'), 'background_image').');background-repeat: no-repeat;-webkit-background-size: cover;-moz-background-size: cover;-o-background-size: cover;background-size: cover; ';
                $extra_class .= ' background_image';
            }else if(themeple_post_meta(themeple_get_option('blogpage'), 'header_type') == 'color'){
                $extra_class .= ' colored_bg';
                $extra_style .= ' background:'.themeple_post_meta(themeple_get_option('blogpage'), 'color_pick').';';
            }

            if(themeple_post_meta(themeple_get_option('blogpage'), 'page_header_animated') == 'yes'){
                $extra_class .= ' animated_header';
            }
    ?>
    <!-- Page Head -->
    <?php  ?>
   <div class="header_page <?php echo $extra_class ?>" style="<?php echo $extra_style ?>">
             <div class="animated_part"></div>
             <div class="container">
                <div class="row-fluid">
                    <div class="span6">
                        <h3><?php _e('404 - Not Found', 'themeple'); ?></h3>
                    </div>
                    <div class="breadcrumbss">
                        
                        <ul class="page_parents pull-right">
                            <li><a href="<?php echo home_url() ?>">Home</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            
    </div> 
   
    
    <?php endif; ?>
 


   
	    <section id="content">
	    	<div class="row-fluid row-dynamic-el" style=" margin-bottom:100px;">

                 <div class="container">

                      <div class="row-fluid">

                         <div class="row-fluid row-dynamic-el " style="">

                                 <div class="container">

                                       <div class="row-fluid">
                                                
                                          <div class="span12 dynamic_page_header not_found_error">

                                                    
                                                          <h1><?php _e('oops! 404 Error Page', 'themeple') ?></h1>
                                                          <div class="right_search_container">
                                                            <?php get_search_form(); ?>
                                                          </div>

                                                   
                                         </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                 </div>
               </div>

	    </section>
	
<?php
get_footer();


?>