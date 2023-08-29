<x-app-layout>
    <div class="form-style">
        <h2 class="text-3xl mb-7 font-bold underline">Login Form</h2>
        @if (Session::has('error'))
            <div class="alert alert-danger" role="alert">
                {{Session::get('error')}}
            </div>
        @endif
        <form class="form-align" method="POST" action="{{ route('login') }}">
        @csrf
        <div class="form-grp">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="form-grp">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <button type="submit" class="px-4 py-2 mb-5 bg-blue-500 text-black rounded-md shadow-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">Login</button>
        <div class="text-center italic text-sm">
            <span>
                Don't have an account? 
                <a class="text-blue-800" href="/register">Sign Up</a>
            </span>
        </div>
        </form>
    </div>
</x-app-layout>