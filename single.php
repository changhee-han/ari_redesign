<?php

/**
 * The template for displaying all single posts and attachments
 *
 * @package WordPress
 * @subpackage humber_research
 * @since Humber Research 1.0
 */


/**
 * Created by PhpStorm.
 * User: hanchanghee
 * Date: 4/7/17
 * Time: 12:59 PM
 */

get_header(); ?>

<div class="wrapper">
    <?php if( have_posts() ): the_post();?>

        <div class="article_layout">
            <div class="article_list_box">
                <?php
                $related = get_posts( array( 'category__in' => wp_get_post_categories($post->ID), 'numberposts' => 4, 'post__not_in' => array($post->ID) ) );
                if( $related ): ?>
                    <h2 class="article_list_title">LATEST ARTICLES</h2>

                    <?php foreach( $related as $post ) {
                        setup_postdata($post);
                        $date = new DateTime($post->post_date);
                        $date = $date->format("F d, Y"); ?>
                        <ul class="article_list">
                            <li>
                                <p class="post_date"><?php echo $date; ?></p>
                                <a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a>

                            </li>
                        </ul>
                    <?php }
                endif;
                wp_reset_postdata(); ?>

            </div>

            <div class="article_wrapper">
                <?php
                $date = new DateTime($post->post_date);
                $date = $date->format("F d, Y");
                ?>
                <h1 class="article_title"><?php the_title(); ?></h1>
                <p class="article_post_date"><?php echo $date; ?></p>
                <p class="article_content"><?php the_content(); ?></p>

            </div>
        </div>

        <!--        <img src="--><?php //echo catch_that_image(); ?><!--" alt="--><?php //the_title(); ?><!--"/>-->

        <!--        <p class="article_content">--><?php //echo wp_strip_all_tags( get_the_content() ); ?><!--</p>-->



        <!--        <div class="navigation">-->
        <!--            <span class="newer">--><?php //previous_posts_link(__('« Newer','example')) ?><!--</span> <span class="older">--><?php //next_posts_link(__('Older »','example')) ?><!--</span>-->
        <!--        </div>-->
        <!--        -->
        <!-- /.navigation -->

        <!--        --><?php //getImage('1'); ?>
        <!--        --><?php //getImage('2'); ?>

    <?php else: ?>

        <div id="post-404" class="noposts">

            <p><?php _e('None found.','example'); ?></p>

        </div><!-- /#post-404 -->

    <?php endif; wp_reset_query(); ?>



</div><!-- /#content -->

<?php get_footer(); ?>
