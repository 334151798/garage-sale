<?php /* Smarty version 2.6.26, created on 2012-10-23 12:52:12
         compiled from front/regist.html */ ?>
﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>2号店用户注册</title>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "front/include/common_include.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<script type="text/javascript" src="js/validateForm.js"></script>
<script type="text/javascript" src="js/inputFocus.js"></script>
<script type="text/javascript">
jQuery(function (){
	//协议隐藏显示
	$(".page  .regist .regist_wrap .statement a").click(function (){
		$(".page  .regist .regist_wrap .statement .state_text").toggle();
	});
});
</script>
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
			<strong class="title fl">　|　用户注册</strong>
		</div>
		<ul class="position clearfix fr">
			<li class="fl"><a href="<?php echo $this->_tpl_vars['front_url']; ?>
">返回首页</a>　|</li>
			<li class="fl"><a href="javascript:void(0)">　帮助</a></li>
		</ul>
	</div>
	<div class="login_content clearfix regist w980">
		<div class="regist_wrap fl">
			<form action="<?php echo $this->_tpl_vars['front_url']; ?>
user/regist/" method="post" class="" id="validateForm">
				<ul>
					<li class="clearfix">
						  <div class="">
					    	<span class="fl text_label">用 户 名：</span>
						    <input type="text" class="text fl" name="user_name"  ajaxurl="<?php echo $this->_tpl_vars['front_url']; ?>
user/regValidate"  value="<?php echo $this->_tpl_vars['user_name_val']; ?>
" datatype="s5-20"  nullmsg="请输入用户名！" errormsg="标题至少5个字符,最多35个字符！"/>
						   <?php echo $this->_tpl_vars['user_name_error']; ?>

						 </div>
					     <div class="v_tip">
					     	<div class="Validform_checktip"></div>
					        <div class="info">用户名至少5个字符,最多20个字符<span class="dec"><s class="dec1">&#9670;</s><s class="dec2">&#9670;</s></span></div>
					    </div>
					</li>
					<li class="clearfix">
						  <div class="">
					    	<span class="fl text_label">邮　　箱：</span>
					      <input type="text" class="text fl" name="email" ajaxurl="<?php echo $this->_tpl_vars['front_url']; ?>
user/regValidate"  value="<?php echo $this->_tpl_vars['email_val']; ?>
" datatype="e"  nullmsg="请输入邮箱！" errormsg="邮箱格式不正确"/>
					      <?php echo $this->_tpl_vars['email_error']; ?>

					    </div>
					     <div class="v_tip">
					     	<div class="Validform_checktip"></div>
					       <div class="info">邮箱至少6个字符,最多30个字符<span class="dec"><s class="dec1">&#9670;</s><s class="dec2">&#9670;</s></span></div>
					    </div>
					</li>
					<li class="clearfix">
						  <div class="">
					    	<span class="fl text_label">密　　码：</span>
					      <input type="password" class="text fl" name="password"  plugin="passwordStrength"  value="<?php echo $this->_tpl_vars['password_val']; ?>
" datatype="*6-20"  nullmsg="请输入密码！" errormsg="密码至少6个字符,最多20个字符！"/>
					    </div>
					     <div class="v_tip">
					     	<div class="Validform_checktip"></div>
					     	<div class="info">密码至少6个字符,最多18个字符！<span class="dec"><s class="dec1">&#9670;</s><s class="dec2">&#9670;</s></span></div>
					      <div class="passwordStrength" style="display:none;"><b>密码强度：</b> <span>弱</span><span>中</span><span class="last">强</span></div>
					    </div>
					</li>
					<li class="clearfix">
						  <div class="">
					    	<span class="fl text_label">确认密码：</span>
					      <input type="password" class="text fl" name="re_password" value="<?php echo $this->_tpl_vars['re_password_val']; ?>
" datatype="*6-20"  nullmsg="请输入确认密码！" errormsg="您两次输入的账号密码不一致！" recheck="password"/>
					    </div>
					     <div class="v_tip">
					     	<div class="Validform_checktip"><?php echo $this->_tpl_vars['re_password_error']; ?>
</div>
					       <div class="info">确认密码至少6个字符,最多20个字符<span class="dec"><s class="dec1">&#9670;</s><s class="dec2">&#9670;</s></span></div>
					    </div>
					</li>
					<li class="clearfix"><input type="submit" class="btns common_bg " value="&nbsp;"  name="submit"/><a href="<?php echo $this->_tpl_vars['front_url']; ?>
user/login.html" class="l_nw">已有账号，直接登陆</a></li>
				</ul>
			</form>
			<div class="statement">
				<a href="javascript:void(0);">2号店使用协议</a>
				<div class="state_text">
					<strong>2号店使用协议</strong>
					<p>   欢迎您使用2号店分类信息网。2号店致力于为您提供最优质、最便捷的服务。在访问2号店的同时，也请您仔细阅读我们的协议条款。您需要完全接受本协议才能注册成为我们的用户。一经注册，您需要遵守该协议的所有条款。北京五八信息技术有限公司作为2号店的管理者有权随时单方面修改本协议，修改后的协议经用户阅览同意后生效。如果您是我们的老用户，您需要经常查看本协议以便知晓相关修订。如果您不同意其中的任何条款或者任何修订，您唯一的解决办法是立刻停止使用服务。2号店有权利通过包括但不限于删帖，终止账户，屏蔽IP地址、关键字、联系方式，或法律诉讼等方式执行本用户协议。使用本服务前，您理解并认可本服务提供的分类信息，其中包含的文字，图片，链接等内容均由用户自主、免费发布，并由用户承担全部责任。
						
					    一、2号店服务内容
					        2号店定位于专业的校园二手信息，覆盖中国所有大中城市。
							
					    二、用户使用规则
					        1、本公司的服务仅向18岁以上有完全民事行为能力的人提供，如果您未满18岁，您需要在您的监护人的指导下使用。
					        2、您需要按照2号店的注册、登陆程序和相应规则进行注册、登陆，注册信息应真实可靠，如果您的注册信息发生变动，请及时更新。
					        3、您需要在适当的栏目或地区发布信息，您所发布的信息内容应当真实、可靠并且不得违反2号店对信息发布的禁止性规定。您需要对您自行发表、上传或者转载的所有信息承担全部责任。
					        4、在使用本公司服务时，您需要遵守中华人民共和国的相关法律法规。包括但不限于《中华人民共和国计算机信息系统安全保护条例》、《计算机软件保护条例》、《最高人民法院关于审理涉及计算机网络著作权纠纷案件适用法律若干问题的解释(法释[2004]1号)》、《全国人大常委会关于维护互联网安全的决定》、《互联网电子公告服务管理规定》、《互联网新闻信息服务管理规定》、《互联网著作权行政保护办法》和《信息网络传播权保护条例》等有关计算机互联网规定和知识产权的法律和法规、实施办法。
					        5、您承诺：对您发表或者上传于2号店的所有信息均享有完整的知识产权，或已经得到相关权利人的合法授权，并保证该信息不侵犯到任何第三人的合法权益；如用户违反本条规定造成2号店被第三人索赔的，用户应全额补偿本社区一切费用(包括但不限于各种赔偿费、诉讼代理费及为此支出的其它合理费用)。
					        6、您同意在发现本网站任何内容不符合法律规定，或不符合本用户协议规定的，您有义务及时向2号店进行汇报。如果您发现您的个人信息被盗用，或者您的版权或者其他权利被侵害，请将此情况告知2号店并同时提供如下信息和材料：  
					        6.1侵犯您权利的信息的网址，编号或其他可以找到该信息的细节；您保证您是所述的
					        6.2版权或个人信息的合法拥有者的声明；
					        6.3您的联系方式，包括联系人姓名，地址，电话号码和电子邮件； 
					        6.4您的身份证复印件、营业执照等。
					        经审查得到证实的，我们将于1个工作日内删除相关信息。我们仅接受邮寄、电子邮件或传真方式的书面侵权通知。情况紧急的，您可以通过客服电话先行告知，在接到您的告知提醒后，我们会对相关信息进行暂时的屏蔽。在收到您提供的书面材料后，我们经审查证实的，将立即删除该信息。
					        7、您保证不利用2号店实施任何危害或可能对互联网的正常运转造成不利影响的行为；不进行任何危害2号店的行为。
					        8、您应确保您自己账号和密码的安全，因您自己的过失导致损害发生的，2号店不承担任何责任。
							   
					    三、隐私保护
					        1、2号店向您保证不对外公开或向第三方提供您的注册资料及您在使用本网站服务时存储在本网站的非公开内容，但下列情况除外：1.事先获得您的明确授权的；2.根据有关的法律法规要求，我们必须提供的；3.按照相关政府主管部门的要求，我们必须提供的；4，您先行违反本协议内容导致2号店或第三方或者社会公共利益受损或者受到威胁的，我们有权向相关当事人提供您的相关信息。
					        2、你知悉并认可：2号店可能会与第三方合作向用户提供相关的网络服务，在此情况下，如该第三方同意承担与本网站同等的保护用户隐私的责任，则2号店有权将用户的注册资料等提供给该第三方。另外，在不透露单个用户隐私资料的前提下，2号店有权对整个用户数据库进行分析并对用户数据库进行商业上的利用。
								
					    四、免责条款
					        1、由于2号店网上大多数的内容系用户自主、免费发布，本公司不保证这些信息和用户联络方式的准确性、以及其所提供内容的质量、安全性或合法性。对此，您同意：
					        1.1不就其他用户发布的内容或所作所为追究本公司的责任。本公司对于您由于使用2号店网而造成的任何金钱、商誉、名誉的损失，或任何特殊的、间接的、或结果性的损失都不负任何责任。
					        1.2您同意您就您自身行为之合法性单独承担责任，2号店和2号店的所有关联公司和相关实体对本公司用户的行为的合法性不承担责任。
					        2、除2号店注明之服务条款外，其他一切因使用2号店发布系统而引致之任何意外、疏忽、合约毁坏、诽谤、版权或知识产权侵犯及其所造成损失的（包括因下载而感染电脑病毒），2号店不承担任何法律责任
					        3、任何通过2号店的网页而链接及得到的资讯、产品或服务均系网站用户自行发布，引起纠纷的，2号店不承担任何法律责任。 
					        4、根据法律规定、相关协议约定，2号店不承担责任的其他情形
							
					    五、一般规定
							
					        本协议在所有方面均受中华人民共和国法律管辖。本网站所有用户均不可撤销地受中华人民共和国北京市的法院的管辖。本协议的规定是可分割的，如本协议的任何规定被裁定为无效或不可执行，该规定可被删除而其余条款继续有效并应予以执行。您同意，在发生并购，本协议和所有纳入的协议可由2号店按本公司自行酌情决定向第三方自动转让。本公司未就您或其他方的违约采取行动并不等于本公司放弃就随后或类似的违约采取行动的权利。
							
					    2号店再次慎重申明：用户发布之内容并不反映任何2号店之意见。             
					</p>
				</div>
			</div>
		</div>
		<div class="right_img fr"></div>
	</div>
	<div class="copyright w980">
		Copyright(C)2011-2012 Tohaodian.com
	</div>
</div>
</body>
</html>