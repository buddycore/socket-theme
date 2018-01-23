<?php 
if(get_theme_mod('sc_sheen')) : 
    $sc_classes = 'sheen ';
endif; 
if(get_theme_mod('sc_footer')) : 
    $sc_classes .= 'footer-lrg';
endif;
?>
<!DOCTYPE html <?php language_attributes(); ?>>
<html lang="en" <?php if($sc_classes) : echo 'class="'.$sc_classes.'"'; endif; ?>>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0">
<meta name="msapplication-tap-highlight" content="no">
<?php wp_head(); ?>
<?php if(get_theme_mod('sc_analytics')) : echo get_theme_mod('sc_analytics'); endif; ?>
<?php locate_template('templates/partial/style/header.custom.php', true, true); ?>
</head>

<body <?php body_class(); ?>>

    <div class="container">
        
        <header class="global">
            <nav>
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
                <?php 
                if(has_nav_menu('primary')) :

                    $defaults = array(
                        'theme_location'    => 'primary',
                        'container'         => false,
                        'items_wrap'        => '<ul class="primary">%3$s</ul>',
                        'walker' => new Nfr_Menu_Walker()
                    );

                    wp_nav_menu($defaults);

                endif;
                ?>
                <ul class="buddypress">
                    <?php if(class_exists('WooCommerce')) : global $woocommerce; ?>
                        <li class="cart"><a href="<?php echo $woocommerce->cart->get_cart_url(); ?>"><span><?php echo count($woocommerce->cart->cart_contents); ?></span></a></li>
                    <?php endif; ?>
                        
                    <?php if(!is_user_logged_in()) : ?>
                        <li class="register"><a href="<?php echo home_url(BP_REGISTER_SLUG); ?>">Register</a></li>
                        <li class="login"><a href="<?php echo wp_login_url('/'); ?>">Login</a></li>
                    <?php else : ?>
                        <?php if(!bp_notifications_get_unread_notification_count(bp_loggedin_user_id())) : ?>
                        <li class="notifications">
                            <a href="<?php echo bp_loggedin_user_domain(); ?>notifications" class="notifications"><span><?php echo bp_notifications_get_unread_notification_count(bp_loggedin_user_id()); ?></span></a>
                        </li>
                        <?php endif; ?>
                        <li class="messages">
                            <a href="#" class="messages"><span>4</span></a>
                        </li>
                        <li class="account">
                            <a href="<?php echo bp_loggedin_user_domain(); ?>" class="user">
                                <span class="img"><?php bp_loggedin_user_avatar('width=40&height=40'); ?></span>
                                <span class="uname"><?php echo bp_core_get_user_displayname(bp_loggedin_user_id()); ?></span>
                                <span class="toggle"><span>Toggle Sub Menu</span></span>
                            </a>
                            <a href="<?php echo wp_logout_url('/'); ?>" class="logout"><span>Logout</span></a>
                            <ul class="sub-menu">
                                <li><a href="#">Profile</a></li>
                                <li><a href="#">Messages <span>5</span></a></li>
                                <li><a href="#">Notifications</a></li>
                                <li><a href="#">Friends <span>23</span></a></li>
                                <li><a href="#">Groups</a></li>
                                <li><a href="#">Sites</a></li>
                                <li><a href="#">Settings</a></li>
                            </ul>
                        </li>
                    <?php endif; ?>
                </ul>
                <button class="respond site"><span>Toggle Site Menu</span></button>
                <button class="respond user"><span>Toggle User Menu</span></button>
            </nav>
        </header>

        <main>