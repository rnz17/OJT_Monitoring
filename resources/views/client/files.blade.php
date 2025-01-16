@include('partials.head')
@include('partials.sidebar')

<div class="w-full bg-pink-100 flex items-center justify-center p-8">
  <div class="bg-pink-200 p-8 rounded-lg shadow-lg w-full max-w-lg">
    <!-- Title -->
    <h2 class="font-semibold text-gray-700 text-xl mb-6 flex items-center justify-center">
      <span class="mr-2">📂</span> Files
    </h2>

    <!-- Form -->
    <form class="space-y-6">
      <!-- Document Name Field -->
      <div>
        <label for="document-name" class="block text-gray-700 font-medium mb-2">Document Name</label>
        <input type="text" id="document-name" placeholder="Enter document name" 
          class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-500">
      </div>

      <!-- Upload Document Field -->
      <div>
        <label for="upload-document" class="block text-gray-700 font-medium mb-2">Upload Document</label>
        <div class="flex items-center">
          <input type="file" id="upload-document" 
            class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-500">
          <button type="button" 
            class="ml-2 bg-pink-500 text-white p-3 rounded-lg hover:bg-pink-600 focus:outline-none focus:ring-2 focus:ring-pink-400">
            📤
          </button>
        </div>
      </div>

      <!-- Submit Button -->
      <div class="text-center">
        <button type="submit" 
          class="bg-pink-500 text-white px-6 py-3 rounded-lg hover:bg-pink-600 focus:outline-none focus:ring-2 focus:ring-pink-400">
          Submit
        </button>
      </div>
    </form>
  </div>
</div>
