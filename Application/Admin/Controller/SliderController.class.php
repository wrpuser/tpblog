<?php
namespace Admin\Controller;
use Think\Controller;
class SliderController extends Controller {
    public function index(){
        //$this->show('<style type="text/css">*{ padding: 0; margin: 0; } div{ padding: 4px 48px;} body{ background: #fff; font-family: "微软雅黑"; color: #333;font-size:24px} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.8em; font-size: 36px } a,a:hover{color:blue;}</style><div style="padding: 24px 48px;"> <h1>:)</h1><p>欢迎使用 <b>ThinkPHP</b>！</p><br/>版本 V{$Think.version}</div><script type="text/javascript" src="http://ad.topthink.com/Public/static/client.js"></script><thinkad id="ad_55e75dfae343f5a1"></thinkad><script type="text/javascript" src="http://tajs.qq.com/stats?sId=9347272" charset="UTF-8"></script>','utf-8');

    	//session取值
    	$value=session('username');

    	//模板变量赋值
        $this->assign('username', $value);

        $Photo=M('Photo');

        //查询photo表中所有字段
        $data=$Photo->select();
		//dump($data);

		//图片编号
		$index=0;

        $this->assign('data', $data);
        $this->assign('index', $index);

        //渲染到页面 
        $this->display();
    }

    public function upload(){
		$upload = new \Think\Upload();// 实例化上传类
		$upload->maxSize = 3145728 ;// 设置附件上传大小
		$upload->exts = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
		$upload->rootPath = './Uploads/'; // 设置附件上传根目录
		$upload->savePath = ''; // 设置附件上传（子）目录
		// 上传文件
		$info = $upload->upload();
		if(!$info) {// 上传错误提示错误信息
			$this->error($upload->getError());
		}else{// 上传成功
			//$this->success('上传成功！');
			/*foreach($info as $file){
				echo $file['savepath'].$file['savename'];
			}*/

			$Photo = M('Photo');
			$data['create_time']= date('Y-m-d H:i:s',time());
			$data['url']=$info['photo']['savepath'].$info['photo']['savename'];
			$data['upauthor']=I('post.upauthor');

			if($Photo->add($data)){
				$this->success('上传成功！');
			}
		}

	}

	public function delete(){
		//获取传过来的参数id
        $id=I('get.id');

        $Photo=M('Photo');
        if($Photo->where('id='.$id)->delete()){
            $this->success('删除成功');
        }else{
            $this->error('删除失败');
        }
	}
}