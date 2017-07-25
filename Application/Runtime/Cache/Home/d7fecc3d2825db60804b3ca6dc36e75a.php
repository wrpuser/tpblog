<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<!-- <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no"> -->
	<link rel="stylesheet" href="/myblog/Public/Home/css/bootstrap.css">
	<link rel="stylesheet" href="/myblog/Public/Home/css/style.css">
	<script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
	<script src="/myblog/Public/Home/js/jquery.validate.min.js"></script>
	<script src="/myblog/Public/Home/js/bootstrap.js"></script>
</head>
<body>
	<div class="wrap">
		<form role="form" action="<?php echo U('Home/Log/index');?>" method="post">
			<h2>欢迎登录</h2>
			<div class="form-group">
				<label for="username">用户名:</label>
				<input type="text" id="username" name="username" class="form-control" placeholder="请输入用户名">
				<label for="password">密码:</label>
				<input type="password" id="password" name="password" class="form-control" placeholder="请输入密码">
				<div class="row">
					<p class="col-lg-7">
						<label for="verify">验证码:</label>
						<input type="text" id="verify" name="verify" class="form-control" placeholder="请输入验证码">
					</p>
					<p class="col-lg-5" style="margin-top: 15px">
						<img border="1" src="<?php echo U('Home/Reg/verify');?>" alt="" onclick="this.src=this.src+'?'" >
					</p>
				</div>
			</div>
			<div class="form-group">
				<input type="submit" value="登录" class="btn btn-primary">
				<input type="reset" value="重置" class="btn btn-danger">
				<p class="pull-right"><a href="<?php echo U('Home/Reg/index');?>">没有账号？立即注册</a></p>
			</div>
		</form>
	</div>
</body>
</html>