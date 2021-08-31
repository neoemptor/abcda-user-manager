<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://dsbaileyfreelancer.com.au
 * @since             1.0.0
 * @package           Abcda_User_Manager
 *
 * @wordpress-plugin
 * Plugin Name:       ABCDA User Manager
 * Description:       This is a plugin which provides instructors and learner drivers a custom user profile for A B C Driving Academy.
 * Version:           1.0.0
 * Author:            D S Bailey Freelancer
 * Author URI:        https://dsbaileyfreelancer.com.au
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       abcda-user-manager
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'ABCDA_USER_MANAGER_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-abcda-user-manager-activator.php
 */
function activate_abcda_user_manager() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-abcda-user-manager-activator.php';
	Abcda_User_Manager_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-abcda-user-manager-deactivator.php
 */
function deactivate_abcda_user_manager() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-abcda-user-manager-deactivator.php';
	Abcda_User_Manager_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_abcda_user_manager' );
register_deactivation_hook( __FILE__, 'deactivate_abcda_user_manager' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-abcda-user-manager.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_abcda_user_manager() {

	$plugin = new Abcda_User_Manager();
	$plugin->run();

}
run_abcda_user_manager();
