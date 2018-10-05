@extends('layout')
@section('title',"Games")
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
          <h4 class="m-b-lg">{{$game->name}} Question

            <div class="pull-right">
                 <a href="javascript:;" id="add_game" class="btn btn-danger btn-xs">Add Question</a>
            </div>
          </h4>
          <p class="m-b-lg docs">
            Below is a list of the questions for {{$game->name}}.
          </p>
          <hr class="widget-separator">
          <div class="widget-body">
            <div class="table-responsive">
              <table id="default-datatable" data-plugin="DataTable" class="table table-striped" cellspacing="0" width="100%">
                <thead>
                  <tr>
                    <th>Question</th>
                    <th>Options</th>
                    <th>Correct answer</th>
                    <th>Created At</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>Question</th>
                    <th>Options</th>
                    <th>Correct answer</th>
                    <th>Created At</th>
                    <th>Action</th>
                  </tr>
                  </tr>
                </tfoot>
                <tbody>
                  @foreach($questions as $k)
                    <tr>
                      <td>{{$k->question}}</td>
                      <td>{{$k->options}}</td>
                      <td>{{$k->correct_answer}}</td>
                      <td>{{$k->created_at}}</td>
                      <td>
                        <a href="javascript:;" id="edit_game" data-question="{{json_encode($k)}}" class="btn btn-success btn-xs" style="margin-bottom: 8px">Edit</a>
                        <a href="javascript:;" data-question="{{json_encode($k)}}" id="delete_question" class="btn btn-danger btn-xs">Delete</a>
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
        <h4 class="modal-title"> Add Question</h4>
      </div>

        <div class="modal-body">
          <div class="row">
            
              <div class="col-md-12">
                <form action="#" id="newContactForm" >        
                   <div class="form-group">
                    <textarea required id="question" class="form-control" placeholder="Question"></textarea>
                  </div>
                   <div class="form-group">
                    <input type="text" data-plugin="tagsinput" required  id="options" class="form-control tagsinput" placeholder="Options">
                  </div>
                   <div class="form-group">
                    <input type="text" required  id="correct_answer" class="form-control" placeholder="Answer">
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
    var gameId = "{{$game->id}}";

      

         $("body").on("click","#add_game",function(){
          $("#options").val("");
          $("#correct_answer").val("");
         $("#question").val(""); 
           $("#addModal").modal("show");

         })



         $("body").on("click","#delete_question",function(){
              data = $(this).data("question");
              if(confirm("Do you want to continue with the deleting?")){

                var data= {_token:"{{ csrf_token() }}",question_id:data.id,game_id:gameId};

                  $.post("{{url('delete_question')}}",data,function(){}).done(function(res){
                   toastr.success("Successfully deleted question","Message Alert",{ "positionClass": "toast-top-center"});
                window.location.reload();
                  }).error(function(res){
            toastr.error(res.responseText,"Message Alert",{ "positionClass": "toast-top-center"});
            //showToast(res.msg,5000,0);

                });

              }
         })

        $("body").on("click","#edit_game",function(){
            type = 1; 
            data = $(this).data("question");

            questionId = data.id;

            $("#options").val(data.options);
            $("#correct_answer").val(data.correct_answer);
            $("#question").val(data.question); 

         $("#addModal").modal("show");



        });


        $("body").on("click","#save",function(){
          me = $(this);
          options = $("#options").val();
          correct_answer = $("#correct_answer").val(); 
          question = $("#question").val();
        
          switch(type){
            case 1:
            //Editing
              me.attr("disabled",true).text("Updating game...")

          var data= {_token:"{{ csrf_token() }}",question_id:questionId,game_id:gameId,options:options,correct_answer:correct_answer,question:question};
          
          $.post("{{url('edit_question')}}",data,function(){}).done(function(res){
            me.attr("disabled",false).text("Add")             
               toastr.success("Successfully edited question","Message Alert",{ "positionClass": "toast-top-center"});
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

          var data= {_token:"{{ csrf_token() }}",game_id:gameId,options:options,correct_answer:correct_answer,question:question};
          
          $.post("{{url('add_question')}}",data,function(){}).done(function(res){
            me.attr("disabled",false).text("Add")             
               toastr.success("Successfully added question","Message Alert",{ "positionClass": "toast-top-center"});
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


