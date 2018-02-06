$(document).ready(function(){
	slide();
	changeCards();
  thumbnail();
	document.getElementById('x').addEventListener('click', function () {
    if (this.classList.contains('clicked')) {
      this.classList.remove('clicked');
      $('nav').removeClass('clicked');
      $('header').removeClass('clicked');
    } else {
      this.classList.add('clicked');
      $('nav').addClass('clicked');
      $('header').addClass('clicked');
    };
  });
});
$(window).resize(function(){
	changeCards();
});


function slide(){
	$('.banner').bjqs({
        width       : 1400,
        height      : 620,
        responsive  : true,
        animtype	: 'fade'
    });
}
function changeCards(){
	var objWidth = $(window).width();
	if(objWidth>768){
		$('.info').addClass('cards');
		$('.info').children('.column').removeClass('cards');
	}else{
		$('.info').removeClass('cards');
		$('.info').children('.column').addClass('cards');
	};
}
function thumbnail(){
  $('.thumbnail li').first().addClass('actived');
  $('.thumbnail li').click(function(event) {
    var src_img = $(this).children('img').attr('src');
    $('.productImg img').attr('src',src_img);
    console.log(src_img);
    $('.thumbnail li').removeClass('actived');
    $(this).addClass('actived');
  });
}