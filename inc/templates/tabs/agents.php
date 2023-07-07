<?php
    if(! current_user_can('manage_options')){
        exit;
    }



    if(isset($_POST['wafy_save_agents'])){

            //Validate with nonce
            $wafy_noncer = $_POST['wafy_nonce'];
            if(wp_verify_nonce($wafy_noncer, 'wafy_agent_nonce')){
                if(isset($_POST['wafy_agent_onboard'])){
                $wafy_selected_agents = preg_replace('/[^0-9]/',"", $_POST['wafy_agent_onboard']);
                $wafy_agents = implode(',', $wafy_selected_agents);
                if(update_option('wafy_wid_agents', $wafy_agents)){
                    ?>
                        <div class="updated notice notice-success is-dismissible">
                            <p>Agents saved successfully!</p>
                        </div>
                    <?php
                }
        }
            }

        
    }

?>

<div class="wrap">
<?php
    $wafy_count = 0;
    

    $wafy_agents = new WP_Query(array(
        'post_type' => 'whatsappify_cpt',
        
    ));


    while($wafy_agents -> have_posts()){
        $wafy_agents -> the_post();
        $wafy_count ++;
    }

    if($wafy_count > 0){
        ?>
            <p class="description">
                <i class="fa fa-pencil"></i> Check the box to add the agent to the widget.
            </p>
        <?php
    }

        ?>
    <form method="POST">
        <table cellpadding="20px">
            <tbody>
        <?php

        $wafy_added_agents = get_option('wafy_wid_agents');
            $wafy_added_agents = explode(',', $wafy_added_agents);

               // print_r($wafy_added_agents);

    while($wafy_agents -> have_posts()){
        $wafy_agents -> the_post();
        
        $agent_name =  get_post_meta(get_the_ID(), 'wafy_agent_name', true);
        $agent_role =  get_post_meta(get_the_ID(), 'wafy_agent_title', true);

        ?>


            <tr class="wafy_agent_row">
                <td><input <?php if(in_array(get_the_ID(), $wafy_added_agents)) echo "checked";?> id="<?php echo get_the_ID();?>" type="checkbox" value="<?php echo get_the_ID();?>" name="wafy_agent_onboard[]"></td>
                <td><label for="<?php echo get_the_ID();?>" style="font-weight:500;"><?php echo $agent_name;?></label></td>
                <td><label for="<?php echo get_the_ID();?>"><?php echo $agent_role;?></label></td>
            </tr>
        
        <?php
        wp_reset_postdata();
    }

    $wafy_nonce = wp_create_nonce('wafy_agent_nonce');
    ?>
    </tbody>
    </table>

        <br><br>
        <input type="hidden" name="wafy_nonce" value="<?php echo esc_attr($wafy_nonce); ?>">
        <button class="button button-primary" name="wafy_save_agents">save changes</button>
    </form>
    <?php
?>

</div>