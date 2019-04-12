<?php
/**
 * Created by Makecode
 * User: Xiny https://xbug.top i@xiny9.com
 * Coding Standard: PSR2
 * Date: 2019-04-08
 * Time: 15:26
 */

namespace Admin\Controller;

use Common\Controller\AdminBaseController;
use Common\Controller\MakeController;

class ProductcnController extends AdminBaseController
{
    use MakeController;

    public function __construct()
    {
        parent::__construct();
        $this->table = 'productcn';
        $this->addTemplet = 'Productcn/add';
        $this->editTemplet = 'Productcn/edit';
        $this->indexTemplet = 'Productcn/index';
        $this->whereList = ['name' => 'like','title_one' => 'like','title_ones' => 'like'];
    }
}
