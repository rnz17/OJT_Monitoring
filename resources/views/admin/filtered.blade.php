@include('partials.head')
@include('partials.sidebar')

<div class="w-full bg-[#FAD4D4] p-4 flex justify-center">

    <div class="table-container w-full overflow-x-auto m-auto p-4 max-w-[80rem]">
        <!-- table -->
            <table class="min-w-full bg-white">
                <thead class="bg-[#F6A8A8] text-white">
                    <tr>
                        <th class="px-6">
                            
                        </th>
                        @foreach($columns as $column)
                        <th class="py-2 px-4 border">{{ $column }}</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                @php
                        $counter = 1;
                    @endphp
                    @foreach($users as $user)
                        <tr class="bg-[#FFFFFF]">
                            <td class="py-2 px-1 text-truncate border text-center">{{ $counter }}</td>
                            @php
                                $counter++;
                            @endphp
                            @foreach($columns as $column)
                                <td class="py-2 px-1 text-truncate border text-center">
                                    @if(empty($user->$column) && ($column !== 'enrolled'))
                                        <p>--</p>
                                    @elseif($column == 'enrolled')
                                        <input type="checkbox" class="enrolled-checkbox rounded-sm" data-user-id="{{ $user->stud_id }}" {{ $user->$column ? 'checked' : '' }}>
                                    @elseif(strpos($user->$column, 'files') !== false)
                                        <a href="{{ asset('storage/'.$user->$column) }}" target="_blank" class="text-white bg-blue-500 py-1 px-2 rounded-lg border border-gray-200 underline">View File</a>
                                    @elseif(strpos($column, 'link') !== false)
                                        <a href="https://{{ $user->$column }}" target="_blank" class="text-truncate text-blue-500 underline">{{ $user->$column }}</a>
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
