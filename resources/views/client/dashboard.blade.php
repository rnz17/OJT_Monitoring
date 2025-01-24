@include('partials.head')
@include('partials.sidebar')

<div class="w-full bg-pink-100 p-8">
  <div class="grid grid-cols-2 gap-6 mb-6">
    <!-- Notification Section -->
    <div class="bg-white p-6 rounded-lg shadow">
      <h2 class="font-semibold text-gray-700 mb-4 flex items-center">
    <img src="{{ asset('images/notification.png') }}" alt="Notification Icon" class="w-5 h-5 mr-2 align-middle" style="vertical-align: middle;"> 
    Notification
      </h2>
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
  <h2 class="font-semibold text-gray-700 mb-4 flex items-center">
    <img src="{{ asset('images/template.png') }}" alt="Template Icon" class="w-5 h-5 mr-2"> 
    Templates
  </h2>
  <ul class="space-y-2">
    <li class="text-blue-500 hover:underline">Sample Resume.docx ⬇</li>
    <li class="text-blue-500 hover:underline">Sample Resume.docx ⬇</li>
    <li class="text-blue-500 hover:underline">Sample Resume.docx ⬇</li>
    <li class="text-blue-500 hover:underline">Sample Resume.docx ⬇</li>
  </ul>
    </div>


    <!-- Unfinished Requirements Section -->
    <div class="bg-white p-6 rounded-lg shadow">
  <h2 class="font-semibold text-gray-700 mb-4 flex items-center">
    <img src="{{ asset('images/unfinished.png') }}" alt="Unfinished Icon" class="w-5 h-5 mr-2">
    Unfinished Requirements
  </h2>
  <ul class="space-y-2">
    @foreach($todo as $task)
      <li class="text-gray-500">📌 {{ $task }}</li>
    @endforeach
  </ul>
    </div>

    
    <!-- Finished Requirements Section -->
    <div class="bg-white p-6 rounded-lg shadow">
    <h2 class="font-semibold text-gray-700 mb-4 flex items-center">
    <img src="{{ asset('images/Fiinsihed.png') }}" alt="Finished Icon" class="w-5 h-5 mr-2">
    Finished Requirements
  </h2>
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
        <h2 class="text-xl font-semibold mb-6 text-center text-pink-700 flex items-center justify-center">
            <img src="{{ asset('images/file.png') }}" alt="File Icon" class="w-6 h-6 mr-2">
            Upload File
        </h2>

        <!-- Column Selection -->
        <div class="mb-4">
            <label for="column" class="block text-gray-700 text-sm font-medium mb-2">Select Column</label>
            <select name="column" id="column" class="w-full border border-pink-300 rounded px-4 py-2" onchange="updateInputType(this)">
                <option value="">Choose a column</option>
                @foreach($fileUp as $column)
                    <option value="{{ $column->id }}" data-type="{{ $column->column_type }}">{{ $column->column_name }}</option>
                @endforeach
            </select>
        </div>

        <!-- Dynamic Input Field -->
        <div class="mb-4">
            <label for="dynamic-input" class="block text-gray-700 text-sm font-medium mb-2">Input</label>
            <input type="text" name="dynamic-input" id="dynamic-input" class="w-full border border-pink-300 rounded px-4 py-2" placeholder="Select a column to change input type">
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

<script>
    function updateInputType(selectElement) {
        const selectedOption = selectElement.options[selectElement.selectedIndex];
        const columnType = selectedOption.getAttribute('data-type');
        const inputField = document.getElementById('dynamic-input');

        if (columnType === 'file') {
            inputField.type = 'file';
            inputField.name = 'file';
            inputField.accept = '.jpg,.png,.pdf,.doc,.docx'; // Adjust file types as needed
        } else if (columnType === 'text') {
            inputField.type = 'text';
            inputField.accept = '';
        } else {
            inputField.type = 'text';
            inputField.accept = '';
        }

        inputField.placeholder = columnType ? `Enter a ${columnType} value` : 'Select a column to change input type';
    }
</script>
