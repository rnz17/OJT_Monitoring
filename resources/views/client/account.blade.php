@include('partials.head')
@include('partials.sidebar')

<div class="w-full bg-pink-100 p-8">
    <div class="flex flex-col gap-6">
    <!-- Account Information Section -->
      <div class="col-span-2 w-5/6 m-auto bg-white p-6 rounded-lg shadow">
        <h2 class="font-semibold text-gray-700 mb-4 flex items-center">
          <span class="mr-2">📋</span> Account Information
        </h2>
        <form action="{{ route('profile.update') }}" method="post" class="flex w-full">
          @csrf
          @method('patch')
          <div class="flex w-full">
            <div class="flex flex-col w-1/3 m-auto">
              <label for="name" class="mb-2 text-gray-700">First Name</label>
              <input type="text" id="name" name="fname" value="{{ Auth::user()->fname }}" class="p-3 shadow-xl border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-500">
              <br>
              <label for="name" class="mb-2 text-gray-700">Surname</label>
              <input type="text" id="name" name="lname" value="{{ Auth::user()->lname }}" class="p-3 shadow-xl border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-500">
            </div>
            <div class="flex flex-col w-1/3 m-auto">
              @if(Auth::user()->section === null)
                <select name="section">
                  <option>Select Section</option>
                  @foreach($sections as $sec)
                  <option value="{{ $sec->section }}">{{ $sec->section }}</option>
                  @endforeach
                </select>
              @endif
              <button class="bg-pink-500 m-auto mt-2 text-white p-3 shadow-xl rounded-lg hover:bg-pink-600 focus:outline-none focus:ring-2 focus:ring-pink-400">
                Confirm Changes
              </button>
            </div>
          </div>
        </form>
      </div>

    <!-- Change Password Section -->
    <div class="bg-white p-6 m-auto rounded-lg shadow">
      <h2 class="font-semibold text-gray-700 mb-4 flex items-center">
        <span class="mr-2">🔑</span> Change Password
      </h2>
      <form action="{{ route('update.password') }}" method="post">
        @csrf
        @method('post')
        
        <div class="space-y-4">
          <input name="current_password" type="password" placeholder="Current Password" class="p-3 border border-gray-300 rounded-lg w-full focus:outline-none focus:ring-2 focus:ring-pink-500">
          <input name="password" type="password" placeholder="New Password" class="p-3 border border-gray-300 rounded-lg w-full focus:outline-none focus:ring-2 focus:ring-pink-500">
          <input name="password_confirmation" type="password" placeholder="Last Name" class="p-3 border border-gray-300 rounded-lg w-full focus:outline-none focus:ring-2 focus:ring-pink-500">
        </div>
        <div class="mt-4 flex justify-end">
          <button class="bg-pink-500 text-white px-6 py-2 rounded-lg hover:bg-pink-600 focus:outline-none focus:ring-2 focus:ring-pink-400">
            Confirm
          </button>
        </div>
      </form>
    </div>
  </div>
</div>
