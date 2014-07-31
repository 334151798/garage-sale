<?php /* Smarty version 2.6.26, created on 2012-09-16 11:03:07
         compiled from admin/right/column/add.html */ ?>
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
	<span class="active">新增分类</span>
	<a href="<?php echo $this->_tpl_vars['admin_url']; ?>
column/show/" class="back fr">返回分类列表</a>
</h2>
<div id="main">
 	<form action="<?php echo $this->_tpl_vars['admin_url']; ?>
column/add/" class="jNice registerform" method="post" id="validateForm">
			<h3>新增分类</h3>
     	<fieldset>
         	<div class="clearfix lists">
	         	<span class="fl text_label">分类名称：</span>
	         	<input type="text" class="text-long fl" name="nav_name" value="<?php echo $this->_tpl_vars['nav_name_val']; ?>
" datatype="s2-15"  errormsg="分类名称至少2个字符,最多15个字符！"/>
	         	<?php echo $this->_tpl_vars['navName_error']; ?>

          </div>
          <div class="clearfix lists">
	         	<span class="fl text_label">分类排序：</span>
	         	<input type="text" class="text-long fl" name="sort" value="<?php echo $this->_tpl_vars['sort_val']; ?>
" datatype="n1-2" errormsg="分类排序至少1位数字,最多2位数字！"/>
	         	<?php echo $this->_tpl_vars['sort_error']; ?>

          </div>
          <div class="clearfix lists">
          		<span class="fl text_label">分类类型：</span>
             <select class="fl" name="pid">
             	<option value="0">主导航</option>
             	<?php unset($this->_sections['column']);
$this->_sections['column']['name'] = 'column';
$this->_sections['column']['loop'] = is_array($_loop=$this->_tpl_vars['allColumn']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['column']['show'] = true;
$this->_sections['column']['max'] = $this->_sections['column']['loop'];
$this->_sections['column']['step'] = 1;
$this->_sections['column']['start'] = $this->_sections['column']['step'] > 0 ? 0 : $this->_sections['column']['loop']-1;
if ($this->_sections['column']['show']) {
    $this->_sections['column']['total'] = $this->_sections['column']['loop'];
    if ($this->_sections['column']['total'] == 0)
        $this->_sections['column']['show'] = false;
} else
    $this->_sections['column']['total'] = 0;
if ($this->_sections['column']['show']):

            for ($this->_sections['column']['index'] = $this->_sections['column']['start'], $this->_sections['column']['iteration'] = 1;
                 $this->_sections['column']['iteration'] <= $this->_sections['column']['total'];
                 $this->_sections['column']['index'] += $this->_sections['column']['step'], $this->_sections['column']['iteration']++):
$this->_sections['column']['rownum'] = $this->_sections['column']['iteration'];
$this->_sections['column']['index_prev'] = $this->_sections['column']['index'] - $this->_sections['column']['step'];
$this->_sections['column']['index_next'] = $this->_sections['column']['index'] + $this->_sections['column']['step'];
$this->_sections['column']['first']      = ($this->_sections['column']['iteration'] == 1);
$this->_sections['column']['last']       = ($this->_sections['column']['iteration'] == $this->_sections['column']['total']);
?>
             			<option value="<?php echo $this->_tpl_vars['allColumn'][$this->_sections['column']['index']]['id']; ?>
"><?php echo $this->_tpl_vars['allColumn'][$this->_sections['column']['index']]['nav_name']; ?>
</option>
             	<?php endfor; endif; ?>
             </select>
             <?php echo $this->_tpl_vars['pid_error']; ?>

          </div>
          <div class="clearfix lists">
          	<span class="fl text_label">分类品牌：</span>
             	<ul class="brand_ul clearfix fl">
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
             		<li>
             			<label>
             				<input type="checkbox" name="brand[]" value="<?php echo $this->_tpl_vars['allBrand'][$this->_sections['brand']['index']]['id']; ?>
"/>
             				<span><?php echo $this->_tpl_vars['allBrand'][$this->_sections['brand']['index']]['brand_name']; ?>
</span>
             			</label>
             		</li>
             	<?php endfor; endif; ?>
             	</ul>
             	<?php echo $this->_tpl_vars['brand_error']; ?>

          </div>
          <div class="clearfix lists">
          	<span class="fl text_label">分类价格：</span>
             	<ul class="brand_ul clearfix fl">
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
             		<li>
             			<label>
             				<input type="checkbox" name="price[]" value="<?php echo $this->_tpl_vars['allPrice'][$this->_sections['price']['index']]['id']; ?>
"/>
             				<span><?php if ($this->_tpl_vars['allPrice'][$this->_sections['price']['index']]['price_end'] <= 100): ?>100以下<?php else: ?><?php echo $this->_tpl_vars['allPrice'][$this->_sections['price']['index']]['price_start']; ?>
 - <?php echo $this->_tpl_vars['allPrice'][$this->_sections['price']['index']]['price_end']; ?>
<?php endif; ?></span>
             			</label>
             		</li>
             	<?php endfor; endif; ?>
             	</ul>
             	<?php echo $this->_tpl_vars['price_error']; ?>

          </div>
          <div class="clearfix lists">
	         	<span class="fl text_label">分类描述：</span>
	         	<textarea rows="1" cols="1" name="nav_info"><?php echo $this->_tpl_vars['nav_info_val']; ?>
</textarea>
	         	<span>（20字以内）</span>
	         	<?php echo $this->_tpl_vars['navInfo_error']; ?>

          </div>		
             <input type="submit" value="提交" name="submit"/>
         </fieldset>
    </form>
  </div>
  </body>
  </html>