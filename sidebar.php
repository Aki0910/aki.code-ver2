<aside class="aside">
    <section class="author">
        <img class="author__img" src="<?php echo esc_url(get_theme_file_uri('/images/articles/author.jpg')); ?>" alt="author">
        <h3 class="aside__title">Name Name</h3>
        <p class="author__intro">
            プロフィールテキストテキストテキストテキストテキ
            ストテキストテキストテキストテキストテキストテキ
            ストテキストテキストテキストテキストテキストテキ
            ストテキストテキストテキストテキストテキストテキ
            ストテキストテキスト
        </p>
    </section>

    <?php get_search_form(); ?>

    <section class="archive">  
            <?php dynamic_sidebar('sidebar'); ?>
    </section>
</aside>