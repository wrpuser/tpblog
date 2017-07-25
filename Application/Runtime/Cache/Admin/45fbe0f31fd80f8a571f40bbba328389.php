<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<!-- <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no"> -->
	<link rel="stylesheet" href="/myblog/Public/Home/css/bootstrap.css">
	<link rel="stylesheet" href="/myblog/Public/Home/css/style.css">
	<link rel="stylesheet" href="/myblog/Public/Home/css/fonts">
	<script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
	<script src="/myblog/Public/Home/js/jquery.validate.min.js"></script>
	<script src="/myblog/Public/Home/js/bootstrap.js"></script>
</head>
<body>
	<div class="container">
		<div class="pull-right">
			<?php if(($username) == ""): else: ?>
				欢迎你，<span class="badge"><?php echo ($username); ?></span>|
				<a href="<?php echo U('Home/Index/index');?>">返回前台</a><?php endif; ?>	
						
		</div>

		<div class="page-header">
			<h1>后台管理系统</h1>
			<h4>thinkPHP 3.2.3 + Bootstrap</h4>
		</div>
		<nav class="navbar navbar-inverse">
			<ul class="nav navbar-nav">
				<li><a href="<?php echo U('Admin/Index/index');?>">配置信息</a></li>
				<li><a href="<?php echo U('Admin/Article/index');?>">文章资讯</a></li>
				<li class="active"><a href="<?php echo U('Admin/Slider/index');?>">轮播图片</a></li>
				<li><a href="<?php echo U('Admin/About/index');?>">关于我们</a></li>
				<li><a href="<?php echo U('Admin/Comment/index');?>">评论信息</a></li>
				<li><a href="<?php echo U('Admin/Contact/index');?>">留言信息</a></li>
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
				<form id="fm" class="hidden" action="/myblog/index.php/Admin/Slider/upload" enctype="multipart/form-data" method="post" >
					<input type="hidden" name="upauthor" value="<?php echo ($username); ?>" />
					<input id="file" type="file" name="photo" />
					<input type="submit" value="提交" >
				</form>
				<table class="table table-bordered table-hover text-center">
					<caption class="h3 text-info text-center">轮播图片</caption>
					<tr>
						<th class="text-center">编号</th>
						<th class="text-center">图片</th>
						<th class="text-center">
							<button id="option" class="btn btn-primary btn-sm">选择文件</button>&nbsp;<button id="upload" class="btn btn-success btn-sm">上传</button>
						</th>
					</tr>
					<?php if(data != null): if(is_array($data)): foreach($data as $key=>$vo): ?><tr>
						<td><?php echo ($index++); ?></td>
						<td><img width="80" height="32" src="/myblog/Uploads/<?php echo ($vo["url"]); ?>" alt=""></td>
						<td><button data-toggle="modal" data-target="#layer" class="btn btn-danger btn-sm">删除</button></td>
					</tr><?php endforeach; endif; ?>
					<?php else: ?>
					<tr><td colspan="4">暂无数据...</td></tr><?php endif; ?>
				</table>
				<script>
					$('#option').click(function(){
						$('#file').click();
					});
					$('#upload').click(function(){
						$('#fm').submit();
					})
				</script>

				<!-- <form id="fm" action="/myblog/index.php/Admin/Slider/upload" enctype="multipart/form-data" method="post" >
					<input type="hidden" name="upauthor" value="<?php echo ($username); ?>" />
					<input type="file" name="photo" />
					<input type="submit" value="提交" >
				</form> -->
			</div>
			<!-- 模态框 -->
			<div role="dialog" class="modal fade" id="layer">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">
								<span>&times;</span>
							</button>
							<h3>确认删除？</h3>
						</div>
						<div class="modal-body text-right">
							<button data-dismiss="modal" class="btn btn-primary btn-sm">取消</button>
							<button data-dismiss="modal" class="btn btn-danger btn-sm"  id="del">确认</button>
						</div>
					</div>
				</div>
			</div>
			<script type="text/javascript">
				$('#del').click(function(){
					location.href='<?php echo U("Admin/Slider/delete");?>?id=<?php echo ($vo["id"]); ?>';
				});
			</script>
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