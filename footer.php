
    <?php
    // ページが archive-works.php または single-works.php かどうかを判定
    if (is_post_type_archive('works') || is_singular('works')) {
        // archive-works.php または single-works.php の場合
        get_template_part('template/footer-works');
    } else {
        // その他のページの場合
        get_template_part('template/footer-top');
    }
    ?>
    
    <?php wp_footer(); ?>
  </body>
</html>
