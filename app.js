$(document).ready(function(){	
	$('.portfolio-item').hover(
	  function() {
	    $(this).find('.search_hov').show("slow");
	  }, function() {
	    $(this).find('.search_hov').hide("slow");
	  }
	);
});