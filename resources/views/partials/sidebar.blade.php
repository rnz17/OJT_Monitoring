<div class="flex flex-col h-screen bg-[#F0E6E6] w-64 py-6 px-4">
    <!-- Logo -->
    <div class="flex justify-center mb-8 h-1/6">
        <a href="{{ route('dashboard') }}">
            <img src="{{ asset('images/CCS LOGO.png') }}" class="w-17 h-17 object-contain" style="width: 100px; height: 100px;">
        </a>
    </div>


    <div class="flex flex-col h-5/6">
        <!-- Profile -->
        <a href="@if(Auth::user()->professor === 1){{ route('admin.profile') }}@else{{ route('client.profile') }}@endif" class="flex flex-col items-center text-pink-800 hover:text-pink-600 mb-6">
        <!-- Icon (Image) -->
        <div class="w-10 h-10 flex justify-center items-center">
            <img src="{{ asset('images/profile.png') }}" alt="Account Icon" class="w-full h-full object-contain">
        </div>
        <!-- User Name -->
        <span class="mt-2 font-medium">{{ Auth::user()->fname .' '. Auth::user()->lname }}</span>
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
                <a href="{{ route('client.landing') }}" class="flex flex-col items-center text-pink-800 hover:text-pink-600">
            <!-- Icon (Image) -->
                    <div class="w-10 h-10 flex justify-center items-center">
                        <img src="{{ asset('images/dashboard.png') }}" alt="Dashboard Icon" class="w-full h-full object-contain">
                    </div>
                <!-- Text -->
                    <span class="mt-2 font-medium">Dashboard</span>
                </a>
            </div>
        @endif
    </div>

    <div class="flex h-1/6">
        @include('partials.logout')
    </div>
</div>
