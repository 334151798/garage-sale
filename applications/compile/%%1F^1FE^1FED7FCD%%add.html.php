<?php /* Smarty version 2.6.26, created on 2012-09-18 22:15:03
         compiled from admin/right/brand/add.html */ ?>
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
	<span class="active">新增品牌</span>
	<a href="<?php echo $this->_tpl_vars['admin_url']; ?>
brand/show/" class="back fr">返回品牌列表</a>
</h2>
<div id="main">
 	<form action="<?php echo $this->_tpl_vars['admin_url']; ?>
brand/add/" class="jNice registerform" method="post" id="validateForm">
			<h3>新增品牌</h3>
     	<fieldset>
         	<div class="clearfix lists">
	         	<span class="fl text_label">品牌名称：</span>
	         	<input type="text" class="text-long fl" name="brand_name" value="<?php echo $this->_tpl_vars['brand_name_val']; ?>
" />
	         	<?php echo $this->_tpl_vars['brand_name_error']; ?>

          </div>
           <div class="clearfix lists">
          		<span class="fl text_label">品牌类型：</span>
             <select class="fl" name="pid">
             	<option value="0">主品牌</option>
             	<?php unset($this->_sections['brand']);
$this->_sections['brand']['name'] = 'brand';
$this->_sections['brand']['loop'] = is_array($_loop=$this->_tpl_vars['allBrand']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
             			<option value="<?php echo $this->_tpl_vars['allBrand'][$this->_sections['brand']['index']]['id']; ?>
"><?php echo $this->_tpl_vars['allBrand'][$this->_sections['brand']['index']]['brand_name']; ?>
</option>
             	<?php endfor; endif; ?>
             </select>
             <?php echo $this->_tpl_vars['pid_error']; ?>

          </div>
             <input type="submit" value="提交" name="submit"/>
         </fieldset>
    </form>
  </div>
  </body>
  </html>