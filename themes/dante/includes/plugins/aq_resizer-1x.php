<?php
if (!function_exists('sf_aq_resize')) {
	function sf_aq_resize( $url, $width, $height = null, $crop = null, $single = true ) {

  	return array (
    	0 => $url,
    	1 => $width,
    	2 => $height
  	);
  }
}
