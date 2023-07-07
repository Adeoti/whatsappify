
    const wafy_location = window.location.href;

    console.log(wafy_location);


//Powering the Widget
    
function wafyWidgetHandler(){
          let wafy_vis = false; 
          
          function toggleWid(){
        let wafy_widget = document.querySelector('.wafy_widget');
        let wafy_handle = document.querySelector('.wafy-widget-toggler__handle');
        let wafy_toggler_icon = document.querySelector('.wafy_toggler_btn i');
            if(!wafy_vis){
                wafy_widget.style.opacity = "0";
                wafy_handle.style.opacity = "1";
                wafy_toggler_icon.classList.remove('fa', 'fa-times');
                wafy_toggler_icon.classList.add('fab', 'fa-whatsapp');
                wafy_vis = true;

            }else{
                wafy_widget.style.opacity = "1";
                wafy_handle.style.opacity = "0";
                wafy_toggler_icon.classList.remove('fab', 'fa-whatsapp');
                wafy_toggler_icon.classList.add('fa', 'fa-times');
                wafy_vis = false;
            }
    }

    let wafy_toggler_btn = document.querySelector('.wafy_toggler_btn');
    wafy_toggler_btn.addEventListener('click', () => {
      toggleWid();
       
    });

        //set the widget template on ground.....

                function getEle(elem){
                    return document.querySelector(elem);
                }

         let wid_head = getEle('.wafy_widget__head');
         let wid_head_title = getEle('.wafy_widget__head-title');
         let wid_entrance_title = getEle('.wafy_widget__entrance-card__title');
         let wid_entrance_desc = getEle('.wafy_widget__entrance-card__desc');
         let wid_opener = getEle('.wafy_toggler_btn');
         let wid_handle = getEle('.wafy-widget-toggler__handle');

         //Process the form inputs...
                
                //Handle the title input...
                 const wafy_head_title = document.getElementById('wafy_wid_title');
                wafy_head_title.addEventListener('keyup', () => {
                    if(wafy_head_title != ""){
                        wid_head_title.textContent = wafy_head_title.value;
                    }
                });

                //Handle the header bg

                const wafy_header_bg = document.getElementById('wafy_wid_bg');
                wafy_header_bg.addEventListener('input', () => {
                    wid_head.style.backgroundColor = wafy_header_bg.value;
                });

                //Handle the header text color

                const wafy_header_text_color = document.getElementById('wafy_wid_text_color');
                wafy_header_text_color.addEventListener('input', () => {
                    wid_head.style.color = wafy_header_text_color.value;
                });

                //Handle the Opener text color

                const wafy_opener_text_color = document.getElementById('wafy_wid_opener_text_color');
                wafy_opener_text_color.addEventListener('input', () => {
                    wid_opener.style.color = wafy_opener_text_color.value;
                });

                //Handle the Opener bg color

                const wafy_opener_bg_color = document.getElementById('wafy_wid_opener_bg');
                wafy_opener_bg_color.addEventListener('input', () => {
                    wid_opener.style.backgroundColor = wafy_opener_bg_color.value;
                });

                //Handle the handle

                const wafy_handle = document.getElementById("wafy_wid_handle");
                    wafy_handle.addEventListener('keyup', () => {
                        wid_handle.textContent = wafy_handle.value;
                    });

                //Handle the entrance title...

                const wafy_ent_title = document.getElementById("wafy_wid_entrance_title");
                    wafy_ent_title.addEventListener('keyup', () => {
                        wid_entrance_title.textContent = wafy_ent_title.value;
                    });

                //Handle the entrance description...

                const wafy_ent_desc = document.getElementById("wafy_wid_entrance_msg");
                    wafy_ent_desc.addEventListener('keyup', () => {
                        wid_entrance_desc.textContent = wafy_ent_desc.value;
                    });

                //Handle the position switch

                const wafy_iposition = document.getElementById("wafy_wid_postion");

                wafy_iposition.addEventListener('change', () => {
                    switch(wafy_iposition.value){
                        case 'right':
                            document.querySelector('.wafy_widget').style.right="10px";
                        break;

                        case 'left':
                            document.querySelector('.wafy_widget').style.left="166px";

                        break;
                    }
                });


         //let wid_position = getEle('');

        



    }

//Invoke the calbacks...

if(wafy_location.includes("wp-whatsappify-manage_widget&tab=design")){
        wafyWidgetHandler();
}
