 @extends('common')
@section('content')

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
                        <div class="panel-body ">
                            <!-- question -->
                            <div class="form-group">
                                <label>Enter the question.</label>
                                <textarea class="form-control" rows="3"></textarea>
                            </div>
                            <!-- options -->
                            <div class="form-group">
                                <label>Enter options for the answer.</label>
                                <input class="form-control">
                                <p class="help-block">Enter Option 1.</p>
                            </div>
                            <!-- add options  -->
                            <div class="tooltip-demo">
                                <button type="button" class="btn  btn-success btn-circle" data-toggle="tooltip" data-placement="right" title="Add More Options"><i class="fa fa-plus"></i></button>
                            </div>
                            <br>
                            <!-- correct option/options -->
                            <div class="form-group">
                                <label>Enter the correct option.</label>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="optionsRadios" id="optionsRadios3" value="option3">
                                    </label>
                                </div>
                            </div>

                            <!-- for more than one answers -->
                            <div class="form-group">
                                <label>Check all correct answers.</label>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" value="">Checkbox 1
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" value="">Checkbox 2
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" value="">Checkbox 3
                                        </label>
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
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
@stop