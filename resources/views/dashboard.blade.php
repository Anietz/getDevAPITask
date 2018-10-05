@extends('layout')
@section('title',"Dashboard")
@section('content')


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
           <div class="col-md-4 col-sm-6">
            <div class="widget stats-widget">
              <div class="widget-body clearfix">
                <div class="pull-left">
                  <h3 class="widget-title text-primary"><span class="counter" data-plugin="counterUp">{{$total_users}}</span></h3>
                  <small class="text-color">Total Users</small>
                </div>
                <span class="pull-right big-icon watermark"><i class="fa fa-paperclip"></i></span>
              </div>
              <footer class="widget-footer bg-primary text-default">
                <small>&nbsp;</small>   
                <a href="{{url('users')}}" style="color:#fff">Manage users</a>        
              </footer>
            </div><!-- .widget -->
          </div>

          <div class="col-md-4 col-sm-6">
            <div class="widget stats-widget">
              <div class="widget-body clearfix">
                <div class="pull-left">
                  <h3 class="widget-title text-default"><span class="counter" data-plugin="counterUp">{{$total_games}}</span></h3>
                  <small class="text-color">Total Games</small>
                </div>
                <span class="pull-right big-icon watermark"><i class="fa fa-paperclip"></i></span>
              </div>
              <footer class="widget-footer bg-warning text-default">
                <small>&nbsp;</small>  
                <a href="{{url('games')}}" style="color:#fff">Manage Games</a>         
              </footer>
            </div><!-- .widget -->
          </div>

          <div class="col-md-4 col-sm-6">
            <div class="widget stats-widget">
              <div class="widget-body clearfix">
                <div class="pull-left">
                  <h3 class="widget-title text-danger"><span class="counter" data-plugin="counterUp">{{$total_tx}}</span></h3>
                  <small class="text-color">Total Transactions</small>
                </div>
                <span class="pull-right big-icon watermark"><i class="fa fa-ban"></i></span>
              </div>
              <footer class="widget-footer bg-danger">
                 <small>&nbsp;</small> 
              </footer>
            </div><!-- .widget -->
          </div>
         
        </div><!-- .row -->
    
    


   
    <div class="row">
       <div class="col-md-6">
          <div class="quick-access">            
            <h3>Quick actions</h3>
               
                        <div>              
                             <a href="{{url('games')}}" class="btn btn-lg btn-primary">Manage Games</a>
                          
                             <a href="{{url('users')}}" class="btn btn-lg btn-danger">Manage Users</a>             
                        </div>

          </div>
        </div>

      <div class="col-md-6">

      </div><!-- END column -->      
    </div><!-- .row -->

   
  </section><!-- #dash-content -->
</div><!-- .wrap -->

 @include('footer')
  <!-- /#app-footer -->
</main>
<!--========== END app main -->
  

@stop
@section('scripts')

<script type="text/javascript">
    
  $(document).ready(function(){

    
})



</script>


@stop


