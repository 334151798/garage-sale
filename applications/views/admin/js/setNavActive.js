jQuery(function ($){
  
  $allLink = $('ul.nav_ul li a');
  
  $allLink.each(function (){
	  $(this).click(function (){
		  $allLink.removeClass('active');
		  $(this).addClass('active');
	  });
  });
});