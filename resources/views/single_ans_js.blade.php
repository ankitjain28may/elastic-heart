<script type="text/javascript">
$(document).ready(function(){
	console.log('ready');
	$('#go').click(function(){
		// console.log('abhay');
		var data = { level: $('#level').html(),
		answer: $('input[name=send]').val(),
		_token: $('#_token').val(),}
		console.log(data);
		$.post('single_corr', data, function(res){
			console.log('as');
			if(res.reload == 1){
				window.location.href = window.location.href;
			}
			if(res.status == 1){
				if(res.question.html != undefined){
					window.location.href = window.location.href;
				}
				$('#message').addClass('alert-success');
				$('#ques').html(res.question.question);
				$('#level').html(res.level);
				if(res.question.image == undefined){
					$('#image').hide();
				}else{
					$('#image').show();
					$('.image').attr('src', res.image);
				}
			}else{
				$('#message').addClass('alert-danger');
			}
			$('input[name=send]').val('');
			$('#message').html(res.message);
			$('#rank').html("Rank "+res.rank);
			$('#message').css('visibility', 'visible');
			$('#_token').val(res._token);
			window.setTimeout(function(){
				$('#message').removeClass('alert-danger');
				$('#message').removeClass('alert-success');
				$('#message').html('');
				$('#message').css('visibility', 'invisible');
			}, 3500);
		});
	});

@if($event->type == 2 || $event->type == 3)
$('.goto').click(function(){
	var level = $(this).attr('val');
	$.get('fetch/'+level, function(res){
		if(res.status == 1){
			if(res.question.question == ""){
				$('#q').hide();
			}else{
				$('#q').show();
				$('#ques').html(res.question.question);
			}
			if(res.question.image == ""){
				$('#image').hide();
			}else{
				$('#image').show();
				$('.image').attr('src', res.question.image);
			}
			$('#level').html(level);
		}
	});
});
@endif
});


</script>