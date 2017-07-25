<?php
namespace Admin\Controller;
use Think\Controller;
class CommentController extends Controller {
    public function index(){
        //$this->show('<style type="text/css">*{ padding: 0; margin: 0; } div{ padding: 4px 48px;} body{ background: #fff; font-family: "微软雅黑"; color: #333;font-size:24px} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.8em; font-size: 36px } a,a:hover{color:blue;}</style><div style="padding: 24px 48px;"> <h1>:)</h1><p>欢迎使用 <b>ThinkPHP</b>！</p><br/>版本 V{$Think.version}</div><script type="text/javascript" src="http://ad.topthink.com/Public/static/client.js"></script><thinkad id="ad_55e75dfae343f5a1"></thinkad><script type="text/javascript" src="http://tajs.qq.com/stats?sId=9347272" charset="UTF-8"></script>','utf-8');

    	//session取值
    	$value=session('username');

    	//模板变量赋值
        $this->assign('username', $value);

        $Comment=M('Comment');

        $data=$Comment->field('id,content,create_time,comauthor')->select();

        $this->assign('comment', $data);

        $Article=M('Article');

        $result=$Article->field('title')->find();

        $this->assign('title',$result['title']);

        //渲染到页面 
        $this->display();
    }

    public function modify(){

    	//session取值
    	$value=session('username');

    	//模板变量赋值
        $this->assign('username', $value);

    	$id=I('get.id');

    	$this->assign('id', $id);

    	$this->display();
    }

    public function update(){
    	if(IS_POST){

    		$Comment=M('Comment');

    		$id=I('get.id');

    		$Comment->content=I('post.content');

    		if($Comment->where('id='.$id)->save()){
    			$this->success('修改成功', U('Comment/index'));
    		}else{
    			$this->error('修改失败');
    		}

    	}
    }

    public function delete(){
    	//获取传过来的参数id
        $id=I('get.id');

        $Comment=M('Comment');
        if($Comment->where('id='.$id)->delete()){
            $this->success('删除成功');
        }else{
            $this->error('删除失败');
        }
    }

}