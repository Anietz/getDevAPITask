@extends('layout')
@section('title',"Games")
@section('content')

<style type="text/css">
  form#newContactForm{
    width: 80%;
    margin: 0 auto;
  }
  .form-inline .btn {
    height: 24px;
}
.img{
  width: 100%;
    height: 139px;
    background: #e0dada;
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
          <h4 class="m-b-lg">All Games
            <div class="pull-right">
                 <a href="javascript:;" id="add_game" class="btn btn-danger btn-xs">Add Game</a>
            </div>
          </h4>
          <p class="m-b-lg docs">
            Below is a list of all games in the system.
          </p>
          <hr class="widget-separator">
          <div class="widget-body">
            <div class="table-responsive">
              <table id="default-datatable" data-plugin="DataTable" class="table table-striped" cellspacing="0" width="100%">
                <thead>
                  <tr>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Amount</th>
                    <th>Others</th>
                    <th>Start Date</th>
                    <th>Max winners</th>
                    <th>Created At</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Amount</th>
                    <th>Others</th>
                    <th>Start Date</th>
                    <th>Max winners</th>
                    <th>Created At</th>
                    <th>Action</th>
                  </tr>
                  </tr>
                </tfoot>
                <tbody>
                  @foreach($games as $k)
                    <tr>
                      <td><img width="64px" src="{{asset('images/'.$k->image_url)}}"></td>
                      <td>{{$k->name}}</td>
                      <td>{{$k->amount}}</td>
                      <td style="font-size:10px;"><strong>{{$k->number_of_questions}}</strong> Questions <br>
                          <strong>{{$k->score_per_question}}</strong> marks <br>
                          <strong>{{$k->duration}}</strong> Seconds
                      </td>
                      <td>{{$k->start_date}}</td>
                      <td>{{$k->maximum_winners}}</td>
                      <td>{{$k->created_at}}</td>
                      <td>
                        <a href="javascript:;" id="edit_game" data-game="{{json_encode($k)}}" class="btn btn-success btn-xs" style="margin-bottom: 8px">Edit</a>
                        <a href="{{url('game/'.$k->id.'/questions')}}" class="btn btn-default btn-xs">View Questions</a>
                        <a href="{{url('game/'.$k->id)}}" class="btn btn-danger btn-xs">View more</a>
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

<!-- new contact Modal -->
<div id="addModal" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"> Add Game</h4>
      </div>

        <div class="modal-body">
          <div class="row">
              <div class="col-md-3">
                  <div class="img" style="background-size: contain;
    background-repeat: no-repeat;">
                      <form id="upload_form" enctype="multipart/form-data">
                         <input type="file" name="">
                      </form> 
                  </div>
              </div>
              <div class="col-md-9">
                <form action="#" id="newContactForm" >        
                  <div class="form-group">
                    <input type="text" required  id="name" class="form-control" placeholder="Name">
                  </div>
                  <div class="form-group">
                    <textarea required id="description" class="form-control" placeholder="Description"></textarea>
                  </div>
                  <div class="form-group">
                    <input type="text" id="start_date" data-plugin="datetimepicker"  class="form-control datetimepicker" placeholder="Game Date" >                      
                  </div>
                   <div class="form-group">
                    <input type="number" required  id="amount" class="form-control" placeholder="Amount">
                  </div>
                  <div class="form-group">
                    <input type="number" required  id="number_of_questions" class="form-control" placeholder="Number of Questions">
                  </div>
                   <div class="form-group">
                    <input type="number" required  id="score_per_question" class="form-control" placeholder="Score per Questions">
                  </div>
                   <div class="form-group">
                    <input type="number" required  id="maximum_winners" class="form-control" placeholder="Maximum winners">
                  </div>
                   <div class="form-group">
                    <input type="number" required  id="duration" class="form-control" placeholder="Game Duration (seconds)">
                  </div>
                   <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-success" id="save">Save</button>
                    </div><!-- .modal-footer -->
                </form>
              </div>
          </div>
        </div><!-- .modal-body -->
       

    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


  

@stop
@section('scripts')

<script type="text/javascript">
  
  $(document).ready(function(){

    var fileName = "";
    var type = 0;
    var gameId;

        $("body").on("change","#upload_form",function(){
            var form = $(this)[0]; 
            var formData = new FormData(form);     
            formData.append('image', $('input[type=file]')[0].files[0]);
            formData.append('_token','{{csrf_token()}}')

            $.ajax({
                url: '{{url("upload_image")}}',
                data: formData,
                type: 'POST',
                contentType: false, // NEEDED, DON'T OMIT THIS (requires jQuery 1.6+)
                processData: false, // NEEDED, DON'T OMIT THIS
                success:function(res){
                  fileName = res.message
                 $("body").find(".img").css("background-image","url({{asset('images')}}/"+res.message+")")

                }
            });

        })

         $("body").on("click","#add_game",function(){
           $("body").find(".img").css("background-image","url({{asset('images')}})")
          $("#name").val("");
          $("#description").val("");
         $("#number_of_questions").val(""); 
        $("#score_per_question").val("");
         $("#maximum_winners").val("");  
         $("#duration").val("");    
         $("#amount").val("");  
         $("#start_date").val(""); 
           $("#addModal").modal("show");

         })

        $("body").on("click","#edit_game",function(){
            type = 1; 
            data = $(this).data("game");

            gameId = data.id;

            fileName = data.image_url;

             $("body").find(".img").css("background-image","url({{asset('images')}}/"+data.image_url+")")
           $("#name").val(data.name);
          $("#description").val(data.description);
         $("#number_of_questions").val(data.number_of_questions); 
        $("#score_per_question").val(data.score_per_question);
         $("#maximum_winners").val(data.maximum_winners);  
         $("#duration").val(data.duration);    
         $("#amount").val(data.amount);  
         $("#start_date").val(data.start_date); 


         $("#addModal").modal("show");



        });


        $("body").on("click","#save",function(){
          me = $(this);
          name = $("#name").val();
          description = $("#description").val();
          number_of_questions = $("#number_of_questions").val(); 
          score_per_question = $("#score_per_question").val();
          maximum_winners = $("#maximum_winners").val();  
          duration = $("#duration").val();    
          amount = $("#amount").val();  
          start_date = $("#start_date").val();                  

          if (fileName == "" ){
            //showToast("Please add image",5000,0);
             toastr.error("Please add an image","Message Alert",{ "positionClass": "toast-top-center"});
            return;
          };

          switch(type){
            case 1:
            //Editing
              me.attr("disabled",true).text("Updating game...")

          var data= {_token:"{{ csrf_token() }}",game_id:gameId,start_date:start_date,amount:amount,name:name,description:description,number_of_questions:number_of_questions,score_per_question:score_per_question,maximum_winners:maximum_winners,duration:duration,image_url:fileName};
          
          $.post("{{url('edit_game')}}",data,function(){}).done(function(res){
            me.attr("disabled",false).text("Add")             
               toastr.success("Successfully edited game","Message Alert",{ "positionClass": "toast-top-center"});
                window.location.reload();                           
               /* $("body").find(".status_modal_btn").click();
                $("body").find(".cont_status").html(res.view);*/                
          }).error(function(res){
            me.attr("disabled",false).text("Add game")
            toastr.error(res.responseText,"Message Alert",{ "positionClass": "toast-top-center"});
            //showToast(res.msg,5000,0);

                });

            break;
            default:
              me.attr("disabled",true).text("adding game...")

          var data= {_token:"{{ csrf_token() }}",start_date:start_date,amount:amount,name:name,description:description,number_of_questions:number_of_questions,score_per_question:score_per_question,maximum_winners:maximum_winners,duration:duration,image_url:fileName};
          
          $.post("{{url('add_game')}}",data,function(){}).done(function(res){
            me.attr("disabled",false).text("Add")             
               toastr.success("Successfully added the game","Message Alert",{ "positionClass": "toast-top-center"});
                window.location.reload();                           
               /* $("body").find(".status_modal_btn").click();
                $("body").find(".cont_status").html(res.view);*/                
          }).error(function(res){
            me.attr("disabled",false).text("Add game")
            toastr.error(res.responseText,"Message Alert",{ "positionClass": "toast-top-center"});
            //showToast(res.msg,5000,0);

                            });

            break;
          }
         
        
         
        })

         

  })

</script>

@stop


