

$("#menu-toggle").click(function(e) {
	
	e.preventDefault();
	$(this).find('span').toggleClass('"glyphicon glyphicon-menu-right');
	$("#wrapper").toggleClass("toggled");
	$(".logo").toggleClass("toggled");
	$("body").toggleClass("toggled");

	
});


