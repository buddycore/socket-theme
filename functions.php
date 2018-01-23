<?php
// Helper
function asset_url($path) {
    return get_template_directory_uri().'/asset/'.$path;
}

locate_template('/asset/php/wp/init.wordpress.php', true, true);
locate_template('/asset/php/wp/class.walker.php', true, true);
locate_template('/asset/php/wp/customizer.php', true, true);
locate_template('/asset/php/wp/widgets.php', true, true);

add_action( 'after_setup_theme', 'woocommerce_support' );
function woocommerce_support() {
    add_theme_support( 'woocommerce' );
}

remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15 );
remove_action( 'woocommerce_before_main_content','woocommerce_breadcrumb', 20, 0);
