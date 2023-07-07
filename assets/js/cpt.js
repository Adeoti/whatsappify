  //Power the Custom Post Type

  function wafyCPTHandler(){
    const btn_preview = document.getElementById('wafy_preview_btn');
    const btn_label = document.getElementById('wafy-button-label');
    const btn_house = document.getElementById('wafy_btn_house');
    const pre_btn_style = document.getElementById("pre_btn_style");
    let btn_bg = document.getElementById('wafy-button-bg');
    let btn_txt_color = document.getElementById('wafy-button-text');
    let btn_style = document.querySelectorAll(".wafy-button-style");
        //Pre-load and style the btn
    
    if(btn_label.value != ""){
        btn_preview.innerHTML = btn_label.value;
        btn_preview.style = 'font-weight:600; font-size:15px; display:block; margin-top:4px;';
    }
    
    
    btn_label.addEventListener('keyup', function(){
        if(btn_label.value !=""){
            btn_preview.innerHTML = btn_label.value;
            btn_preview.style = 'font-weight:600; font-size:15px; display:block; margin-top:4px;';
        }
    });
    //Render the pre style btn
    
    if(pre_btn_style.value != ""){
        switch(pre_btn_style.value){
            case 'default':
                    btn_house.style.borderRadius = "10px";
                break;
                case 'rounded':
                    btn_house.style.borderRadius = "50px";
                break;
                case 'rectangle':
                    btn_house.style.borderRadius = "0px";
                break;
                default:
                    btn_house.style.borderRadius = "0px";
                
        }
    }else{
            btn_house.style.borderRadius = "10px";
        }
    
        //Process the btn style [radio option]
    btn_style.forEach((btn) =>{
       btn.onchange = () =>{
            switch(btn.value){
                case 'default':
                    btn_house.style.borderRadius = "10px";
                break;
                case 'rounded':
                    btn_house.style.borderRadius = "50px";
                break;
                case 'rectangle':
                    btn_house.style.borderRadius = "0px";
                break;
                default:
                    btn_house.style.borderRadius = "0px";
    
            }
        }
    });
    
    
    btn_preview.style.color = btn_txt_color.value;
    btn_house.style.backgroundColor = btn_bg.value;
    btn_house.style.color = btn_txt_color.value;
    
    
    //Style the btn on input changes...
    
    //Process the bg change
    btn_bg.addEventListener('input', () => {
        btn_house.style.backgroundColor = btn_bg.value;
    });
    
    //Process the text color change
    btn_txt_color.addEventListener('input', () => {
        btn_house.style.color = btn_txt_color.value;
        btn_preview.style.color = btn_txt_color.value;
    });
    }
    wafyCPTHandler();