<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
        // $this->show('<style type="text/css">*{ padding: 0; margin: 0; } div{ padding: 4px 48px;} body{ background: #fff; font-family: "微软雅黑"; color: #333;font-size:24px} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.8em; font-size: 36px } a,a:hover{color:blue;}</style><div style="padding: 24px 48px;"> <h1>:)</h1><p>欢迎使用 <b>ThinkPHP</b>！</p><br/>版本 V{$Think.version}</div><script type="text/javascript" src="http://ad.topthink.com/Public/static/client.js"></script><thinkad id="ad_55e75dfae343f5a1"></thinkad><script type="text/javascript" src="http://tajs.qq.com/stats?sId=9347272" charset="UTF-8"></script>','utf-8');
    	
    	//session取值
        $value=session('username');

    	//模板变量赋值
        $this->assign('username', $value);


        //实例化Article对象
        $Article=D('Article');

        //分页
        $count = $Article->count();// 查询满足要求的总记录数

        $Page = new \Think\Page($count,5);// 实例化分页类 传入总记录数和每页显示的记录数(25)

        //分页配置
        //$Page->setConfig('header', '<li class="rows">共<b>%TOTAL_ROW%</b>条记录&nbsp;第<b>%NOW_PAGE%</b>页/共<b>%TOTAL_PAGE%</b>页</li>');
        $Page->setConfig('prev', '上一页');
        $Page->setConfig('next', '下一页');
        //$Page->setConfig('last', '末页');
        //$Page->setConfig('first', '首页');
        $Page->setConfig('theme', '%FIRST%%UP_PAGE%%LINK_PAGE%%DOWN_PAGE%%END%%HEADER%');
        //$Page->lastSuffix = false;//最后一页不显示为总页数

        $show = $Page->show();// 分页显示输出

        //dump($show);

        // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $list = $Article->order('id desc')->limit($Page->firstRow.','.$Page->listRows)->select();

        $this->assign('list',$list);// 赋值数据集
        $this->assign('page',$show);// 赋值分页输出

        //配合home/common/function.php中的分页函数进行分页
        /*$where = "id>5";
        $count = $Article->where($where)->count();
        $p = getpage($count,5);
        $list = $Article->field(true)->where($where)->order('id desc')->limit($p->firstRow, $p->listRows)->select();
        $this->assign('select', $list); // 赋值数据集
        $this->assign('page', $p->show()); // 赋值分页输出*/

        // 查询文章数据
        //select得到二维数组, 与模板中的<foreach>配合使用。find得到一维数组
        // $result=$Article->field('id,title,content')->select();

        //dump($result);

        //赋值
        $this->assign('data',$list);

        $Photo=M('Photo');
        $photo=$Photo->select();
        $this->assign('photo', $photo);

        //轮播导航编号
        $index=0;
        $this->assign('index', $index);

        //渲染到页面
    	$this->display();
    }
    /*public function article(){
        header('content-type: text/html; charset=utf-8');
        //实例化Article对象
        $Article=D('Article');

        // 查询文章数据
        $result=$Article->where('id=1')->field('title,content')->find();

        //赋值
        $this->assign('data',$result);
        
    
        $this->display('Index/index');   
        
    }*/
}