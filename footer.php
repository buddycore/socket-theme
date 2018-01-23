    </main>
    <span class="push"></span>
</div><!-- CONTAINER -->

<?php if(get_theme_mod('sc_footer')) : ?>

    <footer class="global full">
        <div class="widgets">
        <?php if(function_exists('dynamic_sidebar') && dynamic_sidebar('footer-widgets')) : else : ?>

            <div class="pre-widget">
                <h6>Widgetized Area</h6>
                <p>This panel is active and ready for you to add some widgets via the WP Admin</p>
            </div>

        <?php endif; ?>
        </div>
        <nav>
            <?php 
            if(has_nav_menu('footer')) :

                $defaults = array(
                    'theme_location'    => 'footer',
                    'container'         => false,
                    'items_wrap'        => '<ul class="footer">%3$s</ul>',
                    'walker' => new Nfr_Menu_Walker()
                );

                wp_nav_menu($defaults);

            endif;
            ?>
            <h1 class="logo">
                <a href="<?php echo home_url('/'); ?>">
                    <span class="lrg">
                        <span class="inner">
                            <?php if(get_theme_mod('sc_logo')) : ?>
                                <img src="<?php echo get_theme_mod('sc_logo'); ?>" alt="<?php echo get_bloginfo('name'); ?>">
                            <?php else : ?>
                                <span class="tx">
                                    <span class="name"><?php bloginfo('name'); ?></span>
                                    <span class="description"><?php bloginfo('description'); ?></span>
                                </span>
                            <?php endif; ?>
                        </span>
                    </span>
                    <span class="sml">
                        <span class="inner">
                            <?php if(get_theme_mod('sc_logo_sml')) : ?>
                                <img src="<?php echo get_theme_mod('sc_logo_sml'); ?>" alt="<?php echo get_bloginfo('name'); ?>" class="logo_sml">
                            <?php else : ?>
                                <span class="tx">
                                    <span class="name"><?php bloginfo('name'); ?></span>
                                    <span class="description"><?php bloginfo('description'); ?></span>
                                </span>
                            <?php endif; ?>
                        </span>
                    </span>
                </a>
            </h1>
        </nav>
    </footer>

<?php else : ?>

    <footer class="global small">
        <nav>
            <?php 
            if(has_nav_menu('footer')) :

                $defaults = array(
                    'theme_location'    => 'footer',
                    'container'         => false,
                    'items_wrap'        => '<ul class="footer">%3$s</ul>',
                    'walker' => new Nfr_Menu_Walker()
                );

                wp_nav_menu($defaults);

            endif;
            ?>
            
            <?php if(get_theme_mod('sc_show_sc_links')) : ?>

                <?php echo sc_social_links(1, true); ?>

            <?php endif; ?>

            <h1 class="logo">
                <a href="<?php echo home_url('/'); ?>">
                    <span class="lrg">
                        <span class="inner">
                            <span class="tx">
                                <span class="name"><?php bloginfo('name'); ?></span>
                                <span class="description"><?php bloginfo('description'); ?></span>
                            </span>
                        </span>
                    </span>
                </a>
            </h1>
        </nav>
    </footer>

<?php endif; ?>

<?php wp_footer(); ?>
</body>
</html>