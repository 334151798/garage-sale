<?php /* Smarty version 2.6.26, created on 2012-10-21 17:42:44
         compiled from front/college.html */ ?>
﻿<div class="choose_college_wrap">
<!-- <a href="javascript:TINY.box.hide();" class="fr skip">跳过</a> -->
	<h5 class="clearfix">请选择学校</h5>
	<ul class="hot_city clearfix">
		<li>热门城市：</li>
		<li><a href="javascript:collegeAjax(1);" id_eq="1" >北京</a></li>
		<li><a href="javascript:collegeAjax(2);" id_eq="2" class="cur">上海</a></li>
		<li><a href="javascript:collegeAjax(3);" id_eq="3">天津</a></li>
		<li><a href="javascript:collegeAjax(4);" id_eq="4">重庆</a></li>
	</ul>
	<ul class="college_index clearfix mtb10">
		<li>
			<p>华北地区</p>
			<a title="北京"  href="javascript:collegeAjax(1);" class="" id_eq="1">北京</a>
			<a title="天津"  href="javascript:collegeAjax(3);" class="" id_eq="3">天津</a>
			<a title="河北"  href="javascript:collegeAjax(11);" class="" id_eq="11">河北</a>
			<a title="山西"  href="javascript:collegeAjax(9);" class="" id_eq="9">山西</a>
		</li>
		<li>
			 <p>华东地区</p>
			<a title="上海"  href="javascript:collegeAjax(2);" class="cur" id_eq="2">上海</a>
			<a title="江苏"  href="javascript:collegeAjax(16);" class="" id_eq="16">江苏</a>
			<a title="浙江"  href="javascript:collegeAjax(30);" class="" id_eq="30">浙江</a>
			<a title="安徽"  href="javascript:collegeAjax(29);" class="" id_eq="29">安徽</a>
			<a title="山东"  href="javascript:collegeAjax(8);" class="" id_eq="8">山东</a>
		</li>
		<li>
			 <p>华中地区</p>
			<a title="江西"  href="javascript:collegeAjax(17);" class="" id_eq="17">江西</a>
			<a title="河南"  href="javascript:collegeAjax(12);" class="" id_eq="12">河南</a>
			<a title="湖北"  href="javascript:collegeAjax(13);" class="" id_eq="13">湖北</a>
			<a title="湖南"  href="javascript:collegeAjax(14);" class="" id_eq="14">湖南</a>
		</li>
		<li>
			 <p>华南地区</p>
			<a title="福建"  href="javascript:collegeAjax(31);" class="" id_eq="31">福建</a>
			<a title="广东"  href="javascript:collegeAjax(18);" class="" id_eq="18">广东</a>
			<a title="广西"  href="javascript:collegeAjax(19);" class="" id_eq="19">广西</a>
			<a title="海南"  href="javascript:collegeAjax(15);" class="" id_eq="15">海南</a>
		</li>
		<li>
			<p>东北地区</p>
			<a title="内蒙古"  href="javascript:collegeAjax(23);" class="" id_eq="23">内蒙古</a>
			<a title="辽宁"  " href="javascript:collegeAjax(7);" class="" id_eq="7">辽宁</a>
			<a title="吉林"  " href="javascript:collegeAjax(6);" class="" id_eq="6">吉林</a>
			<a title="黑龙江"  href="javascript:collegeAjax(5);" class="" id_eq="5">黑龙江</a>
		</li>
		<li>
			 <p>西南地区</p>
			<a title="重庆"  href="javascript:collegeAjax(4);" class="" id_eq="4">重庆</a>
			<a title="四川"  href="javascript:collegeAjax(22);" class="" id_eq="22">四川</a>
			<a title="贵州"  href="javascript:collegeAjax(21);" class="" id_eq="21">贵州</a>
			<a title="云南"  href="javascript:collegeAjax(20);" class="" id_eq="20">云南</a>
			<a title="西藏"  href="javascript:collegeAjax(27);" class="" id_eq="27">西藏</a>
		</li>
		<li>
			 <p>西北地区</p>
			<a title="陕西"  href="javascript:collegeAjax(10);" class="" id_eq="10">陕西</a>
			<a title="甘肃"  href="javascript:collegeAjax(25);" class="" id_eq="25">甘肃</a>
			<a title="青海"  href="javascript:collegeAjax(26);" class="" id_eq="26">青海</a>
			<a title="宁夏"  href="javascript:collegeAjax(24);" class="" id_eq="24">宁夏</a>
			<a title="新疆"  href="javascript:collegeAjax(28);" class="" id_eq="28">新疆</a>
		</li>
	</ul>
	<div class="college_wrap">
		<ul class="clearfix" id="college_ul">
		<?php unset($this->_sections['college']);
$this->_sections['college']['name'] = 'college';
$this->_sections['college']['loop'] = is_array($_loop=$this->_tpl_vars['collegeList']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['college']['show'] = true;
$this->_sections['college']['max'] = $this->_sections['college']['loop'];
$this->_sections['college']['step'] = 1;
$this->_sections['college']['start'] = $this->_sections['college']['step'] > 0 ? 0 : $this->_sections['college']['loop']-1;
if ($this->_sections['college']['show']) {
    $this->_sections['college']['total'] = $this->_sections['college']['loop'];
    if ($this->_sections['college']['total'] == 0)
        $this->_sections['college']['show'] = false;
} else
    $this->_sections['college']['total'] = 0;
if ($this->_sections['college']['show']):

            for ($this->_sections['college']['index'] = $this->_sections['college']['start'], $this->_sections['college']['iteration'] = 1;
                 $this->_sections['college']['iteration'] <= $this->_sections['college']['total'];
                 $this->_sections['college']['index'] += $this->_sections['college']['step'], $this->_sections['college']['iteration']++):
$this->_sections['college']['rownum'] = $this->_sections['college']['iteration'];
$this->_sections['college']['index_prev'] = $this->_sections['college']['index'] - $this->_sections['college']['step'];
$this->_sections['college']['index_next'] = $this->_sections['college']['index'] + $this->_sections['college']['step'];
$this->_sections['college']['first']      = ($this->_sections['college']['iteration'] == 1);
$this->_sections['college']['last']       = ($this->_sections['college']['iteration'] == $this->_sections['college']['total']);
?>
			<li><a href="javascript:setCollege(<?php echo $this->_tpl_vars['collegeList'][$this->_sections['college']['index']]['university_id']; ?>
)"><?php echo $this->_tpl_vars['collegeList'][$this->_sections['college']['index']]['university']; ?>
</a></li>
		<?php endfor; endif; ?>
		</ul>
	</div>
</div>