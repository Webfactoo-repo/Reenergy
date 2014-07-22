<?php

global $themeple_config;
$themeple_config['multi_entry_page'] = true;
$themeple_config['current_sidebar'] = themeple_get_option('blog_sidebar_position');
$spancontent = 12;

if(isset($_COOKIE['themeple_blog']) && $_COOKIE['themeple_blog'] == 'sidebar' )
    $themeple_config['current_sidebar'] = 'sidebar_right';
    if($themeple_config['current_sidebar'] == 'fullsize')
        $spancontent = 12;
    else
        $spancontent = 9;
    $blog_page = themeple_get_option('blogpage');
    
$themeple_config['current_view'] = 'blog';
$cookie_blog = 'normal';
$cookie_sidebar = 'fullsize';
if(isset($_COOKIE['themeple_blog']) && $_COOKIE['themeple_blog'] != '')
	$cookie_blog = $_COOKIE['themeple_blog'];
if(isset($_COOKIE['themeple_sidebar']) && $_COOKIE['themeple_sidebar'] != ''){
	
	$cookie_sidebar = $_COOKIE['themeple_sidebar'];
	if($cookie_sidebar == 'none')
		$spancontent = 12;
}


get_header();

?>
 <?php
            
            $title = get_the_title();
            $page_parents = page_parents();
            $blog_style = themeple_get_option('blog_style');
            $subtitle = themeple_post_meta(themeple_get_post_id(), 'page_header_desc');
        ?>
   
    <?php if(themeple_post_meta(themeple_get_post_id(), 'page_header_bool') == 'yes'): 
            $extra_class = '';
            $extra_style = '';
            if(themeple_post_meta(themeple_get_post_id(), 'header_type') == 'image'){
                $extra_style .= 'background-image:url('.themeple_post_meta(themeple_get_post_id(), 'background_image').');background-repeat: no-repeat;-webkit-background-size: cover;-moz-background-size: cover;-o-background-size: cover;background-size: cover; ';
                $extra_class .= ' background_image';
            }else if(themeple_post_meta(themeple_get_post_id(), 'header_type') == 'color'){
                $extra_class .= ' colored_bg';
                $extra_style .= ' background:'.themeple_post_meta(themeple_get_post_id(), 'color_pick').';';
            }

            if(themeple_post_meta(themeple_get_post_id(), 'page_header_animated') == 'yes'){
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

<section id="content">

    	<div class="container" id="blog">
        	<div class="row">
    <?php if(($themeple_config['current_sidebar'] == 'sidebar_left' && !isset($_COOKIE['themeple_sidebar'])) || (isset($_COOKIE['themeple_sidebar']) && $_COOKIE['themeple_sidebar'] == 'left' )) get_sidebar() ?>   
        <div class="span<?php echo $spancontent ?>">
    <?php
        if(( $blog_style == 'grid' && !isset($_COOKIE['themeple_blog'])) || (isset($_COOKIE['themeple_blog']) && $_COOKIE['themeple_blog'] == 'grid' )){
           
            get_template_part( 'template_inc/loop', 'blog-grid' );
           
        }elseif(( $blog_style == 'second' && !isset($_COOKIE['themeple_blog'])) || (isset($_COOKIE['themeple_blog']) && $_COOKIE['themeple_blog'] == 'second' )){
            get_template_part( 'template_inc/loop', 'blog-second-style' );
        }elseif(( $blog_style == 'masonry' && !isset($_COOKIE['themeple_blog'])) || (isset($_COOKIE['themeple_blog']) && $_COOKIE['themeple_blog'] == 'masonry' )){
            get_template_part( 'template_inc/loop', 'blog-masonry' );
        }else
            get_template_part( 'template_inc/loop', 'index' );
    ?>

        </div>
<?php
    wp_reset_query();    
    
    if(($themeple_config['current_sidebar'] == 'sidebar_right'  && !isset($_COOKIE['themeple_sidebar'])) || (isset($_COOKIE['themeple_sidebar']) && $_COOKIE['themeple_sidebar'] == 'right' )) get_sidebar();
?>

            </div>
        </div>
</section>

<?php
    get_footer();


?>