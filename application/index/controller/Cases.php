<?php

namespace app\index\controller;

use app\common\library\Token;
use think\Db;
use app\common\controller\Frontend;

class Cases extends Frontend
{

    protected $noNeedLogin = '*';
    protected $noNeedRight = '*';
    protected $layout = '';

    public function formsearch()
    {
        $this->assign('cur','');
        return $this->view->fetch();
    }


    public function match()
    {
        $id = $this->request->param('id');
        $content = Db::name('activity')->where('id',$id)->find()['content'];
        $this->assign('content',$content);
        $this->assign('cur','match');
        return $this->view->fetch();
    }


    public function videolist()
    {
        $activity = DB::query("select * from fa_activity_old");
        $this->view->assign('activity', $activity);
        $this->view->assign('cur','videolist');
        return $this->view->fetch();
    }

    public function viddetail()
    {
        $id = $this->request->param('id');
        $content = Db::name('activity_old')->where('id',$id)->find()['content'];
        $this->assign('content',$content);
        $this->view->assign('cur','videolist');
        return $this->view->fetch();
    }

    public function newslist()
    {
        $titles = DB::query("select title,id from fa_newslist where isshow=1");
        $this->view->assign('titles', $titles);
        $this->view->assign('cur','newslist');
        return $this->view->fetch();
    }

    public function newsdetail()
    {
        $id = $this->request->param('id');
        $content = Db::name('newslist')->where('id',$id)->find()['newdetails'];
        $this->assign('content',$content);
        $this->view->assign('cur','newslist');
        return $this->view->fetch();
    }

    public function saishi()
    {
        $content = Db::name('activity')->where('isopen',1)->find()['content'];
        $this->assign('content',$content);
        $this->assign('cur','match');
        return $this->view->fetch('cases/match');
    }
}