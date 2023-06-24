<?php

/**
 * 
 */

 class wafyiMenu {

        public function wafyMenu(){
            //create main menu
            add_menu_page(
                'WhatsAppify',
                'WhatsAppify', 
                'manage_options',
                'wp-whatsappify-menu', 
                array($this, 'wafyMenuTemplateTab'), 
                plugin_dir_url(__FILE__)."../assets/images/whatsappify_icon.svg",
                48
            );

            //create sub menu A: manage whatsapp widgets
            add_submenu_page(
                'wp-whatsappify-menu',
                'New Agent',
                'New Agent',
                'manage_options',
                'post-new.php?post_type=whatsappify_cpt'
            );

            //create sub menu B: manage whatsapp widgets
            add_submenu_page(
                'wp-whatsappify-menu',
                'Manage Widgets',
                'Manage Widgets',
                'manage_options',
                'wp-whatsappify-manage_widget', 
                array($this,'wafyMenuWidget')
            );

            //create sub menu C: manage whatsapp widgets
            add_submenu_page(
                'wp-whatsappify-menu',
                'Master Settings',
                'Master Settings',
                'manage_options',
                'wp-whatsappify-master_settings', 
                array($this,'wafyMenuTemplateTab')
            );

            //create sub menu D: Supports
            add_submenu_page(
                'wp-whatsappify-menu',
                'Supports',
                'Supports',
                'manage_options',
                'wp-whatsappify-supports', 
                array($this,'wafyMenuTemplateTab')
            );

            
        }

        public function wafyMenuTemplateTab(){
            require_once plugin_dir_path(__FILE__)."./templates/menutemplate.php";
        }

        public function wafyMenuWidget(){
            require_once plugin_dir_path(__FILE__). "./templates/widget_tabs.php";
        }
        


 }