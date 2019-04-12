<?php
/**
 * Created by Makecode
 * User: Xiny https://xbug.top i@xiny9.com
 * Coding Standard: PSR2
 * Date: 2019-03-22
 * Time: 14:32
 */

namespace Admin\Controller;

use Common\Controller\AdminBaseController;
use Common\Controller\MakeController;

class MenusController extends AdminBaseController
{
    use MakeController;

    public function __construct()
    {
        parent::__construct();
        $this->table = 'menus';
        $this->addTemplet = 'Menus/add';
        $this->editTemplet = 'Menus/edit';
        $this->indexTemplet = 'Menus/index';
        $this->whereList = ['name' => 'like','seo_title' => 'like','seo_description' => 'like','seo_keywords' => 'like'];
    }
}
