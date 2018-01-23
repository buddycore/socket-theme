<?php
if (function_exists('register_sidebar')) {

    register_sidebar(array(
        'name' => 'Footer Widgets',
        'id'   => 'footer-widgets',
        'description'   => 'Add widgets to the site footer here.',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div></div>',
        'before_title'  => '<h4>',
        'after_title'   => '</h4><div class="widget-content">'
    ));

}