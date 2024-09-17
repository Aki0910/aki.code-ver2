<!DOCTYPE html>
<html lang="ja">
  <head>
	  	  <!-- Google Tag Manager -->
			<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
			new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
			j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
			'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
			})(window,document,'script','dataLayer','GTM-K8T8X4B6');</script>
	  		<!-- End Google Tag Manager -->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <?php wp_head(); ?>

    <!-- フォントファミリー -->
    <script>
    (function(d) {
      var config = {
        kitId: 'abv5hio',
        scriptTimeout: 3000,
        async: true
      },
      h=d.documentElement,t=setTimeout(function(){h.className=h.className.replace(/\bwf-loading\b/g,"")+" wf-inactive";},config.scriptTimeout),tk=d.createElement("script"),f=false,s=d.getElementsByTagName("script")[0],a;h.className+=" wf-loading";tk.src='https://use.typekit.net/'+config.kitId+'.js';tk.async=true;tk.onload=tk.onreadystatechange=function(){a=this.readyState;if(f||a&&a!="complete"&&a!="loaded")return;f=true;clearTimeout(t);try{Typekit.load(config)}catch(e){}};s.parentNode.insertBefore(tk,s)
    })(document);
    </script>
  </head>
  <body>
	  	  <!-- Google Tag Manager (noscript) -->
			<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-K8T8X4B6"
			height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
			<!-- End Google Tag Manager (noscript) -->

      <?php
      // ページが archive-works.php または single-works.php かどうかを判定
      if (is_post_type_archive('works') || is_singular('works')) {
          // archive-works.php または single-works.php の場合
          get_template_part('template/header-works');
      } elseif (is_front_page() || is_home()) {
          // index.php の場合（フロントページまたはブログページ）
          get_template_part('template/header-top');
      } else {
          // その他のページの場合
          get_template_part('template/header-other');
      }
      ?>

   