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
			<!-- 默认显示注册登录，登录后显示进入后台和退出 -->
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
				<li class="active"><a href="<?php echo U('Home/Index/index');?>">首页</a></li>
				<li><a href="<?php echo U('Home/Article/index');?>">文章</a></li>
				<li><a href="<?php echo U('Home/About/index');?>">关于</a></li>
				<li><a href="<?php echo U('Home/Contact/index');?>">留言</a></li>
			</ul>
			<form class="navbar-form navbar-right" role="search" action="<?php echo U('Home/Search/index');?>">
			  <div class="form-group">
			    <input type="text" name="keywords" class="form-control" placeholder="Search">
			  </div>
			  <button type="submit" class="btn btn-default">Submit</button>
			</form>
		</nav>
		<div class="row">
			<div class="col-lg-9">
				<?php if(!empty($photo)): ?><div id="myCarousel" class="carousel slide">
				    <!-- 轮播（Carousel）指标 -->
				    <ol class="carousel-indicators">
				    	<?php if(is_array($photo)): foreach($photo as $key=>$vo): ?><li data-target="#myCarousel" data-slide-to="<?php echo ($index++); ?>"></li><?php endforeach; endif; ?>
				    </ol>   
				    <!-- 轮播（Carousel）项目 -->
				    <div class="carousel-inner">
				    	<!-- <div class="item active">
			    			<img src="/myblog/Public/Home/img/1.jpg" alt="">
			    		</div> -->
				    	<?php if(is_array($photo)): foreach($photo as $key=>$vo): ?><div class="item">
				            <img src="/myblog/Uploads/<?php echo ($vo["url"]); ?>" alt="First slide">
				        </div><?php endforeach; endif; ?>
				        <!-- <div class="item">
				            <img src="/myblog/Public/Home/img/1.jpg" alt="Second slide">
				        </div>
				        <div class="item">
				            <img src="/myblog/Public/Home/img/1.jpg" alt="Third slide">
				        </div> -->
				    </div>
				    <!-- 轮播（Carousel）导航 -->
				    <a class="carousel-control left" href="#myCarousel" 
				        data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span>
				    </a>
				    <a class="carousel-control right" href="#myCarousel" 
				        data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span>
				    </a>
				</div>
				<?php else: ?>
					
					<div class="carousel slide">   
					    <!-- 轮播（Carousel）项目 -->
					    <div class="carousel-inner">
					    	 <div class="item">
					            <img src="/myblog/Public/Home/img/1.jpg" alt="First slide">
					        </div>  
					    </div>				    
					</div><?php endif; ?>
				<!-- 遍历文章列表 -->
				<!-- 没有数据时显示暂无数据，有数据时显示文章列表，也可以用if。<if condition="data neq null>" -->
				<?php if(!empty($data)): if(is_array($data)): foreach($data as $key=>$vo): ?><article>
							<h3><a href="<?php echo U('Home/Article/detail');?>?id=<?php echo ($vo["id"]); ?>"><?php echo ($vo["title"]); ?></a></h3>
							<div class="cont">
								<p><?php echo (mb_substr($vo["content"],0, 80, 'utf-8')); ?></p>			
							</div>
						</article><?php endforeach; endif; ?>
					<!-- <ul class="pagination">
						<li><a href="">&lt;&lt;</a></li>
						<li><a href="">2</a></li>
						<li><a href="">3</a></li>
						<li><a href="">4</a></li>
						<li><a href="">&gt;&gt;</a></li>
					</ul> -->
					<div class="pages pagination">
						<?php echo ($page); ?>
					</div>
				<?php else: ?>
					暂无数据...<?php endif; ?>
			
			</div>
			<div class="col-lg-3">
				<div class="panel panel-default">
					<div class="panel-heading">内容摘要</div>
					<div class="panel-body">
						<ul>
							<li><a href="">linux技术</a></li>
							<li><a href="">PHP技术</a></li>
							<li><a href="">服务器运维</a></li>
							<li><a href="">web前段技术</a></li>
						</ul>
					</div>
				</div>
				<div class="panel panel-default">
					<div class="panel-heading">内容摘要</div>
					<div class="panel-body">
						<ul>
							<li><a href="">linux技术</a></li>
							<li><a href="">PHP技术</a></li>
							<li><a href="">服务器运维</a></li>
							<li><a href="">web前段技术</a></li>
						</ul>
					</div>
				</div>
				<div class="panel panel-default">
					<div class="panel-heading">内容摘要</div>
					<div class="panel-body">
						<ul>
							<li><a href="">linux技术</a></li>
							<li><a href="">PHP技术</a></li>
							<li><a href="">服务器运维</a></li>
							<li><a href="">web前段技术</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="well text-center">哈哈，这是底部信息 &copy;2010-2017</div>
		</div>
		
	</div>

	<script>
		$('#myCarousel').carousel('cycle');
		$('.carousel-indicators li:nth-child(1)').addClass('active');
		$('.item').eq(0).addClass('active');
	</script>
</body>
</html>