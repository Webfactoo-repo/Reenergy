<?php
global $themeple_config;

if ( ! isset( $content_width ) ) $content_width = 940;

require_once( 'template_inc/admin/admin_portfolio_type.php' );
require_once( 'template_inc/admin/admin_staff_type.php' );
require_once( 'template_inc/admin/admin_testimonial_type.php' );
require_once( 'template_inc/admin/admin_faq_type.php' );
require_once 'template_inc/admin/register-shortcodes.php' ;
require_once 'themeple_framework/themeple_init.php';

function themeple_language_setup() {
    $lang_dir = get_template_directory() . '/lang';
    load_theme_textdomain('themeple', $lang_dir);
} 
add_action('init', 'themeple_language_setup');


$themeple_config['thumbnail_sizes']['widget'] 			 	= array('width'=>36,  'height'=>36);						// small preview pics eg sidebar news
$themeple_config['thumbnail_sizes']['slider_thumb'] 		= array('width'=>70,  'height'=>50);						// slideshow preview pics
$themeple_config['thumbnail_sizes']['fullsize'] 		 	= array('width'=>930, 'height'=>930, 'crop'=>false);		// big images for lightbox and portfolio single entries
	
themeple_generate_thumbnail_sizes($themeple_config);

add_action( 'after_setup_theme', 'themeple_theme_setup' );

function themeple_theme_setup() {

    /* Add theme-supported features. */
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'automatic-feed-links' );
    add_image_size( 'testimonial-thumb', 120, 140, true );
    add_image_size( 'slide_thumb', 90, 45, true );
    add_image_size( 'staff-thumb', 220, 195, true );
    add_image_size( 'recent_sc_portfolio', 60, 60, true );
    add_image_size( 'port3', 514, 368, true );
    add_image_size( 'port3_list', 165, 254, true );
    add_image_size( 'port2', 460, 275, true );
    add_image_size( 'port2_list', 259, 194, true );
    add_image_size( 'port4', 514, 360, true );
    add_image_size( 'port4_list', 120, 340, true );
    add_image_size( 'port1_list', 540, 387, true );
    add_image_size( 'seven_tw_mason', 632, 350, true );
    add_image_size( 'one_fourth_mason', 257, 240, true );
    add_image_size( 'one_fourth_al_mason', 257, 350, true );
    add_image_size( 'one_third_mason', 351, 350, true );
    add_image_size( 'five_tw_mason', 445, 354, true );
    add_image_size( 'five_tw_al_mason', 445, 140, true );
    add_image_size( 'vertical', 292, 170, true );
    add_image_size( 'post_author', 75, 75, true );
    add_image_size( 'featured_blog', 520, 380,  true );
    add_image_size( 'blog', 825, 340, true );
    add_image_size( 'full_2000', 2000, 2000 );
    add_image_size( 'blog_categories', 140, 82, true );
    add_image_size( 'blog_recent', 88, 88, true );
    add_image_size( 'great_gallery', 600, 600, true );
    add_image_size( 'post_thumbnail', 40, 40, true );
    add_image_size( 'services_media', 510, 300, true );
    add_image_size( 'portfolio_bottom', 1100, 400, true );
    add_image_size( 'portfolio_side', 819, 840, true );
    add_image_size('swiper_slider', 450, 500, true);
    add_theme_support( 'post-formats', array( 'quote', 'gallery','video', 'audio' ) ); 
    add_theme_support( 'custom-header' );
    add_theme_support( 'custom-background' );
}


if(!function_exists('themeple_navigation_menus')){ 
    
    /**
     * themeple_navigation_menus()
     * 
     * @return
     */
    function themeple_navigation_menus(){
    		global $themeple_config;
    	
    		add_theme_support('nav_menus');
    		foreach($themeple_config['navigations'] as $id => $name){ 
    		      register_nav_menu($id, THEMETITLE.' '.$name); 
            }
   	}
    $themeple_config['navigations'] = array('main' => 'Main Navigation');
    themeple_navigation_menus();
}
if(!function_exists('themeple_widgets'))
{
	/**
	 * themeple_widgets()
	 * 
	 * @return
	 */
	function themeple_widgets()
	{
		register_widget( 'themepletwitter' );
        register_widget( 'SocialWidget' );
        register_widget( 'FlickrWidget' );
	   // register_widget( 'LatestBlogWidget' );
        register_widget( 'RecentContentWidget' );
        register_widget( 'SlideshowWidget' );
        register_widget( 'VideoWidget' );
        register_widget( 'ListContentWidget' );
        register_widget( 'ShortcodeWidget' );
        register_widget('ContactInfoWidget');
        /*register_widget('TopNavWidget'); */
        register_widget('MostPopularWidget');
        register_widget('TopInfoWidget');
        register_widget('FooterLogoDesc');

	}
	
	themeple_widgets();  
}

add_action('wp_enqueue_scripts', 'themeple_register_styles');
function themeple_register_styles(){
            wp_enqueue_style('style', get_bloginfo( 'stylesheet_url' ), array(), '20130312' );
            wp_enqueue_style('bootstrap-responsive');
           
            wp_enqueue_style('jquery.fancybox');
            wp_enqueue_style('hoverex');
            wp_enqueue_style('vector-icons');
            wp_enqueue_style('font-awesome');
            wp_enqueue_style('linecon');
            wp_enqueue_style('steadysets');
            wp_enqueue_style( 'jquery.easy-pie-chart' );
            wp_enqueue_style( 'idangerous.swiper');
            wp_enqueue_script( 'jquery.easy-pie-chart' );
            wp_enqueue_script('jquery.appear');
            wp_enqueue_script( 'modernizr' );
            wp_enqueue_script('jquery.countTo');
            wp_enqueue_script('animations');
            wp_enqueue_script('big_portfolio');
           
            

}


add_action('wp_enqueue_scripts', 'themeple_register_scripts');
function themeple_register_scripts(){
    wp_enqueue_script( 'jquery');
    wp_enqueue_script( 'bootstrap.min' );
    wp_enqueue_script( 'jquery-easing-1-1' );
    wp_enqueue_script( 'jquery-easing-1-3' );
    wp_enqueue_script( 'jquery.mobilemenu' );
    
    wp_enqueue_script( 'isotope');
    //wp_enqueue_script('jquery.nicescroll.min');
    wp_enqueue_script( 'jquery.cycle' );
    wp_enqueue_script('customSelect');
    wp_enqueue_script('jquery.flexslider-min');
    wp_enqueue_script('jquery.mousewheel');
    wp_enqueue_script('jquery.fancybox');
    wp_enqueue_script('jquery.fancybox-media');
    wp_enqueue_script('jquery.carouFredSel-6.1.0-packed');
    /*wp_enqueue_script('mediaelementplayer'); */
    wp_enqueue_script('tooltip'); 
    wp_enqueue_script('jquery.hoverex'); 
    
    if(themeple_get_option('header_types') == 'header_3' || (isset($_COOKIE['themeple_header']) && $_COOKIE['themeple_header'] == '3' ))
        wp_enqueue_script('menu'); 
    wp_enqueue_script( 'jquery.parallax' );
    wp_enqueue_script( 'main' );
    wp_enqueue_script('comment-reply');
    wp_enqueue_script('placeholder');
    wp_enqueue_script( 'jquery.livequery');
    wp_enqueue_script('countdown');
    wp_enqueue_script( 'waypoints.min');
    wp_enqueue_script( 'idangerous.swiper-2.0');   
    echo "\n <script type='text/javascript'>\n /* <![CDATA[ */  \n";
    echo "var themeple_global = { \n \tajaxurl: '".admin_url( 'admin-ajax.php' )."'\n \t}; \n /* ]]> */ \n ";
    echo "</script>\n \n ";
}

/**
 * get_twitter_entries()
 * 
 * @param mixed $count
 * @param mixed $username
 * @param mixed $widget_id
 * @param string $time
 * @param string $avatar
 * @param string $used_for
 * @return
 */
function get_twitter_top_footer($count, $username, $widget_id = 9999, $time='no', $avatar = 'no')
{       
        $filtered_message = "";
        $output = "";
        $iterations = 0;
        
        
        $cache = get_transient(THEMENAME.'_tweetcache_id_'.$username.'_'.$widget_id);
        
        if($cache)
        {
           $tweets = get_option(THEMENAME.'_tweetcache_'.$username.'_'.$widget_id);
        }
       else
       {
   
     // Include Twitter API Client
           require_once( 'class-wp-twitter-api.php' );

            $twitter_consumer_key = themeple_get_option('twitter_consumer_key');
          $twitter_consumer_secret = themeple_get_option('twitter_consumer_secret');

        // Set your personal data retrieved at https://dev.twitter.com/apps
            $credentials = array(
              'consumer_key' => $twitter_consumer_key,
              'consumer_secret' => $twitter_consumer_secret            );

// Let's instantiate Wp_Twitter_Api with your credentials
$twitter_api = new Wp_Twitter_Api( $credentials );

// Example a - Retrieve last 5 tweets from my timeline (default type statuses/user_timeline)
$query = 'count=5&include_entities=true&include_rts=true&screen_name='.$username;
           
        $response = $twitter_api->query( $query );
        
      
           if (!is_wp_error($response)) 
            {
                
                                       
                        $tweets = array();
                        if(!empty($response)){
                        foreach ($response as $tweet) 
                        {
                            if($iterations == $count) break;
                            
                            $text = (string) $tweet->text;
                            if($text[0] != "@")
                            {
                                $iterations++;
                                $tweets[] = array(
                                    'text' => filter( $text ),
                                    'created' =>  strtotime( $tweet->created_at ),
                                    'user' => array(
                                        'name' => (string)$tweet->user->name,
                                        'screen_name' => (string)$tweet->user->screen_name,
                                        'image' => (string)$tweet->user->profile_image_url,
                                        'utc_offset' => (int) $tweet->user->utc_offset[0],
                                        'follower' => (int) $tweet->user->followers_count));
                            }
                        }
                        
                        set_transient(THEMENAME.'_tweetcache_id_'.$username.'_'.$widget_id, 'true', 60*30);
                        update_option(THEMENAME.'_tweetcache_'.$username.'_'.$widget_id, $tweets);
                  
               
            }
        }
    }

        
        if(!isset($tweets[0]))
        {
            $tweets = get_option(THEMENAME.'_tweetcache_'.$username.'_'.$widget_id);
        }
        
        if(isset($tweets[0]))
        {   
            $time_format = get_option('date_format')." - ".get_option('time_format');
            
                foreach ($tweets as $message)
                {   
                    $output .= '<li class="tweet">';
                        $output .= '<h5><img src="'.$message['user']['image'].'"> '.$message['user']['name'].' @ '.$message['text'].'</h5>';
                    $output .= '</li>';
                }
        
        }
    
        
        if($output != "")
        {
            
                $filtered_message = "<ul class='tweet_list' id='tweet_footer'>".$output."</ul>";
           
        }
        else
        {
            
                $filtered_message = "<ul class='tweet_list' id='tweet_footer'><li> No public Tweets found</li></ul>";
                
        }
    
        return $filtered_message;
}
 
add_filter('body_class', 'themeple_add_header_class');
function themeple_add_header_class($classes = ''){
	$header_class = themeple_get_option('header_types'); 
       if(isset($_COOKIE['themeple_header'])){
    		$header_class = 'header_'.$_COOKIE['themeple_header'].'_body';
    	}else{
            $header_class = $header_class.'_body';
        }

    if(themeple_post_meta(themeple_get_post_id(), 'page_header_animated') == 'yes')
            $classes[] = 'animated_h';
	$classes[] = $header_class;
	if(themeple_get_option('comingsoon') != '')
	if(themeple_get_option('comingsoon') == get_the_ID() ):
		$classes[] = 'comingsoon_page ';
	endif;
    if(themeple_get_option('change_skin_2') == 'dark' || (isset($_COOKIE['themeple_color_skin']) && $_COOKIE['themeple_color_skin'] == 'dark'))
        $classes[] = 'dark_version';

    if(themeple_post_meta(themeple_get_post_id(), 'big_title_bool') == 'yes')
        $classes[] = 'big_title_true';
	return $classes; 
}

add_filter('body_class', 'themeple_add_slider_class');
function themeple_add_slider_class($classes = ''){
	 $slider = new themeple_slideshow(themeple_get_post_id());

	 if($slider && $slider->slide_number > 0 && $slider->slide_type != ''){

        

	 	if($slider->options['slideshow_layout'] == 'fixed'){
			$classes[] = 'fixed_slider';
		}else{
            $classes[] = 'fullwidth_slider_page';
        }
	 }
	 return $classes;

}

add_filter('body_class', 'themeple_add_page_header_class');
function themeple_add_page_header_class($classes = ''){

    if( (themeple_post_meta(themeple_get_post_id(), 'page_header_bool') == 'yes') || (themeple_post_meta(themeple_get_option('blogpage'), 'page_header_bool') == 'yes' && is_single()) || is_404() || is_search() || is_archive() )
        $classes[] = 'page_header_yes';
    return $classes;

}

if(!function_exists('get_post_top_ancestor_id')){
/**
 * Gets the id of the topmost ancestor of the current page. Returns the current
 * page's id if there is no parent.
 * 
 * @uses object $post
 * @return int 
 */
function get_post_top_ancestor_id(){
    global $post;
    
    if($post->post_parent){
        $ancestors = array_reverse(get_post_ancestors($post->ID));
        return $ancestors[0];
    }
    
    return $post->ID;
}}


// Woocommerce Support


function icl_load_jquery_dialog() {
    wp_enqueue_script( 'jquery-ui-dialog', false, array('jquery'), false, true );
}

add_action( 'admin_enqueue_scripts', 'icl_load_jquery_dialog' );

add_filter( 'https_ssl_verify', '__return_false' );
add_filter( 'https_local_ssl_verify', '__return_false' );
require_once 'template_inc/slideshow.inc.php';
require_once 'template_inc/functions-template.php';
require_once 'template_inc/admin/register-sidebars.php';
require_once 'template_inc/generate_dynamic_template.php';
require_once 'functions-novus.php';  
require_once 'functions-woocommerce.php';
?>