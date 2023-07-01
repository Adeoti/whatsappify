<?php


if(! current_user_can('manage_options')){
    exit;
}

?>

<div class="wafy-form">
    <div class="wafy-container">
        <div class="wafy-row">
            <div class="wafy-child">
                <label for="wafy-agent-name"  class="mb-2">Agent Name</label>
            </div>
            <div class="wafy-child">
                <input type="text" id="wafy-agent-name" required class="wafy-text-field" name="whatsappify_agent_field[wafy_agent_name]" value="<?php echo esc_attr(get_post_meta(get_the_ID(), 'wafy_agent_name', true));?>"/>
            </div>
        </div>

        <div class="wafy-row two_col">
            <div class="wafy-child ">
                <label for="wafy-agent-title" class="mb-7">Agent Role</label>
                <input type="text" required placeholder="ex: Sales Rep" id="wafy-agent-title" class="wafy-text-field" name="whatsappify_agent_field[wafy_agent_title]" value="<?php echo esc_attr(get_post_meta(get_the_ID(), 'wafy_agent_title', true));?>"/>
            </div>
            <div class="wafy-child">
                <label for="wafy-whatsapp-number" class="mb-7">WhatsApp Number</label>
                <input type="text" required placeholder="+2347080000000 (country code with the number)" id="wafy-whatsapp-number" class="wafy-text-field" name="whatsappify_agent_field[wafy_whatsapp_number]" value="<?php echo esc_attr(get_post_meta(get_the_ID(), 'wafy_whatsapp_number', true));?>"/>
            </div>
        </div>
        <div class="wafy-row">
            <label for="wafy-pre-message" class="mb-2">Predefined WhatsApp Message</label>
                <textarea placeholder="" style="min-height:100px; resize:none;" id="wafy-pre-message" class="wafy-text-field" name="whatsappify_agent_field[wafy_pre_message]"><?php echo  esc_attr(get_post_meta(get_the_ID(), 'wafy_pre_message', true));?></textarea>
            
        </div>
<!--
        <div class="wafy-row">
            <p class="label">Availability Status</p>
                <?php
                    $online_status = get_post_meta(get_the_ID(), 'wafy_online_status', true);
                ?>
                <div class="wafy-row two_col">
                    <div>
                        <label style="display:inline;" for="wafy-always-online">Always Online</label> 
                        <input <?php if($online_status == 'always') echo 'checked="checked"'; ?> type="radio" name="whatsappify_agent_field[wafy_online_status]" value="always" id="wafy-always-online" />
                    </div>
                    <div>
                        <label style="display:inline;" for="wafy-not-always-online">Not Always Online</label> 
                        <input <?php  if($online_status == 'not_always') echo 'checked="checked"'; ?> type="radio" name="whatsappify_agent_field[wafy_online_status]" value="not_always" id="wafy-not-always-online" />
                    </div>
                </div>

            
        </div>
-->


    </div>
</div>

