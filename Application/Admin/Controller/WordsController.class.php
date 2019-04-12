<?php
	/**
	 * Created by Makecode
	 * User: Xiny https://xbug.top i@xiny9.com
	 * Coding Standard: PSR2
	 * Date: 2019-04-04
	 * Time: 16:34
	 */
	
	namespace Admin\Controller;
	
	use Common\Controller\AdminBaseController;
	use Common\Controller\MakeController;
	
	class WordsController extends AdminBaseController
	{
		use MakeController;
		
		public function __construct()
		{
			parent::__construct();
			$this->table = 'words';
			$this->addTemplet = 'Words/add';
			$this->editTemplet = 'Words/edit';
			$this->indexTemplet = 'Words/index';
			$this->whereList = ['title' => 'like'];
		}
		
		public function _after_list($list)
		{
			foreach ($list as $k => $v) {
				$dd = M('word')->field('name')->where('id=' . $v['pid'])->find();
				$list[$k]['pid'] = $dd['name'];
			}
			return $list;
		}
		
		public function _befor_add()
		{
			//查询父级分类
			$type = M('word')->where('switch=1')->select();
			$this->assign('data', $type);
			
		}
		
		public function _befor_edit()
		{
			//查询父级分类
			$type = M('word')->where('switch=1')->select();
			$this->assign('data', $type);
			
		}
		
		
	}
