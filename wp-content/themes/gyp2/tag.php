<!--ATTENTION: THIS PAGE DOES NOTHING

    -YOUR LAZY PAST SELF -->

<?php get_header(); ?>

<img id="background" src="<?php bloginfo('template_url'); ?>/img/defaultbgv4.jpg">

<img id="logo" src="<?php bloginfo('template_url'); ?>/img/placeholderlogo.png">

<h2>Gather <em>Your</em> Party</h2>
<div id="strap">Honest Gaming Journalism</div>

<section id="main">
    <div class="wrap">

<?php $custom_query = new WP_Query(); // don't show user bios
while(have_posts()) : the_post(); ?>

	    <a href="<?php the_permalink(); ?>">
            <div class="article-recent">

                <?php the_post_thumbnail( 'front-page-standard', array('class' => "article-thumb") ); ?> 
                
                <div class="article-info">

                    <h3 class="article-title"><?php the_title(); ?></h3>
                    <p class="article-description"><?php $myExcerpt = excerpt('37'); $tags = array("<p>", "</p>"); $myExcerpt = str_replace($tags, "", $myExcerpt); echo $myExcerpt; //seriously fuck wordpress and its errant tags ?></p>
                    <div class="article-meta">
                        <div class="date"><?php echo get_the_date(); ?></div>
                        <div class="comment-num"><a href="<?php comments_link(); ?>"><?php comments_number( 'no comments', 'one comment', '% comments' ); ?></a></div>
                        <div class="author">By <?php the_author_posts_link(); ?></div>

                    </div>
                </div>
            </div>
        </a>

        <hr />

<?php endwhile; ?>
<?php wp_reset_postdata(); // reset the query ?>

<!--

        <div class="older-articles">

<?php $custom_query = new WP_Query('tags=-bio&showposts=5&offset=5'); // don't show user bios
while(have_posts()) : the_post(); ?>

            <a href="<?php the_permalink(); ?>">
                <div class="article">
                    <?php the_post_thumbnail( 'front-page-standard', array('class' => "article-thumb") ); ?>
                        <div class="article-info">
                            <h3 class="article-title"><?php the_title(); ?></h3>
                            <p class="article-description"><?php $myExcerpt = excerpt('37'); $tags = array("<p>", "</p>"); $myExcerpt = str_replace($tags, "", $myExcerpt); echo $myExcerpt; //seriously fuck wordpress and its errant tags ?></p></a>
                            <div class="article-meta">
                                    <div class="comment-num"><a href="#auth"><a href="<?php comments_link(); ?>"><?php comments_number( 'no comments', 'one comment', '% comments' ); ?></a></a></div>
                                    <div class="author">By <?php the_author_posts_link(); ?></div>
                            </div>
                        </div>
                    </div>
                </a>

            <hr/>

<?php endwhile; ?>
<?php wp_reset_postdata(); // reset the query ?>

-->

<div id="pagination">

    <a href="#" class="button pagination-newer">Newer</a>
    <form id="jump-to-page-form" method="post">
        <input type="text" id="jump-to-page" placeholder="Jump to page" size="12" />
        <input type="submit" id="jump-to-page-submit" hidefocus="true" />
    </form>
    <a href="#" class="button pagination-older">Older</a>

</div>

        </div>

<!--
        
    <div id="sidebar" class="sidebar">
    <?php if ( is_active_sidebar( 'sidebar-front' ) ) : ?>
    <?php dynamic_sidebar( 'sidebar-front' ); ?>
    <?php endif; ?>
    </div>

-->
        


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