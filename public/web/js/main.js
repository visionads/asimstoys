//$('.parallax-window').parallax({imageSrc: '/../img/body-bg.jpg'});
var $win = $(window);
var catBtn = $('.category-btn>.navbar-toggle');
var mainNav = $('.menu-area>.collapse');
catBtn.on('click', function (e) {
  e.preventDefault();
  if ($(this).parent().next('.category-dropdown-wrapper').children('ul').length) {
	mainNav.collapse('hide');
	$(this).parent().next('.category-dropdown-wrapper').children('ul').slideToggle();
  }
});
mainNav.on('show.bs.collapse', function () {
  if ($('.menu-area .category-dropdown-wrapper').children('ul').length) {
	$('.menu-area .category-dropdown-wrapper').children('ul').slideUp();
  }
});
function mobileCategoryMenu() {
  var catDropWrapper = $('.category-dropdown-wrapper'),
	  list = catDropWrapper.find('li'),
	  icon = list.find('.fa');
  icon.on('click', function (e) {
	e.preventDefault();
	var $this = $(this);
	if ($this.parent().next('ul').length) {
	  $this.toggleClass('active');
	  $this.parent().next('ul').slideToggle();
	}
  });
}
if ($win.width() < 768) {
  mobileCategoryMenu();
}
$("#img_01").elevateZoom({
  gallery: 'gallery_01',
  cursor: 'pointer',
  galleryActiveClass: 'active',
  responsive:true,
  imageCrossfade: true,
//  loadingIcon: 'http://www.elevateweb.co.uk/spinner.gif'
});
