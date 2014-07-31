<?php /* Smarty version 2.6.26, created on 2012-10-21 17:42:24
         compiled from front/index.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'mb_truncate', 'front/index.html', 21, false),array('modifier', 'default', 'front/index.html', 40, false),)), $this); ?>
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
</head>

<body>
<div class="page">
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "front/include/header.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	<div class="big_img wraps clearfix">
		<div class="imgs_wrap fl">
			<img src="images/big_img/demo1.jpg" width="645" height="245" alt="2号店首页推荐"/>
		</div>
		<div class="big_text fl">
			<dl class="big_dl">
				<dt class="common_bg"><a href="javascript:void(0)" class="ndl">2012十大校园最受欢迎笔记本推荐</a></dt>
				<?php unset($this->_sections['request']);
$this->_sections['request']['name'] = 'request';
$this->_sections['request']['loop'] = is_array($_loop=$this->_tpl_vars['hotRequestList']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
					<dd class="common_bg"><a href="<?php echo $this->_tpl_vars['front_url']; ?>
request/requestDetail/<?php echo $this->_tpl_vars['hotRequestList'][$this->_sections['request']['index']]['id']; ?>
.html" target="_blank"><?php echo ((is_array($_tmp=$this->_tpl_vars['hotRequestList'][$this->_sections['request']['index']]['title'])) ? $this->_run_mod_handler('mb_truncate', true, $_tmp, 30) : smarty_modifier_mb_truncate($_tmp, 30)); ?>
</a></dd>
        <?php endfor; endif; ?>
			</dl>
			<p class="release"><a href="<?php echo $this->_tpl_vars['front_url']; ?>
request/add.html" class="common_bg out_text need_university">发布需求</a></p>
		</div>
	</div>
	<div class="main w980 clearfix">
		<div class="hot fl">
			<h2 class="title">HOTS | 热门买卖</h2>
			<ul class="hot_list_ul">
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
.html" target="_blank" class="f44" title="<?php echo ((is_array($_tmp=$this->_tpl_vars['requestList'][$this->_sections['request']['index']]['title'])) ? $this->_run_mod_handler('mb_truncate', true, $_tmp, 40) : smarty_modifier_mb_truncate($_tmp, 40)); ?>
"><?php echo $this->_tpl_vars['requestList'][$this->_sections['request']['index']]['title']; ?>
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
	       </ul>
	       <?php echo $this->_tpl_vars['pageFen']; ?>

		</div>
		<div class="right wraps fr">
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