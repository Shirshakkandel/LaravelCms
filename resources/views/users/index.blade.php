@extends('layouts.app')
@section('content')

<div class="card">
   <div class="card-header">
      Users
   </div>

   <div class="card-body">
    @if ($users->count()>0)
     <table class="table">
      <thead>
         <tr>
         <th>Image</th>
         <th>Name</th>
         <th>Email</th>
         <th></th>
         <th></th>
        </tr>
        <tr>

         <tbody>
            @foreach ($users  as $user)
                <tr>
                {{--<?php $image="storage/$post->image" ?>--}}
                <td>  <img src="{{Gravatar::src($user->email) }}" width="40px" height="40px"  style="border-radius:50%"> </td> 

                <td>{{$user->name}}</td>
                <td>
                 {{$user->email}}
                </td>

                <td>
                   @if(!$user->isAdmin())
                <form action="{{route('users.make-admin', $user->id)}}" method="POST">
                  @csrf
                  <button  type="submit" class="btn btn-success btn-sm">Make Admin</button>
               </form>
                  
                  @endif
                  </td>

                

                  
                </tr>

                
            @endforeach
            
         
         </tbody>

        </tr>
      </thead>
        
    @else

      <h3 class="text-center">No User Yet </h3>
        
    @endif
@endsection