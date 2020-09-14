@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
    <div class="col-3 p-5"><img src="{{$user->profile->profileImage()}}" class="rounded-circle" width="128px" height="128px"></div>
        <div class="col-9">
            <div class="d-flex justify-content-between align-items-baseline">
                <div class="d-flex  pb-3">
                    <div class="h5 mt-2">{{$user->username}}</div>
                <follow-button user-id="{{$user->id}}" follows="{{ $follows }}"></follow-button>

                </div>
                @can('update', $user->profile)
                <a href="/posts/create">Add New Post</a>
                @endcan

            </div>
            @can('update', $user->profile)
            <a href="/profile/{{$user->id}}/edit">Edit profile</a>
            @endcan

            <div class="d-flex ">
             <div class="pr-5"><strong>{{$user->posts->count()}}</strong> Posts</div>
             <div  class="pr-5"><strong>{{$user->profile->followers->count()}}</strong> followers</div>
             <div  class="pr-5"><strong>{{$user->following->count()}}</strong> following </div>
            </div>
            <div class="pt-4 font-weight-bold">{{$user->profile->title}}</div>
            <div>{{$user->profile->description}}</div>
            <div>
                    <a href="#">{{$user->profile->url }}</a>
            </div>
        </div>
    </div>
    <div class="row pt-5">
        @foreach ($user->posts as $post)


    <div class="col-4 pt-4">
    <a href="http://siteweb.test:85/posts/{{$post->id}}"><img src="{{ asset('imagets/'.$post->image) }}" class="w-100"></a>
    </div>

        @endforeach
    </div>
</div>
@endsection
