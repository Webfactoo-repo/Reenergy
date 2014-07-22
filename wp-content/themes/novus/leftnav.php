<?php
/*
Template Name: Left Navigation
*/
global $themeple_config;
$themeple_config['multi_entry_page'] = true;

$themeple_config['current_view'] = 'page';
$post_id = themeple_get_post_id();
$used_template = themeple_post_meta($post_id);
if(!empty($used_template['layout'])){
	$genDynamic = new GenerateDynamicTemplate($used_template['layout']);
	$genDynamic->createView();
}
get_header();
?>
  <?php
            
            $title = get_the_title();
            $page_parents = page_parents();
            $subtitle = themeple_post_meta(themeple_get_post_id(), 'page_header_desc');
        ?>

    <?php if(themeple_post_meta(themeple_get_post_id(), 'page_header_bool') == 'yes'): 
            $extra_class = '';
            $extra_style = '';
            if(themeple_post_meta(themeple_get_post_id(), 'header_type') == 'image'){
                $extra_style .= 'background:url('.themeple_post_meta(themeple_get_post_id(), 'background_image').') center no-repeat;';
                $extra_class .= ' background_image';
            }else if(themeple_post_meta(themeple_get_post_id(), 'header_type') == 'color'){
                $extra_class .= ' colored_bg';
                $extra_style .= ' background:'.themeple_post_meta(themeple_get_post_id(), 'color_pick').';';
            }
    ?>
    <!-- Page Head -->
    <?php  ?>
   <div class="header_page <?php echo $extra_class ?>" style="<?php echo $extra_style ?>">
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
<section id="content" class="left-navigation">
        <div class="container" id="page">
            <div class="row">
                    <div class="span3">
                            <ul class="side-nav">
                                <?php if(is_page('$post->post_parent')): ?><?php endif; ?>
                                <li <?php if(is_page($post->post_parent)): ?>class="current_page_item"<?php endif; ?>><a href="<?php echo get_permalink($post->post_parent); ?>" title="Back to Parent Page"><?php echo get_the_title($post->post_parent); ?></a></li>
                               
                            <?php
                                  if($post->post_parent) {
                                  $children = wp_list_pages("title_li=&child_of=".get_post_top_ancestor_id()."&echo=0");
                              
                                  }else{
                                  $children = wp_list_pages("title_li=&child_of=".$post->ID."&echo=0");
                                 
                                  }
                                  if ($children) { ?>

                               
                                  <ul>
                                  <?php echo $children; ?>
                                  </ul>

                            <?php } ?>



                    </div>

                    <div class="span9">
			   <?php if(isset($genDynamic))	
            				$genDynamic->display();
        			  else
                        		the_content() 
			   ?>
                    </div>

            </div>
        </div>
</section>
<?php
    get_footer();


?>