<?php get_header(); ?>

<?php if(get_field('add-youtube-embed') == true) echo'<style>#logo, #strap, h2, .custom-image-head{visibility:hidden;}</style>'; ?>

<?php if (get_field('show-header-image') == true) echo "<section id=\"cover-image\">";?>
    <?php while ( have_posts() ) : the_post(); ?>
    <img id="<?php if (get_field('show-header-image') == true && (get_field('add-youtube-embed') != true)) echo "background-custom"; else echo "background"; ?>" src="<?php if (get_field('show-header-image') == true) {the_field('header-image-location'); } elseif (get_field('header-image-location') == false ) {bloginfo('template_url'); echo "/img/defaultbgv4.jpg";} ?>">
    <img id="logo" <?php if (get_field('show-header-image') == true) {echo "class=\"custom-image-logo\"";} ?> src="<?php bloginfo('template_url'); ?>/img/placeholderlogo.png">
    <h2 <?php if(get_field('show-header-image') == true) {echo "class=\"custom-image-head\" ";} ?> > <?php the_field('header-title'); ?></h2>
    <div id="strap" <?php if (get_field('show-header-image') == true) {echo "class=\"custom-image-strap\" ";} ?> ><?php the_field('header-strap'); ?></div>
    
    <?php
    if (get_field('add-youtube-embed') != false)
        echo'<div id="video-player"> <div class="embed-container"> <iframe width="100%" height="100%" src="http://www.youtube.com/embed/iZNven6Nuzs?modestbranding=1&rel=0" frameborder="0"></iframe></div></div>';
    ?>

</section>

<section id="main">
    <article class="single-article" id="single-article">

    <?php if (get_field('have-audio-player') == true) { $location = get_field("audio-ogg-location"); echo do_shortcode('[audio src="'.($location).'" preload="true"]'); } ?>

    <div id="mobile-audio"><?php if (get_field('have-audio-player') == true) { $location = get_field("audio-ogg-location"); echo '<audio src="'.($location).'" preload="auto" controls></audio>'; } ?></div>

    <?php if(get_field('add-youtube-embed') == true or (get_field('header-title') == false)) echo "<h3 class=\"youtube-title\">".get_the_title($ID)."</h3>"; ?>

    <h3 class="mobile-title"> <?php echo get_the_title($ID) ?> </h3>

    <?php if(get_field('add-youtube-embed') == true) echo '<div id="video-player-mobile"> <div class="embed-container"> <iframe width="100%" height="100%" src="http://www.youtube.com/embed/iZNven6Nuzs?modestbranding=1&rel=0" frameborder="0"></iframe></div></div>'; ?>

    <?php the_content();?>

    <p class="single-article-meta">Article by <?php the_author_posts_link(); ?>. Last updated <?php the_modified_date(); ?>.</p>
    <p class="tags"><?php the_tags( 'Filed under: ' ); ?> </p>

    <hr />

    <?php endwhile; ?>

    <?php if(function_exists('echo_ald_crp')) echo_ald_crp(); ?>

    <hr />

    <?php if ( comments_open() || get_comments_number() ) {
                        comments_template();
                    }
    ?>

<!--
<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
<?php dynamic_sidebar( 'sidebar-1' ); ?>
<?php endif; ?>
-->


    </article>

</section>

<?php get_footer(); ?>