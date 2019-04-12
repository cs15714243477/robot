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

class WordController extends AdminBaseController
{
    use MakeController;

    public function __construct()
    {
        parent::__construct();
        $this->table = 'word';
        $this->addTemplet = 'Word/add';
        $this->editTemplet = 'Word/edit';
        $this->indexTemplet = 'Word/index';
        $this->whereList = ['name' => 'like','title' => 'like'];
    }
}
