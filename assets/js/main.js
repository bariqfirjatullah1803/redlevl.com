let btn_gallery = false;
let btn_contact = false;

$(".btn-gallery").click(function () {
    if (btn_gallery) {                
        btn_open(false, "gallery", "-100%")
        btn_gallery = false;
		console.log("close");
    }
    else {                
        btn_open(true, "gallery", 0)                                      
        btn_gallery = true; 
		btn_open(false, "contact", "100%")                                      
        btn_contact = false;		             
    }
    console.log("asd")
});

$(".btn-contact").click(function () {
    if (btn_contact) {
        btn_open(false, "contact", "100%")                                      
        btn_contact = false;
		
    }
    else {
        btn_open(true, "contact", 0)                                      
        btn_contact = true;
		btn_open(false, "gallery", "-100%")
        btn_gallery = false;
    }
});

function btn_open(status, element, translateX){    
    if(status){       
        gsap.to(`#${element} .list-item`,{                    
            x: translateX,
            ease: Expo.easeInOut
        })
        $(`#${element}`).addClass('active');                                       
    }else{
        gsap.to(`#${element} .list-item`, 0.1,{                    
            x: translateX,
            ease: Expo.easeInOut
        })
        $(`#${element}`).removeClass('active');                    
    }
    
}

$(document).ready(function(){
    $('.slider').slick({
      autoplay: true,
      autoplaySpeed: 2500,
      dots:true,
      slideToShow:1,
      slideToScroll:1,
      infinite:true
    });
  });
