<?php 

/* Enqueue Assets */
function rei_enqueue_assets() {
  // Styles
  wp_enqueue_style('rei-style', get_stylesheet_uri());
  wp_enqueue_style('owl-main', get_template_directory_uri() . '/assets/css/owl.carousel.min.css');
  wp_enqueue_style('owl-main', get_template_directory_uri() . '/assets/css/owl.theme.default.min.css');
  wp_enqueue_style('custom-css', get_template_directory_uri() . '/assets/css/main.css');

  // Scripts
  wp_enqueue_script('owl-script', get_template_directory_uri() . '/assets/js/owl.carousel.min.js', ['jquery'], null, true);
  wp_enqueue_script('rei-script', get_template_directory_uri() . '/assets/js/main.js', ['jquery'], null, true);

  wp_localize_script( 'rei-script', 'reiAjax', [
    'ajaxurl' => admin_url( 'admin-ajax.php' ),
  ] );
}
add_action('wp_enqueue_scripts', 'rei_enqueue_assets');