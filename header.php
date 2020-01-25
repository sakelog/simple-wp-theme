<html>
  <head>
    <?php wp_head(); ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" >
  </head>
  <body>
    <div class="wrapper">
      <header>
        <nav class="navbar is-primary">
          <div class="navbar-brand">
            <?php
              $siteTopLink = '<a href ="' . esc_url( home_url( '/' ) ) . '" class="navbar-item">';
              $siteTopLink .= get_bloginfo('name');
              $siteTopLink .= '</a>';

              echo $siteTopLink;
            ?>
            <a role="button" class="navbar-burger" data-target="navMenu" aria-label="menu" aria-expanded="false">
              <span aria-hidden="true"></span>
              <span aria-hidden="true"></span>
              <span aria-hidden="true"></span>
            </a>
          </div>

          <div class="navbar-menu" id="navMenu">
            <div class="navbar-start">
              <?php
                $globalMenuSetting = array(
                  'theme_location'     => 'global',
                  'container'          => false,
                  'items_wrap'         => '%3$s',
                  'echo'               => false,
                );
                $globalNav = preg_replace('#<li([^>]+?)><a([^>]+?)>([\S]+?)</a></li>#',
                sprintf( '<a ${2} class="navbar-item">${3}</a>' ),
                wp_nav_menu($globalMenuSetting));
                echo $globalNav;
              ?>
            </div>
            <div class="navbar-end">
              <div class="navbar-item">
                <?php get_search_form(); ?>
              </div>
            </div>
          </div>
        </nav>
      </header>
      <section class="section">
        <div class="container">