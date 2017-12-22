//pane changing
$(document).ready(function(){
  $('.pane').hide();
	$('#home').show();
  $('#home_item').addClass('active');

  //show and hide panes
	$('#home_button').on('click', function(){
		$('.pane').hide();
    $('.nav-item').removeClass('active');
    $('#home_item').addClass('active');
		$('#home').show();
	});
  $('#port_button').on('click', function(){
    window.location = "http://belsthomaz.portfoliobox.net/";
		//$('.pane').hide();
    //$('.nav-item').removeClass('active');
    //$('#port_item').addClass('active');
		//$('#portfolio').show();
	});
  $('#diss_button').on('click', function(){
		window.location = "http://projectlearn.freeforums.net/";
	});
	$('#about_button').on('click', function(){
		$('.pane').hide();
    $('.nav-item').removeClass('active');
    $('#about_item').addClass('active');
		$('#about').show();
	});
	$('#contact_button').on('click', function(){
		$('.pane').hide();
    $('.nav-item').removeClass('active');
    $('#contact_item').addClass('active');
		$('#contact').show();
	});
});
