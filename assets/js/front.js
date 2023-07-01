const btn_preview = document.getElementById('wafy_preview_btn');
const btn_house = document.getElementById('wafy_btn_house');
const pre_btn_style = document.getElementById("pre_btn_style");
let btn_bg = document.getElementById('wafy-button-bg');
let btn_txt_color = document.getElementById('wafy-button-text');
let btn_style = document.querySelectorAll(".wafy-button-style");




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



btn_preview.style.color = btn_txt_color.value;
btn_house.style.backgroundColor = btn_bg.value;
btn_house.style.color = btn_txt_color.value;
