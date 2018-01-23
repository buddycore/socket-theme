<?php if(post_password_required()) : return; endif; ?>

<div class="comments-area">

    <?php if(!comments_open() && get_comments_number() && post_type_supports(get_post_type(), 'comments')) : ?>
        
        <p class="message info"><?php _e('Comments are closed.', 'centro'); ?></p>

    <?php endif; ?>

    <?php comment_form(); ?>

    <?php if(have_comments()) : ?>

        <ol class="comment-list" id="comments">
            <?php
            $args = array(
                'style'       => 'ol',
                'short_ping'  => true,
                'avatar_size' => 40
            );

            wp_list_comments($args);
            ?>          
        </ol>

        <?php the_comments_navigation(); ?>

    <?php endif; ?>

</div><!-- comments area -->