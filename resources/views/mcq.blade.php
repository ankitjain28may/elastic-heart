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

						<div class="form-group">
							<div class="radio">
								<label>
									<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" >
									<span option-val='a'>A</span>Option 1
								</label>
							</div>
							<div class="radio">
								<label>
									<input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
									<span option-val='b'>B</span>Option 2
								</label>
							</div>
							<div class="radio">
								<label>
									<input type="radio" name="optionsRadios" id="optionsRadios1" value="option3" >
									<span option-val='c'>C</span>Option 3
								</label>
							</div>
							<div class="radio">
								<label>
									<input type="radio" name="optionsRadios" id="optionsRadios2" value="option4">
									<span option-val='d'>D</span>Option 4
								</label>
							</div>
						</div>
					</div>

					<div class="panel-footer text-center" id="mcq-btn">
						<button type="button" class="btn btn-danger pull-left" id="prev">Prev</button>
						<button type="button" class="btn btn-success btn-lg" id = "submit">SUBMIT</button>
						<button type="button" class="btn btn-danger pull-right" id="next">Next</button>
					</div>
				</div>
			</div>            

			<div class="col-sm-12 col-lg-4 col-lg-push-8" id="id3">
				<div class="panel panel-default">
					<div class="panel-body" style="padding:5%">
						<h2> <small>Questions</small> </h2>
						<button type="button" class="btn btn-default btn-circle nav-btn" ques="">1</button>	

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
var duration = {{$duration}};
var eventName = '{{ $event->event_name }}';
$(document).ready(function(){

	var clock = $('#clock').FlipClock({
		countdown:true,
		clockFace: 'MinuteCounter',
	});
	clock.setTime(1800);
	clock.start();

	init(eventName, questions);

	function init(eventKey, questions) {
		var ques = [];
		var ans = [];
		for(var a = 0; a < questions.length; a++){
			data[a] = {};
			data[a].question = questions[a];
			ans[a][questions[a].ques_id] = '';
		};
		localStorage.setItem(eventKey+'Length', questions.length);
		localStorage.setItem(eventKey, JSON.stringify(data));
		localStorage.setItem(eventKey+'Ans', JSON.stringify(ans));
		$("#question").html(questions[0].question);
		$('#prev').attr("disabled", true)
	}

	function getLength(eventKey) {
		return localStorage.getItem(eventKey+'Length');
	}

	function submitAnswer(eventKey, answer) {
		var data = JSON.parse(localStorage.getItem(eventKey));
		data[i].ques_id = questions[i].id;
		data[i].answer = answer;
		localStorage.setItem(eventKey, JSON.stringify(data));
	}

	function getQuestion(eventKey, index) {
		var data = JSON.parse(localStorage.getItem(eventKey));
		return {
			question: data[index].question,
			answer: data[index].answer || 'option1'
		};
	}

	function getCurrentQuestion() {
		return +$("#ques_no").html();  
	}

	var option = function(){
		return $('input[name=optionsRadios]:checked').val();
	}

	var submit = function(){
		submitAnswer(eventName, option());
	}

	var next = function(){
		var i = getCurrentQuestion();
		if(i < getLength()){
			$("#ques_no").html(i+1);
			$("#question").html(getQuestion(eventName, i+1).question);
			$('#prev').attr("disabled", false);
		}
		if(i >= getLength()-1){
			$('#next').attr("disabled", true);
			$('#submit').attr("disabled", true);		
		}
	}

	var prev = function(){
		var i = getCurrentQuestion();
		if(i > 0){
			$('#ques_no').html(i-1);
			$('#question').html(getQuestion(eventName, i-1).question);
			$('#next').attr("disabled", false);
			$('#submit').attr("disabled", false);					
		}
		if(i <= 0){
			$('#prev').attr("disabled", true);
		}
	}



	var check = function(){
		var i = getCurrentQuestion();
		console.log("it works");
		if(getQuestion(eventName, i).answer){
			console.log(getQuestion(eventName, i).answer);
			$('input[value=' +  getQuestion(eventName, i).answer + ']').prop('checked', true);
		}else{
			console.log(getQuestion(eventName, i).answer);
			$('input[name="optionRadios"]').prop('checked', false)
		}
	}















	$('#submit').click(function(){
		var i = getCurrentQuestion()
		submit();
		console.log(getQuestion(eventName, i));
		console.log(i);
		next();
		check();
	});

	$('#next').click(function(){
		next();
		check();
		console.log(i);		
	})	

	$('#prev').click(function(){
		prev();
		check();
		console.log(i);
	})
	
	$('#submit-sure').click(function(){
		data[data.length - 1].ques_id = questions[questions.length - 1].id;
		data[data.length - 1].answer = option();	
		console.log(data);
		$.post('mcq', data, function(response){
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