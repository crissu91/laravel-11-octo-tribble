@props(['post'])

<div class="card">
    {{--title--}}
    <h2 class="font-bold text-xl">{{$post->title}}</h2>

    {{--Author and Date--}}
    <div class="text-xs font-light mb-4">
        <span>
            Posted {{$post->created_at->diffForHumans()}} by
            <a href="{{route('posts.user', $post->user)}}" class="text-blue-500 font-medium">{{$post->user->username}}</a>
        </span>
    </div>

    {{--Body--}}
    <div class="text-sm">
        <p>{{Str::words($post->body, 15)}}</p>
    </div>
</div>