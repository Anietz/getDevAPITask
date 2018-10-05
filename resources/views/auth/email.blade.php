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
            background-color: #4d5458 !important;
        }

        #unlock-form .my-btn{
            display: block;
            margin: 0 auto;
            background-color: #fff;
            color: #188ae2;
            border-radius: 3px;
            width: 70%;
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
            <a href="index.html">
                <span>Sissl.me</span>
            </a>
        </div><!-- logo -->

        <div id="unlock-user" class="animated zoomInDown text-center">          
            <h4>Forgotten password</h4>
            
                <p class="msg_note" style="color:#d3d3d3"></p>
        </div>
        <div id="unlock-form" class="animated slideInUp">
            <form>                 
                <div class="form-group">
                    <input placeholder="Email address" type="email" class="form-control" id="email" required>
                </div>
                <div class="row">               
                    <div class="col-md-12 col-xs-12">                       
                        <input id="confirm_now" class="btn my-btn" type="button" value="Recover Password">
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

             var email = $("body").find("#email").val();
             if (email == ""){
                $("body").find(".msg_note").text("please enter your email");
                toastr.error("please enter your email")
             }else{

                me = $(this);
                me.attr("disabled",true).text("Sending")
                $.post("{{url('forgot_password')}}",{email:email,_token:"{{csrf_token()}}"},function(res){}).done(function(res){
                    me.attr("disabled",false).text("Recover Password")                    
                    if (res.status =="1"){
                        $("body").find(".msg_note").text(res.msg);
                        toastr.success(res.msg);
                        setTimeout(function(){
                            window.location.href = "{{url('login')}}"
                        },3000)
                    }else{
                        $("body").find(".msg_note").text(res.msg);                        
                        toastr.error(res.msg)
                    };
                })
             }
            });

           
        });
</script>

</body>
</html>