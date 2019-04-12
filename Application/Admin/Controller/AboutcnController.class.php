<?php
/**
 * Created by Makecode
 * User: Xiny https://xbug.top i@xiny9.com
 * Coding Standard: PSR2
 * Date: 2019-04-04
 * Time: 16:21
 */

namespace Admin\Controller;

use Common\Controller\AdminBaseController;
use Common\Controller\MakeController;

class AboutcnController extends AdminBaseController
{
    use MakeController;
	    public function __construct()
    {
        parent::__construct();
        $this->table = 'aboutcn';
        $this->addTemplet = 'Aboutcn/add';
        $this->editTemplet = 'Aboutcn/edit';
        $this->indexTemplet = 'Aboutcn/index';
        $this->whereList = ['title' => 'like'];
    }
}
