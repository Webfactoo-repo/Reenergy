<?php
        extract(shortcode_atts(array(
           
        ), $atts));
        $output = '<div class="fullwidth_portfolio animate_onoffset" id="portfolio-preview-items">';
        $output .= '<div class="swiper-container swiper-parent swiper_slider" data-slidenr="5">';
            $output .= '<div class="swiper-wrapper">';
        $args = array( 'post_type' => 'portfolio', 'posts_per_page' => 10, 'orderby' =>'date','order' => 'DESC' );
        $loop = new WP_Query( $args );
        while ( $loop->have_posts() ) : $loop->the_post(); 
        $sort_classes = "";
        $item_categories = get_the_terms( $the_id, 'portfolio_entries' );
    
        if(is_object($item_categories) || is_array($item_categories))
        {
            foreach ($item_categories as $cat)
            {
                $sort_classes .= $cat->slug.' ';
            }
        }
                $output .= '<div class="swiper-slide portfolio-item v2  layout-full swiper-slide-visible" style="">';
                $output .= '    <div class="he-wrap tpl2">';
                $output .= '        <img src="'.themeple_image_by_id(get_post_thumbnail_id(), 'port2', 'url').'" alt="" />';
                $output .= '        <div class="overlay he-view">';
                $output .= '            <div class="bg a0" data-animate="fadeIn">';
                $output .= '                <div class="center-bar v1">';
                $output .= '                    <a href="'.themeple_image_by_id(get_post_thumbnail_id(), array("width"=> 1200, "height" => 1200), "url").'" class="link a0 lightbox-gallery lightbox" data-animate="zoomIn"><i class="moon-search-3"></i></a></a>';
                $output .= '                    <a href="'.get_permalink().'" class="link a0" data-animate="zoomIn"><i class="moon-link-4"></i></a></a>';
                $output .= '                    <h3 class="a1" data-animate="fadeInUp">'.get_the_title().'</h3>';
                $output .= '                    <span class="cat a2" data-animate="fadeInUp">'.$sort_classes.'</span>';
                                                    
                $output .= '                 </div>';
                $output .= '             </div>';
                                             
                $output .= '        </div>';   

                $output .= '    </div>';
                $output .= '</div>';
        endwhile;
            $output .= '</div>';
        $output .= '</div>';
        $output .= '</div>';
        echo $output;
?>