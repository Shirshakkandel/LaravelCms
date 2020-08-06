@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-end my-2">
<a href="{{route('tags.create')}}" class="btn btn-success">Add Tag</a>
</div>
    <div class="card">
       <div class="card-header">
          tags
       </div>

       <div class="card-body">
         @if ($tags->count()>0)
         <table class="table">
            <thead>
               <tr>
               <th>Name</th>
               <th>Posts count</th>
               
               <th></th>
              </tr>
            </thead>
            <tbody>
               @foreach ($tags as $tag)
                   <tr>
                      <td>
                         {{$tag->name}}
                      </td>

                      <td>
                        {{$tag->posts->count()}}
                      </td>

                     
                      <td>
                      <a href="{{route('tags.edit',$tag->id)}}" class="btn btn-info btn-sm ">Edit</a>
                      <a  class="btn btn-danger btn-sm" onclick="handleDelete({{$tag->id}})">Delete</a>
  
                      </td>
                   </tr>
               @endforeach
            </tbody>
           </table>
             
         @else
         <h3 class="text-center">No Tag Yet</h3>
             
         @endif

         
<!-- Modal -->

<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   
   <div class="modal-dialog" role="document">
      <form action="" method="POST" id='deletetagForm'>
         @csrf
         @method('DELETE')
     <div class="modal-content">
       <div class="modal-header">
         <h5 class="modal-title" id="exampleModalLabel">Delete Tag</h5>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">&times;</span>
         </button>
       </div>
       <div class="modal-body">
         <p class="text-center">Are you sure you want to delete Tag</p>
       </div>
       <div class="modal-footer">
         <button type="button" class="btn btn-secondary" data-dismiss="modal">No,Go back</button>
         <button type="submit" class="btn btn-danger">Yes delete</button>
       </div>
     </div>
   </div>
 </div>
       </div>
    </div>
   </form>
    @endsection

@section('script')
<script>
 function handleDelete($id){
    
    var form = document.getElementById('deletetagForm');
     form.action ="/tags/"+$id
     console.log("deleting",form)
   $('#deleteModal').modal('show')
   

 }

</script>
    
@endsection