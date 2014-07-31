<?php /* Smarty version 2.6.26, created on 2012-09-23 01:15:15
         compiled from front/updateRequest.html */ ?>
﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>2号店修改需求</title>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "front/include/common_include.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<link href="css/jNice.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="js/uploadify/uploadify.css" type="text/css" />

<!-- JavaScripts-->
<script type="text/javascript" src="js/uploadify/jquery.uploadify-3.1.min.js"></script>
<script type="text/javascript" src="js/jNice.js"></script>
<script type="text/javascript" src="js/inputFocus.js"></script>
<script type="text/javascript" src="js/setSelectRadioCheckboxDefault.js"></script>
<script type="text/javascript" src="js/navLinkSelect.js"></script>
<script type="text/javascript" src="js/kindeditor-4.1/kindeditor-min.js"></script>
<script type="text/javascript" src="js/kindeditor-4.1/lang/zh_CN.js" charset="utf-8"></script>
<script type="text/javascript" src="js/validateForm.js"></script>
<script type="text/javascript" src="js/searchFocus.js"></script>
<script type="text/javascript" src="js/initialize_kindEditor.js"></script>
<script type="text/javascript" >
jQuery(function ($){
	/*开始图片上传*/
	
	//如果没有图片，就让那个div不显示
	function setUploadWrapDisplay(){
		if ($(".page .request .upload .upload_right ul li").length >0){
			$(".page .request .upload .upload_right").show();
		}else{
			$(".page .request .upload .upload_right").hide();
		}
	}
	
	//上传图片时，右上角的删除按钮js
	function delImgs(){
		var allCloseBtns = $(".close_light");
		$.each(allCloseBtns,function() {
			$(this).bind("mouseover",function() {
				$(this).css("background-position", "right top");
			});
			$(this).bind("mouseout",function() {
				$(this).css("background-position", "left top");
			});
			$(this).bind("click",function() {
				var _this=$(this);
				_this.parent().remove();
				setUploadWrapDisplay();
			});
		});
	}

	/*上传需求图片*/
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
	    'multi'         : true,
	    'onUploadStart' : function(file) {
	    	$('#article_imgs_upload').uploadify('settings','articleType','2');
	    },
       'onUploadSuccess' : function(file, data, response) {
	      //data=jQuery.parseJSON(data);
		    $("#articlePics").append("<li><input type='hidden' value="+data+" name='thumbs[]'/><img  src='" + data + "' width='100' height='100'/><em class='close_light' style='right:-4px;top:-2px;'></em></li>");
		    delImgs();
		    setUploadWrapDisplay();
	    }
	});

	//删除按钮
	delImgs();
	
	setUploadWrapDisplay();
	
	/*结束图片上传*/
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
			<li><a href="<?php echo $this->_tpl_vars['front_url']; ?>
">首页</a></li>
			<li class="" title=""><a href="<?php echo $this->_tpl_vars['front_url']; ?>
user/center/">个人中心</a></li>
			<li class="cur">修改需求</li>
		</ul>
	</div>
	<div class="request w980 wraps">	
	 <input type="hidden" value="<?php echo $this->_tpl_vars['admin_url']; ?>
" id="admin_url"/>
		<form action="<?php echo $this->_tpl_vars['front_url']; ?>
request/update/" class="" method="post" id="validateForm">
			<ul>
	         <li class="clearfix lists">
	         	<div class="fl radio_wrap" ov=<?php echo $this->_tpl_vars['requestDetail']['type']; ?>
>
	         	 	  <span class="fl text_label">供　　需：</span>
	         	 	  <div class="fl ridio_right">
	         	 	  	<label><input type="radio"  name="type" class="radio" value="1"  datatype="*" nullmsg="供需类型！" errormsg="请选择供需类型！！"/><span class="radio_span">转让</span></label>
			         	  <label><input type="radio"  name="type" class="radio" value="2"/><span class="radio_span">求购</span></label>
			         	  <label><input type="radio"  name="type" class="radio" value="3"/><span class="radio_span">招租</span></label>
	         	 	  </div>
	         	 </div>
		          <div class="fl">
	             	  <div class="Validform_checktip"></div>
	                <div class="info">请选择供需类型<span class="dec"><s class="dec1">&#9670;</s><s class="dec2">&#9670;</s></span></div>
	            </div>
	          </li>
	          <li class="clearfix lists " id="setSelectWrap">
	            <div class="fl">
	            	<span class="fl text_label">需求类别：</span>
		             <select class="fl main_nav" name="column" datatype="*" nullmsg="请选择需求类别！" errormsg="请选择需求类别！" ov=<?php echo $this->_tpl_vars['requestDetail']['column']; ?>
>
		             	<option value="">请选择需求类别</option>
		             	<?php unset($this->_sections['nav']);
$this->_sections['nav']['name'] = 'nav';
$this->_sections['nav']['loop'] = is_array($_loop=$this->_tpl_vars['allMainColumn']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['nav']['show'] = true;
$this->_sections['nav']['max'] = $this->_sections['nav']['loop'];
$this->_sections['nav']['step'] = 1;
$this->_sections['nav']['start'] = $this->_sections['nav']['step'] > 0 ? 0 : $this->_sections['nav']['loop']-1;
if ($this->_sections['nav']['show']) {
    $this->_sections['nav']['total'] = $this->_sections['nav']['loop'];
    if ($this->_sections['nav']['total'] == 0)
        $this->_sections['nav']['show'] = false;
} else
    $this->_sections['nav']['total'] = 0;
if ($this->_sections['nav']['show']):

            for ($this->_sections['nav']['index'] = $this->_sections['nav']['start'], $this->_sections['nav']['iteration'] = 1;
                 $this->_sections['nav']['iteration'] <= $this->_sections['nav']['total'];
                 $this->_sections['nav']['index'] += $this->_sections['nav']['step'], $this->_sections['nav']['iteration']++):
$this->_sections['nav']['rownum'] = $this->_sections['nav']['iteration'];
$this->_sections['nav']['index_prev'] = $this->_sections['nav']['index'] - $this->_sections['nav']['step'];
$this->_sections['nav']['index_next'] = $this->_sections['nav']['index'] + $this->_sections['nav']['step'];
$this->_sections['nav']['first']      = ($this->_sections['nav']['iteration'] == 1);
$this->_sections['nav']['last']       = ($this->_sections['nav']['iteration'] == $this->_sections['nav']['total']);
?>
		             			<option value="<?php echo $this->_tpl_vars['allMainColumn'][$this->_sections['nav']['index']]['id']; ?>
"><?php echo $this->_tpl_vars['allMainColumn'][$this->_sections['nav']['index']]['nav_name']; ?>
</option>
		             	<?php endfor; endif; ?>
		             </select>
		             <select class="fl sub_nav sub_select" name="nav" ov=<?php echo $this->_tpl_vars['requestDetail']['nav']; ?>
>
		             <option value="">请选择二级类别</option>
		             </select>
	            </div>
	          	<div class="fl">
	           		<div class="Validform_checktip"></div>
	              <div class="info">请选择需求类别<span class="dec"><s class="dec1">&#9670;</s><s class="dec2">&#9670;</s></span></div>
	            </div>
	          </li>
	          <li class="clearfix lists " id="brandSelectWrap">
	             <div class="fl">
	             	  <span class="fl text_label">物品品牌：</span>
			             <select class="fl main_nav" name="brand_main" datatype="*" nullmsg="请选择物品品牌！" errormsg="请选择物品品牌！" ov=<?php echo $this->_tpl_vars['requestDetail']['brand_main']; ?>
>
			             <option value="">请选择物品品牌</option>
			             	<?php unset($this->_sections['brand']);
$this->_sections['brand']['name'] = 'brand';
$this->_sections['brand']['loop'] = is_array($_loop=$this->_tpl_vars['allMainBrand']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['brand']['show'] = true;
$this->_sections['brand']['max'] = $this->_sections['brand']['loop'];
$this->_sections['brand']['step'] = 1;
$this->_sections['brand']['start'] = $this->_sections['brand']['step'] > 0 ? 0 : $this->_sections['brand']['loop']-1;
if ($this->_sections['brand']['show']) {
    $this->_sections['brand']['total'] = $this->_sections['brand']['loop'];
    if ($this->_sections['brand']['total'] == 0)
        $this->_sections['brand']['show'] = false;
} else
    $this->_sections['brand']['total'] = 0;
if ($this->_sections['brand']['show']):

            for ($this->_sections['brand']['index'] = $this->_sections['brand']['start'], $this->_sections['brand']['iteration'] = 1;
                 $this->_sections['brand']['iteration'] <= $this->_sections['brand']['total'];
                 $this->_sections['brand']['index'] += $this->_sections['brand']['step'], $this->_sections['brand']['iteration']++):
$this->_sections['brand']['rownum'] = $this->_sections['brand']['iteration'];
$this->_sections['brand']['index_prev'] = $this->_sections['brand']['index'] - $this->_sections['brand']['step'];
$this->_sections['brand']['index_next'] = $this->_sections['brand']['index'] + $this->_sections['brand']['step'];
$this->_sections['brand']['first']      = ($this->_sections['brand']['iteration'] == 1);
$this->_sections['brand']['last']       = ($this->_sections['brand']['iteration'] == $this->_sections['brand']['total']);
?>
			             			<option value="<?php echo $this->_tpl_vars['allMainBrand'][$this->_sections['brand']['index']]['id']; ?>
"><?php echo $this->_tpl_vars['allMainBrand'][$this->_sections['brand']['index']]['brand_name']; ?>
</option>
			             	<?php endfor; endif; ?>
			             </select>
			             <select class="fl sub_nav sub_select" name="brand_sub" ov=<?php echo $this->_tpl_vars['requestDetail']['brand_sub']; ?>
>
			             <option value="">请选择具体型号</option>
			             </select>
			             <?php echo $this->_tpl_vars['pid_error']; ?>

	             </div>
	             <div class="fl">
	           		<div class="Validform_checktip"></div>
	              <div class="info">请选择物品品牌<span class="dec"><s class="dec1">&#9670;</s><s class="dec2">&#9670;</s></span></div>
	            </div>
	          </li>
	          <li class="clearfix lists">
	            <div class="fl">
	            	<span class="fl text_label">新旧程度：</span>
	          		<select name="old_level" class="fl" datatype="*" nullmsg="请选择新旧程度！" errormsg="请选择新旧程度！ ov=<?php echo $this->_tpl_vars['requestDetail']['old_level']; ?>
>
	           			<option value="">请选择新旧程度</option>
	           			<option value="1">全新</option>
	           			<option value="2" selected="selected">95成新</option>
	           			<option value="3">9成新</option>
	           			<option value="4">85成新</option>
	           			<option value="5">8成新</option>
	           			<option value="6">7成新及以下</option>
		            </select>
	             <?php echo $this->_tpl_vars['pid_error']; ?>

	            </div>
	          	<div class="fl">
	           		<div class="Validform_checktip"></div>
	              <div class="info">请选择新旧程度<span class="dec"><s class="dec1">&#9670;</s><s class="dec2">&#9670;</s></span></div>
	            </div>	
	          </li>
	          <li class="clearfix lists">
	            <div class="fl">
	            	<span class="fl text_label">标　　题：</span>
	              <input type="text" class="text fl" name="title" value="<?php echo $this->_tpl_vars['requestDetail']['title']; ?>
" datatype="s5-35"  errormsg="标题至少5个字符,最多35个字符！"/>
	             <?php echo $this->_tpl_vars['title_error']; ?>

	            </div>
	             <div class="fl">
	             	<div class="Validform_checktip"></div>
	               <div class="info">标题至少5个字符,最多35个字符<span class="dec"><s class="dec1">&#9670;</s><s class="dec2">&#9670;</s></span></div>
	             </div>
	          </li>
	          <li class="clearfix lists">
	            <div class="fl">
	            	 <span class="fl text_label">期望价格：</span>
	               <input type="text" class="text fl" name="price" value="<?php echo $this->_tpl_vars['requestDetail']['price']; ?>
" datatype="n1-6"  errormsg="价格为1-6位数字"/>
	               <span class="fl text_label ml10">元</span>
	              <?php echo $this->_tpl_vars['price_error']; ?>

	            </div>
	            <div class="fl">
	           		<div class="Validform_checktip"></div>
	              <div class="info">请输入期望价格<span class="dec"><s class="dec1">&#9670;</s><s class="dec2">&#9670;</s></span></div>
	            </div>
	          </li>
	          <li class="clearfix lists info_li">
	            <div class="fl">
	            	<span class="fl text_label">补充说明：</span>
			         	<textarea rows="1" cols="1" name="info" ><?php echo $this->_tpl_vars['requestDetail']['info']; ?>
</textarea>
			         	<?php echo $this->_tpl_vars['info_error']; ?>

	            </div>
		        <div class="fl">
	             	<div class="Validform_checktip"></div>
	               <div class="info">补充说明至少5个字符,最多2000个字符<span class="dec"><s class="dec1">&#9670;</s><s class="dec2">&#9670;</s></span></div>
	            </div>
	          </li>	
	          <li class="clearfix lists upload">
	          	<div class="upload_btns clearfix">
	            	<span class="fl text_label">上传图片：</span>
		         	<input id="article_imgs_upload" name="" type="file" /> 
	            </div>
	            <div class="upload_right" id="">
								<ul id="articlePics" ov=<?php echo $this->_tpl_vars['requestDetail']['thumbs']; ?>
>
								</ul>
							</div>	
	          </li>	
	          <li class="clearfix lists">
	            <div class="fl">
	            	<span class="fl text_label">　联系人：</span>
		             <input type="text" class="text fl" name="contact_name" value="<?php echo $this->_tpl_vars['requestDetail']['contact_name']; ?>
"  datatype="s2-10"  errormsg="联系人名字至少2个字符,最多10个字符！"/>
			         	<?php echo $this->_tpl_vars['contact_name_error']; ?>

	            </div>
		         	<div class="fl">
	             	<div class="Validform_checktip"></div>
	               <div class="info">请输入联系人姓名<span class="dec"><s class="dec1">&#9670;</s><s class="dec2">&#9670;</s></span></div>
	             </div>
	          </li>
	          <li class="clearfix lists">
		          <div class="fl">
		          	<span class="fl text_label">联系电话：</span>
		             <input type="text" class="text fl" name="telephone" value="<?php echo $this->_tpl_vars['requestDetail']['telephone']; ?>
" datatype="m" nullmsg="请输入您的手机号码！" errormsg="请输入您的手机号码！"/>
		          </div>
		         	<div class="fl">
	            	<div class="Validform_checktip"></div>
	              <div class="info">请输入您的手机号码<span class="dec"><s class="dec1">&#9670;</s><s class="dec2">&#9670;</s></span></div>
	            </div>
	          </li>
	          <li class="lists"> 
	             <input type="hidden" value="<?php echo $this->_tpl_vars['requestDetail']['id']; ?>
" name="id"/>
	          	 <input type="submit" value="提交" name="submit" class="common_bg su_btn"/>
	          </li>
	       </ul>
	    </form>
	</div>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "front/include/footer.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
</div>
</body>
</html>