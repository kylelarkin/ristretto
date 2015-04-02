<?php
/**
 * Include all php custom post type files
 */
foreach (glob(dirname(__FILE__) . '/cpts/' . '*.php') as $filename) {
	require( $filename );
}