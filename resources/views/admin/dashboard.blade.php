@include('partials.head')
@include('partials.sidebar')

<div class="w-full bg-white">
    <div class="container mx-auto p-4">
        <div class="flex justify-between items-center mb-4">
            <button type="submit" class="bg-pink-300 text-pink-700 border border-pink-700 border-b-4 font-medium overflow-hidden relative px-4 py-2 rounded-md hover:brightness-150 hover:border-t-4 hover:border-b active:opacity-75 outline-none duration-300 group mr-8">
                <span class="bg-pink-700 shadow-pink-700 absolute -top-[150%] left-0 inline-flex w-80 h-[5px] rounded-md opacity-50 group-hover:top-[150%] duration-500 shadow-[0_0_10px_10px_rgba(0,0,0,0.3)]"></span>
                Save
            </button>
            <input type="text" placeholder="Search for Student ID, Name, Section etc..." class="border border-pink-300 rounded px-4 py-2 w-1/3">
        </div>
        <div class="table-container w-full overflow-x-auto m-auto p-4">
            <table class="min-w-full bg-white">
                <thead class="bg-pink-300 text-white">
                    <tr>
                        @foreach($columns as $column)
                        <th class="py-2 px-4 border">{{ $column }}</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr class="bg-[#FFFFFF]">
                        @foreach($columns as $column)
                        <td class="py-2 px-4 border">{{ $user->$column }}</td>
                        @endforeach
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="flex justify-center items-center mt-4">
            <button type="submit" class="w-28 bg-pink-300 text-pink-700 border border-pink-700 border-b-4 font-medium overflow-hidden relative px-4 py-2 rounded-md hover:brightness-150 hover:border-t-4 hover:border-b active:opacity-75 outline-none duration-300 group">
                <span class="bg-pink-700 shadow-pink-700 absolute -top-[150%] left-0 inline-flex w-80 h-[5px] rounded-md opacity-50 group-hover:top-[150%] duration-500 shadow-[0_0_10px_10px_rgba(0,0,0,0.3)]"></span>
                Previous
            </button>
            <div class="flex space-x-2 mx-2">
                <button type="submit" class="bg-pink-300 text-pink-700 border border-pink-700 border-b-4 font-medium overflow-hidden relative px-4 py-2 rounded-md hover:brightness-150 hover:border-t-4 hover:border-b active:opacity-75 outline-none duration-300 group">
                    <span class="bg-pink-700 shadow-pink-700 absolute -top-[150%] left-0 inline-flex w-80 h-[5px] rounded-md opacity-50 group-hover:top-[150%] duration-500 shadow-[0_0_10px_10px_rgba(0,0,0,0.3)]"></span>
                    1
                </button>
                <button type="submit" class="bg-pink-300 text-pink-700 border border-pink-700 border-b-4 font-medium overflow-hidden relative px-4 py-2 rounded-md hover:brightness-150 hover:border-t-4 hover:border-b active:opacity-75 outline-none duration-300 group">
                    <span class="bg-pink-700 shadow-pink-700 absolute -top-[150%] left-0 inline-flex w-80 h-[5px] rounded-md opacity-50 group-hover:top-[150%] duration-500 shadow-[0_0_10px_10px_rgba(0,0,0,0.3)]"></span>
                    2
                </button>
                <button type="submit" class="bg-pink-300 text-pink-700 border border-pink-700 border-b-4 font-medium overflow-hidden relative px-4 py-2 rounded-md hover:brightness-150 hover:border-t-4 hover:border-b active:opacity-75 outline-none duration-300 group">
                    <span class="bg-pink-700 shadow-pink-700 absolute -top-[150%] left-0 inline-flex w-80 h-[5px] rounded-md opacity-50 group-hover:top-[150%] duration-500 shadow-[0_0_10px_10px_rgba(0,0,0,0.3)]"></span>
                    3
                </button>
                <button type="submit" class="bg-pink-300 text-pink-700 border border-pink-700 border-b-4 font-medium overflow-hidden relative px-4 py-2 rounded-md hover:brightness-150 hover:border-t-4 hover:border-b active:opacity-75 outline-none duration-300 group">
                    <span class="bg-pink-700 shadow-pink-700 absolute -top-[150%] left-0 inline-flex w-80 h-[5px] rounded-md opacity-50 group-hover:top-[150%] duration-500 shadow-[0_0_10px_10px_rgba(0,0,0,0.3)]"></span>
                    4
                </button>
                <!-- Add more page buttons as needed -->
            </div>
            <button type="submit" class="w-28 bg-pink-300 text-pink-700 border border-pink-700 border-b-4 font-medium overflow-hidden relative px-4 py-2 rounded-md hover:brightness-150 hover:border-t-4 hover:border-b active:opacity-75 outline-none duration-300 group">
                <span class="bg-pink-700 shadow-pink-700 absolute -top-[150%] left-0 inline-flex w-80 h-[5px] rounded-md opacity-50 group-hover:top-[150%] duration-500 shadow-[0_0_10px_10px_rgba(0,0,0,0.3)]"></span>
                Next
            </button>
        </div>
    </div>
</div>
