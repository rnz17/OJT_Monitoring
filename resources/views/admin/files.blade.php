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
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($files as $file)
                            <tr>
                                <td class="border border-gray-300 px-4 py-2">{{ $file->column_name }}</td>
                                <td class="border border-gray-300 px-4 py-2">{{ $file->column_type }}</td>
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
                        <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Column name:</label>
                        <input type="text" name="name" id="name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                    </div>
                    <div class="mb-4">
                        <label for="type" class="block text-gray-700 text-sm font-bold mb-2">Upload type:</label>
                        <select name="type" id="type" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                            <option value="file">File</option>
                            <option value="text">Text</option>
                            <option value="number">Number</option>
                            <option value="date">Date</option>
                            <option value="boolean">Boolean</option>
                        </select>
                    </div>
                    <button type="submit" class="bg-[#F6A8A8] text-[#FFFFFF] border border-[#E08A8A] border-b-4 font-medium overflow-hidden relative px-4 py-2 rounded-md hover:brightness-120 hover:border-t-4 hover:border-b active:opacity-80 outline-none duration-300 group mr-8">
                        <span class="bg-[#E08A8A] shadow-[#E08A8A] absolute -top-[150%] left-0 inline-flex w-80 h-[5px] rounded-md opacity-50 group-hover:top-[150%] duration-500 shadow-[0_0_10px_10px_rgba(0,0,0,0.3)]"></span>
                        Add Column
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
