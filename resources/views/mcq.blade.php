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
									<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" >
									<span option-val='c'>C</span>Option 1
								</label>
							</div>
							<div class="radio">
								<label>
									<input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
									<span option-val='d'>D</span>Option 2
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
						<button type="button" class="btn btn-default btn-circle">1</button>
						<button type="button" class="btn btn-success btn-circle">23</button>
						<button type="button" class="btn btn-default btn-circle">1</button>
						

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
$(document).ready(function(){

	var clock = $('#clock').FlipClock({
		countdown:true,
		clockFace: 'MinuteCounter',
	});
	clock.setTime(1800);
	clock.start();

	$("#question").html(questions[0].question);
	$('#prev').attr("disabled", true)

	var data = [];
	var Data = [];
	var ques = {
		ques_id: '',
		answer: ''
	}

	var i = 0;

	var option = function(){
		return $('input[name=optionsRadios]:checked').val();
	}

	if(i==questions.length){
	}

	var submit = function(){
		ques.ques_id = questions[i].id;
		ques.answer = option();
	}

	var next = function(){
		if(i<questions.length){
			i++;
			$("#ques_no").html(i+1);
			$("#question").html(questions[i].question);
			$('#prev').attr("disabled", false);
		}
		if(i >= questions.length-1){
			$('#next').attr("disabled", true);
			$('#submit').attr("disabled", true);		
		}
	}

	var prev = function(){
		if(i>0){
			i--;
			$('#ques_no').html(i+1);
			$('#question').html(questions[i].question);
			$('#next').attr("disabled", false);
			$('#submit').attr("disabled", false);					
		}
		if(i <= 0){
			$('#prev').attr("disabled", true);
		}
	}

	var check = function(data){
		for(var j = 0; j<questions.length-1; j++){
			var count = 0;
			for(var k = j+1; k<questions.length-1; k++){
					if(data[j].ques_id != data[k].ques_id){
						count++;
					}
					if(count == data.length-1-j){
						Data.push(data[j]);
					}
			}
		}
	}


	$('#submit').click(function(){
		submit();
		console.log(ques);
		data.push(ques);
		console.log(i);
		ques = {};
		next();
	});

	$('#next').click(function(){
		next();
		console.log(i);		
	})	

	$('#prev').click(function(){
		prev();
		console.log(i);
	})
	
	$('#submit-sure').click(function(){
		ques.ques_id = questions[questions.length - 1].id;
		ques.answer = option();
		check();
		data.push(ques);
		console.log(data);
		$.post('mcq', Data, function(respnse){
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