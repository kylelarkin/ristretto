<?php function ristretto_template_redirects() {
  global $post;

  if(is_singular('post')){
    if( has_term('in-the-news', 'category') ) {
      $redirect_url = get_field('news_url');
      if($redirect_url) {
        wp_redirect( $redirect_url, 301 );
        exit;
      }

    }

  }
}
// add_action( 'template_redirect', 'ristretto_template_redirects' );