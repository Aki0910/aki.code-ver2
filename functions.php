<?php

/*
* <title>タグを出力する
*/
add_theme_support('title-tag');

/**
 * 自作css読み込み
 */
function my_enqueue_styles() {
    wp_enqueue_style('style',get_stylesheet_uri(),array(),false,'all');
}
add_action('wp_enqueue_scripts','my_enqueue_styles');


/**
 * 自作JavaScript読み込み
 */
function st_enqueue_scripts() {
    // The core GSAP library
    wp_enqueue_script( 'gsap-js', 'https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/gsap.min.js', array(), null, true );
    
    // ScrollTrigger - with gsap.js passed as a dependency
    wp_enqueue_script( 'gsap-st', 'https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/ScrollTrigger.min.js', array('gsap-js'), null, true );

    // Your main script file
    wp_enqueue_script( 'script', get_template_directory_uri() . '/js/script.js', array('gsap-st'), null, true );

    // Your animation code file - with gsap.js passed as a dependency
    wp_enqueue_script( 'gsap-js2', get_template_directory_uri() . '/js/app.js', array('script'), null, true );
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
function post_has_archive($args, $post_type)
{
    if ('post' == $post_type) {
        $args['rewrite'] = true; // リライトを有効にする
        $args['has_archive'] = 'post'; // 任意のスラッグ名
    }
    return $args;
}
add_filter('register_post_type_args', 'post_has_archive', 10, 2);

/**
 * contact form 7 の整形off
 */
add_filter('wpcf7_autop_or_not','my_wpcf7_autop');
function my_wpcf7_autop(){
    return false;
}

 /**
  * サイドバーの追加
  */
  if(function_exists('register_sidebar')) {
    register_sidebar(array(
        'name' => 'サイドバー',
        'id' => 'sidebar',
        'description' => 'サイドバーウィジェット',
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h3 class="archive__title">',
        'after_title' => '</h3>'
    ));
}

/**
 * 検索対象を投稿ページのみにするカスタマイズ
 */
function search_filter($query) {
    if($query -> is_search) {
        $query -> set('post_type','post');
    }
    return $query;
}
add_filter('pre_get_posts','search_filter');



/**
 * クラス名付与
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

