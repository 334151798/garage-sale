jQuery(function($){

	$("input.text,textarea").focus(function (){//focus时，加一个focus的class，用来设置状态
		$(this).addClass("focus");
		$(this).next(".tip") ? $(this).next(".tip").hide() : null;
	});
	$("input.text,textarea").blur(function (){
		$(this).removeClass("focus");
		$(this).val() ? null : $(this).next(".tip").show();
	});
})