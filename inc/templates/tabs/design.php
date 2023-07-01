<?php
    if(! current_user_can('manage_options')){
        exit;
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
                        <label for="wafy_avatar_yes">Yes</label> <input type="radio" id="wafy_avatar_yes" name="wafy_wid_avatar">
                        <label for="wafy_avatar_no">No</label> <input type="radio" id="wafy_avatar_no" name="wafy_wid_avatar">
                    </div>
                </div>

                <div class="wafy-flex">
                    <div>
                        <label for="wafy_wid_title">Title<label>

                        </div>
                    <div>
                        <input type="text" id="wafy_wid_title" name="wafy_wid_title" />
                    </div>
                </div>

                
                <div class="wafy-flex">
                    <div>
                        <label for="wafy_wid_bg">Background Color<label>

                        </div>
                    <div>
                        <input type="color" id="wafy_wid_bg" name="wafy_wid_bg" />
                    </div>
                </div>

                <div class="wafy-flex">
                    <div>
                        <label for="wafy_wid_text_color">Text Color<label>
                    </div>
                    <div>
                        <input type="color" id="wafy_wid_text_color" name="wafy_wid_text_color" />
                    </div>
                </div>

                <h4 style="border-bottom:1px solid lightgrey; padding:10px 0px;">Entrance Message</h4>

        <div class="wafy-flex">
                    <div>
                        <label for="wafy_wid_entrance_title" style="width:100%;">Title<label>
                    </div>
                    <div>
                        <input type="text" id="wafy_wid_entrance_title" name="wafy_wid_entrance_title" />
                    </div>
        </div>
        <div class="wafy-flex">
                    <div style="width:100%;">
                        <label for="wafy_wid_entrance_msg">Description<label>
                    
                        <textarea id="wafy_wid_entrance_msg" style="resize:none; margin-top:5px; width:100%;" name="wafy_wid_entrance_msg"></textarea>

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
                        <select id="wafy_wid_postion">
                            <option value="right">Right</option>
                            <option value="left">Left</option>
                        </select>
                    </div>
        </div>
        <div class="wafy-flex">
                    <div>
                        <label for="wafy_wid_handle">Handle Text<label>

                        </div>
                    <div>
                        <input type="text" id="wafy_wid_handle" name="wafy_wid_handle">
                    </div>
        </div>

        <div class="wafy-flex">
                    <div>
                        <label for="wafy_wid_opener_bg">Opener Background<label>

                        </div>
                    <div>
                        <input type="color" id="wafy_wid_opener_bg" name="wafy_wid_opener_bg" />
                    </div>
        </div>
        <div class="wafy-flex">
                    <div>
                        <label for="wafy_wid_opener_text_color">Opener Text Color<label>

                        </div>
                    <div>
                        <input type="color" id="wafy_wid_opener_text_color" name="wafy_wid_opener_text_color" />
                    </div>
        </div>

        
        </div>
        <div style="width:30%;">
        
        </div>
    </div>
    <br><br>
    <button class="button button-primary">save changes</button>
</form>
</div>


    <div class="wafy_widget">
        <div class="wafy_widget__head">
            <div class="w-flex-me">
                <div class="wafy_logo">
                <img style="height:43px;" src="<?php echo plugin_dir_url(__FILE__).'../../../assets/images/whatsappify_icon.png';?>" >
                </div>
                <div class="wafy_avatar">
                    Avatar
                </div>
            </div>    
        <div class="wafy_widget__head-title">
            Title
        </div>
        </div>
        <div class="wafy_widget__body">
            <div class="wafy_widget__entrance-card">
                Entrance Card...
            </div>    
            <div class="wafy_widget__chat-card">
                Chat Card ...
            </div>

        </div>
    </div>