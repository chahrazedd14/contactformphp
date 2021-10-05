<?php


function wpc_theme_enqueue_styles() {
    wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');
}
add_action('wp_enqueue_scripts', 'wpc_theme_enqueue_styles');


function jobseek2_assets() {

  // ...

  // Charger notre script
  wp_enqueue_script( 'jobseek-child', 'https://recrutement-mmv.fr/wp-content/themes/jobseek-child/form.js', array( 'jquery' ), '1.0', true );

  // Envoyer une variable de PHP à JS proprement
  wp_localize_script( 'jobseek-child', 'ajaxurl', admin_url( 'admin-ajax.php' ) );

}
add_action( 'wp_enqueue_scripts', 'jobseek2_assets' );