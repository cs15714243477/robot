// $(function(){
//     $(".banner-down-icon").click(function() {
//         var m = $(".plan-box").offset();//跳转位置
//         $("body,html").animate({scrollTop:m.top-100},600);
//         // $(".nav li:nth-of-type(2)").addClass("active").siblings().removeClass("active");
//     });
//
//     $(".nav li:nth-of-type(2)").click(function() {
//         var m = $(".plan-box").offset();//跳转位置
//         $("body,html").animate({scrollTop:m.top-100},600);
//     });
//     $(".nav li:nth-of-type(3)").click(function() {
//         var m = $(".product-box").offset();//跳转位置
//         $("body,html").animate({scrollTop:m.top-100},600);
//     });
//     $(".nav li:nth-of-type(4)").click(function() {
//         var m = $(".advantage-box").offset();//跳转位置
//         $("body,html").animate({scrollTop:m.top-100},600);
//     });
//
// });
//
//
//

$(function(){
        $("#show").click(function(){
            $(".nav ul").slideDown();
            $(this).hide();
            $("#hide").show();
            $("html,body").addClass('body-hide');
        });
        $("#hide").click(function(){
            $(".nav ul").slideUp();
            $(this).hide();
            $("#show").show();
            $("html,body").removeClass('body-hide');

        });
        $(".wab-nav ul li").click(function(){
            $(".nav ul").slideUp();
            $("#hide").hide();
            $("#show").show();
            $("html,body").removeClass('body-hide');

        });
        $(".nav-code span").hover(function(){
            $(".nav-code-box").slideToggle();
        });
        $('#click-top').click(function () {
            $('body,html').animate({
                scrollTop: "0px"
            }, 600);
        });

    });

$(window).scroll(function() {
    var scroll_len = $(window).scrollTop();
    if (scroll_len > 300) {
        $('.side .side-fh').fadeIn(300);
        $('.side').css({"position":"fixed","top":"30%"});
    } else {
        $('.side').css({"position":"absolute","top":"70%"});
        $('.side .side-fh').fadeOut(300);
    }
});
$(function(){
    //侧边栏
    $(".side li").hover(function(){
        $(this).find("span").stop().animate({"width":"60px"},300);
        $(this).find(".code").stop().animate({"width":"103px"},300);
    },function(){
        $(this).find("span").stop().animate({"width":"0"},300);
        $(this).find(".code").stop().animate({"width":"0"},300);
    });
    //返回顶部
    $(".side-fh").click(function(){
        $("html,body").animate({scrollTop:0},600);
    })
});