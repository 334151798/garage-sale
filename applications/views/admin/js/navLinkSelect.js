jQuery(function ($){
	//导航联动
	var selectSetWrap=$('#setSelectWrap');
	var mainSelect=selectSetWrap.find(".main_nav").eq(0),childSelect=selectSetWrap.find(".sub_nav").eq(0);
	var adminUrl=$("#admin_url").val();
	ajaxSetChildNav();
	
	//通过ajax设置主导航和二级导航的联动
	mainSelect.bind('change',function (){
		ajaxSetChildNav();
	});
	function ajaxSetChildNav(){
		$.ajax({
			   type: "get",
			   url: adminUrl+"column/AjaxReturn/",
			   data: "pid="+mainSelect.find("option:selected").val(),
			   success: function(msg){
				 childSelect.html("");
				 var objs=jQuery.parseJSON(msg);
				 if(objs==''){
					 childSelect.append("<option value="+mainSelect.find("option:selected").val()+">"+mainSelect.find("option:selected").html()+"</option>");
				 }else{
					 for(var i=0,l=objs.length;i<l;i++){
				    	 childSelect.append("<option value="+objs[i].id+">"+objs[i].column_name+"</option>");
				     }
					 jQuery.setDefaultSelect();
				 }
				
			     
			   }
			});
	}
	
	//品牌联动
	var brandSelectWrap=$('#brandSelectWrap');
	var mainBrandSelect=brandSelectWrap.find(".main_nav").eq(0),childBrandSelect=brandSelectWrap.find(".sub_nav").eq(0);
	ajaxSetBrandChildNav();
	//通过ajax设置主导航和二级导航的联动
	mainBrandSelect.bind('change',function (){
		ajaxSetBrandChildNav();
	});
	function ajaxSetBrandChildNav(){
		$.ajax({
			   type: "get",
			   url: adminUrl+"brand/AjaxReturn/",
			   data: "pid="+mainBrandSelect.find("option:selected").val(),
			   success: function(msg){
				 childBrandSelect.html("");
				 var objs=jQuery.parseJSON(msg);
				 if(objs==''){
					 childBrandSelect.append("<option value="+mainBrandSelect.find("option:selected").val()+">"+mainBrandSelect.find("option:selected").html()+"</option>");
				 }else{
					 for(var i=0,l=objs.length;i<l;i++){
				    	 childBrandSelect.append("<option value="+objs[i].id+">"+objs[i].brand_name+"</option>");
				     }
					 jQuery.setDefaultSelect();
				 }
				 
			     
			   }
			});
	}
	
});