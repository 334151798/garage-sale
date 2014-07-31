<?php /* Smarty version 2.6.26, created on 2012-10-21 17:42:24
         compiled from front/include/common_include.html */ ?>
<base href="<?php echo $this->_tpl_vars['front_path']; ?>
"/>
<meta name="Keywords"  content="" />
<meta name="Description" content="" />

<!-- CSS -->
<link rel="shortcut icon" href="images/logo.ico" type="image/x-icon" />
<link href="css/common.css" rel="stylesheet" type="text/css" />
<link href="css/login_reg.css" rel="stylesheet" type="text/css" />
<link href="css/index.css" rel="stylesheet" type="text/css" />
<link href="css/exchange.css" rel="stylesheet" type="text/css" />
<link href="css/college.css" rel="stylesheet" type="text/css" />
<link href="css/lrtk.css" type="text/css" rel="stylesheet" />
<link href="js/tinybox/tinybox.css" rel="stylesheet" type="text/css"  />
<link href="js/Validform_v5.1/css/style.css" type="text/css" rel="stylesheet" />
<link href="js/Validform_v5.1/css/demo.css" type="text/css" rel="stylesheet" />


<!-- JavaScripts-->
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/tinybox/tinybox.js"></script>
<script type="text/javascript" src="js/searchFocus.js"></script>
<script type="text/javascript" src="js/Validform_v5.1/js/Validform_v5.1_min.js"></script>
<script type="text/javascript" src="js/Validform_v5.1/plugin/passwordStrength/passwordStrength-min.js"></script>
<!-- <script type="text/javascript" src="js/setSelectRadioCheckboxDefault.js"></script>-->
<script type="text/javascript" src="js/scrolltop.js"></script>

<script type="text/javascript">
/*
 * 选择学校的函数，写成jQuery的方法，方便全局调用
*/
jQuery.setUniversity = function(link){
	//如果university_id不存在，即学校没有选，就强制选，
	if ($("#university_id").val()==0){
		TINY.box.show('<?php echo $this->_tpl_vars['front_url']; ?>
region/index.html',1,640,515,1,null,link);
	}else{//否则跳到指定的url
		location.href=link;
	}
}

/**
 * 设置省市的默认选中样式
 * 
 * 因为打开选中学校页面时，js不会被执行，所以在这里设一个定时器，设置完成后，就清除定时器
 *
 */
jQuery.setDefaultProvince = function (){
	var t= setInterval(function (){
		if ($("#province_id").val()!=0){
			//alert($("#province_id").val());
			//热门城市的设置
			$(".choose_college_wrap .hot_city li a").removeClass("cur");
			$(".choose_college_wrap .hot_city li a[id_eq='"+$("#province_id").val()+"']'").addClass("cur");
			
			//所有分类的设置
			$(".choose_college_wrap .college_index li a").removeClass("cur");
			$(".choose_college_wrap .college_index li a[id_eq='"+$("#province_id").val()+"']'").addClass("cur");
		
			//在2秒钟之后，清除interval
			setTimeout(function (){clearInterval(t);},1000);
			
		}else{
			clearInterval(t);
		}
	},200);
	
}

/**
 * 设置学校 
 *
 * 通过传过来的id，发送ajax请求，设置院校，成功之后，跳转到点击之前的页面，如果没有前一页，就跳转到首页
 *
 * @param number id  学校的id
 * @return void
 */
function setCollege(id){
	$.ajax({
		   type: "GET",
		   url: "<?php echo $this->_tpl_vars['front_url']; ?>
region/setCollege.html",
		   data: "university_id="+id,
		   success: function(msg){
			   $("#tinycontent").attr("link")!="undefined" ? location.href=$("#tinycontent").attr("link") : location.reload();
		   }
		});
}


/**
 * 获取学校 
 *
 * 通过传过来的id，发送ajax请求，获取该省或市的所有大学
 *
 * @param number id  省或市的id
 * @return void
 */
function collegeAjax(id){
	//热门城市的设置
	$(".choose_college_wrap .hot_city li a").removeClass("cur");
	$(".choose_college_wrap .hot_city li a[id_eq='"+id+"']'").addClass("cur");
	
	//所有分类的设置
	$(".choose_college_wrap .college_index li a").removeClass("cur");
	$(".choose_college_wrap .college_index li a[id_eq='"+id+"']'").addClass("cur");
	
	$(this).addClass("cur");
	$.ajax({
	   type: "GET",
	   url: "<?php echo $this->_tpl_vars['front_url']; ?>
region/getCollege.html",
	   data: "province_id="+id,
	   success: function(msg){
		   var collegeLists = jQuery.parseJSON(msg),collegeWrap = $("#college_ul");
		   collegeWrap.html("");
		   for (var i=0,l=collegeLists.length;i<l;i++){
			   collegeWrap.append("<li><a href='javascript:setCollege("+collegeLists[i].university_id+");'>"+collegeLists[i].university+"</a></li>");
		   }
	   }
	});
}


jQuery(function ($){

	//选择学校,当点击进入页面时自动弹出
	$(".page a.need_university").click(function (e){
		e.preventDefault();
		var originalHref = $(this).attr("href");
		jQuery.setDefaultProvince();
		jQuery.setUniversity(originalHref);
		
		
	});

	
	/*
	 * 选择学校，顶部手动点击弹出
	 */
	$("#ch_college").click(function (e){
		e.preventDefault();
		jQuery.setDefaultProvince();
		TINY.box.show('<?php echo $this->_tpl_vars['front_url']; ?>
region/index.html',1,640,515,1,null);
		
		
	});
	
	/*
	 * 收藏/取消收藏
	 */
		$("#collect_btn").click(function (e){
			e.preventDefault();
			var request_id = $(this).attr("request_id"),_this=$(this);
			if ($(this).attr("status")==1){//如果status=1说明显示的是收藏，点击则是取消收藏
				$.ajax({
				   type: "POST",
				   url: "<?php echo $this->_tpl_vars['front_url']; ?>
collect/add.html",
				   data: "request_id="+request_id,
				   success: function(msg){
					   if (msg==1){
							 TINY.box.show('收藏成功！',0,0,0,0,3,null,'false');
							 _this.attr("status","0");
							   _this.html("取消收藏");
					   }else{
						   document.write(msg);
					   }
				   }
				});
			}else{//如果status=0说明显示的是取消收藏，点击则是收藏
				$.ajax({
				   type: "POST",
				   url: "<?php echo $this->_tpl_vars['front_url']; ?>
collect/delete.html",
				   data: "request_id="+request_id,
				   success: function(msg){
					   if (msg==1){
						   TINY.box.show('取消成功！',0,0,0,0,3,null,'false');
						   _this.attr("status","1");
						   _this.html("收藏");
					   }else{
						   document.write(msg);
					   }
				   }
				});
			}
		});
	
	
	
});
</script>