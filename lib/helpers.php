<?php
/**
 * Add Pagename Variable for Body Class paramter
 */
if (!function_exists('ristretto_page_name')) {
	function ristretto_page_name( $classes ) {
		if( is_page( basename( get_permalink() ) ) || is_single( basename( get_permalink() ) ) ){
			$page_slug = "pagename-" . basename( get_permalink() );
		}else { $page_slug = ''; }
		// add 'class-name' to the $classes array
		$classes[] = $page_slug;

		// return the $classes array
		return $classes;
	}
}
add_filter( 'body_class', 'ristretto_page_name' );

/**
 * Truncate a string to desired length without breaking words.
 */
if (!function_exists('truncate')) {
	function truncate($string, $length, $tailing_char = '...') {
		if (strlen($string) > $length):
			$string = preg_replace('/\s+?(\S+)?$/', '', substr($string . ' ', 0, $length)) . $tailing_char;
		endif;
		return $string;
	}
}

/**
 * Retrieve WP-formatted content from a post via post ID
 */
if (!function_exists('get_the_content_by_id')) {
	function get_the_content_by_id($id) {
		$content = get_post_field('post_content', $id);
		$content = apply_filters('the_content', $content);
		$content = str_replace(']]>', ']]&gt;', $content);
		return $content;
	}
}

/**
 * Retrieve post ID via page/post slug
 */
if (!function_exists('get_post_id_from_slug')) {
	function get_post_id_from_slug($slug) {
		global $wpdb;
		$id = $wpdb->get_var(
			$wpdb->prepare(
				"SELECT ID FROM $wpdb->posts WHERE post_name = '%s' AND post_type not in ('nav_menu_item', 'revision')",
				$slug
			)
		);
		return $id;
	}
}

/**
 * Slug-ify a string (wrapper function for WP core function)
 */
if (!function_exists('slugify')) {
	function slugify($string) {
		return sanitize_title_with_dashes($string);
	}
}

/**
 * Get everything you could want about a featured image
 */
if (!function_exists('get_featured_image')) {
	function get_featured_image($id = null) {
		if (!$id) {
			global $post;
			$id = $post->ID;

			if (!$id) return false;
		}
		return wp_prepare_attachment_for_js( get_post_thumbnail_id( $id ) );
	}
}

/**
 * Remove inline width from WP Image Captions from (http://wp-snippets.com/remove-wp-caption-inline-style-width-in-wordpress-3-4-and-up/)
 */
add_shortcode('wp_caption', 'fixed_img_caption_shortcode');
add_shortcode('caption', 'fixed_img_caption_shortcode');
function fixed_img_caption_shortcode($attr, $content = null) {
	// New-style shortcode with the caption inside the shortcode with the link and image tags.
	if ( ! isset( $attr['caption'] ) ) {
		if ( preg_match( '#((?:<a [^>]+>\s*)?<img [^>]+>(?:\s*</a>)?)(.*)#is', $content, $matches ) ) {
			$content = $matches[1];
			$attr['caption'] = trim( $matches[2] );
		}
	}

	// Allow plugins/themes to override the default caption template.
	$output = apply_filters('img_caption_shortcode', '', $attr, $content);
	if ( $output != '' )
		return $output;

	extract(shortcode_atts(array(
		'id'	=> '',
		'align'	=> 'alignnone',
		'width'	=> '',
		'caption' => ''
	), $attr));

	if ( 1 > (int) $width || empty($caption) )
		return $content;

	if ( $id ) $id = 'id="' . esc_attr($id) . '" ';

	return '<div ' . $id . 'class="wp-caption ' . esc_attr($align) . '" style="width: ' . $width . 'px">'
	. do_shortcode( $content ) . '<p class="wp-caption-text">' . $caption . '</p></div>';
}

/**
 * Ristretto Nice Date
 */
function ristretto_nice_date_range($start_date = '', $end_date = '', $all_day = '') {
  $pretty_time = '';
  $date_range = '';
  $start_date = strtotime($start_date);
  $end_date = strtotime($end_date);
  // If only one date, or dates are the same set to FULL verbose date
  if ( empty($start_date) || empty($end_date) || ( date('FjY',$start_date) == date('FjY',$end_date) ) ) { // FjY == accounts for same day, different time
      $start_date_pretty = date( 'F j, Y', $start_date );
      $end_date_pretty = date( 'F j, Y', $end_date );
  } else {
    // Setup basic dates
    $start_date_pretty = date( 'F j', $start_date );
    $end_date_pretty = date( 'j, Y', $end_date );
    // If years differ add suffix and year to start_date
    if ( date('Y',$start_date) != date('Y',$end_date) ) {
        $start_date_pretty .= date( ', Y', $start_date );
    }
    // If months differ add suffix and year to end_date
    if ( date('F',$start_date) != date('F',$end_date) ) {
      $end_date_pretty = date( 'F ', $end_date) . $end_date_pretty;
    }
  }
  // build date_range return string
  if( ! empty( $start_date ) ) {
    $date_range .= $start_date_pretty;
  }
  // check if there is an end date and append if not identical
  if( ! empty( $end_date ) ) {
    if( $end_date_pretty != $start_date_pretty ) {
      $date_range .= '&ndash;' . $end_date_pretty;
    }
  }
  if( false == $all_day ){
    if( date( 'F jS, Y', $start_date ) == date( 'F jS, Y', $end_date ) ){
      $pretty_time = date('g:ia', $start_date) . '&ndash;' . date('g:ia', $end_date);
    }if( !$end_date ){
      $pretty_time = date('g:ia', $start_date);
    }
  }
  if( '' != $pretty_time ){
    $date_range .= '<span class="event-item--time">' . $pretty_time . '</span>';
  }
  return $date_range;
}