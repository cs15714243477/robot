<?php
	
	namespace Home\Controller;
	
	use Think\Controller;
	
	class IndexController extends CommonController
	{
		/*
		 * 首页
		 */
		public function index()
		{
			//首页滚动图
			$b = M('banner')->where('switch=1')->order(' sort asc')->select();
			foreach ($b as $k => $v) {
				if ($b[$k]['oneswitch'] == 1) {
					$b[$k]['cla'] = 'on';
				}
			}
			$this->assign('b', $b);
			//加载产品
			if (session('lang')) {
				if (session('lang') == 'chinese') {
					$c = M('productcn')->where('switch=1')->select();
				} else {
					$c = M('product')->where('switch=1')->select();
				}
			}
			
			
			$this->assign('c', $c);
			$this->display();
		}
		
		/*
		 * 产品详情
		 */
		public function product()
		{
			$gid = $_REQUEST['gid'];
			//加载产品
			if (session('lang')) {
				if (session('lang') == 'chinese') {
					$c = M('productcn')->where('switch=1 and id=' . $gid)->find();
					$vio = M('video_cn')->where(' switch = 1 and pid=' . $c['id'])->select();
					$c['video'] = $vio;
					
					$this->assign('cs', '教我怎么做!');
					
				} else {
					$c = M('product')->where('switch=1 and id=' . $gid)->find();
					$vio = M('video')->where(' switch = 1 and pid=' . $c['id'])->select();
					$c['video'] = $vio;
					$this->assign('cs', 'Teach me what to do!');
					
				}
			}
			
			
			$this->assign('c', $c);
			$this->display();
		}
		
		/*
		 *  关于我们
		 */
		public function about()
		{
			
			
			if (session('lang')) {
				if (session('lang') == 'chinese') {
					$a = M('aboutcn')->where('id=1')->find();
				} else {
					$a = M('about')->where('id=1')->find();
				}
			}
			
			$this->assign('a', $a);
			$this->display();
		}
		
		/*
		 * 社区
		 */
		public function word()
		{
			//查询八个商品的社区
			if ($_REQUEST['sid']) {
				if (session('lang')) {
					if (session('lang') == 'chinese') {
						$s = M('word_cn')->where('switch=1 and pid =' . $_REQUEST['sid'])->select();
					} else {
						$s = M('word')->where('switch=1 and pid =' . $_REQUEST['sid'])->select();
					}
				}
			} else {
				echo "<script>alert('不存在该社区')</script>";
			}
			
			
			$this->assign('s', $s);
			$this->display();
		}
		
		/*
		 * 社区详情
		 */
		
		public function words()
		{
			if ($_REQUEST['sid']) {
				
				
				if (session('lang')) {
					if (session('lang') == 'chinese') {
						$d = M('word_cn')->where('id=' . $_REQUEST['sid'])->find();
						$ds = M('words_cn')->where('pid=' . $d['id'])->select();
						
						
					} else {
						$d = M('word')->where('id=' . $_REQUEST['sid'])->find();
						$ds = M('words')->where('pid=' . $d['id'])->select();
						
						
					}
				}
				
				$this->assign('d', $d);
				$this->assign('ds', $ds);
			}
			
			$this->display();
		}
		
		/*
		 * 改变系统语言
		 */
		public function change_lang()
		{
			if ($_REQUEST['lang'] == 'china') {
				session('lang', 'chinese');
			} else {
				session('lang', 'eng');
			}
		}
		
		
	}