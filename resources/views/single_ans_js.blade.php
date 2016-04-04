<script type="text/javascript">
$(document).ready(function(){
	console.log('ready');
	function deal_ques(ques){
		if(ques == "" || ques == undefined){
			$('#q').hide();
			$('#ques').html('');
		}else{
			$('#q').show();
			$('#ques').html(ques);
		}
	}

	function deal_img(img){
		if(img == "" || img == undefined){
			$('#image').hide();
			$('#ques').attr('src', '');
		}else{
			$('#image').show();
			$('.image').attr('src', img);
		}
	}

	function deal_msg(stat, message){
		$('#message').html(message);
		$('#message').css('visibility', 'visible');
		if(stat == 1){
			$('#message').removeClass('alert-danger');
			$('#message').addClass('alert-success');
		}else{
			$('#message').removeClass('alert-success');
			$('#message').addClass('alert-danger');
		}

		$('#message').hide().fadeIn(500);
		console.log(stat);
		window.setTimeout(function(){
			$('#message').fadeOut(500);
		}, 2000);

	}

	$('#go').click(function(){
		// console.log('abhay');
		var data = { level: $('#level').html(),
		answer: $('input[name=send]').val(),
		_token: $('#_token').val(),};

		console.log(data);
		var try = $(this).children('a')
		try.text('.....')
		$.post('single_corr', data, function(res){
			console.log(res);
			
			if(res.status == 1){
				$('#q').hide();
				$('#image').hide();
				@if($event->type == 2)
				i = res.user_level + 1
				$('#lvls').append('<li><a class="goto" val=' + i + '><p>level ' + i +'</p></a></li>');
				@endif
				if(res.end == 1){
					window.location.reload();
					return false;
				}else{
					console.log('status = 1')
					$('#level').html(res.level);
					if(res.question.html != "" || res.question.html != null){
						window.location.reload();
					}
					deal_ques(res.question.question);
					deal_img(res.image);
				}
			}
			deal_msg(res.status, res.message);
			$('input[name=send]').val('');
			$('#_token').val(res._token);
			$('#rank').html("Rank "+res.rank);
		}).error(function(xhr){
			console.log(xhr.status);

		});
	});

	@if($event->type == 2 || $event->type == 3)
	$(document).on('click', '.goto', function(){
		var level = $(this).attr('val');
		$.get('fetch/'+level, function(res){
			if(res.status == 1){
				if(level < res.user_level)
					$('#go').hide();
				else
					$('#go').show();
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