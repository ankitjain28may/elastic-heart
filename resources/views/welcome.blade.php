<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <style>body{padding-top: 60px;}</style>
    
    
    <link rel="stylesheet" href="{{URL::asset('public/css/bootstrap.min.css')}}">
    <link href="{{URL::asset('public/css/login-register.css')}}" rel="stylesheet" />
    <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
    
    <script   src="https://code.jquery.com/jquery-2.2.2.min.js"   
    integrity="sha256-36cp2Co+/62rEAAYHLmRCPIych47CvdM+uTBJwSzWjI="   
    crossorigin="anonymous"></script>
    <script src="{{URL::asset('public/js/bootstrap.min.js')}}"></script>
    <script src="{{URL::asset('public/js/login-register.js')}}" type="text/javascript"></script>

</head>
<body onload="openLoginModal();">
    <div class="container">
        <!-- <div class="row">
            <div class="col-sm-4"></div>
            <div class="col-sm-4">
                 <a class="btn big-login" data-toggle="modal" href="javascript:void(0)" onclick="openLoginModal();">Log in</a>
                 <a class="btn big-register" data-toggle="modal" href="javascript:void(0)" onclick="openRegisterModal();">Register</a></div>
            <div class="col-sm-4"></div>
        </div>
    -->

    <div class="modal fade login" id="loginModal">
      <div class="modal-dialog login animated">
          <div class="modal-content">
           <div class="modal-header">
            <!-- <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button> -->
            <h4 class="modal-title">Login with</h4>
        </div>
        <div class="modal-body">  
            <div class="box">
               <div class="content">
                <div class="social">

                    <a id="google_login" class="circle google" href="social/google">
                        <i class="fa fa-google-plus fa-fw"></i>
                    </a>
                    <a id="facebook_login" class="circle facebook" href="social/facebook">
                        <i class="fa fa-facebook fa-fw"></i>
                    </a>
                </div>
                <div class="division">
                    <div class="line l"></div>
                    <span>or</span>
                    <div class="line r"></div>
                </div>
                <div class="error"></div>
                <div class="form loginBox">
                    <form method="post" action="/login" accept-charset="UTF-8">
                        <input id="email" class="form-control" type="text" placeholder="Email" name="email">
                        <input id="password" class="form-control" type="password" placeholder="Password" name="password">
                        <input id="_token2" value="{{ csrf_token() }}" name="_token" hidden>

                        <input class="btn btn-default btn-login" type="button" value="Login" onclick="loginAjax()">
                    </form>
                </div>
            </div>
        </div>
        <div class="box">
            <div class="content registerBox" style="display:none;">
               <div class="form">
                <form>
                    <input id="team_name" class="form-control" type="text" placeholder="Team Name" name="team_name" required>
                    <input id="zeal1" class="form-control" type="text" placeholder="Zeal ID 1" name="zeal1" required>
                    <input id="zeal2" class="form-control" type="text" placeholder="Zeal ID 2" name="zeal2" >

                    <input id="name" class="form-control" type="text" placeholder="Name 1" name="name" required>
                    <input id="email2" class="form-control" type="text" placeholder="Email 1" name="email" required>
                    <input id="name1" class="form-control" type="text" placeholder="Name 2" name="name2" >
                    <input id="email3" class="form-control" type="text" placeholder="Email 2" name="email2" >
                    <input id="contact1" class="form-control" type="text" placeholder="Contact 1" name="email2" required>
                    <input id="contact2" class="form-control" type="text" placeholder="Contact 2" name="email2" >
                    

                    <input id="password2" class="form-control" type="password" placeholder="Password" name="password">
                    <input id="password_confirmation" class="form-control" name ="password_confirmation" type="password" placeholder="Repeat Password" name="password_confirmation">
                    <!-- Avatars Div  -->
                    <input id="_token" value="{{ csrf_token() }}" name="_token" hidden>
                    <div class="avatars">
                        <p> Choose an avatar </p>
                        <img src="{{ URL::asset('public/image/flash.png') }}" id="avt1" class="avatar-img">
                        <img src="{{ URL::asset('public/image/spider.png') }}" id="avt2" class="avatar-img">
                        <img src="{{ URL::asset('public/image/bat.png') }}" id="avt3" class="avatar-img">
                        <img src="{{ URL::asset('public/image/super.png') }}" id="avt4" class="avatar-img">
                        <img src="{{ URL::asset('public/image/arrow.png') }}" id="avt5" class="avatar-img">
                        <img src="{{ URL::asset('public/image/ironman.png') }}" id="avt6" class="avatar-img">
                        <img src="{{ URL::asset('public/image/girl.png') }}" id="avt7" class="avatar-img">
                        <img src="{{ URL::asset('public/image/blackw.png') }}" id="avt8" class="avatar-img">
                        <img src="{{ URL::asset('public/image/hulk.png') }}" id="avt9" class="avatar-img">
                        <img src="{{ URL::asset('public/image/captain.png') }}" id="avt10" class="avatar-img">
                    </div>
                    <input class="btn btn-default btn-register" type="button" onclick="signupAjax()" value="Create account" name="commit">
                </form>
            </div>
        </div>
    </div>
</div>
<div class="modal-footer">
    <div class="forgot login-footer">
        <span>Looking to 
           <a href="javascript: showRegisterForm();">create an account</a>
           ?</span>
       </div>
       <div class="forgot register-footer" style="display:none">
           <span>Already have an account?</span>
           <a href="javascript: showLoginForm();">Login</a>
       </div>
   </div>        
</div>

<script type="text/javascript">
$(document).ready(function(){
    avatar = ''
    preav = $('#avt1');
    $('.avatar-img').click(function(){
        preav.css('border', '0');
        avatar = $(this).attr('src');
        preav = $(this);
        console.log('as  ' + avatar);
        $(this).css('border', '2px solid black');
    });
});

function signupAjax(){
    var data = {name: $('#name').val(),
    email2: $('#email3').val(),
    name2: $('#name1').val(),
    zeal1: $('#zeal1').val(),
    zeal2: $('#zeal2').val(),
    contact1: $('#contact1').val(),
    contact2: $('#contact2').val(),
    email: $('#email2').val(),
    team_name: $('#team_name').val(),

    password: $('#password2').val(),
    password_confirmation: $('#password_confirmation').val(),
    avatar: avatar,
    _token: $("#_token").val()};

    $.post('signup', data, function(res){
        if(res == 1)
            window.location.reload();
        else
            console.log('iskimaki');
    });
}

function loginAjax(){
    var data = {email: $('#email').val(),
    password: $('#password').val(),
    _token: $('#_token2').val(),
};

$.post('login', data, function(res){
    window.location.reload();
});
}
</script>
</div>
</div>
</div>
</body>
</html>
