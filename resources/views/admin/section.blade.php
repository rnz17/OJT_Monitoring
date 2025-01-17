@include('partials.head')
@include('partials.sidebar')

<div class="w-full bg-[#FAD4D4] p-4 flex justify-center">
    <div class="m-auto w-full max-w-5xl">

        <!-- Entertainment and Multimedia Computing (EMC) Section -->
        <div class="bg-white mb-8 p-6 rounded-md shadow-sm border border-gray-400">
            <h2 class="text-2xl font-semibold mb-6">Entertainment and Multimedia Computing (EMC)</h2>
            <div class="grid grid-cols-3 gap-6 text-center">
                
                @foreach($EMC as $each)
                    <a href="{{ route('admin.filtered', ['id' => $each->section]) }}" class="bg-[#F6A8A8] text-white py-3 rounded-md hover:bg-[#E08A8A] border border-gray-400">
                        <button>{{ $each->section }}</button>
                    </a>
                @endforeach
            </div>
        </div>

        <!-- Information Technology (IT) Section -->
        <div class="bg-white mb-8 p-6 rounded-md shadow-sm border border-gray-400">
            <h2 class="text-2xl font-semibold mb-6">Information Technology (IT)</h2>
            <div class="grid grid-cols-3 gap-6 text-center">
                
                @foreach($IT as $each)
                    <a href="{{ route('admin.filtered', ['id' => $each->section]) }}" class="bg-[#F6A8A8] text-white py-3 rounded-md hover:bg-[#E08A8A] border border-gray-400">
                        <button>{{ $each->section }}</button>
                    </a>
                @endforeach
            </div>
        </div>

        <!-- Computer Science (CS) Section -->
        <div class="bg-white mb-8 p-6 rounded-md shadow-sm border border-gray-400">
            <h2 class="text-2xl font-semibold mb-6">Computer Science (CS)</h2>
            <div class="grid grid-cols-3 gap-6 text-center">
                
                @foreach($CS as $each)
                    <a href="{{ route('admin.filtered', ['id' => $each->section]) }}" class="bg-[#F6A8A8] text-white py-3 rounded-md hover:bg-[#E08A8A] border border-gray-400">
                        <button>{{ $each->section }}</button>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
</div>
