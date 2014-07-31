<?php /* Smarty version 2.6.26, created on 2012-10-21 17:42:32
         compiled from front/request_detail.html */ ?>
﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>2号店</title>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "front/include/common_include.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<link  type="text/css" rel="stylesheet" href="js/jqzoom/jquery.jqzoom.css">
<script src="js/jqzoom/jquery.jqzoom-core.js" type="text/javascript"></script>

<script type="text/javascript">
jQuery(function ($){
		$('.jqzoom').jqzoom({
            zoomType: 'standard',
            lens:true,
            preloadImages: false,
            alwaysOn:false
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
			<li><a href="<?php echo $this->_tpl_vars['front_url']; ?>
">首页</a></li>
			<li class="" title=""><a href="<?php echo $this->_tpl_vars['front_url']; ?>
request/index.html" class="need_university ">校园易物</a></li>
			<li class="cur">需求详细</li>
		</ul>
	</div>
	<div class="main w980 clearfix">
		<div class="product_detail wraps fl">
			<h1><?php echo $this->_tpl_vars['requestDetail']['title']; ?>
</h1>
			<ul class="tool clearfix">
				<li class="date common_bg" title="发布日期"><?php echo $this->_tpl_vars['requestDetail']['publish_time']; ?>
</li>
				<li class="views common_bg" title="浏览次数"><?php echo $this->_tpl_vars['requestDetail']['view_count']; ?>
</li>
				<li class="collect common_bg" title="">
				<?php if ($this->_tpl_vars['requestDetail']['hasCollect']): ?>
					<a href="javascript:void(0)" id="collect_btn" request_id=<?php echo $this->_tpl_vars['requestDetail']['id']; ?>
 status='0'>取消收藏</a>
				<?php else: ?>
					<a href="javascript:void(0)" id="collect_btn" request_id=<?php echo $this->_tpl_vars['requestDetail']['id']; ?>
 status='1'>收藏</a>
				<?php endif; ?>
				</li>
				<li><!-- Baidu Button BEGIN -->
				    <div id="bdshare" class="bdshare_t bds_tools get-codes-bdshare">
				        <span class="bds_more common_bg">分享到：</span>
				    </div>
				<script type="text/javascript" id="bdshare_js" data="type=tools" ></script>
				<script type="text/javascript" id="bdshell_js"></script>
				<script type="text/javascript">
					document.getElementById("bdshell_js").src = "http://share.baidu.com/static/js/shell_v2.js?cdnversion=" + new Date().getHours();
				</script>
				<!-- Baidu Button END -->
				</li>
				<li class="user common_bg" title="发布人">发布人：<?php echo $this->_tpl_vars['requestDetail']['user_name']; ?>
</li>
			</ul>
			<div class="text_wrap clearfix">
				<div class="left_img fl" id="left_img">
					<div class="clearfix imgs_w">
				        <?php if ($this->_tpl_vars['requestDetail']['thumbs'][0]): ?>
				          <a href="<?php echo $this->_tpl_vars['requestDetail']['thumbs'][0]; ?>
" class="jqzoom" rel='gal1'  title="triumph" >
				        	<img src="<?php echo $this->_tpl_vars['requestDetail']['thumbs'][0]; ?>
"  title="triumph" width="251" height="200">
				        <?php endif; ?>
				        </a>
				    </div>
					 <div class="clearfix thumb_wrap" >
						<ul id="thumblist" class="clearfix" >
						<?php $_from = $this->_tpl_vars['requestDetail']['thumbs_small']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['foo'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['foo']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['thumbPath']):
        $this->_foreach['foo']['iteration']++;
?>
						<?php if ($this->_tpl_vars['key'] == 0): ?>
								<li><a class="zoomThumbActive" href='javascript:void(0);' rel="{gallery: 'gal1', smallimage: '<?php echo $this->_tpl_vars['requestDetail']['thumbs'][$this->_tpl_vars['key']]; ?>
',largeimage: '<?php echo $this->_tpl_vars['requestDetail']['thumbs'][$this->_tpl_vars['key']]; ?>
'}"><img src='<?php echo $this->_tpl_vars['thumbPath']; ?>
' width="50" height="45"></a></li>
						<?php elseif ($this->_tpl_vars['key'] < 4): ?>
								<li><a class="" href='javascript:void(0);' rel="{gallery: 'gal1', smallimage: '<?php echo $this->_tpl_vars['requestDetail']['thumbs'][$this->_tpl_vars['key']]; ?>
',largeimage: '<?php echo $this->_tpl_vars['requestDetail']['thumbs'][$this->_tpl_vars['key']]; ?>
'}"><img src='<?php echo $this->_tpl_vars['thumbPath']; ?>
' width="50" height="45"></a></li>
						<?php endif; ?>
					  <?php endforeach; endif; unset($_from); ?>
						</ul>
					</div>
				</div>
				<ul  class="right_contact fl">
					<li>
						<span class="left_span">价　　格：</span>
						<strong class="high_light"><?php echo $this->_tpl_vars['requestDetail']['price']; ?>
元</strong>
					</li>
					<li>
						<span class="left_span">新旧程度：</span>
						<strong ><?php echo $this->_tpl_vars['requestDetail']['old_level_name']; ?>
</strong>
					</li>
					<li>
						<span class="left_span">所属院校：</span>
						<strong><?php echo $this->_tpl_vars['requestDetail']['university']; ?>
</strong>
					</li>
					<li>
						<span class="left_span">联&nbsp;系&nbsp;人：</span>
						<strong><?php echo $this->_tpl_vars['requestDetail']['contact_name']; ?>
</strong>
					</li>
					<li>
						<span class="left_span">联系方式：</span>
						<strong class="high_light"><?php echo $this->_tpl_vars['requestDetail']['telephone']; ?>
</strong>
					</li>
				</ul>
			</div>
			<div class="detail">
				<h6 class="de_title">
					<strong>物品详情</strong>
				</h6>
				<div class="inner_text">
				  <?php echo $this->_tpl_vars['requestDetail']['info']; ?>

				  <p><?php echo $this->_tpl_vars['contactinfo']; ?>
</p>
				  <?php $_from = $this->_tpl_vars['requestDetail']['thumbs']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['foo'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['foo']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['thumbPath']):
        $this->_foreach['foo']['iteration']++;
?>
				  	<img src="<?php echo $this->_tpl_vars['thumbPath']; ?>
" alt="2号店"/>
				  <?php endforeach; endif; unset($_from); ?>
				</div>
			</div>
		</div>
		<div class="inner_right wraps fr">
			<div class="release">
				<p class="text">有类似的需求？</p>
				<p class="re"><a href="<?php echo $this->_tpl_vars['front_url']; ?>
request/add/" class="common_bg out_text need_university">发布需求</a></p>
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