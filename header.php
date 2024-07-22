<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <?php wp_head(); ?>
	        <!-- Google tag (gtag.js) -->
      <script async src="https://www.googletagmanager.com/gtag/js?id=G-GPJT5E474W"></script>
      <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-GPJT5E474W');
      </script>
  </head>
  <body>

  <?php if (is_home()) : ?>
    <?php get_template_part('template/header-top'); ?>
  <?php else : ?>
     <?php get_template_part('template/header-under'); ?>
  <?php endif; ?>
   