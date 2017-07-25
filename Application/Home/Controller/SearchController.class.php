<?php 
namespace Home\Controller;
use Think\Controller;

class SearchController extends Controller {

	public function index(){
		header('content-type: text/html; charset=utf-8');
		if(IS_GET){

			$Article=M('Article');
			$where=array();
			$keywords=I('keywords');

			//模糊查询条件
			$where['title']=array('like', "%$keywords%");

			//模糊查询
			$result=$Article->where($where)->field('id,title, content')->select();

			$this->assign('data',$result); 
		}


		$this->display('Index/index');
	}

	public function article(){
		header('content-type: text/html; charset=utf-8');
		if(IS_GET){

			$Article=M('Article');
			$where=array();
			$keywords=I('keywords');

			//模糊查询条件
			$where['title']=array('like', "%$keywords%");

			//模糊查询
			$result=$Article->where($where)->field('id,title, content,create_time')->select();

			$this->assign('data',$result); 
		}


		$this->display('Article/index');
	}
	
}
 ?>