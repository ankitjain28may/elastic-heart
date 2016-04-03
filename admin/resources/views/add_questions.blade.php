@extends('common')
@section('content')
<script src="//cdn.ckeditor.com/4.5.7/basic/ckeditor.js"></script>
<style>
    .buttons{
        display: inline-block;
    };
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
                    </div>
                    <form action = "{{route('addquestions')}}" method = "post" enctype="multipart/form-data">
                        <div class="panel-body ">
                            <!-- question -->
                            <div class="form-group">
                                <label>Enter the question.</label>
                                <textarea class="form-control" name="question" id="editor1" rows="3" cols="80"></textarea>
                                <script>
                                    CKEDITOR.replace( 'question' );
                                </script>
                            </div>
                            <!-- image input -->       
                            <div class="form-group file_input">
                                <label>File input</label>
                                <input type="file" name = "file"><p></p>
                            </div>
                            @if(intval($type) > 2) 
                            <!-- options -->
                            <div class="form-group" id="container">
                                <label>Enter options for the answer.</label>
                                <div class="input-group">
                                    <span class='input-group-addon' id='basic-addon1'>A</span>
                                    <input class="form-control" placeholder="Enter option A" id="option_A" name="options[]" required>
                                </div>
                            </div>
                            <!-- add options  -->
                            <div class="tooltip-demo buttons" id="add_div">
                                <button type="button" class="btn  btn-success btn-circle" data-toggle="tooltip" data-placement="right" id="add"><i class="fa fa-plus"></i></button>
                            </div>
                            <br>
                            <div class="form-group">
                                <div class="form-group checkbox_op">
                                    <label>Check all correct answers.</label>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" id="checkbox_A" name = "answers[]" value="A" required>A
                                        </label>
                                    </div>
                                </div>

                            </div>
                            @else
                            <div class="form-group">
                                <label>Enter the answer.</label>
                                <div class="input-group">
                                    <input class="form-control" placeholder="Enter Answer"  name="answer" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Add Content TO HTML (OPTIONAL)</label>
                                <div class="input-group">
                                    <input class="form-control" placeholder="Enter Content"  name="html" >
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Enter Level</label>
                                <div class="input-group">
                                    <input type = "number" class="form-control" placeholder="Level"  min="0" name="level" required>
                                </div>
                            </div>
                            @endif

                            <div class="form-group">
                                <div class="input-group">
                                    {{csrf_field()}}
                                </div>
                            </div>
                        </div>
                       

                        <button type="submit" class="btn btn-info btn-lg btn-block" id="go">Submit Your Question.</button>

                    </div>    
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
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

    var i = 'A';
    var count = 0;

    function nextChar(c) {
        return String.fromCharCode(c.charCodeAt(0) + 1);
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

        $('.checkbox_op').append("<div class='checkbox' id='c"+i+"'><label><input type='checkbox' id='checkbox_A' value='"+ i +"' name='answers[]'>"+i+"</label></div>")

        if(i=='B'){   
            $('#add_div').append("<div class='tooltip-demo buttons' id='del_div'><button type='button' class='btn  btn-danger btn-circle' data-toggle='tooltip' data-placement='right' id='delete'><i class='fa fa-minus'></i></button></div>");
        };
    });

    var del = function(){
      $("#op_"+i).remove();
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

var j = 1;

$('#add_file').click(function(){
    j++;
    $('.file_input').append("<div class='form-group' id='op_"+j+"'></label><input type='file' name = 'file'></div>");
    if(j==2){
        $('#add_pic').append("<div class='tooltip-demo buttons'><button type='button' class='btn  btn-primary btn-circle' data-toggle='tooltip' data-placement='right' title='Add another Image.' id='del_file'><i class='fa fa-minus'></i></button></div>");
    }
    console.log(j);
})

var del_file = function(){
    $('#op_'+j).remove();
    j--;
    if(j == 1){
        $('#del_file').remove();
    }
    console.log(j);
}

$(document).on('click', '#del_file', del_file);

$('#go').click(function(){
    console.log($('#answers').val());
});
</script>
@stop