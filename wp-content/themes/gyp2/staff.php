<?php
/*
Template Name: About
*/
?>

<?php get_header(); ?>

<img id="background" src="<?php bloginfo('template_url'); ?>/img/defaultbgv4.jpg">

<img id="logo" src="<?php bloginfo('template_url'); ?>/img/placeholderlogo.png">

<h2>Gather <em>Your</em> Party</h2>
<div id="strap">Honest Gaming Journalism</div>

<section id="main">
    <div class="wrap">

    <article class="single-article staff-info" id="single-article">

    <?php while ( have_posts() ) : the_post(); ?>

    <?php the_content();?>

    <?php endwhile; ?>

    <hr />

<?php
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

$args = array(
    'tag' => 'bio',
    'posts_per_page' => 99999999,
    'paged' => $paged,
    'showposts' => 999999999,
    'offset' => 0,
);
$wp_query = new WP_Query( $args );

while($wp_query->have_posts()) : $wp_query->the_post(); ?>

	    <a href="<?php the_permalink(); ?>">
            <div class="article-recent">

                <?php the_post_thumbnail( 'about-page', array('class' => "staff-thumb") ); ?> 
                
                <div class="staff-article">

                    <h3 class="staff-title"><?php the_author_posts_link(); ?></h3>
                    <div class="staff-description"><?php the_content(); ?></div>
                    <div class="staff-meta">
                        <div class="staff-comment-num"><a href="<?php comments_link(); ?>"><?php comments_number( 'no comments', 'one comment', '% comments' ); ?></a></div>

                    </div>
                </div>
            </div>
        </a>

        <hr />

<?php endwhile; ?>
<?php wp_reset_postdata(); // reset the query ?>
        

        <!--

        <div class="sidebar">
            <aside class="sidebar-item">
                <h3 class="sidebar-heading">Item on the sidebar</h3>
                <p class="sidebar-p">Some sidebar text.</p>
                <p class="sidebar-p">Here's another paragraph. Just in case, y'all never know!</p>
            </aside>

            <hr />

            <aside class="sidebar-item">
                <h3 class="sidebar-heading">Item on the sidebar</h3>
                <p class="sidebar-p">Some sidebar text.</p>
                <p class="sidebar-p">Here's another paragraph. Just in case, y'all never know!</p>
            </aside>

            <hr />

            <aside class="sidebar-item">
                <h3 class="sidebar-heading">Social Media Guff</h3>
                <div class="social-rubbish">
                    <a href="#fb"><div class="icon-container fb-icon"><img src="img/social128/facebook_001.jpg"></div></a>
                    <a href="#tw"><div class="icon-container twitter-icon"><img src="img/social128/Twitter_001.jpg"></div></a>
                    <a href="#rs"><div class="icon-container rss-icon"><img src="img/social128/RSS_001.jpg"></div></a>
                </div>
            </aside>

            <hr />




        </div>

        -->

    </div>

</section>

<?php get_footer(); ?>