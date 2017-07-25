<?php 
	
	//自定义函数 	
	function checkPass($password){

		if(strlen($password)<6){
			return false;
		}else{
			return true;
		}

	}

	// 检测输入的验证码是否正确，$code为用户输入的验证码字符串
    function check_verify($code, $id = ''){
        $verify = new \Think\Verify();
        return $verify->check($code, $id);
    }

    //分页函数
    function getpage($count, $pagesize = 5) {
	    $p = new Think\Page($count, $pagesize);
	    $p->setConfig('header', '<li class="rows">共<b>%TOTAL_ROW%</b>条记录&nbsp;第<b>%NOW_PAGE%</b>页/共<b>%TOTAL_PAGE%</b>页</li>');
	    $p->setConfig('prev', '上一页');
	    $p->setConfig('next', '下一页');
	    $p->setConfig('last', '末页');
	    $p->setConfig('first', '首页');
	    $p->setConfig('theme', '%FIRST%%UP_PAGE%%LINK_PAGE%%DOWN_PAGE%%END%%HEADER%');
	    $p->lastSuffix = false;//最后一页不显示为总页数
	    return $p;
	}


 ?>