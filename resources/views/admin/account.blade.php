@include('partials.head')
@include('partials.sidebar')

<div class ="w-full bg-red-300">
<!-- Main container for centering content both vertically and horizontally -->
<div class="flex justify-center items-center min-h-screen bg-gray-100">
    
    <!-- Container for profile sections side by side -->
    <div class="flex justify-center gap-4 w-full max-w-6xl">
        <!-- Profile Information Section -->
        <div class="bg-[#F6A8A8] p-6 rounded-lg shadow-lg w-1/2">
            <!-- Title of the Profile Information section -->
            <h2 class="text-2xl font-semibold mb-4">Profile Information</h2>
            <!-- Description of the Profile Information section -->
            <p class="mb-4">Update your account's profile information and email address.</p>
            <form>
                <!-- Label and input for Name -->
                <label for="name" class="block mb-2">Name</label>
                <input type="text" id="name" name="name" placeholder="Enter your name" class="border p-2 w-full mb-4 rounded">
                <!-- Label and input for Email -->
                <label for="email" class="block mb-2">Email</label>
                <input type="email" id="email" name="email" placeholder="Enter your email" class="border p-2 w-full mb-4 rounded">
                <!-- Custom Save button -->
                <button type="submit" class="bg-red-950 text-red-400 border border-red-400 border-b-4 font-medium overflow-hidden relative px-4 py-2 rounded-md hover:brightness-150 hover:border-t-4 hover:border-b active:opacity-75 outline-none duration-300 group">
                    <span class="bg-red-400 shadow-red-400 absolute -top-[150%] left-0 inline-flex w-80 h-[5px] rounded-md opacity-50 group-hover:top-[150%] duration-500 shadow-[0_0_10px_10px_rgba(0,0,0,0.3)]"></span>
                    Save
                </button>
            </form>
        </div>

        <!-- Password Update Section -->
        <div class="bg-[#F6A8A8] p-6 rounded-lg shadow-lg w-1/2">
            <!-- Title of the Password Update section -->
            <h2 class="text-2xl font-semibold mb-4">Password Update</h2>
            <!-- Description of the Password Update section -->
            <p class="mb-4">Ensure your account is using a long random password to stay secure.</p>
            <form>
                <!-- Label and input for Current Password -->
                <label for="current-password" class="block mb-2">Current Password</label>
                <input type="password" id="current-password" name="current-password" placeholder="Enter current password" class="border p-2 w-full mb-4 rounded">
                <!-- Label and input for New Password -->
                <label for="new-password" class="block mb-2">New Password</label>
                <input type="password" id="new-password" name="new-password" placeholder="Enter new password" class="border p-2 w-full mb-4 rounded">
                <!-- Label and input for Confirm Password -->
                <label for="confirm-password" class="block mb-2">Confirm Password</label>
                <input type="password" id="confirm-password" name="confirm-password" placeholder="Confirm new password" class="border p-2 w-full mb-4 rounded">
                <!-- Custom Save button -->
                <button type="submit" class="bg-red-950 text-red-400 border border-red-400 border-b-4 font-medium overflow-hidden relative px-4 py-2 rounded-md hover:brightness-150 hover:border-t-4 hover:border-b active:opacity-75 outline-none duration-300 group">
                    <span class="bg-red-400 shadow-red-400 absolute -top-[150%] left-0 inline-flex w-80 h-[5px] rounded-md opacity-50 group-hover:top-[150%] duration-500 shadow-[0_0_10px_10px_rgba(0,0,0,0.3)]"></span>
                    Save
                </button>
            </form>
        </div>
    </div>
</div>






ADMIN
@include('partials.logout')

</div>