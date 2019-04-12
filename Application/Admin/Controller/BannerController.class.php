<?php
/**
 * Created by Makecode
 * User: Xiny https://xbug.top i@xiny9.com
 * Coding Standard: PSR2
 * Date: 2019-03-29
 * Time: 16:27
 */

namespace Admin\Controller;

use Common\Controller\AdminBaseController;
use Common\Controller\MakeController;

class BannerController extends AdminBaseController
{
    use MakeController;

    public function __construct()
    {
        parent::__construct();
        $this->table = 'banner';
        $this->addTemplet = 'Banner/add';
        $this->editTemplet = 'Banner/edit';
        $this->indexTemplet = 'Banner/index';
        $this->whereList = [];
    }
}
