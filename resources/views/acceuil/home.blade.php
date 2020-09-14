@extends('layouts.app')

@section('content')


<div class="row pt-5">
    @if($users)
    @foreach($users as $user)
    @foreach($user->posts as $post)
    <div class="container pb-5">
        <div class="row">
            <div class="col-8 ">
                <img src="{{ asset('imagets/'. $post->image) }}" class="w-100"  >
            </div>
            <div class="col-4">
                <div>
                    <div class="d-flex align-items-center">
                        <div class="pr-3" >
                            <img src="{{$post->user->profile->profileImage()}}" class="rounded-circle" width="40px" height="40px" >
                        </div>
                        <div>
                        <div  class="font-weight-bold "><a href="/profile/{{$post->user->id}}">
                            <span class="text-dark">{{$post->user->username}}</span>
                           </a>
                         <follow-button user-id="{{$user->id}}"></follow-button>
                        </div>
                        </div>
                    </div>
                    <hr>
                    <p>  <span class="font-weight-bold">{{$post->user->username}} </span>{{$post->caption}}</p>
                </div>


            </div>
        </div>

    </div>
@endforeach
@endforeach
@endif






@endsection
