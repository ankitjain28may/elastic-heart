@extends('navigation2')

@section('content_mcq')
<div id="page-wrapper">
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-12 col-lg-4 col-lg-push-8 " id="id1">
				<div class="panel panel-default">
					<div class="panel-body">
						<div class="panel-heading" id="clock" style="padding:2%">
							<script src="{{URL::asset('public/js/flipclock.min.js')}}"></script>
						</div>
					</div>
				</div>
			</div>


			<div class="col-sm-12 col-lg-8 col-lg-pull-4" id="id2">
				<!-- Question Panel -->
				<div class="panel panel-default">
					<div class="panel-heading">
						<h5>Question <span id="ques_no">1</span>:</h5>
					</div>
					<div class="panel-body">
						<p id="question">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum tincidunt est vitae ultrices accumsan. Aliquam ornare lacus adipiscing, posuere lectus et, fringilla augue.</p>

						<div class="form-group" id="options-container">
							
						</div>
					</div>

					<div class="panel-footer text-center" id="mcq-btn">
						<button type="button" class="btn btn-danger pull-left" id="prev">Prev</button>
						<button type="button" class="btn btn-success btn-lg" id = "submit">Save</button>
						<button type="button" class="btn btn-danger pull-right" id="next">Next</button>
					</div>
				</div>
			</div>            

			<div class="col-sm-12 col-lg-4 col-lg-push-8" id="id3">
				<div class="panel panel-default">
					<div class="panel-body" style="padding:5%">
						<h2> <small>Questions</small> </h2>
						@for($i = 0; $i < count($questions); $i++)
						<button type="button" class="btn btn-default btn-circle nav-btn" id="q{{ $i }}" val="{{ $i }}">
							{{ $i + 1 }}
						</button>	
						@endfor
					</div>
				</div>
			</div>       

			<!-- /.row -->
		</div>
		<!-- /.container-fluid -->
	</div>
</div>
<script type="text/javascript">

var questions = {!! json_encode($questions) !!};
var duration = {{$duration * 60 }};
var eventName = '{{ $event->event_name }}';
$(document).ready(function(){

	
	var clock = $('#clock').FlipClock({
		countdown:true,
		clockFace: 'MinuteCounter',
	});
	clock.setTime(duration);
	clock.start();

	init(eventName, questions);
	init_gems(eventName);


	function init(eventKey, questions) {
		isinit = alreadyInitialized(eventKey);
		if(isinit) {
			initWithLastSeen(eventKey);
		}else{
			$("#question").html(questions[0].question);
			$('#prev').attr("disabled", true)
			
			var ans = [];
			for(var a = 0; a < questions.length; a++){
				ans[a] = {};
				ans[a].ques_id = questions[a].id ;
				ans[a].ans = '';
			};

			localStorage.setItem(eventKey+'Length', questions.length);
			localStorage.setItem(eventKey, JSON.stringify(questions));
			localStorage.setItem(eventKey+'Ans', JSON.stringify(ans));
		}
	}

	function alreadyInitialized(eventKey) {
		return !!localStorage.getItem(eventKey+'Length');
	}

	function initWithLastSeen(eventKey) {
		var index = +localStorage.getItem(eventKey+'CurrentQues') || 0;
		var ques = getQuestion(eventKey, index);
		$("#ques_no").html(index + 1);
		$("#question").html(ques.question);
		populate_options(ques.options);
		if(ques.answer != ''){
			$('input[value=' +  getQuestion(eventName, index).answer + ']').prop('checked', true);
		}else{		
		}

		if(index <= 0)
			$('#prev').attr("disabled", true);
		if(index + 1 === getLength(eventKey))
			$('#next').attr("disabled", true);
	}


	function getLength(eventKey) {
		return  +localStorage.getItem(eventKey+'Length');
	}

	function submitAnswer(eventKey, answer) {
		var data = getAnswers(eventKey);
		var q = getCurrentQuestion();
		data[q].ans = answer;
		localStorage.setItem(eventKey+"Ans" , JSON.stringify(data));

		$('#q' + q ).removeClass('btn-default');
		$('#q' + q ).addClass('btn-success');

	}

	function getQuestion(eventKey, index) {
		var data = JSON.parse(localStorage.getItem(eventKey));
		var ans = JSON.parse(localStorage.getItem(eventKey+"Ans"));
		localStorage.setItem(eventKey+'CurrentQues', index);		
		return {
			question: data[index].question,
			options: data[index].options,
			answer: ans[index].ans || ''
		};
	}

	function getAnswers(eventKey) {
		return JSON.parse(localStorage.getItem(eventKey+"Ans"));
	}

	function getCurrentQuestion() {
		console.log(+$("#ques_no").html() - 1 )
		return +$("#ques_no").html() - 1 ;  
	}

	var option = function(){
		return $('input[name=optionsRadios]:checked').val();
	}

	var submit = function(){
		submitAnswer(eventName, option());
	}

	/*var next = function(){
		var i = getCurrentQuestion();
		if(i + 1 < getLength(eventName)){
			$("#ques_no").html(i+2);
			$("#question").html(getQuestion(eventName, i+1).question);
			$('#prev').attr("disabled", false);
		}
		if(i + 2 === getLength(eventName) ){
			$('#next').attr("disabled", true);
			// $('#submit').attr("disabled", true);		
		}
	}

	var prev = function(){
		var i = getCurrentQuestion();
		if(i - 1 > -1){
			$('#ques_no').html(i);
			$('#question').html(getQuestion(eventName, i-1).question);
			$('#next').attr("disabled", false);
			$('#submit').attr("disabled", false);					
		}
		if(i - 1 <= 0){
			$('#prev').attr("disabled", true);
		}
	}*/



	var check = function(){
		var i = getCurrentQuestion();
		$('input[name="optionsRadios"]').prop('checked', false);

		if(getQuestion(eventName, i).answer != ''){
			$('input[value=' +  getQuestion(eventName, i).answer + ']').prop('checked', true);
		}
	}

	
	function init_gems(eventKey){
		ans = getAnswers(eventKey);
		for (var i = 0; i < getLength(eventKey); i++) {
			if(ans[i].ans != ''){
				// console.log(ans[i].ans + "   " +i)
				$('#q' + i ).removeClass('btn-default');
				$('#q' + i ).addClass('btn-success');
			}
		}
	}

	function populate_options(opt){
		console.log(opt);
		$('#options-container').html("");
		var opt_s="";
		for (var i = 0; i < 4; i++){
			var op = String.fromCharCode(65 + i);
			opt_s += 	'<div class="radio" ><label><input type="radio" name="optionsRadios" id="optionsRadios1" value="'+
												 op +'" >'+
												'<span option-val="'+ op
												+'">'+ op +'</span>'+ 
												opt[i]+'</label></div>'
		}
		$('#options-container').append(opt_s);

	}

	function populate(eventKey, index){
		var ques = getQuestion(eventKey, index);
		var options = ques.options;
		console.log('asd');
		console.log(options);
		populate_options(options);
		$('#ques_no').html(+index + 1);
		$('#question').html(ques.question);
		$('#next').attr("disabled", false);
		$('#prev').attr("disabled", false);

		if(index - 1 < 0){
			$('#prev').attr("disabled", true);
		}
		if(index + 1 === getLength(eventName)){
			$('#next').attr("disabled", true);
		}
	}

	$(".nav-btn").click(function(){
		var index = $(this).attr("val")
		console.log( "asjbkdkjasdn   " +index )
		populate(eventName, index);
	})


	$('#submit').click(function(){
		submit();
		populate(eventName, getCurrentQuestion() + 1);
		check();
	});

	$('#next').click(function(){
		populate(eventName, getCurrentQuestion() + 1);
		check();
	})	

	$('#prev').click(function(){
		populate(eventName, getCurrentQuestion() - 1);
		check();
	})
	
	$('#submit-sure').click(function(){
		var data = {ans :getAnswers(eventName)};

		$.post('mcq_corr', data, function(response){
			if(response == 1){
				console.log('succesful');
			}else{
				console.log('fail')
			}
		})
	});


	


	

});
</script>
@stop