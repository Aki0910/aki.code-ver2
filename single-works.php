<?php get_header(); ?>
<!-- <div id="stalker"></div> -->


<section id="single-works" class="single-works">
    <div class="single-works__inner">
        <h2 class="section__title">実績紹介</h2>

        <?php
        if (is_post_type_archive('works') || is_singular('works')) {
            get_template_part('template/breadcrumb-works');
        } else {
            get_template_part('template/breadcrumb');
        }
        ?>

        <div class="single-works__content">

            <div class="slider">
                <ul class="slider__wrapper">
                    <li class="slider__img">
                        <?php $pic = get_field('picture1'); if( !empty($pic) ): ?>
                            <img src="<?php echo $pic['url']; ?>" alt="<?php echo $pic['alt']; ?>" />
                        <?php endif; ?>
                    </li>
                    <li class="slider__img">
                        <?php $pic = get_field('picture2'); if( !empty($pic) ): ?>
                            <img src="<?php echo $pic['url']; ?>" alt="<?php echo $pic['alt']; ?>" />
                        <?php endif; ?>
                    </li>
                    <li class="slider__img">
                        <?php $pic = get_field('picture3'); if( !empty($pic) ): ?>
                            <img src="<?php echo $pic['url']; ?>" alt="<?php echo $pic['alt']; ?>" />
                        <?php endif; ?>
                    </li>

                </ul>
                <div class="slider__navigation">
                    <div class="slider__nav-dot" data-index="0"></div>
                    <div class="slider__nav-dot" data-index="1"></div>
                    <div class="slider__nav-dot" data-index="2"></div>
                </div>
            </div>

            <h3 class="single-works__company"><?php echo get_the_title(); ?></h3>
            <p class="single-works__role"><?php echo esc_html(get_post_meta(get_the_ID(), 'role', true)); ?></p>
            <p class="single-works__details">
                <?php echo esc_html(get_post_meta(get_the_ID(), 'details', true)); ?>
            </p>

            <a class="button single-works__button" href="<?php echo esc_html(get_post_meta(get_the_ID(), 'url', true)); ?>">
                    <div class="button__content">
                        <div class="button__img">
                            <img src="<?php echo esc_url(get_theme_file_uri('/img/arrow-white.png')); ?>" alt="実績一覧を見る">
                        </div>
                        <p class="button__text">VIEW ALL</p>
                    </div>
                </a>
        </div>
        
    </div>
</section>


<?php get_footer(); ?>