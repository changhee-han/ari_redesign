<?php

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

add_action('wp_enqueue_scripts', 'humber_research_script_enqueue');

function humber_research_script_enqueue() {
    wp_enqueue_style('customstyle', get_template_directory_uri(). '/css/reset.css', array(), '1.0.0', 'all');
    wp_enqueue_style('parent-style', get_template_directory_uri(). '/css/humber_research.css', array(), '1.0.0', 'all');
    wp_enqueue_script('customjs', get_template_directory_uri(). '/js/humber_research.js', array(), '1.0.0', true);
    wp_enqueue_script('widgetjs', 'http://platform.twitter.com/widgets.js');

}

function getImage($num) {
    global $more;
    $more = 1;
    $link = get_permalink();
    $content = get_the_content();
    $count = substr_count($content, '<img');
    $start = 0;
    for($i=1;$i<=$count;$i++) {
        $imgBeg = strpos($content, '<img', $start);
        $post = substr($content, $imgBeg);
        $imgEnd = strpos($post, '>');
        $postOutput = substr($post, 0, $imgEnd+1);
        $postOutput = preg_replace('/width="([0-9]*)" height="([0-9]*)"/', '',$postOutput);;
        $image[$i] = $postOutput;
        $start=$imgEnd+1;
    }
    if(stristr($image[$num],'<img')) { echo '<a href="'.$link.'">'.$image[$num]."</a>"; }
    $more = 0;
}




?>