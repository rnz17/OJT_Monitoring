<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
</form>

<div class="flex flex-col space-y-6">
    <a href="{{ route('logout') }}" 
       class="flex flex-col items-center text-pink-800 hover:text-pink-600"
       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
        <!-- Icon (Image) -->
        <div class="w-8 h-8 flex justify-center items-center">
            <img src="{{ asset('images/logout.png') }}" alt="Logout Icon" class="w-8 h-8 object-contain">
        </div>
        <!-- Text -->
        <span class="mt-2 font-medium">Logout</span>
    </a>
</div>
