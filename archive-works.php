<?php get_header(); ?>
<!-- <div id="stalker"></div> -->


<section id="archive-works" class="archive-works">
    <div class="archive-works__inner">
        <h2 class="section__title">実績紹介</h2>

        <?php
        if (is_post_type_archive('works') || is_singular('works')) {
            get_template_part('template/breadcrumb-works');
        } else {
            get_template_part('template/breadcrumb');
        }
        ?>

        <div class="archive-works__content">
            <ul class="archive-works__list">

            <?php
                $paged = get_query_var('paged') ? get_query_var('paged') : 1;
                $args = array(
                    'posts_per_page' => 6, // ここを「1ページに表示する最大投稿数」と一致させる
                    'paged' => $paged, // 一行目の$paged = get_query_var...も忘れずに書く
                    'post_type' => 'works',
                );
                query_posts($args); ?>
                <?php if (have_posts()) : ?>
                    <?php while (have_posts()) : the_post(); ?>

                    <li class="archive-works__item">
                        <a href="<?php the_permalink(); ?>">
                            <div class="archive-works__img">
                                <?php $pic = get_field('picture1'); if( !empty($pic) ): ?>
                                    <img src="<?php echo $pic['url']; ?>" alt="<?php echo $pic['alt']; ?>" />
                                <?php endif; ?>
                            </div>
                            <h3 class="archive-works__company"><?php echo get_the_title(); ?></h3>
                            <p class="archive-works__role"><?php echo esc_html(get_post_meta(get_the_ID(), 'role', true)); ?></p>
                        </a>
                    </li>
                    <?php endwhile; ?>
                    <?php endif; ?>

                </ul>

                <?php get_template_part('template/pagenavi'); ?>

        </div>
    </div>
</section>


<?php get_footer(); ?>