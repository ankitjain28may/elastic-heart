<script type="text/javascript">
$(document).ready(function(){
	console.log('ready');
	$('#go').click(function(){
		console.log('abhay');
		var data = { level: $('#level').html(),
					answer: $('input[name=send]').val(),
					_token: $('#_token').val(),}
		console.log(data);
		$.post('single_corr', data, function(res){
			if(res.status == 1){
				$('#message_content').html(res.message);
				$('#message').addClass('alert-success');
				$('#ques').html(res.ques);
				$('#level').html(res.level);
			}else{
				$('#message').addClass('alert-danger');
				$('#message_content').html(res.message);
			}
			$('#rank').html(res.rank);
			$('#message').css('visibility', 'visible');
			window.setTimeout(function(){
				$('#message').removeClass('alert-danger');
				$('#message').removeClass('alert-success');
				$('#message').css('visibility', 'invisible');
			}, 3500);
		});
	});
});

</script>