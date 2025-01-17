@include('partials.head')
@include('partials.sidebar')

<div class="w-full bg-[#FAD4D4] p-4 flex justify-center">

    <div class="table-container w-full overflow-x-auto m-auto p-4">
        <!-- table -->
            <table class="min-w-full bg-white">
                <thead class="bg-[#F6A8A8] text-white">
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
                                <td class="py-2 px-4 border text-center">
                                    @if(strpos($user->$column, 'files') !== false)
                                        <a href="{{ asset('storage/'.$user->$column) }}" target="_blank" class="text-white bg-blue-500 py-1 px-4 rounded-lg border border-gray-200 underline">View File</a>
                                    @else
                                        {{ $user->$column }}
                                    @endif
                                </td>
                            @endforeach
                        </tr>
                    @endforeach
                </tbody>
            </table>
    </div>

</div>
