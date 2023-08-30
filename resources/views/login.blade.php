<x-app-layout>
    <div class="form-style">
        <h2 class="text-3xl mb-7 font-bold underline">Login Form</h2>
        
        <form class="form-align" method="POST" action="{{ route('login') }}" novalidate>
        @csrf
        <div class="form-grp">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
            @error('email')
                <p class="text-red-500 mt-1 text-xs">{{ $message }}</p>
            @enderror
        </div>
        <div class="form-grp">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password" required>
            @error('password')
                <p class="text-red-500 mt-1 text-xs">{!! $message !!}</p>
            @enderror
        </div>
        @if (Session::has('error'))
            <p class="text-red-500 mb-4 text-xs">{{Session::get('error')}}</p>
        @endif
        <button type="submit" class="px-4 py-2 mb-5 bg-blue-500 text-black rounded-md shadow-md 
        hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50
        hover:text-white">
            Login
        </button>
        <div class="text-center italic text-sm">
            <span>
                Don't have an account? 
                <a class="text-blue-800" href="/register">Sign Up</a>
            </span>
        </div>
        </form>
    </div>
</x-app-layout>