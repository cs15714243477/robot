<?php
	/**
	 * Created by Makecode
	 * User: Xiny https://xbug.top i@xiny9.com
	 * Coding Standard: PSR2
	 * Date: 2019-04-08
	 * Time: 15:08
	 */
	
	namespace Admin\Controller;
	
	use Common\Controller\AdminBaseController;
	use Common\Controller\MakeController;
	
	class VideoController extends AdminBaseController
	{
		use MakeController;
		
		public function __construct()
		{
			parent::__construct();
			$this->table = 'video';
			$this->addTemplet = 'Video/add';
			$this->editTemplet = 'Video/edit';
			$this->indexTemplet = 'Video/index';
			$this->whereList = ['title' => 'like'];
		}
		
		public function _after_list($list)
		{
			foreach ($list as $k => $v) {
				$dd = M('product')->field('name')->where('id=' . $v['pid'])->find();
				$list[$k]['pid'] = $dd['name'];
			}
			return $list;
		}
		
		public function _befor_add()
		{
			//查询父级分类
			$type = M('product')->where('switch=1')->select();
			$this->assign('data', $type);
			
		}
		
		public function _befor_edit()
		{
			//查询父级分类
			$type = M('product')->where('switch=1')->select();
			$this->assign('data', $type);
			
		}
		
		
	}
