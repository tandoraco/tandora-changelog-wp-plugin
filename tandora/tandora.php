<?php
/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://www.tandora.co
 * @since             1.0.0
 * @package           Tandora
 *
 * @wordpress-plugin
 * Plugin Name:       Tandora
 * Plugin URI:        https://bitbucket.org/tandoraco/tandora-wp-plugin
 * Description:       Simplified changelog / announcements app for your wordpress site.
 * Version:           1.0.0
 * Author:            Tandora
 * Author URI:        https://www.tandora.co/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       tandora
 * Domain Path:       /languages
 */
// If this file is called directly, abort.
defined( 'ABSPATH' ) or die( 'Nope, not accessing this' );

if ( ! defined( 'WPINC' ) ) {
	die;
}

class wp_tandora{
		
	//magic function (triggered on initialization)
	public function __construct(){
		add_action('init', array($this,'register_tandora_content_type')); //register tandora content type
		add_action('admin_enqueue_scripts', array($this,'enqueue_admin_scripts_and_styles')); //admin scripts and styles
		add_action('wp_enqueue_scripts', array($this,'enqueue_public_scripts_and_styles')); //public scripts and styles
		
		//add_filter('the_content', array($this,'prepend_tandora_meta_to_content')); //gets our meta data and dispayed it before the content

		register_activation_hook(__FILE__, array($this,'plugin_activate')); //activate hook
		register_deactivation_hook(__FILE__, array($this,'plugin_deactivate')); //deactivate hook
	}
	
	public function register_tandora_plugin() {
		//Labels for post type
		 $labels = array(
            'name'               => 'Tandora',
            'singular_name'      => 'Tandora',
            'menu_name'          => 'Tandora',
            'name_admin_bar'     => 'Tandora',
            'add_new'            => 'Add New Tandora', 
        );
        //arguments for post type
        $args = array(
            'labels'            => $labels,
            'public'            => true,
            'publicly_queryable'=> true,
            'show_ui'           => true,
            'show_in_nav'       => true,
            'query_var'         => true,
            'hierarchical'      => false,
            'supports'          => array('title','thumbnail','editor'),
            'has_archive'       => true,
            'menu_position'     => 20,
            'show_in_admin_bar' => true,
            'menu_icon'         => 'dashicons-location-alt',
            'rewrite'			=> array('slug' => 'tandora', 'with_front' => 'true')
        );
		register_post_type('wp_tandora', $args);
	}

	//triggered on activation of the plugin (called only once)
	public function plugin_activate(){
		//call our custom content type function
	 	$this->register_tandora_plugin();
	}
	
	//trigered on deactivation of the plugin (called only once)
	public function plugin_deactivate(){
	}

	public function prepend_tandora_meta_to_content(){
		return $html + '<b>Tandora</b>';
	}

	//enqueus scripts and stles on the back end
	public function enqueue_admin_scripts_and_styles(){
		wp_enqueue_style('wp_tandora_admin_styles', plugin_dir_url(__FILE__) . '/css/tandora_admin_styles.css');
	}
	
	//enqueues scripts and styled on the front end
	public function enqueue_public_scripts_and_styles(){
		wp_enqueue_style('wp_tandora_public_styles', plugin_dir_url(__FILE__). '/css/tandora_public_styles.css');
	}
	
}

$wp_tandora = new wp_tandora;

//include shortcodes
include(plugin_dir_path(__FILE__) . 'inc/tandora_shortcode.php');

?>