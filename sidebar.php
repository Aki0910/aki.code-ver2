
<?php if (is_active_sidebar('aside')) : ?>
    <div id="aside" class="aside">
        <?php dynamic_sidebar('aside'); ?>
    </div>
<?php endif; ?>











<!-- <aside class="aside">
    <section class="aside__author">
        <div class="aside__img">
            <img src="<?php echo esc_url(get_theme_file_uri('/img/aki.jpg')); ?>" alt="author">
        </div>
        <h3 class="aside__title">あき</h3>
        <div class="aside__introBox">
            <p>東京都出身。</p>
            <p>薬科大学を卒業後、薬剤師として従事。web制作に興味を持ち、学習を始め見事のめり込む。</p>
            <p>web制作の学習7ヶ月→Web制作フリーランスへ→１ヶ月目で初案件獲得→4ヶ月目でチーム開発に従事。</p>
            <p>ホームページ制作をデザインからwordpressまで一気通貫して承ります！</p>
            <p>ホームページ制作のご依頼はcontactからお願いいたします。</p>
        
            <ul class="aside__list">
                <li class="aside__item">ホームページ制作</li>
                <li class="aside__item">SEO対策</li>
                <li class="aside__item">マーケティング</li>
            </ul>
        
            <p>を中心に発信していきます！</p>
        </div>
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
    </section>
    <section class="aside__cta">
        <a href="<?php echo esc_url(home_url('#contact')); ?>">
            <div class="aside__ctaWrap">
                <div class="aside__ctaTitle">contact</div>
                <div class="aside__ctaIcon">
                    <img src="<?php echo esc_url(get_theme_file_uri('/img/contact-icon.png')); ?>" alt="contact-icon">
                </div>
                <div class="aside__ctaText">お問い合わせはこちら</div>
            </div>
        </a>
        <img src="<?php echo esc_url(get_theme_file_uri('/img/contact.png')); ?>" alt="contact">
    </section>

    <?php get_search_form(); ?>

    <section class="aside__category">
        <h3 class="category__title">Category</h3>
        <ul class="category__list">
            <li class="category__item category__homepage">
                <a href="<?php echo esc_url(home_url('/category/homepage/')); ?>">ホームページ</a>
            </li>
            <li class="category__item category__seo">
                <a href="<?php echo esc_url(home_url('/category/seo/')); ?>">SEO対策</a>
            </li>
            <li class="category__item category__marketing">
                <a href="<?php echo esc_url(home_url('/category/marketing/')); ?>">マーケティング</a>
            </li>
        </ul>           
    </section>
</aside> -->