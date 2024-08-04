
    <?php while (have_posts() ) : the_post(); ?>
    <article class="main__card">
        <h2 class="main__card--title"><?php the_title(); ?></h2>
        <ul class="main__card--meta">
            <li class="main__card--date"><?php the_time('Y/m/d'); ?></li>
            <?php if(!is_category()) {?>
            <?php
                $cat = get_the_category();
                $catname = $cat[0]->cat_name;
            ?>
            <li class="main__card--archive"><?php echo $catname; ?></li>
            <?php } ?>
        </ul>
        <a href="<?php the_permalink(); ?>">
        <?php if (has_post_thumbnail() ) : ?>
            <?php the_post_thumbnail('full',array('class' => 'main__card--img')); ?>
        <?php else: ?>
            <img class="main__card--img" src="<?php echo get_template_directory_uri(); ?>/images/common/noimage.jpg" alt="">
        <?php endif; ?>
        </a>
        <p class="main__card--content">
            <?php
            if (mb_strlen(strip_tags(get_the_content()),'UTF-8') > 80) {
                $content = mb_substr(strip_tags(get_the_content()),0,80,'UTF-8');
                echo $content . '...';
            } else {
                echo strip_tags(get_the_content());
            }
            ?>
        </p>
        <a class="button__more main__more" href="<?php the_permalink(); ?>">READ MORE</a>
    </article>
    <?php endwhile; ?>
