<?php

	extract(shortcode_atts(array(
            'title' => '',
            'icon_bool' => '',
            'icon_bool_pred' => '',
            'upload_img' => '',
            'icon' => '',
            'icon_color' => '',
            'dynamic_content_type' => '',
            'dynamic_post' => '',
            'dynamic_page' => '',
            'dynamic_content_content' => '',
            'dynamic_content_link' => '',
            'link_title' => ''
        ), $atts));

	$output = '<div class=" services_small wpb_content_element">';
        $icon_class = ((isset($icon_bool) && $icon_bool == 'yes')?'with_icon':'no_icon');
        $data = array();
        $data['link'] = '';
        $data['description'] = "";
        $query = array();
        if($dynamic_content_type == 'page'){
            $query = array( 'p' => $dynamic_page, 'posts_per_page'=>1, 'post_type'=> 'page' );
        }
        if($dynamic_content_type == 'post'){
            $query = array( 'p' => $dynamic_post, 'posts_per_page'=>1, 'post_type'=> 'post' );
        }
        if($dynamic_content_type == 'content'){
            $data['description'] = $dynamic_content_content;
            $data['link'] = $dynamic_content_link;
        }else{
            $loop = new WP_Query($query);
            if($loop->have_posts()){
                while($loop->have_posts()){
                    $loop->the_post();
                    
                    $data['link'] = get_permalink();
                    $data['description'] = get_the_excerpt();
                    
                }
            }
            wp_reset_query();
        }

        $output .= '<dl class="dl-horizontal">';
        $extra_class = '';
        $extra_style = '';
        $output .= '    <dt class="'.$extra_class.'" style="'.$extra_style.'">';
        if($icon_bool_pred == 'yes'){
            if($icon_color == 'base'){
                $icon_color = themeple_get_option('base_color');
                if(isset($_COOKIE['themeple_skin'])){

                    include(THEMEPLE_BASE.'/template_inc/admin/register_skins.php');

                    if(is_array($predefined[$_COOKIE['themeple_skin']]) && count($predefined[$_COOKIE['themeple_skin']]) > 0 ){
                        $icon_color = $predefined[$_COOKIE['themeple_skin']]['base_color'];
                    }
                 }
            }
            $icon_style = 'color:'.$icon_color.';';
            $output .= '<i class="'.$icon.'" style="'.$icon_style.'"></i>';
        }
        if(!isset($link_title)){
            $link_title = '';
        }
        $output .= '        ';
        $output .= '    </dt>';
        $output .= '    <dd><h3>'.$title.'</h3></dd>';
        $output .= '</dl>';
        $output .= '<div class="content pad-no">';
            $output .= '<div>'.do_shortcode($data['description']).'</div>';
            $output .= '<a href="'.$data['link'].'" class="link">'.$link_title.'</a>';
        $output .= '</div>';
        
        $output .= '</div>';
        echo $output;

?>