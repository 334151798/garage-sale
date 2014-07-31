<?php /* Smarty version 2.6.26, created on 2013-01-16 14:03:02
         compiled from front/user_center_collect.html */ ?>
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
	$(".page .user_center .left").height(MxHeight-310);
	
	//需求列表hover
	$(".page .user_center .right .infos .re_list_wrap .re_list dl.request_dl").hover(function (){
		$(this).css("background","#fff8f1");
	},function (){
		$(this).css("background","#fff");
	});
	
	//取消收藏
	$(".page .user_center .right .infos .re_list_wrap .re_list dd a.cancel_collect").click(function (e){
		e.preventDefault();
		var request_id = $(this).attr("request_id"),_this=$(this);
		//取消收藏，
		if(window.confirm('确认取消收藏吗？')){
			$.ajax({
			   type: "POST",
			   url: "<?php echo $this->_tpl_vars['front_url']; ?>
collect/delete/",
			   data: "request_id="+request_id,
			   success: function(msg){
				   if (msg==1){
					   TINY.box.show('取消成功！',0,0,0,0,3,null,'false');
					   _this.parents("dl.request_dl").replaceWith("");
				   }else{
					   document.write(msg);
				   }
			   }
			});
		}
	});
	
	/*
	 * 设置导航默认选中
	 */
	$(".page .user_center .left ul li").removeClass("active");
	$(".page .user_center .left ul li").eq(parseInt($(".page .user_center .left ul").attr("leftEq"))+1).addClass('active');
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
			<li><a href="<?php echo $this->_tpl_vars['front_url']; ?>
user/center.html">个人中心</a></li>
			<li class="college cur" title="">我的收藏</li>
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
			<h6>我的收藏</h6>
			<div class="infos">
				<ul class="request_head clearfix" >
					<li class="fl"><a href="" class="active">收藏的需求</a></li>
					<li class="fl"><a href="">收藏的推荐商品</a></li>
				</ul>
				<div class="re_list_wrap">
					<div class="re_list active">
					<?php if ($this->_tpl_vars['collectList']): ?>
						<?php unset($this->_sections['request']);
$this->_sections['request']['name'] = 'request';
$this->_sections['request']['loop'] = is_array($_loop=$this->_tpl_vars['collectList']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['request']['show'] = true;
$this->_sections['request']['max'] = $this->_sections['request']['loop'];
$this->_sections['request']['step'] = 1;
$this->_sections['request']['start'] = $this->_sections['request']['step'] > 0 ? 0 : $this->_sections['request']['loop']-1;
if ($this->_sections['request']['show']) {
    $this->_sections['request']['total'] = $this->_sections['request']['loop'];
    if ($this->_sections['request']['total'] == 0)
        $this->_sections['request']['show'] = false;
} else
    $this->_sections['request']['total'] = 0;
if ($this->_sections['request']['show']):

            for ($this->_sections['request']['index'] = $this->_sections['request']['start'], $this->_sections['request']['iteration'] = 1;
                 $this->_sections['request']['iteration'] <= $this->_sections['request']['total'];
                 $this->_sections['request']['index'] += $this->_sections['request']['step'], $this->_sections['request']['iteration']++):
$this->_sections['request']['rownum'] = $this->_sections['request']['iteration'];
$this->_sections['request']['index_prev'] = $this->_sections['request']['index'] - $this->_sections['request']['step'];
$this->_sections['request']['index_next'] = $this->_sections['request']['index'] + $this->_sections['request']['step'];
$this->_sections['request']['first']      = ($this->_sections['request']['iteration'] == 1);
$this->_sections['request']['last']       = ($this->_sections['request']['iteration'] == $this->_sections['request']['total']);
?>
							<dl class="clearfix  request_dl">
								<dt class="fl clearfix">
									<a href="<?php echo $this->_tpl_vars['front_url']; ?>
request/requestDetail/<?php echo $this->_tpl_vars['collectList'][$this->_sections['request']['index']]['id']; ?>
.html" class="fl left_thumbs" target="_blank"><img src="<?php echo $this->_tpl_vars['collectList'][$this->_sections['request']['index']]['thumbs']; ?>
" width="60" height="50" alt=""/></a>
									<div class="fl">
										<a href="<?php echo $this->_tpl_vars['front_url']; ?>
request/requestDetail/<?php echo $this->_tpl_vars['collectList'][$this->_sections['request']['index']]['id']; ?>
.html" target="_blank"><?php echo $this->_tpl_vars['collectList'][$this->_sections['request']['index']]['title']; ?>
</a>
										<span><?php echo $this->_tpl_vars['collectList'][$this->_sections['request']['index']]['publish_time']; ?>
</span>
									</div>
								</dt>
								<dd class="fr">
									<a href="javascript:void(0)" class="cancel_collect" request_id=<?php echo $this->_tpl_vars['collectList'][$this->_sections['request']['index']]['id']; ?>
>取消收藏</a>
								</dd>
							</dl>
						<?php endfor; endif; ?>
					<?php else: ?>
							<div>您没有收藏的需求！</div>
					<?php endif; ?>
					</div>
					<div class="re_list">
					<?php if ($this->_tpl_vars['deletedRequest'][0]['id']): ?>
						<?php unset($this->_sections['request']);
$this->_sections['request']['name'] = 'request';
$this->_sections['request']['loop'] = is_array($_loop=$this->_tpl_vars['deletedRequest']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['request']['show'] = true;
$this->_sections['request']['max'] = $this->_sections['request']['loop'];
$this->_sections['request']['step'] = 1;
$this->_sections['request']['start'] = $this->_sections['request']['step'] > 0 ? 0 : $this->_sections['request']['loop']-1;
if ($this->_sections['request']['show']) {
    $this->_sections['request']['total'] = $this->_sections['request']['loop'];
    if ($this->_sections['request']['total'] == 0)
        $this->_sections['request']['show'] = false;
} else
    $this->_sections['request']['total'] = 0;
if ($this->_sections['request']['show']):

            for ($this->_sections['request']['index'] = $this->_sections['request']['start'], $this->_sections['request']['iteration'] = 1;
                 $this->_sections['request']['iteration'] <= $this->_sections['request']['total'];
                 $this->_sections['request']['index'] += $this->_sections['request']['step'], $this->_sections['request']['iteration']++):
$this->_sections['request']['rownum'] = $this->_sections['request']['iteration'];
$this->_sections['request']['index_prev'] = $this->_sections['request']['index'] - $this->_sections['request']['step'];
$this->_sections['request']['index_next'] = $this->_sections['request']['index'] + $this->_sections['request']['step'];
$this->_sections['request']['first']      = ($this->_sections['request']['iteration'] == 1);
$this->_sections['request']['last']       = ($this->_sections['request']['iteration'] == $this->_sections['request']['total']);
?>
							
							<dl class="clearfix  request_dl">
								<dt class="fl clearfix">
									<a href="<?php echo $this->_tpl_vars['front_url']; ?>
request/requestDetail/<?php echo $this->_tpl_vars['deletedRequest'][$this->_sections['request']['index']]['id']; ?>
.html" class="fl left_thumbs" target="_blank"><img src="<?php echo $this->_tpl_vars['deletedRequest'][$this->_sections['request']['index']]['thumbs']; ?>
" width="60" height="50" alt=""/></a>
									<div class="fl">
										<a href="<?php echo $this->_tpl_vars['front_url']; ?>
request/requestDetail/<?php echo $this->_tpl_vars['deletedRequest'][$this->_sections['request']['index']]['id']; ?>
.html" target="_blank"><?php echo $this->_tpl_vars['deletedRequest'][$this->_sections['request']['index']]['title']; ?>
</a>
										<span><?php echo $this->_tpl_vars['deletedRequest'][$this->_sections['request']['index']]['publish_time']; ?>
</span>
									</div>
								</dt>
								<dd class="fr">
								</dd>
							</dl>
						<?php endfor; endif; ?>
					<?php else: ?>
							<div>您没有已删除的需求！</div>
					<?php endif; ?>
					</div>
				</div>
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