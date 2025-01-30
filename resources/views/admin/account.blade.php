@include('partials.head')
@include('partials.sidebar')

<div class="w-full bg-[#FAD4D4]">
    <!-- Main container for centering content both vertically and horizontally -->
    <div class="flex justify-center items-center min-h-screen">
        
        <!-- Container for profile sections side by side -->
        <div class="flex justify-center gap-4 w-full max-w-6xl">
            <!-- Profile Information Section -->
            <div class="bg-[#FFFFFF] p-6 rounded-lg shadow-lg w-1/2">
                <!-- Title of the Profile Information section -->
                <h2 class="text-2xl font-semibold mb-4">Profile Information</h2>
                <!-- Description of the Profile Information section -->
                <p class="mb-4">Update your account's profile information and email address.</p>
                <form action="{{ route('profile.update') }}" method="post">
                    @csrf
                    @method('patch')
                    <!-- Label and input for First Name -->
                    <label for="name" class="block mb-2">First Name</label>
                    <input type="text" id="name" name="fname" value="{{ Auth::user()->fname }}" class="border p-2 w-full mb-4 rounded">
                    <!-- Label and input for Last Name -->
                    <label for="name" class="block mb-2">Surname</label>
                    <input type="text" id="name" name="lname" value="{{ Auth::user()->lname }}" class="border p-2 w-full mb-4 rounded">
                    <!-- Label and input for Email -->
                    <label for="email" class="block mb-2">Email</label>
                    <input type="email" id="email" name="email" value="{{ Auth::user()->email }}" class="border p-2 w-full mb-4 rounded">
                    <!-- Custom Save button -->
                    <button type="submit" class="bg-[#F6A8A8] text-[#FFFFFF] border border-transparent border-b-4 font-medium overflow-hidden relative px-4 py-2 rounded-md hover:bg-[#E08A8A] hover:border-[#E08A8A] active:opacity-75 outline-none duration-300 group mr-8">
                        Save
                    </button>
                </form>
            </div>

            <!-- Password Update Section -->
            <div class="bg-[#FFFFFF] p-6 rounded-lg shadow-lg w-1/2">
                <!-- Title of the Password Update section -->
                <h2 class="text-2xl font-semibold mb-4">Password Update</h2>
                <!-- Description of the Password Update section -->
                <p class="mb-4">Ensure your account is using a long random password to stay secure.</p>
                <form action="{{ route('update.password') }}" method="post">
                    @csrf
                    @method('post')
                    <!-- Label and input for Current Password -->
                    <label for="current_password" class="block mb-2">Current Password</label>
                    <input type="password" id="current_password" name="current_password" placeholder="Enter current password" class="border p-2 w-full mb-4 rounded">
                    <!-- Label and input for New Password -->
                    <label for="password" class="block mb-2">New Password</label>
                    <input type="password" id="password" name="password" placeholder="Enter new password" class="border p-2 w-full mb-4 rounded">
                    <!-- Label and input for Confirm Password -->
                    <label for="password_confirmation" class="block mb-2">Confirm Password</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Confirm new password" class="border p-2 w-full mb-4 rounded">
                    <!-- Custom Save button -->
                    <button type="submit" class="bg-[#F6A8A8] text-[#FFFFFF] border border-transparent border-b-4 font-medium overflow-hidden relative px-4 py-2 rounded-md hover:bg-[#E08A8A] hover:border-[#E08A8A] active:opacity-75 outline-none duration-300 group mr-8">
                        Save
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
