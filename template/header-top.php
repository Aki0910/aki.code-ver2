

<header id="header" class="header">
    <div class="header__inner">
      <h1 class="header__logo"><a href="<?php echo esc_url(home_url()); ?>"><?php bloginfo('name'); ?></a></h1>
      <nav class="header__nav">
        <ul class="header__list">
          <li class="header__item"><a class="button__blue" href="<?php echo esc_url(home_url('#works')); ?>">Works</a></li>
          <li class="header__item"><a class="button__blue" href="<?php echo esc_url(home_url('#blog')); ?>">Blog</a></li>
          <li class="header__item"><a class="button__blue" href="<?php echo esc_url(home_url('#contact')); ?>"><span class="header__contact">Contact<span></a></li>
        </ul>
      </nav>
      <div class="drawer">
        <span class="drawer__bar drawer__bar1"></span>
        <span class="drawer__bar drawer__bar2"></span>
        <span class="drawer__bar drawer__bar3"></span>
      </div>

    </div>
</header>
  
<nav class="drawer__nav">
  <ul class="drawer__list">
    <li class="drawer__item"><a href="#works">WORKS</a></li>
    <li class="drawer__item"><a href="#service">SERVICE</a></li>
    <li class="drawer__item"><a href="#profile">PROFILE</a></li>
    <li class="drawer__item"><a href="#contact">CONTACT</a></li>
  </ul>
</nav>