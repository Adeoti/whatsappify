<?php
if(! current_user_can('manage_options')){
    echo "I can't do much if called directly!";
    exit;

    
}
?>
<div class="wafy_admin_wrapper">
    <div class="wafy_admin_wrapper__header">
        <img src="<?php echo plugin_dir_url(__FILE__).'../../assets/images/whatsappify_logo.png';?>" >
        <div>
            <h3>Manage WhatsAppify Widget</h3>
            <p>Manage and customize your widget to determine where and how it displays on your website.</p>
        </div>
    </div>
</div>
<div class="wrap">
    <?php
        $default_tab = null;
        $tab = "";
        $tab_prefix = '?page=wp-whatsappify-manage_widget&tab=';
        if(isset($_GET['tab'])){
            $tab = preg_replace("[^0-9]","",$_GET['tab']);
            
        }else{
            $tab = $default_tab;
        }


    ?>

        <nav class="nav-tab-wrapper">
            <a href="<?php echo $tab_prefix;?>agents" class="nav-tab <?php if($tab == 'agents') echo 'nav-tab-active';?>">Choose Agents</a>
            <a href="<?php echo $tab_prefix;?>design" class="nav-tab <?php if($tab == 'design') echo 'nav-tab-active';?>">Design</a>
            <a href="<?php echo $tab_prefix;?>controls" class="nav-tab <?php if($tab == 'controls') echo 'nav-tab-active';?>">Controls</a>
            <!-- <a href="<?php echo $tab_prefix;?>premium" class="nav-tab <?php if($tab == 'premium') echo 'nav-tab-active';?>">Premium</a> -->
        </nav>

        <div class="tab-content">
            <?php
                if($tab != null){
                    switch($tab){
                        case 'agents':
                            require_once plugin_dir_path(__FILE__)."tabs/agents.php";
                        break;
                        case 'design':
                            require_once plugin_dir_path(__FILE__)."tabs/design.php";
                        break;
                        case 'controls':
                            require_once plugin_dir_path(__FILE__)."tabs/controls.php";
                        break;
                        case 'premium':
                            require_once plugin_dir_path(__FILE__)."tabs/premium.php";
                        break;
                        default:
                        require_once plugin_dir_path(__FILE__)."tabs/welcome.php";
                        break;
                    }
                }else{
                    require_once plugin_dir_path(__FILE__)."tabs/welcome.php";
                }
            ?>
        </div>
</div>