<?php get_header(); ?>


<div class="container">
        <main class="main">
            <?php if (have_posts() ) : ?>
                <?php get_template_part('template/loop'); ?>
            <?php
            if(function_exists('pagination')) {
                pagination($wp_query->max_num_pages);
            }
            ?>
            <?php endif; ?>

        </main>

        <?php get_sidebar(); ?>

    </div>



<?php get_footer(); ?>