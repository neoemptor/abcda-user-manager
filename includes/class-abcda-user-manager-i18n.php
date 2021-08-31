<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://dsbaileyfreelancer.com.au
 * @since      1.0.0
 *
 * @package    Abcda_User_Manager
 * @subpackage Abcda_User_Manager/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Abcda_User_Manager
 * @subpackage Abcda_User_Manager/includes
 * @author     D S Bailey Freelancer <darren.bailey@dsbaileyfreelancer.com.au>
 */
class Abcda_User_Manager_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'abcda-user-manager',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
