@include('partials.head')
@include('partials.sidebar')

<div class="w-full bg-pink-100 p-8">
  <!-- File Upload Form -->
  <form action="{{ route('files.upload') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="max-w-lg mx-auto p-6 bg-white rounded-lg shadow-lg mb-12">
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
            <label for="dynamic-input" class="block text-gray-700 text-sm font-medium">Input</label>
            <label for="dynamic-input" class="block text-gray-700 text-xs font-small mb-1">File format: pdf, docx, jpg, png.</label>
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

  <div class="flex mb-12 h-auto">
    
    <!-- Templates Section -->
    <div id="template-list" class="bg-white mt-0 m-auto w-[30%] overflow-hidden h-0 h-auto p-4 pb-10 rounded-lg shadow">
      <h2 class="font-semibold text-gray-700 mb-4 flex items-center cursor-pointer" onclick="toggleVisibility('template-list', 'template-arrow')">
        <img src="{{ asset('images/template.png') }}" alt="Template Icon" class="w-5 h-5 mr-2"> 
        Templates
        <svg id="template-arrow" xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 ml-2 transition-transform duration-300 transform rotate-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
        </svg>
      </h2>
      <ul class="space-y-2 h-auto pl-8 overflow-hidden transition-all">
        <li class="text-blue-500 hover:underline">Sample Resume.docx ⬇</li>
        <li class="text-blue-500 hover:underline">Sample Resume.docx ⬇</li>
        <li class="text-blue-500 hover:underline">Sample Resume.docx ⬇</li>
        <li class="text-blue-500 hover:underline">Sample Resume.docx ⬇</li>
      </ul>
    </div>

    <!-- Unfinished Requirements Section -->
    <div id="unfinished-list" class="bg-white mt-0 m-auto w-[30%] overflow-hidden h-0 h-auto p-4 pb-10 rounded-lg shadow">
      <h2 class="font-semibold text-gray-700 mb-4 flex items-center cursor-pointer" onclick="toggleVisibility('unfinished-list', 'unfinished-arrow')">
        <img src="{{ asset('images/unfinished.png') }}" alt="Unfinished Icon" class="w-5 h-5 mr-2">
        Unfinished Requirements
        <svg id="unfinished-arrow" xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 ml-2 transition-transform duration-300 transform rotate-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
        </svg>
      </h2>
      <ul class="space-y-2 h-auto pl-8 overflow-hidden transition-all">
        @if(count($todo) >= 1)
          @foreach($todo as $task)
            <li class="text-gray-500">📌 {{ $task }}</li>
          @endforeach
        @else
          <li class="text-gray-500">Congratulations, All requirements are uploaded already.</li>
        @endif
      </ul>
    </div>

    <!-- Finished Requirements Section -->
    <div id="finished-list" class="bg-white mt-0 m-auto w-[30%] overflow-hidden h-0 h-auto p-4 pb-10 rounded-lg shadow">
      <h2 class="font-semibold text-gray-700 mb-4 flex items-center cursor-pointer" onclick="toggleVisibility('finished-list', 'finished-arrow')">
        <img src="{{ asset('images/Fiinsihed.png') }}" alt="Finished Icon" class="w-5 h-5 mr-2">
        Finished Requirements
        <svg id="finished-arrow" xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 ml-2 transition-transform duration-300 transform rotate-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
        </svg>
      </h2>
      <ul class="space-y-2 h-auto pl-8 overflow-hidden transition-all">
        @if(count($done) >= 1)
          @foreach($done as $task)
            <li class="text-gray-500">✔ {{ $task }}</li>
          @endforeach
        @else
          <li class="text-gray-500">No finished requirements yet.</li>
        @endif
      </ul>
    </div>
  </div>


</div>

<script>
    // Function to toggle visibility of sections
    function toggleVisibility(sectionId, arrowId) {
        const section = document.getElementById(sectionId);
        const arrow = document.getElementById(arrowId);
        section.classList.toggle('h-0'); // Make it fully visible when expanded
        
        // Rotate the arrow when expanded or collapsed
        arrow.classList.toggle('rotate-0');
    }

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
