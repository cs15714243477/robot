<?php
	/**
	 * Created by Makecode
	 * User: Xiny https://xbug.top i@xiny9.com
	 * Coding Standard: PSR2
	 * Date: 2019-04-08
	 * Time: 15:27
	 */
	
	namespace Admin\Controller;
	
	use Common\Controller\AdminBaseController;
	use Common\Controller\MakeController;
	
	class VideocnController extends AdminBaseController
	{
		use MakeController;
		
		public function __construct()
		{
			parent::__construct();
			$this->table = 'video_cn';
			$this->addTemplet = 'Videocn/add';
			$this->editTemplet = 'Videocn/edit';
			$this->indexTemplet = 'Videocn/index';
			$this->whereList = ['title' => 'like', 'onetitle' => 'like'];
		}
		
		public function _after_list($list)
		{
			foreach ($list as $k => $v) {
				$dd = M('productcn')->field('name')->where('id=' . $v['pid'])->find();
				$list[$k]['pid'] = $dd['name'];
			}
			return $list;
		}
		
		public function _befor_add()
		{
			//查询父级分类
			$type = M('productcn')->where('switch=1')->select();
			$this->assign('data', $type);
			
		}
		
		public function _befor_edit()
		{
			//查询父级分类
			$type = M('productcn')->where('switch=1')->select();
			$this->assign('data', $type);
			
		}
		
	}
