<?php
/* Template Name: Posts Page */
/*
Theme Name:     Humber Research Child
Theme URI:      http://localhost:8888/wordpress/
Description:    Child theme for the Humber Research theme
Author:         Changhee Han
Author URI:     http://changheehan.com
Template:       humber_research
Version:        0.1.0
*/

get_header(); ?>

<div id="content">

    <!--    --><?php //query_posts('post_type=post&post_status=publish&posts_per_page=10&paged='. get_query_var('paged')); ?>

    <?php if( have_posts() ): the_post();
//        var_dump($post);
        ?>

        <img src="<?php echo catch_that_image(); ?>" alt="<?php the_title(); ?>"/>
        <p class="article_title"><?php the_title(); ?></p>
        <p class="article_content"><?php echo wp_strip_all_tags( get_the_content() ); ?></p>


        <div class="navigation">
            <span class="newer"><?php previous_posts_link(__('« Newer','example')) ?></span> <span class="older"><?php next_posts_link(__('Older »','example')) ?></span>
        </div><!-- /.navigation -->

        <!--        --><?php //getImage('1'); ?>
        <!--        --><?php //getImage('2'); ?>




        <?php

        $related = get_posts( array( 'category__in' => wp_get_post_categories($post->ID), 'numberposts' => 5, 'post__not_in' => array($post->ID) ) );
        if( $related ) foreach( $related as $post ) {
            setup_postdata($post); ?>
            <ul>
                <li>
                    <a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a>

                </li>
            </ul>
        <?php }
        wp_reset_postdata(); ?>
    <?php else: ?>

        <div id="post-404" class="noposts">

            <p><?php _e('None found.','example'); ?></p>

        </div><!-- /#post-404 -->

    <?php endif; wp_reset_query(); ?>

</div><!-- /#content -->

<?php get_footer(); ?>
