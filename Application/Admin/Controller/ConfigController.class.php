<?php
/**
 * Created by Makecode
 * User: Xiny https://xbug.top i@xiny9.com
 * Coding Standard: PSR2
 * Date: 2019-04-04
 * Time: 17:28
 */

namespace Admin\Controller;

use Common\Controller\AdminBaseController;
use Common\Controller\MakeController;

class ConfigController extends AdminBaseController
{
    use MakeController;

    public function __construct()
    {
        parent::__construct();
        $this->table = 'config';
        $this->addTemplet = 'Config/add';
        $this->editTemplet = 'Config/edit';
        $this->indexTemplet = 'Config/index';
        $this->whereList = ['index_seo' => 'eq'];
    }
}
