<?php


if(! current_user_can('manage_options')){
    exit;
}

?>

<div  class="wafy-form">
    <div class="wafy-container">
        <div class="wafy-row two_col" style="gap:30px;">
            <div class="wafy-child">
                <?php
                    $button_label = esc_attr(get_post_meta(get_the_ID(), 'wafy_button_label', true));
                ?>
                <label for="wafy-button-label" class="mb-3">Button Label</label>
                <input type="text" id="wafy-button-label" placeholder="We are online. Chat our reps!" class="wafy-text-field" name="whatsappify_agent_field[wafy_button_label]" value="<?php if(!empty($button_label)){ echo $button_label;}?>"/>
            
                    <br><br>
                    <?php
                    $button_style = get_post_meta(get_the_ID(), 'wafy_button_style', true);
                ?>
                    <input type="hidden" id="pre_btn_style" value="<?php echo $button_style;?>">
                    <p style="font-weight:600; color:#0e153a;" class="mb-7">Button Style</p>
                        <div class="wafy-flex">
                        <div>
                            <label for="wafy-button-default">Default<label>
                            <input type="radio" <?php if($button_style == 'default' || empty($button_style)) echo 'checked="checked"'; ?> id="wafy-button-default" class="wafy-button-style" name="whatsappify_agent_field[wafy_button_style]" value="default"/>
                        </div>
                        <div>
                            <label for="wafy-button-rectangle">Rectangle<label>
                            <input type="radio" <?php if($button_style == 'rectangle') echo 'checked="checked"'; ?> id="wafy-button-rectangle" class="wafy-button-style" name="whatsappify_agent_field[wafy_button_style]" value="rectangle"/>
                        </div>

                        <div>
                            <label for="wafy-button-rounded">Rounded<label>
                            <input type="radio" <?php if($button_style == 'rounded') echo 'checked="checked"'; ?> id="wafy-button-rounded" class="wafy-button-style" name="whatsappify_agent_field[wafy_button_style]" value="rounded"/>
                        </div>
                        </div>


                        <br><br>
                    <p class="label" class="mb-7">Button Color</p>
                        <div class="wafy-flex">
                        <div>
                            <?php
                                $btn_bg = esc_attr(get_post_meta(get_the_ID(), 'wafy_button_bg', true));
                                $btn_txt_color = esc_attr(get_post_meta(get_the_ID(), 'wafy_button_text_color', true));
                            ?>
                            <label for="wafy-button-bg">Background<label>
                            <input type="color" class="mt-6" id="wafy-button-bg" name="whatsappify_agent_field[wafy_button_bg]" value="<?php if(!empty($btn_bg)){echo $btn_bg;}else{echo "#00ff00";}?>"/>
                        </div>
                        <div>
                            <label for="wafy-button-text">Text<label>
                            <input type="color" class="mt-6" id="wafy-button-text" name="whatsappify_agent_field[wafy_button_text_color]" value="<?php if(!empty($btn_txt_color)){echo $btn_txt_color;}else{echo "#ffffff";}?>"/>
                        </div>

                        </div>
                
            </div>
            
            <div class="wafy-button-preview">
                <h3 style="text-align:center;">The Preview</h3>

                <div class="wafy-button-preview__holder"> 
                    
                    <div id="wafy_btn_house">
                    <span class="fab fa-whatsapp"></span>
                    <a href="javascript:void(null)" id="wafy_preview_btn">
                    </a>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

