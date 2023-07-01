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

             //create sub menu C: Support whatsapp widgets
             add_submenu_page(
                'wp-whatsappify-menu',
                'Support',
                'Support',
                'manage_options',
                'wp-whatsappify-support', 
                array($this,'wafyMenuSupport')
            );

            
        }

        public function wafyMenuSupport(){
            ?>
                <div class="wrap" style="background:#fff; padding:20px;">
                    <h3>Need Help?</h3>
                    <hr>
                        <div>
                            Do you need help concerning the WhatsAppify plugin? OR
                            <br>
                            Do you need a bespoke WordPress service like:
                                <ol>
                                    <li>Website Design &amp; Redesign</li>
                                    <li>Website Managemanet</li>
                                    <li>Theme / Plugin Development and Customization</li>
                                </ol> 
                            <br><br>
                            <b>&rArr; Kindly chat me on <a href="https://api.whatsapp.com/send?phone=+2347081137136&text=Hello%20Adeoti%20(creator%20of%20WhatsAppify),%20I%20need%20your%20help%20on%20_______">WhatsApp</a></b>
                        </div>
                </div>
            <?php
        }
        public function wafyMenuTemplateTab(){
            require_once plugin_dir_path(__FILE__)."./templates/menutemplate.php";
        }

        public function wafyMenuWidget(){
            require_once plugin_dir_path(__FILE__). "./templates/widget_tabs.php";
        }
        


 }