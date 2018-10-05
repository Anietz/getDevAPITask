@extends('layout')
@section('title',"Games")
@section('content')

<style type="text/css">
 .banner-text h1 {
    margin-bottom: 45px;
    line-height: 1.2;
}
.banner-text * {
    color: #fff;
}

@import "~assets/welcome_page/style-5.css";

 .half-width{
     width: 46%;
 }

 .action-buttons{
    padding-top: 0px;
 }

 .video-container{
     padding:0px;
 }

 .banner-text h1 {
    margin-bottom: 45px;
    line-height: 1.2;
}
.banner-text * {
    color: #fff;
}
h1 {
    font-size: 48px;
    font-weight: 400;
}

.banner-text p {
    margin-bottom: 65px;
}

.btn-set .btn:first-child {
    margin-right: 25px;
}
.btn-set a:first-child {
    margin-right: 25px;
}
.banner-text .btn {
    position: relative;
    padding-left: 40px;
    font-size: 22px;
}
.home-slider.owl-carousel, .home-slider.owl-carousel * {
    z-index: 10;
}
.btn-set a {
    max-width: 45%;
}

.btn-transparent {
    background-color: transparent;
    color: #fff;
    border: 1px solid #fff;
}
.btn-round {
    border-radius: 50px;
}
.btn {
    font-size: 18px;
    width: 220px;
    max-width: 100%;
    padding: 17px 5px;
    line-height: 1;
}
   
   body {
    padding-top: 80px; 
 }

 .starter-template {
    padding: 0rem 1.5rem;
    background-color: #ececec;
    height: 100vh;
}

@media (max-width:62em){
    .starter-template {
        padding: 1rem 1.5rem;
        height: 200vh;
    }
}


.content{
    padding: 20px;
    height: 450px;
    margin-bottom: 15px;
    /* background: #d3d3d3; */
}

.second{
    padding: 0;
}

.second .list-group-item{
    margin-bottom: 20px;
    padding: 31px;
    border-radius: 0;
    /* background-color: #2196F3; */
}

.second  i{
    font-size: 26px;
    margin-right: 17px;
}

.first{
    background: #fff;  
}

.first .list-group-item{
    margin-bottom: 16px;
    background: transparent;
    border: 0;
    color: #2196F3;
    border-bottom: 1px dotted;
}

.first .list-group-item:last-child{
    border: 0;
}
.first .list-group{
    margin-top: 25px;
}

.badge{
background-color: #F44336;
font-size: 143%;
    
}

.score-board{
    color: #858e94;
    background: #fff;
    padding: 10px 20px;
    text-align: center;
    border-radius: 17px;
    margin-bottom: 22px;
}



table {
    background-color: #fff;
    border-radius: 11px;
}


.first .content{
    height: 80vh;
    margin-bottom: 15px;
    margin-left: -21px;
    padding: 0;
    margin-right: -15px;
}

.first .img{
    height: 40%;
    background-size: cover;
    background-repeat: no-repeat;
}

.first .cont{
    background: #00647b;
    height: 60%;
    color: #fff;
    padding: 20px;
    margin-left: -1px;
    
}

.first .cont h5{
    font-size: 13px;
}

.bold{
    font-weight: bold;
}

.lights{
    font-weight: 100;

}

.hash{
    color: #cac6c6;
}
.title{
    font-size: 17px;
}
.status{
    list-style: none;
    display: block;
    width: 100%;
    border: 0;
}
.status li{
    margin-right: 33px;
    font-size: 15px;
}
.fades{
    color: #d3d3d39e;
}
.btn{
    padding: 6px;
    width: 106px;
}

.score-board  h1{
    font-size: 16px;
    color: #0a6ab7;
    font-weight: bolder;
}

.empty{
    padding: 20px;
    color: #a9a9a9bd;
    margin-top: 100px;
}

.empty i{
    font-size: 66px;
}

.red{
    color: red !important;
}

.wrap{
    margin-left: -3px;
}

@media(max-width:62em){
    .table {
        width: 100%;
    }
}
</style>
<!-- navbar search -->
<div id="navbar-search" class="navbar-search collapse">
  <div class="navbar-search-inner">
    <form action="#">
      <span class="search-icon"><i class="fa fa-search"></i></span>
      <input class="search-field" type="search" placeholder="search..."/>
    </form>
    <button type="button" class="search-close" data-toggle="collapse" data-target="#navbar-search" aria-expanded="false">
      <i class="fa fa-close"></i>
    </button>
  </div>
  <div class="navbar-search-backdrop" data-toggle="collapse" data-target="#navbar-search" aria-expanded="false"></div>
</div><!-- .navbar-search -->

<!-- APP MAIN ==========-->
<main id="app-main" class="app-main">
  <div class="wrap">
  <section class="app-content">


       <div class="row">
         <div class="col-md-4 first">
            <div class="content">
                <div class="img" style="background-image: url('{{asset('images/'.$game->image_url)}}') "></div>
                <div class="cont">
                  <h2 class="title">{{$game->name}}</h2>
                  <h5 class="lights hash">{{$game->description}}</h5>
                  <h5 class="lights "><span class="hash">Game Day:</span> {{$game->start_date}}</h5>
                  <h5 class="lights "> <span class="hash">Amount:</span> {{$game->amount}}</h5>
                  <h5 class="lights "><span class="hash"> Questions: </span>{{$game->number_of_questions}}</h5>
                  <h5 class="lights "><span class="hash"> Score per Question: </span>{{$game->score_per_question}}</h5>
                  <h5 class="lights "><span class="hash"> Duration of Game: </span>{{$game->duration}}</h5>
                  <h5 class="lights "><span class="hash"> Maximum Winners: </span>{{$game->maximum_winners}}</h5>
                  <h5 class="lights "><span class="hash"> Created: </span>{{$game->created_at}}</h5>
                  <hr>
                 <ul class="status hide">
                   <li class="text-center pull-left">
                     <span style="display:block">{{count($plays)}}</span>
                     <span class="fades">Plays</span>
                   </li>
                   <li class="text-center pull-left">
                      <span style="display:block">{{$players}}</span>
                      <span class="fades">Players</span>
                    </li>
                    <li class="text-center pull-left">
                        <span style="display:block">12</span>
                        <span class="fades">Favorites</span>
                    </li>
                 </ul>

                </div>
            </div>
         </div>
         <div class="col-md-8">
            <div class="content">
                <div class="col-md-12 col-xs-12">
                    <div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="score-board">
                                    <small>Plays</small>
                                    <h1>{{count($plays)}}</h1>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="score-board">
                                    <small>Players</small>
                                    <h1>{{$players}}</h1>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="score-board">
                                    <small>Amount Stake</small>
                                    <h1>{{$players*$game->amount}} BTC</h1>
                                </div>
                            </div>
                         </div>
                    </div>
                </div>

                @if(count($plays) > 0)       
                    <div class="col-md-12 col-xs-12" >
                       <div class="table-responsive">
                          <table class="table table-responsive">
                              <thead>
                                <tr>
                                  <th>Player</th>
                                  <th>Score</th>
                                  <th>Time(Seconds)</th>
                                  <th>Rank</th>
                                </tr>
                              </thead>
                              <tbody>
                                @foreach($plays  as $p)
                                <tr >
                                  <td class="text-info"> {{$p->user->name}}</td>
                                  <td>{{$p->total_score}}</td>
                                  <td><?php 
                                 $date1=date_create(Date("Y-m-d H:i:s",strtotime($p->submitted_at)));
                                 $date2=date_create(date("Y-m-d H:i:s",strtotime($p->started_at)));
                                 $diff=date_diff($date1,$date2,TRUE);

                                  echo $diff->s;

                                  ?></td>
                                  <td >N/A</td>
                                </tr>  
                                @endforeach                      
                              </tbody>
                            </table>
                       </div>
                    </div>
                  @else
                    <div  class="text-center">
                        <div class="empty">
                            <i class="fa fa-smile-o"></i>
                            <h3>No Player record to show yet</h3>
                        </div>
                        
                    </div>
                  @endif

            </div>
         </div>
         
       </div>

 </section><!-- .app-content -->
</div><!-- .wrap -->
 
  <!-- APP FOOTER -->
    @include('footer')
  <!-- /#app-footer -->
</main>
<!--========== END app main -->
  

@stop
@section('scripts')

<script type="text/javascript">
  
  $(document).ready(function(){

        $("body").on("click","#save_edit",function(){
          me = $(this);
          name = $("#name_of_user").val();
          wallet_address = $("#wallet_address").val();                   

          if (name == "" || wallet_address == ""){
            showToast("Please enter all field",5000,0);
            return;
          };
         
          me.attr("disabled",true).text("Updating profile...")

          
          $.post("{{url('update_profile')",{name:name,wallet_address:wallet_address,_token:"{{ csrf_token() "},function(){}).done(function(res){
            me.attr("disabled",false).text("Update profile")             
              if (res.status == "3"){
                showToast(res.msg,5000,0)                
              };

              if (res.status == "1") {
                $("body").find(".username").text(name)
                showToast(res.msg,5000)                                
               /* $("body").find(".status_modal_btn").click();
                $("body").find(".cont_status").html(res.view);*/                
              };
          }).error(function(res){
            me.attr("disabled",false).text("Update profile")
            toastr.error("Error Occured processing payment, try again","Message Alert",{ "positionClass": "toast-top-center"});
            //showToast(res.msg,5000,0);

                            });
         
        })


        $("body").on("click","#save_password",function(){
          me = $(this);
          old_pass = $("#old_pass").val();
          new_pass = $("#new_pass").val();          
          confirm_pass = $("#confirm_pass").val();         

          if (old_pass == "" || new_pass == "" || confirm_pass == ""){
            showToast("Please enter all field",5000,0);
            return;
          };

          if (new_pass != confirm_pass) {
             showToast("New password must match confirm password",5000,0);
             return;
          };
         
          me.attr("disabled",true).text("Changing password...")
          
          $.post("{{url('update_password')",{old_password:old_pass,new_password:new_pass,confirm_password:confirm_pass,_token:"{{ csrf_token() "},function(){}).done(function(res){
            me.attr("disabled",false).text("Change password")
             
              if (res.status == "3"){
                showToast(res.msg,5000,0)                
              };

              if (res.status == "1") {
                    $("#old_pass").val("");
                    $("#new_pass").val("");          
                    $("#confirm_pass").val("");    
                showToast(res.msg,5000)                                                            
              };
          }).error(function(res){
            me.attr("disabled",false).text("Change password")
            toastr.error("Error Occured processing payment, try again","Message Alert",{ "positionClass": "toast-top-center"});
            //showToast(res.msg,5000,0);

                            });
         
        })
  

         

  })

</script>

@stop

  