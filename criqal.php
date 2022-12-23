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
if(is_admin()){
   require_once dirname(__FILE__). '/includes/admin/profile.php';
}
 function criqal_seo_tags(){
    ?>
    <meta name="description" content="Gazi Akter | Web application developer" />
    <meta name="keyword" content="wordpress, php, html" />
    <?php
 }

 add_action( 'wp_head', 'criqal_seo_tags' );

 function criqal_author_bio($content){

   global $post;
   $author = get_user_by( 'id', $post->post_author );

   $bio = get_user_meta( $author->ID, 'description', true );
   $facebook = get_user_meta( $author->ID, 'facebook', true );
   $twitter = get_user_meta( $author->ID, 'twitter', true );
   $linkedin = get_user_meta( $author->ID, 'linkedin', true );

   ob_start();
   ?>
   <div class="criqal-bil-wrap">
       <div class="avatar-image">
           <?php echo get_avatar( $author->ID, 64 ); ?>
       </div>
       <div class="criqal-bio-content">
         <div class="author-name"><?php echo $author->display_name; ?></div>
         <div class="criqal-author-bio"><?php echo wpautop( wp_kses_post( $bio ) ); ?></div>
         <ul class="criqal-socials">
            <?php if($twitter){ ?>
               <li><a href="<?php echo esc_url( $twitter ); ?>"><?php _e( 'Twitter', 'criqal' ); ?></a></li>
            <?php } ?>
            <?php if($facebook){ ?>
               <li><a href="<?php echo esc_url( $facebook ); ?>"><?php _e( 'Facebook', 'criqal' ); ?></a></li>
            <?php } ?>
            <?php if($linkedin){ ?>
               <li><a href="<?php echo esc_url( $linkedin ); ?>"><?php _e( 'Linkedin', 'criqal' ); ?></a></li>
            <?php } ?>
         </ul>
       </div>

   </div>
   <?php
   $bio_content = ob_get_clean();
   return $content . $bio_content;
 }

 add_filter( 'the_content', 'criqal_author_bio');