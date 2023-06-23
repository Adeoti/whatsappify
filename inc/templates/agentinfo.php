<?php


if(! current_user_can('manage_options')){
    exit;
}

?>

<form action="" method="POST" class="wafy-form">
    <div class="wafy-container">
        <div class="wafy-row">
            <div class="wafy-child">
                <label for="wafy-agent-name" class="mb-2">Agent Name</label>
            </div>
            <div class="wafy-child">
                <input type="text" id="wafy-agent-name" class="wafy-text-field" name="whatsappify_agent_field[wafy_agent_name]" />
            </div>
        </div>

        <div class="wafy-row two_col">
            <div class="wafy-child ">
                <label for="wafy-agent-title" class="mb-7">Agent Title</label>
                <input type="text" placeholder="ex: Sales Rep" id="wafy-agent-title" class="wafy-text-field" name="whatsappify_agent_field[wafy_agent_title]" />
            </div>
            <div class="wafy-child">
                <label for="wafy-whatsapp-number" class="mb-7">WhatsApp Number</label>
                <input type="text" placeholder="+2347080000000 (country code with the number)" id="wafy-whatsapp-number" class="wafy-text-field" name="whatsappify_agent_field[wafy_whatsapp_number]" />
            </div>
        </div>
        <div class="wafy-row">
            <label for="wafy-pre-message" class="mb-2">Predefined WhatsApp Message</label>
                <textarea placeholder="" id="wafy-pre-message" class="wafy-text-field" name="whatsappify_agent_field[wafy_pre_message]"></textarea>
            
        </div>
    </div>
</form>

