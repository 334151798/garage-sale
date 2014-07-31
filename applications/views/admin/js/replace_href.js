jQuery(function ($){
	/**
	 * 因为左边的导航没有被smarty解析，所以无法传入基本地址，在这里用一个js把href属性替换掉，省去维护成本
	 */
	
	var host = location.host;
	var base_url="http://"+host;
	
	if (host.indexOf("localhost")!=-1){
		base_url+="/tohaodian/admin/";
	}else{
		base_url+="/admin/";
	}
	
	$("a").each(function (){
		var hrefAttr=$(this).attr("href");
		$(this).attr("href",base_url+hrefAttr);
	});
	

	
});