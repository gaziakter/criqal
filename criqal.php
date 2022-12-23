<?php
/**
 * Plugin Name:       Criqal
 * Plugin URI:        https://criqal.com/
 * Description:       Handle the basics with this plugin.
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Gazi Akter
 * Author URI:        https://gaziakter/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Update URI:        https://criqal.com/
 * Text Domain:       criqal-plugin
 * Domain Path:       /languages
 */

 // don't call the file directly
 if(!defined('ABSPATH')) exit;

 function criqal_seo_tags(){
    ?>
    <meta name="description" content="Gazi Akter | Web application developer" />
    <meta name="keyword" content="wordpress, php, html" />
    <?php
 }

 add_action( 'wp_head', 'criqal_seo_tags' );

 function criqal_author_bio($content){
   return $content. '<h1>Gazi Akrer</h1>';
 }

 add_filter( 'the_content', 'criqal_author_bio');