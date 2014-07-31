<?php /* Smarty version 2.6.26, created on 2012-09-18 22:15:06
         compiled from admin/right/price/add.html */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<head>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "admin/include/css_js.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<style type="text/css">
body{width:888px;overflow:hidden;}
</style>
</head>
<body>
<h2 class="clearfix">
  <span class="p_text">您现在的位置：</span>
	<a href="<?php echo $this->_tpl_vars['admin_url']; ?>
column/show/">分类管理</a> &raquo; 
	<span class="active">新增价格区间</span>
	<a href="<?php echo $this->_tpl_vars['admin_url']; ?>
price/show/" class="back fr">返回价格区间列表</a>
</h2>
<div id="main">
 	<form action="<?php echo $this->_tpl_vars['admin_url']; ?>
price/add/" class="jNice registerform" method="post" id="validateForm">
			<h3>新增价格区间</h3>
     	<fieldset>
         	<div class="clearfix lists">
	         	<span class="fl text_label">价格区间起始值：</span>
	         	<input type="text" class="text-long fl" name="price_start" value="<?php echo $this->_tpl_vars['price_start_val']; ?>
" />
	         	<?php echo $this->_tpl_vars['price_start_error']; ?>

          </div>
          <div class="clearfix lists">
	         	<span class="fl text_label">价格区间结束值：</span>
	         	<input type="text" class="text-long fl" name="price_end" value="<?php echo $this->_tpl_vars['price_end_val']; ?>
" />
	         	<?php echo $this->_tpl_vars['price_end_error']; ?>

          </div>
             <input type="submit" value="提交" name="submit"/>
         </fieldset>
    </form>
  </div>
  </body>
  </html>