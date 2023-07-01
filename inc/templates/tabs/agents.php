<?php
    if(! current_user_can('manage_options')){
        exit;
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
    while($wafy_agents -> have_posts()){
        $wafy_agents -> the_post();
        
        $agent_name =  get_post_meta(get_the_ID(), 'wafy_agent_name', true);
        $agent_role =  get_post_meta(get_the_ID(), 'wafy_agent_title', true);

        ?>

            <tr class="wafy_agent_row">
                <td><input type="checkbox" ></td>
                <td><?php echo $agent_name;?></td>
                <td><?php echo $agent_role;?></td>
            </tr>
        
        <?php
        
    }
    ?>
    </tbody>
    </table>

        <br><br>
        <button class="button button-primary">save changes</button>
    </form>
    <?php
?>

</div>