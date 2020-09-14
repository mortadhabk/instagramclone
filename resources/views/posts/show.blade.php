@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-8">
            <img src="{{ asset('imagets/'.$post->image) }}" class="w-100"  >
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
                     <button class="btn btn-primary ml-5" >Follow</button>
                    </div>
                    </div>
                </div>
                <hr>
                <p>  <span class="font-weight-bold">{{$post->user->username}} </span>{{$post->caption}}</p>
            </div>


        </div>
    </div>

</div>
@endsection
