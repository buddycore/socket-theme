<?php

function sc_customizer($wp_customize){

    // WordPress
    # LOGO
    $wp_customize->add_panel('sc_panel_wp',
        array(
            'title'          => 'WordPress',
            'description'    => 'WordPress related options',
            'capability'     => 'manage_options',
            'theme-supports' => '',
            'priority'       => '10'
        )
    );

    $wp_customize->add_section('sc_wp_display', array(
        'title'          => 'Configure',
        'description'   => 'WordPress related options',
        'theme-supports'    => '',
        'priority'          => '10',
        'panel'             => 'sc_panel_wp'
    ));

            $wp_customize->add_setting('sc_logo', array(
                'default'   => asset_url('img/default/logo.png'),
                'transport' => 'refresh'
            ));

            $wp_customize->add_control(
                new WP_Customize_Image_Control($wp_customize, 'sc_logo', 
                    array(
                        'label'      => __('Desktop Logo', 'surface'),
                        'section'    => 'sc_wp_display',
                        'settings'   => 'sc_logo',
                    )
                )
            );

            $wp_customize->add_setting('sc_logo_sml', array(
                'default'   => asset_url('img/default/logo.png'),
                'transport' => 'refresh'
            ));
            
            $wp_customize->add_control(
                new WP_Customize_Image_Control($wp_customize, 'sc_logo_sml', 
                    array(
                        'label'      => __('Desktop Logo', 'surface'),
                        'section'    => 'sc_wp_display',
                        'settings'   => 'sc_logo_sml',
                    )
                )
            );

            $wp_customize->add_setting('sc_primary_colour', array(
                'default'   => '#121212',
                'transport' => 'refresh'
            ));

            $wp_customize->add_control( 
                new WP_Customize_Color_Control($wp_customize, 'sc_primary_colour', 
                    array(
                        'label'      => __('Primary Color', 'surface'),
                        'section'    => 'sc_wp_display',
                        'settings'   => 'sc_primary_colour',
                    )
                ) 
            );

            $wp_customize->add_setting('sc_accent_colour', array(
                'default'   => '#bd4832',
                'transport' => 'refresh'
            ));

            $wp_customize->add_control( 
                new WP_Customize_Color_Control($wp_customize, 'sc_accent_colour', 
                    array(
                        'label'      => __('Accent Color', 'surface'),
                        'section'    => 'sc_wp_display',
                        'settings'   => 'sc_accent_colour',
                    )
                ) 
            );

            # FOOTER
            $wp_customize->add_setting('sc_footer', array(
                'default'   => null,
                'transport' => 'refresh',
                'sanitize_callback' => 'sc_sanitize_sc_footer'
            ));

            function sc_sanitize_sc_footer($val) {
                if($val) {
                    return true;
                }
                else {
                    return false;
                }
            }

            $wp_customize->add_control( 
                new WP_Customize_Control($wp_customize, 'sc_footer', 
                    array(
                        'label'      => __('Large Footer?', 'surface'),
                        'section'    => 'sc_wp_display',
                        'settings'   => 'sc_footer',
                        'type'       => 'checkbox'
                    )
                ) 
            );

            # SHOW SOCIAL
            $wp_customize->add_setting('sc_sheen', array(
                'default'   => null,
                'transport' => 'refresh',
                'sanitize_callback' => 'sc_sanitize_sc_sheen'
            ));

            function sc_sanitize_sc_sheen($val) {
                if($val) {
                    return true;
                }
                else {
                    return false;
                }
            }

            $wp_customize->add_control( 
                new WP_Customize_Control($wp_customize, 'sc_sheen', 
                    array(
                        'label'      => __('Add sheen?', 'surface'),
                        'section'    => 'sc_wp_display',
                        'settings'   => 'sc_sheen',
                        'type'       => 'checkbox'
                    )
                ) 
            );

            # SHOW SOCIAL
            $wp_customize->add_setting('sc_show_sc_links', array(
                'default'   => null,
                'transport' => 'refresh',
                'sanitize_callback' => 'sc_sanitize_show_sc_links'
            ));

            function sc_sanitize_show_sc_links($val) {
                if($val) {
                    return true;
                }
                else {
                    return false;
                }
            }

            $wp_customize->add_control( 
                new WP_Customize_Control($wp_customize, 'sc_show_sc_links', 
                    array(
                        'label'      => __('Show social media links?', 'surface'),
                        'section'    => 'sc_wp_display',
                        'settings'   => 'sc_show_sc_links',
                        'type'       => 'checkbox'
                    )
                ) 
            );

             $wp_customize->add_setting('sc_infinite_scroll', array(
                'default'   => null,
                'transport' => 'refresh',
                'sanitize_callback' => 'sc_sanitize_infinite_scroll'
            ));

            function sc_sanitize_infinite_scroll($val) {
               if($val) {
                    return true;
                }
                else {
                    return false;
                }
            }

            $wp_customize->add_control( 
                new WP_Customize_Control($wp_customize, 'sc_infinite_scroll', 
                    array(
                        'label'      => __('Enable archive infinite scroll?', 'surface'),
                        'section'    => 'sc_wp_display',
                        'settings'   => 'sc_infinite_scroll',
                        'type'       => 'checkbox'
                    )
                ) 
            );

            # FIXED NAV
            $wp_customize->add_setting('sc_fixed_nav', array(
                'default'   => null,
                'transport' => 'refresh',
                'sanitize_callback' => 'sc_sanitize_fixed_nav'
            ));

            function sc_sanitize_fixed_nav($val) {
                if($val) {
                    return true;
                }
                else {
                    return false;
                }
            }

            $wp_customize->add_control( 
                new WP_Customize_Control($wp_customize, 'sc_fixed_nav', 
                    array(
                        'label'      => __('Fix Header Nav', 'surface'),
                        'section'    => 'sc_wp_display',
                        'settings'   => 'sc_fixed_nav',
                        'type'       => 'checkbox'
                    )
                ) 
            );

            # Analytics
            $wp_customize->add_setting('sc_analytics', array(
                'transport' => 'postMessage'
            ));
            $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'sc_analytics', array(
                'label'      => __('Site Analytics', 'sc'),
                'section'    => 'sc_wp_display',
                'settings'   => 'sc_analytics',
                'type'      => 'textarea'
            )));

            # Global Notice
            $wp_customize->add_setting('sc_notice', array(
                'transport' => 'postMessage'
            ));
            $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'sc_notice', array(
                'label'      => __('Global Notice', 'sc'),
                'section'    => 'sc_wp_display',
                'settings'   => 'sc_notice',
                'type'      => 'textarea'
            )));

    // BuddyPress    
    $wp_customize->add_panel('sc_panel_bp',
        array(
            'title'          => 'BuddyPress',
            'description'    => 'BuddyPress related options',
            'capability'     => 'manage_options',
            'theme-supports' => '',
            'priority'       => '10'
        )
    );

    $wp_customize->add_section('sc_bp_display', array(
        'title'          => 'Configure',
        'description'   => 'BuddyPress related options',
        'theme-supports'    => '',
        'priority'          => '10',
        'panel'             => 'sc_panel_bp'
    ));

            # Account Menu 
            $wp_customize->add_setting('sc_show_bp_menu', array(
                'default'   => null,
                'transport' => 'refresh',
                'sanitize_callback' => 'sc_sanitize_show_bp_menu'
            ));

            function sc_sanitize_show_bp_menu($val) {
                if($val) {
                    return true;
                }
                else {
                    return false;
                }
            }

            $wp_customize->add_control( 
                new WP_Customize_Control($wp_customize, 'sc_show_social_links', 
                    array(
                        'label'      => __('Show social media links?', 'surface'),
                        'section'    => 'sc_bp_display',
                        'settings'   => 'sc_show_bp_menu',
                        'type'       => 'checkbox'
                    )
                ) 
            );
    
}
add_action('customize_register', 'sc_customizer');

// Live mods in customizer via the following script
function sc_customizer_script() {
    wp_enqueue_script('sc-app-customizer', asset_url('js/jquery.customizer.js'), array('jquery'), '0.0.9', true);
}
add_action('customize_preview_init', 'sc_customizer_script');