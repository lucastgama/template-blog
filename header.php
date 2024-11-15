<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo('charset'); ?>" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="icon" type="image/x-icon" href="<?php echo get_template_directory_uri(); ?>/assets/images/icon/favicon.ico">
  <script src="https://cdn.tailwindcss.com"></script>
  <style type="text/tailwindcss">
    @layer utilities {
      .content-auto {
        content-visibility: auto;
      }
    }
  </style>
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <header>
    <div class="bg-black-nav__ee">
      <nav class="navbar" aria-label="Desktop Navigation">
        <div class="navbar__logo">
          <a href="#home">Eterno <span>Estagiário.</span></a>
        </div>
        <div id="mainListDiv">
          <ul class="desktop__links">
            <li><a href="#posts">Blog</a></li>
            <li><a href="#about">Sobre</a></li>
            <li><a href="#rules">Regras</a></li>
          </ul>
          <span class="navTrigger">
            <i></i>
            <i></i>
            <i></i>
          </span>
        </div>
      </nav>
      <nav class="navbar__mobile" aria-label="Mobile Navigation">
        <ul class="mobile__links">
          <li><a href="#posts">Blog</a></li>
          <li><a href="#about">Sobre</a></li>
          <li><a href="#rules">Regras</a></li>
        </ul>
      </nav>
    </div>
  </header>