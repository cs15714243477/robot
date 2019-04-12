<?php
/**
 * Created by Makecode
 * User: Xiny https://xbug.top i@xiny9.com
 * Coding Standard: PSR2
 * Date: 2019-04-04
 * Time: 16:20
 */

namespace Admin\Controller;

use Common\Controller\AdminBaseController;
use Common\Controller\MakeController;

class AboutController extends AdminBaseController
{
    use MakeController;

    public function __construct()
    {
        parent::__construct();
        $this->table = 'about';
        $this->addTemplet = 'About/add';
        $this->editTemplet = 'About/edit';
        $this->indexTemplet = 'About/index';
        $this->whereList = ['title' => 'like'];
    }
}
