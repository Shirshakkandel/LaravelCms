@extends('layouts.app')
@section('content')
<div class="d-flex justify-content-end my-2">
   <a href="{{route('posts.create')}}" class="btn btn-success">Add Post</a>
</div>
<div class="card">
   <div class="card-header">
      Posts
   </div>

   <div class="card-body">
      <table class="table">
      <thead>
         <tr>
         <th>Name</th>
         <th></th>
        </tr>
      </thead>
@endsection