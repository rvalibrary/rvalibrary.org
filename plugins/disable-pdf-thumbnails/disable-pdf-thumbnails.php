<?php
/**
 * @package Disable_PDF_Thumbnails
 * @version 1.3
 */
/*
Plugin Name: Disable PDF Thumbnails
Plugin URI: https://www.makeworthymedia.com/plugins/
Description: Disables WordPress from generating image thumbnails when you upload a PDF.
Author: Jennette Fulda
Version: 1.3
Author URI: https://www.makeworthymedia.com/
License: GPL2
*/

/*  Copyright 2017 Jennette Fulda  (email : contact@makeworthymedia.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

// Block direct requests
if ( !defined('ABSPATH') )
	die('-1');

// Disables WordPress from generating thumbnail images when a PDF is uploaded
// Code credit to http://www.wpbeginner.com/wp-tutorials/how-to-disable-pdf-thumbnail-previews-in-wordpress/
function makeworthy_disable_pdf_thumbnails() {
	$fallbacksizes = array(); 
	return $fallbacksizes; 
} 
add_filter('fallback_intermediate_image_sizes', 'makeworthy_disable_pdf_thumbnails');