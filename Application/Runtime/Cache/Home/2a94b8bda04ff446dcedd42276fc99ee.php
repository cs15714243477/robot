<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="format-detection" content="telephone=no">
    <meta name="viewport"
          content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no"/>


    <title><?php echo ($con["index_seo"]); ?></title>
    <meta name="description" content="<?php echo ($con["index_description"]); ?>"/>
    <meta name="keywords" content="<?php echo ($con["index_keywords"]); ?>"/>


    <link rel="shortcut icon" href="/Public/robot/img/ico.ico">
    <link rel="stylesheet" href="/Public/robot/css/iconfont/iconfont.css">
    <link rel="stylesheet" href="/Public/robot/css/reset.css">
    <link rel="stylesheet" href="/Public/robot/css/style.css">
    <link rel="stylesheet" href="/Public/robot/css/mobile.css">
    <!--[if IE]-->
    <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/r29/html5.min.js"></script>-->
    <!--[endif]-->
    <script src="/Public/robot/js/jquery-1.9.1.js"></script>
    <script src="/Public/robot/js/common.js"></script>
    <script>
        var nowPic = 1;

        function MouseWheel(e) {
            var pic;
            e = e || window.event;
            if (e.wheelDelta) {  //判断浏览器IE，谷歌滑轮事件
                if (e.wheelDelta > 0) { //当滑轮向上滚动时
                    if (nowPic <= 1) {
                        nowPic = 6;
                    }
                    else {
                        nowPic--;
                    }
                }
                if (e.wheelDelta < 0) { //当滑轮向下滚动时
                    if (nowPic >= 6) {
                        nowPic = 1;
                    }
                    else {
                        nowPic++;
                    }
                }
            } else if (e.detail) {  //Firefox滑轮事件
                if (e.detail > 0) { //当滑轮向上滚动时
                    if (nowPic <= 1) {
                        nowPic = 6;
                    }
                    else {
                        nowPic--;
                    }
                }
                if (e.detail < 0) { //当滑轮向下滚动时

                    if (nowPic >= 6) {
                        nowPic = 1;
                    }
                    else {
                        nowPic++;
                    }
                }
            }
            for (i = 1; i < 7; i++) {
                console.log(i);

                if (nowPic == i) {
                    if (e.wheelDelta) {
                        pic = document.getElementById("pic" + i);
                        $(pic).addClass("on");
                    } else if (e.detail) {
                        pic = document.getElementById("pic" + i);
                        $(pic).addClass("on");

                    }
                } else {
                    pic = document.getElementById("pic" + i);
                    $(pic).removeClass("on");

                }
            }
        }

        /*Firefox注册事件*/
        if (document.addEventListener) {
            document.addEventListener("DOMMouseScroll", MouseWheel, false);
        }
        //        window.onmousewheel=document.onmousewheel=MouseWheel;//IE/Opera/Chrome
        window.onmousewheel = MouseWheel;//IE/Opera/Chrome
    </script>


</head>
<body>

<div class="header">
    <a href="/index.php/home/index" class="logo">
        <img src="<?php echo ($con["image"]); ?>" alt=""/>
    </a>
    <div class="language-switch" id="LStab">


        <?php if (session('lang')) { if (session('lang') == 'chinese') { ?>

        <p class="l-s-tab"><span><img onclick="change_lang('china')" src="/Public/robot/img/cn.png"
                                      alt=""/><em onclick="change_lang('china')"><?php echo ($lang['eng']); ?></em> </span><i
                class="iconfont icon-xia"></i>
        </p>

        <div class="language-switch-tab">
            <a href="javascript:;"><img onclick="change_lang('eng')" src="/Public/robot/img/en.png"
                                        alt=""/><em onclick="change_lang('eng')"><?php echo ($lang['engs']); ?></em></a>
        </div>
        <?php } else { ?>
        <p class="l-s-tab"><span><img onclick="change_lang('eng')" src="/Public/robot/img/en.png"
                                      alt=""/><em onclick="change_lang('eng')"><?php echo ($lang['engs']); ?></em> </span><i
                class="iconfont icon-xia"></i>
        </p>


        <div class="language-switch-tab">
            <a href="javascript:;"><img onclick="change_lang('china')" src="/Public/robot/img/cn.png"
                                        alt=""/><em onclick="change_lang('china')"><?php echo ($lang['eng']); ?></em></a>
        </div>

        <?php } } ?>




    </div>
</div>
<script>
    function change_lang(e) {
        if (e == 'eng') {
            $.post('/index.php/home/index/change_lang', {lang: e}, function (data) {
                window.location.reload();
            });
        } else {
            $.post('/index.php/home/index/change_lang', {lang: e}, function (data) {
                window.location.reload();
            });
        }
        console.log(e);
    }
</script>
<!--图片动画-->
<div id="picBox">
    <?php if(is_array($b)): $k = 0; $__LIST__ = $b;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($k % 2 );++$k;?><div id="pic<?php echo ($k); ?>" class="<?php echo ($v["cla"]); ?>" style=" background-image: url('<?php echo ($v["images"]); ?>')"></div><?php endforeach; endif; else: echo "" ;endif; ?>
</div>

<div class="index-nav">
    <div class="navs">
        <a href="javascript:;" class="nav-level1"><?php echo ($lang['product']); ?></a>
        <ul>
            <?php if(is_array($c)): $i = 0; $__LIST__ = $c;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li><a href="/index.php/home/index/product?gid=<?php echo ($v["id"]); ?>"><?php echo ($v["name"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
        </ul>
    </div>
    <div class="navs">
        <a href="javasvript:;" class="nav-level1"><?php echo ($lang['franka']); ?></a>
        <ul>

            <?php if(is_array($menus)): $i = 0; $__LIST__ = $menus;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li><a href="/index.php/home/index/words?sid=<?php echo ($v["id"]); ?>"><?php echo ($v["name"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>

        </ul>
    </div>
    <div class="navs">
        <a href="/index.php/home/index/about" class="nav-level1"><?php echo ($lang['partners']); ?></a>
    </div>
</div>


<!--手机底部导航-->
<div class="clear"></div>
<div class="empty"></div>
<div class="mobile-nav" id="mobile-nav">
    <div><a href="/index.php/home/index"><?php echo ($lang['home']); ?></a></div>
    <div class="mobile-level1">
        <a href="javascript:;" class="mobile-level1a"><?php echo ($lang['product']); ?></a>
        <ul>
            <?php if(is_array($menu)): $i = 0; $__LIST__ = $menu;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li><a href="/index.php/home/index/product?gid=<?php echo ($v["id"]); ?>"><?php echo ($v["name"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
        </ul>
    </div>
    <div class="mobile-level1">
        <a href="javascript:;" class="mobile-level1a"> <?php echo ($lang['franka']); ?></a>
        <ul>
            <?php if(is_array($menus)): $i = 0; $__LIST__ = $menus;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li><a href="/index.php/home/index/word?sid=<?php echo ($v["id"]); ?>"><?php echo ($v["name"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
        </ul>
    </div>
    <div><a href="/index.php/home/index/about"> <?php echo ($lang['partners']); ?></a></div>
</div>

<script>
    function change_lang(e) {
        if (e == 'eng') {
            $.post('/index.php/home/index/change_lang', {lang: e}, function (data) {
                window.location.reload();
            });
        } else {
            $.post('/index.php/home/index/change_lang', {lang: e}, function (data) {
                window.location.reload();
            });
        }
        console.log(e);
    }
</script>





</body>
</html>