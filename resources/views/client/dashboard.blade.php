@include('partials.head')
@include('partials.sidebar')

<div class="w-full bg-pink-100 p-8">
  <div class="grid grid-cols-2 gap-6 mb-6">
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
        @foreach($todo as $task)
          <li class="text-gray-500">📌 {{ $task }}</li>
        @endforeach
      </ul>
    </div>
    
    <!-- Finished Requirements Section -->
    <div class="bg-white p-6 rounded-lg shadow">
      <h2 class="font-semibold text-gray-700 mb-4">Finished Requirements</h2>
      <ul class="space-y-2">
          @if(count($done) > 0)
            @foreach($done as $task)
              <li class="text-gray-500">✔ {{ $task }}</li>
            @endforeach
          @else
            <li class="text-gray-500">No finished requirements yet.</li>
          @endif
      </ul>
    </div>
  </div>

  <form action="{{ route('files.upload') }}" method="POST" enctype="multipart/form-data">
    @csrf
      <div class="max-w-lg mx-auto p-6 bg-white rounded-lg shadow-lg">
          <h2 class="text-xl font-semibold mb-6 text-center text-pink-700">Upload File</h2>

          <!-- Column Selection -->
          <div class="mb-4">
              <label for="column" class="block text-gray-700 text-sm font-medium mb-2">Select Column</label>
              <select name="column" id="column" class="w-full border border-pink-300 rounded px-4 py-2">
                  <option value="">Choose a column</option>
                  <!-- Assuming you pass columns data to the view -->
                  @foreach($fileUp as $column)
                      <option value="{{ $column->id }}">{{ $column->column_name }}</option>
                  @endforeach
              </select>
          </div>

          <!-- File Upload -->
          <div class="mb-4">
              <label for="file" class="block text-gray-700 text-sm font-medium mb-2">Upload File</label>
              <input type="file" name="file" id="file" class="w-full border border-pink-300 rounded px-4 py-2" accept=".jpg,.png,.pdf,.doc,.docx">
              @error('file')
                  <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
              @enderror
          </div>

          <!-- Submit Button -->
          <div class="flex justify-center">
              <button type="submit" class="bg-pink-500 text-white px-6 py-3 rounded-md hover:bg-pink-600 focus:outline-none focus:ring-2 focus:ring-pink-500 focus:ring-opacity-50">
                  Upload
              </button>
          </div>
      </div>
  </form>


</div>

