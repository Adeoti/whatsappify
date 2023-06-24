<?php
/**
 * Plugin Name: WhatsAppify
 * Plugin URI: https://github.com/adeoti/whatsappify
 * Description: The smartest wordpress plugin to give better customer experience to your customers, and generate more sales on the fly.
 * Version: 1.0
 * Requires: 5.0
 * Requires at least: 5.2
 * License: GPLv2 or later
 * Text Domain: whatsappify
 * Author: Adeoti Nurudeen
 * Author URI: https://github.com/adeoti
 * 
 * @package whatsappify
 */



 if(! defined('ABSPATH')){
    die;
 }

require_once plugin_dir_path(__FILE__). "./inc/menus.php";

 class WhatsAppify_Ade extends wafyiMenu{

    
    public function init(){
        
        //Define constants

        define('WAFY_PATH', plugin_dir_path(__FILE__));
        define('WAFY_BASENAME', plugin_basename(__FILE__));
        define('WAFY_URL', plugin_dir_url(__FILE__));
        define('WAFY_DIR', __DIR__);

    }

    public function fireWafyActions(){
        add_action('admin_menu', [$this, 'wafyMenu']);
        add_action('init', [$this, 'wafyAllAccounts']);
        add_action('admin_init', [$this, 'whatsAppifyCField']);
        add_action('admin_enqueue_scripts', [$this, 'wafyAssets']);
    }

    public function wafyAssets(){
        wp_enqueue_style('wafystyle', WAFY_URL."./assets/styles/style.css");
    }



    function __construct(){
        $this -> init();
        $this -> fireWafyActions();

    }

    function wafyAllAccounts(){
        $labels = array(
            'name' => __('All Agents', 'whatsappify'),
            'edit_item' => __('Edit Account', 'whatsappify'),
            'all_item' => __('All Agents', 'whatsappify'),
            'view_item' => __('View Agent','whatsappify'),
            'add_new_item' => __('Add Agent', 'whatsappify'),
            'not_found' => __('WhatsAppify Agent not found', 'whatsappify'),
            'not_found_in_search' => __('WhatsAppify Agent not found in search result', 'whatsappify'),
            'featured_image' => __('Agent Avatar', 'whatsappify'),
            'set_featured_image' => __('Set Agent Avatar', 'whatsappify'),
            'item_published' => __('Agent added successfully' , 'whatsappify'),
            'item_updated' => __('Agent updated successfully', 'whatsappify'),
            'item_reverted_to_draft' => __('Agent swapped to draft', 'whatsappify'),
            'remove_featured_image' => __('Remove Avatar', 'whatsappify')

        );
        $args = array(
            'labels' => $labels,
            'public' => true,
            'supports' => array('custom-fields','thumbnail'),
            'show_in_rest' => false,
            'has_archive' => true,
            'rewrite' => array('slug' => 'whatappify-accounts'),
            'show_in_menu' => 'wp-whatsappify-menu'

        );
        //register post type for the agents
        register_post_type('whatsappify_cpt', $args);
    }



    public function whatsAppifyCField(){
       
        add_meta_box(
            'whatsappify_agent_field', 
            'Agent Information', 
            [$this, 'whatsappifyAgentInformation'], 
            'whatsappify_cpt',
            'normal',
        );

        add_meta_box(
            'whatsappify_button_field', 
            'Button Style', 
            [$this, 'whatsappifyButtonField'], 
            'whatsappify_cpt',
            'normal',
        );
    }

    public function whatsappifyAgentInformation(){
        require_once WAFY_PATH ."./inc/templates/agentinfo.php";
    }

    public function whatsappifyButtonField(){
       require_once WAFY_PATH ."./inc/templates/buttonstyle.php";
    }

 }

 $whatsappify_ade = new WhatsAppify_Ade();

