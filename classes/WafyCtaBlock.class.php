<?php

class WafyCtaBlock{
    public $root_path;
    public function __construct($root_path)
    {
        $this -> root_path = $root_path;
        add_action('init', [$this, 'wafy_block']);
    }

    public function wafy_block(){
        register_block_type($this -> root_path, array(
             'render_callback' => array($this, 'wafy_block_template')
         ));
     }
 
     public function wafy_block_template($templates){
         $json_template =  wp_json_encode($templates);
         if(!is_admin()){
             wp_enqueue_script('wafy_block_js', WAFY_URL."./build/front-wafy-block.js", array('wp-element'), 1.0, true);
         }
 
 
             ob_start();
             ?>
                 <span class="wafy_cta_block_button">
                     <pre style="display:none;"><?php echo  $json_template;?></pre>
 
                 </span>
 
             <?php
             return ob_get_clean();
     }
}