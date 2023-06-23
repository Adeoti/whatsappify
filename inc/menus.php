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
                'wafyall_accounts', 
                array($this, 'wafyMenuTemplateTab'), 
                'dashicons-car',
                48
            );
            
           

            //create sub menu B: add new account
            add_submenu_page(
                'wafyall_accounts',
                'Create new account',
                'Create new account',
                'manage_options',
                'wafyall_accounts&tab=new_account', 
                array($this,'wafyMenuTemplateTab')
            );

            //create sub menu C: manage whatsapp widgets
            add_submenu_page(
                'wafyall_accounts',
                'Manage Widgets',
                'Manage Widgets',
                'manage_options',
                'wafyall_accounts&tab=manage_widget', 
                array($this,'wafyMenuTemplateTab')
            );

            //create sub menu C: manage whatsapp widgets
            add_submenu_page(
                'wafyall_accounts',
                'Master Settings',
                'Master Settings',
                'manage_options',
                'wp-whatsappify&tab=master_settings', 
                array($this,'wafyMenuTemplateTab')
            );

            //create sub menu D: Supports
            add_submenu_page(
                'wp-whatsappify',
                'Supports',
                'Supports',
                'manage_options',
                'wp-whatsappify&tab=supports', 
                array($this,'wafyMenuTemplateTab')
            );

            
        }

        public function wafyMenuTemplateTab(){
            require_once plugin_dir_path(__FILE__)."./templates/menutemplate.php";
        }

        


 }