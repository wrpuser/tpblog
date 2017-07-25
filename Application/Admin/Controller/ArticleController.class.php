<?php
namespace Admin\Controller;
use Think\Controller;
class ArticleController extends CommonController {
    public function index(){
        //$this->show('<style type="text/css">*{ padding: 0; margin: 0; } div{ padding: 4px 48px;} body{ background: #fff; font-family: "微软雅黑"; color: #333;font-size:24px} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.8em; font-size: 36px } a,a:hover{color:blue;}</style><div style="padding: 24px 48px;"> <h1>:)</h1><p>欢迎使用 <b>ThinkPHP</b>！</p><br/>版本 V{$Think.version}</div><script type="text/javascript" src="http://ad.topthink.com/Public/static/client.js"></script><thinkad id="ad_55e75dfae343f5a1"></thinkad><script type="text/javascript" src="http://tajs.qq.com/stats?sId=9347272" charset="UTF-8"></script>','utf-8');
    	
    	//session取值
    	$value=session('username');//session取值
        $id=session('id');

        //获取系统当前时间
        $now_time = date('Y-m-d H:i:s',time());  

    	//模板变量赋值
        $this->assign('username', $value);
        $this->assign('id', $id);
        $this->assign('create_time', $now_time);

        //渲染到页面
    	$this->display();
    }

    public function article(){
        
        /*$User=D('User');
        $value=session('username');
        $result=$User->where("username='%s'", $value)->field('id')->select();
        dump($result);*/


    	if(IS_POST){

            //不用实例化模型类，只操作表用M性能更好
    		$About=M('Article');

    		if (!$About->create()){

                // 如果创建失败 表示验证没有通过 输出错误提示信息
                exit($About->getError());

            }else{
            	if($About->add()) {
                    $this->success('发布成功！', U('Home/Index/index'), 2);
                } else {
                    $this->error('发布失败！');
                }
            }
    	}
    }
}