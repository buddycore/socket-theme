<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/'  ) ); ?>">
    <fieldset>
        <input type="search" id="woocommerce-product-search-field" class="search-field" placeholder="<?php echo esc_attr_x( 'Search Products&hellip;', 'placeholder', 'woocommerce' ); ?>" value="<?php echo get_search_query(); ?>" name="s" title="<?php echo esc_attr_x( 'Search for:', 'label', 'woocommerce' ); ?>" />
        <button type="submit"><?php echo esc_attr_x('Search', 'submit button', 'woocommerce'); ?></button>
        <input type="hidden" name="post_type" value="product" />
    </fieldset>
</form>