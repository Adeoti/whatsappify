<?php

class WafyAgentType{
    public function __construct()
    {
      add_action('init', [$this, 'wafyAllAccounts']);  
      add_action('admin_init', [$this, 'whatsAppifyCField']);
    }

    public function wafyAllAccounts(){
        $labels = array(
            'name' => __('WhatsAppify Agents', 'whatsappify'),
            'edit_item' => __('Edit Account', 'whatsappify'),
            'all_item' => __('WhatsAppify Agents', 'whatsappify'),
            'view_item' => __('View Agent','whatsappify'),
            'add_new' => __('Add Agent', 'whatsappify'),
            'add_new_item' => __('Add New Agent', 'whatsappify'),
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

        wp_register_script('wafy_cpt_js', plugin_dir_url(__FILE__)."../assets/js/cpt.js",array(), 1.0, true);
        wp_enqueue_script('wafy_cpt_js');
    }

    // Add Agent Primary Fields
    public function whatsAppifyCField(){
       
        add_meta_box(
            'whatsappify_agent_field', 
            'Agent Information', 
            [$this, 'whatsappifyAgentInformation'], 
            'whatsappify_cpt',
            'normal',
        );

        // Add Agent's Shortcode Fields
        add_meta_box(
            'whatsappify_button_field', 
            'Shortcode Output', 
            [$this, 'whatsappifyButtonField'], 
            'whatsappify_cpt',
            'normal',
        );
    }

    //Link to Agent's Info Template
    public  function whatsappifyAgentInformation(){
        echo '<form class="mini_fu" method="POST">';
        require_once plugin_dir_path(__FILE__) ."../inc/templates/agentinfo.php";
    }

    //Link to Agent's Shortcode Template
    public  function whatsappifyButtonField(){
       require_once plugin_dir_path(__FILE__) ."../inc/templates/buttonstyle.php";
       echo "</form>";
    }

}