<x-guest-layout>  
        <div>
        <h2 class="text-[20]">Create your Account<br></h2> 
        <h2 class="font-bold text-3xl">Sign Up to PortalNest</h2>
        </div><br>

<form method="POST" action="{{ route('register') }}">
    @csrf

    <div class="flex w-full">
        <!-- fname -->
        <div class="m-auto ml-0 w-[48%]">
            <x-input-label for="fname" :value="__('First Name')" />
            <x-text-input id="fname" class="block mt-1 w-full" type="text" name="fname" :value="old('fname')" required autofocus autocomplete="fname" />
            <x-input-error :messages="$errors->get('fname')" class="mt-2" />
        </div>
    
        <!-- lname -->
        <div class="m-auto mr-0 w-[48%]">
            <x-input-label for="lname" :value="__('Last Name')" />
            <x-text-input id="lname" class="block mt-1 w-full" type="text" name="lname" :value="old('lname')" required autofocus autocomplete="lname" />
            <x-input-error :messages="$errors->get('lname')" class="mt-2" />
        </div>
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
            <option value="">Null</option>
            @foreach($programs as $program)
                <option value="{{ $program->program }}">{{ $program->program }}</option>
            @endforeach
        </select>
        <x-input-error :messages="$errors->get('program')" class="mt-2" />
    </div>

    <!-- Section -->
    <div class="mt-4">
        <x-input-label for="section" :value="__('Section')" />
        <select id="section" name="section" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm focus:ring-2 focus:ring-indigo-500" required>
            <option value="">Null</option>
            @foreach($sections as $section)
                <option value="{{ $section->section }}">{{ $section->section }}</option>
            @endforeach
        </select>
        <x-input-error :messages="$errors->get('section')" class="mt-2" />
    </div>

    <!-- Student ID -->
    <div class="mt-4">
        <x-input-label for="stud_id" :value="__('ID Number')" />
        <x-text-input id="stud_id" class="block mt-1 w-full" type="text" name="stud_id" :value="old('stud_id')" required autocomplete="stud_id" pattern="\d*" title="Only numbers are allowed" />
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

<script>
    document.getElementById('email').addEventListener('blur', function () {
        var email = this.value;
        var sectionField = document.getElementById('section');
        var programField = document.getElementById('program');

        if (email.includes('student')) {
            console.log("student");
            if (!sectionField.hasAttribute('required')) {
                sectionField.setAttribute('required', 'required');
            }
            if (!programField.hasAttribute('required')) {
                programField.setAttribute('required', 'required');
            }
        } else {
            console.log("prof");
            sectionField.removeAttribute('required');
            programField.removeAttribute('required');
        }
    });

</script>