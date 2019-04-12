<?php
/**
 * Created by Makecode
 * User: Xiny https://xbug.top i@xiny9.com
 * Coding Standard: PSR2
 * Date: 2019-04-11
 * Time: 08:49
 */

namespace Admin\Controller;

use Common\Controller\AdminBaseController;
use Common\Controller\MakeController;

class ProductController extends AdminBaseController
{
    use MakeController;

    public function __construct()
    {
        parent::__construct();
        $this->table = 'product';
        $this->addTemplet = 'Product/add';
        $this->editTemplet = 'Product/edit';
        $this->indexTemplet = 'Product/index';
        $this->whereList = ['name' => 'like'];
    }
}
