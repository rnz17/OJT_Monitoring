@include('partials.head')
@include('partials.sidebar')

<div class ="w-full">

    <div class="table-container w-full overflow-x-auto m-auto p-4">
        <!-- di pa nag uupdate ung table at ung todo and done -->
        <table class="min-w-full bg-white">
            <thead>
                <tr>
                    @foreach( $columns as $column)
                        <th class="py-2 px-4 border-b border-gray-200 bg-gray-100 text-left text-sm leading-4 font-medium text-gray-600 uppercase tracking-wider">
                            {{ $column }}
                        </th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                <tr>
                    @foreach($columns as $column)
                        <td class="py-2 px-4 border-b border-gray-200"> {{ $user[$column] ?? 'N/A' }} </td>
                    @endforeach
                </tr>
                
            </tbody>
        </table>
    </div>

    <!-- file summary -->
        <div class="flex flex-wrap text-center py-32">
            <div class="w-[55%] overflow-x-auto m-auto p-4 bg-red-300 border border-black">
                @foreach($todo as $file)
                    <div class="flex w-3/4 m-auto">
                        <li class="m-auto">{{ $file }}</li>
                    </div>
                @endforeach
            </div>
            <div class="w-[40%] overflow-x-auto m-auto p-4 bg-red-300 border border-black">
                @if(count($done) >= 1)
                    @foreach($done as $file)
                        <div class="flex w-3/4 m-auto">
                            <li class="m-auto">{{ $file }}</li>
                        </div>
                    @endforeach
                @else
                    <div class="flex w-3/4 m-auto">
                        <h1 class="m-auto">Wala ka pa napapasa boss kilos kilos naman</h1>
                    </div>
                @endif
            </div>
        </div>

    <!-- upload box -->
        <div class="flex flex-wrap m-auto w-5/6 bg-blue-200 p-4 border border-black">
        <form action="{{ route('files.upload') }}" method="POST" enctype="multipart/form-data" class="flex m-auto gap-x-8">
            @csrf
            <div class="flex flex-col">
                <label for="column" class="block text-gray-700 text-sm font-bold mb-2">Select Column:</label>
                <select name="column" id="column" class="shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                    @foreach($files as $file)
                        <option value="{{ $file->id }}">{{ ucfirst(str_replace('_', ' ', $file->column_name)) }}</option>
                    @endforeach
                </select>
            </div>
            <div class="flex flex-col">
                <label for="file" class="block text-gray-700 text-sm font-bold mb-2">Upload File:</label>
                <input type="file" name="file" id="file" class="shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
            </div>
            <div class="flex items-center">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Upload
                </button>
            </div>
        </form>

        </div>

</div>