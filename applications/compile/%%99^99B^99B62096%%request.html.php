<?php /* Smarty version 2.6.26, created on 2012-10-21 17:46:06
         compiled from front/request.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'default', 'front/request.html', 33, false),array('modifier', 'mb_truncate', 'front/request.html', 114, false),)), $this); ?>
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
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "front/include/ie6png.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<script type="text/javascript" >
jQuery(function ($){
	//设置筛选的选中状态
	$("#choose_wrap ul li.inner_ul ul").each(function (){
		$(this).find("a").removeClass("selected");
		$(this).find("a[default="+$(this).attr("ov")+"]").addClass("selected");
	});
});
</script>
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
			<li class="cur">校园易物</li>
		</ul>
	</div>
	<div class="choose wraps w980" id="choose_wrap">
		<ul class="clearfix wrap_ul">
			<li class="left_li fl">　　类别：</li>
			<li class="inner_ul fl" >
				<ul class="clearfix" ov="<?php echo ((is_array($_tmp=@$this->_tpl_vars['cur_nav'])) ? $this->_run_mod_handler('default', true, $_tmp, 0) : smarty_modifier_default($_tmp, 0)); ?>
">
					<li class=" fl">
						<a href="<?php echo $this->_tpl_vars['front_url']; ?>
request/index/?nav=0&old_level=<?php echo ((is_array($_tmp=@$this->_tpl_vars['cur_oldLevel'])) ? $this->_run_mod_handler('default', true, $_tmp, 0) : smarty_modifier_default($_tmp, 0)); ?>
&brand=<?php echo ((is_array($_tmp=@$this->_tpl_vars['cur_brand'])) ? $this->_run_mod_handler('default', true, $_tmp, 0) : smarty_modifier_default($_tmp, 0)); ?>
&price=<?php echo ((is_array($_tmp=@$this->_tpl_vars['cur_price'])) ? $this->_run_mod_handler('default', true, $_tmp, 0) : smarty_modifier_default($_tmp, 0)); ?>
" class="selected" default="0">全部</a>
					</li>
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
				    <li class=" fl">
							<a href="<?php echo $this->_tpl_vars['front_url']; ?>
request/index/?nav=<?php echo $this->_tpl_vars['allMainColumn'][$this->_sections['nav']['index']]['id']; ?>
&old_level=<?php echo ((is_array($_tmp=@$this->_tpl_vars['cur_oldLevel'])) ? $this->_run_mod_handler('default', true, $_tmp, 0) : smarty_modifier_default($_tmp, 0)); ?>
&brand=<?php echo ((is_array($_tmp=@$this->_tpl_vars['cur_brand'])) ? $this->_run_mod_handler('default', true, $_tmp, 0) : smarty_modifier_default($_tmp, 0)); ?>
&price=<?php echo ((is_array($_tmp=@$this->_tpl_vars['cur_price'])) ? $this->_run_mod_handler('default', true, $_tmp, 0) : smarty_modifier_default($_tmp, 0)); ?>
" default="<?php echo $this->_tpl_vars['allMainColumn'][$this->_sections['nav']['index']]['id']; ?>
"><?php echo $this->_tpl_vars['allMainColumn'][$this->_sections['nav']['index']]['column_name']; ?>
</a>
						</li>
           <?php endfor; endif; ?>
				</ul>
			</li>
		</ul>
		<ul class="clearfix wrap_ul">
			<li class="left_li fl">新旧程度：</li>
			<li class="inner_ul fl" >
				<ul class="clearfix" ov="<?php echo ((is_array($_tmp=@$this->_tpl_vars['cur_oldLevel'])) ? $this->_run_mod_handler('default', true, $_tmp, 0) : smarty_modifier_default($_tmp, 0)); ?>
">
					<li class=" fl">
						<a href="<?php echo $this->_tpl_vars['front_url']; ?>
request/index/?nav=<?php echo ((is_array($_tmp=@$this->_tpl_vars['cur_nav'])) ? $this->_run_mod_handler('default', true, $_tmp, 0) : smarty_modifier_default($_tmp, 0)); ?>
&old_level=0&brand=<?php echo ((is_array($_tmp=@$this->_tpl_vars['cur_brand'])) ? $this->_run_mod_handler('default', true, $_tmp, 0) : smarty_modifier_default($_tmp, 0)); ?>
&price=<?php echo ((is_array($_tmp=@$this->_tpl_vars['cur_price'])) ? $this->_run_mod_handler('default', true, $_tmp, 0) : smarty_modifier_default($_tmp, 0)); ?>
"  class="selected" default="0">全部</a>
					</li>
					<li class=" fl">
						<a href="<?php echo $this->_tpl_vars['front_url']; ?>
request/index/?nav=<?php echo ((is_array($_tmp=@$this->_tpl_vars['cur_nav'])) ? $this->_run_mod_handler('default', true, $_tmp, 0) : smarty_modifier_default($_tmp, 0)); ?>
&old_level=1&brand=<?php echo ((is_array($_tmp=@$this->_tpl_vars['cur_brand'])) ? $this->_run_mod_handler('default', true, $_tmp, 0) : smarty_modifier_default($_tmp, 0)); ?>
&price=<?php echo ((is_array($_tmp=@$this->_tpl_vars['cur_price'])) ? $this->_run_mod_handler('default', true, $_tmp, 0) : smarty_modifier_default($_tmp, 0)); ?>
" default="1">全新</a>
					</li>
					<li class=" fl">
						<a href="<?php echo $this->_tpl_vars['front_url']; ?>
request/index/?nav=<?php echo ((is_array($_tmp=@$this->_tpl_vars['cur_nav'])) ? $this->_run_mod_handler('default', true, $_tmp, 0) : smarty_modifier_default($_tmp, 0)); ?>
&old_level=2&brand=<?php echo ((is_array($_tmp=@$this->_tpl_vars['cur_brand'])) ? $this->_run_mod_handler('default', true, $_tmp, 0) : smarty_modifier_default($_tmp, 0)); ?>
&price=<?php echo ((is_array($_tmp=@$this->_tpl_vars['cur_price'])) ? $this->_run_mod_handler('default', true, $_tmp, 0) : smarty_modifier_default($_tmp, 0)); ?>
" default="2">95成新</a>
					</li>
					<li class=" fl">
						<a href="<?php echo $this->_tpl_vars['front_url']; ?>
request/index/?nav=<?php echo ((is_array($_tmp=@$this->_tpl_vars['cur_nav'])) ? $this->_run_mod_handler('default', true, $_tmp, 0) : smarty_modifier_default($_tmp, 0)); ?>
&old_level=3&brand=<?php echo ((is_array($_tmp=@$this->_tpl_vars['cur_brand'])) ? $this->_run_mod_handler('default', true, $_tmp, 0) : smarty_modifier_default($_tmp, 0)); ?>
&price=<?php echo ((is_array($_tmp=@$this->_tpl_vars['cur_price'])) ? $this->_run_mod_handler('default', true, $_tmp, 0) : smarty_modifier_default($_tmp, 0)); ?>
" default="3">9成新</a>
					</li>
					<li class=" fl">
						<a href="<?php echo $this->_tpl_vars['front_url']; ?>
request/index/?nav=<?php echo ((is_array($_tmp=@$this->_tpl_vars['cur_nav'])) ? $this->_run_mod_handler('default', true, $_tmp, 0) : smarty_modifier_default($_tmp, 0)); ?>
&old_level=4&brand=<?php echo ((is_array($_tmp=@$this->_tpl_vars['cur_brand'])) ? $this->_run_mod_handler('default', true, $_tmp, 0) : smarty_modifier_default($_tmp, 0)); ?>
&price=<?php echo ((is_array($_tmp=@$this->_tpl_vars['cur_price'])) ? $this->_run_mod_handler('default', true, $_tmp, 0) : smarty_modifier_default($_tmp, 0)); ?>
" default="4">85成新</a>
					</li>
					<li class=" fl">
						<a href="<?php echo $this->_tpl_vars['front_url']; ?>
request/index/?nav=<?php echo ((is_array($_tmp=@$this->_tpl_vars['cur_nav'])) ? $this->_run_mod_handler('default', true, $_tmp, 0) : smarty_modifier_default($_tmp, 0)); ?>
&old_level=5&brand=<?php echo ((is_array($_tmp=@$this->_tpl_vars['cur_brand'])) ? $this->_run_mod_handler('default', true, $_tmp, 0) : smarty_modifier_default($_tmp, 0)); ?>
&price=<?php echo ((is_array($_tmp=@$this->_tpl_vars['cur_price'])) ? $this->_run_mod_handler('default', true, $_tmp, 0) : smarty_modifier_default($_tmp, 0)); ?>
" default="5">8成新</a>
					</li>
					<li class=" fl">
						<a href="<?php echo $this->_tpl_vars['front_url']; ?>
request/index/?nav=<?php echo ((is_array($_tmp=@$this->_tpl_vars['cur_nav'])) ? $this->_run_mod_handler('default', true, $_tmp, 0) : smarty_modifier_default($_tmp, 0)); ?>
&old_level=6&brand=<?php echo ((is_array($_tmp=@$this->_tpl_vars['cur_brand'])) ? $this->_run_mod_handler('default', true, $_tmp, 0) : smarty_modifier_default($_tmp, 0)); ?>
&price=<?php echo ((is_array($_tmp=@$this->_tpl_vars['cur_price'])) ? $this->_run_mod_handler('default', true, $_tmp, 0) : smarty_modifier_default($_tmp, 0)); ?>
" default="6">7成新及以下</a>
					</li>
				</ul>
			</li>
		</ul>
		<ul class="clearfix wrap_ul">
			<li class="left_li fl">　　品牌：</li> 
			<li class="inner_ul fl" >
				<ul class="clearfix" ov="<?php echo ((is_array($_tmp=@$this->_tpl_vars['cur_brand'])) ? $this->_run_mod_handler('default', true, $_tmp, 0) : smarty_modifier_default($_tmp, 0)); ?>
">
					<li class=" fl">
						<a href="<?php echo $this->_tpl_vars['front_url']; ?>
request/index/?nav=<?php echo ((is_array($_tmp=@$this->_tpl_vars['cur_nav'])) ? $this->_run_mod_handler('default', true, $_tmp, 0) : smarty_modifier_default($_tmp, 0)); ?>
&old_level=<?php echo ((is_array($_tmp=@$this->_tpl_vars['cur_oldLevel'])) ? $this->_run_mod_handler('default', true, $_tmp, 0) : smarty_modifier_default($_tmp, 0)); ?>
&brand=0&price=<?php echo ((is_array($_tmp=@$this->_tpl_vars['cur_price'])) ? $this->_run_mod_handler('default', true, $_tmp, 0) : smarty_modifier_default($_tmp, 0)); ?>
" class="selected" default="0">全部</a>
					</li>
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
				    <li class=" fl">
							<a href="<?php echo $this->_tpl_vars['front_url']; ?>
request/index/?nav=<?php echo ((is_array($_tmp=@$this->_tpl_vars['cur_nav'])) ? $this->_run_mod_handler('default', true, $_tmp, 0) : smarty_modifier_default($_tmp, 0)); ?>
&old_level=<?php echo ((is_array($_tmp=@$this->_tpl_vars['cur_oldLevel'])) ? $this->_run_mod_handler('default', true, $_tmp, 0) : smarty_modifier_default($_tmp, 0)); ?>
&brand=<?php echo $this->_tpl_vars['allMainBrand'][$this->_sections['brand']['index']]['id']; ?>
&price=<?php echo ((is_array($_tmp=@$this->_tpl_vars['cur_price'])) ? $this->_run_mod_handler('default', true, $_tmp, 0) : smarty_modifier_default($_tmp, 0)); ?>
" default="<?php echo $this->_tpl_vars['allMainBrand'][$this->_sections['brand']['index']]['id']; ?>
"><?php echo $this->_tpl_vars['allMainBrand'][$this->_sections['brand']['index']]['brand_name']; ?>
</a>
						</li>
           <?php endfor; endif; ?>
				</ul>
			</li>
		</ul>
		<ul class="clearfix wrap_ul">
			<li class="left_li fl">　　价格：</li>
			<li class="inner_ul fl" >
				<ul class="clearfix" ov="<?php echo ((is_array($_tmp=@$this->_tpl_vars['cur_price'])) ? $this->_run_mod_handler('default', true, $_tmp, 0) : smarty_modifier_default($_tmp, 0)); ?>
">
					<li class=" fl">
						<a href="<?php echo $this->_tpl_vars['front_url']; ?>
request/index/?nav=<?php echo ((is_array($_tmp=@$this->_tpl_vars['cur_nav'])) ? $this->_run_mod_handler('default', true, $_tmp, 0) : smarty_modifier_default($_tmp, 0)); ?>
&old_level=<?php echo ((is_array($_tmp=@$this->_tpl_vars['cur_oldLevel'])) ? $this->_run_mod_handler('default', true, $_tmp, 0) : smarty_modifier_default($_tmp, 0)); ?>
&brand=<?php echo ((is_array($_tmp=@$this->_tpl_vars['cur_brand'])) ? $this->_run_mod_handler('default', true, $_tmp, 0) : smarty_modifier_default($_tmp, 0)); ?>
&price=0" class="selected" default="0">全部</a>
					</li>
					<?php unset($this->_sections['price']);
$this->_sections['price']['name'] = 'price';
$this->_sections['price']['loop'] = is_array($_loop=$this->_tpl_vars['allPrice']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['price']['show'] = true;
$this->_sections['price']['max'] = $this->_sections['price']['loop'];
$this->_sections['price']['step'] = 1;
$this->_sections['price']['start'] = $this->_sections['price']['step'] > 0 ? 0 : $this->_sections['price']['loop']-1;
if ($this->_sections['price']['show']) {
    $this->_sections['price']['total'] = $this->_sections['price']['loop'];
    if ($this->_sections['price']['total'] == 0)
        $this->_sections['price']['show'] = false;
} else
    $this->_sections['price']['total'] = 0;
if ($this->_sections['price']['show']):

            for ($this->_sections['price']['index'] = $this->_sections['price']['start'], $this->_sections['price']['iteration'] = 1;
                 $this->_sections['price']['iteration'] <= $this->_sections['price']['total'];
                 $this->_sections['price']['index'] += $this->_sections['price']['step'], $this->_sections['price']['iteration']++):
$this->_sections['price']['rownum'] = $this->_sections['price']['iteration'];
$this->_sections['price']['index_prev'] = $this->_sections['price']['index'] - $this->_sections['price']['step'];
$this->_sections['price']['index_next'] = $this->_sections['price']['index'] + $this->_sections['price']['step'];
$this->_sections['price']['first']      = ($this->_sections['price']['iteration'] == 1);
$this->_sections['price']['last']       = ($this->_sections['price']['iteration'] == $this->_sections['price']['total']);
?>
			    <li class=" fl">
						<a href="<?php echo $this->_tpl_vars['front_url']; ?>
request/index/?nav=<?php echo ((is_array($_tmp=@$this->_tpl_vars['cur_nav'])) ? $this->_run_mod_handler('default', true, $_tmp, 0) : smarty_modifier_default($_tmp, 0)); ?>
&old_level=<?php echo ((is_array($_tmp=@$this->_tpl_vars['cur_oldLevel'])) ? $this->_run_mod_handler('default', true, $_tmp, 0) : smarty_modifier_default($_tmp, 0)); ?>
&brand=<?php echo ((is_array($_tmp=@$this->_tpl_vars['cur_brand'])) ? $this->_run_mod_handler('default', true, $_tmp, 0) : smarty_modifier_default($_tmp, 0)); ?>
&price=<?php echo $this->_tpl_vars['allPrice'][$this->_sections['price']['index']]['price_start']; ?>
_<?php echo $this->_tpl_vars['allPrice'][$this->_sections['price']['index']]['price_end']; ?>
" default="<?php echo $this->_tpl_vars['allPrice'][$this->_sections['price']['index']]['price_start']; ?>
_<?php echo $this->_tpl_vars['allPrice'][$this->_sections['price']['index']]['price_end']; ?>
"><?php if ($this->_tpl_vars['allPrice'][$this->_sections['price']['index']]['price_start'] && $this->_tpl_vars['allPrice'][$this->_sections['price']['index']]['price_end']): ?><?php echo $this->_tpl_vars['allPrice'][$this->_sections['price']['index']]['price_start']; ?>
-<?php echo $this->_tpl_vars['allPrice'][$this->_sections['price']['index']]['price_end']; ?>
元<?php elseif ($this->_tpl_vars['allPrice'][$this->_sections['price']['index']]['price_end'] && ! $this->_tpl_vars['allPrice'][$this->_sections['price']['index']]['price_start']): ?><?php echo $this->_tpl_vars['allPrice'][$this->_sections['price']['index']]['price_end']; ?>
元以下<?php else: ?><?php echo $this->_tpl_vars['allPrice'][$this->_sections['price']['index']]['price_start']; ?>
元以上<?php endif; ?></a>
					</li>
          <?php endfor; endif; ?>
				</ul>
			</li>
		</ul>
	</div>
	<div class="main w980 clearfix">
		<div class="hot fl">
			<ul class="hot_list_ul">
					<?php if ($this->_tpl_vars['requestList']): ?>
	 	   			<?php unset($this->_sections['request']);
$this->_sections['request']['name'] = 'request';
$this->_sections['request']['loop'] = is_array($_loop=$this->_tpl_vars['requestList']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
	        	  <li class="hot_list_li clearfix wraps">
		            <div class="img fl">
		              <a href="<?php echo $this->_tpl_vars['front_url']; ?>
request/requestDetail/<?php echo $this->_tpl_vars['requestList'][$this->_sections['request']['index']]['id']; ?>
.html" target="_blank" ><img src="<?php echo $this->_tpl_vars['requestList'][$this->_sections['request']['index']]['thumbs']; ?>
" width="240" height="160" /></a>
		            </div>
		            <div class="text fl">
		            	<h4><a href="<?php echo $this->_tpl_vars['front_url']; ?>
request/requestDetail/<?php echo $this->_tpl_vars['requestList'][$this->_sections['request']['index']]['id']; ?>
.html" target="_blank" class="f44" title="<?php echo $this->_tpl_vars['requestList'][$this->_sections['request']['index']]['title']; ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['requestList'][$this->_sections['request']['index']]['title'])) ? $this->_run_mod_handler('mb_truncate', true, $_tmp, 38) : smarty_modifier_mb_truncate($_tmp, 38)); ?>
</a></h4>
		            	<p class="pirce ">Price:<span class="num">￥<?php echo $this->_tpl_vars['requestList'][$this->_sections['request']['index']]['price']; ?>
元</span></p>
		              <span class="time"><?php if ($this->_tpl_vars['requestList'][$this->_sections['request']['index']]['from_days'] != 0): ?><?php echo $this->_tpl_vars['requestList'][$this->_sections['request']['index']]['from_days']; ?>
 days ago<?php else: ?>Today <?php endif; ?>&middot; by <?php echo $this->_tpl_vars['requestList'][$this->_sections['request']['index']]['user_name']; ?>
 &middot; <?php echo $this->_tpl_vars['requestList'][$this->_sections['request']['index']]['view_count']; ?>
 views</span>
			            <div class="tags">Tags: <?php echo $this->_tpl_vars['requestList'][$this->_sections['request']['index']]['university']; ?>
, <a href="<?php echo $this->_tpl_vars['front_url']; ?>
request/index/?nav=<?php echo ((is_array($_tmp=@$this->_tpl_vars['cur_nav'])) ? $this->_run_mod_handler('default', true, $_tmp, 0) : smarty_modifier_default($_tmp, 0)); ?>
&old_level=<?php echo ((is_array($_tmp=@$this->_tpl_vars['cur_oldLevel'])) ? $this->_run_mod_handler('default', true, $_tmp, 0) : smarty_modifier_default($_tmp, 0)); ?>
&brand=<?php echo $this->_tpl_vars['requestList'][$this->_sections['request']['index']]['brand_main']; ?>
&price=<?php echo ((is_array($_tmp=@$this->_tpl_vars['cur_price'])) ? $this->_run_mod_handler('default', true, $_tmp, 0) : smarty_modifier_default($_tmp, 0)); ?>
"><?php echo $this->_tpl_vars['requestList'][$this->_sections['request']['index']]['brand_name']; ?>
</a></div>
			            <p><?php echo ((is_array($_tmp=$this->_tpl_vars['requestList'][$this->_sections['request']['index']]['info'])) ? $this->_run_mod_handler('mb_truncate', true, $_tmp, 135) : smarty_modifier_mb_truncate($_tmp, 135)); ?>
</p>
		            </div>
		          </li>
		          <?php endfor; endif; ?>
					<?php else: ?>
								<li class="hot_list_li clearfix wraps no_result">
			            	该学校暂时没有需求，<a href="<?php echo $this->_tpl_vars['front_url']; ?>
request/add.html" >发布需求</a>
			          </li>
					<?php endif; ?>

	       </ul>
	       <?php echo $this->_tpl_vars['pageFen']; ?>

		</div>
		<div class="right wraps fr request_right">
		  <div class="release">
				<p class="text">有类似的需求？</p>
				<p class="re"><a href="<?php echo $this->_tpl_vars['front_url']; ?>
request/add.html" class="common_bg out_text need_university">发布需求</a></p>
			</div>
		</div>
		<div class="right wraps fr request_right">
			<div class="recommend">
				<h3>本周推荐</h3>
				<dl class="rec_dl">
					<dt><a href="javascript:void(0)"><img src="images/recom_img1.jpg" width="240" height="130" alt="本期热门推荐"/></a></dt>
					<dd>
						<h6><a href="javascript:void(0)">新学期要穿什么衣服</a></h6>
						<p><a href="javascript:void(0)">九月来了，哦耶，新的一学期驾到了！新学期要有新气象，应首先从穿衣打扮开始，MM们想好要穿什么了吗?是时尚舒适的卫衣，还是百搭自在的T恤，或者选择一件连衣裙来提升气质，当然也可以用风衣来增强气场，保持足够的时尚度，成为校园里的一道靓丽风景。</a></p>
					</dd>
				</dl>
				<dl class="list_dl clearfix">
					<dt class="fl"><a href="javascript:void(0)"><img src="images/re_small1.jpg" width="60" height="60" alt="本期热门推荐"/></a></dt>
					<dd class="fl">
						<h6><a href="javascript:void(0)">新学期要穿什么衣服新学期要穿什么衣服</a></h6>
						<p><a href="javascript:void(0)">九月来了，哦耶，新的一学期驾到了！新学期要有新气象，应首先从穿衣打扮开始，MM们想好要穿什么了吗?是时尚舒适的卫衣，还是百搭自在的T恤，或者选择一件连衣裙来提升气质，当然也可以用风衣来增强气场，保持足够的时尚度，成为校园里的一道靓丽风景。</a></p>
					</dd>
				</dl>
				<dl class="list_dl clearfix">
					<dt class="fl"><a href="javascript:void(0)"><img src="images/re_small1.jpg" width="60" height="60" alt="本期热门推荐"/></a></dt>
					<dd class="fl">
						<h6><a href="javascript:void(0)">新学期要穿什么衣服新学期要穿什么衣服</a></h6>
						<p><a href="javascript:void(0)">九月来了，哦耶，新的一学期驾到了！新学期要有新气象，应首先从穿衣打扮开始，MM们想好要穿什么了吗?是时尚舒适的卫衣，还是百搭自在的T恤，或者选择一件连衣裙来提升气质，当然也可以用风衣来增强气场，保持足够的时尚度，成为校园里的一道靓丽风景。</a></p>
					</dd>
				</dl>
				<dl class="list_dl clearfix">
					<dt class="fl"><a href="javascript:void(0)"><img src="images/re_small1.jpg" width="60" height="60" alt="本期热门推荐"/></a></dt>
					<dd class="fl">
						<h6><a href="javascript:void(0)">新学期要穿什么衣服新学期要穿什么衣服</a></h6>
						<p><a href="javascript:void(0)">九月来了，哦耶，新的一学期驾到了！新学期要有新气象，应首先从穿衣打扮开始，MM们想好要穿什么了吗?是时尚舒适的卫衣，还是百搭自在的T恤，或者选择一件连衣裙来提升气质，当然也可以用风衣来增强气场，保持足够的时尚度，成为校园里的一道靓丽风景。</a></p>
					</dd>
				</dl>
			</div>
			<div class="follow">
				<h3>关注我们</h3>
				<dl class="list_dl clearfix">
					<dt class="fl"><a href="javascript:void(0)"><img src="images/logo2.jpg" width="80" height="52" alt="本期热门推荐"/></a></dt>
					<dd class="fl">
						<h6>2号店官方微博</h6>
						<p><a href="javascript:void(0)" class="common_bg fow_btn">加关注</a></p>
					</dd>
				</dl>
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