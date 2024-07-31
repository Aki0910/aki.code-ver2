<!DOCTYPE html>
<html lang="ja">
  <head>
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

  <?php
// ページが archive-works.php または single-works.php かどうかを判定
if (is_post_type_archive('works') || is_singular('works')) {
    // archive-works.php または single-works.php の場合
    get_template_part('template/header-works');
} else {
    // その他のページの場合
    get_template_part('template/header-top');
}
?>

   