$(document).ready(function(){
	$(".case").each(function(){
		$( this ).click(function(){
			$( this ).animate({
				position: 'absolute',
				left :'25%',
				top: '25%',
				height:'50%',
				width:'50%'
			});
		});
	});
});
