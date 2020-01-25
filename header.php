<html>
  <head>
  <?php wp_head(); ?>
  </head>
  <body>
    <header>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0" >
      <nav class="navbar is-primary">
        <div class="navbar-brand">
          <a class="navbar-item">
          <?php echo get_bloginfo('name'); ?>
          </a>
          <a role="button" class="navbar-burger" data-target="navMenu" aria-label="menu" aria-expanded="false">
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
          </a>
        </div>

        <div class="navbar-menu" id="navMenu">
          <div class="navbar-start">
            <a class="navbar-item">
              test
            </a>
          </div>
          <div class="navbar-end">
          </div>
        </div>
      </nav>
    </header>
    <section class="section">
      <div class="container">