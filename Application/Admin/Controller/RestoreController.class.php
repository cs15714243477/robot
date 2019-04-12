<?php

namespace Admin\Controller;

use Think\Controller;
use Exception;

class RestoreController extends Controller
{
    /*一键还原系统*/
    public function index()
    {
        try {
            //bagen 1处理数据库
            $db = M();
            $sql1 = "SELECT table_name  FROM information_schema.tables WHERE table_schema = '" . C('DB_NAME') . "' AND table_type = 'base table' ";
            $tables = $db->query($sql1);
            if ($tables) {
                //第一步删除数据库
                foreach ($tables as $k => $v) {
                    //循环删除数据库
                    echo '删除数据表' . $v['table_name'] . '<br>';
                    $sql2 = 'drop TABLE IF EXISTS ' . $v['table_name'];
                    echo $sql2;
                    $drop = $db->execute($sql2);
                    if ($drop == 0) {
                        echo '删除数据表' . $v['table_name'] . '成功<br>';
                    } else {
                        echo '删除数据表' . $v['table_name'] . '失败<br>';
                    }
                }

                //第二部插入数据库
                $sql3 = "
SET NAMES utf8;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for t_admin_user
-- ----------------------------
DROP TABLE IF EXISTS `t_admin_user`;
CREATE TABLE `t_admin_user`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '用户账号',
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `phone` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '手机号',
  `email` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '电子邮箱',
  `nickname` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '昵称',
  `register_time` datetime(0) NOT NULL DEFAULT '1990-10-10 00:00:00',
  `age` tinyint(3) NOT NULL DEFAULT 0,
  `birthday` date NOT NULL DEFAULT '1990-10-10',
  `sex` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1:男,0:女',
  `isdel` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0:被删除 1 未被删除',
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '预留字段',
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `username`(`username`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '后台系统用户表' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of t_admin_user
-- ----------------------------
INSERT INTO `t_admin_user` VALUES (2, 'admin', '$2y$10$LX.XeKsGK8xay0/Y3JMuHuNfJ6D4Vx4fj5IwPWyMQ4xImBa1Y3.8S', '15714243477', '1729917782@qq.com1', 'Admin', '1990-10-10 00:00:00', 0, '2019-01-22', 1, 0, 1);


-- ----------------------------
-- Table structure for t_auth_group
-- ----------------------------
DROP TABLE IF EXISTS `t_auth_group`;
CREATE TABLE `t_auth_group`  (
  `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` char(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `description` varchar(500) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '角色描述',
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `rules` varchar(2048) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '权限规则配置表' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of t_auth_group
-- ----------------------------
INSERT INTO `t_auth_group` VALUES (1, '超级管理员', '拥有所有权限', 1, '27,304,305,306,307,376,377,378,379,388,389,390,391,392,393,394,395,400,401,402,403,408,409,410,411,416,417,418,419,424,425,426,427,428,429,430,431,444,445,446,447,448,449,450,451,452,453,454,455,456,457,458,459,460,461,462,463,464,465,466,467,29,12,63,64,65,66,67,68,155,156,157,158,17,1,2,5,6,10,18,41,42,43,32,37,38,39,40,19,44,45,46,47,149');

-- ----------------------------
-- Table structure for t_auth_group_access
-- ----------------------------
DROP TABLE IF EXISTS `t_auth_group_access`;
CREATE TABLE `t_auth_group_access`  (
  `uid` mediumint(8) UNSIGNED NOT NULL,
  `group_id` mediumint(8) UNSIGNED NOT NULL,
  UNIQUE INDEX `uid_group_id`(`uid`, `group_id`) USING BTREE,
  INDEX `uid`(`uid`) USING BTREE,
  INDEX `group_id`(`group_id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '权限规则关联表' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of t_auth_group_access
-- ----------------------------
INSERT INTO `t_auth_group_access` VALUES (2, 1);


-- ----------------------------
-- Table structure for t_auth_menus
-- ----------------------------
DROP TABLE IF EXISTS `t_auth_menus`;
CREATE TABLE `t_auth_menus`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '菜单名字',
  `pid` int(11) NOT NULL DEFAULT 0 COMMENT '0父级菜单',
  `rule_id` int(11) NOT NULL DEFAULT 0 COMMENT '绑定的规则id url',
  `icon` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT 'iconfont icon-menu1' COMMENT '菜单图标',
  `target` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '打开位置',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 91 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '系统权限菜单' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of t_auth_menus
-- ----------------------------
INSERT INTO `t_auth_menus` VALUES (1, '后台管理', 0, 27, 'iconfont xman-file-text', '_blank');
INSERT INTO `t_auth_menus` VALUES (3, '系统设置', 0, 29, 'iconfont xman-menu', 'default');
INSERT INTO `t_auth_menus` VALUES (6, '后台用户管理', 28, 18, 'layui-icon layui-icon-username', 'default');
INSERT INTO `t_auth_menus` VALUES (7, '角色组管理', 28, 32, 'layui-icon layui-icon-user', 'default');
INSERT INTO `t_auth_menus` VALUES (8, '规则管理', 28, 1, 'layui-icon layui-icon-align-center', 'default');
INSERT INTO `t_auth_menus` VALUES (18, '菜单管理', 3, 19, 'iconfont xman-menu', 'default');
INSERT INTO `t_auth_menus` VALUES (20, '更新日志', 38, 155, 'layui-icon layui-icon-note', 'default');
INSERT INTO `t_auth_menus` VALUES (28, '权限管理', 3, 32, 'iconfont xman-file-text', 'default');
INSERT INTO `t_auth_menus` VALUES (30, '操作日志', 38, 67, 'iconfont xman-control-fill', 'default');
INSERT INTO `t_auth_menus` VALUES (31, '登录日志', 38, 65, 'layui-icon layui-icon-log', 'default');
INSERT INTO `t_auth_menus` VALUES (32, '错误日志', 38, 63, 'layui-icon layui-icon-tabs', 'default');
INSERT INTO `t_auth_menus` VALUES (36, '代码生成器', 3, 48, 'iconfont xman-android', 'default');
INSERT INTO `t_auth_menus` VALUES (38, '系统日志', 3, 12, 'layui-icon layui-icon-tabs', 'default');
INSERT INTO `t_auth_menus` VALUES (39, '皮肤管理', 3, 159, 'iconfont xman-skin', 'default');

-- ----------------------------
-- Table structure for t_auth_rule
-- ----------------------------
DROP TABLE IF EXISTS `t_auth_rule`;
CREATE TABLE `t_auth_rule`  (
  `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `type` tinyint(1) NOT NULL DEFAULT 1 COMMENT '是否支持表达式 1支持',
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `condition` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '表达式',
  `is_url` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0：不是url 1：url',
  `pid` int(11) NOT NULL DEFAULT 0 COMMENT '父级权限',
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `name`(`name`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 468 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '系统权限配置表' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of t_auth_rule
-- ----------------------------
INSERT INTO `t_auth_rule` VALUES (1, 'admin/auth/rule', '规则管理', 1, 1, '', 1, 17);
INSERT INTO `t_auth_rule` VALUES (2, 'admin/auth/add_rule', '添加规则', 1, 1, '', 0, 1);
INSERT INTO `t_auth_rule` VALUES (5, 'admin/auth/fast_change_rule', '快速更改规则状态', 1, 1, '', 0, 1);
INSERT INTO `t_auth_rule` VALUES (6, 'admin/auth/edit_rule', '修改规则', 1, 1, '', 0, 1);
INSERT INTO `t_auth_rule` VALUES (10, 'admin/auth/del_rule', '删除规则', 1, 1, '', 0, 1);
INSERT INTO `t_auth_rule` VALUES (12, 'system_log', '系统日志', 1, 1, '', 0, 29);
INSERT INTO `t_auth_rule` VALUES (17, 'auth', '权限管理', 1, 1, '', 0, 29);
INSERT INTO `t_auth_rule` VALUES (18, 'admin/auth/admin_user', '用户管理', 1, 1, '', 1, 17);
INSERT INTO `t_auth_rule` VALUES (19, 'admin/auth/menus', '菜单管理', 1, 1, '', 1, 29);
INSERT INTO `t_auth_rule` VALUES (27, 'content', '内容管理', 1, 1, '', 1, 0);
INSERT INTO `t_auth_rule` VALUES (29, 'system', '系统设置', 1, 1, '', 1, 0);
INSERT INTO `t_auth_rule` VALUES (32, 'admin/auth/group', '角色组管理', 1, 1, '', 1, 17);
INSERT INTO `t_auth_rule` VALUES (37, 'admin/auth/add_group', '添加角色组', 1, 1, '', 0, 32);
INSERT INTO `t_auth_rule` VALUES (38, 'admin/auth/edit_group', '修改角色组', 1, 1, '', 0, 32);
INSERT INTO `t_auth_rule` VALUES (39, 'admin/auth/del_group', '删除角色组', 1, 1, '', 0, 32);
INSERT INTO `t_auth_rule` VALUES (40, 'admin/auth/fast_change_group', '快速修改角色组', 1, 1, '', 0, 32);
INSERT INTO `t_auth_rule` VALUES (41, 'admin/auth/add_admin', '添加后台用户', 1, 1, '', 0, 18);
INSERT INTO `t_auth_rule` VALUES (42, 'admin/auth/edit_admin', '修改后台用户', 1, 1, '', 0, 18);
INSERT INTO `t_auth_rule` VALUES (43, 'admin/auth/del_admin', '删除后台用户', 1, 1, '', 0, 18);
INSERT INTO `t_auth_rule` VALUES (44, 'admin/auth/add_menu', '添加菜单', 1, 1, '', 0, 19);
INSERT INTO `t_auth_rule` VALUES (45, 'admin/auth/edit_menu', '修改菜单', 1, 1, '', 0, 19);
INSERT INTO `t_auth_rule` VALUES (46, 'admin/auth/del_menu', '删除菜单', 1, 1, '', 0, 19);
INSERT INTO `t_auth_rule` VALUES (47, 'admin/auth/change_menu_sort', '菜单排序', 1, 1, '', 0, 19);
INSERT INTO `t_auth_rule` VALUES (48, 'admin/makecode/index', '代码生成器', 1, 1, '', 1, 29);
INSERT INTO `t_auth_rule` VALUES (50, 'admin/makecode/make', '生成代码', 1, 1, '', 1, 48);
INSERT INTO `t_auth_rule` VALUES (63, 'admin/systemerrorlog/index', '错误日志', 1, 1, '', 1, 12);
INSERT INTO `t_auth_rule` VALUES (64, 'admin/systemerrorlog/delete', '删除错误日志', 1, 1, '', 0, 63);
INSERT INTO `t_auth_rule` VALUES (65, 'admin/systemloginlog/index', '登录日志', 1, 1, '', 1, 12);
INSERT INTO `t_auth_rule` VALUES (66, 'admin/systemloginlog/delete', '删除登录日志', 1, 1, '', 0, 65);
INSERT INTO `t_auth_rule` VALUES (67, 'admin/systemoperationlog/index', '操作日志', 1, 1, '', 1, 12);
INSERT INTO `t_auth_rule` VALUES (68, 'admin/systemoperationlog/delete', '删除操作日志', 1, 1, '', 0, 67);
INSERT INTO `t_auth_rule` VALUES (149, 'admin/index/changepass', '修改密码', 1, 1, '', 1, 0);
INSERT INTO `t_auth_rule` VALUES (155, 'admin/updatelog/index', '更新日志管理', 1, 1, '', 1, 12);
INSERT INTO `t_auth_rule` VALUES (156, 'admin/updatelog/add', '添加更新日志', 1, 1, '', 0, 155);
INSERT INTO `t_auth_rule` VALUES (157, 'admin/updatelog/edit', '修改更新日志', 1, 1, '', 0, 155);
INSERT INTO `t_auth_rule` VALUES (158, 'admin/updatelog/delete', '删除更新日志', 1, 1, '', 0, 155);
INSERT INTO `t_auth_rule` VALUES (159, 'admin/systemskin/index', '皮肤管理', 1, 1, '', 1, 29);
INSERT INTO `t_auth_rule` VALUES (160, 'admin/systemskin/add', '添加皮肤', 1, 1, '', 0, 159);
INSERT INTO `t_auth_rule` VALUES (161, 'admin/systemskin/edit', '修改皮肤', 1, 1, '', 0, 159);
INSERT INTO `t_auth_rule` VALUES (162, 'admin/systemskin/delete', '删除皮肤', 1, 1, '', 0, 159);



-- ----------------------------
-- Table structure for t_category
-- ----------------------------
DROP TABLE IF EXISTS `t_category`;
CREATE TABLE `t_category`  (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `image` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '图片',
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '名称',
  `desc` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '类别描述',
  `add_time` datetime(0) NULL DEFAULT NULL COMMENT '添加时间',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '文章分类' ROW_FORMAT = Dynamic;


-- ----------------------------
-- Table structure for t_system_error_log
-- ----------------------------
DROP TABLE IF EXISTS `t_system_error_log`;
CREATE TABLE `t_system_error_log`  (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `file` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '所在文件',
  `line` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '所在行',
  `code` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '错误码',
  `message` varchar(1024) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '错误信息',
  `trace` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'trace信息',
  `createtime` datetime(0) NOT NULL COMMENT '发生时间',
  `admin_user_id` int(11) NULL DEFAULT NULL COMMENT '管理员ID',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 27 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '系统错误日志' ROW_FORMAT = Dynamic;


-- ----------------------------
-- Table structure for t_system_login_log
-- ----------------------------
DROP TABLE IF EXISTS `t_system_login_log`;
CREATE TABLE `t_system_login_log`  (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `admin_user_id` int(11) NOT NULL COMMENT '管理员账号',
  `ip` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT 'IP地址',
  `os` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '' COMMENT '操作系统',
  `browser` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '浏览器型号',
  `logtime` datetime(0) NOT NULL COMMENT '登录时间',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 14 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '系统登录日志' ROW_FORMAT = Dynamic;


-- ----------------------------
-- Table structure for t_system_operation_log
-- ----------------------------
DROP TABLE IF EXISTS `t_system_operation_log`;
CREATE TABLE `t_system_operation_log`  (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '操作名称',
  `url` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '访问地址',
  `way_state` enum('0','1','2') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '0' COMMENT '访问方式:0=GET,1=POST,2=AJAX',
  `usetime` float(12, 6) NOT NULL DEFAULT 0.000000 COMMENT '耗时(s)',
  `usemem` float(18, 6) NOT NULL DEFAULT 0.000000 COMMENT '使用内存(kb)',
  `result` enum('0','1') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '1' COMMENT '操作结果:0=失败,1=成功',
  `message` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '提示信息',
  `admin_user_id` int(11) NOT NULL COMMENT '管理员',
  `createtime` datetime(0) NOT NULL COMMENT '操作时间',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 716 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '系统操作日志表' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for t_system_skin
-- ----------------------------
DROP TABLE IF EXISTS `t_system_skin`;
CREATE TABLE `t_system_skin`  (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `framecolor` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '框架颜色',
  `topcolor` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '顶部背景',
  `leftcolor` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '左侧背景',
  `topbottomcolor` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '顶部底边',
  `menucolor` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '三级菜单',
  `user_id` int(11) NULL DEFAULT 0 COMMENT '用户ID',
  `state` enum('1','2') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '2' COMMENT '皮肤类型:1=系统主题,2=用户主题',
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '皮肤名称',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 115 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '系统主题表' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of t_system_skin
-- ----------------------------
INSERT INTO `t_system_skin` VALUES (7, '#019688', '#23262e', '#393d49', '#5fb878', '#2b2e37', 0, '1', 'layui风格');
INSERT INTO `t_system_skin` VALUES (10, '#409eff', '#23262e', '#393d49', '#c9c9c9', '#2b2e37', 0, '1', 'element风格');
INSERT INTO `t_system_skin` VALUES (12, '#d25757', '#23262e', '#393d49', '#f79b40', '#2b2e37', 0, '1', '活力少女');
INSERT INTO `t_system_skin` VALUES (16, '#cc3366', '#23262e', '#393d49', '#e36467', '#2b2e37', 0, '1', '玫红');
INSERT INTO `t_system_skin` VALUES (20, '#eeca00', '#23262e', '#393d49', '#505050', '#2b2e37', 0, '1', '土豪金');
INSERT INTO `t_system_skin` VALUES (31, '#ef0f0f', '#06f059', '#0de0f4', '#2727b6', '#bb0bd6', 0, '1', '辣眼睛');
INSERT INTO `t_system_skin` VALUES (35, '#01aaed', '#23262e', '#393d49', '#ffd700', '#2b2e37', 0, '1', '默认');
INSERT INTO `t_system_skin` VALUES (114, '#d25757', '#23262e', '#393d49', '#f79b40', '#2b2e37', 2, '2', '');

-- ----------------------------
-- Table structure for t_update_log
-- ----------------------------
DROP TABLE IF EXISTS `t_update_log`;
CREATE TABLE `t_update_log`  (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `title` varchar(1024) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '更新内容',
  `image` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '图片',
  `addtime` datetime(0) NOT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '首页信息展示信息' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Procedure structure for NewProc
-- ----------------------------
DROP PROCEDURE IF EXISTS `NewProc`;
delimiter ;;
CREATE PROCEDURE `NewProc`()
BEGIN
    DECLARE cnt VARCHAR(100); -- 声明变量用来记录查询出的表名
    DECLARE i int;  -- 循环条件，同时可以用来标记表第几张表
    set i = 0;

    -- 循环开始
    while i < 27 do -- 这里是32是因为我的数据库中表的数量是32，想不写死可以通过再定义一个变量，动态赋值
      select table_name into @cnt from information_schema.`TABLES` where TABLE_SCHEMA = 'changfeng' limit i,1;
      -- select @cnt; -- mysql的打印语句
      -- alter table @cnt convert to character set utf8; -- 这一句报错，必须动态拼接才行

      set @sql = concat('alter table ', @cnt, ' convert to character set utf8');  -- 拼接，注意语句中的空格
      prepare stmt from @sql;  -- 预处理
      execute stmt;  -- 执行
      deallocate prepare stmt;  -- 释放

      set i = i + 1;
    end while;
    -- 循环结束，注意分号


  END
;;
delimiter ;

SET FOREIGN_KEY_CHECKS = 1;
";
                $insert = $db->execute($sql3);
                if ($insert == 0) {
                    echo '重新 创建数据成功';
                } else {
                    echo '重新 创建数据失败';
                }


            } else {
                echo '该数据库没有数据表';
            }
            //对文件 进行操作
            $fil = $this->files();
        } catch (Exception $e) {
            //false
            echo '还原系统出现问题,<br>原因:' . $e->getMessage();
        }
    }

    /*
     * 对文件还原
     */

    public function files()
    {

        try {
            //文件操作 获取文件
            $file = ROOT_PATH . trim(APP_PATH, './') . '/' . 'Admin/Controller/';
            $file1 = ROOT_PATH . trim(APP_PATH, './') . '/' . 'Admin/View/';
            $dir = scandir($file);
            $dir1 = scandir($file1);
            unset($dir[0]);
            unset($dir[1]);
            unset($dir1[0]);
            unset($dir1[1]);
            //删除 文件 不需要的文件
            $arr = [
                'AuthController.class.php',
                'FileUploadController.class.php',
                'IndexController.class.php',
                'LoginController.class.php',
                'MakecodeController.class.php',
                'MenusController.class.php',
                'RbacController.class.php',
                'RestoreController.class.php',
                'SystemerrorlogController.class.php',
                'SystemloginlogController.class.php',
                'SystemoperationlogController.class.php',
                'SystemskinController.class.php',
                'UpdatelogController.class.php',
                'index.html'
            ];

            //进行删除
            foreach ($dir as $v) {
                if (!in_array($v, $arr)) {
                    //如果不在删除
                    $ss = unlink($file . $v);
                    if ($ss) {
                        echo '删除文件' . $v . '成功<br>';
                    } else {
                        echo '删除文件' . $v . '失败<br>';
                    }

                }
            }
            //文件夹
            $arr1 = [
                'Index',
                'Menus',
                'Solf',
                'Systemerrorlog',
                'Systemloginlog',
                'Systemoperationlog',
                'Systemskin',
                'Updatelog',
                'auth',
                'login',
            ];
            //进行删除
            foreach ($dir1 as $v) {
                if (!in_array($v, $arr1)) {
                    //如果不在删除
                    delDirAndFile($file1 . $v);
                }
            }
        } catch (Exception $e) {
            //false
            echo '还原系统出现问题,<br>原因:' . $e->getMessage();
        }


    }

}
