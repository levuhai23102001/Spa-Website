$(document).ready(function(){
    $("#hidden").click(function(){
      $(".sidenav").toggleClass("navbar-hidden");
      $("span.nav-link-text").toggleClass("nav-link-text-hidden");
      $(".main-content").toggleClass("main-content-ml-70px");
      $("i.fas.fa-angle-right").toggleClass("fa-angle-right-hidden");
      $(".sidenav-normal").toggleClass("nav-link-text-hidden");
      $(".sidenav-mini-icon").toggleClass("sidenav-mini-icon-show");
      $(".gif_logo").toggleClass("gif_logo_hidden");
      $(".logo_64x64").toggleClass("logo_64x64_show");
    });

    $(document).ready(function(){
      $(".collapse-sp,.collapse-nv,.collapse-dv,.collapse-kh,.collapse-tt,.collapse-dh").hide();
    });
    $(".nav-link.collapsed-sp").click(function(){
      $(".collapse-sp").toggle(300);
      $(".fa-angle-right.flip-1").toggleClass("flip")
    });
    $(".nav-link.collapsed-dv").click(function(){
      $(".collapse-dv").toggle(300);
      $(".fa-angle-right.flip-2").toggleClass("flip")
    });
    $(".nav-link.collapsed-nv").click(function(){
      $(".collapse-nv").toggle(300);
      $(".fa-angle-right.flip-3").toggleClass("flip")
    });
    $(".nav-link.collapsed-dh").click(function(){
      $(".collapse-dh").toggle(300);
      $(".fa-angle-right.flip-5").toggleClass("flip")
    });
    $(".nav-link.collapsed-tt").click(function(){
      $(".collapse-tt").toggle(300);
      $(".fa-angle-right.flip-6").toggleClass("flip")
    });
});