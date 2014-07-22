<?php
/*
Template Name: Archive
*/
global $themeple_config;
$themeple_config['multi_entry_page'] = true;
$themeple_config['current_sidebar'] = themeple_get_option('blog_sidebar_position');
$spancontent = 12;
    if($themeple_config['current_sidebar'] == 'fullsize')
        $spancontent = 12;
    else
        $spancontent = 9;
$themeple_config['current_view'] = 'blog';
get_header();
            $subtitle = themeple_post_meta(themeple_get_post_id(), 'page_header_desc');
            $title = get_the_title();
            $id = themeple_get_option('blogpage');
        ?>

    <!-- Page Head -->
    
   
   <?php if(themeple_post_meta($id, 'page_header_bool') == 'yes'): 
            $extra_class = '';
            $extra_style = '';
            if(themeple_post_meta($id, 'header_type') == 'image'){
                $extra_style .= 'background-image:url('.themeple_post_meta($id, 'background_image').');background-repeat: no-repeat;-webkit-background-size: cover;-moz-background-size: cover;-o-background-size: cover;background-size: cover; ';
                $extra_class .= ' background_image';
            }else if(themeple_post_meta($id, 'header_type') == 'color'){
                $extra_class .= ' colored_bg';
                $extra_style .= ' background:'.themeple_post_meta($id, 'color_pick').';';
            }

            if(themeple_post_meta($id, 'page_header_animated') == 'yes'){
                $extra_class .= ' animated_header';
            }
    ?>


   <div class="header_page <?php echo $extra_class ?>" style="<?php echo $extra_style ?>">
             <div class="animated_part"></div>
             <div class="container">
                <div class="row-fluid">
                    <div class="span6">
                        <h2><?php echo __('Archive', 'themeple'); ?></h2>
                    </div>
                    <div class="breadcrumbss">
                        
                        <ul class="page_parents pull-right">
                            <li><a href="<?php echo home_url() ?>"><?php echo __('Home', 'themeple'); ?></a></li>
                            
                         
                            <li class="active"><a href="<?php echo get_permalink() ?>"><?php single_month_title(' ');  ?></a></li>

                        </ul>
                    </div>
                </div>
            </div>
            
    </div> 
   
    
    <?php endif; ?>

<!-- End Page Head -->
    
<section id="content">
        <div class="container" id="blog">
            <div class="row">
    <?php if($themeple_config['current_sidebar'] == 'sidebar_left') get_sidebar() ?>   
        <div class="span<?php echo $spancontent ?>">
    <?php
        if($themeple_config['current_sidebar'] == 'fullsize'){
            get_template_part( 'template_inc/loop', 'blog-fullwidth' );
        }else
            get_template_part( 'template_inc/loop', 'index' );
    ?>

        </div>
<?php
    wp_reset_query();    
    
    if($themeple_config['current_sidebar'] == 'sidebar_right') get_sidebar();
?>

            </div>
        </div>
</section>
<?php
    get_footer();


?>