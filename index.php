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
    if (have_rows('hero_banner')): ?>

        <div class="section hero_banner">

            <?php // loop through the rows of data
            while (have_rows('hero_banner')) : the_row(); ?>

                <div class="hero_banner_bg"
                     style="background: linear-gradient(rgba(0,0,0,.4), rgba(0,0,0,.4)), url('<?php the_sub_field('hero_banner_background_media'); ?>') no-repeat; background-size: contain;">

                    <h1 class="hero_banner_title"><?php the_sub_field('hero_banner_title'); // display a sub field value ?></h1>

                    <p><?php the_sub_field('hero_banner_content'); ?></p>

                    <?php if (have_rows('hero_banner_buttons')): // check if the repeater field has rows of data ?>
                        <div class="hero_banner_buttons">

                            <?php while (have_rows('hero_banner_buttons')) : the_row(); // loop through the rows of data ?>
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
    if (have_rows('article_banner')):
        $category = array('latest-news', 'success-stories');
        $i = 0;
        ?>
        <?php
        // loop through the rows of data
        while (have_rows('article_banner')) : the_row(); ?>

            <?php if (get_sub_field('article_banner_display_on_off')): ?>
                <?php
                global $post;
                $args = array('posts_per_page' => 1, 'category' => $category[$i]);
                $lastposts = get_posts($args);
                foreach ($lastposts as $post) :
                    setup_postdata($post); ?>
                    <img src="<?php echo catch_that_image(); ?>" alt="<?php the_title(); ?>"/>
                    <p class="article_title"><?php the_title(); ?></p>
                    <p class="article_content"><?php the_excerpt(); ?></p>
                    <a class="more_button" href="<?php the_permalink(); ?>">Read More</a>
                <?php endforeach;
                wp_reset_postdata(); ?>
                <!--                --><?php //if( have_rows('more_button') ): // check if the repeater field has rows of data ?>
                <!--                    --><?php //while ( have_rows('more_button') ) : the_row(); // loop through the rows of data ?>
                <!--                        <a class="more_button" href="--><?php //the_sub_field('more_button_link_url'); ?><!--">-->
                <!--                            --><?php //the_sub_field('more_button_title'); ?>
                <!--                        </a>-->
                <!--                    --><?php //endwhile; ?>
                <!--                --><?php //endif; ?>
                <?php $i++; ?>
            <?php endif; ?>
        <?php endwhile; ?>
    <?php endif; ?>

    <?php

    //Media Banner
    if (have_rows('media_banner')): // check if the repeater field has rows of data
        $i = 0;?>
        <?php while (have_rows('media_banner')) : the_row(); // loop through the rows of data ?>
        <?php if (get_sub_field('media_banner_display_on_off')): ?>

            <div class="section media_banner">
                <?php if (have_rows('media_resources')): // display a sub field value & check if the repeater field has rows of data ?>
                    <?php $i = 0; ?>
                    <?php while (have_rows('media_resources')) : the_row(); // loop through the rows of data ?>
                        <?php if (get_sub_field('media_display_on_off')): ?>
                            <div class="media" id="media_<?php echo $i; ?>">
                                <a href="<?php the_sub_field('media_link_url'); ?>">

                                    <?php if (get_sub_field('media_type') == "Image") : ?>
                                        <img src="<?php the_sub_field('media_file'); ?>" alt=""/>
                                    <?php endif; ?>
                                    <?php if (get_sub_field('media_type') == "Video") : ?>
                                        <video src="<?php the_sub_field('media_file'); ?>"></video>
                                    <?php endif; ?>
                                </a>
                            </div>
                            <?php $i++; ?>
                        <?php endif; ?>
                    <?php endwhile; ?>


                <?php
                endif;

                ?>
            </div>

        <?php
        endif;
    endwhile;
    endif;
    ?>

    <?php
    //Facts Banner

    // check if the repeater field has rows of data
    if (have_rows('facts_banner')): ?>

        <?php while (have_rows('facts_banner')) : the_row(); ?>

            <?php if (get_sub_field('fact_banner_display_on_off')): ?>
                <div class="section facts_banner">
                    <div class="facts_wrapper">
                        <?php if (have_rows('fact_info')): ?>
                            <?php while (have_rows('fact_info')) : the_row(); ?>

                                <?php if (get_sub_field('fact_display_on_off')): ?>
                                    <div class="fact_box">
                                        <p class="fact_number"><?php the_sub_field('fact_number'); ?></p>

                                        <p class="fact_name"><?php the_sub_field('fact_title'); ?></p>
                                    </div>

                                <?php endif; ?>
                            <?php endwhile; ?>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endif; ?>
        <?php endwhile; ?>

    <?php else : // no rows found ?>

    <?php endif; ?>

    <?php
    //Partners Banner

    // check if the repeater field has rows of data

    if (have_rows('partners_banner')): ?>

        <?php
        // loop through the rows of data
        while (have_rows('partners_banner')) : the_row(); ?>
            <?php if (get_sub_field('partner_banner_display_on_off')): ?>
                <div class="section partners_banner">
                    <?php
                    // display a sub field value
                    // check if the repeater field has rows of data
                    if (have_rows('partners')): ?>
                        <div class="partners_wrapper">
                        <?php
                        // loop through the rows of data
                        while (have_rows('partners')) : the_row(); ?>
                            <?php if (get_sub_field('partner_display_on_off')): ?>

                                <div class="partner_box <?php the_sub_field('partner_name'); ?>">
                                    <a href="<?php the_sub_field('partner_link_url'); ?>" target="_blank">
                                        <img src="<?php the_sub_field('partner_logo_image'); ?>"
                                             alt="<?php the_sub_field('partner_name'); ?>"/>
                                    </a>

                                </div>
                            <?php endif; ?>
                        <?php endwhile; ?>

                    <?php else : // no rows found ?>
                        </div>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
        <?php endwhile; ?>

    <?php else : // no rows found ?>

    <?php endif; ?>


    <div class="section parallax_bg">
        <?php the_field('parallax_background_image'); ?>
    </div>
    <?php
    //Subscription Banner

    // check if the repeater field has rows of data
    if (have_rows('subscription_banner')): ?>
        <div class="section partners_banner">
        <?php
        // loop through the rows of data
        while (have_rows('subscription_banner')) : the_row(); ?>

            <?php if (get_sub_field('subscription_banner_display_on_off')): ?>

                <h2 class="subscription_title"><?php // display a sub field value
                    the_sub_field('subscription_title'); ?></h2>
                <p class="subscription_content"><?php the_sub_field('subscription_content'); ?></p>


                <div class="subscribeForm">
                    <!-- Begin MailChimp Signup Form -->
                    <div id="mc_embed_signup">
                        <form action="//humber.us15.list-manage.com/subscribe/post?u=ea5cd9dce6ed29c65f8fcc339&amp;id=623bb6f6d7" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
                            <div id="mc_embed_signup_scroll">
<!--                                <h2>Subscribe to our mailing list</h2>-->
<!--                                <div class="indicates-required"><span class="asterisk">*</span> indicates required</div>-->
                                <div class="mc-field-group">
                                    <label for="mce-EMAIL">Email Address  <span class="asterisk">*</span>
                                    </label>
                                    <input type="email" value="" name="EMAIL" class="required email" id="mce-EMAIL">
                                </div>
                                <div class="mc-field-group">
                                    <label for="mce-FNAME">First Name </label>
                                    <input type="text" value="" name="FNAME" class="" id="mce-FNAME">
                                </div>
                                <div class="mc-field-group">
                                    <label for="mce-LNAME">Last Name </label>
                                    <input type="text" value="" name="LNAME" class="" id="mce-LNAME">
                                </div>
                                <div class="mc-field-group">
                                    <label for="mce-MMERGE4">Are you a student, faculty member, or external?  <span class="asterisk">*</span>
                                    </label>
                                    <select name="MMERGE4" class="required" id="mce-MMERGE4">
                                        <option value=""></option>
                                        <option value="Student">Student</option>
                                        <option value="Faculty">Faculty</option>
                                        <option value="External">External</option>

                                    </select>
                                </div>
                                <div class="mc-field-group">
                                    <label for="mce-MMERGE3">Company (if applicable) </label>
                                    <input type="text" value="" name="MMERGE3" class="" id="mce-MMERGE3">
                                </div>
                                <div id="mce-responses" class="clear">
                                    <div class="response" id="mce-error-response" style="display:none"></div>
                                    <div class="response" id="mce-success-response" style="display:none"></div>
                                </div>    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
                                <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_ea5cd9dce6ed29c65f8fcc339_623bb6f6d7" tabindex="-1" value=""></div>
                                <div class="clear"><input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button"></div>
                            </div>
                        </form>
                    </div>

                    <!--End mc_embed_signup-->
                </div>

            <?php endif; ?>
        <?php endwhile; ?>

    <?php else : // no rows found ?>
        </div>
    <?php endif; ?>
    </div>

<?php
//Social Banner

// check if the repeater field has rows of data

if (have_rows('social_banner')): ?>

    <?php
    // loop through the rows of data
    while (have_rows('social_banner')) : the_row(); ?>
        <?php if (get_sub_field('social_banner_display_on_off')): ?>
            <div class="section social_banner">
                <h2 class="social_headline">
                    <?php the_sub_field('social_headline'); ?>
                </h2>
                <?php
                //Get Twitter User Info
                $twitterUserInfo = getUserInfo('humber_research');

                $twiterName = $twitterUserInfo['name'];
                $twiterUsername = $twitterUserInfo['screen_name'];
                $twitterProfileImg = $twitterUserInfo['profile_image_url'];
                //https://twitter.com/humber_research/

                ?>
                <?php
                // draft sample display for array returned from oAuth Twitter Feed for Developers WP plugin
                // http://wordpress.org/extend/plugins/oauth-twitter-feed-for-developers/

                $tweets = getTweets(3, 'humber_research'); //change number up to 20 for number of tweets
                if (is_array($tweets)) { // to use with intents
                    ?>
                    <ul>
                    <?php
                    foreach ($tweets as $tweet) {
                        if ($tweet['text']) {

                            $the_tweet = $tweet['text'];

                            /*
                            Twitter Developer Display Requirements
                            https://dev.twitter.com/terms/display-requirements

                            2.b. Tweet Entities within the Tweet text must be properly linked to their appropriate home on Twitter. For example:
                              i. User_mentions must link to the mentioned user's profile.
                             ii. Hashtags must link to a twitter.com search with the hashtag as the query.
                            iii. Links in Tweet text must be displayed using the display_url
                                 field in the URL entities API response, and link to the original t.co url field.
                            */

                            // i. User_mentions must link to the mentioned user's profile.
                            if (is_array($tweet['entities']['user_mentions'])) {
                                foreach ($tweet['entities']['user_mentions'] as $key => $user_mention) {
                                    $the_tweet = preg_replace(
                                        '/@' . $user_mention['screen_name'] . '/i',
                                        '<a href="http://www.twitter.com/' . $user_mention['screen_name'] . '" target="_blank">@' . $user_mention['screen_name'] . '</a>',
                                        $the_tweet);
                                }
                            }

                            // ii. Hashtags must link to a twitter.com search with the hashtag as the query.
                            if (is_array($tweet['entities']['hashtags'])) {
                                foreach ($tweet['entities']['hashtags'] as $key => $hashtag) {
                                    $the_tweet = preg_replace(
                                        '/#' . $hashtag['text'] . '/i',
                                        '<a href="https://twitter.com/search?q=%23' . $hashtag['text'] . '&src=hash" target="_blank">#' . $hashtag['text'] . '</a>',
                                        $the_tweet);
                                }
                            }

                            // iii. Links in Tweet text must be displayed using the display_url
                            //      field in the URL entities API response, and link to the original t.co url field.
                            if (is_array($tweet['entities']['urls'])) {
                                foreach ($tweet['entities']['urls'] as $key => $link) {
                                    $the_tweet = preg_replace(
                                        '`' . $link['url'] . '`',
                                        '<a href="' . $link['url'] . '" target="_blank">' . $link['url'] . '</a>',
                                        $the_tweet);
                                }
                            }

                            ?>
                            <li>
                            <?php
                            $twiterName = $twitterUserInfo['name'];
                            $twiterUsername = $twitterUserInfo['screen_name'];
                            ?>
                            <div class="twitterProfile">
                                <div class="profileImg">
                                    <img src="<?php echo $twitterProfileImg; ?>" alt="<?php echo $twiterName; ?>"/>
                                </div>
                                <div class="userInfo">
                                    <p class="twitterName"><?php echo $twiterName; ?></p>
                                    <p class="twiterUsername"><?php echo '@'. $twiterUsername; ?></p>

                                </div>
                            </div>
                            <div class="twitterFeedContent">
                                <?php echo $the_tweet; ?>
                            </div>
                            <div class="twitterActions">
                                <p><a class="reply" href="https://twitter.com/intent/tweet?in_reply_to=' . $tweet['id_str'] . '">Reply</a></p>
                                <p><a class="retweet" href="https://twitter.com/intent/retweet?tweet_id=' . $tweet['id_str'] . '">Retweet</a></p>
                                <p><a class="favorite" href="https://twitter.com/intent/favorite?tweet_id=' . $tweet['id_str'] . '">Favorite</a></p>
                                <p><?php echo date('M d', strtotime($tweet['created_at'])); ?></p>
                            </div>

                            <?php

                            // 3. Tweet Actions
                            //    Reply, Retweet, and Favorite action icons must always be visible for the user to interact with the Tweet. These actions must be implemented using Web Intents or with the authenticated Twitter API.
                            //    No other social or 3rd party actions similar to Follow, Reply, Retweet and Favorite may be attached to a Tweet.
                            // get the sprite or images from twitter's developers resource and update your stylesheet


                            // 4. Tweet Timestamp
                            //    The Tweet timestamp must always be visible and include the time and date. e.g., “3:00 PM - 31 May 12”.
                            // 5. Tweet Permalink
                            //    The Tweet timestamp must always be linked to the Tweet permalink.
//                            echo '
//                            <p class="timestamp">
//                                <a href="https://twitter.com/humber_research/status/' . $tweet['id_str'] . '" target="_blank">
//                                    ' . date('h:i A M d', strtotime($tweet['created_at'] . '- 8 hours')) . '
//                                </a>
//                            </p>';
                            // -8 GMT for Pacific Standard Time

                            ?>
                              </li>
                            <?php
                        } else {
                            echo '<br /><br /><a href="http://twitter.com/humber_research" target="_blank">Click here to read Humber Research\'S Twitter feed</a>';
                        }
                    }
                    ?>
                    </ul>
                    <?php
                } else {

                    ?>
                    <p>There is no tweet feed.</p>
                <?php

                }
                ?>
            </div>
        <?php endif; ?>
    <?php endwhile; ?>

<?php else : // no rows found ?>

<?php endif; ?>




<?php get_footer(); ?>