<?php /* Smarty version 2.6.26, created on 2012-10-21 17:42:24
         compiled from front/include/header.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'default', 'front/include/header.html', 3, false),)), $this); ?>
<div class="top clearfix w980">
	<p class="fl text">
		<strong class=""><strong class="high_light school mr15"><?php echo ((is_array($_tmp=@$this->_tpl_vars['universityName'])) ? $this->_run_mod_handler('default', true, $_tmp, "所有院校") : smarty_modifier_default($_tmp, "所有院校")); ?>
</strong>[<a href="javascript:void(0)" class="normal" id="ch_college">切换</a>]</strong>
		<span class="mlr15">欢迎来到2号店，最专业的校园二手平台</span>
	</p>
	<ul class="clearfix fr">
		<li>您好！</li>
		<?php if ($this->_tpl_vars['user_id']): ?>
			<li class="high_light"><?php echo $this->_tpl_vars['user_name']; ?>
</li>
			<li><a href="<?php echo $this->_tpl_vars['front_url']; ?>
user/center.html">我的二号店</a></li>
			<li><a href="<?php echo $this->_tpl_vars['front_url']; ?>
user/logout.html">退出</a></li>
		<?php else: ?>
				<li><a href="<?php echo $this->_tpl_vars['front_url']; ?>
user/login.html">登陆</a></li>
				<li><a href="<?php echo $this->_tpl_vars['front_url']; ?>
user/regist.html">注册</a></li>
				<li><a href="javascript:void(0)" class="qq_login"></a></li>
		<?php endif; ?>
	</ul>
</div>
<div class="nav">
	<div class="w980 nav_inner clearfix">
		<h1 class="fl"><a href="<?php echo $this->_tpl_vars['front_url']; ?>
" class="out_text">2号店，最专业的校园二手平台</a></h1>
		<div class="nav_search fl clearfix">
			<ul class="clearfix fl nav_ul" navEq=<?php echo $this->_tpl_vars['navEq']; ?>
>
				<li class=""><a href="<?php echo $this->_tpl_vars['front_url']; ?>
" class="show">首页</a></li>
				<li class=""><a href="<?php echo $this->_tpl_vars['front_url']; ?>
request/index.html" class="need_university">校园易物</a></li>
				<li class=""><a href="javascript:void(0)">哇喔！</a></li>
			</ul>
			<div class="search_wrap fr">
				<form action="<?php echo $this->_tpl_vars['front_url']; ?>
search.html" method="post" class="clearfix">
					<input type="text" class="search" value="<?php echo ((is_array($_tmp=@$this->_tpl_vars['searchKeyWords'])) ? $this->_run_mod_handler('default', true, $_tmp, '请输入关键字搜索.....') : smarty_modifier_default($_tmp, '请输入关键字搜索.....')); ?>
" name="keywords"/>
					<input type="submit" class="search_btn" value="&nbsp;" name="submit"/>
				</form>
			</div>
		</div>
	</div>
</div>