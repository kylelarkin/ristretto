<?php
// Wrap oEmbed in Figure for Flexible Resize (http://websitesthatdontsuck.com/2011/12/fluid-width-oembed-videos-in-wordpress/)
function ristretto_oembed_filter($html, $url, $attr, $post_ID) {
	$return = '<figure class="video-container">'.$html.'</figure>';
	return $return;
}
add_filter( 'embed_oembed_html', 'ristretto_oembed_filter', 10, 4 ) ;