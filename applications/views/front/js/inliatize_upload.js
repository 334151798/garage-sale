jQuery(function ($){
	/*开始图片上传*/
	
	//如果没有图片，就让那个div不显示
	function setUploadWrapDisplay(){
		if ($(".page .request .upload .upload_right ul li").length >0){
			$(".page .request .upload .upload_right").show();
		}else{
			$(".page .request .upload .upload_right").hide();
		}
	}
	
	//上传图片时，右上角的删除按钮js
	function delImgs(){
		var allCloseBtns = $(".close_light");
		$.each(allCloseBtns,function() {
			$(this).bind("mouseover",function() {
				$(this).css("background-position", "right top");
			});
			$(this).bind("mouseout",function() {
				$(this).css("background-position", "left top");
			});
			$(this).bind("click",function() {
				var _this=$(this);
				_this.parent().remove();
				setUploadWrapDisplay();
			});
		});
	}
	
	/*上传内容图片*/
	$('#article_imgs_upload').uploadify({
		'buttonText' : '上传图片',
		'width'         : 120,
		'height'        : 30,
		'fileSizeLimit' : '300KB',
		'fileTypeExts' : '*.gif; *.jpg; *.png',
		'removeTimeout' : 0.1,
		'swf'           : 'js/uploadify/uploadify.swf',
		'uploader'      : '{_$front_url_}upload/load/',
		'auto'          : true,
	    'multi'         : true,
	    'onUploadStart' : function(file) {
	    	$('#article_imgs_upload').uploadify('settings','articleType','2');
	    },
        'onUploadSuccess' : function(file, data, response) {
    	    alert(us);
	      //data=jQuery.parseJSON(data);
//		    $("#articlePics").append("<li><input type='hidden' value="+data+" name='thumbs[]'/><img  src='" + data + "' width='100' height='100'/><em class='close_light' style='right:-4px;top:-2px;'></em></li>");
		    delImgs();
		    setUploadWrapDisplay();
	    }
	});

	//删除按钮
	delImgs();
	
	setUploadWrapDisplay();
	
	/*结束图片上传*/
});