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
				<li class="active"><a href="<?php echo U('Home/Article/index');?>">文章</a></li>
				<li><a href="<?php echo U('Home/About/index');?>">关于</a></li>
				<li><a href="<?php echo U('Home/Contact/index');?>">留言</a></li>
			</ul>
			<form class="navbar-form navbar-right" role="search">
			  <div class="form-group">
			    <input type="text" class="form-control" placeholder="Search">
			  </div>
			  <button type="submit" class="btn btn-default">Submit</button>
			</form>
		</nav>
		<div class="row">
			<div class="col-lg-12">

					<article>
						<h2 class="text-center"><?php echo ($data["title"]); ?></h2>
						<div class="cont" style="background: #fcfcfc; padding: 10px; line-height: 30px">
							<p><?php echo ($data["content"]); ?></p>			
						</div>
						<p class="pull-right">发布时间：<?php echo ($data["create_time"]); ?></p>
						<p class="text-info">作者：<?php echo ($author); ?></p>
					</article>

			</div>
			<div class="col-lg-12">
				<?php if(($username) == ""): ?><p class="text-info text-center">登录才能评论</p>
				<?php else: ?>
					<?php if(is_array($comment)): foreach($comment as $key=>$vo): ?><div class="panel panel-default">
						<div class="panel-heading">
							<p>评论人：<?php echo ($vo["comauthor"]); ?>&nbsp;评论时间：<?php echo ($vo["create_time"]); ?></p>	
						</div>
						<p class="panel-body">
							<?php echo ($vo["content"]); ?>
						</p>
					</div><?php endforeach; endif; endif; ?>
				<form role="form" action="<?php echo U('Home/Comment/index');?>" method="post">
					<div class="form-group">
						<input type="hidden" name="a_id" value="<?php echo ($data["id"]); ?>">
						<input type="hidden" name="comauthor" value="<?php echo ($username); ?>">
						<input type="hidden" name="create_time" value="<?php echo ($create_time); ?>">
						<label for="content">发表评论：</label>
						<textarea class="form-control" id="content" name="content" rows="10" placeholder="请输入相关内容"></textarea>
					</div>
					<button type="submit" class="btn btn-default pull-right">发布</button>					
				</form>
			</div>
			
		</div>
		<div>&nbsp;</div>
		<div class="row">
			<div class="well text-center">哈哈，这是底部信息 &copy;2010-2017</div>
		</div>
		
	</div>

	<script>
		$('#myCarousel').carousel('cycle');
		var str=$('.cont').html();
		var content=format(str);
		$('.cont').html(content);
		function format(str){
			return str.replace(/^/gm, '<p>').replace(/$/gm, '</p>');
		}
	</script>
</body>
</html>