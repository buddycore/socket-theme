<?php get_header(); ?>

<?php locate_template('templates/partial/filter/nav.categories.php', true, true); ?>

<?php the_post(); ?>

<div class="padder">

    <article class="post-single">

        <header>

            <?php if(get_the_post_thumbnail()) : ?>

                <figure>
                    <?php the_post_thumbnail('blog-single'); ?>
                </figure>

            <?php endif; ?>

            <ul class="actions">
                <li class="format <?php echo get_post_format(); ?>"><span>Format: <?php echo get_post_format(); ?></span></li>
                <li class="comments"><a href="<?php the_permalink(); ?>#comments"><?php comments_number('0 Comments', '1 Comment', '% Comments'); ?></a></li>
            </ul>

            <div>

                <p class="categories"><?php echo get_the_category_list(' &middot; '); ?></p>
                <?php if(get_the_title()) : ?><h2><?php the_title(); ?></h2><?php endif; ?>
                <p class="published"><?php the_author_posts_link(); ?> &middot; <?php the_time('jS \of F, Y'); ?></p>

            </div>

        </header>

        <section>

            <div class="the-content standardise">
                <?php if(get_the_content() || is_attachment()) : ?>
                    <?php the_content(); ?>
                <?php else : ?>
                <div class="message no-content">
                    <p>There is no content for this post yet.</p>
                </div>
                <?php endif; ?>
                <?php
                $pagination = get_the_posts_pagination(array(
                    'mid_size' => 2,
                    'prev_text' => __('Newer', 'centro'),
                    'next_text' => __('Older', 'centro'),
                ));
                ?>
            </div>

            <div class="pages">
                <?php wp_link_pages(); ?>
            </div>
            
            <?php if(get_the_tags()) : ?>
            <div class="the-tags">
                <h6>Post Tags</h6>
                <?php the_tags('', '', ''); ?>
            </div> 
            <?php endif; ?>

            <?php if(comments_open()) : ?>
                <?php comments_template(); ?>
            <?php else : ?>
                <div class="message comments-closed">
                    <p>Comments are closed for this post.</p>
                </div>
            <?php endif; ?>
        </section>

    </article>

</div><!-- PADDER -->

<?php get_footer(); ?>