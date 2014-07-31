<?php /* Smarty version 2.6.26, created on 2012-09-16 11:02:53
         compiled from admin/right/column/list.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'mb_truncate', 'admin/right/column/list.html', 25, false),)), $this); ?>
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
	<span class="active">分类列表</span>
	<a href="<?php echo $this->_tpl_vars['admin_url']; ?>
column/add/" class="back fr">新增分类</a>
</h2>
<div id="main">
<h3>分类列表</h3>
 	<table width="100%" cellspacing="0" cellpadding="0" border="0" class="dxtable">
	  <thead>
	      <tr>
	        <th>导航名称</th>
	        <th>排序</th>
	        <th>所属分类</th>
	        <th>品牌</th>
	        <th>操作</th>
	      </tr>
	  </thead>
	  <tbody>
	  <?php unset($this->_sections['nav']);
$this->_sections['nav']['name'] = 'nav';
$this->_sections['nav']['loop'] = is_array($_loop=$this->_tpl_vars['allNavList']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
	  	<tr>
		    <td><a href="<?php echo $this->_tpl_vars['admin_url']; ?>
column/update?id=<?php echo $this->_tpl_vars['allNavList'][$this->_sections['nav']['index']]['id']; ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['allNavList'][$this->_sections['nav']['index']]['nav_name'])) ? $this->_run_mod_handler('mb_truncate', true, $_tmp, 15) : smarty_modifier_mb_truncate($_tmp, 15)); ?>
</a></td>
		    <td><?php echo $this->_tpl_vars['allNavList'][$this->_sections['nav']['index']]['sort']; ?>
</td>
		    <td><?php if ($this->_tpl_vars['allNavList'][$this->_sections['nav']['index']]['pidName']): ?><?php echo $this->_tpl_vars['allNavList'][$this->_sections['nav']['index']]['pidName']; ?>
<?php else: ?>主导航<?php endif; ?></td>
		    <td title="<?php echo $this->_tpl_vars['allNavList'][$this->_sections['nav']['index']]['brand']; ?>
"><?php if ($this->_tpl_vars['allNavList'][$this->_sections['nav']['index']]['brand']): ?><?php echo ((is_array($_tmp=$this->_tpl_vars['allNavList'][$this->_sections['nav']['index']]['brand'])) ? $this->_run_mod_handler('mb_truncate', true, $_tmp, 30) : smarty_modifier_mb_truncate($_tmp, 30)); ?>
<?php else: ?>该分类下没有品牌<?php endif; ?></td>
		    <td><a href="<?php echo $this->_tpl_vars['admin_url']; ?>
column/update?id=<?php echo $this->_tpl_vars['allNavList'][$this->_sections['nav']['index']]['id']; ?>
">编辑</a> | <a  href="javascript:if(window.confirm('确认删除吗？')){location.href=	'<?php echo $this->_tpl_vars['admin_url']; ?>
column/delete?id=<?php echo $this->_tpl_vars['allNavList'][$this->_sections['nav']['index']]['id']; ?>
'}">删除</a></td>
	   </tr>
	   <?php endfor; endif; ?>
	  </tbody>
	</table>
</div>