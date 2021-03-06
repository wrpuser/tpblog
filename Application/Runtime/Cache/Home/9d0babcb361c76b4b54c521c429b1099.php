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
<link rel="stylesheet" href="/myblog/Public/Admin/css/markdown/bootstrap-markdown.min.css">
<script src="/myblog/Public/Admin/js/markdown/markdown.js"></script>
<script src="/myblog/Public/Admin/js/markdown/to-markdown.js"></script>
<script src="/myblog/Public/Admin/js/markdown/bootstrap-markdown.js"></script>
<script src="/myblog/Public/Admin/js/markdown/bootstrap-markdown.zh.js"></script>
<body>
	<div class="container">
		<div class="pull-right">
			<?php if(($username) == ""): ?><a href="/myblog/index.php/Home/Reg/index">注册</a>|
				<a href="<?php echo U('Home/Log/index');?>">登录</a>
			<?php else: ?>
				欢迎你，<span class="badge"><?php echo ($username); ?></span>|
				<a href="<?php echo U('Admin/Index/index');?>">进入后台</a>|
				<a href="<?php echo U('Home/Log/logout');?>">退出</a><?php endif; ?>
		</div>
		<div class="page-header">
			<h1>凌晨两点半</h1>
			<h4>世界上没有完美的人，也没有完美的事</h4>
		</div>
		<nav class="navbar navbar-inverse">
			<ul class="nav navbar-nav">
				<li><a href="<?php echo U('Home/Index/index');?>">首页</a></li>
				<li><a href="<?php echo U('Home/Article/index');?>">文章</a></li>
				<li><a href="<?php echo U('Home/About/index');?>">关于</a></li>
				<li class="active"><a href="<?php echo U('Home/Contact/index');?>">留言</a></li>
			</ul>
			<form class="navbar-form navbar-right" role="search">
			  <div class="form-group">
			    <input type="text" class="form-control" placeholder="Search">
			  </div>
			  <button type="submit" class="btn btn-default">Submit</button>
			</form>
		</nav>
		<div class="row">
			<div class="col-lg-9">
				<form role="form" action="<?php echo U('Admin/Contact/contact');?>" method="post">
					<!-- 当前登录用户ID，设为隐藏字段 -->
					<input type="hidden" name="lyauthor" value="<?php echo ($username); ?>">
					<input type="hidden" name="f_id" value="<?php echo ($id); ?>">
					<input type="hidden" name="create_time" value="<?php echo ($create_time); ?>">
					<div class="form-group">
						
						<!-- <label for="content">内容：</label>
						<textarea class="form-control" id="content" name="content" rows="10" placeholder="请输入文章内容"></textarea> -->

		<!-- Markdown编辑器/start -->
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <label for="content">留言：</label>
                <div class="ibox-tools">
                    <a class="collapse-link">
                        <i class="fa fa-chevron-up"></i>
                    </a>
                    <a class="dropdown-toggle" data-toggle="dropdown" href="form_editors.html#">
                        <i class="fa fa-wrench"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="form_editors.html#">选项1</a>
                        </li>
                        <li><a href="form_editors.html#">选项2</a>
                        </li>
                    </ul>
                    <a class="close-link">
                        <i class="fa fa-times"></i>
                    </a>
                </div>
            </div>
            <div class="ibox-content">
                <textarea class="form-control" id="content" name="content" data-provide="markdown" rows="10" placeholder="Markdown编辑器"></textarea>
            </div>
        </div>
    	<!-- Markdown编辑器/end -->

					</div>
					<button type="submit" class="btn btn-default pull-right">发布</button>
				</form>

			</div>
			<div class="col-lg-3 visible-lg-block">
				<!-- 4:3 aspect ratio -->
				<div class="embed-responsive embed-responsive-4by3">
				  <iframe class="embed-responsive-item" src="..."></iframe>
				</div>
			</div>
			
		</div>
		<div style="height: 50px"></div>
		<div class="row">
			<div class="well text-center">哈哈，这是底部信息 &copy;2010-2017</div>
		</div>
		
	</div>

	<script>
		$('#myCarousel').carousel('cycle');
	</script>
</body>
</html>