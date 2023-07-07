<?php
    if(! current_user_can('manage_options')){
        exit;
    }


    if(isset($_POST['wafy_save_controls'])){
        $wafy_control_nonce = $_POST['wafy_control_nonce'];
        if(wp_verify_nonce($wafy_control_nonce, 'wafy_control_nonce00x')){
            
            if(isset($_POST['wafy_wid_display'])){
                $display_status = preg_replace('/[^0-9]/', '', $_POST['wafy_wid_display']);
            }else{
                $display_status = 1;
            }

            if(isset($_POST['wafy_page_to_show'])){
                $wafy_pages_to_show = preg_replace('/[^0-9]/', '', $_POST['wafy_page_to_show']);
                $wafy_pages_to_show = implode(',', $wafy_pages_to_show);

                    update_option('wafy_pages_to_show', $wafy_pages_to_show);
                    update_option('wafy_wid_display', $display_status);

                    
                        ?>
                         <div class="updated notice notice-success is-dismissible">
                            <p>Settings saved successfully!</p>
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
            <h4 style="border-bottom:1px solid lightgrey; padding:10px 0px;">Visibility</h4>
                <div class="wafy-flex">
                    <div ><label>Display status</label></div>
                    <div>
                        <label for="wafy_display_yes">Yes</label> 
                        <input <?php if(get_option('wafy_wid_display', '') == 1) echo 'checked';?> type="radio" value="1" id="wafy_display_yes" name="wafy_wid_display">
                        <label  for="wafy_display_no">No</label> 
                        <input <?php if(get_option('wafy_wid_display', '') == 0) echo 'checked';?> type="radio" value="0" id="wafy_display_no" name="wafy_wid_display">
                    </div>
                </div>

                <div style="display:none;">
                    <div style="margin:10px 0px">
                        <label for="wafy_wid_title"><b>Active Days</b><label>

                    </div>
                    <div>
                        <input type="text" id="wafy_wid_title" name="wafy_wid_title" />
                    </div>
                </div>


                

               
      
        
        </div>

        <div style=" width:30%;">
        <h4 style="border-bottom:1px solid lightgrey; padding:10px 0px;">Pages to show on</h4>

        <div class="wafy-flex">
            <?php
                $wafy_control_nonce = wp_create_nonce('wafy_control_nonce00x');
            ?>
                    <input type="hidden" name="wafy_control_nonce" value="<?php echo esc_attr($wafy_control_nonce);?>">
                    <div>
                        <ul>
                        <?php
                            $pages_to_show = get_pages();
                                $wafy_page_to_show = get_option('wafy_pages_to_show');
                                $wafy_pages_to_show = explode(',', $wafy_page_to_show);
                                foreach($pages_to_show as $wafy_page){
                                    ?>
                                        <li><input type="checkbox" <?php if(in_array($wafy_page -> ID, $wafy_pages_to_show)) echo 'checked';?> name="wafy_page_to_show[]" id="<?php echo $wafy_page -> ID; ?>" value="<?php echo  $wafy_page -> ID; ?>" /> <label for="<?php echo $wafy_page -> ID; ?>"><?php echo  $wafy_page -> post_title;?></label></li>
                                    <?php
                                }
                        ?>
                        </ul>
                    </div>
        </div>
        

       

        
        </div>
        <div style="width:30%;">
        
        </div>
    </div>
    <br><br>
    <button class="button button-primary" name="wafy_save_controls">save changes</button>
</form>
</div>