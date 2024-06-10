<x-layout>
    @foreach ($users as  $user)
        <a href="{{ route('posts.user', $user) }}">{{$user->username}}</a>
    @endforeach

    <div>
        {{$users->links()}}
    </div>
</x-layout>