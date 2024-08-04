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
                    <div class="main__inner">
                        <h2 class="section__title">ブログ</h2>

                        <?php
                        if (is_post_type_archive('works') || is_singular('works')) {
                            get_template_part('template/breadcrumb-works');
                        } else {
                            get_template_part('template/breadcrumb');
                        }
                        ?>

                        <div class="main__cardTitle">
                            <h2 class="main__card--title"><?php the_title(); ?></h2>
                            <ul class="main__card--meta">
                                <li class="main__card--date">
                                <?php
                                    if(get_the_time('U') !== get_the_modified_time('U')){ ?>
                                        <!--公開日時の後に更新されていた場合-->                               
                                        公開日：<time><?php echo get_the_date(); ?></time>
                                        最終更新日：<time><?php the_modified_date(); ?></time>
                                    <?php }else{ ?>
                                        <!--一度も更新されていない場合-->
                                        公開日：<time><?php echo get_the_date(); ?></time>
                                    <?php }
                                ?>
                                </li>
                                <li class="card__category"><?php echo $catname; ?></li>
                            </ul>
                        </div>

                        <div class="main__content">
                            <?php the_content(); ?>
                        </div>
                        
                        <ul class="post-link">
                            <li><?php previous_post_link('%link', '< 前の記事へ'); ?></li>
                            <li><?php next_post_link('%link', '次の記事へ >'); ?></li>
                        </ul>

                        <div class="main__reration">
                            <h3 class="main__cardSubtitle">関連記事</h3>
                            <ul class="blog__list">
                                <?php
                                $categories = get_the_category($post->ID);
 
                                $category_ID = array();
                                 
                                foreach($categories as $category):
                                 array_push( $category_ID, $category -> cat_ID);
                                endforeach ;

                                $args = array(
                                    'post_type'      => 'post',
                                    'posts_per_page' => 3,
                                    'category__in' => $category_ID,
                                    'orderby' => 'rand',
                                );
                                $the_query = new WP_Query( $args );
                                if ( $the_query->have_posts() ) :
                                ?>
                                <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                                <li class="blog__item">
                                    <a class="blog__anchor" href="<?php the_permalink(); ?>">
                                        <div class="card">
                                            <div class="card__img">
                                                <?php if (has_post_thumbnail()) : ?>
                                                <?php the_post_thumbnail(); ?>
                                                <?php else: ?>
                                                    <img src="<?php echo get_template_directory_uri(); ?>/img/noimage.jpg" alt="画像準備中">
                                                <?php endif; ?>
                                            </div>
                                            <div class="card__content">
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
                                <?php endwhile;
                                    endif;
                                    wp_reset_postdata();
                                ?>
                            </ul>
                        </div>

                        <div class="main__popular">
                            <h3 class="main__cardSubtitle">人気記事</h3>
                            <ul class="blog__list">
                                <?php
                                $args = array(
                                    'post_type'      => 'post',
                                    'posts_per_page' => 3 // 3記事表示
                                );
                                $the_query = new WP_Query( $args );
                                if ( $the_query->have_posts() ) :
                                ?>
                                <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                                <li class="blog__item">
                                    <a class="blog__anchor" href="<?php the_permalink(); ?>">
                                        <div class="card">
                                            <div class="card__img">
                                                <?php if (has_post_thumbnail()) : ?>
                                                <?php the_post_thumbnail(); ?>
                                                <?php else: ?>
                                                    <img src="<?php echo get_template_directory_uri(); ?>/img/noimage.jpg" alt="画像準備中">
                                                <?php endif; ?>
                                            </div>
                                            <div class="card__content">
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
                                <?php endwhile;
                                    endif;
                                    wp_reset_postdata();
                                ?>
                            </ul>
                        </div>
                    </div>
                </article>
                <?php endwhile; ?>

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