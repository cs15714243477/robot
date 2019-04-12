<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="format-detection" content="telephone=no">
    <meta name="viewport"
          content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no"/>


    <title><?php echo ($d["seo_title"]); ?></title>
    <meta name="description" content="<?php echo ($d["seo_description"]); ?>"/>
    <meta name="keywords" content="<?php echo ($d["seo_keywords"]); ?>"/>


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
<div class="empty-banner"></div>
<div class="pages-banner">
    <img src="<?php echo ($d["image"]); ?>" alt=""/>
</div>


<div class="robot10 box" id="robot10">
    <div class="title1 wow fadeInUp">
        <h1><?php echo ($d["title"]); ?></h1>
        <p><?php echo (htmlspecialchars_decode($d["content"])); ?></p>
    </div>
</div>

<div class="app-list" id="appList">
    <?php if(is_array($ds)): $i = 0; $__LIST__ = $ds;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><div class="add-box">
            <div class="app-pic">
                <img src="<?php echo ($v["image"]); ?>" alt="" class="img1"/>
                <!--<img src="/Public/robot/img/app-pic2.jpg" alt="" class="img2"/>-->
            </div>
            <div class="app-con slideTxtBox">
                <div class="title2">
                    <h1><?php echo ($v["title"]); ?></h1>
                </div>


                <div class="app-video">
                    <p>OVERVIEW<i onclick="watch(this)" vi="<?php echo ($v["videofile"]); ?>" class="iconfont icon-bofang "></i></p>
                </div>


                <div class="hd">
                    <ul class="operate-list">
                        <?php if (session('lang') == 'chinese') { $e = M('wordss_cn')->where(' switch = 1 and pid='.$v['id'])->select(); } else { $e = M('wordss')->where(' switch = 1 and pid='.$v['id'])->select(); } ?>
                        <?php if(is_array($e)): $i = 0; $__LIST__ = $e;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vv): $mod = ($i % 2 );++$i;?><li>
                                <img src="<?php echo ($vv["image"]); ?>" alt=""/>
                                <p><?php echo ($vv["name"]); ?></p>
                            </li><?php endforeach; endif; else: echo "" ;endif; ?>
                    </ul>
                </div>
                <div class="operate-box">
                    <div class="operate-intro">
                        <?php echo (htmlspecialchars_decode($v["content"])); ?>
                    </div>
                    <div class="bd">
                        <?php if (session('lang') == 'chinese') { $e = M('wordss_cn')->where(' switch = 1 and pid='.$v['id'])->select(); } else { $e = M('wordss')->where(' switch = 1 and pid='.$v['id'])->select(); } ?>
                        <?php if(is_array($e)): $i = 0; $__LIST__ = $e;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vv): $mod = ($i % 2 );++$i;?><div class="operate-con">
                                <div class="operate-img">
                                    <img src="<?php echo ($vv["images"]); ?>" alt=""/>
                                </div>
                                <div class="operate-text">
                                    <p><?php echo (htmlspecialchars_decode($vv["content"])); ?></p>
                                </div>
                            </div><?php endforeach; endif; else: echo "" ;endif; ?>
                    </div>
                </div>
            </div>
        </div><?php endforeach; endif; else: echo "" ;endif; ?>
</div>


<!--视频弹窗-->
<div class="popup-bg "></div>
<div class="video-box">
    <span class="hide">×</span>

    <p>
        <?php if (session('lang')) { if (session('lang') == 'chinese') { ?>
        观看视频
        <?php } else { ?>
        video
        <?php } } ?>
    </p>
    <div class="videos">
        <video poster="" src="" type="video/mp4" controls="controls"
               width="100%" height="100%">
        </video>
    </div>
</div>


<div class="clear"></div>


<div class="foot">
    <div class="box">
        <img src="<?php echo ($con["image"]); ?>" alt=""/>
        <p><?php echo ($con["address"]); ?></p>
    </div>
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





<script type="text/javascript">





    function watch(obj) {
        var videoSrc = $(obj).attr("vi");
        console.log(videoSrc);
        $('.videos').html('<video src = "' + videoSrc + '" type="video/mp4"  controls="controls"   width="100%" height="100%" ></video>');
        $(".popup-bg").show();
        $(".video-box").show();

        $("body,html").addClass("body-hide");
    }


</script>


</body>
</html>