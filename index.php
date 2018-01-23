<?php get_header(); ?>

<?php locate_template('templates/partial/filter/nav.categories.php', true, true); ?>

<div class="global-notice">
    <p>This site is currently in development</p>
</div>

<?php if(have_posts()) : ?>

    <div class="posts">

        <?php while(have_posts()) : the_post(); ?>

            <?php get_template_part('content'); ?>

        <?php endwhile; ?>

    </div><!-- ARRAY -->

    <?php if(paginate_links()) : ?>

        <?php
        $args = array(
            'prev_text' => false,
            'next_text' => false
        );
        ?>
        <div class="pagination"><div class="inner"><?php echo paginate_links($args); ?></div></div>

    <?php endif; ?>

<?php else : ?>
    
    <div class="padder">
        <div class="message no-results">
            <p>No posts were found. <a href="<?php echo home_url('/'); ?>">Return to Index?</a></p>
        </div>
    </div>

<?php endif; ?>

<?php get_footer(); ?>