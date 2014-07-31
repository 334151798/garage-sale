<?php /* Smarty version 2.6.26, created on 2012-09-18 22:15:04
         compiled from admin/right/price/list.html */ ?>
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
price/show/">分类管理</a> &raquo; 
	<span class="active">价格区间列表</span>
	<a href="<?php echo $this->_tpl_vars['admin_url']; ?>
price/add/" class="back fr">新增价格区间</a>
</h2>
<div id="main">
<h3>分类列表</h3>
 	<table width="100%" cellspacing="0" cellpadding="0" border="0" class="dxtable">
	  <thead>
	      <tr>
	        <th>价格区间起始值</th>
	        <th>价格区间结束值</th>
	        <th>操作</th>
	      </tr>
	  </thead>
	  <tbody>
	  <?php unset($this->_sections['price']);
$this->_sections['price']['name'] = 'price';
$this->_sections['price']['loop'] = is_array($_loop=$this->_tpl_vars['allPriceList']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
	  	<tr>
		    <td><a href="<?php echo $this->_tpl_vars['admin_url']; ?>
price/update?id=<?php echo $this->_tpl_vars['allPriceList'][$this->_sections['price']['index']]['id']; ?>
"><?php echo $this->_tpl_vars['allPriceList'][$this->_sections['price']['index']]['price_start']; ?>
</a></td>
		    <td><a href="<?php echo $this->_tpl_vars['admin_url']; ?>
price/update?id=<?php echo $this->_tpl_vars['allPriceList'][$this->_sections['price']['index']]['id']; ?>
"><?php echo $this->_tpl_vars['allPriceList'][$this->_sections['price']['index']]['price_end']; ?>
</a></td>
		    <td><a href="<?php echo $this->_tpl_vars['admin_url']; ?>
price/update?id=<?php echo $this->_tpl_vars['allPriceList'][$this->_sections['price']['index']]['id']; ?>
">编辑</a> | <a  href="javascript:if(window.confirm('确认删除吗？')){location.href=	'<?php echo $this->_tpl_vars['admin_url']; ?>
price/delete?id=<?php echo $this->_tpl_vars['allPriceList'][$this->_sections['price']['index']]['id']; ?>
'}">删除</a></td>
	   </tr>
	   <?php endfor; endif; ?>
	  </tbody>
	</table>
</div>