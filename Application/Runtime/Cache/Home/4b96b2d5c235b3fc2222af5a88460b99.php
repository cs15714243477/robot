<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="format-detection" content="telephone=no">
    <meta name="viewport"
          content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no"/>


    <title><?php echo ($con["sq_seo"]); ?></title>
    <meta name="description" content="<?php echo ($con["sq_description"]); ?>"/>
    <meta name="keywords" content="<?php echo ($con["sq_keywords"]); ?>"/>


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
    <div class="header-nav">
        <div class="nav-level2">
            <a href="/index.php/home/index"><?php echo ($lang['home']); ?></a>
        </div>


        <div class="nav-level2">
            <a href="javascript:;"><?php echo ($lang['product']); ?></a>
            <ul>
                <?php if(is_array($menu)): $i = 0; $__LIST__ = $menu;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li><a href="/index.php/home/index/product?gid=<?php echo ($v["id"]); ?>"><?php echo ($v["name"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
        </div>


        <div class="nav-level2">
            <a href="javasvript:;"><?php echo ($lang['franka']); ?></a>
            <ul>
                <?php if(is_array($menus)): $i = 0; $__LIST__ = $menus;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li><a href="/index.php/home/index/word?sid=<?php echo ($v["id"]); ?>"><?php echo ($v["name"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
        </div>



        <div class="nav-level2">
            <a href="/index.php/home/index/about"><?php echo ($lang['partners']); ?></a>
        </div>
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

<!---->
<div class="page-banner page-banners" id="page-banner"
     style="background-image: url(/public/robot/img/banner2.jpg);"></div>
<div class="box" id="boxs">
    <ul class="index-list">
        <li class=" wow fadeInRight">
            <?php if(is_array($s)): $i = 0; $__LIST__ = $s;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><div class="navs">
                    <a href="/index.php/home/index/words?sid=<?php echo ($v["id"]); ?>" class="nav-level1"><?php echo ($v["name"]); ?></a>
                </div><?php endforeach; endif; else: echo "" ;endif; ?>
        </li>
    </ul>
</div>


<!--返回-->
<div id="click-top">
    <i class="iconfont icon-jiantou"></i>
    <p>
        <?php if (session('lang')) { if (session('lang') == 'chinese') { ?>

        顶部
        <?php } else { ?>
        top

        <?php } } ?>


    </p>
</div>

<!--手机底部导航-->
<div class="clear"></div>

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