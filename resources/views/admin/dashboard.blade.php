@include('partials.head')
@include('partials.sidebar')

<div class="w-full bg-[#FAD4D4]">
    <div class="container mx-auto p-4">
        <!-- header -->
        <form method="GET" action="{{ route('admin.landing') }}">
            <div class="flex flex-wrap items-center justify-between mb-8">
                <input id="search" type="text" name="search" value="{{ old('search', $search) }}" placeholder="Search" class="m-auto border border-[#F6A8A8] rounded px-4 py-2 max-w-full sm:max-w-xs">

                <!-- Sort Dropdown -->
                <select id="sort" name="sort" class="border border-[#F6A8A8] rounded px-12 py-2 max-w-full sm:max-w-xs">
                    <option value="lna" {{ old('sort', $programFilter) == 'lna' ? 'selected' : '' }}>Last Name Ascending</option>
                    <option value="lnd" {{ old('sort', $programFilter) == 'lnd' ? 'selected' : '' }}>Last Name Descending</option>
                </select>

                <select id="program" name="program" class="m-auto border border-[#F6A8A8] rounded px-12 py-2 max-w-full sm:max-w-xs">
                    <option value="">Select Program</option>
                    @foreach($programs as $program)
                        <option value="{{ $program->program }}" {{ $program->program == old('program', $programFilter) ? 'selected' : '' }}>
                            {{ $program->program }}
                        </option>
                    @endforeach
                </select>

                <select id="section" name="section" class="m-auto border border-[#F6A8A8] rounded px-12 py-2 max-w-full sm:max-w-xs">
                    <option value="">Select Section</option>
                    @foreach($sections as $section)
                        <option value="{{ $section->section }}" {{ $section->section == old('section', $sectionFilter) ? 'selected' : '' }}>
                            {{ $section->section }}
                        </option>
                    @endforeach
                </select>

                <select id="acad_yr" name="acad_yr" class="m-auto border border-[#F6A8A8] rounded px-12 py-2 max-w-full sm:max-w-xs">
                    <option value="">Academic Year</option> 
                    <option value="2025">2025</option> 
                    <option value="2026">2026</option> 
                </select>

                <button type="submit" class="bg-[#F6A8A8] text-[#FFFFFF] border border-transparent border-b-4 font-medium overflow-hidden relative px-4 py-2 rounded-md hover:bg-[#E08A8A] hover:border-[#E08A8A] active:opacity-75 outline-none duration-300 group mt-4 sm:mt-0">
                    Filter
                </button>
            </div>
        </form>

        <!-- table container -->
        <div class="table-container w-full overflow-auto m-auto p-4 max-h-[86vh]">
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
                                <td class="py-2 px-1 text-truncate border text-center">
                                    @if(empty($user->$column) && ($column !== 'enrolled'))
                                        <p>--</p>
                                    @elseif($column == 'enrolled')
                                        <input type="checkbox" class="enrolled-checkbox rounded-sm" data-user-id="{{ $user->stud_id }}" {{ $user->$column ? 'checked' : '' }}>
                                    @elseif(strpos($user->$column, 'files') !== false)
                                        <a href="{{ asset('storage/'.$user->$column) }}" target="_blank" class="text-white bg-blue-500 py-1 px-2 rounded-lg border border-gray-200 underline">View File</a>
                                    @elseif(strpos($column, 'link') !== false)
                                        <a href="$user->$column" target="_blank" class="text-truncate text-blue-500 underline">{{ $user->$column }}</a>
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
</div>

<!-- Add this inside your <head> tag or just before closing </body> tag -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
$(document).on('change', '.enrolled-checkbox', function() {
    var userId = $(this).data('user-id');
    var status = $(this).prop('checked') ? 1 : 0;
    var column = '{{ $column }}'; 

    $.ajax({
        url: '{{ route("update.enrollment") }}',
        method: 'POST',
        data: {
            user_id: userId,
            status: status,
            column: 'enrolled',
            _token: '{{ csrf_token() }}',
        },
        success: function(response) {
            if (response.success) {
                console.log('Enrollment status updated successfully.');
                console.log(userId);
                console.log(status);
            } else {
                console.log('Failed to update enrollment status.');
                console.log(userId);
                console.log(status);
            }
        }
    });
});
</script>