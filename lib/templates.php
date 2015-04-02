<?php
/**
 * Include all php template files
 */
foreach (glob(dirname(__FILE__) . '/templates/' . '*.php') as $filename) {
	require( $filename );
}