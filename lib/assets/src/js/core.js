(function($){
	var body = $('body');
	var listItem = $('.testi-dropdown li');

	$("#project-slideshow").owlCarousel({
	  navigation : true, // Show next and prev buttons
	  slideSpeed : 300,
	  autoPlay: true,
	  paginationSpeed : 400,
	  pagination: true,
	  singleItem: true
	});

	$("#testimonial-slider").owlCarousel({
	  navigation : true, // Show next and prev buttons
	  slideSpeed : 1000,
	  autoPlay: true,
	  paginationSpeed : 800,
	  items: 2,
	  itemsDesktop : [5000,2], //5 items between 1000px and 901px
	  itemsDesktopSmall : [1170,2], // betweem 900px and 601px
	  itemsTablet: [992,2], //2 items between 600 and 0
	  itemsMobile : [768,1], // itemsMobile disabled - inherit from itemsTablet option
	  pagination: true,
	  stopOnHover: true,
	});

	listItem.click(function(){
		listItem.removeClass('on');
		$(this).toggleClass('on');
	});

	$(window).load(function(){
		body.css({'opacity':'1'});
	});

	$('#mobile-btn').click(function(){
		window.scrollTo(0,0)
		body.toggleClass('active-menu');
	});

}(jQuery));