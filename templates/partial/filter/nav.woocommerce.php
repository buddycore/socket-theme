<nav class="filter">

    <?php if(has_nav_menu('product-categories')) : ?>

        <div class="links">
            <?php 

            $defaults = array(
                'theme_location'    => 'product-categories',
                'container'         => false,
                'items_wrap'        => '<ul class="product-categories">%3$s</ul>',
                'walker' => new Nfr_Menu_Walker()
            );

            wp_nav_menu($defaults);

            ?>
        </div><!-- LINKS -->

    <?php endif; ?>

    <div class="other">        
        <?php wc_get_template('product-searchform.php'); ?>
    </div>

</nav>

<nav class="filter-responsive">
    <?php if(has_nav_menu('product-categories')) : ?>

        <div class="links">
            <ul class="top-level">
                <li><button class="toggle-filter"><span>Toggle Filter</span></button>
                    <ul class="sub-level">
                    <?php 

                    $defaults = array(
                        'theme_location'    => 'product-categories',
                        'container'         => false,
                        'items_wrap'        => '%3$s',
                        'walker' => new Nfr_Menu_Walker()
                    );

                    wp_nav_menu($defaults);

                    ?>
                </li>
            </ul>
        </div><!-- LINKS -->

    <?php endif; ?>

    <div class="other">
        <?php wc_get_template('product-searchform.php'); ?>
    </div>
</nav>