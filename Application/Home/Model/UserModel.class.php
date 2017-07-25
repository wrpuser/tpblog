<?php 
namespace Home\Model;
use Think\Model;

class UserModel extends Model {
	public function test(){
		echo '我是模型';
	}
	//属性
	//简单的说吧，callback和function都是自定义一个函数来验证，
	//但是区别在于，callback方法直接放在模型类里面就可以了，
	//function函数要放在www\Application\Home\Common\common.php里面。就这一点区别
	//自动验证
	protected $_validate = array(
		//array(验证字段1,验证规则,错误提示,[验证条件,附加规则,验证时间]),	
		array('username','','帐号名称已经存在！',0,'unique',1), // 在新增的时候验证name字段是否唯一
		//array('password','checkPass','密码格式不正确',0,'function'), // 自定义函数验证密码格式
		array('password','checkPWd','密码不能小于6位',0,'callback'), // 自定义方法验证密码格式
		array('verify','check_verify','验证码错误',0,'function') // 自定义方法验证密码格式
	);

	//自定义方法，验证密码
	public function checkPwd($password){

		if(strlen($password)<6){
			return false;
		}else{
			return true;
		}

	}

	//自定义方法,可以在写入数据前调用，用来验证
	/*public function checkPass(){
		$pass=I('password');
		if(strlen($pass)<6){
			echo '<script>alert("密码不能小于6位")</script>';
			die;
		}
	}*/



	//自动完成
	protected $_auto = array (
		//array(完成字段1,完成规则,[完成条件,附加规则])
		array('password','md5',3,'callback') , // 对password字段在新增和编辑的时候使md5函数处理	
	);

	//自定义给方法，密码加密
	public function md5($password){
		
		return MD5($password);
		 
	}

	
}

 ?>