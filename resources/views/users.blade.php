@extends('layout')
@section('title',"Users")
@section('content')

<style type="text/css">
  form{
    width: 60%;
    margin: 0 auto;
  }
  .form-inline .btn {
    height: 24px;
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
       <div class="col-md-12">
        <div class="widget p-lg">
          <h4 class="m-b-lg">All Users
          </h4>
          <p class="m-b-lg docs">
            Below is a list of all users in the system.
          </p>
          <hr class="widget-separator">
          <div class="widget-body">
            <div class="table-responsive">
              <table id="default-datatable" data-plugin="DataTable" class="table table-striped" cellspacing="0" width="100%">
                <thead>
                  <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Wallet Balance</th>
                    <th>Activated account?</th>
                    <th>Registration date</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Wallet Balance</th>
                    <th>Activated account?</th>
                    <th>Registration date</th>
                    <th>Action</th>
                  </tr>
                  </tr>
                </tfoot>
                <tbody>
                  @foreach($users as $k)
                    <tr>
                      <td>{{$k->name}}</td>
                      <td>{{$k->email}}</td>
                      <td>{{$k->phone}}</td>
                      <td>{{$k->wallet->amount + 0}} BTC</td>
                      <td>{{$k->activated?"Yes":"No"}}</td>
                      <td>{{$k->created_at}}</td>
                      <td >
                        <a href="#" class="btn btn-success btn-xs" style="margin-bottom: 8px">Block</a>
                        <a href="#" class="btn btn-danger btn-xs">Activate</a>
                      </td>
                    </tr>
                  @endforeach
                 
                </tbody>
              </table>
            </div>
          </div><!-- .widget-body -->
        </div><!-- .widget -->
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

          
          $.post("{{url('update_profile')}}",{name:name,wallet_address:wallet_address,_token:"{{ csrf_token() }}"},function(){}).done(function(res){
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
          
          $.post("{{url('update_password')}}",{old_password:old_pass,new_password:new_pass,confirm_password:confirm_pass,_token:"{{ csrf_token() }}"},function(){}).done(function(res){
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


