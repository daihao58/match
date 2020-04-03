<?php

namespace app\index\controller;

use app\common\library\Token;
use think\Db;
use app\common\controller\Frontend;

class Needknow extends Frontend
{

    protected $noNeedLogin = '*';
    protected $noNeedRight = '*';
    protected $layout = '';



    public function index()
    {
        $content = Db::name('needknow')->find()['content'];
        $this->assign('content',$content);
        $this->assign('cur','needknow');
        return $this->view->fetch();
    }
}