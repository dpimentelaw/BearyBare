<!doctype html>
<html <?php language_attributes(); ?>>
  <head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11" />
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
    <?php if ( is_singular() && get_option( 'thread_comments' ) ) wp_enqueue_script( 'comment-reply' ); ?>
    <?php wp_head(); ?>
  </head>
  <body <?php body_class( ); ?>>

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-light custom-nav border-bottom border-5 border-dark">
  <div class="container">
    <a class="navbar-brand fs-1 fw-600" href="<?php echo bloginfo( 'url' ); ?>">
        <img class="rounded-circle me-3" src="<?php echo get_theme_file_uri('/img/Beary_Bare Logo.png'); ?>" alt="">Beary Bear
    </a> 
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end fw-600" id="navbarSupportedContent">
        <?php
            wp_nav_menu(array(
                'theme_location' => 'main-menu',
                'container' => false,
                'menu_class' => '',
                'fallback_cb' => '__return_false',
                'items_wrap' => '<ul id="%1$s" class="navbar-nav mb-2 mb-md-0 %2$s">%3$s</ul>',
                'depth' => 2,
                'walker' => new bootstrap_5_wp_nav_menu_walker()
            ));
        ?>
        <form class="d-flex ms-2" role="search" method="get" action="<?php echo home_url( '/' ); ?>"> 
            <div class="input-group">
                <input type="search" class="form-control form-control-sm" 
                    placeholder="<?php echo esc_attr_x( 'Search for...', 'label' ) ?>" 
                    value="<?php echo get_search_query() ?>" name="s">
                <button class="btn-sm btn-success" id="submit">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                    </svg>
                </button>
            </div>
        </form>
    </div>
  </div>
</nav>
<!-- Navbar -->