<?php /* Smarty version 2.6.26, created on 2012-09-16 12:04:47
         compiled from admin/right/brand/list.html */ ?>
<head>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "admin/include/css_js.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
</head>
<h2 class="clearfix">
  <span class="p_text">您现在的位置：</span>
	<a href="<?php echo $this->_tpl_vars['admin_url']; ?>
column/show/">分类管理</a> &raquo; 
	<span class="active">品牌列表</span>
	<a href="<?php echo $this->_tpl_vars['admin_url']; ?>
brand/add/" class="back fr">新增品牌</a>
</h2>
<div id="main">
<h3>分类列表</h3>
 	<table width="100%" cellspacing="0" cellpadding="0" border="0" class="dxtable">
	  <thead>
	      <tr>
	        <th>品牌名称</th>
	        <th>所属品牌</th>
	        <th>操作</th>
	      </tr>
	  </thead>
	  <tbody>
	  <?php unset($this->_sections['brand']);
$this->_sections['brand']['name'] = 'brand';
$this->_sections['brand']['loop'] = is_array($_loop=$this->_tpl_vars['allBrandList']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
	  	<tr>
		    <td><a href="<?php echo $this->_tpl_vars['admin_url']; ?>
column/update?id=<?php echo $this->_tpl_vars['allBrandList'][$this->_sections['brand']['index']]['id']; ?>
"><?php echo $this->_tpl_vars['allBrandList'][$this->_sections['brand']['index']]['brand_name']; ?>
</a></td>
		    <td><?php if ($this->_tpl_vars['allBrandList'][$this->_sections['brand']['index']]['pid_name']): ?><?php echo $this->_tpl_vars['allBrandList'][$this->_sections['brand']['index']]['pid_name']; ?>
<?php else: ?>主品牌<?php endif; ?></td>
		    <td><a href="<?php echo $this->_tpl_vars['admin_url']; ?>
brand/update?id=<?php echo $this->_tpl_vars['allBrandList'][$this->_sections['brand']['index']]['id']; ?>
">编辑</a> | <a  href="javascript:if(window.confirm('确认删除吗？')){location.href=	'<?php echo $this->_tpl_vars['admin_url']; ?>
brand/delete?id=<?php echo $this->_tpl_vars['allBrandList'][$this->_sections['brand']['index']]['id']; ?>
'}">删除</a></td>
	   </tr>
	   <?php endfor; endif; ?>
	  </tbody>
	</table>
</div>