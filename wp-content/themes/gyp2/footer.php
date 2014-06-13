<footer id="footer">

    <div class="wrap">

        <section id="footer-siteinfo">
            <p>Design and development by <a href="http://lunchtime.org.uk">Rob Welch</a> with help from <a href="http://www.cenix.co.uk">Daniel Morgan</a>. Original logo by <a href="http://kalisdevals.tumblr.com">Kalis De Vals</a>. Social Icons by <a href="http://ctrla.lt/">Ctrl+Alt+Design</a>.</p>
            <p>All content is owned by the author. Site design released under a <a href="#">KYGMOYGPL</a> license. GYP is run by volunteers, <a href="#">find out how you can get invovled!</a></p>
        </section>

        <section id="footer-links">
            <ul id="footer-links-list">
                <li><a href="#">Issue Tracker</a> (find a bug?)</li>
                <li><a href="mailto:kyle@gatheryourparty.com">Contact us</a> (tips/corrections?)</li>
                <li><a href="<?php get_home_url(); ?>/apply">Contribute to GYP!</a></li>
                <li><a href="<?php get_home_url(); ?>/wp-admin">Login</a></li>
            </ul>

        </section>

    </div>

</footer>

<?php wp_footer(); ?>

         <!-- <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>-->
         <!--<script>window.jQuery || document.write('<script src="js/vendor/jquery-1.9.1.min.js"><\/script>')</script>-->
         <!-- Commenting the two above lines is strictly temporary fot while the site is on the local dev server -->

        <script src="<?php bloginfo('template_url'); ?>/js/vendor/jquery-1.9.1.min.js"></script>
        <script src="<?php bloginfo('template_url'); ?>/js/plugins.js"></script>
        <script src="<?php bloginfo('template_url'); ?>/js/main.js"></script>

        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID.         -->
        <script>
            var _gaq=[['_setAccount','UA-30762260-1'],['_trackPageview']];
            (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
            g.src='//www.google-analytics.com/ga.js';
            s.parentNode.insertBefore(g,s)}(document,'script'));
        </script>

    </body>
</html>