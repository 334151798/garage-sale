jQuery(function ($){
	//导航联动
	var selectSetWrap=$('#setSelectWrap');
	var mainSelect=selectSetWrap.find(".main_nav").eq(0),childSelect=selectSetWrap.find(".sub_nav").eq(0);
	var adminUrl=$("#admin_url").val();
	ajaxSetChildNav(true);

	//通过ajax设置主导航和二级导航的联动
	mainSelect.bind('change',function (){
		ajaxSetChildNav();
	});
	/**
	 * ajax导航联动
	 * 
	 * @param boolean resetFlag 是否重新设置一下导航和checkbox等的默认值
	 */
	function ajaxSetChildNav(resetFlag){
		if (!mainSelect.find("option:selected").val()){
			return;
		}
		$.ajax({
			   type: "get",
			   url: adminUrl+"column/AjaxReturn/",
			   data: "pid="+mainSelect.find("option:selected").val(),
			   success: function(msg){
				 childSelect.html("");
				 var objs=jQuery.parseJSON(msg);
				 childSelect.show();
				 if(objs==''){
					 childSelect.append("<option value="+mainSelect.find("option:selected").val()+">"+mainSelect.find("option:selected").html()+"</option>");
				 }else{
//					 childSelect.append("<option value=''>请选择二级类别</option>");
					 for(var i=0,l=objs.length;i<l;i++){
				    	 childSelect.append("<option value="+objs[i].id+">"+objs[i].column_name+"</option>");
				     }
					 if (resetFlag){
						 jQuery.setDefaultSelect();
					 }
					 //
				 }
				
			     
			   }
			});
	}
	
	//品牌联动
	var brandSelectWrap=$('#brandSelectWrap');
	var mainBrandSelect=brandSelectWrap.find(".main_nav").eq(0),childBrandSelect=brandSelectWrap.find(".sub_nav").eq(0);
	ajaxSetBrandChildNav(true);
	//通过ajax设置主导航和二级导航的联动
	mainBrandSelect.bind('change',function (){
		ajaxSetBrandChildNav();
	});
	function ajaxSetBrandChildNav(resetFlag){
		if (!mainBrandSelect.find("option:selected").val()){
			return;
		}
		$.ajax({
			   type: "get",
			   url: adminUrl+"brand/AjaxReturn/",
			   data: "pid="+mainBrandSelect.find("option:selected").val(),
			   success: function(msg){
				 childBrandSelect.html("");
				 var objs=jQuery.parseJSON(msg);
				 childBrandSelect.show();
				 
				 if(objs==''){
					 childBrandSelect.append("<option value="+mainBrandSelect.find("option:selected").val()+">"+mainBrandSelect.find("option:selected").html()+"</option>");
				 }else{
//					 childSelect.append("<option value=''>请选择具体型号</option>");
					 for(var i=0,l=objs.length;i<l;i++){
				    	 childBrandSelect.append("<option value="+objs[i].id+">"+objs[i].brand_name+"</option>");
				     }
					 if (resetFlag){
						 jQuery.setDefaultSelect();
					 }
				 }
				 
			     
			   }
			});
	}
	
});