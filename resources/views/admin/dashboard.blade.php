@include('partials.head')
@include('partials.sidebar')

<div class="w-full bg-[#FAD4D4]">
    <div class="container mx-auto p-4">
        <!-- header -->
            <form method="GET" action="{{ route('admin.landing') }}">
                <div class="flex items-center justify-between mb-8">
                    <input id="search" type="text" name="search" value="{{ old('search', $search) }}" placeholder="Search for Student ID, Name, Section etc..." class="border border-[#F6A8A8] rounded px-4 py-2 w-1/3">

                    <select id="program" name="program" class="border border-[#F6A8A8] rounded px-12 py-2 mr-4">
                        <option value="">Select Program</option>
                        @foreach($programs as $program)
                            <option value="{{ $program->program }}" {{ $program->program == old('program', $programFilter) ? 'selected' : '' }}>
                                {{ $program->program }}
                            </option>
                        @endforeach
                    </select>

                    <select id="section" name="section" class="border border-[#F6A8A8] rounded px-12 py-2">
                        <option value="">Select Section</option>
                        @foreach($sections as $section)
                            <option value="{{ $section->section }}" {{ $section->section == old('section', $sectionFilter) ? 'selected' : '' }}>
                                {{ $section->section }}
                            </option>
                        @endforeach
                    </select>

                    <button type="submit" class="bg-[#F6A8A8] text-[#FFFFFF] border border-[#E08A8A] border-b-4 font-medium overflow-hidden relative px-4 py-2 rounded-md hover:brightness-150 hover:border-t-4 hover:border-b active:opacity-75 outline-none duration-300 group mr-8">
                        <span class="bg-[#E08A8A] shadow-[#E08A8A] absolute -top-[150%] left-0 inline-flex w-80 h-[5px] rounded-md opacity-50 group-hover:top-[150%] duration-500 shadow-[0_0_10px_10px_rgba(0,0,0,0.3)]"></span>
                        Filter
                    </button>
                </div>
            </form>

        <!-- table container -->
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
</div>
    