$(document).ready(function(){
	const base_url = 'http://localhost/Perpussy/';
	$('.card-class').matchHeight();

	$('.btn-load-more').on('click',function(){
		var id_last = $('.col-content:last').attr('data-id');
		$('.loader').show();
		$.ajax({
			url: 'C_Index/getDataMore?id_last='+id_last,
			success: function(response){
				setTimeout(function(){
					$('.loader').hide();
					$('.col-content:last').after(response);
					$('.card-class').matchHeight();
					$('html, body').animate({
                    scrollTop: $(".card-body:last").offset().top
                	}, 2000);
				},2000)
			}
		})
	})

	$('.btn-batal').on('click',function(){
		window.location.href = base_url+'C_Buku';
	})

	$('.img-cover').hover(
	function(){

	},
	function(){

	}
	)

	$('.datepicker').datepicker({
		format: 'yyyy/mm/dd'
	});


});
