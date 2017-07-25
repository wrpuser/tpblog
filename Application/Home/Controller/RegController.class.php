<?php
namespace Home\Controller;
use Think\Controller;

class RegController extends Controller {
    public function index(){
        // $this->show('<style type="text/css">*{ padding: 0; margin: 0; } div{ padding: 4px 48px;} body{ background: #fff; font-family: "微软雅黑"; color: #333;font-size:24px} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.8em; font-size: 36px } a,a:hover{color:blue;}</style><div style="padding: 24px 48px;"> <h1>:)</h1><p>欢迎使用 <b>ThinkPHP</b>！</p><br/>版本 V{$Think.version}</div><script type="text/javascript" src="http://ad.topthink.com/Public/static/client.js"></script><thinkad id="ad_55e75dfae343f5a1"></thinkad><script type="text/javascript" src="http://tajs.qq.com/stats?sId=9347272" charset="UTF-8"></script>','utf-8');

    	$this->display();
    }
    public function reg(){
    	header('content-type: text/html; charset=utf-8');
    	
        //I方法接收传过来的POST或GET数据
    	//echo I('post.username');

        //接收提交过来的数据
        /*$username=I('username');
    	$password=I('password');*/

        //实例化
        /*$User=new \Home\Model\UserModel;
        $User->test();*/

        //D和M方法都可以实例化模型类
        //D方法优先得到子类（自定义模型类）
        //M方法得到父类（基类）
        //可以理解为M实例化数据表，D实例化模型类
        //也可以理解为只操作数据表使用M，需要使用模型类是使用D
        //M方法不会触发自动验证

        if(IS_POST){

            //补充一个知识
            //php设置cookie和调用cookie
            //设置cookie：setcookie('name', 'jack');
            //使用cookie：$_COOKIE/$_COOKIE['name'];
            //删除cookie：setcookie('name', '', time()-1);

            //php设置session和调用session
            //设置session：
            //             session_start();
            //             $_SESSION['name']='jack';
            //使用session：$_SESSION/$_SESSION['name'];
            //销毁session：unset($_SESSION);
            //删除session: session_destroy(); 

            //实例化模型类 
            $User=D('User');
            
        
            //使用create方法创建数据对象的时候自动调用验证
            if (!$User->create()){

                // 如果创建失败 表示验证没有通过 输出错误提示信息
                exit($User->getError());

            }else{
                // 验证通过 可以进行其他数据操作
                // 可以这样调用model中的自定义方法
                // $User->checkPass();

                //写入数据库
                /*$User->add();
                echo '<script>alert("恭喜，注册成功！")</script>';*/

                if($User->add()) {
                    $this->success('注册成功！', U('Log/index'), 2);
                } else {
                    $this->error('注册失败！');
                }
            } 

        }
        

        

    	// $this->display();
    }

    public function verify(){
        $Verify = new \Think\Verify();
        $Verify->fontSize = 20;
        $Verify->length = 4;
        $Verify->useNoise = false;
        
        $Verify->entry();

    }

    
}