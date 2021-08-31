<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://dsbaileyfreelancer.com.au
 * @since      1.0.0
 *
 * @package    Abcda_User_Manager
 * @subpackage Abcda_User_Manager/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Abcda_User_Manager
 * @subpackage Abcda_User_Manager/admin
 * @author     D S Bailey Freelancer <darren.bailey@dsbaileyfreelancer.com.au>
 */
class Abcda_User_Manager_Admin
{

    /**
     * The ID of this plugin.
     *
     * @since    1.0.0
     * @access   private
     * @var      string    $plugin_name    The ID of this plugin.
     */
    private $plugin_name;

    /**
     * The version of this plugin.
     *
     * @since    1.0.0
     * @access   private
     * @var      string    $version    The current version of this plugin.
     */
    private $version;

    /**
     * Initialize the class and set its properties.
     *
     * @since    1.0.0
     * @param      string    $plugin_name       The name of this plugin.
     * @param      string    $version    The version of this plugin.
     */
    public function __construct($plugin_name, $version)
    {

        $this->plugin_name = $plugin_name;
        $this->version = $version;

    }

    /**
     * Register the stylesheets for the admin area.
     *
     * @since    1.0.0
     */
    public function enqueue_styles()
    {

        /**
         * This function is provided for demonstration purposes only.
         *
         * An instance of this class should be passed to the run() function
         * defined in Abcda_User_Manager_Loader as all of the hooks are defined
         * in that particular class.
         *
         * The Abcda_User_Manager_Loader will then create the relationship
         * between the defined hooks and the functions defined in this
         * class.
         */

        wp_enqueue_style($this->plugin_name, plugin_dir_url(__FILE__) . 'css/abcda-user-manager-admin.css', array(), $this->version, 'all');

    }

    /**
     * Register the JavaScript for the admin area.
     *
     * @since    1.0.0
     */
    public function enqueue_scripts()
    {

        /**
         * This function is provided for demonstration purposes only.
         *
         * An instance of this class should be passed to the run() function
         * defined in Abcda_User_Manager_Loader as all of the hooks are defined
         * in that particular class.
         *
         * The Abcda_User_Manager_Loader will then create the relationship
         * between the defined hooks and the functions defined in this
         * class.
         */

        wp_enqueue_script($this->plugin_name, plugin_dir_url(__FILE__) . 'js/abcda-user-manager-admin.js', array('jquery'), $this->version, false);

    }

    public function add_roles()
    {
        add_role(
            'student_driver', //  System name of the role.
            __('Student Driver'), // Display name of the role.
            array(
                'read' => true,
                'delete_posts' => true,
                'edit_posts' => true,
                'delete_published_posts' => true,
                'edit_published_posts' => true,
                'upload_files' => true,
                'publish_posts' => true,
            )
        );

        add_role(
            'instructor', //  System name of the role.
            __('Instructor'), // Display name of the role.
            array(
                'read' => true,
                'upload_files' => true,
                'list_users' => true,
                'delete_posts' => true,
                'edit_posts' => true,
                'publish_posts' => true,
                'edit_published_posts' => true,
                'delete_published_posts' => true,
                'read_private_posts' => true,
                'read_private_pages' => true,
                'moderate_comments' => true,
                'edit_published_pages' => true,
                'edit_private_pages' => true,
            )
        );

        update_option('default_role', 'student_driver');
    }
    public function customise_user_profile()
    {
		// ##################################
        // programmatically set default role for new users
        // ##################################
        add_filter('pre_option_default_role', function ($default_role) {
            return 'YOUR_DEFAUL_USERROLE';
            return $default_role; //
        });

		// ##################################
        // untick the send the new user and email
        // ##################################
        add_action('user_new_form', 'dontchecknotify_register_form');

        function dontchecknotify_register_form()
        {
            echo '<scr' . 'ipt>jQuery(document).ready(function($) {
        $("#send_user_notification").removeAttr("checked");
    } ); </scr' . 'ipt>';
        }

		// ##################################
        // remove messy profile section items
        // ##################################
        if (is_admin()) {
            remove_action('admin_color_scheme_picker', 'admin_color_scheme_picker');
            add_action('personal_options', 'prefix_hide_personal_options');
        }

        function prefix_hide_personal_options()
        {
            ?>
    <script type="text/javascript">
        jQuery( document ).ready(function( $ ){
            $( '#your-profile .form-table:first, #your-profile h3:first, .yoast, .user-description-wrap, .user-profile-picture, h2, .user-pinterest-wrap, .user-myspace-wrap, .user-soundcloud-wrap, .user-tumblr-wrap, .user-wikipedia-wrap' ).remove();
        } );
    </script>
  <?php
}
    }
}
