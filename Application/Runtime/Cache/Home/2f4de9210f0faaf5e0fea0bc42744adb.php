<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="format-detection" content="telephone=no">
    <meta name="viewport"
          content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no"/>

    <title><?php echo ($c["seo_title"]); ?></title>
    <meta name="description" content="<?php echo ($c["seo_description"]); ?>"/>
    <meta name="keywords" content="<?php echo ($c["seo_keywords"]); ?>"/>

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


<div class="page-banner" id="page-banner" style="background-image: url('<?php echo ($c["image"]); ?>');"></div>
<div class="box">
    <div class="robot1" id="title1">
        <div class="title1 ">
            <h1><?php echo ($c["title_one"]); ?></h1>
            <p><?php echo ($c["title_ones"]); ?></p>
        </div>
        <div class="robot1-1  wow fadeInLeft">
            <p><?php echo (htmlspecialchars_decode($c["title_ones_content"])); ?></p>
        </div>
        <div class="robot1-1  wow fadeInRight">
            <p><?php echo (htmlspecialchars_decode($c["title_ones_content_description"])); ?></p>

        </div>
        <div class="clear"></div>

        <div class="robot1-2  wow fadeInUp">
            <p><?php echo (htmlspecialchars_decode($c["title_ones_contents_description"])); ?></p>
        </div>
    </div>
</div>

<div class="robot2">
    <img src="<?php echo ($c["images"]); ?>" alt=""/>
    <div class="box">
        <div class="robot2-1 ">
            <div>
                <?php echo (htmlspecialchars_decode($c["title_two_content"])); ?>
            </div>
        </div>
    </div>
</div>

<div class="robot3">
    <div class="box">
        <div class="robot3-1 ">
            <div class="title2 ">
                <h1><?php echo ($c["title_two"]); ?></h1>
                <p><?php echo (htmlspecialchars_decode($c["title_twos_content"])); ?></p>
            </div>
            <div class="robot3-con">

            </div>
        </div>
        <div class="robot3-2 ">
            <div class="title2">
                <h1><?php echo ($c["title_twos"]); ?></h1>
                <p><?php echo (htmlspecialchars_decode($c["title_twoss_content"])); ?></p>
            </div>

            <!--<div class="robot3-con">-->
            <!--<img src="/Public/robot/img/robot2.jpg" alt=""/>-->
            <!--</div>-->

        </div>

        <div class="clear"></div>

        <div class="robot1-2 ">
            <?php echo (htmlspecialchars_decode($c["titletwoscontent"])); ?>
        </div>


    </div>
</div>

<div class="robot4" id="title2">
    <div class="box">
        <div class="title2">
            <h1><?php echo ($c["title3"]); ?><br/>
                <?php echo ($c["title31"]); ?></h1>
        </div>
    </div>
    <div class="robot4-2 ">
        <img src="<?php echo ($c["title3image"]); ?>" alt=""/>
    </div>

    <div class="robot4-1">
        <div class="robot4-1con">
            <?php echo (htmlspecialchars_decode($c["titlecontent"])); ?>
        </div>
    </div>

</div>

<div class="box">
    <div class="robot5 ">
        <?php echo (htmlspecialchars_decode($c["title3content"])); ?>

    </div>

</div>

<div class="robot6" id="title3">

    <div class="box">

        <div class="title2  ">
            <h1><?php echo ($c["title4"]); ?></h1>
            <p><?php echo ($c["title41"]); ?></p>
        </div>

        <div class="robot6-1 ">
            <img src="<?php echo ($c["title41image"]); ?>" alt=""/>
        </div>
        <div class="robot6-2 ">
            <ul class="robot6-list1">
                <li><h3><span>1</span><?php echo ($c["title411"]); ?></h3></li>
                <li><h3><span>2</span><?php echo ($c["title412"]); ?></h3></li>
                <li><h3><span>3</span><?php echo ($c["title413"]); ?></h3></li>
            </ul>
            <div class="clear"></div>
            <ul class="robot6-list2">
                <li>
                    <h3><span>4</span><?php echo ($c["title414"]); ?></h3>
                    <p><?php echo (htmlspecialchars_decode($c["title414content"])); ?></p>
                    <img src="<?php echo ($c["title414image"]); ?>" alt=""/>
                </li>
                <li>
                    <h3><span>5</span><?php echo ($c["title415"]); ?></h3>
                    <p><?php echo (htmlspecialchars_decode($c["title415content"])); ?></p>
                    <img src="<?php echo ($c["title415image"]); ?>" alt=""/>
                </li>
                <li>
                    <h3><span>6</span><?php echo ($c["title416"]); ?></h3><br>
                    <?php echo (htmlspecialchars_decode($c["title416content"])); ?>

                </li>
                <li>
                    <h3><span>7</span><?php echo ($c["title417"]); ?></h3>
                    <p><?php echo (htmlspecialchars_decode($c["title417content"])); ?></p>
                </li>
            </ul>
        </div>

    </div>

</div>


<div class="robot2">
    <img src="<?php echo ($c["title418image"]); ?>" alt=""/>
    <div class="robot2-2  wow fadeInUpBig"><p><?php echo ($cs); ?></p></div>
</div>
<div class="robot2">
    <img src="<?php echo ($c["title418images"]); ?>" alt=""/>

</div>


<!--12宫格-->
<div class="robot7">

    <div class="box">

        <div class="robot1-2  ">
            <?php echo (htmlspecialchars_decode($c["title418content"])); ?>
        </div>
        <ul class="video-list  ">
            <?php foreach($c['video'] as $kk=>$vv){ if($vv['image'] && $vv['file']){ ?>
            <li>
                <div class="video-text ">
                    <h3><?php echo ($vv["title"]); ?></h3>
                    <p><?php echo ($vv["onetitle"]); ?></p>
                </div>
                <img src="<?php echo ($vv["image"]); ?>" alt=""/>
                <div class="video-btn ">
                    <img src="/Public/robot/img/video.png" alt="Agility"
                         index="<?php echo ($vv["file"]); ?>"/>
                </div>
            </li>
            <?php } ?>
            <?php if($vv['image'] && $vv['file'] == ''){ ?>
            <li>
                <div class="video-text ">
                    <h3><?php echo ($vv["title"]); ?></h3>
                    <p><?php echo ($vv["onetitle"]); ?></p>
                </div>
                <img src="<?php echo ($vv["image"]); ?>" alt=""/>
            </li>
            <?php } ?>
            <?php if($vv['image'] == '' && $vv['file'] == ''){ ?>
            <li>
                <div class="video-texts">
                    <div class="video-wb">
                        <div>
                            <h3><?php echo ($vv["title"]); ?></h3>
                            <p><?php echo ($vv["onetitle"]); ?></p>
                        </div>
                    </div>
                </div>
                <img src="/Public/robot/img/robot18.jpg" alt=""/>
            </li>
            <?php } } ?>
            </foreach>
            <!--视频图片模块-->
        </ul>
    </div>
</div>


<!--视频弹窗-->
<div class="popup-bg "></div>
<div class="video-box">
    <span class="hide">×</span>

    <p>Agility</p>
    <div class="videos">
    </div>
</div>


<div class="robot2">
    <img src="<?php echo ($c["title4110image"]); ?>" alt=""/>
    <div class="robot2-3" id="robot2-3">
        <div class="title2 ">
            <h1> <?php echo ($c["title4110title"]); ?></h1>
            <p><?php echo (htmlspecialchars_decode($c["title4110content"])); ?></p>
        </div>
    </div>
</div>

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





</body>
</html>