<x-layout>
    <h1 class="title">Hello {{ auth()->user()->username }}</h1>

    {{--Create Post Form--}}
    <div class="card mb-4">
        <h2 class="font-bold mb-4">Create a new post</h2>

        {{--Session Messages--}}
        @if (session('success'))
            <div>
                <x-flashMsg msg="{{session('success')}}"/>
            </div>
        @endif

        <form action="{{route('posts.store')}}" method="POST">
        @csrf

        {{--Post Title--}}
            <div class="mb-8">
                <label for="title">Title</label>

                <input type="text" name="title" value="{{old('title')}}" class="input @error('title') ring-red-500 @enderror">

                @error('title')
                    <p class="error">{{$message}}</p>
                @enderror
            </div>

            {{--Post Body--}}
            <div class="mb-8">
                <label for="email">Email</label>

                <textarea name="body" rows="5" class="input @error('body') ring-red-500 @enderror">{{old('body')}}</textarea>

                @error('body')
                    <p class="error">{{$message}}</p>
                @enderror
            </div>

            {{--Create--}}
            <button class="btn">Create</button>
        </form>
    </div>
</x-layout>
