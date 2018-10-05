<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
	<meta name="description" content="Admin, Dashboard, Bootstrap" />
   <link rel="shortcut icon" sizes="196x196"  href="{{asset('favicon.png')}}">
	<title>@yield('title')</title>
	
	<link rel="stylesheet" href="{{asset('theme/libs/bower/font-awesome/css/font-awesome.min.css')}}">
	<link rel="stylesheet" href="{{asset('theme/libs/bower/material-design-iconic-font/dist/css/material-design-iconic-font.css')}}">
	<!-- build:css {{asset('theme/assets/css/app.min.css')}} -->
	<link rel="stylesheet" href="{{asset('theme/libs/bower/animate.css/animate.min.css')}}">
	<link rel="stylesheet" href="{{asset('theme/libs/bower/perfect-scrollbar/css/perfect-scrollbar.css')}}">
	<link rel="stylesheet" href="{{asset('theme/assets/css/bootstrap.css')}}">
	<link rel="stylesheet" href="{{asset('theme/assets/css/core.css')}}">
	<link rel="stylesheet" href="{{asset('theme/assets/css/app.css')}}">
	<link rel="stylesheet" href="{{asset('theme/assets/css/custom.css')}}">	
	<link rel="stylesheet" href="{{asset('theme/assets/sweetalert2/sweetalert2.min.css')}}">		
	<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">

	<!-- endbuild -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Noto Sans">
	<script src="{{asset('theme/libs/bower/breakpoints.js/dist/breakpoints.min.js')}}"></script>
	<script>
		Breakpoints();
	</script>	
	<style type="text/css">
		.loading_style{
		  position: fixed;background: rgba(224, 224, 224, 0.85);
		  color: #1f1d1d;text-align: center;z-index: 30000;height: 100%;width: 100%;
		  top: 0;
		}
		.modal-dialog{
			width: 70%;
		}

		@media only screen and (max-width: 768px){    

			.modal-dialog{
				
				width: 100%;
			
			}

		}

		#full_screen:-webkit-full-screen {
			  width: 100%;
			  height: 100%;
			}

		.new-header-color	{
				background: #3b3e47 !important;
				color:#fff !important
			}

		.navbar-brand{
			color: #fff !important
		}

  .btn-custom {
    color: #fff;
    background-color: #3b3e47;
    border-color: #3b3e47;
  }

  .btn-custom:hover{
    color: yellow;
  }

  .btn-custom:active,.btn-custom:focus{
    color: #fff;
  }

  body {
    font-family:  Noto Sans;
  }

	</style>

</head>

<body class="menubar-left menubar-unfold menubar-light theme-inverse" id="full_screen">
<div class="loading loading_style loading_status hide">
<!-- <button id="enter_full_screen" style="z-index: 166666666" class="btn btn-lg">close now</button> -->
            <div class="container" style="margin: 200px auto;">
                <div class="panel-body">
                    <h2><strong>Loading...</strong></h2>
                    <h4><i class="fa fa-circle-o-notch fa-spin fa-3x fa-fw" style="color:#58ba2b;"></i></h4>
                </div>
            </div>
</div>
<!--============= start main area -->


@include('nav_bar')

<!-- APP ASIDE ==========-->
@include('side_menu')
<!--========== END app aside -->

@yield('content')


	

	<!-- build:js {{asset('theme/assets/js/core.min.js')}} -->
	<script src="{{asset('theme/libs/bower/jquery/dist/jquery.js')}}"></script>
	<script src="{{asset('theme/libs/bower/jquery-ui/jquery-ui.min.js')}}"></script>
	<script src="{{asset('theme/libs/bower/jQuery-Storage-API/jquery.storageapi.min.js')}}"></script>
	<script src="{{asset('theme/libs/bower/bootstrap-sass/assets/javascripts/bootstrap.js')}}"></script>
	<script src="{{asset('theme/libs/bower/jquery-slimscroll/jquery.slimscroll.js')}}"></script>
	<script src="{{asset('theme/libs/bower/perfect-scrollbar/js/perfect-scrollbar.jquery.js')}}"></script>
	<script src="{{asset('theme/libs/bower/PACE/pace.min.js')}}"></script>
	<!-- endbuild -->

	<!-- build:js {{asset('theme/assets/js/app.min.js')}} -->
	<script src="{{asset('theme/assets/js/library.js')}}"></script>
	<script src="{{asset('theme/assets/js/plugins.js')}}"></script>
	<script src="{{asset('theme/assets/js/app.js')}}"></script>
	<!-- endbuild -->

	<!-- Custom -->
	<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

	<script type="text/javascript" src="{{asset('theme/assets/sweetalert2/sweetalert2.min.js')}}"></script>
  	<script src="//js.pusher.com/4.1/pusher.min.js"></script>
  	
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


    function showToast(message, duration, type=1){

        switch(type){
          case 0:
           swal({
                type: 'error',
                title: 'Ooops...',
                text: message,
                timer: duration,
                confirmButtonText:
              '<i class="fa fa-sad"></i> Try again',
              }).then(
                function () {},
                // handling the promise rejection
                function (dismiss) {
                  if (dismiss === 'timer') {
                    console.log('I was closed by the timer')
                  }
                }
              )
          break;
           case 2:
           swal({
                type: 'info',
                title: 'Ooops...',
                text: message,
                timer: duration,
                confirmButtonText:
              '<i class="fa fa-sad"></i> Try again',
              }).then(
                function () {},
                // handling the promise rejection
                function (dismiss) {
                  if (dismiss === 'timer') {
                    console.log('I was closed by the timer')
                  }
                }
              )
          break;
          default:
           swal({
                type: 'success',
                title: 'Completed',
                text: message,
                timer: duration,
                confirmButtonText:
              '<i class="fa fa-thumbs-up"></i> Ok',
              }).then(
                function () {},
                // handling the promise rejection
                function (dismiss) {
                  if (dismiss === 'timer') {
                    console.log('I was closed by the timer')
                  }
                }
              )
          break;

        }
             
    }


  	</script>

<script type="text/javascript">
$(document).ready(function(){

///// Change language
	  $("body").on("click",".change_lang",function(){                               
			
			lang = $(this).data("type");

			if (lang != "") {
				$.post("{{url('change_language')}}",{type:lang,_token:"{{ csrf_token() }}"},function(){}).done(function(res){
					if (res.status) {
						window.location.reload();
					}
				});
			}


		                
        })
	

	})
</script>


@yield('scripts')

@show
</body>
</html>