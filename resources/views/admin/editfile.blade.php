@include('partials.head')
@include('partials.sidebar')


<div class="flex w-full bg-[#FAD4D4]">
    <div class="m-auto w-1/2 bg-white border border-gray-300 rounded-lg shadow-xl p-12">
        <form action="{{ route('admin.files.update') }}" method="POST">
            @csrf
            
            <input type="hidden" name="id" value="{{ $file->id }}">
            <div class="mb-4">
                <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Column name:</label>
                <input type="text" name="name" id="name" value="{{ $file->column_name }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
            </div>
            
            <div>
                <label for="filetype" class="block text-gray-700 text-sm font-bold mb-2">File Type</label>
                <input type="text" name="name" id="name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                <p class="text-gray-400">If you want to change file type, please delete the column and create new one to avoid conflicts with uploaded files</p>
            </div>
            
            <div class="space-y-2">

            <button type="submit" class="bg-[#F6A8A8] text-[#FFFFFF] border border-transparent border-b-4 font-medium overflow-hidden relative px-4 py-2 rounded-md hover:bg-[#E08A8A] hover:border-[#E08A8A] active:opacity-75 outline-none duration-300 group mr-8">
                Save
            </button>
        </form>
         
        <form method="post" action="{{ route('admin.files.delete') }}">
            @csrf
            @method('DELETE')
            <input type="hidden" name="id" value="{{ $file->id }}">
            <button type="submit" class="bg-[#F6A8A8] text-[#FFFFFF] border border-transparent border-b-4 font-medium overflow-hidden relative px-2.5 py-2 rounded-md hover:bg-[#E08A8A] hover:border-[#E08A8A] active:opacity-75 outline-none duration-300 group mr-8">
                Delete
            </button>
        </form>
    </div>
</div>

