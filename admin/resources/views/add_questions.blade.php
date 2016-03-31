 @extends('common')
@section('content')
    <!-- Page Content -->
    <script src="//cdn.ckeditor.com/4.5.7/basic/ckeditor.js"></script>

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
                            </div>
                        </div>

                        <button type="button" class="btn btn-info btn-lg btn-block">Submit Your Question.</button>

                    </div>    
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <script src="{{asset('bower_components/jquery/dist/jquery.min.js')}}"></script>
<script   src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"   integrity="sha256-xNjb53/rY+WmG+4L6tTl9m6PpqknWZvRt0rO1SRnJzw="   crossorigin="anonymous"></script>


        <script>
    // tooltip demo
    $('.tooltip-demo').tooltip({
        selector: "[data-toggle=tooltip]",
        container: "body"
    })

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

        if(i=='B'){   
        $('#add_div').append("<div class='tooltip-demo' id='del_div'><button type='button' class='btn  btn-danger btn-circle'   id='delete'><i class='fa fa-minus'></i></button></div>");
        };
    });

    var del = function(){
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

@stop