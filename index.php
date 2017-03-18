<?php
/*
Template Name: Home Page
*/
?>
<?php get_header(); ?>
<div>This is content</div>

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

        // loop through the rows of data
        <?php while ( have_rows('hero_banner') ) : the_row(); ?>

        <div class="hero_banner_bg" style="background: linear-gradient(rgba(0,0,0,.4), rgba(0,0,0,.4)), url('<?php the_sub_field('hero_banner_background_media'); ?>') no-repeat; background-size: contain;">

            <h1 class="hero_banner_title"><?php the_sub_field('hero_banner_title'); // display a sub field value ?></h1>

            <p><?php the_sub_field('hero_banner_content');?></p>

            <?php if( have_rows('hero_banner_buttons') ): // check if the repeater field has rows of data ?>
                <div class="hero_banner_buttons"></div>

                <?php while ( have_rows('hero_banner_buttons') ) : the_row(); // loop through the rows of data ?>
                    <a href="<?php the_sub_field('hero_banner_button_url'); ?>"><?php the_sub_field('hero_banner_button_name'); ?></a>

                <?php endwhile; ?>
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
    //Media Banner
    if( have_rows('media_banner') ): // check if the repeater field has rows of data ?>

        <?php while ( have_rows('media_banner') ) : the_row(); // loop through the rows of data ?>
            <?php if( have_rows('media_resources') ): // display a sub field value & check if the repeater field has rows of data ?>

                <?php while ( have_rows('media_resources') ) : the_row(); // loop through the rows of data ?>
                    <?php the_sub_field('media_file'); ?>
                    <?php the_sub_field('media_link_url'); ?>
                <?php endwhile; ?>

        <?php ?>
        <?php
            else : // no rows found
            endif;

        endwhile;

    else : // no rows found
    endif;


    //Facts Banner

    // check if the repeater field has rows of data
    if( have_rows('facts_banner') ):

        // loop through the rows of data
        while ( have_rows('facts_banner') ) : the_row();

            // display a sub field value
            // check if the repeater field has rows of data
            if( have_rows('fact_info') ):

                // loop through the rows of data
                while ( have_rows('fact_info') ) : the_row();

                    // display a sub field value
                    the_sub_field('fact_title');
                    the_sub_field('fact_number');
                endwhile;

            else :

                // no rows found

            endif;

        endwhile;

    else :

        // no rows found

    endif;


    //Partners Banner

    // check if the repeater field has rows of data
    if( have_rows('partners_banner') ):

        // loop through the rows of data
        while ( have_rows('partners_banner') ) : the_row();

            // display a sub field value
            // check if the repeater field has rows of data
            if( have_rows('partners') ):

                // loop through the rows of data
                while ( have_rows('partners') ) : the_row();

                    // display a sub field value
                    the_sub_field('partner_name');
                    the_sub_field('partner_link_url');
                    the_sub_field('partner_logo_image');
                    the_sub_field('partner_display_on_off');
                endwhile;

            else :

                // no rows found

            endif;

            //partner_banner_display_on_off
            the_sub_field('partner_banner_display_on_off');

        endwhile;

    else :

        // no rows found

    endif;



    the_field('parallax_background_image');

    //Subscription Banner

    // check if the repeater field has rows of data
    if( have_rows('subscription_banner') ):

        // loop through the rows of data
        while ( have_rows('subscription_banner') ) : the_row();


            // display a sub field value
            the_sub_field('subscription_title');
            the_sub_field('subscription_content');
            the_sub_field('partner_logo_image');
            the_sub_field('partner_display_on_off');


        endwhile;

    else :

        // no rows found

    endif;






?>


<?php get_footer(); ?>