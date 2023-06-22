<?php

/**
 * Plugin Name: Gravity Forms Activate User After Payment
 * Description: Prototype
 * Version: 1.0.0
 * Author: Wan Zulkarnain
 * 
 * Copyright: © 2023 Wan Zulkarnain
 * License: GNU General Public License v3.0
 * License URI: http://www.gnu.org/licenses/gpl-3.0.html
 */

add_action( 'gform_post_payment_completed', 'gf_activate_after_pay_wan', 10, 2);

function gf_activate_after_pay_wan( $entry, $action ) {
  require_once( gf_user_registration()->get_base_path() . '/includes/signups.php' );

  GFUserSignups::prep_signups_functionality();

  $key = GFUserSignups::get_lead_activation_key( $entry['id'] );
  GFUserSignups::activate_signup( $key );
}