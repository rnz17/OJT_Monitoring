@include('partials.head')
@include('partials.sidebar')

<div class="w-full bg-pink-100 p-8">
  <div class="grid grid-cols-2 gap-6">
    <!-- Notification Section -->
    <div class="bg-white p-6 rounded-lg shadow">
      <h2 class="font-semibold text-gray-700 mb-4">Notification</h2>
      <ul class="space-y-2">
        <li class="text-gray-500">📌 Please finish requirement...</li>
        <li class="text-gray-500">📌 Please finish requirement...</li>
        <li class="text-gray-500">📌 Please finish requirement...</li>
        <li class="text-gray-500">📌 Please finish requirement...</li>
        <li class="text-gray-500">📌 Please finish requirement...</li>
      </ul>
    </div>
    
    <!-- Templates Section -->
    <div class="bg-white p-6 rounded-lg shadow">
      <h2 class="font-semibold text-gray-700 mb-4">Templates</h2>
      <ul class="space-y-2">
        <li class="text-blue-500 hover:underline">Sample Resume.docx ⬇</li>
        <li class="text-blue-500 hover:underline">Sample Resume.docx ⬇</li>
        <li class="text-blue-500 hover:underline">Sample Resume.docx ⬇</li>
        <li class="text-blue-500 hover:underline">Sample Resume.docx ⬇</li>
      </ul>
    </div>

    <!-- Unfinished Requirements Section -->
    <div class="bg-white p-6 rounded-lg shadow">
      <h2 class="font-semibold text-gray-700 mb-4">Unfinished Requirements</h2>
      <ul class="space-y-2">
        <li class="text-gray-500">📌 OJT Application Form – Due 7:59, January 10, 2024</li>
        <li class="text-gray-500">📌 OJT Application Form – Due 7:59, January 10, 2024</li>
        <li class="text-gray-500">📌 OJT Application Form – Due 7:59, January 10, 2024</li>
        <li class="text-gray-500">📌 OJT Application Form – Due 7:59, January 10, 2024</li>
      </ul>
    </div>
    
    <!-- Finished Requirements Section -->
    <div class="bg-white p-6 rounded-lg shadow">
      <h2 class="font-semibold text-gray-700 mb-4">Finished Requirements</h2>
      <ul class="space-y-2">
        <li class="text-gray-500">✔ Liability Form</li>
        <li class="text-gray-500">✔ Liability Form</li>
        <li class="text-gray-500">✔ Liability Form</li>
        <li class="text-gray-500">✔ Liability Form</li>
      </ul>
    </div>
  </div>
</div>
