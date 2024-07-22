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
 * 自作javascript読み込み
 */
function st_enqueue_scripts() {
    wp_enqueue_script('script',get_theme_file_uri('js/script.js'),array(),false,'all');
}
add_action('wp_enqueue_scripts','st_enqueue_scripts');

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
        $args['has_archive'] = 'work'; // 任意のスラッグ名
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
