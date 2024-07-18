<x-layouts.auth>
    <x-auth.title title="Reset Password"></x-auth.title>


    <form action="/forgot-password" method="post">
        @csrf
        <div class="mx-5 text-gray-500 text-sm">
            Please put your official email to reset your password
        </div>

        <x-auth.input type="email" placeholder="Email" class="-mt-3" name="email" value="{{ old('email') }}">
            <x-icons.email> </x-icons.email>
        </x-auth.input>

        @error('email')
            <x-auth.error>{{ $message }}</x-auth.error>
        @enderror

        @if (session('success'))
            <div class="mx-5 mt-5 text-green-800">{{ session('success') }}</div>
        @endif

        <div class="my-10 w-full text-center">
            <x-auth.button title="Submit"> </x-auth.button>
        </div>

    </form>

</x-layouts.auth>
