let wafy_vis = true; 
          
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