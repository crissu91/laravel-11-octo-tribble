<x-layout>
    <h1 class="title">Welcome back!</h1>

    <div class="mx-auto max-w-screen-sm card">
        <form action="{{ route('login')}}" method="POST">
            @csrf
            {{--Email--}}
            <div class="mb-8">
                <label for="email">Email</label>
                <input type="text" name="email" value="{{old('email')}}" class="input @error('email') ring-red-500 @enderror">
                @error('email')
                    <p class="error">{{$message}}</p>
                @enderror
            </div>

            {{--Password--}}
            <div class="mb-8">
                <label for="password">Password</label>
                <input type="password" name="password" class="input @error('password') ring-red-500 @enderror">
                @error('password')
                    <p class="error">{{$message}}</p>
                @enderror
            </div>

            {{--Remember checkbox--}}
            <div class="flex gap-2 mb-8">
                <input type="checkbox" name="remember" id="remember">
                <label for="rememeber">Rememeber me</label>
            </div>

            @error('failed')
                    <p class="error">{{$message}}</p>
                @enderror

            {{--Submit--}}
            <button class="btn">Log in</button>
        </form>
    </div>
</x-layout>