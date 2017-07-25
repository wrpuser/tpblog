<?php
namespace Admin\Controller;
use Think\Controller;
class CommonController extends Controller {
	public function _initialize(){
        //初始化
        if(!session('username')){
    		$this->error('请先登录');
    	};
    }
   
}