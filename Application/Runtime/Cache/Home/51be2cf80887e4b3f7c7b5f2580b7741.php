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
<style type="text/css">
    #frm label.error {
        color: Red;
        /*float: right;*/
    }
</style>
<body>
	<div class="wrap">
		<form id="frm" role="form" action="<?php echo U('Home/Reg/reg');?>" method="post">
			<h2>欢迎注册</h2>
			<div class="form-group">
				<div>
					<label for="username">用户名:</label>
					<input type="text" id="username" name="username" class="form-control" placeholder="请输入用户名">
				</div>
				<div>
					<label for="password">密码:</label>
					<input type="password" id="password" name="password" class="form-control" placeholder="请输入密码">
				</div>
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
				<input type="submit" value="注册" class="btn btn-primary">
				<input type="reset" value="重置" class="btn btn-danger">
			</div>
		</form>
	</div>

	<script>
		$( "#frm" ).validate({
	        rules: {
		        username: {
		            required: true,
		            minlength: 2,
		            maxlength: 4,
		            byteMaxLength:4,
		            valiEnglish:true
		        },
	         	password: {
	         		required: true,
	         		minlength: 6
	         	},
	          	number: {
		            byteMaxLength:5,
		            numFormat:5
	            }       
	                        
	        },
	        messages: {
	          	username: {
	              	required: "请输入用户名",
	              	minlength: $.format("用户名至少为{0}位!"),
	              	maxlength: $.format("用户名最多为{0}位!")
	          	},
	          	password: {
	          		required: "请输入密码",
	          		minlength: $.format("用户名至少为{0}位!")

	          	},
	          	number: {
              		numFormat: $.format("请输入{0}数字")
	            }
	      	}
	  	});
	  
	 
	  
	 	/*jQuery.validator.addMethod("byteMaxLength", function(value,element, param) {
	                var length = value.length;
	                for ( var i = 0; i < value.length; i++) {
	                    if (value.charCodeAt(i) > 127) {
	                        length++;
	                    }
	                }
	                return this.optional(element) || (length <= param);
            },$.validator.format("不能超过{0}个字节(一个中文字算2个字节)")
        );*/

        /*jQuery.validator.addMethod("valiEnglish",function(value,element){
	            return this.optional(element) || /^[a-zA-Z ]*$/.test(value);
            },$.validator.format("请输入字母或者空格")
        );*/
	  
 		/*jQuery.validator.addMethod("numFormat",function(value,element,param){
	            return this.optional(element) || /^\d*$/.test(value);
            },$.validator.format("请输入数字{0}位以内")
        );*/
    
	 
	</script>
</body>
</html>