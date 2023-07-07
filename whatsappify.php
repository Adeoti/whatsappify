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
        define('WAFY_AGENT', 'whatsappify_cpt');

    }

    public function fireWafyActions(){
        add_action('admin_menu', [$this, 'wafyMenu']);
        add_action('init', [$this, 'wafyAllAccounts']);
        add_action('admin_init', [$this, 'whatsAppifyCField']);
        add_action('admin_enqueue_scripts', [$this, 'wafyAssets']);
        add_action('wp_enqueue_scripts', [$this, 'wafy_front_assets']);
        add_action('save_post', [$this, 'wafy_save_agent']);
        add_action('manage_whatsappify_cpt_posts_columns', [$this, 'wafy_agent_heading_layout']);
        add_action('manage_whatsappify_cpt_posts_custom_column', [$this, 'wafy_agent_table_data'], 10,2);
        add_action('wp_dashboard_setup', [$this, 'wafy_core_widget']);
        add_shortcode('wafy_agent_chat', [$this, 'wafy_agent_shortcode']);
        add_action('wp_footer',[$this, 'wafy_widget_writer']);
    }


    public function wafy_widget_writer($content){
           
            
            $selected_pages = get_option('wafy_pages_to_show', '');
            $display_status = get_option('wafy_wid_display', '');
            $selected_pages_arr = explode(',',$selected_pages);

            if($display_status == 1 && is_page($selected_pages_arr)){
                require_once WAFY_PATH."./inc/templates/tabs/widget-front.php";

            wp_register_style('wafy_widget_style', WAFY_URL."./assets/styles/widget-front.css");
            wp_enqueue_style('wafy_widget_style');

            wp_register_script('wafy_widget_js', WAFY_URL."./assets/js/widget-front.js");
            wp_enqueue_script('wafy_widget_js');
            }
            
    }



    //Front Assets Enqueue
    function wafy_front_assets(){
        wp_enqueue_style('wafy_front_style', WAFY_URL ."./assets/styles/frontstyle.css");
        wp_enqueue_script('wafy_front_js', WAFY_URL. "./assets/js/front.js", array(), 1.0, true);
        wp_enqueue_style('wafy_fontawesome', "//cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css");
    }


    //Shortcode method
    public function wafy_agent_shortcode($atts){
        $wafy_args = shortcode_atts(array('tk' => null), $atts);
        if($wafy_args['tk']){
            //Query the post type
            $query_token = preg_replace('[^0-9]',"", $wafy_args['tk']);

            $wafy_query = new WP_QUERY(array(
                'post_type' => 'whatsappify_cpt',
                'post__in' => array($query_token)
            ));
            $label = $bg = $txt_color = $whatsapp_no = $shape = $style = $pre_msg = "";
            while($wafy_query -> have_posts()){
                $wafy_query -> the_post();
                    $label = get_post_meta(get_the_ID(), 'wafy_button_label', true);
                    $bg = get_post_meta(get_the_ID(), 'wafy_button_bg', true);
                    $txt_color = get_post_meta(get_the_ID(), 'wafy_button_text_color', true);
                    $whatsapp_no = get_post_meta(get_the_ID(), 'wafy_whatsapp_number', true);
                    $shape = get_post_meta(get_the_ID(), 'wafy_button_style', true);
                    $pre_msg = get_post_meta(get_the_ID(), 'wafy_pre_message', true);

                        if(!empty($shape)){
                switch($shape){
                    case 'default':
                            $style = 'border-radius:10px;';
                        break;
                        case 'rounded':
                            $style = 'border-radius:50px;';
                        break;
                        case 'rectangle':
                            $style = 'border-radius:0px;';
                        break;
                        default:
                        $style = 'border-radius:0px;';
                        
                }
            }else{
                $style = 'border-radius:10px;';
                }

                $wafy_link_url = "https://api.whatsapp.com/send?phone={$whatsapp_no}&text={$pre_msg}";
            ob_start();
            ?>
            <div class="wafy-button-preview">
            <div class="wafy-button-preview__holder"> 
                    <div id="wafy_btn_house" style="background-color:<?php echo $bg; ?>; color:<?php echo $txt_color;?>; <?php echo $style;?>">
                    <a href="<?php echo $wafy_link_url; ?>" class="wafy-whatsapp-icon" style="color:<?php echo $txt_color;?>;"><span class="fab fa-whatsapp"></span></a>
                    <a href="<?php echo $wafy_link_url; ?>" id="wafy_preview_btn" style="color:<?php echo $txt_color;?>;">
                        <?php echo $label; ?>
                    </a>
                    </div>
           
                </div>
            </div>
            <?php
            return ob_get_clean();
            }

            

        }else{
            return '** <i class="fa fa-warning"></i> Use the entire shortcode! **';
        }

    }

    public function wafy_core_widget(){
       
        wp_add_dashboard_widget('wafywid', "WhatsAppify Stats", [$this, 'wafy_widget_template']);
    }

    public function wafy_widget_template(){ 
        $w_icon = plugin_dir_url(__FILE__)."assets/images/whatsappify_icon.png";
        ?>
            <img src="<?php echo $w_icon; ?>" style="height:70px;">
            Customiiizzzeee
        <?php
    }

    //Populate the headings...
    public function wafy_agent_heading_layout($columns){
            unset($columns['title']);
            unset($columns['date']);
            $columns['wafy_agent_name'] = __('Agent Name', 'whatsappify');
            $columns['wafy_agent_title'] = __('Role', 'whatsappify');
            $columns['wafy_whatsapp_number'] = __('WhatsApp Line', 'whatsappify');
            $columns['guid'] = __('Avatar', 'whatsappify');
            $columns['wafy_online_status'] = __("Shortcode", 'whatsappify');

        return $columns;
    }
    //Layout the data...

    public function paste_column_data($id,$col){
        echo esc_html(get_post_meta($id, $col, true));
    }

    public function wafy_agent_table_data( $column, $post_id){

           

        switch($column){
            case 'wafy_agent_name':
                $this -> paste_column_data($post_id,$column); 
            break;
            case 'wafy_agent_title':
                $this -> paste_column_data($post_id,$column);
            break;
            case 'wafy_whatsapp_number':
                $this -> paste_column_data($post_id,$column);
            break;
            case 'guid':
                echo get_the_post_thumbnail($post_id, array(50, 50));
            break;
            case 'wafy_online_status':
                echo "[wafy_agent_chat tk={$post_id}]";
            break;
        }
    }

    public function wafy_save_agent($post_id){
        if(get_post_type($post_id) === "whatsappify_cpt"){
                //Process Agent Name
            if(isset($_POST['whatsappify_agent_field']['wafy_agent_name'])){
                $agent_name = sanitize_text_field($_POST['whatsappify_agent_field']['wafy_agent_name']);
                update_post_meta($post_id, 'wafy_agent_name', $agent_name);
            }

            //Process Agent Title
            if(isset($_POST['whatsappify_agent_field']['wafy_agent_title'])){
                $agent_title = sanitize_text_field($_POST['whatsappify_agent_field']['wafy_agent_title']);
                update_post_meta($post_id, 'wafy_agent_title', $agent_title);
            }

            //Process WhatsApp Number
            if(isset($_POST['whatsappify_agent_field']['wafy_whatsapp_number'])){
                $agent_number = sanitize_text_field($_POST['whatsappify_agent_field']['wafy_whatsapp_number']);
                update_post_meta($post_id, 'wafy_whatsapp_number', $agent_number);
            }


            //Process Pre Message
            if(isset($_POST['whatsappify_agent_field']['wafy_pre_message'])){
                $agent_pre_msg = sanitize_text_field($_POST['whatsappify_agent_field']['wafy_pre_message']);
                update_post_meta($post_id, 'wafy_pre_message', $agent_pre_msg);
            }

            //Process online status
            if(isset($_POST['whatsappify_agent_field']['wafy_online_status'])){
                $agent_online = sanitize_text_field($_POST['whatsappify_agent_field']['wafy_online_status']);
                update_post_meta($post_id, 'wafy_online_status', $agent_online);
            }

            //Process Button Label
            if(isset($_POST['whatsappify_agent_field']['wafy_button_label'])){
                $button_label = sanitize_text_field($_POST['whatsappify_agent_field']['wafy_button_label']);
                update_post_meta($post_id, 'wafy_button_label', $button_label);
            }

            //Process Button Style
            if(isset($_POST['whatsappify_agent_field']['wafy_button_style'])){
                $button_style = sanitize_text_field($_POST['whatsappify_agent_field']['wafy_button_style']);
                update_post_meta($post_id, 'wafy_button_style', $button_style);
            }

            //Process Button Bg
            if(isset($_POST['whatsappify_agent_field']['wafy_button_bg'])){
                $button_bg = sanitize_text_field($_POST['whatsappify_agent_field']['wafy_button_bg']);
                update_post_meta($post_id, 'wafy_button_bg', $button_bg);
            }

            
            //Process Button Text Color
            if(isset($_POST['whatsappify_agent_field']['wafy_button_text_color'])){
                $button_txt_color = sanitize_text_field($_POST['whatsappify_agent_field']['wafy_button_text_color']);
                update_post_meta($post_id, 'wafy_button_text_color', $button_txt_color);
            }

        }
    }
    public function wafyAssets(){
        wp_enqueue_style('wafystyle', WAFY_URL."./assets/styles/style.css");
        wp_enqueue_script('wafyjs', WAFY_URL."./assets/js/main.js", array(), 1.0, true);
        wp_enqueue_style('wafy_fontawesome', "//cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css");
    }



    function __construct(){
        $this -> init();
        $this -> fireWafyActions();

    }

    function wafyAllAccounts(){
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

        wp_register_script('wafy_cpt_js',WAFY_URL."./assets/js/cpt.js",array(), 1.0, true);
        wp_enqueue_script('wafy_cpt_js');
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
            'Shortcode Output', 
            [$this, 'whatsappifyButtonField'], 
            'whatsappify_cpt',
            'normal',
        );
    }

    public function whatsappifyAgentInformation(){
        echo '<form class="mini_fu" method="POST">';
        require_once WAFY_PATH ."./inc/templates/agentinfo.php";
    }

    public function whatsappifyButtonField(){
       require_once WAFY_PATH ."./inc/templates/buttonstyle.php";
       echo "</form>";
    }

 }

 $whatsappify_ade = new WhatsAppify_Ade();

