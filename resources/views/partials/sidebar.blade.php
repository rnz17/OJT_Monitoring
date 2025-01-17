<div class="flex flex-col h-screen bg-[#F0E6E6] w-64 py-6 px-4 rounded-lg shadow-lg">
    <!-- Logo -->
    <div class="flex justify-center mb-8">
        <img src='images/CCS LOGO.png' class="w-16 h-16 object-contain">

    </div>

    <!-- Profile -->
    <a href="@if(Auth::user()->professor === 1){{route('admin.profile')}}@else{{route('client.profile')}}@endif" class="flex items-center space-x-3 mb-6">
        <span class="text-pink-800 font-medium">{{ Auth::user()->name }}</span>
    </a>

    <!-- Menu Items -->
    @if(Auth::user()->professor === 1) 
        <!-- sidebar for prof -->
        <div class="flex flex-col space-y-6">
            <a href="{{ route('admin.landing') }}" class="flex items-center space-x-3 text-pink-800 hover:text-pink-600">
                <div class="w-6 h-6 flex justify-center items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3M12 19v2m0-19a9 9 0 11-9 9 9 9 0 019-9z" />
                    </svg>
                </div>
                <span>Dashboard</span>
            </a>
            <a href="{{ route('admin.section') }}" class="flex items-center space-x-3 text-pink-800 hover:text-pink-600">
                <div class="w-6 h-6 flex justify-center items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 4v16c0 1.104.896 2 2 2h10c1.104 0 2-.896 2-2V4c0-1.104-.896-2-2-2H5c-1.104 0-2 .896-2 2zM16 11H8m0-3h8m0 6H8" />
                    </svg>
                </div>
                <span>Sections</span>
            </a>
            <a href="{{ route('admin.files') }}" class="flex items-center space-x-3 text-pink-800 hover:text-pink-600">
                <div class="w-6 h-6 flex justify-center items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 4v16c0 1.104.896 2 2 2h10c1.104 0 2-.896 2-2V4c0-1.104-.896-2-2-2H5c-1.104 0-2 .896-2 2zM16 11H8m0-3h8m0 6H8" />
                    </svg>
                </div>
                <span>Add file columns</span>
            </a>
        </div>
    @else
        <!-- student sidebar -->
        <div class="flex flex-col space-y-6">
            <a href="{{route('client.landing')}}" class="flex items-center space-x-3 text-pink-800 hover:text-pink-600">
                <div class="w-6 h-6 flex justify-center items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3M12 19v2m0-19a9 9 0 11-9 9 9 9 0 019-9z" />
                    </svg>
                </div>
                <span>Dashboard</span>
            </a>
        </div>
    @endif
    @include('partials.logout')
</div>
