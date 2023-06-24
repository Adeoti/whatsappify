<?php


if(! current_user_can('manage_options')){
    exit;
}

?>

<form action="" method="POST" class="wafy-form">
    <div class="wafy-container">
        <div class="wafy-row two_col" style="gap:30px;">
            <div class="wafy-child">
                <label for="wafy-button-label" class="mb-3">Button Label</label>
                <input type="text" id="wafy-button-label" placeholder="Need to chat? Chat on WhatsApp" class="wafy-text-field" name="whatsappify_agent_field[wafy_button_label]" />
            
                    <br><br>
                    <p style="font-weight:600; color:#0e153a;" class="mb-7">Button Style</p>
                        <div class="wafy-flex">
                        <div>
                            <label for="wafy-button-default">Default<label>
                            <input type="radio" id="wafy-button-default" name="whatsappify_agent_field[wafy_button_style]" value="rounded"/>
                        </div>
                        <div>
                            <label for="wafy-button-rectangle">Rectangle<label>
                            <input type="radio" id="wafy-button-rectangle" name="whatsappify_agent_field[wafy_button_style]" value="rectangle"/>
                        </div>

                        <div>
                            <label for="wafy-button-rounded">Rounded<label>
                            <input type="radio" id="wafy-button-rounded" name="whatsappify_agent_field[wafy_button_style]" value="rounded"/>
                        </div>
                        </div>


                        <br><br>
                    <p class="label" class="mb-7">Button Color</p>
                        <div class="wafy-flex">
                        <div>
                            <label for="wafy-button-bg">Background<label>
                            <input type="color" class="mt-6" id="wafy-button-bg" name="whatsappify_agent_field[wafy_button_bg]" />
                        </div>
                        <div>
                            <label for="wafy-button-text">Text<label>
                            <input type="color" class="mt-6" id="wafy-button-text" name="whatsappify_agent_field[wafy_button_text_color]" />
                        </div>

                        </div>
                
            </div>
            
            <div class="wafy-button-preview">
                <h3>The Preview</h3>

                <div class="wafy-button-preview__holder"> 
                    [Preview...]
                </div>

            </div>
        </div>

    </div>
</form>

