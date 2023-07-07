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
                                        <div style="padding-top:11px;">
                                            <a href="<?php echo esc_attr($chat_link);?>" class="wafy-agent-name">
                                                <?php echo esc_html(get_post_meta(get_the_ID(), 'wafy_agent_name', true));?>
                                            </a>
                                            <span>
                                            <?php echo esc_html(get_post_meta(get_the_ID(), 'wafy_agent_title', true));?>
                                            </span>
                                        </div>
                                    </div>
                                    <div style="padding-top:11px;">
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
            <a class="wafy_toggler_btn" href="javascript:void(null)" style="font-weight:100; color:<?php echo $opener_text_color;?>; background-color:<?php echo $opener_bg;?>;">
                <i class="fab fa-whatsapp"></i>
            </a>
        </div>

        
    </div>