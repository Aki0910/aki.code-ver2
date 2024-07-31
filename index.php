<?php get_header(); ?>
<!-- <div id="stalker"></div> -->


<section class="top">
    <ul class="top__list">
        <li class="top__item top__item--large">
            <img src="<?php echo esc_url(get_theme_file_uri('/img/top-aki.png')); ?>" alt="トップ画像">
        </li>
        <li class="top__item top__item--small">
            <img src="<?php echo esc_url(get_theme_file_uri('/img/top-book.png')); ?>" alt="トップ画像">
        </li>
        <li class="top__item top__item--large">
            <img src="<?php echo esc_url(get_theme_file_uri('/img/top-dive.png')); ?>" alt="トップ画像">
        </li>
        <li class="top__item top__item--large">
            <img src="<?php echo esc_url(get_theme_file_uri('/img/top-pc.png')); ?>" alt="トップ画像">
        </li>
        <li class="top__item top__item--small">
            <img src="<?php echo esc_url(get_theme_file_uri('/img/top-travel.png')); ?>" alt="トップ画像">
        </li>
    </ul>
</section>

<section id="profile" class="profile">
    <div class="profile__inner">
        <dl class="profile__list">
            <dt class="profile__name">
                Akihiro Matsuwaka
            </dt>
            <dd class="profile__hobby">
                趣味 : 旅行 / ダイビング / ロードバイク
            </dd>
            <dd class="profile__desxcription">
                <p>当サイトをご覧いただき、ありがとうございます。</p>
                <p>東京都出身、薬科大学を卒業後、薬剤師として従事。</p>
                <p>薬剤師として働きながら、Web制作に興味を持ち学習を開始。</p>
                <p>０から作り上げるやりがいと、新しい知識を身につけることの楽しさから</p>
                <p>見事コーディングにハマり、web制作へのめり込むように。</p>
                <p>現在はフリーランスとして2社と業務委託契約を締結、</p>
                <p>ホームページ制作と教材作成のチーム開発に従事。</p>
            </dd>
        </dl>
        <ul class="sns__list">
            <li class="sns__item">
                <a href="">
                    <img src="<?php echo esc_url(get_theme_file_uri('/img/x.png')); ?>" alt="x">
                </a>
            </li>
            <li class="sns__item">
                <a href="">
                    <img src="<?php echo esc_url(get_theme_file_uri('/img/insta.png')); ?>" alt="instagram">
                </a>
            </li>
            <li class="sns__item">
                <a href="">
                    <img src="<?php echo esc_url(get_theme_file_uri('/img/github.png')); ?>" alt="github">
                </a>
            </li>
        </ul>
    </div>
</section>

<section id="works" class="works">
    <div class="works__inner">
        <h2 class="section__title works__title">実績紹介</h2>
        <div class="works__content">
            <ul class="works__list">

                <?php
                    $wp_query = new WP_Query();
                    $my_posts = array(
                        'post_type' => 'works',
                        'posts_per_page' => '3',
                    );

                    $wp_query->query($my_posts);
                    if ($wp_query->have_posts()) : while ($wp_query->have_posts()) : $wp_query->the_post();
                        $obj = get_post_type_object($post->post_type); 
                ?>
                <li class="works__item">
                    <a href="<?php the_permalink(); ?>">
                        <div class="works__img">
                            <?php $pic = get_field('picture1'); if( !empty($pic) ): ?>
                                <img src="<?php echo $pic['url']; ?>" alt="<?php echo $pic['alt']; ?>" />
                            <?php endif; ?>
                        </div>
                        <h3 class="works__company"><?php echo get_the_title(); ?></h3>
                        <p class="works__role"><?php echo esc_html(get_post_meta(get_the_ID(), 'role', true)); ?></p>
                    </a>
                </li>
                <?php endwhile;
                    endif;
                    wp_reset_postdata();
                ?>

                <a class="button works__button" href="<?php echo esc_url(home_url('/works/')); ?>">
                    <div class="button__content">
                        <div class="button__img">
                            <img src="<?php echo esc_url(get_theme_file_uri('/img/arrow-white.png')); ?>" alt="実績一覧を見る">
                        </div>
                        <p class="button__text">VIEW ALL</p>
                    </div>
                </a>
            </ul>
        </div>
    </div>
</section>

<section id="service" class="service">
    <div class="inner">
        <h2 class="section__title">サービス</h2>
        <div class="service__content">
            <ol class="service__list">
                <li class="service__item">
                    <div class="service__number">01</div>
                    <h3 class="service__head">デザイン</h3>
                    <p class="service__description">
                    ホームページのデザイン作成をいたします。
                    まずは、ヒアリングにてご希望のデザインや
                    サイトの方向性を決め、課題解決に努めます。
                    一方通行にならないよう、一緒に作り上げていきましょう。
                    </p>
                </li>
                <li class="service__item">
                    <div class="service__number">02</div>
                    <h3 class="service__head">Webサイト制作</h3>
                    <p class="service__description">
                    デザインを元にHTML / CSS / Java Scriptを
                    使用したホームページ / ランディングページを作成いたします。
                    SEO対策やレスポンシブに優れたサイトを作成いたします。
                    作成後の管理も考えた丁寧なコーディングを心がけております。
                    </p>
                </li>
                <li class="service__item">
                    <div class="service__number">03</div>
                    <h3 class="service__head">ワードプレス</h3>
                    <p class="service__description">
                    オリジナルテーマでの作成はもちろん、
                    既存のWebサイトのwordpress化も対応いたします。
                    セキュリティ / SEO対策などに必要なプラグインの導入もいたします。
                    </p>
                </li>
                <li class="service__item">
                    <div class="service__number">04</div>
                    <h3 class="service__head">保守 / 管理</h3>
                    <p class="service__description">
                    Webサイトのバックアップ / プラグインの更新をいたします。
                    また、テキスト修正や画像の差し替えなどの一部改修も行なっておりますので、お気軽にご相談ください。
                    </p>
                </li>
            </ol>
        </div>
    </div>
</section>

<section id="topics" class="topics">
    <div class="inner">
        <h2 class="section__title">お知らせ</h2>
        <div class="topics__content">
            <ul class="topics__list">
                <?php
                    $wp_query = new WP_Query();
                    $my_posts = array(
                        'post_type' => 'topics',
                        'posts_per_page' => '3',
                    );

                    $wp_query->query($my_posts);
                    if ($wp_query->have_posts()) : while ($wp_query->have_posts()) : $wp_query->the_post();
                        $obj = get_post_type_object($post->post_type); 
                ?>
                <li class="topics__item">
                    <a class="topics__anchor" href="<?php the_permalink(); ?>">
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
                    </a>
                </li>
                <?php endwhile;
                    endif;
                    wp_reset_postdata();
                ?>
            </ul>
            <a class="button topics__button" href="<?php echo esc_url(home_url('/topics/')); ?>">
                    <div class="button__content">
                        <div class="button__img">
                            <img src="<?php echo esc_url(get_theme_file_uri('/img/arrow-blue.png')); ?>" alt="">
                        </div>
                        <p class="button__text">VIEW ALL</p>
                    </div>
                </a>
        </div>
    </div>
</section>

<section id="blog" class="blog">
    <div class="inner">
        <h2 class="section__title">ブログ</h2>
        <div class="blog__content">
            <ul class="blog__list">
                <?php
                    $wp_query = new WP_Query();
                    $my_posts = array(
                        'post_type' => 'post',
                        'posts_per_page' => '3',
                    );

                    $wp_query->query($my_posts);
                    if ($wp_query->have_posts()) : while ($wp_query->have_posts()) : $wp_query->the_post();
                        $obj = get_post_type_object($post->post_type); 
                ?>
                <li class="blog__item">
                    <a class="blog__anchor" href="<?php the_permalink(); ?>">
                        <div class="card">
                            <div class="card__img">
                                <?php if (has_post_thumbnail()) : ?>
                                   <?php the_post_thumbnail(); ?>
                                <?php else: ?>
                                    <img src="<?php echo get_template_directory_uri(); ?>/代わりの画像までのパス" alt="">
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
            <a class="button blog__button" href="">
                <div class="button__content">
                    <div class="button__img">
                        <img src="<?php echo esc_url(get_theme_file_uri('/img/arrow-blue.png')); ?>" alt="">
                    </div>
                    <p class="button__text">VIEW ALL</p>
                </div>
            </a>
        </div>
    </div>
</section>


<section class="contact-form" id="contact-form">
    <div class="inner">
        <h2 class="section__title contact-form__title">お問い合わせ</h2>
        <div class="contact-form__info">
            <p class="contact-form__text">仕事のご依頼はこちらで受け付けております。</p>
            <p class="contact-form__text">料金や納期、その他ご相談やご質問などもお気軽にお問い合わせください。</p>
        </div>

        <?php echo do_shortcode('[contact-form-7 id="f967d2e" title="お問い合わせ"]'); ?>
        

    </div>
</section>

<?php get_footer(); ?>