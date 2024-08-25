
    <?php while (have_posts() ) : the_post(); ?>
    <article class="main__card main__searchResult">
    <li class="main__blogItem">
        <a class="blog__anchor" href="<?php the_permalink(); ?>">
            <div class="main__blogCard">
                <div class="main__blogCard--img">
                    <?php if (has_post_thumbnail()) : ?>
                    <?php the_post_thumbnail(); ?>
                    <?php else: ?>
                        <img src="<?php echo get_template_directory_uri(); ?>/img/noimage.jpg" alt="画像準備中">
                    <?php endif; ?>
                </div>
                <div class="main__blogCard--content">
                    <div class="card__meta">
                        <?php
                            $cat = get_the_category();
                            $cat = $cat[0];
                        ?>
                        <p class="card__category"><?php echo $cat->name; ?></p>
                        <div class="card__date"><?php echo get_the_date(); ?></div>
                    </div>
                    <h3 class="card__head"><?php the_title(); ?></h3>
                    <div class="card__more">Read More</div>
                </div>
            </div>
        </a>
    </li>
    </article>
    <?php endwhile; ?>
