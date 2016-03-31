@extends('common')
@section('content')
<<<<<<< HEAD
    <!-- Page Content -->
    <script src="//cdn.ckeditor.com/4.5.7/basic/ckeditor.js"></script>

  <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Add A New Question</h1>
=======
<script src="//cdn.ckeditor.com/4.5.7/basic/ckeditor.js"></script>
<style>
    .buttons{
        display: inline-block;
    }
</style>
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Add A New Question</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row ">
            <div class="col-lg-6 center-block">
                <div class="panel panel-default ">
                    <div class="panel-heading">
                        Enter your question details.
>>>>>>> 615e675a5faaa10c89c8b0e192a86b8116d196c6
                    </div>
                    <div class="panel-body ">
                        <!-- question -->
                        <div class="form-group">
                            <label>Enter the question.</label>
                            <textarea class="form-control" name="editor1" id="editor1" rows="3" cols="80"></textarea>
                            <script>
                                CKEDITOR.replace( 'editor1' );
                            </script>
                        </div>
<<<<<<< HEAD
                        <div class="panel-body ">
                            <!-- question -->
                            <div class="form-group">
                                <label>Enter the question.</label>
                                <textarea class="form-control" name="editor1" id="editor1" rows="3" cols="80"></textarea>
                                <script>
                                    CKEDITOR.replace( 'editor1' );
                                </script>
                            </div>
                            <!-- options -->
                            <div class="form-group" id="container">
                                <label>Enter options for the answer.</label>
                                <div class="input-group">
                                <span class='input-group-addon' id='basic-addon1'>A</span>
                                <input class="form-control" placeholder="Enter option A" id="option_A" name="options[]">
                                </div>
                            </div>
                            <!-- add options  -->
                            <div class="tooltip-demo" id="add_div">
                                <button type="button" class="btn  btn-success btn-circle"  data-placement="right" title="Add More Options" id="add"><i class="fa fa-plus"></i></button>
                            </div>
                            <br>
                            <!-- correct option/options -->
                            
                            <!-- for more than one answers -->
                            <div class="form-group">
                                <label>Correct answer</label>
                                    <div class="checkbox">
                                        <label>
                                            <input type="text" class="form-control" placeholder="A, B, C, D, etc." name = "answers[]" value="">
                                        </label>
                                    </div>
                            </div>   
                            <!-- image input -->       
                            <div class="form-group">
                                <label>File input</label>
                                <input type="file">
                            </div>
                            <div class="tooltip-demo">
                                <button type="button" class="btn  btn-primary btn-circle"  ><i class="fa fa-plus"></i></button>
=======
                        <!-- options -->
                        <div class="form-group" id="container">
                            <label>Enter options for the answer.</label>
                            <div class="input-group">
                                <span class='input-group-addon' id='basic-addon1'>A</span>
                                <input class="form-control" placeholder="Enter option A" id="option_A" name="options[]">
                            </div>
                        </div>
                        <!-- add options  -->
                        <div class="tooltip-demo buttons" id="add_div">
                            <button type="button" class="btn  btn-success btn-circle" data-toggle="tooltip" data-placement="right" id="add"><i class="fa fa-plus"></i></button>
                        </div>
                        <br>
                        <!-- correct option/options -->
                        <div class="form-group radio_op">
                            <label>Enter the correct option.</label>
                            <div class="radio" id="A">
                                <label>
                                    <input type="radio" name="optionsRadios" id="optionsRadios_A" value="optionA" checked>A
                                </label>
                            </div>
                        </div>

                        <!-- for more than one answers -->
                        <div class="form-group checkbox_op">
                            <label>Check all correct answers.</label>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" id="checkbox_A" value="">A
                                </label>
>>>>>>> 615e675a5faaa10c89c8b0e192a86b8116d196c6
                            </div>
                        </div>   
                        <!-- image input -->       
                        <div class="form-group">
                            <label>File input</label>
                            <input type="file">
                        </div>
                        <div class="tooltip-demo">
                            <button type="button" class="btn  btn-primary btn-circle" data-toggle="tooltip" data-placement="right" title="Add another Image."><i class="fa fa-plus"></i></button>
                        </div>
                    </div>

                    <button type="button" class="btn btn-info btn-lg btn-block">Submit Your Question.</button>

                </div>    
                <!-- /.panel -->
            </div>
            <!-- /.col-lg-12 -->
        </div>
<<<<<<< HEAD
        <script src="{{asset('bower_components/jquery/dist/jquery.min.js')}}"></script>
<script   src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"   integrity="sha256-xNjb53/rY+WmG+4L6tTl9m6PpqknWZvRt0rO1SRnJzw="   crossorigin="anonymous"></script>


        <script>
    // tooltip demo
    $('.tooltip-demo').tooltip({
        selector: "[data-toggle=tooltip]",
        container: "body"
    })
=======
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->

</div>
<script>
    // tooltip demo
/*    $('.tooltip-demo').tooltip({
        selector: "[data-toggle=tooltip]",
        container: "body"
    })*/
>>>>>>> 615e675a5faaa10c89c8b0e192a86b8116d196c6

    var i = 'A';
    var count = 0;

    function nextChar(c) {
<<<<<<< HEAD
    return String.fromCharCode(c.charCodeAt(0) + 1);
=======
        return String.fromCharCode(c.charCodeAt(0) + 1);
>>>>>>> 615e675a5faaa10c89c8b0e192a86b8116d196c6
    }

    function prevChar(d) {
        return String.fromCharCode(d.charCodeAt(0) - 1);
    }


    $('#add').click(function(){
        count += 1;        
        i = nextChar(i);
        if(count==1){
            $('#container').append('<p id="br"></p>');
        }

        $('#container').append("<div class = 'form-group' id='op_"+i+"' ><div class='input-group'><span class='input-group-addon' id='basic-addon1'>"+i+"</span><input class='form-control' placeholder='Enter option "+i+"' id='option_"+i+"' name='options[]'></div>");

<<<<<<< HEAD
        if(i=='B'){   
        $('#add_div').append("<div class='tooltip-demo' id='del_div'><button type='button' class='btn  btn-danger btn-circle'   id='delete'><i class='fa fa-minus'></i></button></div>");
=======
        $('.radio_op').append("<div class='radio' id='r"+i+"'><label style='display: block'><input type='radio' name='optionsRadios' id='optionsRadios_"+i+"' value='optionA' checked>"+i+"</label></div>");

        $('.checkbox_op').append("<div class='checkbox' id='c"+i+"'><label><input type='checkbox' id='checkbox_A' value=''>"+i+"</label></div>")

        if(i=='B'){   
            $('#add_div').append("<div class='tooltip-demo buttons' id='del_div'><button type='button' class='btn  btn-danger btn-circle' data-toggle='tooltip' data-placement='right' id='delete'><i class='fa fa-minus'></i></button></div>");
>>>>>>> 615e675a5faaa10c89c8b0e192a86b8116d196c6
        };
    });

    var del = function(){
<<<<<<< HEAD
          $("#op_"+i).remove();
        i = prevChar(i);
        console.log('x');
        if(i == 'A'){
            $('#del_div').remove();                        
        }
        count--;
        if(i==1){
            $('#container #br').remove();
        }
    };

    $(document).on('click', '#delete', del);

    </script>

=======
      $("#op_"+i).remove();
      $('#r'+i).remove();
      $('#c'+i).remove();
      i = prevChar(i);
      console.log('x');
      if(i == 'A'){
        $('#del_div').remove();                        
    }
    count--;
    if(i==1){
        $('#container #br').remove();
    }
};

$(document).on('click', '#delete', del);
</script>
>>>>>>> 615e675a5faaa10c89c8b0e192a86b8116d196c6
@stop