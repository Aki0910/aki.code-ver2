<?php get_header();?>

<div class="container">
        <main class="main">
            <?php if (have_posts() ) : ?>
                <?php while (have_posts() ) : the_post(); ?>
                <?php
                    $cat = get_the_category();
                    $catname = $cat[0]->cat_name;
                ?>
                <article class="main__card">
                    <h2 class="main__card--title"><?php the_title(); ?></h2>
                    <ul class="main__card--meta">
                        <li class="main__card--date"><?php the_time('Y/m/d'); ?></li>
                        <li class="main__card--archive"><?php echo $catname; ?></li>
                    </ul>
                    <?php if (has_post_thumbnail() ) : ?>
                        <?php the_post_thumbnail('full',array('class' => 'main__card--img')); ?>
                    <?php endif; ?>
                    <div class="main__card--content">
                    <?php echo get_the_content(); ?>

                   </div>        
                </article>
                <?php endwhile; ?>
            <?php
            if(function_exists('pagination')) {
                pagination($wp_query->max_num_pages);
            }
            ?>
            <?php endif; ?>
            <ul class="post-link">
                <li><?php previous_post_link('%link', '< 前の記事へ'); ?></li>
                <li><?php next_post_link('%link', '次の記事へ >'); ?></li>
            </ul>
        </main>

        <?php get_sidebar(); ?>

    </div>


<?php get_footer(); ?>