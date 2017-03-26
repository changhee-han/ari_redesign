<?php
function humber_research_script_enqueue() {
    wp_enqueue_style('customstyle', get_template_directory_uri(). '/css/humber_research.css', array(), '1.0.0', 'all');
    wp_enqueue_script('customjs', get_template_directory_uri(). '/js/humber_research.js', array(), '1.0.0', true);
    wp_enqueue_script('widgetjs', 'http://platform.twitter.com/widgets.js');

}

add_action('wp_enqueue_scripts', 'humber_research_script_enqueue');

function humber_research_setup(){

    add_theme_support('menus');
    register_nav_menu('primary', 'Primary Header Navigation');
    register_nav_menu('secondary', 'Footer Navigation');
}

add_action('init', 'humber_research_setup');


function catch_that_image() {
    global $post, $posts;
    $first_img = '';
    ob_start();
    ob_end_clean();
    $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
    $first_img = $matches [1] [0];

    if(empty($first_img)){ //Defines a default image
        $first_img = "/images/default.jpg";
    }
    return $first_img;
}

?>