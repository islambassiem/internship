<x-layouts.auth>

    <x-auth.title title="Login"> </x-auth.title>


    <form action="/login" method="post" id="login">
        @csrf


        @if (session('success'))
            <div class="mx-5 mt-5 text-green-800">{{ session('success') }}</div>
        @endif

        <x-auth.input type="email" placeholder="Email" name="email">
            <x-icons.person> </x-icons.person>
        </x-auth.input>

        @error('email')
            <x-auth.error> {{ $message }} </x-auth.error>
        @enderror

        <x-auth.input type="password" placeholder="Password" name="password">
            <x-icons.key> </x-icons.key>
        </x-auth.input>

        <div class="text-gray-500  flex justify-between items-center px-5 text-sm mt-3">
            <div class="flex items-center">
                <input id="default-checkbox" type="checkbox" name="remember" value="1" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                <label for="default-checkbox" class="ms-2 text-sm">Remember Me</label>
            </div>
            <a href="/forgot-password">Forgot your password?</a>
        </div>

        <x-auth.action-link text="Register" href="{{ route('register') }}">
            Do not have an accout?
        </x-auth.action-link>


        <div class="my-10 w-full text-center">
            <x-auth.button title="Login" form="login"> </x-auth.button>
        </div>

        <div class="border px-3 w-80 mx-auto"></div>
        <div class="my-10 w-full flex flex-col items-center">
            <p class="text-slate-500">Or log in with</p>
            @if (session('error'))
                <x-auth.error> {{ session('error') }} </x-auth.error>
            @endif
            <a href="{{ route('google') }}">
                <div class="flex justify-center items-center w-20 h-20 mt-4 rounded-full bg-slate-200">
                    <x-icons.google> </x-icons.google>
                </div>
            </a>
        </div>
    </form>

</x-layouts.auth>
