<?php

        ob_start();

        extract(shortcode_atts(array(

            'dynamic_columns' => '',

            'portfolio_selected' => '',

            "style" => ''



        ), $atts));

        

        global $portfolio_p;

        global $themeple_config; 

        $output = '<div class="home_portfolio">';

        $portfolio_p = $portfolio_selected;

       

       



        if(isset($portfolio_p) && $portfolio_p != ''){

        $used_template_p = themeple_get_option_array('portfolio', 'portfolio_page', $portfolio_p, true); 

       

           }



       if(isset($used_template_p)){

            $used_template = $used_template_p; }

        

        $cats_port = array();

        if(isset($used_template['portfolio_cats']))

          $cats_port = $used_template['portfolio_cats'];

        

        $args = array(

        'taxonomy'  => 'portfolio_entries',

        'hide_empty'=> 0,

        'posts_per_page' => 2*$dynamic_columns,

        'include'   =>  $cats_port

            );

        $themeple_config['current_sidebar'] = 'fullsize';

        $categories = get_categories($args);

        

        if(count($categories) > 0){

        $output .='<!-- Portfolio Filter --><nav id="portfolio-filter" class="span12">';

           $output .= '<ul class="">';

             $output .= '<li class="active all"><a href="#"  data-filter="*">'.__('View All', 'themeple').'</a><span></span></li>';

                

            foreach($categories as $cat):

                

                   $output .= '<li class="other"><a href="#" data-filter=".'.$cat->category_nicename.'">'.$cat->cat_name.'</a><span></span></li>';    

                

            endforeach;

            

         $output .='</ul>';

     $output .= '</nav>';

       } 

     

       $themeple_config['current_portfolio']['portfolio_columns']  = $dynamic_columns;

        $grid = 'three-cols';

       switch($dynamic_columns){

        case '3':

            $grid = 'three-cols';

            break;

        case '2':

            $grid = 'two-cols';

            break;

        case '4':

            $grid = 'four-cols';

            break;

        case '1':

            $grid = 'one-cols';

            break;

    }

      

    $spancontent = 12;

       $output .= '<div class="row">';

       $output .='<section id="portfolio-preview-items" class="span12 '.$grid.' animate_onoffset">';
       wp_reset_query();
       
       query_posts( 'post_type=portfolio&posts_per_page='.(2*$dynamic_columns));

       get_template_part( 'template_inc/loop', $style);
       
       wp_reset_query();
       

       $output .= ob_get_clean();

       $output .= '</section>';

       $output .= '</div>';

       

       $output .= '</div>';

       echo $output;

?>