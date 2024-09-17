
<?php
      // ページが archive-works.php または single-works.php かどうかを判定
      if (is_post_type_archive('works') || is_singular('works')) {
          // archive-works.php または single-works.php の場合
          get_template_part('template/footer-works');
      } elseif (is_front_page() || is_home()) {
          // index.php の場合（フロントページまたはブログページ）
          get_template_part('template/footer-top');
      } else {
          // その他のページの場合
          get_template_part('template/footer-other');
      }
      ?>
    
    <?php wp_footer(); ?>
  </body>
</html>
