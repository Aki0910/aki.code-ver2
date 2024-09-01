<?php

/*
 * <title>タグを出力する
 */
add_theme_support('title-tag');

/**
 * 自作CSSの読み込み
 */
function my_enqueue_styles() {
    wp_enqueue_style('style', get_stylesheet_uri(), array(), '1.0', 'all'); // バージョン番号を追加
}
add_action('wp_enqueue_scripts', 'my_enqueue_styles');

/**
 * 自作JavaScriptの読み込み
 */
function st_enqueue_scripts() {
    // The core GSAP library
    wp_enqueue_script('gsap-js', 'https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/gsap.min.js', array(), '3.12.5', true);

    // ScrollTrigger - with gsap.js passed as a dependency
    wp_enqueue_script('gsap-st', 'https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/ScrollTrigger.min.js', array('gsap-js'), '3.12.5', true);

    // Your main script file
    wp_enqueue_script('script', get_template_directory_uri() . '/js/script.js', array('gsap-st'), '1.0', true);
}
add_action('wp_enqueue_scripts', 'st_enqueue_scripts');

/**
 * アイキャッチ画像
 */
add_theme_support('post-thumbnails');

/**
 * カスタムメニュー機能を使用可能にする
 */
add_theme_support('menus');

/**
 * 投稿のアーカイブページを作成する
 */
function post_has_archive($args, $post_type) {
    if ('post' == $post_type) {
        $args['rewrite'] = true; // リライトを有効にする
        $args['has_archive'] = 'post'; // 任意のスラッグ名
    }
    return $args;
}
add_filter('register_post_type_args', 'post_has_archive', 10, 2);

/**
 * Contact Form 7 の整形オフ
 */
add_filter('wpcf7_autop_or_not', function() {
    return false;
});

/**
 * サイドバーの追加
 */
function my_custom_sidebar() {
    register_sidebar(array(
        'name' => __('Aside', 'your-theme-textdomain'), // サイドバーの名前
        'id' => 'aside', // サイドバーのID
        'description' => __('A custom sidebar for blog posts', 'your-theme-textdomain'), // サイドバーの説明
        'before_widget' => '<aside id="%1$s" class="widget %2$s">', // ウィジェットの前に追加されるHTML
        'after_widget' => '</aside>', // ウィジェットの後に追加されるHTML
        'before_title' => '<h3 class="widget-title">', // ウィジェットタイトルの前に追加されるHTML
        'after_title' => '</h3>', // ウィジェットタイトルの後に追加されるHTML
    ));
}
add_action('widgets_init', 'my_custom_sidebar');

/**
 * 検索対象を投稿ページのみにするカスタマイズ
 */
function search_filter($query) {
    if ($query->is_search) {
        $query->set('post_type', 'post');
    }
    return $query;
}
add_filter('pre_get_posts', 'search_filter');

/**
 * コンテンツ内のタグにクラス名を付与する
 */
function add_custom_classes_to_content($content) {
    $dom = new DOMDocument();
    libxml_use_internal_errors(true); // HTMLエラーを無視する
    $dom->loadHTML('<?xml encoding="utf-8" ?>' . $content, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
    libxml_clear_errors();

    $xpath = new DOMXPath($dom);

    // 各タグに追加するクラス名
    $tags = array(
        'p' => 'my-class__paragraph',
        'h1' => 'my-class__heading1',
        'h2' => 'my-class__heading2',
        'h3' => 'my-class__heading3',
        'h4' => 'my-class__heading4',
        'h5' => 'my-class__heading5',
        'h6' => 'my-class__heading6',
        'figure' => 'my-class__figure',
        'ul' => 'my-class__unorderdList',
        'ol' => 'my-class__orderdList',
        'li' => 'my-class__listItem',
        'blockquote' => 'my-class__blockquote',
        'table' => 'my-class__table',
        'thead' => 'my-class__tableHead',
        'tbody' => 'my-class__tableBody',
        'tr' => 'my-class__tableRow',
        'th' => 'my-class__tableHeader',
        'td' => 'my-class__tableData',
        'form' => 'my-class__form',
        'input' => 'my-class__input',
        'textarea' => 'my-class__textarea',
        'button' => 'my-class__button',
        'label' => 'my-class__label',
        'code' => 'my-class__code',
        'pre' => 'my-class__pre'
    );

    foreach ($tags as $tag => $class) {
        $elements = $xpath->query("//{$tag}");
        foreach ($elements as $element) {
            $existing_class = $element->getAttribute('class');
            $new_class = $existing_class ? $existing_class . ' ' . $class : $class;
            $element->setAttribute('class', $new_class);
        }
    }

    return $dom->saveHTML();
}
add_filter('the_content', 'add_custom_classes_to_content');

?>
