<?php
	/**
	 * Created by Makecode
	 * User: Xiny https://xbug.top i@xiny9.com
	 * Coding Standard: PSR2
	 * Date: 2019-04-04
	 * Time: 13:55
	 */
	
	namespace Admin\Controller;
	
	use Common\Controller\AdminBaseController;
	use Common\Controller\MakeController;
	
	class WordssController extends AdminBaseController
	{
		use MakeController;
		
		public function __construct()
		{
			parent::__construct();
			$this->table = 'wordss';
			$this->addTemplet = 'Wordss/add';
			$this->editTemplet = 'Wordss/edit';
			$this->indexTemplet = 'Wordss/index';
			$this->whereList = ['name' => 'like'];
		}
		
		
		public function _after_list($list)
		{
			foreach ($list as $k => $v) {
				$dd = M('words')->field('title')->where('id=' . $v['pid'])->find();
				$list[$k]['pid'] = $dd['title'];
			}
			return $list;
		}
		
		public function _befor_add()
		{
			//查询父级分类
			$type = M('words')->select();
			$this->assign('data', $type);
			
		}
		
		public function _befor_edit()
		{
			//查询父级分类
			$type = M('words')->select();
			$this->assign('data', $type);
			
		}
	}
