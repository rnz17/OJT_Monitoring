@include('partials.head')
@include('partials.sidebar')


<div class="flex w-full">
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
                <h1 class="text-3xl font-bold pl-12">{{ $file->column_type }}</h1>
                <p class="text-gray-400">**if you want to change file type, please delete the column and create new one to avoid conflicts with uploaded files</p>
            </div>

            <button type="submit" class="bg-[#F6A8A8] text-[#FFFFFF] border border-[#E08A8A] border-b-4 font-medium overflow-hidden relative px-4 py-2 rounded-md hover:brightness-120 hover:border-t-4 hover:border-b active:opacity-80 outline-none duration-300 group mr-8">
                <span class="bg-[#E08A8A] shadow-[#E08A8A] absolute -top-[150%] left-0 inline-flex w-80 h-[5px] rounded-md opacity-50 group-hover:top-[150%] duration-500 shadow-[0_0_10px_10px_rgba(0,0,0,0.3)]"></span>
                Save
            </button>
        </form>
        
        <form method="post" action="{{ route('admin.files.delete') }}">
            @csrf
            @method('DELETE')
            <input type="hidden" name="id" value="{{ $file->id }}">
            <button type="submit" class="px-4 py-1 border border-[#F6A8A8] bg-[#F6A8A8] rounded-xl m-auto">Delete</button>
        </form>
    </div>
</div>

