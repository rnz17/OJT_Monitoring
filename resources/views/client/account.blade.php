@include('partials.head')
@include('partials.sidebar')

<div class="w-full bg-pink-100 p-8">
    <div class="grid grid-cols-2 gap-6">
    <!-- Account Information Section -->
    <div class="col-span-2 bg-white p-6 rounded-lg shadow">
      <h2 class="font-semibold text-gray-700 mb-4 flex items-center">
        <span class="mr-2">📋</span> Account Information
      </h2>
      <form action="{{ route('profile.update') }}" method="post" class="flex w-full">
        @csrf
        @method('patch')
        <div class="flex w-full">
          <div class="flex flex-col w-1/3 m-auto">
            <label for="name" class="mb-2 text-gray-700">First Name</label>
            <input type="text" id="name" name="name" value="{{ Auth::user()->fname }}" class="p-3 shadow-xl border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-500">
            <label for="name" class="mb-2 text-gray-700">Surname</label>
            <input type="text" id="name" name="name" value="{{ Auth::user()->lname }}" class="p-3 shadow-xl border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-500">
          </div>
          <div class="flex flex-col w-1/3 m-auto">
            <label for="email" class="mb-2 text-gray-700">Email</label>
            <input type="text" id="email" name="email" value="{{ Auth::user()->email }}" class="p-3 mb-2 shadow-xl border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-500">
            <button class="bg-pink-500 m-auto mb-1 text-white p-3 shadow-xl rounded-lg hover:bg-pink-600 focus:outline-none focus:ring-2 focus:ring-pink-400">
              Confirm Changes
            </button>
          </div>
        </div>
      </form>
    </div>

    <!-- Change Password Section -->
    <div class="bg-white p-6 rounded-lg shadow">
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

    <!-- Change Profile Picture Section -->
    <div class="bg-white p-6 rounded-lg shadow">
      <h2 class="font-semibold text-gray-700 mb-4 flex items-center">
        <span class="mr-2">📷</span> Change Profile Picture
      </h2>
      <div class="flex items-center justify-center bg-gray-100 border border-gray-300 rounded-lg h-48">
        <span class="text-gray-400">Upload Picture</span>
      </div>
      <div class="mt-4 flex justify-end">
        <button class="bg-pink-500 text-white px-6 py-2 rounded-lg hover:bg-pink-600 focus:outline-none focus:ring-2 focus:ring-pink-400">
          Confirm
        </button>
      </div>
    </div>
  </div>
</div>
