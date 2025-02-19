@include('partials.head')
@include('partials.sidebar')

<div class="w-full bg-[#FAD4D4]">
    <div class="container mx-auto p-4">
        <!-- display current columns -->
        <div class="flex p-12 bg-white border border-gray-300 rounded-lg shadow-xl">
            <div class="table-container w-full overflow-x-auto">
                <!-- Table inside the border -->
                <table class="table-auto w-full bg-white">
                    <thead>
                        <tr class="bg-[#F6A8A8]"> <!-- Adjusted background color -->
                            <th class="border border-gray-300 px-4 py-2 text-[#FFFFFF]">File Name</th>
                            <th class="border border-gray-300 px-4 py-2 text-[#FFFFFF]">File Type</th>
                            <th class="border border-gray-300 px-4 py-2 text-[#FFFFFF] w-1/6">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($files as $file)
                            <tr>
                                <td class="border border-gray-300 px-4 py-2">{{ $file->column_name }}</td>
                                <td class="border border-gray-300 px-4 py-2">{{ $file->column_type }}</td>
                                <td class="border border-gray-300 px-4 py-2">
                                    <div class="flex">
                                        <a href="{{ route('admin.files.edit', ['id' => $file->id]) }}" class="px-4 py-1 border border-blue-200 bg-blue-200 rounded-xl m-auto">Edit</a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <!-- add new column -->
        <div class="flex p-12">
            <div class="m-auto w-1/2 bg-white border border-gray-300 rounded-lg shadow-xl p-12">
                <form action="{{ route('admin.files.store') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label for="name" class="block text-gray-700 text-sm font-bold">Column name:</label>
                        <p class="text-sm text-gray-500 mt-1">Include "text" or "link" indication on the column name for link upload</p>
                        <input type="text" name="name" id="name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                    </div>
                    <div class="mb-4">
                        <label for="type" class="block text-gray-700 text-sm font-bold mb-2">Upload type:</label>
                        <select name="type" id="type" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                            <option value="file">File</option>
                            <option value="text">Text</option>
                        </select>
                    </div>
                    <button type="submit" class="bg-[#F6A8A8] text-[#FFFFFF] border border-transparent border-b-4 font-medium overflow-hidden relative px-4 py-2 rounded-md hover:bg-[#E08A8A] hover:border-[#E08A8A] active:opacity-75 outline-none duration-300 group mr-8">
                        Add Column
                    </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
