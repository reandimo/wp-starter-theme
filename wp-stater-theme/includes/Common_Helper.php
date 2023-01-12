<?php

/**
 * Class.
 * General functions to be used everywhere
 * All functions must be declared as static
 * 
 * @package    EscaleTheme
 */

namespace Escale\Theme;

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

use \WC_Email;

class Common_Helper
{

  /**
   * generate a unique username checking if the given username exists
   * @param $username username to check and modify if required
   * @return string/bool
   */
  public static function generate_unique_username($username)
  {

    $username = sanitize_user($username);

    static $i;
    if (null === $i) {
      $i = 1;
    } else {
      $i++;
    }
    if (!username_exists($username)) {
      return $username;
    }
    $new_username = sprintf('%s-%s', $username, $i);
    if (!username_exists($new_username)) {
      return $new_username;
    } else {
      return call_user_func(__FUNCTION__, $username);
    }
  }

  /**
   * Build a HTML body with woocommerce template and styling
   * @param $heading string Email header text
   * @param $message string content of template
   * @return string/bool
   */

  public static function get_custom_email_html($heading = null, $message = null)
  {

      if( ! class_exists('WC_Email') ){
        return false;
      }

      if ($message == null || empty($message)) {
        return false;
      }

      // load the mailer class
      $mailer = WC()->mailer();
      // create a new email
      $email = new WC_Email();

      $email_heading = (!empty($heading)) ? $heading : null;
      $message = do_shortcode($message);

      // wrap the content with the email template and then add styles
      $output = apply_filters('woocommerce_mail_content', $email->style_inline($mailer->wrap_message($email_heading, $message)));

      return $output;

  }

  /**
   * Format a given timestamp in format Y-m-d H:i:s and return as string
   * @param $timestamp string Timestamp to format
   * @param $format string Format to return
   * @return string/bool
   */

  public static function format_timestamp(?string $timestamp = null, ?string $format = 'm/d/Y H:i')
  {

    if ($timestamp == null) {
      return false;
    }

    $date = date_create($timestamp);
    return date_format($date, $format);
  }

  /**
   * is_edit_page 
   * function to check if the current page is a post edit page
   * 
   * @author Ohad Raz <admin@bainternet.info>
   * 
   * @param  string  $new_edit what page to check for accepts new - new post page ,edit - edit post page, null for either
   * @return boolean
   */
  public static function is_edit_page($new_edit = null)
  {
    global $pagenow;
    //make sure we are on the backend
    if (!is_admin()) return false;

    if ($new_edit == "edit")
      return in_array($pagenow, array('post.php',));
    elseif ($new_edit == "new") //check for new post page
      return in_array($pagenow, array('post-new.php'));
    else //check for either new or edit
      return in_array($pagenow, array('post.php', 'post-new.php'));
  }

  /**
   * Check if 'edit' or 'new-post' screen of a 
   * given post type is opened
   * 
   * @param null $post_type name of post type to compare
   *
   * @return bool true or false
   */
  public static function is_admin_post_type($post_type = null)
  {
    global $pagenow;

    /**
     * return false if not on admin page or
     * post type to compare is null
     */
    if (!is_admin() || $post_type === null) {
      return FALSE;
    }

    /**
     * if edit screen of a post type is active
     */
    if ($pagenow === 'post.php') {
      // get post id, in case of view all cpt post id will be -1
      $post_id = isset($_GET['post']) ? $_GET['post'] : -1;

      // if no post id then return false
      if ($post_id === -1) {
        return FALSE;
      }

      // get post type from post id
      $get_post_type = get_post_type($post_id);

      // if post type is compared return true else false
      if ($post_type === $get_post_type) {
        return TRUE;
      } else {
        return FALSE;
      }
    } elseif ($pagenow === 'post-new.php' || $pagenow === 'edit.php') { // is new-post screen of a post type is active
      // get post type from $_GET array
      $get_post_type = isset($_GET['post_type']) ? $_GET['post_type'] : '';
      // if post type matches return true else false.
      if ($post_type === $get_post_type) {
        return TRUE;
      } else {
        return FALSE;
      }
    } else {
      // return false if on any other page.
      return FALSE;
    }
  }

  public static function get_wc_status($status)
  {

    switch ($status) {

      case 'wc-pending':
      case 'pending':
        $res = 'Payment Pending';
        break;

      case 'wc-processing':
      case 'processing':
        $res = 'Processing';
        break;

      case 'wc-completed':
      case 'completed':
        $res = 'Completed';
        break;

      case 'wc-refunded':
      case 'refunded':
        $res = 'Refunded';
        break;

      case 'wc-failed':
      case 'failed':
        $res = 'Failed';
        break;

      case 'wc-cancelled':
      case 'cancelled':
        $res = 'Cancelled';
        break;

      default:
        $res = $status;
        break;
    }

    return $res;
  }
}
