<?php /* Smarty version 2.6.26, created on 2012-09-16 11:02:48
         compiled from admin/right/request/list_un.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'mb_truncate', 'admin/right/request/list_un.html', 29, false),)), $this); ?>
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
requestAdmin/showUnAuditRequest/">供需管理</a> &raquo; 
	<span class="active">待审核的供求列表</span>
	<!--  <a href="<?php echo $this->_tpl_vars['admin_url']; ?>
column/add/" class="back fr">新增分类</a>-->
</h2>
<div id="main">
<h3>待审核的供求列表</h3>
 	<table width="100%" cellspacing="0" cellpadding="0" border="0" class="dxtable">
	  <thead>
	      <tr>
	        <th height="40">需求标题</th>
	        <th>供需类型</th>
	        <th>所属类别</th>
	        <th>新旧程度</th>
	        <th>价格</th>
	        <!-- <th>联系人</th> -->
	        <th>联系电话</th>
	        <th>发布时间</th>
	        <th>操作</th>
	      </tr>
	  </thead>
	  <tbody>
	  <?php unset($this->_sections['request']);
$this->_sections['request']['name'] = 'request';
$this->_sections['request']['loop'] = is_array($_loop=$this->_tpl_vars['unAuditRequestList']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
	  	<tr>
		    <td height="40" title="<?php echo $this->_tpl_vars['unAuditRequestList'][$this->_sections['request']['index']]['title']; ?>
"><a href="<?php echo $this->_tpl_vars['admin_url']; ?>
requestAdmin/update/?id=<?php echo $this->_tpl_vars['unAuditRequestList'][$this->_sections['request']['index']]['id']; ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['unAuditRequestList'][$this->_sections['request']['index']]['title'])) ? $this->_run_mod_handler('mb_truncate', true, $_tmp, 6) : smarty_modifier_mb_truncate($_tmp, 6)); ?>
</a></td>
		   	<td title="<?php echo $this->_tpl_vars['unAuditRequestList'][$this->_sections['request']['index']]['type_name']; ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['unAuditRequestList'][$this->_sections['request']['index']]['type_name'])) ? $this->_run_mod_handler('mb_truncate', true, $_tmp, 6) : smarty_modifier_mb_truncate($_tmp, 6)); ?>
</td>
		    <td title="<?php echo $this->_tpl_vars['unAuditRequestList'][$this->_sections['request']['index']]['nav_name']; ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['unAuditRequestList'][$this->_sections['request']['index']]['nav_name'])) ? $this->_run_mod_handler('mb_truncate', true, $_tmp, 12) : smarty_modifier_mb_truncate($_tmp, 12)); ?>
</td>
		    <td title="<?php echo $this->_tpl_vars['unAuditRequestList'][$this->_sections['request']['index']]['old_level_name']; ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['unAuditRequestList'][$this->_sections['request']['index']]['old_level_name'])) ? $this->_run_mod_handler('mb_truncate', true, $_tmp, 5) : smarty_modifier_mb_truncate($_tmp, 5)); ?>
</td>
		    <td title="<?php echo $this->_tpl_vars['unAuditRequestList'][$this->_sections['request']['index']]['price']; ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['unAuditRequestList'][$this->_sections['request']['index']]['price'])) ? $this->_run_mod_handler('mb_truncate', true, $_tmp, 4) : smarty_modifier_mb_truncate($_tmp, 4)); ?>
元</td>
		    <!--  <td title="<?php echo $this->_tpl_vars['unAuditRequestList'][$this->_sections['request']['index']]['contact_name']; ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['unAuditRequestList'][$this->_sections['request']['index']]['contact_name'])) ? $this->_run_mod_handler('mb_truncate', true, $_tmp, 4) : smarty_modifier_mb_truncate($_tmp, 4)); ?>
</td>-->
		    <td title="<?php echo $this->_tpl_vars['unAuditRequestList'][$this->_sections['request']['index']]['telephone']; ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['unAuditRequestList'][$this->_sections['request']['index']]['telephone'])) ? $this->_run_mod_handler('mb_truncate', true, $_tmp, 11) : smarty_modifier_mb_truncate($_tmp, 11)); ?>
</td>
		    <td title="<?php echo $this->_tpl_vars['unAuditRequestList'][$this->_sections['request']['index']]['publish_time']; ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['unAuditRequestList'][$this->_sections['request']['index']]['publish_time'])) ? $this->_run_mod_handler('mb_truncate', true, $_tmp, 12) : smarty_modifier_mb_truncate($_tmp, 12)); ?>
</td>
		    <td><a href="javascript:if(window.confirm('确认让该需求通过审核吗？')){location.href=	'<?php echo $this->_tpl_vars['admin_url']; ?>
requestAdmin/audit/?id=<?php echo $this->_tpl_vars['unAuditRequestList'][$this->_sections['request']['index']]['id']; ?>
'}" class="emprise">通过</a> | <a href="<?php echo $this->_tpl_vars['admin_url']; ?>
requestAdmin/update/?id=<?php echo $this->_tpl_vars['unAuditRequestList'][$this->_sections['request']['index']]['id']; ?>
">编辑</a> | <a  href="javascript:if(window.confirm('确认删除吗？')){location.href=	'<?php echo $this->_tpl_vars['admin_url']; ?>
requestAdmin/delete/?id=<?php echo $this->_tpl_vars['unAuditRequestList'][$this->_sections['request']['index']]['id']; ?>
'}">删除</a></td>
	   </tr>
	   <?php endfor; endif; ?>
	   <tr><td colspan="8"><?php echo $this->_tpl_vars['pageFen']; ?>
</td></tr>
	  </tbody>
	</table>
</div>