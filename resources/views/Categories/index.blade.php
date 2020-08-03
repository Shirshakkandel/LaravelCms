@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-end my-2">
<a href="{{route('categories.create')}}" class="btn btn-success">Add Category</a>
</div>
    <div class="card">
       <div class="card-header">
          Categories
       </div>

       <div class="card-body">
          <table class="table">
          <thead>
             <tr>
             <th>Name</th>
             <th></th>
            </tr>
          </thead>
          <tbody>
             @foreach ($categories as $category)
                 <tr>
                    <td>
                       {{$category->name}}
                    </td>
                    <td>
                    <a href="{{route('categories.edit',$category->id)}}" class="btn btn-info btn-sm ">Edit</a>
                    <a  class="btn btn-danger btn-sm" onclick="handleDelete({{$category->id}})">Delete</a>

                    </td>
                 </tr>
             @endforeach
          </tbody>
         </table>

         
<!-- Modal -->

<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   
   <div class="modal-dialog" role="document">
      <form action="" method="POST" id='deleteCategoryForm'>
         @csrf
         @method('DELETE')
     <div class="modal-content">
       <div class="modal-header">
         <h5 class="modal-title" id="exampleModalLabel">Delete Category</h5>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">&times;</span>
         </button>
       </div>
       <div class="modal-body">
         <p class="text-center">Are you sure you want to delete post</p>
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
    
    var form = document.getElementById('deleteCategoryForm');
     form.action ="/categories/"+$id
     console.log("deleting",form)
   $('#deleteModal').modal('show')
   

 }

</script>
    
@endsection