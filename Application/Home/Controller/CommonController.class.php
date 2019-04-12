<?php
	
	namespace Home\Controller;
	
	use Think\Controller;
	
	class CommonController extends Controller
	{
		public function __construct()
		{
			parent::__construct();
			//默认加载中文
			if (session('lang')) {
				if (session('lang') == 'chinese') {
					include_once('./lang/chinese.php');
				} else {
					include_once('./lang/english.php');
				}
			} else {
				session('lang', 'chinese');
				include_once('./lang/chinese.php');
			}
			$this->assign('lang', $lang);
			
			//加载菜单
			
			if (session('lang')) {
				if (session('lang') == 'chinese') {
					$menu = M('productcn')->where('switch=1')->select();
					$menus = M('productcn')->where('switch=1')->select();
					
				} else {
					
					
					$menu = M('product')->where('switch=1')->select();
					$menus = M('product')->where('switch=1')->select();
					
				}
			}
			
			$this->assign('menu', $menu);
			$this->assign('menus', $menus);
			
			
			//网站配置
			$con = M('config')->where('id=1')->find();
			$this->assign('con', $con);
			
			
		}
	}