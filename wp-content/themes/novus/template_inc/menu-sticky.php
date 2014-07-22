<?php if(themeple_get_option('sticky_menu') == 'yes'): ?>
    <div class="sticky_menu header_4">
        <div class="container">
            <div id="navigation" class="nav_top <?php echo $css_class ?>">
                <nav>
                <?php 
                    $args = array("theme_location" => "main", "container" => false, "fallback_cb" => 'themeple_fallback_menu');
                    wp_nav_menu($args);  
                ?>
                </nav>
            </div><!-- #navigation -->
           

             <!-- Search -->

            <?php $right_search = themeple_get_option('right_search');

                if($right_search == 'yes'): ?>

                    <div class="header_search">
                        <div class="right_search">
                            <i class="moon-search-2"></i>
                        </div>
                        <div class="right_search_container"><?php get_search_form(); ?> </div> 
                    </div>
                            <?php endif; ?>
                        <!-- End Search-->

        </div>
    </div>
<?php endif; ?>