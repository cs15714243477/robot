<?php
/**
 * Created by Makecode
 * User: Xiny https://xbug.top i@xiny9.com
 * Coding Standard: PSR2
 * Date: 2019-04-04
 * Time: 16:35
 */

namespace Admin\Controller;

use Common\Controller\AdminBaseController;
use Common\Controller\MakeController;

class WordcnController extends AdminBaseController
{
    use MakeController;

    public function __construct()
    {
        parent::__construct();
        $this->table = 'word_cn';
        $this->addTemplet = 'Wordcn/add';
        $this->editTemplet = 'Wordcn/edit';
        $this->indexTemplet = 'Wordcn/index';
        $this->whereList = ['name' => 'like','title' => 'like'];
    }
}
