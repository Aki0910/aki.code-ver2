<?php get_header(); ?>
<!-- <div id="stalker"></div> -->


<section id="topics" class="topics">
    <div class="inner">
        <h2 class="section__title">お知らせ</h2>
        
        <?php
        if (is_post_type_archive('works') || is_singular('works')) {
            get_template_part('template/breadcrumb-works');
        } else {
            get_template_part('template/breadcrumb');
        }
        ?>

        <div class="topics__content">
            <ul class="topics__list">
            <?php
                $paged = get_query_var('paged') ? get_query_var('paged') : 1;
                $args = array(
                    'posts_per_page' => 10, // ここを「1ページに表示する最大投稿数」と一致させる
                    'paged' => $paged, // 一行目の$paged = get_query_var...も忘れずに書く
                    'post_type' => 'topics',
                );
                query_posts($args); ?>
                <?php if (have_posts()) : ?>
                    <?php while (have_posts()) : the_post(); ?>

                <li class="topics__item">
                    <div class="topics__wrap">
                        <div class="topics__date"><?php echo get_the_date(); ?></div>
                        <p class="topics__category">
                            <?php
                                if ($terms = get_the_terms($post->ID, 'info')) {
                                foreach ( $terms as $term ) {
                                echo esc_html($term->name);
                                }
                                }
                            ?>
                        </p>
                    </div>
                    <h3 class="topics__head"><?php the_title(); ?></h3>
                </li>
                <?php endwhile; ?>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</section>


<?php get_footer(); ?>