<?php
$css_helper = 'standard';

if(is_sticky()) : 

    $css_helper .= ' sticky'; 

endif; 

?>

<article class="item <?php echo $css_helper; ?>">

    <div class="inner">

        <?php if(get_the_post_thumbnail()) : ?>

            <figure>
                <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
            </figure>

        <?php endif; ?>

        <div class="excerpt">
            <?php 
            $cats = count(get_the_terms($post->ID, 'category'));
            ?>
            <?php if($cats > 2) : ?>
                
                <p class="categories">

                    <?php foreach(get_the_terms($post->ID, 'category') as $cat) : ?>

                        <a href="<?php echo home_url('/blog/category/'. $cat->slug); ?>"><?php echo $cat->name; ?></a> 

                        <?php 
                        if(++$i > 2) :
                            echo '...';
                            break;
                        endif;
                        ?>

                        &middot;
                        
                    <?php endforeach; ?>

                </p>

            <?php else : ?>

                <p class="categories"><?php echo get_the_category_list(' &middot; '); ?></p>

            <?php endif; ?>
            
            <?php if(get_the_title()) : ?><h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2><?php endif; ?>
            <p class="published"><?php the_author_posts_link(); ?> &middot; <?php the_time('jS \of F, Y'); ?></p>
            
            <div class="standardise"><?php the_excerpt(); ?></div>

        </div><!-- EXCERPT -->

        <ul class="actions">
            <li class="format <?php echo get_post_format(); ?>"><span>Format: <?php echo get_post_format(); ?></span></li>
            <li class="comments"><a href="<?php the_permalink(); ?>#comments"><?php comments_number('0 Comments', '1 Comment', '% Comments'); ?></a></li>
            <li class="permalink"><a href="<?php the_permalink(); ?>">Read Post</a></li>
        </ul>

    </div><!-- INNER -->

</article>