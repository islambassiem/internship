<x-layouts.auth>
    <x-auth.title title="Register"> </x-auth.title>


    <form action="/register" method="post">
        @csrf
        <x-auth.input type="text" placeholder="Name" name="name" :value="old('name')">
            <x-icons.person></x-icons.person>
        </x-auth.input>
        @error('name')
            <x-auth.error>
                {{ $message }}
            </x-auth.error>
        @enderror


        <x-auth.input type="email" placeholder="Email" name="email" :value="old('email')">
            <x-icons.email></x-icons.email>
        </x-auth.input>
        @error('email')
            <x-auth.error>
                {{ $message }}
            </x-auth.error>
        @enderror

        <x-auth.input type="text" placeholder="National ID" name="national_id" :value="old('national_id')">
            <x-icons.card></x-icons.card>
        </x-auth.input>
        @error('national_id')
            <x-auth.error>
                {{ $message }}
            </x-auth.error>
        @enderror

        <x-auth.input type="text" placeholder="Mobile Number" name="phone" :value="old('phone')">
            <x-icons.phone></x-icons.phone>
        </x-auth.input>
        @error('phone')
            <x-auth.error>
                {{ $message }}
            </x-auth.error>
        @enderror

        <div class="pt-5 px-5 w-full flex text-slate-300 rounded-xl">
            <select name="department_id" class="js-choice bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option value="" disabled selected class="">Department</option>
                @foreach ($departments as $department)
                    <option value="{{ $department->id }}" @selected($department->id == old('department_id'))>{{ $department->name }}</option>
                @endforeach
            </select>
        </div>
        @error('department_id')
            <x-auth.error>
                {{ $message }}
            </x-auth.error>
        @enderror

        <x-auth.input type="password" placeholder="Password" name="password">
            <x-icons.key></x-icons.key>
        </x-auth.input>
        @error('password')
            <x-auth.error>
                {{ $message }}
            </x-auth.error>
        @enderror

        <x-auth.input type="password" placeholder="Password Confirmation" name="password_confirmation">
            <x-icons.key></x-icons.key>
        </x-auth.input>

        <div class="my-5 w-full text-center">
            <x-auth.button title="Register"> </x-auth.button>
        </div>
    </form>

    <div class="ml-5 text-gray-600 mb-4">
        Already have an acount? <a href="/login" class="text-blue-700 underline">Login</a>
    </div>
</x-layouts.auth>
