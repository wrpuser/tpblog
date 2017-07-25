<?php
namespace Admin\Controller;
use Think\Controller;
class ContactController extends Controller {
    public function index(){
        //$this->show('<style type="text/css">*{ padding: 0; margin: 0; } div{ padding: 4px 48px;} body{ background: #fff; font-family: "微软雅黑"; color: #333;font-size:24px} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.8em; font-size: 36px } a,a:hover{color:blue;}</style><div style="padding: 24px 48px;"> <h1>:)</h1><p>欢迎使用 <b>ThinkPHP</b>！</p><br/>版本 V{$Think.version}</div><script type="text/javascript" src="http://ad.topthink.com/Public/static/client.js"></script><thinkad id="ad_55e75dfae343f5a1"></thinkad><script type="text/javascript" src="http://tajs.qq.com/stats?sId=9347272" charset="UTF-8"></script>','utf-8');

    	//session取值
    	$value=session('username');

    	//模板变量赋值
        $this->assign('username', $value);

        
    	$Contact=M('Contact');

    	$data=$Contact->field('id,content,create_time,f_id,lyauthor')->select();
    	//dump($data);

        //这里做留言功能时本来作者想通过f_id去user中查找，
        //但是发现时多对多，没法查找，所以后来在contact表添加author字段，
        //并且改为前台留言时提交当前登录用户名作为作者，解决了留言作者问题
        //$f_id=$data[0]['f_id'];

        /*$f_id=array();
        foreach ($data as $key => $value) {
            array_push($f_id, $value['f_id']);
        }*/ 
        //print_r($f_id);
  	

    	$User=M('User');

        /*$lyauthor=array();
        foreach ($f_id as $key => $value) {
          array_push($lyauthor,$User->where('id='.$value)->field('username')->find());  
        }*/
        //print_r($lyauthor);

    	//$lyauthor=$User->where('id='.$f_id)->field('username')->find();
    	//dump($lyauthor);

    	$this->assign('data', $data);
    	//$this->assign('lyauthor', $lyauthor['username']);

        //渲染到页面 
        $this->display();
    }
    public function contact(){
    	if(IS_POST){
    		$Contact=M('Contact');

    		if(!$Contact->create()){
    			exit($Contact->getError());
    		}else{
    			if($Contact->add()){
    				$this->success('留言成功');
    			}else{
    				$this->error('留言失败');
    			}
    		}
    	}
    	
    }

    public function delete(){
        
        //获取传过来的参数id
        $id=I('get.id');

        $Contact=M('Contact');
        if($Contact->where('id='.$id)->delete()){
            $this->success('删除成功');
        }else{
            $this->error('删除失败');
        }

    }

}