<x-app-layout>
  <div class="form-style">
    <h2 class="text-3xl font-bold underline mb-7">Register Form</h2>
    @if (Session::has('success'))
      <div class="alert alert-success" role="alert">
          {{Session::get('success')}}
      </div>
    @endif
    <form class="form-align" method="POST" action="{{ route('form.store') }}">
    @csrf
    <div class="form-grp">
        <label for="name">Name</label>
        <input type="text" class="form-control" id="name" name="name" required>
    </div>
    <div class="form-grp">
        <label for="email">Email Address</label>
        <input type="email" class="form-control" id="email address" name="email" required>
    </div>
    <div class="form-grp">
        <label for="password">Password</label>
        <input type="password" class="form-control" id="password" name="password" required>
    </div>
    <div class="form-grp">
        <label for="phone">Phone Number</label>
        <input type="tel" class="form-control" id="phone number" name="phone" required>
    </div>
    <div class="form-grp">
        <label>Date of Birth</label>
        <input type="date" class="form-control" id="dob" name="dob" required>
    </div>
    <button type="submit" class="px-4 py-2 mb-5 bg-blue-800 text-black rounded-md shadow-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">Register</button>
    <div class="text-center italic text-sm">
      <span>
        Already have an account? 
        <a class="text-blue-800" href="/login">Login</a>
      </span>
    </div>
    </form>
    
  </div>
</x-app-layout>