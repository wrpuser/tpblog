<?php
namespace Home\Controller;
use Think\Controller;
class ArticleController extends Controller {
    public function index(){
        // $this->show('<style type="text/css">*{ padding: 0; margin: 0; } div{ padding: 4px 48px;} body{ background: #fff; font-family: "微软雅黑"; color: #333;font-size:24px} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.8em; font-size: 36px } a,a:hover{color:blue;}</style><div style="padding: 24px 48px;"> <h1>:)</h1><p>欢迎使用 <b>ThinkPHP</b>！</p><br/>版本 V{$Think.version}</div><script type="text/javascript" src="http://ad.topthink.com/Public/static/client.js"></script><thinkad id="ad_55e75dfae343f5a1"></thinkad><script type="text/javascript" src="http://tajs.qq.com/stats?sId=9347272" charset="UTF-8"></script>','utf-8');
    	
        $Article=D('Article');

        //session取值
        $value=session('username');

        //模板变量赋值
        $this->assign('username', $value);


        //分页
        $count = $Article->count();// 查询满足要求的总记录数

        $Page = new \Think\Page($count,10);// 实例化分页类 传入总记录数和每页显示的记录数(25)

        //分页配置
        //$Page->setConfig('header', '<li class="rows">共<b>%TOTAL_ROW%</b>条记录&nbsp;第<b>%NOW_PAGE%</b>页/共<b>%TOTAL_PAGE%</b>页</li>');
        $Page->setConfig('prev', '上一页');
        $Page->setConfig('next', '下一页');
        //$Page->setConfig('last', '末页');
        //$Page->setConfig('first', '首页');*/
        $Page->setConfig('theme', '%FIRST%%UP_PAGE%%LINK_PAGE%%DOWN_PAGE%%END%%HEADER%');
        //$Page->lastSuffix = false;//最后一页不显示为总页数

        $show = $Page->show();// 分页显示输出

        // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $list = $Article->order('id desc')->limit($Page->firstRow.','.$Page->listRows)->select();

        $this->assign('list',$list);// 赋值数据集
        $this->assign('page',$show);// 赋值分页输出

        // $result=$Article->field('id,title,create_time')->select();

        $this->assign('data',$list);

        $this->display();
    }
    public function detail(){
    	//实例化Article对象
        $Article=D('Article');
        $id=$_GET["id"];
        // echo $id;
        // 查询文章数据
        //find得到一维数组
        $result=$Article->where('id='.$id)->field('id,f_id,title,content,create_time')->find();  
        //dump($result);

        $f_id=$result['f_id'];
        //echo $f_id;

        //select得到二维数组, 与模板中的<foreach>配合使用
        //$result=$Article->where('id='.$id)->field('f_id,title,content,create_time')->select();
        //dump($result);
        /*foreach ($result as $key => $value) {
            echo $value['f_id'];
        }*/

        //$f_id=$result[0]['f_id'];
        //echo $f_id;

        
        $User=D('User');
        $author=$User->where('id='.$f_id)->field('username')->find();
        // $author=$User->where('id='.$f_id)->field('username')->select();
        

        //赋值
        $this->assign('data',$result);
        $this->assign('author',$author['username']);
        // $this->assign('author',$author[0]['username']);

        //session取值
        $value=session('username');

        //获取系统当前时间
        $now_time = date('Y-m-d H:i:s',time());

        //模板变量赋值
        $this->assign('username', $value);
        $this->assign('create_time', $now_time);

        $Comment=M('Comment');

        $data=$Comment->where('a_id='.$id)->field('id,content,create_time,comauthor')->select();

        $this->assign('comment', $data);

        //渲染到页面
        $this->display();
    }
}