<?php
/*
Template Name: Stream
*/
?>

<?php get_header(); ?>


<?php if (get_field('show-header-image') == true) echo "<section id=\"cover-image\">";?>"

        <?php while ( have_posts() ) : the_post(); ?>

    <img id="<?php if (get_field('show-header-image') == true) echo "background-custom"; else echo "background"; ?>"
    src="<?php
    if (get_field('show-header-image') == true)
        {the_field('header-image-location');}
    else
        {bloginfo('template_url'); echo "/img/defaultbgv4.jpg";}
    ?>
    ">

    <img id="logo" <?php if (get_field('show-header-image') == true) {echo "class=\"custom-image-logo\"";} ?> src="<?php bloginfo('template_url'); ?>/img/placeholderlogo.png">

    <h2
    <?php if (get_field('show-header-image') == true) {echo "class=\"custom-image-head\" ";} ?> >
    <?php the_field('header-title'); ?>
    </h2>

    <div id="strap" <?php if (get_field('show-header-image') == true) {echo "class=\"custom-image-strap\" ";} ?> ><?php the_field('header-strap'); ?></div>

</section>

<section id="main">

        <div id="video-stream">

            <div class="stream">
                <object type="application/x-shockwave-flash" height="100%" width="100%" id="live_embed_player_flash" data="http://www.twitch.tv/widgets/live_embed_player.swf?channel=thecatsman" bgcolor="#000000"><param name="allowFullScreen" value="true" /><param name="allowScriptAccess" value="always" /><param name="allowNetworking" value="all" /><param name="movie" value="http://www.twitch.tv/widgets/live_embed_player.swf" /><param name="flashvars" value="hostname=www.twitch.tv&channel=thecatsman&auto_play=true&start_volume=100" /></object>
            </div>
            <div class="chat">
                <iframe frameborder="0" scrolling="no" id="chat_embed" src="http://www.twitch.tv/chat/embed?channel=thecatsman&amp;popout_chat=true" height="100%" width="100%"></iframe>
            </div>

        </div>

    <article class="single-article" id="single-article">

    <hr />

    <?php the_content();?>

    <hr />

    <?php endwhile; ?>

<!--
<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
<?php dynamic_sidebar( 'sidebar-1' ); ?>
<?php endif; ?>
-->


    </article>

</section>

<?php get_footer(); ?>