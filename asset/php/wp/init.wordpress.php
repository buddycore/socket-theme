<?php

# TODO: Make this an option
add_filter('show_admin_bar', '__return_false');
// Remove WooCommerce Default styles
add_filter('woocommerce_enqueue_styles', '__return_empty_array');
# Include our style and scripts
function sc_script_style(){
    wp_enqueue_script('jquery');
    wp_register_script('jquery-ui', get_template_directory_uri().'/asset/js/plugin/jquery.ui.min.js', array(), '1.5', true);
    wp_enqueue_script('jquery-ui');

    wp_enqueue_script('sc-processing', get_template_directory_uri().'/asset/js/plugin/processing.min.js', null, '1.0', true);

    wp_register_script('cenav', get_template_directory_uri().'/asset/js/plugin/jquery.plugin.cenav.js', array(), '1.5', true);
    wp_enqueue_script('cenav');

    wp_register_script('scrollbar', get_template_directory_uri().'/asset/js/plugin/jquery.scrollbar.js', array(), '1.5', true);
    wp_enqueue_script('scrollbar');
    // if(is_home()) : 
    //     wp_register_script('snowflake', get_template_directory_uri().'/asset/js/plugin/snowflakes.js', array(), '1.5', true);
    //     wp_enqueue_script('snowflake');
    // endif;
    wp_enqueue_style('sc-app-style', get_template_directory_uri().'/asset/css/app.min.css', array(), '0.1');
    wp_enqueue_script('sc-app-script', get_template_directory_uri().'/asset/js/jquery.app.js', array('jquery'), '1.7', true);
    if(is_singular()) :
        wp_enqueue_script('comment-reply');
    endif;
}
add_action('wp_enqueue_scripts', 'sc_script_style', 50);

# Remove junk
function sc_wp_remove_head() {
    remove_action('wp_head', 'feed_links');
    remove_action('wp_head', 'feed_links_extra');
    remove_action('wp_head', 'rsd_link');
    remove_action('wp_head', 'wlwmanifest_link');
    remove_action('wp_head', 'adjacent_posts_rel_link_wp_head');
    remove_action('wp_head', 'locale_stylesheet');
    remove_action('wp_head', 'noindex');
    remove_action('wp_head', 'wp_print_styles');
    remove_action('wp_head', 'wp_print_head_scripts');
    remove_action('wp_head', 'wp_generator');
    remove_action('wp_head', 'rel_canonical');
    remove_action('wp_head', 'wp_shortlink_wp_head');
    remove_action('wp_head', 'index_rel_link');
    remove_action('wp_head', 'parent_post_rel_link');
    remove_action('wp_head', 'start_post_rel_link');
    remove_action('wp_head', 'wp_generator');
    remove_action('wp_head', 'print_emoji_detection_script', 7);
    remove_action('wp_print_styles', 'print_emoji_styles');
    remove_action('admin_print_scripts', 'print_emoji_detection_script');
    remove_action('admin_print_styles', 'print_emoji_styles');
    remove_action('wp_head', 'rest_output_link_wp_head', 10);
    remove_action('wp_head', 'wp_oembed_add_discovery_links', 10);
}
add_action('init', 'sc_wp_remove_head');

function custom_excerpt_length($length) {
    return 40;
}
add_filter('excerpt_length', 'custom_excerpt_length', 999);

// Theme support and WordPress enhancements
add_theme_support('custom-header'); 
add_theme_support('custom-background');

add_theme_support('post-thumbnails');
set_post_thumbnail_size(1200, 600, array('center', 'center'));

add_theme_support('title-tag');
add_theme_support('automatic-feed-links');
add_theme_support('html5', array('comment-list', 'comment-form', 'search-form', 'gallery', 'caption'));
# add_theme_support('post-formats', array('audio', 'video'));

// When inserting images via the editor, the markup will use <figure>
// https://css-tricks.com/snippets/wordpress/insert-images-with-figurefigcaption/
function sc_html5_editor_figure_img($html, $id, $caption, $title, $align, $url) {

    $html5  = "<figure id='post-$id media-$id' class='align-$align'>";
    $html5 .= "<img src='$url' alt='$title' />";
    
    if($caption) :

        $html5 .= "<figcaption>$caption</figcaption>";

    endif;

    $html5 .= "</figure>";

    return $html5;

}
add_filter('image_send_to_editor', 'sc_html5_editor_figure_img', 10, 9);

// Search through posts only on search results page
// http://www.wpbeginner.com/wp-tutorials/how-to-exclude-pages-from-wordpress-search-results/
function sc_filter_search($query) {
    
    if($query->is_search) :
        
        $query->set('post_type', 'post');

    endif;

    return $query;

}

add_filter('pre_get_posts','sc_filter_search');

# Register menus
function sc_register_menus(){
    register_nav_menus(array(
        'primary'             => __('Primary', 'surface'),
        'footer'              => __('Footer', 'surface'),
        'categories'          => __('Categories', 'surface'),
        'product-categories'          => __('Product Categories', 'surface')
    ));
}
add_action('init', 'sc_register_menus');

if(!isset($content_width)) $content_width = 900;

// Master Social Media Links - Only for Administrator
// See helper function for output in fns.helper.php
function sc_add_profile_fields($fields){
    if(is_super_admin()) :
        $fields['twitter'] = 'Twitter URL:';
        $fields['facebook'] = 'Facebook URL:';
        $fields['gplus'] = 'Google+ URL:';
        $fields['youtube'] = 'YouTube URL:';
        $fields['vimeo'] = 'Vimeo URL:';
        $fields['flickr'] = 'FlickR URL:';
        $fields['twitch'] = 'Twitch URL:';
        $fields['behance'] = 'Behance URL:';
        $fields['dribble'] = 'Dribble URL:';
        $fields['soundcloud'] = 'SoundCloud URL:';
        $fields['instagram'] = 'Tripadvisor URL:';
        $fields['tripadvisor'] = 'Tripadvisor URL:';
        $fields['github'] = 'Github URL:';
        $fields['codepen'] = 'CodePen URL:';
        $fields['lastfm'] = 'LastFM URL:';
        $fields['delicious'] = 'Delicious URL:';
        $fields['linkedin'] = 'LinkedIn URL:';
        $fields['pinterest'] = 'Pinterest URL:';
        return $fields;
    endif;
}
add_filter('user_contactmethods', 'sc_add_profile_fields');
