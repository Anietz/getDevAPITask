<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
	<meta name="description" content="Admin, Dashboard, Bootstrap" />
	<link rel="shortcut icon" sizes="196x196" href="{{asset('theme/assets/images/logo.png')}}">
	<title>Account Activation</title>
	
	<link rel="stylesheet" href="{{asset('theme/libs/bower/font-awesome/css/font-awesome.min.css')}}">
	<link rel="stylesheet" href="{{asset('theme/libs/bower/material-design-iconic-font/dist/css/material-design-iconic-font.css')}}">
	<!-- build:css {{asset('theme/assets/css/app.min.css')}} -->
	<link rel="stylesheet" href="{{asset('theme/libs/bower/animate.css/animate.min.css')}}">
	<link rel="stylesheet" href="{{asset('theme/libs/bower/fullcalendar/dist/fullcalendar.min.css')}}">
	<link rel="stylesheet" href="{{asset('theme/libs/bower/perfect-scrollbar/css/perfect-scrollbar.css')}}">
	<link rel="stylesheet" href="{{asset('theme/assets/css/bootstrap.css')}}">
	<link rel="stylesheet" href="{{asset('theme/assets/css/core.css')}}">
  <link rel="stylesheet" href="{{asset('theme/assets/css/misc-pages.css')}}">
	<link rel="stylesheet" href="{{asset('theme/assets/css/app.css')}}">
	<!-- endbuild -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:400,500,600,700,800,900,300">
	<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
	<script src="{{asset('theme/libs/bower/breakpoints.js/dist/breakpoints.min.js')}}"></script>

	<script>
		Breakpoints();
	</script>
	<style type="text/css">
		.simple-page {
    		background-color: #272b2d !important;
		}

		#unlock-form .my-btn{
		    display: block;
		    margin: 0 auto;
		    background-color: #fff;
		    color: #188ae2;
		    border-radius: 3px;
		    width: 120px;
		    height: 40px;
		    text-align: center;
		}
	</style>
</head>

<body class="simple-page">

 <div id="back-to-home">
		<a href="{{url('/')}}" class="btn btn-outline btn-default"><i class="fa fa-home animated zoomIn"></i></a>
	</div>
	<div class="simple-page-wrap">
		<div class="simple-page-logo animated swing">
			<a href="#">
				<span>Sissl.me</span>
			</a>
		</div><!-- logo -->

		<div id="unlock-user" class="animated zoomInDown">
			<div class="avatar avatar-xl avatar-circle">
				<img class="img-responsive" src="{{asset('theme/assets/images/user.jpg')}}" alt="avatar"/>
			</div><!-- .avatar -->
			<h4>Dear {{Auth::user()->username}}</h4>
			<p class="text-center" style="color: #d3d3d3;" >We sent you an email, type in the code to activate your account</p>
		</div>
		<div id="unlock-form" class="animated slideInUp">
			<form >
				<div class="form-group">
					<input type="text" id="code" class="form-control" placeholder="Enter Code" autocomplete="off">
				</div>
				<div class="row">
					<div class="col-md-6 col-xs-6">
						<input id="confirm_now" class="btn my-btn"  type="button" value="Confirm">						
					</div>
					<div class="col-md-6 col-xs-6">						
						<input id="resend_now" class="btn my-btn" type="button" value="Resend">
					</div>					
				</div>
			</form>
		</div>

</div><!-- .simple-page-wrap --> 
<script src="{{asset('theme/libs/bower/jquery/dist/jquery.js')}}"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

	<script type="text/javascript">
  		
        toastr.options = {
        "closeButton": false,
        "debug": false,
        "newestOnTop": false,
        "progressBar": false,
        "positionClass": "toast-bottom-left",
        "preventDuplicates": true,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
          }

  	</script>



<script type="text/javascript">
	
	$(document).ready(function() {

            $("body").on("click","#confirm_now", function(e){
            	e.preventDefault();

             var code = $("body").find("#code").val();
             if (code == ""){
                toastr.error("please enter code from your email")
             }else{
             	me = $(this);
             	me.val("confirming code...").attr("disabled",true)
                $.post("{{url('confirm_email')}}",{code:code,_token:"{{csrf_token()}}"},function(res){}).done(function(res){
                    if (res.status =="1"){
                     location.href = "{{url('home')}}";
                    }else{
                     toastr.error(res.msg)
                    };
                })
             }
            });

            $("body").on("click","#resend_now", function(e){
            e.preventDefault();
             var code = confirm("Are you sure you want to resend the code?")
             if (!code){
               return false;
             }else{
             	me = $(this);
             	me.val("resending code...").attr("disabled",true)
                $.post("{{url('resend_code')}}",{_token:"{{csrf_token()}}"},function(res){}).done(function(res){
                    if (res.status =="success"){
                    me.val("Resend").attr("disabled",false)
                     toastr.success(res.msg)
                    }
                })
             }
            });
		});
</script>

</body>
</html>