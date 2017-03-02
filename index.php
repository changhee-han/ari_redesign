<?php
/*
Template Name: Home Page
*/
?>
<?php get_header(); ?>
<div>This is content</div>

<?php
    if(have_posts()):
        while(have_posts()): the_post();
        the_title();
        the_content();

        the_time('F j, Y');
        the_time('g:i a');
        the_category();
        endwhile;
    endif;
?>


<?php get_footer(); ?>