<?php
/**
 * Process unistall
 */

 if(!defined('WP_UNINSTALL_PLUGIN')){
    die('You cannot trigger this from the outside');
 }



 function cleanup_wafy_data(){
    if(!current_user_can('delete_plugins')){
        return;
    }

    $wafy_options = [
    'wafy_wid_agents',
    'wafy_wid_avatar_status',
    'wafy_wid_title',
    'wafy_wid_bg',
    'wafy_wid_text_color',
    'wafy_wid_entrance_title',
    'wafy_wid_entrance_msg',
    'wafy_wid_position',
    'wafy_wid_handle',
    'wafy_wid_opener_bg',
    'wafy_wid_opener_text_color',
    'wafy_pages_to_show',
    'wafy_wid_display'
    ];

    $wafy_postmetas = [
        'wafy_agent_name',
        'wafy_agent_title',
        'wafy_whatsapp_number',
        'wafy_pre_message',
        'wafy_online_status',
        'wafy_button_label',
        'wafy_button_bg',
        'wafy_button_text_color',
        'wafy_button_style',
        'wafy_agent_name',
        'wafy_agent_title',
        'wafy_whatsapp_number',
        'wafy_pre_message',
        'wafy_online_status',
        'wafy_button_label',
        'wafy_button_style',
        'wafy_button_bg',
        'wafy_button_text_color',
    ];

    //Get rid of all added options
    foreach($wafy_options as $wafyoption){
        delete_option($wafyoption);
    }


    //Get rid of the custom post type fields
    foreach($wafy_postmetas as $postmeta){
        
    }


    flush_rewrite_rules();
 }

 cleanup_wafy_data();