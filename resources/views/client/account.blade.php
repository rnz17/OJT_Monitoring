@include('partials.head')
@include('partials.sidebar')

<div class="w-full bg-pink-100 p-8">
    <div class="grid grid-cols-2 gap-6">
    <!-- Account Information Section -->
    <div class="col-span-2 bg-white p-6 rounded-lg shadow">
      <h2 class="font-semibold text-gray-700 mb-4 flex items-center">
        <span class="mr-2">📋</span> Account Information
      </h2>
      <div class="grid grid-cols-2 gap-4">
        <input type="text" placeholder="First Name" class="p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-500">
        <input type="email" placeholder="Email" class="p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-500">
        <input type="text" placeholder="Middle Name" class="p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-500">
        <input type="text" placeholder="Program or Section" class="p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-500">
        <input type="text" placeholder="Last Name" class="p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-500">
        <input type="text" placeholder="Student Number" class="p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-500">
      </div>
      <div class="mt-4 flex justify-end">
        <button class="bg-pink-500 text-white px-6 py-2 rounded-lg hover:bg-pink-600 focus:outline-none focus:ring-2 focus:ring-pink-400">
          Confirm Changes
        </button>
      </div>
    </div>

    <!-- Change Password Section -->
    <div class="bg-white p-6 rounded-lg shadow">
      <h2 class="font-semibold text-gray-700 mb-4 flex items-center">
        <span class="mr-2">🔑</span> Change Password
      </h2>
      <div class="space-y-4">
        <input type="password" placeholder="Current Password" class="p-3 border border-gray-300 rounded-lg w-full focus:outline-none focus:ring-2 focus:ring-pink-500">
        <input type="password" placeholder="New Password" class="p-3 border border-gray-300 rounded-lg w-full focus:outline-none focus:ring-2 focus:ring-pink-500">
        <input type="password" placeholder="Last Name" class="p-3 border border-gray-300 rounded-lg w-full focus:outline-none focus:ring-2 focus:ring-pink-500">
      </div>
      <div class="mt-4 flex justify-end">
        <button class="bg-pink-500 text-white px-6 py-2 rounded-lg hover:bg-pink-600 focus:outline-none focus:ring-2 focus:ring-pink-400">
          Confirm
        </button>
      </div>
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
