jQuery(function ($){
	/*开始表单验证*/
	var getInfoObj=function(){
		return 	$(this).parents("div").next().find(".info");
	}

	$("[datatype]").focusin(function(){
		if(this.timeout){clearTimeout(this.timeout);}
		var infoObj=getInfoObj.call(this);
		if(infoObj.siblings(".Validform_right").length!=0){
			return;	
		}
		infoObj.show().siblings().hide();
		
	}).focusout(function(){
		var infoObj=getInfoObj.call(this);
		this.timeout=setTimeout(function(){
			infoObj.hide().siblings(".Validform_wrong,.Validform_loading").show();
		},0);
		
	});
	
	$("#validateForm").Validform({
		tiptype:2,
		usePlugin:{
			passwordstrength:{
				minLen:6,//设置密码长度最小值，默认为0;
				maxLen:20,//设置密码长度最大值，默认为30;
				trigger:function(obj,error){
					//该表单元素的keyup和blur事件会触发该函数的执行;
					//obj:当前表单元素jquery对象;
					//error:所设密码是否符合验证要求，验证不能通过error为true，验证通过则为false;
					//console.log(error);
//					obj.inter=setInterval(function (){
//						obj.parent().next().find(".Validform_checktip").hide();
//					},30);
					if(error){
						obj.parent().next().find(".Validform_checktip").show();
						obj.parent().next().find(".info").hide();
						obj.parent().next().find(".passwordStrength").hide();
					}else{
						obj.parent().next().find(".Validform_checktip").hide();
						obj.parent().next().find(".info").hide();
						obj.parent().next().find(".passwordStrength").show();	
					}
				}
			}
		}
	});
	/*结束表单验证*/
});