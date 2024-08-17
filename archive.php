<?php get_header(); ?>


<div class="container">
        <main class="main">
        <article class="main__card">
            <div class="main__inner">
                <h2 class="section__title">ブログ一覧</h2>

                <?php if (have_posts() ) : ?>
                    <?php get_template_part('template/loop'); ?>
                <?php
                if(function_exists('pagination')) {
                    pagination($wp_query->max_num_pages);
                }
                ?>
                <?php endif; ?>
            </div>
        </article>
        </main>

        <?php get_sidebar(); ?>

    </div>



<?php get_footer(); ?>