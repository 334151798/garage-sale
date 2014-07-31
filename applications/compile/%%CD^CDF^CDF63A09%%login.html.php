<?php /* Smarty version 2.6.26, created on 2012-10-21 17:46:36
         compiled from front/login.html */ ?>
﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>2号店用户登陆</title>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "front/include/common_include.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
 <script type="text/javascript">
jQuery(function($){
	$("#validateForm").Validform({
		tiptype:function(msg,o,cssctl){
			var objtip=$("#error_tip");
			cssctl(objtip,o.type);
			objtip.html(msg);
		}
	});
	//刷新的时候，将表单重置
	$("#validateForm input.text").val("");
	$("#validateForm .tip").click(function (){//单击提示框的时候，将对应的input设为focus状态
		$(this).hide();
		$(this).prev("input.text").focus();
	});
})
</script>
<script type="text/javascript" src="js/inputFocus.js"></script>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "front/include/ie6png.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
</head>

<body>
<div class="page">
	<div class="login_top w980">
		<div class="login_title fl">
			<h1 class="fl "><a href="<?php echo $this->_tpl_vars['front_url']; ?>
" class="out_text ">2号店，最专业的校园二手平台</a></h1>
			<strong class="title fl">　|　用户登录</strong>
		</div>
		<ul class="position clearfix fr">
			<li class="fl"><a href="<?php echo $this->_tpl_vars['front_url']; ?>
">返回首页</a>　|</li>
			<li class="fl"><a href="javascript:void(0)">　帮助</a></li>
		</ul>
	</div>
	<div class="login_content clearfix w980">
		<div class="left_img fl"></div>
		<div class="form_wrap fr">
			<form action="" method="post" class="login_form" id="validateForm">
				<ul>
					<li class="input">
					      <div class=" text_label">用户名：</div>
					  	  <input type="text" class="text" name="user_name"  value="" datatype="*6-30"  nullmsg="请输入用户名/邮箱！" errormsg="用户名/邮箱不正确"/>
					  	  <div class="tip">请输入用户名/邮箱</div>
					</li>
					<li class="input">
					      <div class=" text_label">密　码：</div>
					      <input type="password" class="text " name="password" value="" datatype="*6-20"  nullmsg="请输入密码！" errormsg="密码至少6个字符,最多20个字符！"/>
					      <div class="tip">请输入密码</div>
					</li>
					<li class="btn_li">
						<input type="submit" class="btns common_bg" value="登录"  name="submit"/>
						<a href="<?php echo $this->_tpl_vars['front_url']; ?>
user/regist.html" class="login_btn">免费注册</a>
						<a href="javascript:void(0)" class="login_btn">找回密码</a>
					</li>
					<li class="clearfix">
						<div class="other_login fl">用其他账号登陆：</div>
						<a href="javascript:void(0)" class="common_bg qq_login fr"></a>
					</li>
					<li class="error_li"><div id="error_tip"></div></li>
				</ul>
			</form>
		</div>
	</div>
	<div class="copyright">
		<span>Copyright(C)2011-2012 Tohaodian.com</span>
		<a title="沪ICP备12033705号"  target="_blank" href="http://www.miibeian.gov.cn/">沪ICP备12033705号</a>
	</div>
</div>
</body>
</html>