
    <header id="header" class="header">
      <div class="inner header__inner">
        <h1 class="header__logo"><a href="<?php echo esc_url(home_url()); ?>"><?php bloginfo('name'); ?></a></h1>
        <nav class="header__nav">
          <ul class="header__list">
            <li class="header__item"><a href="<?php echo esc_url(home_url()); ?>">TOP</a></li>
            <li class="header__item"><a href="<?php echo esc_url(home_url('/category/work/')); ?>">WORKS</a></li>
            <li class="header__item"><a href="<?php echo esc_url(home_url('/contact/')); ?>">CONTACT</a></li>
          </ul>
        </nav>
      </div>
      <div class="drawer">
        <span class="drawer__bar drawer__bar1"></span>
        <span class="drawer__bar drawer__bar2"></span>
        <span class="drawer__bar drawer__bar3"></span>
        <span class="drawer__title">MENU</span>
      </div>

      <nav class="drawer__nav">
        <ul class="drawer__list">
          <li class="drawer__item"><a href="<?php echo esc_url(home_url()); ?>">TOP</a></li>
          <li class="drawer__item"><a href="<?php echo esc_url(home_url('/category/work/')); ?>">WORKS</a></li>
          <li class="drawer__item"><a href="<?php echo esc_url(home_url('/contact/')); ?>">CONTACT</a></li>
        </ul>
      </nav>
    </header>
  