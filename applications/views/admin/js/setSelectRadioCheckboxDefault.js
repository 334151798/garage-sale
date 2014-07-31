jQuery(function ($){
	//设置select的默认选中，因为有联动，所以把它注册成函数，在联动之后再次调用
	jQuery.setDefaultSelect=function (){
		$('select').each(function (){
			var val;
			if (val=$(this).attr('ov'))
			{
			  var parseVal=jQuery.parseJSON(val);
			  if(parseVal instanceof Array)
			  {
			    if (eq=$(this).attr('eq'))
			    {
			      val = parseVal[eq];
			    }
			  }
			  $(this).find('option[value='+val+']').attr('selected','true');
			}
		});
	}
	jQuery.setDefaultSelect();
	//设置checkbox的默认选中
	$('.checkbox_ul').each(function (){
		var val;
		if (val=jQuery.parseJSON($(this).attr('ov')))
		{
		  for (var i=0,l=val.length;i<l;i++)
		  {
			  $(this).find('input[value='+val[i]+']').attr('checked','true');
		  }
		}
	});
	//设置单选框的默认选中
	$('.radio_wrap').each(function (){
		var val;
		if (val=$(this).attr('ov'))
		{
		  for (var i=0,l=val.length;i<l;i++)
		  {
			  $(this).find('input[value='+val[i]+']').attr('checked','true');
		  }
		}
	});
	
	//解析所有的图片
    if($("#articlePics") && jQuery.parseJSON($("#articlePics").attr('ov'))){
    	var imgsList=jQuery.parseJSON($("#articlePics").attr('ov'));
    	for(var i=0,l=imgsList.length;i<l;i++){
          $("#articlePics").append("<li style='width:100px;height:100px;'><input type='hidden' value="+imgsList[i]+" name='thumbs[]'/><img  src='" + imgsList[i] + "' width='100px' height='100px'/><em class='close_light' style='right:-4px;top:-2px;'></em></li>");
    	}
    }
});