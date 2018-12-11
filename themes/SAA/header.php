<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<meta name="format-detection" content="telephone=no,address=no,email=no">
<link rel="icon" href="<?php echo get_template_directory_uri() . '/img/favicon.ico' ?>">
<link rel="apple-touch-icon" href="<?php echo get_template_directory_uri() . '/img/apple-touch-icon-precomposed.png' ?>">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
  <header role="banner" class="l-globalHeader">
    <div class="l-row--header">
      <div class="l-container grid-spaceBetween-middle js-header">
        <div class="col-6_md-3">
          <?php if ( is_front_page() ) : ?>
            <h1 class="c-logo"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo get_template_directory_uri() . '/img/SAA_logo.svg' ?>" alt="Salix &amp; Associates, Architects"></a></h1>
          <?php else: ?>
            <div class="c-logo"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo get_template_directory_uri() . '/img/SAA_logo.svg' ?>" alt="Salix &amp; Associates, Architects"></a></div>
          <?php endif; ?>
        </div>
        <div class="u-visible u-visible--md js-menuButton">
          <i class="genericon genericon-menu u-white"></i>
        </div>
        <nav role="navigation" class="u-hidden u-hidden--md js-menu">
<?php
$args = array(
    'theme_location'  => 'global',
    'menu_class'      => 'grid p-globalNav'
);
wp_nav_menu( $args );
?>
        </nav>
      </div>
    </div>
  </header>
