<?php
namespace Home\Controller;
use Think\Controller;
class LogController extends Controller {
    public function index(){
        // $this->show('<style type="text/css">*{ padding: 0; margin: 0; } div{ padding: 4px 48px;} body{ background: #fff; font-family: "微软雅黑"; color: #333;font-size:24px} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.8em; font-size: 36px } a,a:hover{color:blue;}</style><div style="padding: 24px 48px;"> <h1>:)</h1><p>欢迎使用 <b>ThinkPHP</b>！</p><br/>版本 V{$Think.version}</div><script type="text/javascript" src="http://ad.topthink.com/Public/static/client.js"></script><thinkad id="ad_55e75dfae343f5a1"></thinkad><script type="text/javascript" src="http://tajs.qq.com/stats?sId=9347272" charset="UTF-8"></script>','utf-8');
 
    	/*//实例化User对象
		$User=D('User');
    	//查询数据
    	$data=$User->where('username="root"')->find();
    	//模板变量赋值
    	$this->assign(username, $data);
    	//渲染到页面
    	$this->display('Home/Index/index');*/

    	//判断提交方式
    	if(IS_POST){
    		//实例化User对象
    		$User=D('User');

            // 组合查询条件
            $where = array();
            $where['username'] = I('username');
            $result=$User->where($where)->field('id,username,password')->find();

            $code = I('post.verify');   //接收传过来的文本框的值
            $verify = new \Think\Verify();
            // 验证密码
            if ($result['password'] == md5(I('password')) && $verify->check($code)) {
                // 存储session
                session('username', $result['username']);   // 当前用户名
                session('id', $result['id']);               // 当前用户ID

                $this->success('登录成功,正跳转至系统首页...', U('Home/Index/index'), 2);
            } else {
                $this->error('登录失败,用户名或密码不正确!');
            }
	        
    	}else{
    		$this->display();	
    	}
    	 	

    }

    public function logout(){
    	//清除所有session
    	header('content-type: text/html; charset=utf-8');
        session(null);
        redirect(U('Index/index'), 2, '正在退出登录...');
    }
}