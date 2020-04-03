<?php

namespace app\admin\controller\kc;

use app\common\controller\Backend;
use think\Db;
use fast\Tree;

/**
 * 
 *
 * @icon fa fa-circle-o
 */
class Kccat extends Backend
{
    
    /**
     * Kccat模型对象
     * @var \app\admin\model\kc\Kccat
     */
    protected $model = null;

    public function _initialize()
    {
        parent::_initialize();
        $this->model = new \app\admin\model\kc\Kccat;

        $this->childrenAdminIds = $this->auth->getChildrenAdminIds(true);
        $this->childrenGroupIds = $this->auth->getChildrenGroupIds(true);

        // $groupList = collection(Db::name('goods_cats')->where('catId', 'in', $this->childrenGroupIds)->select())->toArray();
        $groupList = collection(Db::name('class_cat')->select())->toArray();

        Tree::instance()->init($groupList);


        $groupdata[] = '无';



        $result = Tree::instance()->getTreeList(Tree::instance()->getTreeArray(0));

        foreach ($result as $k => $v) {
            $groupdata[$v['id']] = $v['name'];
        }


        $this->view->assign('groupdata', $groupdata);
        $this->assignconfig("cats", ['id' => $this->auth->id]);

    }
    
    /**
     * 默认生成的控制器所继承的父类中有index/add/edit/del/multi五个基础方法、destroy/restore/recyclebin三个回收站方法
     * 因此在当前控制器中可不用编写增删改查的代码,除非需要自己控制这部分逻辑
     * 需要将application/admin/library/traits/Backend.php中对应的方法复制到当前控制器,然后进行修改
     */
    public function selectpage()
    {
        return parent::selectpage();
    }



}
