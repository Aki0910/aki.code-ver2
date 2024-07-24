<?php get_header(); ?>

<section class="top">
    <ul class="top__list">
        <li class="top__item top__item1 top__item--large">
            <img src="<?php echo esc_url(get_theme_file_uri('/img/top-aki.png')); ?>" alt="トップ画像">
        </li>
        <li class="top__item top__item2 top__item--small">
            <img src="<?php echo esc_url(get_theme_file_uri('/img/top-book.png')); ?>" alt="トップ画像">
        </li>
        <li class="top__item top__item3 top__item--large">
            <img src="<?php echo esc_url(get_theme_file_uri('/img/top-dive.png')); ?>" alt="トップ画像">
        </li>
        <li class="top__item top__item4 top__item--large">
            <img src="<?php echo esc_url(get_theme_file_uri('/img/top-pc.png')); ?>" alt="トップ画像">
        </li>
        <li class="top__item top__item5 top__item--small">
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
                <p>web制作に興味を持ち学習を始め、見事のめり込む。</p>
                <p>現在は、フリーランスとしてWeb制作を行なっています。</p>
                <p>デザイン 〜 wordpressまで一気貫通で承ります。</p>
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
                <li class="works__item">
                    <a href="">
                        <div class="works__img">
                            <img src="<?php echo esc_url(get_theme_file_uri('/img/works1.png')); ?>" alt="">
                        </div>
                        <h3 class="works__company">会社名様</h3>
                        <p class="works__role">デザイン / コーディング / 保守・管理</p>
                    </a>
                </li>
                <li class="works__item">
                    <a href="">
                        <div class="works__img">
                            <img src="<?php echo esc_url(get_theme_file_uri('/img/works1.png')); ?>" alt="">
                        </div>
                        <h3 class="works__company">会社名様</h3>
                        <p class="works__role">デザイン / コーディング / 保守・管理</p>
                    </a>
                </li>
                <li class="works__item">
                    <a href="">
                        <div class="works__img">
                            <img src="<?php echo esc_url(get_theme_file_uri('/img/works1.png')); ?>" alt="">
                        </div>
                        <h3 class="works__company">会社名様</h3>
                        <p class="works__role">デザイン / コーディング / 保守・管理</p>
                    </a>
                </li>
                <div class="button">
                    <div class="button__content">
                        <div class="button__img">
                            <img src="<?php echo esc_url(get_theme_file_uri('/img/arrow1.png')); ?>" alt="">
                        </div>
                        <p class="button__text">VIEW ALL</p>
                    </div>
                </div>
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
                <li class="topics__item">
                    <a href="">
                        <div class="topics__wrap">
                            <div class="topics__date"></div>
                            <h3 class="topics__category"></h3>
                            <p class="topics__head"></p>
                        </div>
                    </a>
                </li>
               
            </ul>
        </div>
    </div>
</section>

<?php get_footer(); ?>