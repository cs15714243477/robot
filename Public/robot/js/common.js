/**
 * Created by Administrator on 2019/3/19 0019.
 */

$(function () {
    $('.l-s-tab').click(function () {
        $(".language-switch-tab").slideToggle();
    });
    $('.mobile-nav div').click(function () {
        $(this).find("ul").slideToggle().parents('div').siblings('div').find("ul").slideUp();
    });
    $('.mobile-nav .mobile-level1').click(function () {
        $(this).toggleClass("on").siblings().removeClass("on");
    });


    $('#click-top').click(function () {
        $('body,html').animate({
            scrollTop: "0px"
        }, 600);
    });

    $(".app-video ").on('click','i',function() {
        $(".popup-bg").show();
        $(".video-box").show();
        $("body,html").addClass("body-hide");
    });


    $(".video-list ").on('click','.video-btn',function() {
        var videoSrc = $(this).find("img").attr("index");
        var videop = $(this).find("img").attr("alt");
        $('.videos').html('<video src = "'+videoSrc+'" type="video/mp4"  controls="controls"   width="100%" height="100%" ></video>');
        $(".popup-bg").show();
        $(".video-box").show();
        $('.video-box p').html(videop);
        $("body,html").addClass("body-hide");
    });







    $(".popup-bg").click(function() {
        $(".popup-bg").hide();
        $(".video-box").hide();
        $(".videos").html('');
        $(".popup-box").hide();
        $("body,html").removeClass("body-hide");

    });
    $(".hide").click(function(){
        $(".popup-bg").hide();
        $(".popup-box").hide();
        $(".video-box").hide();
        $("body,html").removeClass("body-hide");
    });


});

function clickTop() {
    var scroll_len = $(window).scrollTop();
    if (scroll_len > 300) {
        $('#click-top').fadeIn(300);
    }
    else {
        $('#click-top').fadeOut(300);
    }
}
// clickTop();
$(window).scroll(function () {
    clickTop();
});



$(document).bind('click', function (e) {
    var e = e || window.event; //浏览器兼容性
    var elem = e.target || e.srcElement;
    while (elem) { //循环判断至跟节点，防止点击的是div子元素
        if (elem.id && elem.id == 'LStab') {
            return;
        }
        elem = elem.parentNode;
    }
    $('#LStab .language-switch-tab').slideUp(); //点击的不是div或其子元素
});
$(document).bind('click', function (e) {
    var e = e || window.event; //浏览器兼容性
    var elem = e.target || e.srcElement;
    while (elem) { //循环判断至跟节点，防止点击的是div子元素
        if (elem.id && elem.id == 'mobile-nav') {
            return;
        }
        elem = elem.parentNode;
    }
    $('#mobile-nav .mobile-level1 ul').slideUp(); //点击的不是div或其子元素
    $('#mobile-nav .mobile-level1').removeClass("on"); //点击的不是div或其子元素
});


function ResetPosition()
{
    var h = $(window).height();
    $("#picBox").css({height:h});
    $("#picBox div").css({height:h});
    $("#page-banner").css({height:h});
    if(screen.width < 992){
        $(".page-banners").css({height:h-84});
    }
    if(screen.width < 640){
        $(".page-banners").css({height:h-66});
    }
    if(screen.width < 560){
        $(".page-banners").css({height:h-60});
    }
}
$(document).ready(ResetPosition);
$(window).resize(ResetPosition);

// $(function(){
//     $(".bd").hide();
//     $('.operate-list li').click(function(){
//         $(this).parents(".add-box").find(".app-pic").addClass('on');
//         $(this).parents(".add-box").find('div.operate-intro').hide();
//         $(this).parents(".add-box").find(".bd").show();
//
//     });
//
//
// });

$(function(){
    $("#robot10 ").addClass('on');
    $('.operate-list li').click(function(){
        var liindex = $('.operate-list li').index(this);
        $(this).parents(".add-box").find(".app-pic").addClass('on');
        $('.operate-box div.operate-intro').hide();

        $('.operate-box div.operate-con').eq(liindex).fadeIn().siblings('div.operate-con').hide();

    });

});

$( window ).scroll(function() {
    var hh=$( '.add-box' );
    var kh=$(window).height()*0.8;
    var sctop = $(this).scrollTop();
    hh.each(function(){
        var park=$(this).offset().top-sctop;
        if(park<kh) {
            var inde=$(this).index();
            $(".add-box:eq("+inde+") ").addClass('on');
        }
        else {
            var inde=$(this).index();
            $(".add-box:eq("+inde+") ").removeClass('on');
        }
        if(screen.width < 765){
            if(park<kh) {
                var inde=$(this).index();
                $(".add-box:eq("+inde+") ").addClass('on');
            }
            else {
                var inde=$(this).index();
                $(".add-box:eq("+inde+") ").addClass('on');
            }
        }

    });
});

$( window ).scroll(function() {
    var hh=$( '#title1' );
    var kh=$(window).height()*0.8;
    var sctop = $(this).scrollTop();
    hh.each(function(){
        var park=$(this).offset().top-sctop;
        if(sctop>=0) {
            $("#title1 ").addClass('on');
        }

        // else {
        //     $("#robot10 ").removeClass('on');
        // }
    });
});

$( window ).scroll(function() {
    var hh=$( '#title2' );
    var kh=$(window).height()*0.8;
    var sctop = $(this).scrollTop();
    hh.each(function(){
        var park=$(this).offset().top-sctop;
        if(park<kh) {
            $("#title2 ").addClass('on');
        }

        // else {
        //     $("#robot10 ").removeClass('on');
        // }
    });
});

$( window ).scroll(function() {
    var hh=$( '#title3' );
    var kh=$(window).height()*0.8;
    var sctop = $(this).scrollTop();
    hh.each(function(){
        var park=$(this).offset().top-sctop;
        if(park<kh) {
            $("#title3 ").addClass('on');
        }

        // else {
        //     $("#robot10 ").removeClass('on');
        // }
    });
});
$( window ).scroll(function() {
    var hh=$( '.robot3' );
    var kh=$(window).height()*0.8;
    var sctop = $(this).scrollTop();
    hh.each(function(){
        var park=$(this).offset().top-sctop;
        if(park<kh) {
            $(".robot3 ").addClass('on');
        }

        // else {
        //     $("#robot10 ").removeClass('on');
        // }
    });
});

$( window ).scroll(function() {
    var hh=$( '.robot7' );
    var kh=$(window).height()*0.8;
    var sctop = $(this).scrollTop();
    hh.each(function(){
        var park=$(this).offset().top-sctop;
        if(park<kh) {
            $(".robot7 ").addClass('on');
        }

        // else {
        //     $("#robot10 ").removeClass('on');
        // }
    });
});
$( window ).scroll(function() {
    var hh=$( '.robot2-3' );
    var kh=$(window).height()*0.8;
    var sctop = $(this).scrollTop();
    hh.each(function(){
        var park=$(this).offset().top-sctop;
        if(park<kh) {
            $(".robot2-3 ").addClass('on');
        }

    });
});









