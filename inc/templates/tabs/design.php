<?php

    /**
     *   $wafy_wid_title = sanitize_text_field($_POST['wafy_wid_title']);
            $wafy_wid_bg = sanitize_hex_color($_POST['wafy_wid_bg']);
            $wafy_wid_text_color = sanitize_hex_color($_POST['wafy_wid_text_color']);
            $wafy_wid_entrance_title = sanitize_text_field($_POST['wafy_wid_entrance_title']);
            $wafy_wid_entrance_msg = sanitize_textarea_field($_POST['wafy_wid_entrance_msg']);
            $wafy_wid_position = sanitize_text_field($_POST['wafy_wid_position']);
            $wafy_wid_handle = sanitize_text_field($_POST['wafy_wid_handle']);
            $wafy_wid_opener_bg = sanitize_hex_color($_POST['wafy_wid_opener_bg']);
            $wafy_wid_opener_text_color = sanitize_hex_color($_POST['wafy_wid_opener_text_color']);

              
                    $a = update_option('wafy_wid_avatar_status', $wafy_wid_avatar_status);
                    $b = update_option('wafy_wid_title', $wafy_wid_title);
                    $c = update_option('wafy_wid_bg', $wafy_wid_bg);
                    $d = update_option('wafy_wid_text_color', $wafy_wid_text_color);
                    $e = update_option('wafy_wid_entrance_title', $wafy_wid_entrance_title);
                    $f = update_option('wafy_wid_entrance_msg', $wafy_wid_entrance_msg);
                    $g = update_option('wafy_wid_position', $wafy_wid_position);
                    $h = update_option('wafy_wid_handle', $wafy_wid_handle);
                    $i = update_option('wafy_wid_opener_bg', $wafy_wid_opener_bg);
                    $j = update_option('wafy_wid_opener_text_color', $wafy_wid_opener_text_color);
                

                if($a && $b && $c && $d && $e)
     */


    if(! current_user_can('manage_options')){
        exit;
    }

    function clean_field($field){
        return esc_html(sanitize_text_field($field));
    }


    if(isset($_POST['wafy_save_design'])){
        $wafy_design_nonce = $_POST['wafy_design_nonce'];

            function wafy_update_option($data = array()){
                foreach($data as $option_field => $option_value){
                 update_option($option_field, $option_value);
                }
                return true;
            } 
        
        if(wp_verify_nonce($wafy_design_nonce, 'wafy_design_nonce00x')){
            $wafy_wid_avatar_status = 0;
            if(isset($_POST['wafy_wid_avatar'])){
                $wafy_wid_avatar_status = preg_replace('/[^0-9]/', "", $_POST['wafy_wid_avatar']);
            }
            $wafy_wid_title = sanitize_text_field($_POST['wafy_wid_title']);
            $wafy_wid_bg = sanitize_hex_color($_POST['wafy_wid_bg']);
            $wafy_wid_text_color = sanitize_hex_color($_POST['wafy_wid_text_color']);
            $wafy_wid_entrance_title = sanitize_text_field($_POST['wafy_wid_entrance_title']);
            $wafy_wid_entrance_msg = sanitize_textarea_field($_POST['wafy_wid_entrance_msg']);
            $wafy_wid_position = sanitize_text_field($_POST['wafy_wid_position']);
            $wafy_wid_handle = sanitize_text_field($_POST['wafy_wid_handle']);
            $wafy_wid_opener_bg = sanitize_hex_color($_POST['wafy_wid_opener_bg']);
            $wafy_wid_opener_text_color = sanitize_hex_color($_POST['wafy_wid_opener_text_color']);

               $wafy_design_updated =  wafy_update_option(array(
                    'wafy_wid_avatar_status' => $wafy_wid_avatar_status,
                    'wafy_wid_title' => $wafy_wid_title,
                    'wafy_wid_bg' => $wafy_wid_bg,
                    'wafy_wid_text_color' => $wafy_wid_text_color,
                    'wafy_wid_entrance_title' => $wafy_wid_entrance_title,
                    'wafy_wid_entrance_msg' => $wafy_wid_entrance_msg,
                    'wafy_wid_position' => $wafy_wid_position,
                    'wafy_wid_handle' => $wafy_wid_handle,
                    'wafy_wid_opener_bg' => $wafy_wid_opener_bg,
                    'wafy_wid_opener_text_color' => $wafy_wid_opener_text_color
                ));

                if($wafy_design_updated){
                    ?>
                         <div class="updated notice notice-success is-dismissible">
                            <p>Saved successfully!</p>
                        </div>
                    <?php
                }
            
        }
    }


   
?>

<div class="wrap">
<form method="POST">
    <div class="wafy-flex">
        <div class="" style="width:25%;">
            <h4 style="border-bottom:1px solid lightgrey; padding:10px 0px;">Leatherboard</h4>
                <div class="wafy-flex">
                    <div ><label>Show Avatar</label></div>
                    <div>
                        <?php
                            $wafy_design_nonce = wp_create_nonce('wafy_design_nonce00x');
                        ?>
                        <input type="hidden" name="wafy_design_nonce" value="<?php echo esc_attr($wafy_design_nonce);?>">
                        <label for="wafy_avatar_yes">Yes</label> 
                        <input type="radio" <?php if(get_option('wafy_wid_avatar_status') == 1) echo 'checked'?> value="1" id="wafy_avatar_yes" name="wafy_wid_avatar">
                        <label for="wafy_avatar_no">No</label> 
                        <input type="radio" <?php if(get_option('wafy_wid_avatar_status') == 0) echo 'checked'?> value="0" id="wafy_avatar_no" name="wafy_wid_avatar">
                    </div>
                </div>

                <div class="wafy-flex">
                    <div>
                        <label for="wafy_wid_title">Title<label>

                        </div>
                    <div>
                        <input type="text" value="<?php echo esc_attr(get_option('wafy_wid_title')); ?>" id="wafy_wid_title" name="wafy_wid_title" />
                    </div>
                </div>

                
                <div class="wafy-flex">
                    <div>
                        <label for="wafy_wid_bg">Background Color<label>

                        </div>
                    <div>
                        <input type="color" id="wafy_wid_bg" value="<?php echo esc_attr(get_option('wafy_wid_bg')); ?>" name="wafy_wid_bg" />
                    </div>
                </div>

                <div class="wafy-flex">
                    <div>
                        <label for="wafy_wid_text_color">Text Color<label>
                    </div>
                    <div>
                        <input type="color" id="wafy_wid_text_color" value="<?php echo esc_attr(get_option('wafy_wid_text_color')); ?>" name="wafy_wid_text_color" />
                    </div>
                </div>

                <h4 style="border-bottom:1px solid lightgrey; padding:10px 0px;">Entrance Message</h4>

        <div class="wafy-flex">
                    <div>
                        <label for="wafy_wid_entrance_title" style="width:100%;">Title<label>
                    </div>
                    <div>
                        <input type="text" value="<?php echo esc_attr(get_option('wafy_wid_entrance_title')); ?>" id="wafy_wid_entrance_title" name="wafy_wid_entrance_title" />
                    </div>
        </div>
        <div class="wafy-flex">
                    <div style="width:100%;">
                        <label for="wafy_wid_entrance_msg">Description<label>
                    
                        <textarea id="wafy_wid_entrance_msg" style="resize:none; margin-top:5px; width:100%;" name="wafy_wid_entrance_msg"><?php echo esc_html(get_option('wafy_wid_entrance_msg')); ?></textarea>

                    </div>
        </div>
        </div>

        <div style=" width:30%;">
        <h4 style="border-bottom:1px solid lightgrey; padding:10px 0px;">Screen</h4>

        <div class="wafy-flex">
                    <div>
                        <label for="wafy_wid_position">Position on screen<label>

                        </div>
                    <div>
                        <select id="wafy_wid_position" name="wafy_wid_position">
                            <option <?php if(get_option('wafy_wid_position') == 'right') echo 'selected'?> value="right">Right</option>
                            <option <?php if(get_option('wafy_wid_position') == 'left') echo 'selected'?> value="left">Left</option>
                        </select>
                    </div>
        </div>
        <div class="wafy-flex">
                    <div>
                        <label for="wafy_wid_handle">Handle Text<label>

                        </div>
                    <div>
                        <input type="text" id="wafy_wid_handle" value="<?php echo esc_attr(get_option('wafy_wid_handle')); ?>" name="wafy_wid_handle">
                    </div>
        </div>

        <div class="wafy-flex">
                    <div>
                        <label for="wafy_wid_opener_bg">Opener Background<label>

                        </div>
                    <div>
                        <input type="color" id="wafy_wid_opener_bg" value="<?php echo esc_attr(get_option('wafy_wid_opener_bg')); ?>" name="wafy_wid_opener_bg" />
                    </div>
        </div>
        <div class="wafy-flex">
                    <div>
                        <label for="wafy_wid_opener_text_color">Opener Text Color<label>

                        </div>
                    <div>
                        <input type="color" id="wafy_wid_opener_text_color" name="wafy_wid_opener_text_color" value="<?php echo esc_attr(get_option('wafy_wid_opener_text_color')); ?>" />
                    </div>
        </div>

        
        </div>
        <div style="width:30%;">
        
        </div>
    </div>
    <br><br>
    <button class="button button-primary" name="wafy_save_design">save changes</button>
</form>
</div>

<?php
$header_bg = "#000";
$header_title = "Hello, How may we help you?";
$header_text_color = "#03353F";
$entrance_title = "Send Us a Message";
$entrance_description = "We typically reply in a few minutes";
$show_avatar = NULL;
$widget_position = "right";
$handle_text = "We are online. Chat us!";
$opener_bg = "#05CC80";
$opener_text_color = "#FFFFFF";

if(!empty(get_option('wafy_wid_bg'))){
    $header_bg = get_option('wafy_wid_bg');
}

if(!empty(get_option('wafy_wid_text_color'))){
    $header_text_color = get_option('wafy_wid_text_color');
}

if(!empty(get_option('wafy_wid_title'))){
    $header_title = get_option('wafy_wid_title');
}
// line ....
if(!empty(get_option('wafy_wid_entrance_title'))){
    $entrance_title = get_option('wafy_wid_entrance_title');
}

if(!empty(get_option('wafy_wid_entrance_msg'))){
    $entrance_description = get_option('wafy_wid_entrance_msg');
}

if(!empty(get_option('wafy_wid_avatar_status'))){
    $show_avatar = get_option('wafy_wid_avatar_status');
}

//line ....

if(!empty(get_option('wafy_wid_position'))){
    $widget_position = get_option('wafy_wid_position');
}

if(!empty(get_option('wafy_wid_handle'))){
    $handle_text = get_option('wafy_wid_handle');
}

if(!empty(get_option('wafy_wid_opener_bg'))){
    $opener_bg = get_option('wafy_wid_opener_bg');
}
if(!empty(get_option('wafy_wid_opener_text_color'))){
    $opener_text_color = get_option('wafy_wid_opener_text_color');
}


?>
    <div class="wafy_widget">
        <div class="wafy_widget__head" style="background:<?php echo $header_bg;?>; color:<?php echo $header_text_color;?>;">
            <div class="w-flex-me">
                <div class="wafy_logo">
                <img style="height:43px;" src="<?php echo plugin_dir_url(__FILE__).'../../../assets/images/whatsappify_logo.png';?>" >
                </div>
                <div class="wafy_avatar">
                    <?php
                        if($show_avatar == 1){
                            $wafy_added_agentsi = explode(',', get_option('wafy_wid_agents'));

                                $wafy_agent_avatars = new WP_Query(array('post_type' => 'whatsappify_cpt'));
                                while($wafy_agent_avatars -> have_posts()){
                                    $wafy_agent_avatars -> the_post();
                                    
                                       if(in_array(get_the_ID(), $wafy_added_agentsi)){
                                        echo get_the_post_thumbnail(get_the_ID(), array(30, 30)); 
                                       }

                                }


                                wp_reset_postdata();
                        }else{
                           
                        }
                    ?>
                </div>
            </div>    
        <div class="wafy_widget__head-title">
            <?php echo $header_title;?>
        </div>
        </div>
        <div class="wafy_widget__body">
            <div class="wafy_widget__entrance-card">
                <div style="border-left:2px solid #eee; padding-left:7px;">
                    <h4 class="wafy_widget__entrance-card__title" style="margin-bottom:2px;"><?php echo $entrance_title;?></h4>
                <p class="wafy_widget__entrance-card__desc" style="margin-top:2px;"><?php echo $entrance_description;?></p>
                </div>
            </div>    
            <div class="wafy_widget__chat-card">
                <?php
                    //Get the added agents.... 


                    $wafy_availaible_agents = new WP_Query(array(
                        'post_type' => 'whatsappify_cpt',
                    ));
                    
                    $wafy_added_agents = explode(',', get_option('wafy_wid_agents'));

                    while($wafy_availaible_agents -> have_posts()){
                        $wafy_availaible_agents -> the_post();
                        if(in_array(get_the_ID(), $wafy_added_agents)){
                            ?>
                                <div class="wafy_widget__chat-card--single">
                                    
                                    <div class="avatar-with-name">
                                        <div class="avatar-single">
                                            <?php
                                                if(!empty(get_the_post_thumbnail(get_the_ID()))){
                                                 echo get_the_post_thumbnail(get_the_ID(), array(30, 30));   
                                                }else{
                                                    echo "<span style='font-size:30px;'><i class='fa fa-user'></i></span>";
                                                }

                                            $agent_chat = get_post_meta(get_the_ID(), 'wafy_whatsapp_number', true);
                                            $agent_default_msg = get_post_meta(get_the_ID(), 'wafy_pre_message', true);
                                            $chat_link = "https://api.whatsapp.com/send?phone={$agent_chat}&text={$agent_default_msg}";
                                            
                                            ?>
                                        </div>
                                        <div>
                                            <a href="<?php echo esc_attr($chat_link);?>" class="wafy-agent-name">
                                                <?php echo esc_html(get_post_meta(get_the_ID(), 'wafy_agent_name', true));?>
                                            </a>
                                            <span>
                                            <?php echo esc_html(get_post_meta(get_the_ID(), 'wafy_agent_title', true));?>
                                            </span>
                                        </div>
                                    </div>
                                    <div>
                                        <a href="<?php echo esc_attr($chat_link);?>" title="Click to chat..." style="color:#364f6b;" class="wafy-agent-chat-icon"><i class="fab fa-whatsapp"></i></a>
                                    </div>
                                </div>
                            <?php
                        }
                    }

                    wp_reset_postdata();
                
                ?>
               
            </div>

        </div>
    </div>

    <div class="wafy-widget-toggler">
        <div class="wafy-widget-toggler__handle">
            <span><?php echo $handle_text;?></span>
        </div>
        <div class="wafy-widget-toggler__opener">
            <a class="wafy_toggler_btn" href="javascript:void(null)" style="color:<?php echo $opener_text_color;?>; background-color:<?php echo $opener_bg;?>;">
                <i class="fa fa-times"></i>
            </a>
        </div>

        
    </div>