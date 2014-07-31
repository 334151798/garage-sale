<?php /* Smarty version 2.6.26, created on 2013-01-16 14:03:04
         compiled from front/user_center_data.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'default', 'front/user_center_data.html', 119, false),)), $this); ?>
﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>2号店用户中心</title>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "front/include/common_include.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<link rel="stylesheet" href="js/uploadify/uploadify.css" type="text/css" />

<!-- JavaScripts-->
<script type="text/javascript" src="js/Validform_v5.1/js/Validform_v5.1_min.js"></script>
<script type="text/javascript" src="js/Validform_v5.1/plugin/passwordStrength/passwordStrength-min.js"></script>
<script type="text/javascript" src="js/navLinkSelect.js"></script>
<script type="text/javascript" src="js/uploadify/jquery.uploadify-3.1.min.js"></script>
<script type="text/javascript" src="js/inputFocus.js"></script>
<script type="text/javascript" src="js/setSelectRadioCheckboxDefault.js"></script>
<script type="text/javascript" src="js/validateForm.js"></script>
<script type="text/javascript" src="js/My97DatePicker/WdatePicker.js"></script>
<script type="text/javascript" >
jQuery(function (){
	//个人中心tab
	var allTab=$(".page .user_center .right .infos .request_head li a");
	allTab.each(function (eq){
		var _this=$(this);
		_this.eq=eq;
		_this.hover(function (){
			allTab.removeClass("active");
			_this.addClass("active");
			_this.parents(".request_head").next(".re_list_wrap").find(".re_list").eq(_this.eq).addClass("active").siblings().removeClass("active");
		},function (){
			//_this.removeClass("active");
		});
	});
	
	//左右两边高度相等
	var MxHeight= Math.max($(".page .user_center .left").innerHeight(),$(".page .user_center .right").innerHeight());
	$(".page .user_center .right").height(MxHeight);
	$(".page .user_center .left").height(MxHeight-310);//310是左边的padding，去掉它
	
	/*
	 * 设置导航默认选中
	 */
	$(".page .user_center .left ul li").removeClass("active");
	$(".page .user_center .left ul li").eq(parseInt($(".page .user_center .left ul").attr("leftEq"))+1).addClass('active');
	
	/*上传头像*/
	$('#article_imgs_upload').uploadify({
		'buttonText' : '上传图片',
		'width'         : 120,
		'height'        : 30,
		'fileSizeLimit' : '300KB',
		'fileTypeExts' : '*.gif; *.jpg; *.png',
		'removeTimeout' : 0.1,
		'swf'           : 'js/uploadify/uploadify.swf',
		'uploader'      : '<?php echo $this->_tpl_vars['front_url']; ?>
upload/load/',
		'auto'          : true,
	    'multi'         : false,
	    'onUploadStart' : function(file) {
	    	$('#article_imgs_upload').uploadify('settings','articleType','2');
	    },
    	    'onUploadSuccess' : function(file, data, response) {
	      //data=jQuery.parseJSON(data);
	      $("#pic_id").attr("src",data);
	      $("#pic_input").val(data);
	    }
	});
	
	//大学联动
	$("#province_select").change(function (){
		$.ajax({
			   type: "GET",
			   url: "<?php echo $this->_tpl_vars['front_url']; ?>
region/getCollege/",
			   data: "province_id="+$(this).val(),
			   success: function(msg){
				   var collegeLists = jQuery.parseJSON(msg),collegeWrap = $("#niversity_select");
				   collegeWrap.html("");
				   collegeWrap.append("<option value='0' selected='selected'>请选择院校</option>");
				   for (var i=0,l=collegeLists.length;i<l;i++){
					   collegeWrap.append("<option value='"+collegeLists[i].university_id+"'>"+collegeLists[i].university+"</option>");
				   }
			   }
			});
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
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "front/include/header.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	<div class="position w980 ">
		<ul class="position_ul clearfix">
			<li class="first">您现在的位置：</li>
			<li><a href="#">首页</a></li>
			<li><a href="<?php echo $this->_tpl_vars['front_url']; ?>
user/center.html">个人中心</a></li>
			<li class="college cur" title="">我的资料</li>
		</ul>
	</div>
	<div class="user_center w980 clearfix">
		<div class="left wraps fl">
			<ul leftEq =<?php if ($this->_tpl_vars['leftEq']): ?><?php echo $this->_tpl_vars['leftEq']; ?>
<?php else: ?>0<?php endif; ?>>
				<li class="user_li">个人中心</li>
				<li  class="active"><a href="<?php echo $this->_tpl_vars['front_url']; ?>
user/center.html" class="common_bg pub">我的发布</a></li>
				<li ><a href="<?php echo $this->_tpl_vars['front_url']; ?>
user/collect.html" class="common_bg coll">我的收藏</a></li>
				<li ><a href="<?php echo $this->_tpl_vars['front_url']; ?>
user/data.html" class="common_bg data">我的资料</a></li>
			</ul>
		</div>
		<div class="right fr wraps">
			<h6>我的资料</h6>
			<div class="infos">
				<form action="<?php echo $this->_tpl_vars['front_url']; ?>
user/data/" class=" jNice my_infos" method="post" id="validateForm">
					<ul>
						<li class="title"><strong>修改头像</strong></li>
				          <li class="clearfix lists upload">
				          	<div class="pic fl" id="">
				          	  <input name="id" type="hidden" value="<?php echo $this->_tpl_vars['id']; ?>
" id=""/> 
											<img src="<?php echo ((is_array($_tmp=@$this->_tpl_vars['pic'])) ? $this->_run_mod_handler('default', true, $_tmp, 'images/default_request_pic.gif') : smarty_modifier_default($_tmp, 'images/default_request_pic.gif')); ?>
" width="134" height="134" alt="2号店" id="pic_id"/>
											<input name="pic" type="hidden" value="<?php echo $this->_tpl_vars['pic']; ?>
" id="pic_input"/> 
										</div>	
				          	<div class="upload_btns clearfix fl">
						         	<input id="article_imgs_upload" name="" type="file" value="<?php echo $this->_tpl_vars['pic']; ?>
"/> 
					          </div>
				          </li>	
				          <li class="title"><strong>修改联系方式</strong></li>
				          <li class="clearfix lists">
					          <div class="fl">
					          	<span class="fl text_label">手机号码：</span>
					             <input type="text" class="text fl" name="cellphone" value="<?php echo $this->_tpl_vars['cellphone']; ?>
" datatype="m" nullmsg="请输入您的手机号码！" errormsg="手机号码格式不正确！" ignore="ignore"/>
					             <?php echo $this->_tpl_vars['cellphone_error']; ?>

					          </div>
					         	<div class="fl">
				            	<div class="Validform_checktip"></div>
				              <div class="info">请输入您的手机号码<span class="dec"><s class="dec1">&#9670;</s><s class="dec2">&#9670;</s></span></div>
				            </div>
				          </li>
				          <li class="clearfix lists">
				            <div class="fl">
				            	<span class="fl text_label">Q　　　Q：</span>
				              <input type="text" class="text fl" name="qq" value="<?php echo $this->_tpl_vars['qq']; ?>
" datatype="n5-11"  errormsg="QQ号至少5位数字,最多11位数字！" ignore="ignore"/>
				            	<?php echo $this->_tpl_vars['qq_error']; ?>

				            </div>
				             <div class="fl">
				             	<div class="Validform_checktip"></div>
				               <div class="info">请输入QQ号<span class="dec"><s class="dec1">&#9670;</s><s class="dec2">&#9670;</s></span></div>
				             </div>
				          </li>
				          <li class="clearfix lists">
						  <div class="clearfix">
					    		<span class="fl text_label">邮　　箱：</span>
					          <a href="#" class="validate_email fl">发送验证邮件以验证邮箱</a>
					     </div>
				          </li>
				          <li class="title"><strong>修改资料</strong></li>
				          <li class="clearfix lists">
				            <div class="fl">
				            		<span class="fl text_label">所属大学：</span>
				            		<select name="province" class="fl" ov="<?php echo $this->_tpl_vars['province']; ?>
" ignore="ignore" id="province_select">
						             	<option value="0">请选择省份</option>
						             	<?php unset($this->_sections['province']);
$this->_sections['province']['name'] = 'province';
$this->_sections['province']['loop'] = is_array($_loop=$this->_tpl_vars['allProvince']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['province']['show'] = true;
$this->_sections['province']['max'] = $this->_sections['province']['loop'];
$this->_sections['province']['step'] = 1;
$this->_sections['province']['start'] = $this->_sections['province']['step'] > 0 ? 0 : $this->_sections['province']['loop']-1;
if ($this->_sections['province']['show']) {
    $this->_sections['province']['total'] = $this->_sections['province']['loop'];
    if ($this->_sections['province']['total'] == 0)
        $this->_sections['province']['show'] = false;
} else
    $this->_sections['province']['total'] = 0;
if ($this->_sections['province']['show']):

            for ($this->_sections['province']['index'] = $this->_sections['province']['start'], $this->_sections['province']['iteration'] = 1;
                 $this->_sections['province']['iteration'] <= $this->_sections['province']['total'];
                 $this->_sections['province']['index'] += $this->_sections['province']['step'], $this->_sections['province']['iteration']++):
$this->_sections['province']['rownum'] = $this->_sections['province']['iteration'];
$this->_sections['province']['index_prev'] = $this->_sections['province']['index'] - $this->_sections['province']['step'];
$this->_sections['province']['index_next'] = $this->_sections['province']['index'] + $this->_sections['province']['step'];
$this->_sections['province']['first']      = ($this->_sections['province']['iteration'] == 1);
$this->_sections['province']['last']       = ($this->_sections['province']['iteration'] == $this->_sections['province']['total']);
?>
						             			<option value="<?php echo $this->_tpl_vars['allProvince'][$this->_sections['province']['index']]['province_id']; ?>
"><?php echo $this->_tpl_vars['allProvince'][$this->_sections['province']['index']]['province']; ?>
</option>
						             	<?php endfor; endif; ?>
				            		</select>
						            <select class="fl" name="university" datatype="*" nullmsg="请选择所属大学！" errormsg="请选择所属大学！" ov=<?php echo $this->_tpl_vars['university']; ?>
 ignore="ignore" id="niversity_select">
						             <option value="0">请选择院校</option>
						             <?php unset($this->_sections['university']);
$this->_sections['university']['name'] = 'university';
$this->_sections['university']['loop'] = is_array($_loop=$this->_tpl_vars['allUniversity']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['university']['show'] = true;
$this->_sections['university']['max'] = $this->_sections['university']['loop'];
$this->_sections['university']['step'] = 1;
$this->_sections['university']['start'] = $this->_sections['university']['step'] > 0 ? 0 : $this->_sections['university']['loop']-1;
if ($this->_sections['university']['show']) {
    $this->_sections['university']['total'] = $this->_sections['university']['loop'];
    if ($this->_sections['university']['total'] == 0)
        $this->_sections['university']['show'] = false;
} else
    $this->_sections['university']['total'] = 0;
if ($this->_sections['university']['show']):

            for ($this->_sections['university']['index'] = $this->_sections['university']['start'], $this->_sections['university']['iteration'] = 1;
                 $this->_sections['university']['iteration'] <= $this->_sections['university']['total'];
                 $this->_sections['university']['index'] += $this->_sections['university']['step'], $this->_sections['university']['iteration']++):
$this->_sections['university']['rownum'] = $this->_sections['university']['iteration'];
$this->_sections['university']['index_prev'] = $this->_sections['university']['index'] - $this->_sections['university']['step'];
$this->_sections['university']['index_next'] = $this->_sections['university']['index'] + $this->_sections['university']['step'];
$this->_sections['university']['first']      = ($this->_sections['university']['iteration'] == 1);
$this->_sections['university']['last']       = ($this->_sections['university']['iteration'] == $this->_sections['university']['total']);
?>
						             			<option value="<?php echo $this->_tpl_vars['allUniversity'][$this->_sections['university']['index']]['university_id']; ?>
"><?php echo $this->_tpl_vars['allUniversity'][$this->_sections['university']['index']]['university']; ?>
</option>
						             	<?php endfor; endif; ?>
						            </select>
				            </div>
				          	<div class="fl">
				             	<div class="Validform_checktip"></div>
				               <div class="info">请选择所属大学<span class="dec"><s class="dec1">&#9670;</s><s class="dec2">&#9670;</s></span></div>
				             </div>
				          </li>
				          <li class="clearfix lists">
				            <div class="fl">
				            	<span class="fl text_label">真实姓名：</span>
					             <input type="text" class="text fl" name="true_name" value="<?php echo $this->_tpl_vars['true_name']; ?>
"  datatype="s2-6"  errormsg="姓名至少2个字符,最多6个字符！" ignore="ignore"/>
				           		<?php echo $this->_tpl_vars['qq_error']; ?>

				            </div>
					         	<div class="fl">
				             	<div class="Validform_checktip"></div>
				               <div class="info">请输入姓名<span class="dec"><s class="dec1">&#9670;</s><s class="dec2">&#9670;</s></span></div>
				             </div>
				          </li>
				          <li class="clearfix lists">
				         	<div class="fl">
				         	 	  <span class="fl text_label">性　　别：</span>
				         	 	  <div class="fl ridio_right radio_wrap" ov="<?php echo $this->_tpl_vars['sex']; ?>
" >
				         	 	  	<label><input type="radio"  name="sex" class="radio" value="1"  datatype="*" nullmsg="性别 “ errormsg="请选择性别！！” ignore="ignore"/><span class="radio_span">男</span></label>
						         	  <label><input type="radio"  name="sex" class="radio" value="2"  datatype="*" nullmsg="性别 “ errormsg="请选择性别！！” ignore="ignore"/><span class="radio_span">女</span></label>
						         	  <label><input type="radio"  name="sex" class="radio" value="3"  datatype="*" nullmsg="性别 “ errormsg="请选择性别！！” ignore="ignore"/><span class="radio_span">其他</span></label>
				         	 	  </div>
				         	 	  <?php echo $this->_tpl_vars['sex_error']; ?>

				         	 </div>
					          <div class="fl">
				             	  <div class="Validform_checktip"></div>
				                <div class="info">请选择性别<span class="dec"><s class="dec1">&#9670;</s><s class="dec2">&#9670;</s></span></div>
				            </div>
				          </li>
				          <li class="clearfix lists">
				            <div class="fl">
				            		<span class="fl text_label">生　　日：</span>
					              <input type="text" class="text fl" name="birth_day" value="<?php echo $this->_tpl_vars['birth_day']; ?>
" onclick="WdatePicker()" ignore="ignore"/>
				            		<?php echo $this->_tpl_vars['birth_day_error']; ?>

				            </div>
				          </li>
				          <li class="lists"> 
				          	 <input type="submit" value="确认修改" name="submit" class="common_bg su_btn"/>
				          </li>
			        </ul>
			    </form>
			</div>
		</div>
	</div>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "front/include/footer.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>	
</div>
</body>
</html>