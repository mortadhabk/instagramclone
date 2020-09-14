@extends('layouts.admin')




@section('content')


<div class="container">
    <table class="table">
      <thead>
        <tr>
          <th>Id</th>
          <th>Name</th>
          <th>Email</th>
          <th>Role</th>
          <th>Creation</th>
        </tr>
      </thead>
      <tbody>
          @if($users)
          @foreach($users as $user)
        <tr>
            <td>{{$user->id}}</td>
           <td><a href="#">{{$user->name}}</a></td>
           <td>{{$user->email}}</td>
           <td>{{$user->role ? $user->role->name : 'User has no role'}}</td>
           <td>{{$user->updated_at->diffForHumans()}}</td>
        </tr>
@endforeach
@endif
      </tbody>
    </table>
  </div>



@endsection
