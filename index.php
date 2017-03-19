<?php
/*
Template Name: Home Page
*/
?>
<?php get_header(); ?>
<div>This is content</div>

<div class="wrapper">

<?php

//if(have_posts()):
  //  while(have_posts()): the_post();
    //the_title();
    //the_content();

    //the_time('F j, Y');
    //the_time('g:i a');
    //the_category();
    //endwhile;
//endif;


//Hero Banner
// check if the repeater field has rows of data
if( have_rows('hero_banner') ): ?>

    <div class="section hero_banner">

        <?php // loop through the rows of data
        while ( have_rows('hero_banner') ) : the_row(); ?>

        <div class="hero_banner_bg" style="background: linear-gradient(rgba(0,0,0,.4), rgba(0,0,0,.4)), url('<?php the_sub_field('hero_banner_background_media'); ?>') no-repeat; background-size: contain;">

            <h1 class="hero_banner_title"><?php the_sub_field('hero_banner_title'); // display a sub field value ?></h1>

            <p><?php the_sub_field('hero_banner_content');?></p>

            <?php if( have_rows('hero_banner_buttons') ): // check if the repeater field has rows of data ?>
                <div class="hero_banner_buttons">

                <?php while ( have_rows('hero_banner_buttons') ) : the_row(); // loop through the rows of data ?>
                    <a href="<?php the_sub_field('hero_banner_button_url'); ?>"><?php the_sub_field('hero_banner_button_name'); ?></a>

                <?php endwhile; ?>
                </div>
            <?php
            else : // no rows found
            endif;
            ?>
        </div>

        <?php endwhile; ?>
    </div>
<?php

else : // no rows found

endif;
?>


<?php
//Articles Banner

// check if the repeater field has rows of data
if( have_rows('article_banner') ): ?>
    <?php $category = ['latest-news', 'success-stories'];
          $i = 0;
    ?>
    <div class="section article_banner">
    <?php while ( have_rows('article_banner') ) : the_row(); ?>

        <?php if (get_sub_field('article_banner_display_on_off')): ?>
            <div class="articles_wrapper">
                <h3 class="article_section_headline"><?php the_sub_field('article_section_headline'); ?></h3>
                <div class="article_box">
                    <?php
                    global $post;
                    $args = array( 'numberposts' => 1, 'category_name' => $category[$i] );
                    $posts = get_posts( $args );
                    foreach( $posts as $post ): setup_postdata($post);?>
                        <img src="<?php echo catch_that_image(); ?>" alt="<?php the_title(); ?>"/>
                        <p class="article_title"><?php the_title(); ?></p>
                        <p class="article_content"><?php the_excerpt(); ?></p>
<!--                        <p>--><?php //the_content(); ?><!--</p>-->
                    <?php endforeach; ?>
                </div>
            <?php if( have_rows('more_button') ): // check if the repeater field has rows of data ?>
                <?php while ( have_rows('more_button') ) : the_row(); // loop through the rows of data ?>
                    <a class="more_button" href="<?php the_sub_field('more_button_link_url'); ?>">
                        <?php the_sub_field('more_button_title'); ?>
                    </a>
                <?php endwhile; ?>
            <?php endif; ?>
            </div>
        <?php endif; ?>
        <?php $i++; ?>
    <?php endwhile; ?>

<?php else : // no rows found ?>
    </div>
<?php endif; ?>

<?php
    //Media Banner
    if( have_rows('media_banner') ): // check if the repeater field has rows of data ?>
        <?php if (get_sub_field('media_banner_display_on_off')): ?>

        <div class="section media_banner">
        <?php while ( have_rows('media_banner') ) : the_row(); // loop through the rows of data ?>

            <?php if( have_rows('media_resources') ): // display a sub field value & check if the repeater field has rows of data ?>
                <?php $i = 0;?>
                <?php while ( have_rows('media_resources') ) : the_row(); // loop through the rows of data ?>
                    <?php if (get_sub_field('media_display_on_off')): ?>
                    <div class="media" id="media_<?php echo $i;?>">
                        <a href="<?php the_sub_field('media_link_url'); ?>">

                        <?php if(get_sub_field('media_type') == "Image") { ?>
                            <img src="<?php the_sub_field('media_file'); ?>" alt=""/>
                        <?php } ?>
                        <?php if(get_sub_field('media_type') == "Video") { ?>
                            <video src="<?php the_sub_field('media_file'); ?>"></video>
                        <?php } ?>
                        </a>
                    </div>
                    <?php $i++;?>
                    <?php endif; ?>
                <?php endwhile; ?>


        <?php
            else : // no rows found
            endif;

        endwhile; ?>
        </div>

<?php
        endif;
    else : // no rows found
    endif;
?>

<?php
//Facts Banner

// check if the repeater field has rows of data
if( have_rows('facts_banner') ): ?>
    <div class="section facts_banner">
    <?php while ( have_rows('facts_banner') ) : the_row(); ?>

        <?php if (get_sub_field('fact_banner_display_on_off')): ?>
        <div class="facts_wrapper">
        <?php if( have_rows('fact_info') ): ?>
            <?php while ( have_rows('fact_info') ) : the_row(); ?>

                <?php if (get_sub_field('fact_display_on_off')): ?>
                <div class="fact_box">
                    <p class="fact_number"><?php the_sub_field('fact_number'); ?></p>
                    <p class="fact_name"><?php the_sub_field('fact_title'); ?></p>
                </div>

                <?php endif; ?>
            <?php endwhile; ?>
        <?php endif; ?>
        </div>
        <?php endif; ?>
    <?php endwhile; ?>

<?php else : // no rows found ?>
    </div>
<?php endif; ?>

<?php
//Partners Banner

// check if the repeater field has rows of data

if( have_rows('partners_banner') ): ?>
    <div class="section partners_banner">
    <?php
    // loop through the rows of data
    while ( have_rows('partners_banner') ) : the_row(); ?>

        <?php if (get_sub_field('partner_banner_display_on_off')): ?>

        <?php
        // display a sub field value
        // check if the repeater field has rows of data
        if( have_rows('partners') ): ?>
            <div class="partners_wrapper">
            <?php
            // loop through the rows of data
            while ( have_rows('partners') ) : the_row(); ?>
                <?php if (get_sub_field('partner_display_on_off')): ?>

                <div class="partner_box <?php the_sub_field('partner_name'); ?>">
                    <a href="<?php the_sub_field('partner_link_url'); ?>" target="_blank">
                        <img src="<?php the_sub_field('partner_logo_image'); ?>" alt="<?php the_sub_field('partner_name'); ?>"/>
                    </a>

                </div>
                <?php endif; ?>
            <?php endwhile; ?>

        <?php else : // no rows found ?>
            </div>
        <?php endif; ?>

        <?php endif; ?>
    <?php endwhile; ?>

<?php else : // no rows found ?>
    </div>
<?php endif; ?>


<div class="section parallax_bg">
<?php the_field('parallax_background_image'); ?>
</div>
<?php
//Subscription Banner

// check if the repeater field has rows of data
if( have_rows('subscription_banner') ): ?>
    <div class="section partners_banner">
    <?php
    // loop through the rows of data
    while ( have_rows('subscription_banner') ) : the_row(); ?>

        <?php if (get_sub_field('subscription_banner_display_on_off')): ?>

        <h2 class="subscription_title"><?php // display a sub field value
        the_sub_field('subscription_title'); ?></h2>
        <p class="subscription_content"><?php the_sub_field('subscription_content'); ?></p>

        <?php endif; ?>
    <?php endwhile; ?>

<?php else : // no rows found ?>
    </div>
<?php endif; ?>
</div>

<?php get_footer(); ?>