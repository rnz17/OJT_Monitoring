<x-guest-layout>
<form method="POST" action="{{ route('register') }}">
    @csrf

    <!-- Name -->
    <div>
        <x-input-label for="name" :value="__('Name')" />
        <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
        <x-input-error :messages="$errors->get('name')" class="mt-2" />
    </div>

    <!-- Email Address -->
    <div class="mt-4">
        <x-input-label for="email" :value="__('Email')" />
        <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
        <x-input-error :messages="$errors->get('email')" class="mt-2" />
    </div>

    <!-- Password -->
    <div class="mt-4">
        <x-input-label for="password" :value="__('Password')" />

        <x-text-input id="password" class="block mt-1 w-full"
                        type="password"
                        name="password"
                        required autocomplete="new-password" />

        <x-input-error :messages="$errors->get('password')" class="mt-2" />
    </div>

    <!-- Confirm Password -->
    <div class="mt-4">
        <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

        <x-text-input id="password_confirmation" class="block mt-1 w-full"
                        type="password"
                        name="password_confirmation" required autocomplete="new-password" />

        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
    </div>

    <!-- Program -->
    <div class="mt-4">
        <x-input-label for="program" :value="__('Program')" />
        <select id="program" name="program" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm focus:ring-2 focus:ring-indigo-500" required>
            <option value="IT" {{ old('program') == 'IT' ? 'selected' : '' }}>IT</option>
            <option value="CS" {{ old('program') == 'CS' ? 'selected' : '' }}>CS</option>
            <option value="EMC" {{ old('program') == 'EMC' ? 'selected' : '' }}>EMC</option>
        </select>
        <x-input-error :messages="$errors->get('program')" class="mt-2" />
    </div>

    <!-- Section -->
    <div class="mt-4">
        <x-input-label for="section" :value="__('Section')" />
        <select id="section" name="section" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm focus:ring-2 focus:ring-indigo-500" required>
            <option value="section 1" {{ old('section') == 'section 1' ? 'selected' : '' }}>Section 1</option>
            <option value="section 2" {{ old('section') == 'section 2' ? 'selected' : '' }}>Section 2</option>
            <option value="section 3" {{ old('section') == 'section 3' ? 'selected' : '' }}>Section 3</option>
        </select>
        <x-input-error :messages="$errors->get('section')" class="mt-2" />
    </div>

    <!-- Student ID -->
    <div class="mt-4">
        <x-input-label for="stud_id" :value="__('Stud_id')" />
        <x-text-input id="stud_id" class="block mt-1 w-full" type="text" name="stud_id" :value="old('stud_id')" required autocomplete="stud_id" />
        <x-input-error :messages="$errors->get('stud_id')" class="mt-2" />
    </div>

    <div class="flex items-center justify-end mt-4">
        <a class="underline text-sm text-gray-600 dark:text-[#5C3C3C] hover:text-[#5C3C3C] dark:hover:text-[#B57C7C] rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
            {{ __('Already registered?') }}
        </a>

        <x-primary-button class="ms-4">
            {{ __('Register') }}
        </x-primary-button>
    </div>
</form>


</x-guest-layout>
