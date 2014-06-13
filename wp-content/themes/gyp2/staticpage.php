<?php
/*
Template Name: Static Page
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
    <article class="single-article" id="single-article">

    

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